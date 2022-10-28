<?php
Class IP_work_object_model extends CI_Model {
	function __construct()
	{
		
		parent::__construct();
	}
	
	public function add_ipworkobject($data) 
	{
		$res=$this->db->insert(TBPREFIX.'ipwork_object',$data);
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
		$this->db->where('object',$page_name);
		$res=$this->db->get(TBPREFIX.'ipwork_object');
		return $res->num_rows();
	}

	public function getCategoryInfo($category_name,$parent_id,$category_type)
	{
		$this->db->select('*');
		$this->db->where('category_name',$category_name);
		$res=$this->db->get(TBPREFIX.'pages');
		return $res->num_rows();
	}
	public function work_object_record_count($object_name)
	{
		if($object_name!="" && $object_name!='Na')
	   	{
	   		$object_name = str_replace('%20', ' ', $object_name);
			$this->db->like(TBPREFIX.'ipwork_object.object',$object_name);
		}
		$this->db->select('object_id');
		$res=$this->db->get(TBPREFIX.'ipwork_object');
		return $tsr=$res->num_rows();
	}
	public function getAllWorkObject($object_name,$per_page,$page)
	{
		if($object_name!="" && $object_name!='Na')
	   	{
	   		$object_name = str_replace('%20', ' ', $object_name);
			$this->db->like(TBPREFIX.'ipwork_object.object',$object_name);
		}
		$this->db->select('*');
		$this->db->order_by('object_id','DESC');
		$this->db->limit($per_page,$page);
		$res=$this->db->get(TBPREFIX.'ipwork_object');
		return $res->result_array();
	}
	
	public function getSingleIpWorkObjectInfo($page_id,$qury)
	{
		$this->db->select('*');
		$this->db->where('object_id',$page_id);
		$query=$this->db->get(TBPREFIX.'ipwork_object');
		if($qury==1)
		{
			return $query->result_array();
		}
		else
		{
			return $query->num_rows();
		}		
	}
	
	public function check_objectName_upt($page_name,$page_id)
	{
		$this->db->select('object_id');
		$this->db->where('object',$page_name);
		$this->db->where('object_id !=',$page_id);
		$query=$this->db->get(TBPREFIX."ipwork_object");
		return $query->num_rows();
	}
	public function upt_ipworkobject($input_data,$page_id)
	{
		$this->db->where('object_id',$page_id);
		$query=$this->db->update(TBPREFIX."ipwork_object",$input_data);
		if($query==1)
		{
			return true;
		}
		else
		{
			return false;
		}	
	}
	public function deleteipwork_object($page_id)
	{
		$this->db->set('status','Delete');
		$this->db->where('object_id',$page_id);
		$res=$this->db->update(TBPREFIX.'ipwork_object');
		if($res)
		{
			return true;
		}
		else
		return false;
	}
	

}