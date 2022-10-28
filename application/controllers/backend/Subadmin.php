<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Subadmin extends CI_Controller {
	public function __construct()
	{
		 parent::__construct();
		 $this->load->model('adminModel/Subadmin_model');
		 $this->load->library("pagination");
		 if(! $this->session->userdata('talogged_in'))
		 {
			redirect('Login', 'refresh');
		 }
	}
	
	public function managesubadmin()
	{
		$data['page_title']='Manage Subadmin';
		
		$data['cmpCnt']=$this->Subadmin_model->getAdminCnt();
		//echo $this->db->last_query();
		
		$config = array();
		$config["base_url"] = base_url("backend/") . "Subadmin/managesubadmin/";
		$config['per_page'] = 25;
		$config["uri_segment"] = 4;
		$config['full_tag_open'] = '<ul class="pagination">'; 
		$config['full_tag_close'] = '</ul>';
		$config['first_tag_open'] = "<li class='paginate_button  page-item'>";
		$config['first_tag_close'] = "</li>"; 
		$config['prev_tag_open'] =	"<li class='paginate_button  page-item'>"; 
		$config['prev_tag_close'] = "</li>";
		$config['next_tag_open'] = "<li class='paginate_button  page-item'>";
		$config['next_tag_close'] = "</li>"; 
		$config['last_tag_open'] = "<li class='paginate_button  page-item'>"; 
		$config['last_tag_close'] = "</li>";
		$config['cur_tag_open'] = "<li class='paginate_button  page-item active'><a class='page-link active' href=''>"; 
		$config['cur_tag_close'] = "</a></li>";
		$config['num_tag_open'] = "<li class='paginate_button  page-item'>";
		$config['num_tag_close'] = "</li>"; 
		$config['attributes'] =array('class' => 'page-link');
		$config["total_rows"] =$data['cmpCnt'];
		#echo "<pre>"; print_r($config); exit;
		$this->pagination->initialize($config);
				
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$data["total_rows"] = $config["total_rows"]; 
		$data["links"] = $this->pagination->create_links();
		
		$data['adminInfo']=$this->Subadmin_model->getAdminInfo($config["per_page"],$page);
		//echo $this->db->last_query();
		$data['page']=$page;
		$this->load->view('admin/admin_header',$data);		
		$this->load->view('admin/admin_right',$data);		
		$this->load->view('admin/managesubadmin',$data);		
		$this->load->view('admin/admin_footer');
	}
	
	
	## Add Admin 
	public function addsubadmin()
	{
		
		$data['page_title']='Add New Subadmin';
		
		if(isset($_POST['btn_addsubadmin']))
		{
			//print_r($_POST);
			$this->form_validation->set_rules('subadmin_name','Subadmin Name','required');
			$this->form_validation->set_rules('subusername','Username','required');
			$this->form_validation->set_rules('subadmin_password','Subadmin Password','required');
			$this->form_validation->set_rules('subadmin_email','Subadmin Email','required|valid_email');
			
			if($this->form_validation->run())
			{
				$subadmin_name=$this->input->post('subadmin_name');
				$subadmin_email=$this->input->post('subadmin_email');
				$subusername=$this->input->post('subusername');
				$subadmin_password=$this->input->post('subadmin_password');
				$submobile_number=$this->input->post('submobile_number');
				$substatus=$this->input->post('substatus');
				
				// check already category exists
				$admin_exists = $this->Subadmin_model->check_adminexists($subadmin_email,$subusername);
				 
				if($admin_exists == 0)
				{
					$subadmin_password = md5($subadmin_password);
					$input_data=array(
										'subadmin_name'=>$subadmin_name,
										'subadmin_email'=>$subadmin_email,
										'subusername'=>$subusername,
										'subadmin_password'=>$subadmin_password,
										'submobile_number'=>$submobile_number,
										'substatus'=>$substatus,
										'dateadded'=>date('Y-m-d H:i:s'),
										'dateupdated'=>date('Y-m-d H:i:s'),
									);
					
					$subadmin_id=$this->Subadmin_model->add_admin($input_data);
						//echo $this->db->last_query();exit;
					if($subadmin_id > 0)
					{
						if(isset($_POST['chk_module']))
						{
							$cnt_chk_module=count($_POST['chk_module']);
							for($i=0;$i<$cnt_chk_module;$i++)
							{
								$input_modules_arr=array('subadmin_id'=>$subadmin_id,'module_name'=>$_POST['chk_module'][$i],'dateadded'=>date('Y-m-d H:i:s'));
								$module_id=$this->Subadmin_model->add_admin_modules($input_modules_arr);
							}
						}
					
						$this->session->set_flashdata('success','Record added successfully.');
						redirect(base_url("backend/").'Subadmin/managesubadmin');	
					}
					else
					{	   
						$data['adminInfo'] = $_POST;
						$this->session->set_flashdata('error','Error while adding record.');
					}
				}
				else
				{
						$data['adminInfo'] = $_POST;
						$this->session->set_flashdata('error','Admin already exists.');				
				}
			}
			else
			{
				$data['adminInfo'] = $_POST;
				$this->session->set_flashdata('error',$this->form_validation->error_string());
			}
		}
	
		$this->load->view('admin/admin_header',$data);		
		$this->load->view('admin/admin_right',$data);
		$this->load->view('admin/addsubadmin',$data);
		$this->load->view('admin/admin_footer');
	}
	
	
	public function updatesubadmin()
	{
		
		$data['page_title']='Update Subadmin';
		$subadmin_id=base64_decode($this->uri->segment(4));
		$data['subadminInfo']=$subadminInfo=$this->Subadmin_model->getSinglesubadminInfo($subadmin_id);
		//echo $this->db->last_query();
		//echo '<pre>';print_r($storeInfo);exit;
		if(isset($subadminInfo) && count($subadminInfo)>0)
		{
				$data['adminModuleData1'] =$this->Subadmin_model->getAdminModulesDetails($subadmin_id);
				if(isset($_POST['btn_updatesubadmin']))
				{
					//print_r($_POST);
					$this->form_validation->set_rules('subadmin_name','Subadmin Name','required');
					$this->form_validation->set_rules('subusername','Username','required');
					
					$this->form_validation->set_rules('subadmin_email','Subadmin Email','required|valid_email');
					
					if($this->form_validation->run())
					{
						$subadmin_name=$this->input->post('subadmin_name');
						$subadmin_email=$this->input->post('subadmin_email');
						$subusername=$this->input->post('subusername');
						$submobile_number=$this->input->post('submobile_number');
						$substatus=$this->input->post('substatus');
						
						// check already category exists
						$admin_exists = $this->Subadmin_model->check_adminexists($subadmin_email,$subusername,$subadmin_id);
					
						if($admin_exists == 0)
						{
							
							$input_data=array(
												'subadmin_name'=>$subadmin_name,
												'subadmin_email'=>$subadmin_email,
												'subusername'=>$subusername,
												'submobile_number'=>$submobile_number,
												'substatus'=>$substatus,
												'dateupdated'=>date('Y-m-d H:i:s')
											);
							if($_POST['subadmin_password'] != "")
							{
								$subadmin_password = md5($_POST['subadmin_password']);
								$input_data['subadmin_password'] = $subadmin_password;
							}		
							$subadmin_id=$this->Subadmin_model->upt_admin($input_data,$subadmin_id);
								//	echo $this->db->last_query();exit;
							if($subadmin_id > 0)
							{
								if(isset($_POST['chk_module']))
								{
									$cnt_chk_module=count($_POST['chk_module']);
									for($i=0;$i<$cnt_chk_module;$i++)
									{
										$input_modules_arr=array('subadmin_id'=>$subadmin_id,'module_name'=>$_POST['chk_module'][$i],'dateadded'=>date('Y-m-d H:i:s'));
										$module_id=$this->Subadmin_model->add_admin_modules($input_modules_arr);
									}
								}
							
								$this->session->set_flashdata('success','Details are updated successfully.');
								redirect(base_url("backend/").'Subadmin/managesubadmin');	
							}
							else
							{	   
								$data['adminInfo'] = $_POST;
								$this->session->set_flashdata('error','Error while updating details.');
							}
						}
						else
						{
								$data['adminInfo'] = $_POST;
								$this->session->set_flashdata('error','Admin already exists.');				
						}
					}
					else
					{
						$data['adminInfo'] = $_POST;
						$this->session->set_flashdata('error',$this->form_validation->error_string());
					}
				}
			
				$this->load->view('admin/admin_header',$data);		
				$this->load->view('admin/admin_right',$data);
				$this->load->view('admin/updatesubadmin',$data);
				$this->load->view('admin/admin_footer');
		}
		else
		{
			redirect(base_url().'backend/Subadmin/managesubadmin');
		}
	}
	
	public function deletesubadmin()
	{
		$data['page_title']='Delete subadmin';
		$data['error_msg']='';
		$subadmin_id=base64_decode($this->uri->segment(4));
		if($subadmin_id)
		{
			$delcat=$this->Subadmin_model->deletesubadmint($subadmin_id);
				if($delcat>0)
				{
					$this->session->set_flashdata('success','Subadmin deleted successfully.');
					redirect(base_url("backend/").'Subadmin/managesubadmin');	
				}
				else
				{
					$this->session->set_flashdata('error','Error while deleting subadmin.');
					redirect(base_url("backend/").'Subadmin/managesubadmin');
				}
		}
		else
		{
			$this->session->set_flashdata('error','subadmin is not found.');
			redirect(base_url("backend/").'Subadmin/managesubadmin');
		}
	}
}