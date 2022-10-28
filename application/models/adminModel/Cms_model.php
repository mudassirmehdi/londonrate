<?php
Class Cms_model extends CI_Model {
	function __construct()
	{
		
		parent::__construct();
	}
	
	public function add_cms($data) 
	{
		$res=$this->db->insert(TBPREFIX.'pages',$data);
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
		$this->db->where('page_name',$page_name);
		$res=$this->db->get(TBPREFIX.'pages');
		return $res->num_rows();
	}

	public function getCategoryInfo($category_name,$parent_id,$category_type)
	{
		$this->db->select('*');
		$this->db->where('category_name',$category_name);
		$res=$this->db->get(TBPREFIX.'pages');
		return $res->num_rows();
	}
	public function cms_record_count()
	{
		$this->db->select('page_id');
		$res=$this->db->get(TBPREFIX.'pages');
		return $tsr=$res->num_rows();
	}
	public function getAllCms($per_page,$page)
	{
		$this->db->select('*');
		$this->db->order_by('page_id','DESC');
		$this->db->limit($per_page,$page);
		$res=$this->db->get(TBPREFIX.'pages');
		return $res->result_array();
	}
	
	public function getSingleCmsInfo($page_id,$qury)
	{
		$this->db->select('*');
		$this->db->where('page_id',$page_id);
		$query=$this->db->get(TBPREFIX.'pages');
		if($qury==1)
		{
			return $query->result_array();
		}
		else
		{
			return $query->num_rows();
		}		
	}
	
	public function check_cmsName_upt($page_name,$page_id)
	{
		$this->db->select('page_id');
		$this->db->where('page_name',$page_name);
		$this->db->where('page_id !=',$page_id);
		$query=$this->db->get(TBPREFIX."pages");
		return $query->num_rows();
	}
	public function upt_cms($input_data,$page_id)
	{
		$this->db->where('page_id',$page_id);
		$query=$this->db->update(TBPREFIX."pages",$input_data);
		if($query==1)
		{
			return true;
		}
		else
		{
			return false;
		}	
	}
	public function deleteCmss($page_id)
	{
		$this->db->set('page_status','Delete');
		$this->db->where('page_id',$page_id);
		$res=$this->db->update(TBPREFIX.'pages');
		if($res)
		{
			return true;
		}
		else
		return false;
	}
	public function getPageData($strPageName="")
	 {
	  $this->db->select('*');
	  $this->db->where('page_name',$strPageName);
	  $query=$this->db->get(TBPREFIX."pages");
	  return $query->result_array();
	 }
	

}