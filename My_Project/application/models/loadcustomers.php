<?php 

class loadcustomers extends CI_Model {

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }
		
		public function loadCustomers(){
			$data = array();
			$this->load->database();
			$this->db->select('*');
			$this->db->from('customers');
			$query = $this->db->get();

			if($query->num_rows() > 0) 
				return $query->result();
			
		}
}