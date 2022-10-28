<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cms extends CI_Controller {
	public function __construct()
	{
		 parent::__construct();
		 $this->load->library("pagination");
$this->load->model('adminModel/Cms_model');		 
		 if(! $this->session->userdata('talogged_in'))
		 {
			redirect('backend/login', 'refresh');
		 }
	}
	
	
	// code for manage Transaction
	public function managecms()
	{
		$data['page_title']='Manage CMS';
		
		$data['bannercnt']= $config["total_rows"] = $this->Cms_model->cms_record_count();
		$config = array();
		$config["base_url"] = base_url("backend/") . "cms/managecms/";
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
		$config["total_rows"] =$data['bannercnt'];
		#echo "<pre>"; print_r($config); exit;
		$this->pagination->initialize($config);
				
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$data["total_rows"] = $config["total_rows"]; 
		$data["links"] = $this->pagination->create_links();
		
		$data['page']=$page;
		$data['cmsmaster']=$this->Cms_model->getAllCms($config["per_page"],$page);
		
		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/admin_right',$data);
		$this->load->view('admin/managecms',$data);
		$this->load->view('admin/admin_footer');
	}
	
	
	public function addcms()
	{
		$data['page_title']='Add CMS';
		
		$data['error_msg']='';
		if(isset($_POST['btn_addcms']))
		{
			$this->form_validation->set_rules('page_name','Page Name','required');
			$this->form_validation->set_rules('page_title','Page Title','required');
			
			if($this->form_validation->run())
			{
				$page_name=$this->input->post('page_name');
				$page_title=$this->input->post('page_title');
				$page_desc=$this->input->post('page_desc');
						
					$page_status=$this->input->post('page_status');
				// check already category exists
				$category_exists=$this->Cms_model->check_pageName($page_name);
				//echo $this->db->last_query();exit;
				if($category_exists==0)
				{
						
						$input_data=array('page_name'=>$page_name,'page_title'=>addslashes($page_title),'page_desc'=>addslashes($page_desc),'dateadded'=>date('Y-m-d H:i:s'),'dateupdated'=>date('Y-m-d H:i:s'),'page_status'=>$page_status);
						
						$cms_id=$this->Cms_model->add_cms($input_data);
						//echo $this->db->last_query();exit;
						if($cms_id>0)
						{
							$this->session->set_flashdata('success','CMS added successfully');
							redirect(base_url("backend/").'cms/managecms');
						}
						else
						{
							$this->session->set_flashdata('success','Error while adding cms');
							redirect(base_url("backend/").'cms/addcms');
						}
				}
				else
				{
						$this->session->set_flashdata('error','Cms already exists.');
						redirect(base_url("backend/").'cms/addcms');			
				}
			}
			else
			{
					$this->session->set_flashdata('error',$this->form_validation->error_string());
					redirect(base_url("backend/").'cms/addcms');			
			}
		}
		
		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/admin_right',$data);
		$this->load->view('admin/addcms',$data);
		$this->load->view('admin/admin_footer');
	}
	
	// code for update category
	public function updatecms()
	{
		$data['page_title']='Update Cms';
		$data['error_msg']='';
		$page_id=base64_decode($this->uri->segment(4));
		if($page_id)
		{
			$cmsInfo=$this->Cms_model->getSingleCmsInfo($page_id,0);
			if($cmsInfo>0)
			{
				$data['cmsInfo']=$this->Cms_model->getSingleCmsInfo($page_id,1);
				
				if(isset($_POST['btn_updatecms']))
				{
					$this->form_validation->set_rules('page_name','Page Name','required');
						$this->form_validation->set_rules('page_title','Page Title','required');
						
						if($this->form_validation->run())
						{
							$page_name=$this->input->post('page_name');
							$page_title=$this->input->post('page_title');
							$page_desc=$this->input->post('page_desc');
							$page_status=$this->input->post('page_status');
						$num_category=$this->Cms_model->check_cmsName_upt($page_name,$page_id); 
						//echo $this->db->last_query();exit;
						
						if($num_category==0)
						{
							
							$input_data=array('page_title'=>$page_title,'page_desc'=>$page_desc,'dateupdated'=>date('Y-m-d H:i:s'),'page_status'=>$page_status);
													
							$page_idd=$this->Cms_model->upt_cms($input_data,$page_id);
							//echo $this->db->last_query();exit;
							if($page_idd)
							{	// echo '///';exit;
								$this->session->set_flashdata('success','Cms updated successfully.');
								redirect(base_url("backend/").'cms/managecms');	
							}
							else
							{
								$this->session->set_flashdata('error','Error while updating cms.');
								redirect(base_url("backend/").'cms/updatecms/'.base64_encode($page_id));
							}							
						}
						else
						{
								$this->session->set_flashdata('error','cms name already exists.');
								redirect(base_url("backend/").'cms/updatecms/'.base64_encode($page_id));								
						}
					}
					else
					{
						$this->session->set_flashdata('error',$this->form_validation->error_string());
						redirect(base_url("admin/").'cms/updatecms/'.base64_encode($page_id));
					}
				}
			}
			else
			{
				$data['error_msg']='Cms is not found.';
			}
		}
		else
		{
			$this->session->set_flashdata('error','Cms is not found.');
			redirect(base_url("backend/").'cms/updatecms/'.base64_encode($page_id));
		}
		
		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/admin_right',$data);
		$this->load->view('admin/updatecms',$data);
		$this->load->view('admin/admin_footer');
	}
	
	
	public function deletecms()
	{
		$data['page_title']='Delete CMS';
		$data['error_msg']='';
		$page_id=base64_decode($this->uri->segment(4));
		if($page_id)
		{
			$delcat=$this->Cms_model->deleteCmss($page_id);
						if($delcat>0)
						{
							$this->session->set_flashdata('success','Cms deleted successfully.');
							redirect(base_url("backend/").'cms/managecms');	
						}
						else
						{
							$this->session->set_flashdata('error','Error while deleting cms.');
							redirect(base_url("backend/").'cms/managecms');
						}
		}
		else
		{
			$this->session->set_flashdata('error','cms is not found.');
			redirect(base_url("backend/").'cms/managecms');
		}
	}
}
