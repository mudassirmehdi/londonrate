<?php
Class Subadmin_model extends CI_Model {
	function __construct()
	{
		
		parent::__construct();
	}
	
	public function getAdminCnt()
	{
		$this->db->select('subadmin_id');
		$res=$this->db->get(TBPREFIX.'subadmin');
		return $tsr=$res->num_rows();
	}
	
	public function getAdminInfo($per_page,$page)
	{
		$this->db->select(TBPREFIX.'subadmin.*');
		$this->db->limit($per_page,$page);
		$res=$this->db->get(TBPREFIX.'subadmin');
		return $tsr=$res->result_array();
	}
	
	public function check_adminexists($subadmin_email,$subusername,$subadminId="")
	{
		$ress='';
		if($subadminId > 0)
			$ress="AND `subadmin_id` != $subadminId";
		$str="SELECT `subadmin_id` FROM `tld_subadmin` 
				WHERE (`subadmin_email` = '".$subadmin_email."' OR `subusername` = '".$subusername."') $ress ";
				
		$sts = $this->db->query($str);
		
		return $sts->num_rows();
	}
	
	public function add_admin_modules($input_modules_arr)	
	{		
		$res	=	$this->db->insert(TBPREFIX.'subadmin_assign_modules',$input_modules_arr);		
		if($res)		
		{			
			$module_id=$this->db->insert_id();			
			return $module_id;		
		}		
		else		
		return false;	
	}
	
	public function add_admin($input_data) 
	{
		$res	=	$this->db->insert(TBPREFIX.'subadmin',$input_data);
		if($res)
		{
			$bstfd_admin_id=$this->db->insert_id();
			return $bstfd_admin_id;
		}
		else
		return false;
	}	
	
	public function getSinglesubadminInfo($subadmin_id)
	{	$str="SELECT * FROM `tld_subadmin` 
				WHERE `subadmin_id` = '".$subadmin_id."'";
				
		$sts = $this->db->query($str);
		
		return $sts->result_array();
	}
	
	public function getAdminModulesDetails($adminId)	
	{		
		$this->db->select('module_name');		
		$this->db->from(TBPREFIX.'subadmin_assign_modules');		
		$this->db->where('subadmin_id',$adminId);		
		$query = $this->db->get();		
		return $query->result_array();	
	}
	
	public function upt_admin($input_data,$admin_id)
	{
		$this->db->where('subadmin_id',$admin_id);
		$query=$this->db->update(TBPREFIX.'subadmin',$input_data);
		if($query==1)
		{
			return true;
		}
		else
		{
			return false;
		}	
	}
	public function deletesubadmint($subadmin_id)
	{
		$this->db->where('subadmin_id',$subadmin_id);
		$this->db->set('substatus','Delete');		
		$query=$this->db->update(TBPREFIX.'subadmin');
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