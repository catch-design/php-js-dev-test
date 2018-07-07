<?php
  // The RESTService base class ...
	/**
	 * The RESTService base class
	 */
class RESTService {
	
	private $httpVersion = "HTTP/1.1";

	public function setHttpHeaders($contentType, $statusCode){
		
		$statusMessage = $this -> getHttpStatusMessage($statusCode);
		
		header($this->httpVersion. " ". $statusCode ." ". $statusMessage);		
		header("Content-Type:". $contentType);
	}
	
	public function getHttpStatusMessage($statusCode){
		$httpStatus = array(
			200 => 'OK',
			204 => 'No Content',   
			404 => 'Not Found', 
			500 => 'Internal Server Error');
		return ($httpStatus[$statusCode]) ? $httpStatus[$statusCode] : $status[500];
	}
}
?>