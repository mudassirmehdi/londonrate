<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pages extends CI_Controller {
	public function __construct()
	{
		 parent::__construct();
		 $this->load->model('adminModel/Cms_model');
		 $this->load->library("pagination");	
		 
	}
	
	
	public function about()
	{
		$this->load->view('aboutus');
	}
	
	public function viewpage($pagename)
	{
		
		
		
		$arrPage = $this->Cms_model->getPageData($pagename);
		
		$data['title']=$pagename;	
		$data['arrPage']=$arrPage ;	
		$this->load->view('view_page',$data);
		 
	}
	public function faq()
	{
		
		$arrFaq = $this->Cms_model->getAllFaq();
		$data['title']="FAQ";	
		$data['arrFaq']=$arrFaq;	
		$this->load->view('faqs',$data);
	}
	public function privacy()
	{
		$data['title']="Privacy Policy";
		
		$arrPage = $this->Cms_model->getPageData('Privacy');
		$data['title']="FAQ";	
		$data['arrPage']=$arrPage ;	
		$this->load->view('privacy_policy',$data);
	}
	public function terms()
	{
		$data['title']="Terms & Conditions";
		$arrPage = $this->Cms_model->getPageData('Terms');
		$data['title']="Terms & Conditions";	
		$data['arrPage']=$arrPage ;	
		
		$this->load->view('terms_condition',$data);
	}
	
	public function addPages()
	{
		if(! $this->session->userdata('logged_in'))
		 {
			redirect('Login', 'refresh');
		 }
		$data['title']='Add Page';
		
		if(isset($_POST['btn_addpage']))
		{
			//print_r($_POST);
			$this->form_validation->set_rules('page_name','Page Name','required');
			$this->form_validation->set_rules('page_title','Page Title','required');
			$this->form_validation->set_rules('page_desc','Description','required');
			$this->form_validation->set_rules('page_status','Page Status','required');
			
			
			if($this->form_validation->run())
			{
				$page_title=$this->input->post('page_title');
				$page_desc=$this->input->post('page_desc');
				$page_status=$this->input->post('page_status');
				$page_name=$this->input->post('page_name');
				
// check already page exists
				$page_exists=$this->Pages_model->check_pageName($page_name,0);
				if($page_exists==0)
				{				
					$input_data=array('page_name'=>$page_name,'page_title'=>$page_title,'page_desc'=>addslashes($page_desc),'page_status'=>$page_status);
					
					$faq_id=$this->Pages_model->add_Page($input_data);
					//echo $this->db->last_query();exit;
					if($faq_id>0)
					{
						$this->session->set_flashdata('success','Page added successfully.');
						redirect(base_url().'Pages/managePages');	
					}
					else
					{
						$this->session->set_flashdata('error','Error while adding page.');
						redirect(base_url().'Pages/addPages');
					}
				}
				else
				{
						$this->session->set_flashdata('error','page name already exists.');
						redirect(base_url().'Pages/addPages');								
				}
			}
			else
			{
				$this->session->set_flashdata('error',$this->form_validation->error_string());
				redirect(base_url().'Pages/addPages');
			}
		}
		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/addPages');
		$this->load->view('admin/admin_footer');
	}
	
	
	// code for manage Pages
	public function managePages()
	{
		if(! $this->session->userdata('logged_in'))
		 {
			redirect('Login', 'refresh');
		 }
		$data['title']='Manage Pages';
		
		$data['numpagemaster']=$this->Pages_model->getAllPages(0);
		$data['pagemaster']=$this->Pages_model->getAllPages(1);
		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/managePages',$data);
		$this->load->view('admin/admin_footer');
	}
	
	// code for update faq
	public function updatePages()
	{
		if(! $this->session->userdata('logged_in'))
		 {
			redirect('Login', 'refresh');
		 }
		$data['title']='Update Pages';
		$data['error_msg']='';
		$page_id=base64_decode($this->uri->segment(3));
		if($page_id)
		{
			$pageInfo=$this->Pages_model->getSinglePageInfo($page_id,0);
			if($pageInfo>0)
			{
				$data['pageInfo']=$this->Pages_model->getSinglePageInfo($page_id,1);
				
				if(isset($_POST['btn_updatepage']))
				{
					$this->form_validation->set_rules('page_name','Page Name','required');
					$this->form_validation->set_rules('page_title','Page Title','required');
					$this->form_validation->set_rules('page_desc','Description','required');
					$this->form_validation->set_rules('page_status','Page Status','required');
					
					
					if($this->form_validation->run())
					{
						$page_title=$this->input->post('page_title');
						$page_desc=$this->input->post('page_desc');
						$page_status=$this->input->post('page_status');
						$page_name=$this->input->post('page_name');
						
						$page_exists=$this->Pages_model->check_pageName($page_name,$page_id);
						if($page_exists==0)
						{	
							$input_data=array('page_title'=>$page_title,'page_desc'=>addslashes($page_desc),'page_status'=>$page_status);
													
							$page_id=$this->Pages_model->upt_page($input_data,$page_id);
							//echo $this->db->last_query();exit;
							if($page_id)
							{	// echo '///';exit;
								$this->session->set_flashdata('success','Page updated successfully.');
								redirect(base_url().'Pages/managePages');	
							}
							else
							{
								$this->session->set_flashdata('error','Error while updating page.');
								redirect(base_url().'Pages/updatePages/'.base64_encode($page_id));
							}
						}
						else
						{
								$this->session->set_flashdata('error','page name already exists.');
								redirect(base_url().'Pages/updatePages/'.base64_encode($page_id));								
						}
					}
					else
					{
						$this->session->set_flashdata('error',$this->form_validation->error_string());
						redirect(base_url().'Pages/updatePages/'.base64_encode($page_id));
					}
				}
			}
			else
			{
				$data['error_msg']='Page is not found.';
			}
		}
		else
		{
			$this->session->set_flashdata('error','Page is not found.');
			redirect(base_url().'Pages/updatePages/'.base64_encode($page_id));
		}
		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/updatePages',$data);
		$this->load->view('admin/admin_footer');
	}
	

	
	public function deletePages()
	{
		if(! $this->session->userdata('logged_in'))
		 {
			redirect('Login', 'refresh');
		 }
		$data['title']='Delete Pages';
		$data['error_msg']='';
		$page_id=base64_decode($this->uri->segment(3));
		if($page_id)
		{
			$pageInfo=$data['pageInfo']=$this->Pages_model->getSinglePageInfo($page_id,1);
			
			if(count($pageInfo)>0)
			{
				$delpage=$this->Pages_model->deleteFaq($page_id);
				if($delpage>0)
				{
					$this->session->set_flashdata('success','Page deleted successfully.');
					redirect(base_url().'Pages/managePages');	
				}
				else
				{
					$this->session->set_flashdata('error','Error while deleting page.');
					redirect(base_url().'Pages/managePages');
				}
			}
			else
			{
				$data['error_msg']='Pages is not found.';
			}
		}
		else
		{
			$this->session->set_flashdata('error','Pages is not found.');
			redirect(base_url().'Pages/managePages');
		}
	}
}
