<?php	defined('BASEPATH') OR exit('No direct script access allowed');	

class Registrationmodel extends CI_Model 
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		date_default_timezone_set('Asia/Kolkata');
	}
	
	
	public function insertDatas($insertData)
	{
		$res=$this->db->insert(TBPREFIX.'package_applicants',$insertData);
		if($res)
			return $this->db->insert_id();
		else 
			return false;
	}
}