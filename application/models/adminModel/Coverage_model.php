<?php
Class Coverage_model extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}
	
	public function addCoverage($data) 
	{
		$res=$this->db->insert(TBPREFIX.'ipcoverage',$data);
		if($res)
		{
			$category_id=$this->db->insert_id();
			return $category_id;
		}
		else
		return false;
	}
	public function fnGetCoverage($coverage_name,$type_name,$coverage_value,$per_page,$page)
	{
		if($coverage_name!="" && $coverage_name!='Na')
	   	{
	   		$coverage_name = str_replace('%20', ' ', $coverage_name);
			$this->db->like('nc.coverage_name',$coverage_name);
		}
		if($type_name!="" && $type_name!='Na')
	    {
	    	$type_name = str_replace('%20', ' ', $type_name);
			$this->db->like('t.type',$type_name);
		}
		if($coverage_value!="" && $coverage_value!='Na')
	    {
	    	
			$this->db->like('nc.cov_value',$coverage_value);
		}
		$this->db->select('	nc.* ,
							t.type,
							');
		$this->db->from('ldr_ipcoverage nc');
		$this->db->join('ldr_iptypes t','nc.typeid  =t.typeid ');
		$this->db->order_by('nc.coverage_id','DESC');
		//$this->db->limit($per_page,$page);
		$res=$this->db->get();
		
		return $res->result_array();
	}
	public function getSingleCoverageInfo($coverage_id,$qury)
	{
		$this->db->select('*');
		$this->db->where('coverage_id',$coverage_id);
		$query=$this->db->get(TBPREFIX.'ipcoverage');
		if($qury==1)
		{
			return $query->result_array();
		}
		else
		{
			return $query->num_rows();
		}		
	}
	public function coverage_record_count($coverage_name,$type_name,$coverage_value)
	{
		if($coverage_name!="" && $coverage_name!='Na')
	   	{
	   		$coverage_name = str_replace('%20', ' ', $coverage_name);
			$this->db->like('nc.coverage_name',$coverage_name);
		}
		if($type_name!="" && $type_name!='Na')
	    {
	    	$type_name = str_replace('%20', ' ', $type_name);
			$this->db->like('t.type',$type_name);
		}
		if($coverage_value!="" && $coverage_value!='Na')
	    {
	    	
			$this->db->like('nc.cov_value',$coverage_value);
		}
		
		$this->db->select('	nc.* ,
							t.type,
							');
		$this->db->from('ldr_ipcoverage nc');
		$this->db->join('ldr_iptypes t','nc.typeid  =t.typeid ');
		$this->db->order_by('nc.coverage_id','DESC');
		//$this->db->limit($per_page,$page);
		$res=$this->db->get();
		return $res->num_rows();
		/*$this->db->select('coverage_id');
		$res=$this->db->get(TBPREFIX.'ipcoverage');
		return $tsr=$res->num_rows();*/
	}
	public function fncheckCoverage($strCoverageName = "",$intTypeId = 0)
	{	
		
		if($strCoverageName!=""){
			$this->db->select('*');
			if($intTypeId > 0)
				$this->db->where('typeid',$intTypeId);	
		
			$this->db->where('coverage_name',$strCoverageName);	
			$res=$this->db->get(TBPREFIX.'ipcoverage');
			
			return $res->num_rows();
		}
		return 0;
	}
	public function check_CoverageName_upt($strCoverageName,$coverage_id)
	{
		$this->db->select('coverage_id');
		$this->db->where('coverage_name',$strCoverageName);
		$this->db->where('coverage_id !=',$coverage_id);
		$query=$this->db->get(TBPREFIX."ipcoverage");
		return $query->num_rows();
	}
	public function upt_Coverage($input_data,$coverage_id)
	{
		$this->db->where('coverage_id',$coverage_id);
		$query=$this->db->update(TBPREFIX."ipcoverage",$input_data);
		if($query==1)
		{
			return true;
		}
		else
		{
			return false;
		}	
	}
	 
}