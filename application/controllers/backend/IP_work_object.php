<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class IP_work_object extends CI_Controller {
	public function __construct()
	{
		 parent::__construct();
		 $this->load->library("pagination");
		$this->load->model('adminModel/IP_work_object_model');		 
		 if(! $this->session->userdata('talogged_in'))
		 {
			redirect('backend/login', 'refresh');
		 }
	}
	
	public function mpIP_work_objectSearch()
	{
		
		//print_r($_REQUEST); exit;
		$object_name='Na';
		
		$session_data=$this->session->userdata('logged_in');
		
		if(isset($_POST['btn_clear']))
		{
			 redirect(base_url("backend/").'IP_work_object/manageworkobject/');
		}
		  
		if(isset($_POST['btn_search']))
		{
		   
		    if($_POST['object_name']!="")
		   {
		   		
			   $object_name=trim($_POST['object_name']);
			  
		   }
		    
		 
			redirect(base_url("backend/").'IP_work_object/manageworkobject/'.$object_name);
		}		   
		  
		redirect(base_url("backend/").'IP_work_object/manageworkobject/');		
	}
	// code for manage Transaction
	public function manageworkobject()
	{
		$data['page_title']='Manage Work Object';
		
		$object_name='Na';

		 if($this->uri->segment(4)!='')
		{
			if($this->uri->segment(4)!="Na")
			{
				$object_name=$this->uri->segment(4);
			}
			

		}
		
		

		$data['bannercnt']= $config["total_rows"] = $this->IP_work_object_model->work_object_record_count($object_name);

		$config = array();
		$config["base_url"] = base_url("backend/") . "IP_work_object/manageWorkObject/".$object_name;
		$config['per_page'] = 25;
		$config["uri_segment"] = 5;
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
		$config["total_rows"] =$data['bannercnt'];
		#echo "<pre>"; print_r($config); exit;
		$this->pagination->initialize($config);
				
		$page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
		$data["total_rows"] = $config["total_rows"]; 
		$data["links"] = $this->pagination->create_links();
		
		$data['page']=$page;
		$data['ipworkobject_master']=$this->IP_work_object_model->getAllWorkObject($object_name,$config["per_page"],$page);

		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/admin_right',$data);
		$this->load->view('admin/manage_ipwork_object',$data);
		$this->load->view('admin/admin_footer');
	}
	
	
	public function addipwork_object()
	{
		$data['page_title']='Add IP WORK OBJECT';
		
		$data['error_msg']='';
		if(isset($_POST['btn_addcms']))
		{
			$this->form_validation->set_rules('object_name','Object Name','required');
			
			if($this->form_validation->run())
			{
				$object_name=$this->input->post('object_name');
				
						
				$page_status=$this->input->post('page_status');	
				// check already category exists
				$category_exists=$this->IP_work_object_model->check_pageName($page_name);
				//echo $this->db->last_query();exit;
				if($category_exists==0)
				{
						
						$input_data=array('object'=>$object_name,'status'=>$page_status);
						
						$cms_id=$this->IP_work_object_model->add_ipworkobject($input_data);
						//echo $this->db->last_query();exit;
						if($cms_id>0)
						{
							$this->session->set_flashdata('success','IP WORK OBJECT added successfully');
							redirect(base_url("backend/").'IP_work_object/manageworkobject');
						}
						else
						{
							$this->session->set_flashdata('success','Error while adding IP WORK OBJECT');
							redirect(base_url("backend/").'IP_work_object/add_ipworkobject');
						}
				}
				else
				{
						$this->session->set_flashdata('error','IP WORK OBJECT already exists.');
						redirect(base_url("backend/").'IP_work_object/add_ipworkobject');			
				}
			}
			else
			{
					$this->session->set_flashdata('error',$this->form_validation->error_string());
					redirect(base_url("backend/").'IP_work_object/add_ipworkobject');			
			}
		}
		
		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/admin_right',$data);
		$this->load->view('admin/addipworkobject',$data);
		$this->load->view('admin/admin_footer');
	}
	
	// code for update category
	public function updateipwork_object()
	{
		$data['page_title']='Update IP WORK OBJECT';
		$data['error_msg']='';
		$page_id=base64_decode($this->uri->segment(4));
		if($page_id)
		{
			$cmsInfo=$this->IP_work_object_model->getSingleIpWorkObjectInfo($page_id,0);
			if($cmsInfo>0)
			{
				$data['workObjectInfo']=$this->IP_work_object_model->getSingleIpWorkObjectInfo($page_id,1);
				
				if(isset($_POST['btn_updateworkobject']))
				{
					$this->form_validation->set_rules('object_name','Object Name','required');
						
						
						if($this->form_validation->run())
						{
							$object_name=$this->input->post('object_name');
							$page_status=$this->input->post('page_status');	
						$num_category=$this->IP_work_object_model->check_objectName_upt($object_name,$page_id); 
						//echo $this->db->last_query();exit;
						
						if($num_category==0)
						{
							
							$input_data=array('object'=>$object_name,'status'=>$page_status);
													
							$page_idd=$this->IP_work_object_model->upt_ipworkobject($input_data,$page_id);
							//echo $this->db->last_query();exit;
							if($page_idd)
							{	// echo '///';exit;
								$this->session->set_flashdata('success','IP WORK OBJECT updated successfully.');
								redirect(base_url("backend/").'IP_work_object/manageWorkObject');	
							}
							else
							{
								$this->session->set_flashdata('error','Error while updating IP WORK OBJECT.');
								redirect(base_url("backend/").'IP_work_object/updateipwork_object/'.base64_encode($page_id));
							}							
						}
						else
						{
								$this->session->set_flashdata('error','IP WORK OBJECT name already exists.');
								redirect(base_url("backend/").'IP_work_object/updateipwork_object/'.base64_encode($page_id));								
						}
					}
					else
					{
						$this->session->set_flashdata('error',$this->form_validation->error_string());
						redirect(base_url("admin/").'IP_work_object/updateipwork_object/'.base64_encode($page_id));
					}
				}
			}
			else
			{
				$data['error_msg']='IP WORK OBJECT is not found.';
			}
		}
		else
		{
			$this->session->set_flashdata('error','Cms is not found.');
			redirect(base_url("backend/").'IP_work_object/updateipwork_object/'.base64_encode($page_id));
		}
		
		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/admin_right',$data);
		$this->load->view('admin/updateIpWorkObject',$data);
		$this->load->view('admin/admin_footer');
	}
	
	
	public function deleteipwork_object()
	{
		$data['page_title']='Delete IP WORK OBJECT';
		$data['error_msg']='';
		$page_id=base64_decode($this->uri->segment(4));
		if($page_id)
		{
			$delcat=$this->IP_work_object_model->deleteipwork_object($page_id);
						if($delcat>0)
						{
							$this->session->set_flashdata('success','Ip work object deleted successfully.');
							redirect(base_url("backend/").'IP_work_object/manageWorkObject');	
						}
						else
						{
							$this->session->set_flashdata('error','Error while deleting Ip work object.');
							redirect(base_url("backend/").'IP_work_object/manageWorkObject');
						}
		}
		else
		{
			$this->session->set_flashdata('error','Ip work object is not found.');
			redirect(base_url("backend/").'IP_work_object/manageWorkObject');
		}
	}
}

?>