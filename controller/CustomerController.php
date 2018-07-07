<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/catchnz_test/model/CustomerModel.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/catchnz_test/CSVImporter.php');

  // controller class for customer
	/**
	 * Controller class for Customer
	 */
class CustomerController{
    public $cModel;
    private $file = "";

    function __construct(){
        $this->cModel = new CustomerModel();
        $this->file = $_SERVER['DOCUMENT_ROOT'] . '/catchnz_test/data/customers.csv';
    }

    public function render(){
        include ($_SERVER['DOCUMENT_ROOT'] . '/catchnz_test/view/CustomerView.php');
    }

    public function getCustomers() {
        $cList = $this->cModel->getAllCustomers();
        return cList;
    }

    public function importCSV(){
        $this->cModel->createTable();
        $csv = new CSVImporter();
        $csv->importCSV($this->file, 'customer');
    }
}
?>