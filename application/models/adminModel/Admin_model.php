<?php
Class Admin_model extends CI_Model {
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}
	
	
	
	// Read data using username and password
	public function getAdminDetails($admin_id) 
	{
		$this->db->select('*');
		$this->db->from(TBPREFIX.'admin');
		$this->db->where('admin_id',$admin_id);
		$query = $this->db->get();		return $query->result_array();
	}
	
	public function upt_admin($input_data,$adminId)
	{
	    $sts = "";
	    if($adminId > 0)		
		{			
			$this->db->where('admin_id','1');
			$query =$this->db->update(TBPREFIX.'admin',$input_data);
			if($query)
				return true;
		   else
			   return false;
	    }
	}
	
	
	public function getAdminModulesDetails($adminId)	
	{		
		$this->db->select('module_name');		
		$this->db->from(TBPREFIX.'subadmin_assign_modules');		
		$this->db->where('subadmin_id',$adminId);		
		$query = $this->db->get();		
		return $query->result_array();	
	}
	
	public function getStoreCommission($order_id,$store_id)	
	{		
		$this->db->select('*');		
		$this->db->from(TBPREFIX.'store_earnings');		
		$this->db->where('order_id',$order_id);	
		$this->db->where('store_id',$store_id);			
		$query = $this->db->get();		
		return $query->result_array();	
	}
	
	public function getSinglesubadminInfo($subadmin_id)
	{	$str="SELECT * FROM `tld_subadmin` 
				WHERE `subadmin_id` = '".$subadmin_id."'";
				
		$sts = $this->db->query($str);
		
		return $sts->result_array();
	}
	
	public function check_SUBadminexists($subadmin_email,$subusername,$subadminId="")
	{
		$ress='';
		if($subadminId > 0)
			$ress="AND `subadmin_id` != $subadminId";
		$str="SELECT `subadmin_id` FROM `tld_subadmin` 
				WHERE (`subadmin_email` = '".$subadmin_email."' OR `subusername` = '".$subusername."') $ress ";
				
		$sts = $this->db->query($str);
		
		return $sts->num_rows();
	}
	public function upt_SUBadmin($input_data,$session_admin_id)
	{
	    $sts = "";
	    if($session_admin_id > 0)		
		{			
			$this->db->where('subadmin_id','1');			
			$query =$this->db->update(TBPREFIX.'subadmin',$input_data);			
			if($query)							
					return true;
		   else			   
				return false;
	    }
	}

public function getProductimages($product_id)
	{
		$this->db->select('image_name');			
		$this->db->where('product_id',$product_id);
		$this->db->limit('1');		
		$this->db->order_by('image_id','DESC');	
		$this->db->from(TBPREFIX.'products_images');		
		return $this->db->get()->result_array();
	}
	
}