<?php
Class ServicePackages_model extends CI_Model {
	function __construct()
	{
		parent::__construct();
	}
	
	public function add_ServicePackages($data) 
	{
		$res=$this->db->insert(TBPREFIX.'servicepackages',$data);
		if($res)
		{
			$category_id=$this->db->insert_id();
			return $category_id;
		}
		else
		return false;
	}
	public function check_pageName($page_name)
	{
		$this->db->select('*');
		$this->db->where('nice',$page_name);
		$res=$this->db->get(TBPREFIX.'servicepackages');
		return $res->num_rows();
	}
	public function get_object_all()
	{
		$this->db->select('*');
		//$this->db->where('type',$page_name);
		$res=$this->db->get(TBPREFIX.'ipwork_object');
		//return $res->result_array();
		return $res->result();
	}
	public function get_country_all()
	{
		$this->db->select('*');
		//$this->db->where('type',$page_name);
		$res=$this->db->get(TBPREFIX.'country');
		//return $res->result_array();
		return $res->result();
	}
	public function get_package_all()
	{
		$this->db->select('*');
		//$this->db->where('type',$page_name);
		$res=$this->db->get(TBPREFIX.'package_management');
		//return $res->result_array();
		return $res->result();
	}
	public function get_type_all()
	{
		$this->db->select('*');
		//$this->db->where('type',$page_name);
		$res=$this->db->get(TBPREFIX.'ipwork_type');
		//return $res->result_array();
		return $res->result();
	}
	public function get_type_by_objectid($objid)
	{
		$this->db->select('*');
		$this->db->where('object_id',$objid);
		$res=$this->db->get(TBPREFIX.'ipwork_type');
		//return $res->result_array();
		return $res->result();
	}
	public function getCategoryInfo($category_name,$parent_id,$category_type)
	{
		$this->db->select('*');
		$this->db->where('category_name',$category_name);
		$res=$this->db->get(TBPREFIX.'pages');
		return $res->num_rows();
	}
	public function ServicePackages_record_count($order_id,$package_name,$applicant_name,$country_name,$from_date,$to_date,$pay_status)
	{
		if($order_id!="" && $order_id!='Na')
	   	{
			$this->db->where('nc.order_no',$order_id);
		}
		if($package_name!="" && $package_name!='Na')
	    {
			$this->db->where('nc.package_name',$package_name);
		}
		if($applicant_name!="" && $applicant_name!='Na')
		{
		   	$applicant_name = str_replace('%20', ' ', $applicant_name);
			$this->db->where('t.applicant_name',$applicant_name);
		}
		 if($country_name!="" && $country_name!='Na')
	   {
			$this->db->where('o.country_id',$country_name);
		}
		if($from_date!="" && $from_date!='Na')
	   {	$from_date = str_replace('_', '/', $from_date);
	   		$this->db->where('nc.addeddate >=',date('Y-m-d',strtotime($from_date)));
			//$this->db->where('nc.applicant_country2',$country_name);
		}
		if($to_date!="" && $to_date!='Na')
	   {	$to_date = str_replace('_', '/', $to_date);
	   		$this->db->where('nc.addeddate <=',date('Y-m-d',strtotime($to_date)));
			//$this->db->where('nc.applicant_country2',$country_name);
		}
		if($pay_status!="" && $pay_status!='Na')
	   {
			$this->db->where('tr.payment_status',$pay_status);
		}

			$this->db->where('nc.status',"Active");
		
		$this->db->select('	nc.* ,
							t.applicant_name,
							o.country_name,
							tr.payment_status');
		$this->db->from('ldr_servicepackages nc');
		$this->db->join('ldr_package_applicants t','nc.applicant_id =t.applicant_id','left');
		$this->db->join('ldr_country o','o.country_id =t.applicant_country','left');
		$this->db->join('ldr_package_order_transaction tr','tr.order_id =nc.pack_id','left');
		$this->db->group_by('nc.pack_id');
		$this->db->order_by('nc.pack_id','DESC');
		//$this->db->limit($per_page,$page);
		$res=$this->db->get();
		return $res->num_rows();
	}
	public function getAllServicePackages($order_id,$package_name,$applicant_name,$country_name,$from_date,$to_date,$pay_status,$per_page,$page)
	{
		if($order_id!="" && $order_id!='Na')
	   	{
			$this->db->where('nc.order_no',$order_id);
		}
		if($package_name!="" && $package_name!='Na')
	    {
			$this->db->where('nc.package_name',$package_name);
		}
		if($applicant_name!="" && $applicant_name!='Na')
	    {
		   	$applicant_name = str_replace('%20', ' ', $applicant_name);
			$this->db->where('t.applicant_name',$applicant_name);
		}
		 if($country_name!="" && $country_name!='Na')
	    {
			$this->db->where('o.country_id',$country_name);
		}
		if($from_date!="" && $from_date!='Na')
	   {	$from_date = str_replace('_', '/', $from_date);
	   		$this->db->where('nc.addeddate >=',date('Y-m-d',strtotime($from_date)));
			//$this->db->where('nc.applicant_country2',$country_name);
		}
		if($to_date!="" && $to_date!='Na')
	   {	$to_date = str_replace('_', '/', $to_date);
	   		$this->db->where('nc.addeddate <=',date('Y-m-d',strtotime($to_date)));
			//$this->db->where('nc.applicant_country2',$country_name);
		}
		if($pay_status!="" && $pay_status!='Na')
	   {
			$this->db->where('tr.payment_status',$pay_status);
		}
		$this->db->where('nc.status',"Active");
		$this->db->select('	nc.* ,
							t.applicant_name,
							o.country_name,
							tr.payment_status');
		$this->db->from('ldr_servicepackages nc');
		$this->db->join('ldr_package_applicants t','nc.applicant_id =t.applicant_id','left');
		$this->db->join('ldr_country o','o.country_id =t.applicant_country','left');
		$this->db->join('ldr_package_order_transaction tr','tr.order_id =nc.pack_id','left');
		$this->db->group_by('nc.pack_id');
		$this->db->order_by('nc.pack_id','DESC');
		$this->db->limit($per_page,$page);
		$res=$this->db->get();
		return $res->result_array();
	}
	public function getAllServicePackagesExcel($order_id,$package_name,$applicant_name,$country_name,$from_date,$to_date,$pay_status)
	{
		if($order_id!="" && $order_id!='Na')
	   	{
			$this->db->where('nc.order_no',$order_id);
		}
		if($package_name!="" && $package_name!='Na')
	    {
			$this->db->where('nc.package_name',$package_name);
		}
		if($applicant_name!="" && $applicant_name!='Na')
	    {
		   	$applicant_name = str_replace('%20', ' ', $applicant_name);
			$this->db->where('t.applicant_name',$applicant_name);
		}
		 if($country_name!="" && $country_name!='Na')
	    {
			$this->db->where('o.country_id',$country_name);
		}
		if($from_date!="" && $from_date!='Na')
	   {	$from_date = str_replace('_', '/', $from_date);
	   		$this->db->where('nc.addeddate >=',date('Y-m-d',strtotime($from_date)));
			//$this->db->where('nc.applicant_country2',$country_name);
		}
		if($to_date!="" && $to_date!='Na')
	   {	$to_date = str_replace('_', '/', $to_date);
	   		$this->db->where('nc.addeddate <=',date('Y-m-d',strtotime($to_date)));
			//$this->db->where('nc.applicant_country2',$country_name);
		}
		if($pay_status!="" && $pay_status!='Na')
	   {
			$this->db->where('tr.payment_status',$pay_status);
		}
		$this->db->where('nc.status',"Active");
		$this->db->select('	nc.* ,
							t.applicant_name,
							o.country_name,
							tr.payment_status');
		$this->db->from('ldr_servicepackages nc');
		$this->db->join('ldr_package_applicants t','nc.applicant_id =t.applicant_id','left');
		$this->db->join('ldr_country o','o.country_id =t.applicant_country','left');
		$this->db->join('ldr_package_order_transaction tr','tr.order_id =nc.pack_id','left');
		$this->db->group_by('nc.pack_id');
		$this->db->order_by('nc.pack_id','DESC');
		//$this->db->limit($per_page,$page);
		$res=$this->db->get();
		return $res->result_array();
	}
	public function getSingleServicePackagesInfo($page_id,$qury)
	{

		$this->db->where('nc.pack_id',$page_id);
		$this->db->select('	nc.* ,
							t.applicant_name,
							o.country_name');
		$this->db->from('ldr_servicepackages nc');
		$this->db->join('ldr_package_applicants t','nc.applicant_id =t.applicant_id');
		$this->db->join('ldr_country o','o.country_id =nc.applicant_country2');
		$query=$this->db->get();
		if($qury==1)
		{
			return $query->result_array();
		}
		else
		{
			return $query->num_rows();
		}		
	}
	public function getServicePackages_works_informationInfo($page_id)
	{
		$this->db->where('nc.pack_id',$page_id);
		$this->db->select('	nc.* ,
							t.type,
							i.industries,
							o.object');
		$this->db->from('ldr_package_ip_works_information nc');
		$this->db->join('ldr_ipwork_type t','nc.ip_work_type =t.type_id');
		$this->db->join('ldr_ipwork_object o','o.object_id =nc.ip_work_object');
		$this->db->join('ldr_industries i','i.ind_id =nc.industry_ip_work');
		$query=$this->db->get();
		return $query->result_array();
	}
	public function getServicePackagesmain_productsInfo($page_id)
	{
		$this->db->where('nc.pack_id',$page_id);
		$this->db->select('	nc.*');
		$this->db->from('ldr_package_main_products nc');
		
		$query=$this->db->get();
		return $query->result_array();
	}
	public function getServicePackagespotential_competitorInfo($page_id)
	{
		$this->db->where('nc.pack_id',$page_id);
		$this->db->select('	nc.*');
		$this->db->from('ldr_package_potential_competitor nc');
		
		$query=$this->db->get();
		return $query->result_array();
	}
	public function getServicePackagespotential_customerInfo($page_id)
	{
		$this->db->where('nc.pack_id',$page_id);
		$this->db->select('	nc.*');
		$this->db->from('ldr_package_potential_customer nc');
		
		$query=$this->db->get();
		return $query->result_array();
	}
	public function check_typeName_upt($page_name,$page_id)
	{
		$this->db->select('pack_id');
		$this->db->where('nice',$page_name);
		$this->db->where('pack_id !=',$page_id);
		$query=$this->db->get(TBPREFIX."servicepackages");
		return $query->num_rows();
	}
	public function upt_ServicePackages($input_data,$page_id)
	{
		$this->db->where('pack_id',$page_id);
		$query=$this->db->update(TBPREFIX."servicepackages",$input_data);
		if($query==1)
		{
			return true;
		}
		else
		{
			return false;
		}	
	}
	public function deleteservicepackages($page_id)
	{
		$this->db->set('status','Delete');
		$this->db->where('pack_id',$page_id);
		$res=$this->db->update(TBPREFIX.'servicepackages');
		if($res)
		{
			return true;
		}
		else
		return false;
	}
	

}