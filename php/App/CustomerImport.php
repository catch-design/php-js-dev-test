<?php

namespace JaronSteenson\App;


use JaronSteenson\App\Models\Customer;

class CustomerImport
{

    const CUSTOMER_CSV = __DIR__ . '/../../data/customers.csv';

    public $runStatus = 'Import not run';
    const SUCCESSFUL_IMPORT_STATUS = 'Import was successful';
    const UNSUCCESSFUL_IMPORT_STATUS = 'Import was not successful';

    /**
     * @return static
     */
    public function run()
    {
        $customerCsv = $this->getCustomerCsvAsArray();

        $insertValues = $this->generateInsertValues($customerCsv);

        $this->batchInsertRows($insertValues);

        return $this;
    }

    private function getCustomerCsvAsArray()
    {
        return array_map('str_getcsv', file(static::CUSTOMER_CSV));
    }

    private function generateInsertValues(array $customerCsv)
    {
        $snakedColumnHeadings = array_shift($customerCsv);
        $camelColumnHeadings = array_map('camel_case', $snakedColumnHeadings);

        $insertValues = [];

        foreach($customerCsv as $numericIndexedCustomerRow)
        {
            $insertValues []= array_combine($camelColumnHeadings, $numericIndexedCustomerRow);
        }

        return $insertValues;
    }

    private function batchInsertRows(array $values)
    {
        /** @noinspection PhpDynamicAsStaticMethodCallInspection */
        $success = Customer::insert($values);

        $this->updateRunStatus($success);
    }

    /**
     * @param bool $success
     */
    private function updateRunStatus($success)
    {
        if ($success) {
            $this->runStatus = static::SUCCESSFUL_IMPORT_STATUS;
            return;
        }

        $this->runStatus = static::UNSUCCESSFUL_IMPORT_STATUS;
    }
}