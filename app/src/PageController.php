<?php

namespace {

    use SilverStripe\CMS\Controllers\ContentController;
    use sasky\catchTest\app\Customer;

    class PageController extends ContentController
    {
        private static $allowed_actions = ['getcustomers'];

        public function getcustomers()
        {
            return json_encode(Customer::get_all_records());
        }
    }
}
