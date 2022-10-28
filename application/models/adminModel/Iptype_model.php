<?php
Class Iptype_model extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}
	
	 
	public function fnGetIpType()
	{
		$this->db->select('*');
		$res=$this->db->get(TBPREFIX.'iptypes');
		return $res->result_array();
	}
	  
	 public function getiptypecertificate($typeid)
	 {
		 $this->db->select('*');
		 $this->db->where('typeid',$typeid);
		$res=$this->db->get(TBPREFIX.'ipcertificates');
		return $res->result_array();
	 }
}