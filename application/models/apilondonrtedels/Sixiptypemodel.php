<?php	defined('BASEPATH') OR exit('No direct script access allowed');	

class Sixiptypemodel extends CI_Model 
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		date_default_timezone_set('Asia/Kolkata');
	}
	
	
	public function getAllIPTypelist($typeid)
	{
		$this->db->select('*');
		$this->db->where('typeid',$typeid);
		$this->db->where('iptype_status','active');
		$res=$this->db->get(TBPREFIX.'iptype_industries');
		return $res->result_array();
	}
	
	public function getAllIPCertificatelist($typeid)
	{
		$this->db->select('*');
		$this->db->where('typeid',$typeid);
		$this->db->where('cert_status','active');
		$res=$this->db->get(TBPREFIX.'ipcertificates');
		return $res->result_array();
	}
	
	public function getAllCoveragelist($typeid)
	{
		$this->db->select('*');
		$this->db->where('typeid',$typeid);
		$this->db->where('coverage_status','active');
		$res=$this->db->get(TBPREFIX.'ipcoverage');
		return $res->result_array();
	}
	
	public function getAllProtectedIndustrieslist($cert_id,$typeid)
	{
		$this->db->select('*');
		$this->db->where('cert_id',$cert_id);
		$this->db->where('typeid',$typeid);
		$this->db->where('ind_status','active');
		$res=$this->db->get(TBPREFIX.'prot_industries');
		return $res->result_array();
	}
	
	public function getAllRightsholderslist($typeid)
	{
		$this->db->select('*');
		$this->db->where('typeid',$typeid);
		$this->db->where('rholder_status','active');
		$res=$this->db->get(TBPREFIX.'rholders');
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
		$res=$this->db->get(TBPREFIX.'prot_industries');
		return $res->result_array();
	}
	
	public function fnGetCoverageValue($strCoverage, $intTypeId)
	{
		$this->db->select('cov_value');
		$this->db->where('typeid',$intTypeId);
		$this->db->where('coverage_id',$strCoverage);
		$res=$this->db->get(TBPREFIX.'ipcoverage');
		return $res->result_array();
	}
	
	public function fnGetRHolderValue($intIndId, $intTypeId)
	{
		$this->db->select('rholder_value');
		$this->db->where('typeid',$intTypeId);
		$this->db->where('rholder_id',$intIndId);
		$res=$this->db->get(TBPREFIX.'rholders');
		return $res->result_array();
	}
	
	public function fnGetCertificateValue($intIndId, $intTypeId)
	{
		$this->db->select('cert_value');
		$this->db->where('typeid',$intTypeId);
		$this->db->where('cert_id',$intIndId);
		$res=$this->db->get(TBPREFIX.'ipcertificates');
		return $res->result_array();
	}
	
	public function fnGetIndustryIptypeValue($iptype_id, $intTypeId)
	{
		$this->db->select('ipvalue');
		$this->db->where('typeid',$intTypeId);
		$this->db->where('iptype_id',$iptype_id);
		$res=$this->db->get(TBPREFIX.'iptype_industries');
		return $res->result_array();
	}
	  
}