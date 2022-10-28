<?php
Class User_model extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}
	
	public function check_userexists($applicant_email)
	{		
		$this->db->select(TBPREFIX.'package_applicants.applicant_id');
		$this->db->from(TBPREFIX.'package_applicants');
		$this->db->where('applicant_email',$applicant_email);
		$res=$this->db->get(); 
		return $tsr=$res->num_rows();
	}
	
	public function check_getuserexists($applicant_email)
	{		
		$this->db->select(TBPREFIX.'package_applicants.applicant_id,applicant_name');
		$this->db->from(TBPREFIX.'package_applicants');
		$this->db->where('applicant_email',$applicant_email);
		$res=$this->db->get(); 
		return $res->result_array();
	}
	
	public function check_userpasswordexists($applicant_email,$applicant_password)
	{		
		$this->db->select(TBPREFIX.'package_applicants.applicant_id,applicant_name,applicant_status,applicant_email,applicant_country_code,applicant_contact_number,applicant_country');
		$this->db->from(TBPREFIX.'package_applicants');
		$this->db->where('applicant_email',$applicant_email);
		$this->db->where('applicant_password',md5($applicant_password));
		$res=$this->db->get(); 
		return $tsr=$res->result_array();
	}
	
	public function getmypacklist($applicant_id)
	{
		$this->db->select(TBPREFIX.'servicepackages.order_no,'.TBPREFIX.'servicepackages.company_name,'.TBPREFIX.'businesstype.business_type,'.TBPREFIX.'servicepackages.addeddate,'.TBPREFIX.'servicepackages.package_pdf,package_name');
		$this->db->from(TBPREFIX.'servicepackages');
		$this->db->join(TBPREFIX.'businesstype',TBPREFIX.'businesstype.business_type_id='.TBPREFIX.'servicepackages.business_type','left');
		$this->db->where('applicant_id',$applicant_id);
		$this->db->order_by(TBPREFIX.'servicepackages.pack_id','DESC');
		$res=$this->db->get(); 
		return $tsr=$res->result_array();
	}
	
	public function getmyprofile($applicant_id)
	{
		$this->db->select('applicant_name,applicant_email,applicant_country_code,applicant_contact_number,country_name,applicant_country');
		$this->db->from(TBPREFIX.'package_applicants');
		$this->db->join(TBPREFIX.'country',TBPREFIX.'country.country_id='.TBPREFIX.'package_applicants.applicant_country','left');
		$this->db->where('applicant_id',$applicant_id);
		$res=$this->db->get(); 
		return $tsr=$res->result_array();
	}
	
	public function udpatemyprofile($input_array,$session_applicant_id)
	{
		$this->db->where('applicant_id',$session_applicant_id);
		if($this->db->update(TBPREFIX.'package_applicants',$input_array))
			return true;
		else
			return false;
	}
	
	public function set_userpassword($applicant_email,$applicant_password)
	{
		$this->db->where('applicant_email',$applicant_email);
		$this->db->set('applicant_password',md5($applicant_password));
		if($this->db->update(TBPREFIX.'package_applicants'))
			return true;
		else
			return false;
	}
	
	public function set_userpassword_new($applicant_email,$applicant_password)
	{
		$this->db->where('applicant_email',$applicant_email);
		$this->db->set('applicant_password',md5($applicant_password));
		if($this->db->update(TBPREFIX.'package_applicants'))
			return true;
		else
			return false;
	}
	public function check_getuserexists_otp($otp_id,$applicant_email)
	{		
		$this->db->select(TBPREFIX.'package_applicants.applicant_id,applicant_name');
		$this->db->from(TBPREFIX.'package_applicants');
		$this->db->where('applicant_email',$applicant_email);
		$this->db->where('forget_otp',$otp_id);
		$res=$this->db->get(); 
		return $res->result_array();
	}
	
	public function set_userpassword_otp($applicant_email,$otp)
	{
		$this->db->where('applicant_email',$applicant_email);
		$this->db->set('forget_otp',$otp);
		if($this->db->update(TBPREFIX.'package_applicants'))
			return true;
		else
			return false;
	}
}