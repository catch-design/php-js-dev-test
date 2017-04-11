<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	 public function __construct(){
    	parent::__construct();
		$this->load->model("Home_model","home");
    }
    
	public function index(){
		$data['list'] = $this->home->getList(1,"id");
		$this->load->view('namelist',$data);
	}
	
	public function getList(){
		$page = $this->input->post('p');
		$order = $this->input->post('o');
		$data = $this->home->getList($page,$order);
		echo json_encode($data);
	}
}
