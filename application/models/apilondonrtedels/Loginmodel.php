<?php	defined('BASEPATH') OR exit('No direct script access allowed');	

class Loginmodel extends CI_Model 
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		date_default_timezone_set('Asia/Kolkata');
	}
	
	public function fetchsingleCustomerdata($applicant_email)
	{
		$this->db->where('applicant_email',$applicant_email);
		$res=$this->db->get(TBPREFIX.'package_applicants');
		return $res->num_rows();
	}
	public function fetchsingleCustomerpassdata($applicant_email,$applicant_password)
	{
		$this->db->where('applicant_password',md5($applicant_password));
		$this->db->where('applicant_email',$applicant_email);
		$res=$this->db->get(TBPREFIX.'package_applicants');
		return $res->result_array();
	}
	
	public function updateDatas($applicant_id,$updateData)
	{
		$this->db->where('applicant_id',$applicant_id);
		$res=$this->db->update(TBPREFIX.'package_applicants',$updateData);
		if($res)
			return true;
		else 
			return false;
	}
}