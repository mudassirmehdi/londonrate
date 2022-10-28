<?php
Class Testimonials_model extends CI_Model {
	function __construct()
	{
		
		parent::__construct();
	}
	
	public function add_testimonials($data) 
	{
		$res=$this->db->insert(TBPREFIX.'testimonials',$data);
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
		$this->db->where('title_name',$page_name);
		$res=$this->db->get(TBPREFIX.'testimonials');
		return $res->num_rows();
	}

	public function getCategoryInfo($category_name,$parent_id,$category_type)
	{
		$this->db->select('*');
		$this->db->where('category_name',$category_name);
		$res=$this->db->get(TBPREFIX.'pages');
		return $res->num_rows();
	}
	public function testimonials_record_count($title_name,$test_position)
	{
		if($title_name!="" && $title_name!='Na')
	   	{
	   		$title_name = str_replace('%20', ' ', $title_name);
			$this->db->like(TBPREFIX.'testimonials.title_name',$title_name);
		}
		if($test_position!="" && $test_position!='Na')
	   	{
	   		$test_position = str_replace('%20', ' ', $test_position);
			$this->db->like(TBPREFIX.'testimonials.test_position',$test_position);
		}
		$this->db->select('test_id');
		$res=$this->db->get(TBPREFIX.'testimonials');
		return $tsr=$res->num_rows();
	}
	public function getAllTestimonials($title_name,$test_position,$per_page,$page)
	{
		if($title_name!="" && $title_name!='Na')
	   	{
	   		$title_name = str_replace('%20', ' ', $title_name);
			$this->db->like(TBPREFIX.'testimonials.title_name',$title_name);
		}
		if($test_position!="" && $test_position!='Na')
	   	{
	   		$test_position = str_replace('%20', ' ', $test_position);
			$this->db->like(TBPREFIX.'testimonials.test_position',$test_position);
		}
		$this->db->select(TBPREFIX.'testimonials.*');
		$this->db->order_by(TBPREFIX.'testimonials.test_id','DESC');
		$this->db->limit($per_page,$page);
		$res=$this->db->get(TBPREFIX.'testimonials');
		return $res->result_array();
	}
	public function getSingletestimonialsInfo($page_id,$qury)
	{
		$this->db->select('*');
		$this->db->where('test_id',$page_id);
		$query=$this->db->get(TBPREFIX.'testimonials');
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
		$this->db->select('test_id');
		$this->db->where('title_name',$page_name);
		$this->db->where('test_id !=',$page_id);
		$query=$this->db->get(TBPREFIX."testimonials");
		return $query->num_rows();
	}
	public function upt_testimonials($input_data,$page_id)
	{
		$this->db->where('test_id',$page_id);
		$query=$this->db->update(TBPREFIX."testimonials",$input_data);
		if($query==1)
		{
			return true;
		}
		else
		{
			return false;
		}	
	}
	public function deletetestimonials($page_id)
	{
		$this->db->set('status','Delete');
		$this->db->where('test_id',$page_id);
		$res=$this->db->update(TBPREFIX.'testimonials');
		if($res)
		{
			return true;
		}
		else
		return false;
	}
	

}