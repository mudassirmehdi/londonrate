<?php
Class Questionnaire_model extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}
	
	public function savepdftotable($pdfFilename,$pack_id)
	{
		$this->db->where('pack_id',$pack_id);
		$this->db->set('package_pdf',$pdfFilename);
		$res=$this->db->update(TBPREFIX.'servicepackages');
		if($res)
			return true;
		else
			return false;
	}
	
	public function addapplicant($insert_array)
	{
		$insert_array['addeddate']=date('Y-m-d H:i:s');
		$insert_array['updateddate']=date('Y-m-d H:i:s');
		$res=$this->db->insert(TBPREFIX.'package_applicants',$insert_array);
		if($res)
			return $this->db->insert_id();
		else
			return false;
	}
	
	 
	public function adduniversalpackage($insert_array)
	{
		$res=$this->db->insert(TBPREFIX.'servicepackages',$insert_array);
		if($res)
			return $this->db->insert_id();
		else
			return false;
	}
	
	public function getcountry()
	{
		$res=$this->db->get(TBPREFIX.'country');
		return $res->result_array();
	}
	
	public function addforsecoundform($input_array,$table_name)
	{
		$res=$this->db->insert(TBPREFIX.$table_name,$input_array);
		if($res)
			return $this->db->insert_id();
		else
			return false;
	}
	
	public function getbusinesslist()
	{
		$res=$this->db->get(TBPREFIX.'businesstype');
		return $res->result_array();
	}
	
	public function fnGetYearValue($intYear)
	{
		$this->db->select('*');
		$this->db->where('years',$intYear);
		$res=$this->db->get(TBPREFIX.'years');
		$tt=$res->result_array();
		return $tt[0]['mob_value'];
	}
	
	public function getobjectofIPwork()
	{
		$res=$this->db->get(TBPREFIX.'ipwork_object');
		return $res->result_array();
	}
	public function getipworktype($ip_work_object)
	{
		$this->db->where('object_id',$ip_work_object);
		$res=$this->db->get(TBPREFIX.'ipwork_type');
		return $res->result_array();
	}
	
	public function getIPworkusage()
	{
		$this->db->group_by('usage');
		$res=$this->db->get(TBPREFIX.'ipwork_usage');
		return $res->result_array();
	}
	
	public function getcoveragearea($ip_work_type,$ip_work_object)
	{
		$this->db->where('type_id',$ip_work_type);
		$this->db->where('object_id',$ip_work_object);
		$res=$this->db->get(TBPREFIX.'coverage_area');
		return $res->result_array();
	}
	
	public function getreviewinfo($reviewobject,$pack_id)
	{
		$this->db->select(TBPREFIX.'package_ip_works_information.ip_work_title,registration_date,registration_org,ip_work_status,'.TBPREFIX.'ipwork_type.type');
		$this->db->where('pack_id',$pack_id);
		$this->db->where('reviewobject',$reviewobject);
		$this->db->join(TBPREFIX.'ipwork_type',TBPREFIX.'ipwork_type.type_id='.TBPREFIX.'package_ip_works_information.ip_work_type','left');
		$res=$this->db->get(TBPREFIX.'package_ip_works_information');
		return $res->result_array();
	}
	
	public function getbusinessindustry($business_type)
	{
		$this->db->select('business_type');
		$this->db->where('business_type_id',$business_type);
		$res=$this->db->get(TBPREFIX.'businesstype');
		return $res->result_array();
	}
	public function getpotentialcustomers($pack_id)
	{
		$this->db->select('potential_customer');
		$this->db->where('pack_id',$pack_id);
		$res=$this->db->get(TBPREFIX.'package_potential_customer');
		return $res->result_array();
	}
	
	public function checkapplicantexists($applicant_email)
	{
		$this->db->select('applicant_id,applicant_email,applicant_name,applicant_country,applicant_country_code,applicant_contact_number');
		$this->db->where('applicant_email',$applicant_email);
		$res=$this->db->get(TBPREFIX.'package_applicants');
		return $res->result_array();
	}
	public function checkapplicantpaswordexists($applicant_email,$mdpassword)
	{
		$this->db->select('applicant_id,applicant_email');
		$this->db->where('applicant_email',$applicant_email);
		$this->db->where('applicant_password',$mdpassword);
		$res=$this->db->get(TBPREFIX.'package_applicants');
		return $res->num_rows();
	}
	
	public function updateordernumber($order_no,$pack_id)
	{
		$this->db->where('pack_id',$pack_id);
		$this->db->set('order_no',$order_no);
		$res=$this->db->update(TBPREFIX.'servicepackages');
		if($res)
			return true;
		else
			return false;
	}
	
	public function getniceclass($ip_work_type,$ip_work_object)
	{
		$this->db->where('type_id',$ip_work_type);
		$this->db->where('object_id',$ip_work_object);
		$res=$this->db->get(TBPREFIX.'nice_classification');
		return $res->result_array();
	}
	
	public function getindustries($ip_work_type,$ip_work_object)
	{
		$this->db->where('type_id',$ip_work_type);
		$this->db->where('object_id',$ip_work_object);
		$res=$this->db->get(TBPREFIX.'industries');
		return $res->result_array();
	}
	
	public function getindustriesdata($industries)
	{
		$this->db->select('industries');
		$this->db->where('ind_id',$industries);
		$res=$this->db->get(TBPREFIX.'industries');
		return $res->result_array();
	}
	
	public function getnicedata($nice_classification)
	{
		$this->db->select('nice');
		$this->db->where('classi_id',$nice_classification);
		$res=$this->db->get(TBPREFIX.'nice_classification');
		return $res->result_array();
	}
	
	public function getajaxbyipworkusage($ip_work_type,$ip_work_object)
	{
		
		$this->db->where('type_id',$ip_work_type);
		$this->db->where('object_id',$ip_work_object);
		$res=$this->db->get(TBPREFIX.'ipwork_usage');
		return $res->result_array();
	}
	
	public function getMAinpackageName($session_package_name)
	{
		$this->db->select('*');
		$this->db->where('package_name',$session_package_name);
		$res=$this->db->get(TBPREFIX.'package_management');
		return $rr=$res->result_array();
	}
	
	public function addOrderTransaction($arrOrderTxnData)
	{
		$res=$this->db->insert(TBPREFIX.'package_order_transaction',$arrOrderTxnData);
		if($res)
			return true;
		else
			return false;
	}
	
}