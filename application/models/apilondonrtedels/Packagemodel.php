<?php	defined('BASEPATH') OR exit('No direct script access allowed');	

class Packagemodel extends CI_Model 
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		date_default_timezone_set('Asia/Kolkata');
	}
	public function updatefirstpurchasepackage($applicant_country,$applicant_id)
	{
		$this->db->where('applicant_id',$applicant_id);
		$this->db->set('applicant_country',$applicant_country);
		$this->db->update(TBPREFIX.'package_applicants');
		return true;
	}
	
	public function addpurchasepackage($insert_array)
	{
		$res=$this->db->insert(TBPREFIX.'servicepackages',$insert_array);
		return $this->db->insert_id();
	}
	
	public function getMAinpackageName($main_package_id)
	{
		$this->db->select('*');
		$this->db->where('pack_manage_id',$main_package_id);
		$res=$this->db->get(TBPREFIX.'package_management');
		return $rr=$res->result_array();
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
	
	public function addforsecoundform($input_array,$table_name)
	{
		$res=$this->db->insert(TBPREFIX.$table_name,$input_array);
		if($res)
			return $this->db->insert_id();
		else
			return false;
	}
	
	public function getAllBusinesstypelist()
	{
		$this->db->select('*');
		$res=$this->db->get(TBPREFIX.'businesstype');
		return $rr=$res->result_array();
		
	}
	 
public function fnGetYearValue($intYear)
	{
		$this->db->select('*');
		$this->db->where('years',$intYear);
		$res=$this->db->get(TBPREFIX.'years');
		$tt=$res->result_array();
		return $tt[0]['mob_value'];
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
	
	public function getpotentialcustomers($pack_id)
	{
		$this->db->select('potential_customer');
		$this->db->where('pack_id',$pack_id);
		$res=$this->db->get(TBPREFIX.'package_potential_customer');
		return $res->result_array();
	}
	
	public function addOrderTransaction($arrOrderTxnData)
	{
		$res=$this->db->insert(TBPREFIX.'package_order_transaction',$arrOrderTxnData);
		if($res)
			return $this->db->insert_id();
		else
			return false;
	}
	
	public function getapplicantdata($applicant_id)
	{
		$this->db->select('*');
		$this->db->where('applicant_id',$applicant_id);
		$res=$this->db->get(TBPREFIX.'package_applicants');
		return $res->result_array();
	}
	
	public function getAllIPworklist()
	{
		$this->db->select('*');
		$this->db->where('status','Active');
		$res=$this->db->get(TBPREFIX.'ipwork_object');
		return $res->result_array();
	}
	
	public function getAllTypeWorklist($object_id)
	{
		$this->db->select('*');
		$this->db->where('status','Active');
		$this->db->where('object_id',$object_id);
		$res=$this->db->get(TBPREFIX.'ipwork_type');
		return $res->result_array();
	}
	
	public function getAllIndustryUsagelist($object_id,$type_id)
	{
		$this->db->select('*');
		$this->db->where('object_id',$object_id);
		$this->db->where('type_id',$type_id);
		$res=$this->db->get(TBPREFIX.'ipwork_usage');
		return $res->result_array();
	}
	
	public function getAllCovergearealist($object_id,$type_id)
	{
		$this->db->select('*');
		$this->db->where('object_id',$object_id);
		$this->db->where('type_id',$type_id);
		$res=$this->db->get(TBPREFIX.'coverage_area');
		return $res->result_array();
	}
	
	public function getAllNicelist($object_id,$type_id)
	{
		$this->db->select('*');
		$this->db->where('object_id',$object_id);
		$this->db->where('status','Active');
		$this->db->where('type_id',$type_id);
		$res=$this->db->get(TBPREFIX.'nice_classification');
		return $res->result_array();
	}
	
	public function arrIndustrieslist($object_id,$type_id)
	{
		$this->db->select('*');
		$this->db->where('object_id',$object_id);
		$this->db->where('type_id',$type_id);
		$res=$this->db->get(TBPREFIX.'industries');
		return $res->result_array();
	}
	
	public function savepdftotable($pdfFilename,$new_pack_id)
	{
		$this->db->set('package_pdf',$pdfFilename);
		$this->db->where('pack_id',$new_pack_id);
		$res=$this->db->update(TBPREFIX.'servicepackages');
		if($res)
			return true;
		else
			return false;
	}
	
	
}