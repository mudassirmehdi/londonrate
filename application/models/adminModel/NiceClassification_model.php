<?php
Class NiceClassification_model extends CI_Model {
	function __construct()
	{
		
		parent::__construct();
	}
	
	public function add_NiceClassification($data) 
	{
		$res=$this->db->insert(TBPREFIX.'nice_classification',$data);
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
		$res=$this->db->get(TBPREFIX.'nice_classification');
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
	public function get_classification_all()
	{
		$this->db->select('*');
		//$this->db->where('type',$page_name);
		$res=$this->db->get(TBPREFIX.'nice_classification');
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
	public function get_nice_by_typeid($objid,$typeid)
	{
		$this->db->select('*');
		$this->db->where('object_id',$objid);
		$this->db->where('type_id',$typeid);
		$res=$this->db->get(TBPREFIX.'nice_classification');
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
	public function NiceClassification_record_count($sel_object,$sel_type,$classification_name)
	{
		$condition='';
		if($sel_object!="" && $sel_object!='Na')
	   {
		   $condition .='  AND  ldr_nice_classification.object_id ="'.$sel_object.'" ';
	   }
	   if($sel_type!="" && $sel_type!='Na')
	   {
		   $condition .='  AND  ldr_nice_classification.type_id ="'.$sel_type.'" ';
	   }
	   if($classification_name!="" && $classification_name!='Na')
	   {
	   		$condition .='  AND ldr_nice_classification.classi_id ="'.$classification_name.'" ';
		    //$condition .='  AND ldr_nice_classification.classi_id LIKE "%'.$classification_name.'%"  ';
	   }
	   
	   $query ="select ldr_nice_classification.classi_id from ldr_nice_classification where ldr_nice_classification.classi_id!=0 $condition order by ldr_nice_classification.classi_id desc ";
	
		
		$qryyy=$this->db->query($query);
		/*if($qry==1)
		{
			return $qryyy->result_array();
		}
		else
		{*/
			return $qryyy->num_rows();
		//}	
	  
		/*$this->db->select('classi_id');
		$res=$this->db->get(TBPREFIX.'nice_classification');
		return $tsr=$res->num_rows();*/
	}
	public function getAllNiceClassification($sel_object,$sel_type,$classification_name,$per_page,$page)
	{
		$condition='';
		if($sel_object!="" && $sel_object!='Na')
	   {
		   $condition .='  AND  nc.object_id ="'.$sel_object.'" ';
	   }
	   if($sel_type!="" && $sel_type!='Na')
	   {
		   $condition .='  AND  nc.type_id ="'.$sel_type.'" ';
	   }
	   if($classification_name!="" && $classification_name!='Na')
	   {
	   		$condition .='  AND  nc.classi_id ="'.$classification_name.'" ';
	   		/*$classification_name = str_replace('%20', ' ', $classification_name);
		    $condition .='  AND nc.nice LIKE "%'.$classification_name.'%"  ';*/
	   }
		/*$this->db->select('	nc.classi_id ,
							nc.type_id ,
							nc.object_id ,
							t.type ,
							nc.status ,
							nc.nice ,
							o.object');
		$this->db->from('ldr_nice_classification nc');
		$this->db->join('ldr_ipwork_type t','nc.type_id=t.type_id');
		$this->db->join('ldr_ipwork_object o','nc.object_id=o.object_id');
		$this->db->order_by('nc.classi_id','DESC');
		$this->db->limit($per_page,$page);
		$res=$this->db->get();
		return $res->result_array();*/


		$query ="select nc.classi_id,
					nc.type_id,
					nc.object_id,
					nc.status,
					nc.nice,
				 t.type,
				 o.object
				from ldr_nice_classification nc
				LEFT JOIN ldr_ipwork_type t ON t.type_id=nc.type_id 
				LEFT JOIN ldr_ipwork_object o ON o.object_id=nc.object_id
				where nc.classi_id!=0 $condition order by nc.classi_id desc ";
	
    	if($per_page!="")
			$query .="LIMIT $page,$per_page";
		
		$qryyy=$this->db->query($query);
		/*if($qry==1)
		{*/
			return $qryyy->result_array();
		/*}
		else
		{
			return $qryyy->num_rows();
		}	*/
	}
	
	public function getSingleNiceClassificationInfo($page_id,$qury)
	{

		$this->db->where('classi_id',$page_id);
		$this->db->select('	nc.classi_id ,
							nc.type_id ,
							nc.object_id ,
							t.type ,
							nc.status ,
							nc.nice ,
							o.object');
		$this->db->from('ldr_nice_classification nc');
		$this->db->join('ldr_ipwork_type t','nc.type_id=t.type_id');
		$this->db->join('ldr_ipwork_object o','nc.object_id=o.object_id');
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
		$this->db->select('classi_id');
		$this->db->where('nice',$page_name);
		$this->db->where('classi_id !=',$page_id);
		$query=$this->db->get(TBPREFIX."nice_classification");
		return $query->num_rows();
	}
	public function upt_NiceClassification($input_data,$page_id)
	{
		$this->db->where('classi_id',$page_id);
		$query=$this->db->update(TBPREFIX."nice_classification",$input_data);
		if($query==1)
		{
			return true;
		}
		else
		{
			return false;
		}	
	}
	public function deletenice_classification($page_id)
	{
		$this->db->set('status','Delete');
		$this->db->where('classi_id',$page_id);
		$res=$this->db->update(TBPREFIX.'nice_classification');
		if($res)
		{
			return true;
		}
		else
		return false;
	}
	

}