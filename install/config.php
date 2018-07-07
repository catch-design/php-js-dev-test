<?php

  // config class ...
	/**
	 * config class to save get data from config file
	 */
class config {
    public $isInstalled = false;
    public $db_host = "";
    public $db_username = "";
    public $db_password = "";
    public $db_name = "";

    public function __construct(){
        $this->loadConfig();
    }

      // loads config from file ...
	/**
	 * loads config from file
	 */
    public function loadConfig() {
        $string = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/catchnz_test/config.json');
        $json_a = json_decode($string, true);

        $this->isInstalled = $json_a['isInstalled'];
        $this->db_host = $json_a['db_host'];
        $this->db_username = $json_a['db_username'];
        $this->db_password = $json_a['db_password'];
        $this->db_name = $json_a['db_name'];
    }

    public function toJson(){
        return json_encode(
            array(
            'isInstalled'=> $this->isInstalled,
            'db_host'=> $this->db_host,
            'db_username'=> $this->db_username,
            'db_password'=> $this->db_password,
            'db_name'=> $this->db_name
        ));
    }

    // saves cofig into file ...
	/**
	 * saves config into file
	 */
    public function saveConfig(){
        $fp = fopen($_SERVER['DOCUMENT_ROOT'] . '/catchnz_test/config.json', 'w');
        fwrite($fp, $this->toJson());
        fclose($fp);
    }
}
?>