<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Testimonials extends CI_Controller {
	public function __construct()
	{
		 parent::__construct();
		 $this->load->library("pagination");
		
		$this->load->model('adminModel/Testimonials_model');		 
		 if(! $this->session->userdata('talogged_in'))
		 {
			redirect('backend/login', 'refresh');
		 }
	}
	
	public function mpTestimonialsSearch()
	{
		
		//print_r($_REQUEST); exit;
		$title_name=$test_position='Na';
		
		$session_data=$this->session->userdata('logged_in');
		
		if(isset($_POST['btn_clear']))
		{
			 redirect(base_url("backend/").'Testimonials/manageTestimonials/');
		}
		  
		if(isset($_POST['btn_search']))
		{
		   
		    if($_POST['title_name']!="")
		   {
		   		
			   $title_name=trim($_POST['title_name']);
			  
		   }
		    if($_POST['test_position']!="")
		   {
			   $test_position=trim($_POST['test_position']);
			   $test_position = str_replace('%20', ' ', $test_position);
		   }
		    
		   
		 
			redirect(base_url("backend/").'Testimonials/manageTestimonials/'.$title_name.'/'.$test_position);
		}		   
		  
		redirect(base_url("backend/").'Testimonials/manageTestimonials/');		
	}
	// code for manage Transaction
	public function manageTestimonials()
	{
		$data['page_title']='Manage Testimonials';
		
		$title_name=$test_position='Na';

		 if($this->uri->segment(4)!='')
		{
			if($this->uri->segment(4)!="Na")
			{
				$title_name=$this->uri->segment(4);
			}
			

		}
		
		if($this->uri->segment(5)!="")
		{
			if($this->uri->segment(5)!="Na")
			{
				$test_position=$this->uri->segment(5);
			}  
		}
		

		$data['bannercnt']= $config["total_rows"] = $this->Testimonials_model->testimonials_record_count($title_name,$test_position);
		$config = array();
		$config["base_url"] = base_url("backend/") . "Testimonials/manageTestimonials/".$title_name."/".$test_position;
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
		$data['testimonials_master']=$this->Testimonials_model->getAllTestimonials($title_name,$test_position,$config["per_page"],$page);

		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/admin_right',$data);
		$this->load->view('admin/manage_testimonials',$data);
		$this->load->view('admin/admin_footer');
	}
	
	
	public function addtestimonials()
	{
		$data['page_title']='Add IP Testimonials';
		
		$data['error_msg']='';
		if(isset($_POST['btn_addcms']))
		{
			//$this->form_validation->set_rules('test_photo','Photo','required');
			$this->form_validation->set_rules('title_name','Name','required');
			$this->form_validation->set_rules('test_position','Position','required');
			$this->form_validation->set_rules('test_description','Description','required');
			
			
			if($this->form_validation->run())
			{
				$test_photo=$this->input->post('test_photo');

				$title_name=$this->input->post('title_name');	
				$test_position=$this->input->post('test_position');

				$test_description=$this->input->post('test_description');				
						
				$page_status=$this->input->post('page_status');	


				$path = $_FILES['test_photo']['name'];
						
			 	$ext = pathinfo($path,PATHINFO_EXTENSION);
				
				$target_dir = "templates/admin/assets/images/testimonials/";
				$fle_question = $target_dir.$path;
				move_uploaded_file($_FILES["test_photo"]["tmp_name"], $fle_question); 

				// check already category exists
				$category_exists=$this->Testimonials_model->check_pageName($title_name);
				//echo $this->db->last_query();exit;
				if($category_exists==0)
				{
						
						$input_data=array('test_photo'=>$fle_question,'title_name'=>$title_name,'test_position'=>$test_position,'test_description'=>$test_description,'status'=>$page_status);
						
						$cms_id=$this->Testimonials_model->add_testimonials($input_data);
						//echo $this->db->last_query();exit;
						if($cms_id>0)
						{
							$this->session->set_flashdata('success',' Testimonials added successfully');
							redirect(base_url("backend/").'Testimonials/manageTestimonials');
						}
						else
						{
							$this->session->set_flashdata('success','Error while adding Testimonials');
							redirect(base_url("backend/").'Testimonials/addtestimonials');
						}
				}
				else
				{
						$this->session->set_flashdata('error',' Testimonials already exists.');
						redirect(base_url("backend/").'Testimonials/addtestimonials');			
				}
			}
			else
			{
					$this->session->set_flashdata('error',$this->form_validation->error_string());
					redirect(base_url("backend/").'Testimonials/addtestimonials');			
			}
		}
		
		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/admin_right',$data);
		$this->load->view('admin/addtestimonials',$data);
		$this->load->view('admin/admin_footer');
	}
	
	// code for update category
	public function updatetestimonials()
	{
		$data['page_title']='Update IP Testimonials';
		$data['error_msg']='';
		$page_id=base64_decode($this->uri->segment(4));

		if($page_id)
		{
			$cmsInfo=$this->Testimonials_model->getSingletestimonialsInfo($page_id,0);
			 
			if($cmsInfo>0)
			{
				$data['TestimonialsInfo']=$this->Testimonials_model->getSingletestimonialsInfo($page_id,1);
				
				if(isset($_POST['btn_updateTestimonials']))
				{
					//$this->form_validation->set_rules('test_photo','Photo','required');
					$this->form_validation->set_rules('title_name','Name','required');
					$this->form_validation->set_rules('test_position','Position','required');
					$this->form_validation->set_rules('test_description','Description','required');	
						
						if($this->form_validation->run())
						{
							//$fle_question = "";
							$pic_photo="";
							
							$title_name=$this->input->post('title_name');	
							$test_position=$this->input->post('test_position');
							$test_description=$this->input->post('test_description');													
							$page_status=$this->input->post('page_status');	
							

							
							if($_FILES['test_photo']['size'] > 0 )
							{
								$path = $_FILES['test_photo']['name'];
									
							 	$ext = pathinfo($path,PATHINFO_EXTENSION);
								
								$target_dir = "templates/admin/assets/images/testimonials/";
								$fle_question = $target_dir.$path;
								move_uploaded_file($_FILES["test_photo"]["tmp_name"], $fle_question); 
								$pic_photo=$fle_question;

								

							}
							else
							{
								$pic_photo=$_POST['hidden_img'];
							}

						$num_category=$this->Testimonials_model->check_typeName_upt($type_name,$page_id); 
						//echo $this->db->last_query();exit;
						
						if($num_category==0)
						{
							
							$input_data=array('test_photo'=>$pic_photo,'title_name'=>$title_name,'test_position'=>$test_position,'test_description'=>$test_description,'status'=>$page_status,'updatedate'=>date("Y-m-d h:i:sa"));
													
							$page_idd=$this->Testimonials_model->upt_testimonials($input_data,$page_id);

							//echo $this->db->last_query();exit;
							if($page_idd)
							{	// echo '///';exit;
								$this->session->set_flashdata('success',' Testimonials updated successfully.');
								redirect(base_url("backend/").'Testimonials/manageTestimonials');	
							}
							else
							{
								$this->session->set_flashdata('error','Error while updating Testimonials.');
								redirect(base_url("backend/").'Testimonials/updatetestimonials/'.base64_encode($page_id));
							}							
						}
						else
						{
								$this->session->set_flashdata('error','Testimonials name already exists.');
								redirect(base_url("backend/").'Testimonials/updatetestimonials/'.base64_encode($page_id));								
						}
					}
					else
					{
						$this->session->set_flashdata('error',$this->form_validation->error_string());
						redirect(base_url("admin/").'Testimonials/updatetestimonials/'.base64_encode($page_id));
					}
				}
			}
			else
			{
				$data['error_msg']='IP Testimonials is not found.';
			}
		}
		else
		{
			$this->session->set_flashdata('error','Testimonials is not found.');
			redirect(base_url("backend/").'Testimonials/updatetestimonials/'.base64_encode($page_id));
		}
		
		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/admin_right',$data);
		$this->load->view('admin/updatetestimonials',$data);
		$this->load->view('admin/admin_footer');
	}
	
	
	public function deletetestimonials()
	{
		$data['page_title']='Delete IP Testimonials';
		$data['error_msg']='';
		$page_id=base64_decode($this->uri->segment(4));
		if($page_id)
		{
			$delcat=$this->Testimonials_model->deletetestimonials($page_id);
						if($delcat>0)
						{
							$this->session->set_flashdata('success',' Testimonials deleted successfully.');
							redirect(base_url("backend/").'Testimonials/manageTestimonials');	
						}
						else
						{
							$this->session->set_flashdata('error','Error while deleting Ip Testimonials.');
							redirect(base_url("backend/").'Testimonials/manageTestimonials');
						}
		}
		else
		{
			$this->session->set_flashdata('error','Testimonials is not found.');
			redirect(base_url("backend/").'Testimonials/manageTestimonials');
		}
	}
}

?>