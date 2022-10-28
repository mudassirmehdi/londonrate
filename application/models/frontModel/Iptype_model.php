<?php
Class Iptype_model extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}
	
	 
	public function fnGetIpType()
	{
		$this->db->select('*');
		$this->db->where('type_status','active');
		$res=$this->db->get(TBPREFIX.'iptypes');
		return $res->result_array();
	}
	public function fnGetYearValue($intYear)
	{
		$this->db->select('*');
		$this->db->where('years',$intYear);
		$res=$this->db->get(TBPREFIX.'years');
		return $res->result_array();
	}
	
	
	public function fnGetIndustryValue($intIndId, $intTypeId)
	{
		$this->db->select('ipvalue');
		$this->db->where('typeid',$intTypeId);
		$this->db->where('ind_id',$intIndId);
		$this->db->where('ind_status','active');
		$res=$this->db->get(TBPREFIX.'prot_industries');
		return $res->result_array();
	}
	public function fnGetIndustryIptypeValue($iptype_id, $intTypeId)
	{
		$this->db->select('ipvalue');
		$this->db->where('typeid',$intTypeId);
		$this->db->where('iptype_id',$iptype_id);
		$this->db->where('iptype_status','active');
		$res=$this->db->get(TBPREFIX.'iptype_industries');
		return $res->result_array();
	}
	
	public function fnGetCoverageValue($strCoverage, $intTypeId)
	{
		$this->db->select('cov_value');
		$this->db->where('typeid',$intTypeId);
		$this->db->where('coverage_status','active');
		$this->db->where('coverage_id',$strCoverage);
		$res=$this->db->get(TBPREFIX.'ipcoverage');
		return $res->result_array();
	}
	
	public function fnGetRHolderValue($intIndId, $intTypeId)
	{
		$this->db->select('rholder_value');
		$this->db->where('typeid',$intTypeId);
		$this->db->where('rholder_status','active');
		$this->db->where('rholder_id',$intIndId);
		$res=$this->db->get(TBPREFIX.'rholders');
		return $res->result_array();
	}
	  
	public function fnGetCertificateValue($intIndId, $intTypeId)
	{
		$this->db->select('cert_value');
		$this->db->where('typeid',$intTypeId);
		$this->db->where('cert_id',$intIndId);
		$this->db->where('cert_status','active');
		$res=$this->db->get(TBPREFIX.'ipcertificates');
		return $res->result_array();
	}
	  
	## Get All  Data 
	public function fnGetAllCoverage($intTypeId)
	{
		$this->db->select('*');
		$this->db->where('typeid',$intTypeId);
		$this->db->where('coverage_status','active');
		$res=$this->db->get(TBPREFIX.'ipcoverage');
		return $res->result_array();
	}
	public function fnGetAllCertificateValue($intTypeId)
	{
		$this->db->select('*');
		$this->db->where('typeid',$intTypeId);
		  $this->db->where('cert_status','active');
		$res=$this->db->get(TBPREFIX.'ipcertificates');
		return $res->result_array();
	}
	public function fnGetAllRHolderValue($intTypeId)
	{
		$this->db->select('*');
		$this->db->where('typeid',$intTypeId);
		  $this->db->where('rholder_status','active');
		$res=$this->db->get(TBPREFIX.'rholders');
		return $res->result_array();
	}
	
	public function fnGetAllIndustryValue($intTypeId)
	{
		$this->db->select('*');
		$this->db->where('typeid',$intTypeId);
		$this->db->where('ind_status','active');
		$res=$this->db->get(TBPREFIX.'prot_industries');
		return $res->result_array();
	}
	
	public function fnGetAllProtectedIndustryValue($intTypeId,$cert_id)
	{
		$this->db->select('*');
		$this->db->where('typeid',$intTypeId);
		 $this->db->where('cert_id',$cert_id);
		 $this->db->where('ind_status','active');
		$res=$this->db->get(TBPREFIX.'prot_industries');
		return $res->result_array();
	}
	
	public function fnGetAllIPIndustries($intTypeId)
	{
		$this->db->select('*');
		$this->db->where('typeid',$intTypeId);
		  $this->db->where('iptype_status','active');
		$res=$this->db->get(TBPREFIX.'iptype_industries');
		return $res->result_array();
	}
}