<?php
Class PackageManagement_model extends CI_Model {
	function __construct()
	{		
		parent::__construct();
	}
	
	public function add_PackageManagement($data) 
	{
		$res=$this->db->insert(TBPREFIX.'package_management',$data);
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
		$this->db->where('package_name',$page_name);
		$res=$this->db->get(TBPREFIX.'package_management');
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
	public function PackageManagement_record_count()
	{
		$this->db->select('pack_manage_id');
		$res=$this->db->get(TBPREFIX.'package_management');
		return $tsr=$res->num_rows();
	}
	public function getAllPackageManagement($per_page,$page)
	{
		$this->db->select('	*');
		$this->db->from(TBPREFIX.'package_management');
		
		$this->db->limit($per_page,$page);
		$res=$this->db->get();
		return $res->result_array();
	}
	
	public function getSinglePackageManagementInfo($page_id,$qury)
	{

		$this->db->where('pack_manage_id',$page_id);
		$this->db->select('*');
		$this->db->from(TBPREFIX.'package_management');
		
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
	
	public function check_typeName_upt($page_name,$page_id)
	{
		$this->db->select('pack_manage_id');
		$this->db->where('package_name',$page_name);
		$this->db->where('pack_manage_id !=',$page_id);
		$query=$this->db->get(TBPREFIX."package_management");
		return $query->num_rows();
	}
	public function upt_PackageManagement($input_data,$page_id)
	{
		$this->db->where('pack_manage_id',$page_id);
		$query=$this->db->update(TBPREFIX."package_management",$input_data);
		if($query==1)
		{
			return true;
		}
		else
		{
			return false;
		}	
	}
	public function deletepackage_management($page_id)
	{
		$this->db->set('package_status','Delete');
		$this->db->where('pack_manage_id',$page_id);
		$res=$this->db->update(TBPREFIX.'package_management');
		if($res)
		{
			return true;
		}
		else
		return false;
	}
	

}