<?php
Class Pages_model extends CI_Model {
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}
	//Inserting code for Page
	public function add_Page($data) 
	{
		$res=$this->db->insert('fdbrd_pages',$data);
		if($res)
		{
			$page_id=$this->db->insert_id();
			return $page_id;
		}
		else
		return false;
	}
	
	
	public function getAllPages($qty)
	{
		$resQty="SELECT * FROM `fdbrd_pages` WHERE `page_id`!=0 $condition ORDER BY `page_id` DESC ";
				
		$query=$this->db->query($resQty);
		if($qty==0)
				return $tsr=$query->num_rows();
		else
			return $tsr=$query->result_array();
	}
	
	public function getSinglePageInfo($page_id,$qury)
	{
		$this->db->select('*');
		$this->db->where('page_id',$page_id);
		$query=$this->db->get("fdbrd_pages");
		if($qury==1)
		{
			return $query->result_array();
		}
		else
		{
			return $query->num_rows();
		}		
	}
	
	
	
	public function upt_page($input_data,$page_id)
	{
		$this->db->where('page_id',$page_id);
		$query=$this->db->update("fdbrd_pages",$input_data);
		if($query==1)
		{
			return true;
		}
		else
		{
			return false;
		}	
	}
	
	public function deletePage($page_id)
	{
		$this->db->where('page_id',$page_id);
		$res=$this->db->delete('fdbrd_pages');
		if($res)
		{
			return true;
		}
		else
		return false;
	}
	
	public function check_pageName($page_name,$page_id)
	{
		$this->db->select('*');
		$this->db->where('page_name',$page_name);
		if($page_id!=0)
			$this->db->where('page_id !=',$page_id);
		$res=$this->db->get('fdbrd_pages');
		return $res->num_rows();
	}
}