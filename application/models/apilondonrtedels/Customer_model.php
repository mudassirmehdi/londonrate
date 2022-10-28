<?php	defined('BASEPATH') OR exit('No direct script access allowed');	

class Customer_model extends CI_Model 
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		date_default_timezone_set('Asia/Kolkata');
	}
	public function updatesProfile($arrAppVersion,$id)
	{
		$this->db->where('applicant_id',$id);
		$res=$this->db->update(TBPREFIX.'package_applicants',$arrAppVersion);
		return true;
	}
	
	public function getProfileinfo($applicant_id)
	{
		$this->db->where('applicant_id',$applicant_id);
		$res=$this->db->get(TBPREFIX.'package_applicants');
		return $res->result_array();
	}
	
	public function getAllMyPackagelist($applicant_id)
	{
		$this->db->select(TBPREFIX.'servicepackages.*,'.TBPREFIX.'package_management.amount,'.TBPREFIX.'businesstype.business_type');
		$this->db->where('applicant_id',$applicant_id);
		$this->db->join(TBPREFIX.'package_management',TBPREFIX.'package_management.pack_manage_id='.TBPREFIX.'servicepackages.main_package_id','left');
		$this->db->join(TBPREFIX.'businesstype',TBPREFIX.'businesstype.business_type_id='.TBPREFIX.'servicepackages.business_type','left');
		$this->db->order_by(TBPREFIX.'servicepackages.pack_id','DESC');
		$res=$this->db->get(TBPREFIX.'servicepackages');
		return $res->result_array();
	}
	
	public function checkemailaddress($applicant_email)
	{
		$this->db->select('*');
		$this->db->where('applicant_email',$applicant_email);
		$res=$this->db->get(TBPREFIX.'package_applicants');
		return $res->result_array();
	}
	
	public function updateotp($forget_otp,$applicant_email)
	{
		$this->db->where('applicant_email',$applicant_email);
		$this->db->set('forget_otp',$forget_otp);
		$res=$this->db->update(TBPREFIX.'package_applicants');
		return true;
	}
	
	public function checkforgetotpexists($applicant_id,$forget_otp)
	{
		$this->db->select('*');
		$this->db->where('applicant_id',$applicant_id);
		$this->db->where('forget_otp',$forget_otp);
		$res=$this->db->get(TBPREFIX.'package_applicants');
		return $res->result_array();
	}
	
	public function updatepassword($applicant_id,$new_password)
	{
		$this->db->where('applicant_id',$applicant_id);
		$this->db->set('applicant_password',$new_password);
		$res=$this->db->update(TBPREFIX.'package_applicants');
		return true;
	}
}
?>