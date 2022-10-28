<?php
Class Industry_model extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}
	
	public function addIndustry($data) 
	{
		$res=$this->db->insert(TBPREFIX.'prot_industries',$data);
		if($res)
		{
			$category_id=$this->db->insert_id();
			return $category_id;
		}
		else
		return false;
	}
	public function fnGetIndustries($industri_name,$type_name,$coverage_value,$ip_certificate,$per_page,$page)
	{
		if($industri_name!="" && $industri_name!='Na')
	   	{
	   		$industri_name = str_replace('%20', ' ', $industri_name);
			$this->db->like(TBPREFIX.'prot_industries.ind_name',$industri_name);
		}
		if($type_name!="" && $type_name!='Na')
	    {
	    	$type_name = str_replace('%20', ' ', $type_name);
			$this->db->like(TBPREFIX.'iptypes.type',$type_name);
		}
		if($coverage_value!="" && $coverage_value!='Na')
	    {
	    	
			$this->db->like(TBPREFIX.'prot_industries.ipvalue',$coverage_value);
		}
		if($ip_certificate!="" && $ip_certificate!='Na')
	    {
	    	$ip_certificate = str_replace('%20', ' ', $ip_certificate);
			$this->db->like(TBPREFIX.'ipcertificates.cert_name',$ip_certificate);
		}
		
		$this->db->select(TBPREFIX.'prot_industries.*,'.TBPREFIX.'iptypes.type,'.TBPREFIX.'ipcertificates.cert_name');
		$this->db->join(TBPREFIX.'iptypes', TBPREFIX.'iptypes.typeid='.TBPREFIX.'prot_industries.typeid','left');
		$this->db->join(TBPREFIX.'ipcertificates', TBPREFIX.'ipcertificates.cert_id='.TBPREFIX.'prot_industries.cert_id','left');
		$this->db->order_by(TBPREFIX.'prot_industries.ind_id','DESC');
		$this->db->limit($per_page,$page);
		$res=$this->db->get(TBPREFIX.'prot_industries');
		return $res->result_array();
	}
	public function getSingleIndustryInfo($ind_id,$qury)
	{
		$this->db->select('*');
		$this->db->where('ind_id',$ind_id);
		$query=$this->db->get(TBPREFIX.'prot_industries');
		if($qury==1)
		{
			return $query->result_array();
		}
		else
		{
			return $query->num_rows();
		}		
	}
	public function industry_record_count($industri_name,$type_name,$coverage_value,$ip_certificate)
	{
		if($industri_name!="" && $industri_name!='Na')
	   	{
	   		$industri_name = str_replace('%20', ' ', $industri_name);
			$this->db->like(TBPREFIX.'prot_industries.ind_name',$industri_name);
		}
		if($type_name!="" && $type_name!='Na')
	    {
	    	$type_name = str_replace('%20', ' ', $type_name);
			$this->db->like(TBPREFIX.'iptypes.type',$type_name);
		}
		if($coverage_value!="" && $coverage_value!='Na')
	    {
	    	
			$this->db->like(TBPREFIX.'prot_industries.ipvalue',$coverage_value);
		}
		if($ip_certificate!="" && $ip_certificate!='Na')
	    {
	    	$ip_certificate = str_replace('%20', ' ', $ip_certificate);
			$this->db->like(TBPREFIX.'ipcertificates.cert_name',$ip_certificate);
		}

		$this->db->select(TBPREFIX.'prot_industries.*,'.TBPREFIX.'iptypes.type,'.TBPREFIX.'ipcertificates.cert_name');
		$this->db->join(TBPREFIX.'iptypes', TBPREFIX.'iptypes.typeid='.TBPREFIX.'prot_industries.typeid','left');
		$this->db->join(TBPREFIX.'ipcertificates', TBPREFIX.'ipcertificates.cert_id='.TBPREFIX.'prot_industries.cert_id','left');
		$this->db->order_by(TBPREFIX.'prot_industries.ind_id','DESC');
		$this->db->limit($per_page,$page);
		$res=$this->db->get(TBPREFIX.'prot_industries');
		/*$this->db->select('ind_id');
		$res=$this->db->get(TBPREFIX.'prot_industries');*/
		return $tsr=$res->num_rows();
	}
	public function fncheckIndustry($strIndustryName = "",$cert_id='',$typeid='')
	{	
		if($strIndustryName!="")
		{
			$this->db->select('*');
			$this->db->where('ind_name',$strIndustryName);
			$this->db->where('cert_id',$cert_id);
			$this->db->where('typeid',$typeid);			
			$res=$this->db->get(TBPREFIX.'prot_industries');
			
			return $res->num_rows();
		}
		return 0;
	}
	public function check_IndustryName_upt($strIndustryName,$cert_id='',$typeid='',$ind_id)
	{
		$this->db->select('ind_id');
		$this->db->where('ind_name',$strIndustryName);
		$this->db->where('cert_id',$cert_id);
		$this->db->where('typeid',$typeid);	
		$this->db->where('ind_id !=',$ind_id);
		$query=$this->db->get(TBPREFIX."prot_industries");
		return $query->num_rows();
	}
	public function updatIndustry($input_data,$ind_id)
	{
		$this->db->where('ind_id',$ind_id);
		$query=$this->db->update(TBPREFIX."prot_industries",$input_data);
		if($query==1)
		{
			return true;
		}
		else
		{
			return false;
		}	
	}
	public function fnGetIpcertificateType1($typeid)
	{
		$this->db->select('*');
		$this->db->where('typeid',$typeid);
		$res=$this->db->get(TBPREFIX.'ipcertificates');
		return $res->result_array();
	}
	
	public function fnGetIpcertificateType()
	{
		$this->db->select('*');
		$res=$this->db->get(TBPREFIX.'ipcertificates');
		return $res->result_array();
	}
	
	public function deleteProtectedindustries($ind_id)
	{
		$this->db->where('ind_id',$ind_id);
		$this->db->set('ind_status','delete');
		$query=$this->db->update(TBPREFIX."prot_industries");
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