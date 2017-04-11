<?php

class Home_model extends CI_Model{

	public function __construct(){
		$this->db->reconnect();
		date_default_timezone_set("Pacific/Auckland");
	}
	
	public function getList($page,$order){
		$this->db->select();
		$this->db->from("users");
		$this->db->order_by($order, "asc");
		$this->db->limit(10, ($page-1)*10);
		$query = $this->db->get();
		$array = null;
		foreach($query->result() as $item){
			$array[] = array('id'=>$item->id, 'first_name'=>$item->first_name,'last_name'=>$item->last_name,'email'=>$item->email,'gender'=>$item->gender,'ip_address'=>$item->ip_address,'company'=>$item->company,'city'=>$item->city,'title'=>$item->title,'website'=>$item->website);
		}
		return $array;
	}
}