<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class IP_work_type extends CI_Controller {
	public function __construct()
	{
		 parent::__construct();
		 $this->load->library("pagination");
		
		$this->load->model('adminModel/IP_work_type_model');		 
		 if(! $this->session->userdata('talogged_in'))
		 {
			redirect('backend/login', 'refresh');
		 }
	}
	
	public function mpIP_work_typeSearch()
	{
		
		//print_r($_REQUEST); exit;
		$object_name=$type_name='Na';
		
		$session_data=$this->session->userdata('logged_in');
		
		if(isset($_POST['btn_clear']))
		{
			 redirect(base_url("backend/").'IP_work_type/manageworktype/');
		}
		  
		if(isset($_POST['btn_search']))
		{
		   
		    if($_POST['object_name']!="")
		   {
		   		
			   $object_name=trim($_POST['object_name']);
			  
		   }
		    if($_POST['type_name']!="")
		   {
			   $type_name=trim($_POST['type_name']);
			   $type_name = str_replace('%20', ' ', $type_name);
		   }
		    
		   
		 
			redirect(base_url("backend/").'IP_work_type/manageworktype/'.$object_name.'/'.$type_name);
		}		   
		  
		redirect(base_url("backend/").'IP_work_type/manageworktype/');		
	}
	// code for manage Transaction
	public function manageworktype()
	{
		$data['page_title']='Manage Work type';
		
		$object_name=$type_name='Na';

		 if($this->uri->segment(4)!='')
		{
			if($this->uri->segment(4)!="Na")
			{
				$object_name=$this->uri->segment(4);
			}
			

		}
		
		if($this->uri->segment(5)!="")
		{
			if($this->uri->segment(5)!="Na")
			{
				$type_name=$this->uri->segment(5);
			}  
		}
		

		$data['bannercnt']= $config["total_rows"] = $this->IP_work_type_model->work_type_record_count($object_name,$type_name);
		$config = array();
		$config["base_url"] = base_url("backend/") . "IP_work_type/manageWorktype/".$object_name."/".$type_name;
		$config['per_page'] = 25;
		$config["uri_segment"] = 6;
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
				
		$page = ($this->uri->segment(6)) ? $this->uri->segment(6) : 0;
		$data["total_rows"] = $config["total_rows"]; 
		$data["links"] = $this->pagination->create_links();
		
		$data['page']=$page;
		$data['ipworktype_master']=$this->IP_work_type_model->getAllWorktype($object_name,$type_name,$config["per_page"],$page);

		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/admin_right',$data);
		$this->load->view('admin/manage_ipwork_type',$data);
		$this->load->view('admin/admin_footer');
	}
	
	
	public function addipwork_type()
	{
		$data['page_title']='Add IP WORK type';
		
		$data['error_msg']='';
		if(isset($_POST['btn_addcms']))
		{
			$this->form_validation->set_rules('type_name','Type Name','required');
			$this->form_validation->set_rules('sel_object','Object','required');
			
			if($this->form_validation->run())
			{
				$type_name=$this->input->post('type_name');

				$sel_object=$this->input->post('sel_object');				
						
				$page_status=$this->input->post('page_status');	
				// check already category exists
				$category_exists=$this->IP_work_type_model->check_pageName($type_name);
				//echo $this->db->last_query();exit;
				if($category_exists==0)
				{
						
						$input_data=array('type'=>$type_name,'object_id'=>$sel_object,'status'=>$page_status);
						
						$cms_id=$this->IP_work_type_model->add_ipworktype($input_data);
						//echo $this->db->last_query();exit;
						if($cms_id>0)
						{
							$this->session->set_flashdata('success','IP WORK type added successfully');
							redirect(base_url("backend/").'IP_work_type/manageworktype');
						}
						else
						{
							$this->session->set_flashdata('success','Error while adding IP WORK type');
							redirect(base_url("backend/").'IP_work_type/addipwork_type');
						}
				}
				else
				{
						$this->session->set_flashdata('error','IP WORK type already exists.');
						redirect(base_url("backend/").'IP_work_type/addipwork_type');			
				}
			}
			else
			{
					$this->session->set_flashdata('error',$this->form_validation->error_string());
					redirect(base_url("backend/").'IP_work_type/addipwork_type');			
			}
		}
		
		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/admin_right',$data);
		$this->load->view('admin/addipworktype',$data);
		$this->load->view('admin/admin_footer');
	}
	
	// code for update category
	public function updateipwork_type()
	{
		$data['page_title']='Update IP WORK TYPE';
		$data['error_msg']='';
		$page_id=base64_decode($this->uri->segment(4));

		if($page_id)
		{
			$cmsInfo=$this->IP_work_type_model->getSingleIpWorktypeInfo($page_id,0);
			 
			if($cmsInfo>0)
			{
				$data['worktypeInfo']=$this->IP_work_type_model->getSingleIpWorktypeInfo($page_id,1);
				
				if(isset($_POST['btn_updateworktype']))
				{
					$this->form_validation->set_rules('type_name','type Name','required');
					$this->form_validation->set_rules('sel_object','Object','required');	
						
						if($this->form_validation->run())
						{
							$type_name=$this->input->post('type_name');
							$sel_object=$this->input->post('sel_object');		
							$page_status=$this->input->post('page_status');	
						$num_category=$this->IP_work_type_model->check_typeName_upt($type_name,$page_id); 
						//echo $this->db->last_query();exit;
						
						if($num_category==0)
						{
							
							$input_data=array('type'=>$type_name,'object_id'=>$sel_object,'status'=>$page_status);
													
							$page_idd=$this->IP_work_type_model->upt_ipworktype($input_data,$page_id);
							//echo $this->db->last_query();exit;
							if($page_idd)
							{	// echo '///';exit;
								$this->session->set_flashdata('success','IP WORK TYPE updated successfully.');
								redirect(base_url("backend/").'IP_work_type/manageWorktype');	
							}
							else
							{
								$this->session->set_flashdata('error','Error while updating IP WORK TYPE.');
								redirect(base_url("backend/").'IP_work_type/updateipwork_type/'.base64_encode($page_id));
							}							
						}
						else
						{
								$this->session->set_flashdata('error','IP WORK TYPE name already exists.');
								redirect(base_url("backend/").'IP_work_type/updateipwork_type/'.base64_encode($page_id));								
						}
					}
					else
					{
						$this->session->set_flashdata('error',$this->form_validation->error_string());
						redirect(base_url("admin/").'IP_work_type/updateipwork_type/'.base64_encode($page_id));
					}
				}
			}
			else
			{
				$data['error_msg']='IP WORK TYPE is not found.';
			}
		}
		else
		{
			$this->session->set_flashdata('error','IP WORK TYPE is not found.');
			redirect(base_url("backend/").'IP_work_type/updateipwork_type/'.base64_encode($page_id));
		}
		
		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/admin_right',$data);
		$this->load->view('admin/updateIpWorktype',$data);
		$this->load->view('admin/admin_footer');
	}
	
	
	public function deleteipwork_type()
	{
		$data['page_title']='Delete IP WORK type';
		$data['error_msg']='';
		$page_id=base64_decode($this->uri->segment(4));
		if($page_id)
		{
			$delcat=$this->IP_work_type_model->deleteipwork_type($page_id);
						if($delcat>0)
						{
							$this->session->set_flashdata('success','Ip work type deleted successfully.');
							redirect(base_url("backend/").'IP_work_type/manageWorktype');	
						}
						else
						{
							$this->session->set_flashdata('error','Error while deleting Ip work type.');
							redirect(base_url("backend/").'IP_work_type/manageWorktype');
						}
		}
		else
		{
			$this->session->set_flashdata('error','Ip work type is not found.');
			redirect(base_url("backend/").'IP_work_type/manageWorktype');
		}
	}
}

?>