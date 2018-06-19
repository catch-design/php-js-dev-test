<?php
/*
 * File: customer.php
 * Description: A simple webpage that asynchronously loads the JSON into a table when you click a button. 
 * [Should have] Using DataTables.js to load the data
 */

$customer = new Customer;

class Customer {

    public $title;
	public $content;

	public function __construct() {

        $this->title = 'Customer Information';
        $this->content = $this->request();

        echo $this->content;

    }


    /**
    * Loading the JSON from web serice 
    **/
    private function request(){

    	// Calling to the web service
    	$curl_handle = curl_init();
    	curl_setopt($curl_handle, CURLOPT_URL, '../webservice/load_data.php'); // [Should have] Loading the base URL 
    	curl_setopt($curl_handle, CURLOPT_FOLLOWLOCATION, true);
    	curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);

    	// [Should have] check headers and header expection before continue

    	$data = json_decode(curl_exec($curl_handle), true);
        
    	// [Should have] check cURL error and http status, and throw execption about the erro
		curl_close($curl_handle);

		return $this->getContent($data);

    }

    /**
     * Loading Customer data into a simple table without CSS styling. [Should have] using DataTables.js to handle the table view
     * @param array $data customer data to load to table
     */
    private function getContent($data) {

    	$view = '<div><title>'.$this->title.'<title></div>';

    	$tmp = '';

    	foreach ($data as $row) {

    		$tmp = '<tr>';

    		foreach ($row as $column) {

    			$tmp .= '<td>'.$column.'</td>';

    		}

    		$tmp .= '</tr>';

    	}


    	// Customer data in a table
    	$view .= 	'<div>
    					<table>
    						<thead>
    							<tr>
							     <th>id</th>
							     <th>first_name</th>
							     <th>last_name</th>
							     <th>email</th>
							     <th>gender</th>
							     <th>ip_address</th>
							     <th>company</th>
							     <th>city</th>
							     <th>title</th>
							     <th>website</th>
							  </tr>
    						</thead>
    						<tbody>' . $tmp . '</tbody>
    					</table>
    				</div>';


    	// Button that asynchronously reqests the customer data
    	$button = 	'<div>
    					<form action="customer.php">
    						<input type="submit" value="Refresh Table">
    					</form>
    				</div>';


    	return 	$view . $button;


    }

}

?>