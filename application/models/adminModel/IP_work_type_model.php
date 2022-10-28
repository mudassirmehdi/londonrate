<?php
Class IP_work_type_model extends CI_Model {
	function __construct()
	{
		
		parent::__construct();
	}
	
	public function add_ipworktype($data) 
	{
		$res=$this->db->insert(TBPREFIX.'ipwork_type',$data);
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
		$this->db->where('type',$page_name);
		$res=$this->db->get(TBPREFIX.'ipwork_type');
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
	public function getCategoryInfo($category_name,$parent_id,$category_type)
	{
		$this->db->select('*');
		$this->db->where('category_name',$category_name);
		$res=$this->db->get(TBPREFIX.'pages');
		return $res->num_rows();
	}
	public function work_type_record_count($object_name,$type_name)
	{
		if($object_name!="" && $object_name!='Na')
	   	{
	   		$object_name = str_replace('%20', ' ', $object_name);
			$this->db->like('o.object',$object_name);
		}
		if($type_name!="" && $type_name!='Na')
	    {
	    	$type_name = str_replace('%20', ' ', $type_name);
			$this->db->like('t.type',$type_name);
		}
		$this->db->select('t.type_id ,
							t.object_id ,
							t.type ,
							t.status ,
							o.object');
		$this->db->from('ldr_ipwork_type t');
		$this->db->join('ldr_ipwork_object o','o.object_id=t.object_id');
		$this->db->order_by('t.type_id','DESC');
		$this->db->limit($per_page,$page);
		$res=$this->db->get();
		return $tsr=$res->num_rows();
	}
	public function getAllWorktype($object_name,$type_name,$per_page,$page)
	{
		if($object_name!="" && $object_name!='Na')
	   	{
	   		$object_name = str_replace('%20', ' ', $object_name);
			$this->db->like('o.object',$object_name);
		}
		if($type_name!="" && $type_name!='Na')
	    {
	    	$type_name = str_replace('%20', ' ', $type_name);
			$this->db->like('t.type',$type_name);
		}
		$this->db->select('t.type_id ,
							t.object_id ,
							t.type ,
							t.status ,
							o.object');
		$this->db->from('ldr_ipwork_type t');
		$this->db->join('ldr_ipwork_object o','o.object_id=t.object_id');
		$this->db->order_by('t.type_id','DESC');
		$this->db->limit($per_page,$page);
		$res=$this->db->get();
		return $res->result_array();
	}
	
	public function getSingleIpWorktypeInfo($page_id,$qury)
	{

		$this->db->where('type_id',$page_id);
		$this->db->select('t.type_id ,
							t.object_id ,
							t.type ,
							t.status ,
							o.object');
		$this->db->from('ldr_ipwork_type t');
		$this->db->join('ldr_ipwork_object o','o.object_id=t.object_id');
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
		$this->db->select('type_id');
		$this->db->where('type',$page_name);
		$this->db->where('type_id !=',$page_id);
		$query=$this->db->get(TBPREFIX."ipwork_type");
		return $query->num_rows();
	}
	public function upt_ipworktype($input_data,$page_id)
	{
		$this->db->where('type_id',$page_id);
		$query=$this->db->update(TBPREFIX."ipwork_type",$input_data);
		if($query==1)
		{
			return true;
		}
		else
		{
			return false;
		}	
	}
	public function deleteipwork_type($page_id)
	{
		$this->db->set('status','Delete');
		$this->db->where('type_id',$page_id);
		$res=$this->db->update(TBPREFIX.'ipwork_type');
		if($res)
		{
			return true;
		}
		else
		return false;
	}
	

}