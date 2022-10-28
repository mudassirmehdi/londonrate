<?php
Class Login_model extends CI_Model {
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}
	// Read data using username and password
	public function chk_login($data,$qty) 
	{
		if($data['user_type']=='BusinessOwner')
		{
			$condition = " (username ='" . $data['username'] . "' 	OR admin_email='" . $data['username'] . "')
						  AND admin_password ='" . md5($data['admin_password']) . "'";
						  
			$this->db->select('*');
			$this->db->from(TBPREFIX.'admin');
			$this->db->where($condition);
			$this->db->limit(1);
			$query = $this->db->get();
			
			//echo $this->db->last_query();exit;
			if ($qty==0) 
			{
				return $query->num_rows();
			} 
			else 
			{
				return $query->result_array();
			}
		}
		else if($data['user_type']=='Store')
		{
			$condition = " (store_owner_name ='" . $data['username'] . "' 	OR store_owner_email='" . $data['username'] . "')
						  AND store_owner_password ='" . md5($data['admin_password']) . "'";
						
			$this->db->select('*');
			$this->db->from(TBPREFIX.'stores');
			$this->db->where($condition);
			$this->db->limit(1);
			$query = $this->db->get();
			
			//echo $this->db->last_query();exit;
			if ($qty==0) 
			{
				return $query->num_rows();
			} 
			else 
			{
				return $query->result_array();
			}
		}
		else if($data['user_type']=='Subadmin')
		{
			$condition = " (subusername ='" . $data['username'] . "' 	OR subadmin_email='" . $data['username'] . "')
						  AND subadmin_password ='" . md5($data['admin_password']) . "'";
						
			$this->db->select('*');
			$this->db->from(TBPREFIX.'subadmin');
			$this->db->where($condition);
			$this->db->limit(1);
			$query = $this->db->get();
			
			//echo $this->db->last_query();exit;
			if ($qty==0) 
			{
				return $query->num_rows();
			} 
			else 
			{
				return $query->result_array();
			}
		}
	}



// Read  data from database to show data in admin page

	public function read_user_information($username) 
	{
			$condition = "user_name =" . "'" . $username . "'";
			$this->db->select('*');
			$this->db->from(TBPREFIX.'admin');
			$this->db->where($condition);
			$this->db->limit(1);
			$query = $this->db->get();
			if ($query->num_rows() == 1) 
			{
				return $query->result();
			} 
			else 
			{
				return false;
			}
	}
	public function upadteAdminPassword($user_type,$admin_email,$rnd_number)
	{
		if($user_type=='BusinessOwner')
		{
			$sts = $this->db->query('Update '.TBPREFIX.'admin SET admin_password ="'.md5($rnd_number).'" 
							WHERE admin_email="'.$admin_email.'"');
			return $sts;
		}
		else if($user_type=='Store')
		{
			$sts = $this->db->query('Update '.TBPREFIX.'stores SET store_owner_password ="'.md5($rnd_number).'" 
							WHERE store_owner_email="'.$admin_email.'"');
			return $sts;
		}
		else if($user_type=='Subadmin')
		{
			$sts = $this->db->query('Update '.TBPREFIX.'subadmin SET subadmin_password ="'.md5($rnd_number).'" 
							WHERE subadmin_email="'.$admin_email.'"');
			return $sts;
		}
	}
	public function chkAdminEmailExists($admin_email,$user_type) 
	{
		if($user_type=='BusinessOwner')
		{
			$condition = " admin_email='".$admin_email."'";
						  
			$this->db->select('*');
			$this->db->from(TBPREFIX.'admin');
			$this->db->where($condition);
			$this->db->limit(1);
			$query = $this->db->get();
			return $query->result_array();
		}
		else if($user_type=='Store')
		{
			$condition = " store_owner_email='".$admin_email."'";
						
			$this->db->select('*');
			$this->db->from(TBPREFIX.'stores');
			$this->db->where($condition);
			$this->db->limit(1);
			$query = $this->db->get();
			return $query->result_array();
		}
		else if($user_type=='Subadmin')
		{
			$condition = " subadmin_email='".$admin_email."'";
						
			$this->db->select('*');
			$this->db->from(TBPREFIX.'subadmin');
			$this->db->where($condition);
			$this->db->limit(1);
			$query = $this->db->get();
			return $query->result_array();
		}
	}

}