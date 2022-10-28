<?php	defined('BASEPATH') OR exit('No direct script access allowed');	

class Homemodel extends CI_Model 
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		date_default_timezone_set('Asia/Kolkata');
	}
	
	
	public function getAllPackagelist()
	{
		$this->db->where('package_status','active');
		$res=$this->db->get(TBPREFIX.'package_management');
		return $res->result_array();
	}
	
	public function getAllBanners()
	{
		$this->db->where('banner_status','Active');
		$this->db->where('banner_type','Home');
		$this->db->order_by('banner_id','DESC');
		$res=$this->db->get(TBPREFIX.'banner');
		return $res->result_array();
	}
	
	public function getAllIPtypelist()
	{
		$this->db->where('type_status','active');
		$res=$this->db->get(TBPREFIX.'iptypes');
		return $res->result_array();
	}
	
	public function getVersion()
	{
		$res=$this->db->get(TBPREFIX.'app_version');
		return $res->result_array();
	}
	
	public function updatesVersion($arrAppVersion)
	{
		$this->db->where('app_id','1');
		$res=$this->db->update(TBPREFIX.'app_version',$arrAppVersion);
		return true;
	}
	
	public function getAllCountrylist()
	{
		$res=$this->db->get(TBPREFIX.'country');
		return $res->result_array();
	}
}