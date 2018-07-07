<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/catchnz_test/model/CustomerModel.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/catchnz_test/CustomerService/RESTService.php');

  // customer service handler class ...
	/**
	 * handler class for CustomerService
	 */
class CustomerServiceHandler extends RESTService {

	function getCustomers() {	
		$this->model = new CustomerModel();
		$this->model->select('customer');
		$rawData = $this->model->result;

		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No results found!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = $_SERVER['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
				
		$response = json_encode($rawData);
		echo $response;
	}
}
?>