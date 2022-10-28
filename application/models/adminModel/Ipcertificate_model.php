<?php
Class Ipcertificate_model extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}
	
	public function addCertificate($data) 
	{
		$res=$this->db->insert(TBPREFIX.'ipcertificates',$data);
		if($res)
		{
			$category_id=$this->db->insert_id();
			return $category_id;
		}
		else
		return false;
	}
	public function fnGetCertificate($certificate_name,$type_name,$coverage_value,$per_page,$page)
	{
		if($certificate_name!="" && $certificate_name!='Na')
	   	{
	   		$certificate_name = str_replace('%20', ' ', $certificate_name);
			$this->db->like(TBPREFIX.'ipcertificates.cert_name',$certificate_name);
		}
		if($type_name!="" && $type_name!='Na')
	    {
	    	$type_name = str_replace('%20', ' ', $type_name);
			$this->db->like(TBPREFIX.'iptypes.type',$type_name);
		}
		
		if($coverage_value!="" && $coverage_value!='Na')
	    {
	    	$coverage_value = str_replace('%20', ' ', $coverage_value);
			$this->db->like(TBPREFIX.'ipcertificates.cert_value',$coverage_value);
		}
		$this->db->select('*');
		#$this->db->join(TBPREFIX.'iptypes'.TBPREFIX.'ipcertificates.typeid = '.TBPREFIX.'iptypes.typeid','left');
		$this->db->join(TBPREFIX.'iptypes', TBPREFIX.'iptypes.typeid='.TBPREFIX.'ipcertificates.typeid','left');
		$this->db->order_by('cert_id','DESC');
		$this->db->limit($per_page,$page);
		$res=$this->db->get(TBPREFIX.'ipcertificates');
		return $res->result_array();
	}
	public function getSingleCertificateInfo($cert_id,$qury)
	{
		$this->db->select('*');
		$this->db->where('cert_id',$cert_id);
		$query=$this->db->get(TBPREFIX.'ipcertificates');
		if($qury==1)
		{
			return $query->result_array();
		}
		else
		{
			return $query->num_rows();
		}		
	}
	public function certificate_record_count($certificate_name,$type_name,$coverage_value)
	{
		if($certificate_name!="" && $certificate_name!='Na')
	   	{
	   		$certificate_name = str_replace('%20', ' ', $certificate_name);
			$this->db->like(TBPREFIX.'ipcertificates.cert_name',$certificate_name);
		}
		if($type_name!="" && $type_name!='Na')
	    {
	    	$type_name = str_replace('%20', ' ', $type_name);
			$this->db->like(TBPREFIX.'iptypes.type',$type_name);
		}
		
		if($coverage_value!="" && $coverage_value!='Na')
	    {
	    	$coverage_value = str_replace('%20', ' ', $coverage_value);
			$this->db->like(TBPREFIX.'ipcertificates.cert_value',$coverage_value);
		}
		$this->db->select('cert_id');
		$this->db->join(TBPREFIX.'iptypes', TBPREFIX.'iptypes.typeid='.TBPREFIX.'ipcertificates.typeid','left');
		$res=$this->db->get(TBPREFIX.'ipcertificates');
		return $tsr=$res->num_rows();
	}
	public function fncheckCertificate1($strCertName = "",$typeid)
	{	
		
		if($strCertName!=""){
			$this->db->select('*');
			$this->db->where('cert_name',$strCertName);	
			$this->db->where('typeid',$typeid);	
			$res=$this->db->get(TBPREFIX.'ipcertificates');
			
			return $res->num_rows();
		}
		return 0;
	}
	
	public function fncheckCertificate($strCertName = "")
	{	
		
		if($strCertName!=""){
			$this->db->select('*');
			$this->db->where('cert_name',$strCertName);	
			$res=$this->db->get(TBPREFIX.'ipcertificates');
			
			return $res->num_rows();
		}
		return 0;
	}
	public function check_CertificateName_upt1($cert_name,$typeid,$cert_id)
	{
		$this->db->select('cert_id');
		$this->db->where('cert_name',$strCertName);
		$this->db->where('typeid',$typeid);
		$this->db->where('cert_id !=',$cert_id);
		$query=$this->db->get(TBPREFIX."ipcertificates");
		return $query->num_rows();
	}
	
	public function check_CertificateName_upt($strCertName,$cert_id)
	{
		$this->db->select('cert_id');
		$this->db->where('cert_name',$strCertName);
		$this->db->where('cert_id !=',$cert_id);
		$query=$this->db->get(TBPREFIX."ipcertificates");
		return $query->num_rows();
	}
	public function upt_ipcertificates($input_data,$cert_id)
	{
		$this->db->where('cert_id',$cert_id);
		$query=$this->db->update(TBPREFIX."ipcertificates",$input_data);
		if($query==1)
		{
			return true;
		}
		else
		{
			return false;
		}	
	}
	public function delete_cert($page_id)
	{
		$this->db->set('cert_status','inactive');
		$this->db->where('cert_id',$page_id);
		$res=$this->db->update(TBPREFIX.'ipcertificates');
		if($res)
		{
			return true;
		}
		else
		return false;
	}
	 
}