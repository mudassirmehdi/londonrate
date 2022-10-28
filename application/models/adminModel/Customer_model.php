<?php
Class Customer_model extends CI_Model 
{
	function __construct()
	{
		
		parent::__construct();
	}
	public function customer_record_count($customer_name,$contact_no,$customer_email)
	{
		if($customer_name!="" && $customer_name!='Na')
	   	{
	   		$customer_name = str_replace('%20', ' ', $customer_name);
			$this->db->like(TBPREFIX.'package_applicants.applicant_name',$customer_name);
		}
		if($contact_no!="" && $contact_no!='Na')
	   	{
	   		$contact_no = str_replace('%20', ' ', $contact_no);
			$this->db->like(TBPREFIX.'package_applicants.applicant_contact_number',$contact_no);
		}
		if($customer_email!="" && $customer_email!='Na')
	   	{
	   		$customer_email = str_replace('%20', ' ', $customer_email);
			$this->db->like(TBPREFIX.'package_applicants.applicant_email',$customer_email);
		}

		$this->db->select('applicant_id');
		$res=$this->db->get(TBPREFIX.'package_applicants');
		return $tsr=$res->num_rows();
	}
	public function getAllCustomer($customer_name,$contact_no,$customer_email,$per_page,$page)
	{
		if($customer_name!="" && $customer_name!='Na')
	   	{
	   		$customer_name = str_replace('%20', ' ', $customer_name);
			$this->db->like(TBPREFIX.'package_applicants.applicant_name',$customer_name);
		}
		if($contact_no!="" && $contact_no!='Na')
	   	{
	   		$contact_no = str_replace('%20', ' ', $contact_no);
			$this->db->like(TBPREFIX.'package_applicants.applicant_contact_number',$contact_no);
		}
		if($customer_email!="" && $customer_email!='Na')
	   	{
	   		$customer_email = str_replace('%20', ' ', $customer_email);
			$this->db->like(TBPREFIX.'package_applicants.applicant_email',$customer_email);
		}
		$this->db->select(TBPREFIX.'package_applicants.*');
		$this->db->order_by(TBPREFIX.'package_applicants.applicant_id','DESC');
		$this->db->limit($per_page,$page);
		$res=$this->db->get(TBPREFIX.'package_applicants');
		return $res->result_array();
	}
	public function deleteCustomer($page_id)
	{
		$this->db->set('applicant_status','Delete');
		$this->db->where('applicant_id',$page_id);
		$res=$this->db->update(TBPREFIX.'package_applicants');
		if($res)
		{
			return true;
		}
		else
		return false;
	}
}