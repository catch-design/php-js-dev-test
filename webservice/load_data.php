<?php
/*
 * File: load_data.php
 * Description: web service that serves the data from the database as JSON 
 */

include_once('../db/mysql.php');

$db = new Database;
$data = new LoadData;

class LoadData {

	// Contructor
	public function __construct() {

		$request = 'SELECT * FROM contact_table';
		$result = $this->db->query($request);

		// [Should / nice to have] Adding CSRF, GET / POST handling, webservice exception

		header('Content-type: application/json');
		echo json_encode($result);

	}

}

?>