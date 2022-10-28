<?php
Class Home_model extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}
	
	
	
	public function gettermsdata()
	{
		$this->db->where('page_id','2');
		$res=$this->db->get(TBPREFIX.'pages');
		return $res->result_array();
	}
	
}