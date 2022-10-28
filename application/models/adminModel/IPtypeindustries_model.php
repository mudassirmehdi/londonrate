<?php
Class IPtypeindustries_model extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}
	
	public function addIPtypeindustries($data) 
	{
		$res=$this->db->insert(TBPREFIX.'iptype_industries',$data);
		if($res)
		{
			$iptype_id=$this->db->insert_id();
			return $iptype_id;
		}
		else
		return false;
	}
	public function fnGetIndustries($ind_type_name,$type_name,$coverage_value,$per_page,$page)
	{
		if($ind_type_name!="" && $ind_type_name!='Na')
	   	{
	   		$ind_type_name = str_replace('%20', ' ', $ind_type_name);
			$this->db->like(TBPREFIX.'iptypes.type',$ind_type_name);
		}
		if($type_name!="" && $type_name!='Na')
	    {
	    	$type_name = str_replace('%20', ' ', $type_name);
			$this->db->like(TBPREFIX.'iptype_industries.iptype_name',$type_name);
		}
		
		if($coverage_value!="" && $coverage_value!='Na')
	    {
	    	$coverage_value = str_replace('%20', ' ', $coverage_value);
			$this->db->like(TBPREFIX.'iptype_industries.ipvalue',$coverage_value);
		}
		

		$this->db->select('*');
		$this->db->join(TBPREFIX.'iptypes', TBPREFIX.'iptypes.typeid='.TBPREFIX.'iptype_industries.typeid','left');
		$this->db->order_by('iptype_id','DESC');
		$this->db->limit($per_page,$page);
		$res=$this->db->get(TBPREFIX.'iptype_industries');
		return $res->result_array();
	}
	public function getSingleIndustryInfo($iptype_id,$qury)
	{
		$this->db->select('*');
		$this->db->where('iptype_id',$iptype_id);
		$query=$this->db->get(TBPREFIX.'iptype_industries');
		if($qury==1)
		{
			return $query->result_array();
		}
		else
		{
			return $query->num_rows();
		}		
	}
	public function industry_record_count($ind_type_name,$type_name,$coverage_value)
	{
		if($ind_type_name!="" && $ind_type_name!='Na')
	   	{
	   		$ind_type_name = str_replace('%20', ' ', $ind_type_name);
			$this->db->like(TBPREFIX.'iptypes.type',$ind_type_name);
		}
		if($type_name!="" && $type_name!='Na')
	    {
	    	$type_name = str_replace('%20', ' ', $type_name);
			$this->db->like(TBPREFIX.'iptype_industries.iptype_name',$type_name);
		}
		
		if($coverage_value!="" && $coverage_value!='Na')
	    {
	    	$coverage_value = str_replace('%20', ' ', $coverage_value);
			$this->db->like(TBPREFIX.'iptype_industries.ipvalue',$coverage_value);
		}

		$this->db->select('*');
		$this->db->join(TBPREFIX.'iptypes', TBPREFIX.'iptypes.typeid='.TBPREFIX.'iptype_industries.typeid','left');
		$this->db->order_by('iptype_id','DESC');
		$this->db->limit($per_page,$page);
		$res=$this->db->get(TBPREFIX.'iptype_industries');
		return $tsr=$res->num_rows();
	}
	public function fncheckIndustry($iptype_name = "",$iptype_id="")
	{	
		if($iptype_name!="")
		{
			$this->db->select('*');
			$this->db->where('iptype_name',$iptype_name);	
			$this->db->where('iptype_id',$iptype_id);	
			$res=$this->db->get(TBPREFIX.'iptype_industries');
			
			return $res->num_rows();
		}
		return 0;
	}
	public function check_IndustryName_upt($iptype_name,$iptype_id)
	{
		$this->db->select('iptype_id');
		$this->db->where('iptype_name',$iptype_name);
		$this->db->where('iptype_id !=',$iptype_id);
		$query=$this->db->get(TBPREFIX."iptype_industries");
		return $query->num_rows();
	}
	public function upt_iptype($input_data,$iptype_id)
	{
		$this->db->where('iptype_id',$iptype_id);
		$query=$this->db->update(TBPREFIX."iptype_industries",$input_data);
		if($query==1)
		{
			return true;
		}
		else
		{
			return false;
		}	
	}
	
	public function fnGetType()
	{
		$this->db->select('*');
		$this->db->where('type_status','active');
		$res=$this->db->get(TBPREFIX.'iptypes');
		return $res->result_array();
	}
	
	public function deleteIPtypeindustries($iptype_id) 
	{
		$this->db->set('iptype_status','delete');
		$this->db->where('iptype_id',$iptype_id);
		$res=$this->db->update(TBPREFIX.'iptype_industries');
		if($res)
		{
			return true;
		}
		else
		return false;
	}
	 
}