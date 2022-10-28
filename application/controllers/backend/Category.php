<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Category extends CI_Controller {
	public function __construct()
	{
		 parent::__construct();
		 $this->load->model('adminModel/category_model1');
		 $this->load->library("pagination");	
		 if(! $this->session->userdata('talogged_in'))
		 {
			redirect('backend/login', 'refresh');
		 }
	}
	
	// code for manage category
	public function managecategory()
	{
		$data['page_title']='Manage Category';
		
		$category_name=$category_status='Na';
		
		$session_data=$this->session->userdata('talogged_in');
		$user_type=$session_data['user_type'];
		$admin_id=$session_data['admin_id'];
		
		//echo $rst_name;exit;
		 
		if($this->uri->segment(4)!='')
		{
			if($this->uri->segment(4)!="Na")
			{
				$category_name=$this->uri->segment(4);
			}
		}
		
		if($this->uri->segment(5)!="")
		{
			if($this->uri->segment(5)!="Na")
			{
				$category_status=$this->uri->segment(5);
			}  
		}
		
		
		$data['bannercnt']= $config["total_rows"] = $this->category_model1->category_record_count($category_name,$category_status);
		$config = array();
		$config["base_url"] = base_url("backend/") . "Category/managecategory/".$category_name.'/'.$category_status;
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
		
		
		$data['categorymaster']=$this->category_model1->getAllCategory($category_name,$category_status,$config["per_page"],$page);
		$data['page']=$page;
		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/admin_right',$data);
		$this->load->view('admin/managecategory',$data);
		$this->load->view('admin/admin_footer');
	}
	
	public function mcatsearch()
	{
		
		//print_r($_REQUEST); exit;
		$category_name=$category_status='Na';
		
		$session_data=$this->session->userdata('talogged_in');
		$user_type=$session_data['user_type'];
		$admin_id=$session_data['admin_id'];
		
		if(isset($_POST['btn_clear']))
		{
			 redirect(base_url("backend/").'Category/managecategory/');
		}
		  
		if(isset($_POST['btn_search']))
		{
		   if($_POST['category_name']!="")
		   {
			   $category_name=trim($_POST['category_name']);
			   $category_name = str_replace(' ', '_', $category_name);
		  }
		   
		    if($_POST['category_status']!="")
		   {
			   $category_status=trim($_POST['category_status']);
		   }
		  
			redirect(base_url("backend/").'Category/managecategory/'.$category_name.'/'.$category_status);
		}		   
		  
		redirect('Category/managecategory', 'refresh');		
	}
	
	
	public function addcategory()
	{
		$data['page_title']='Add Category';
		$data['error_msg']='';
		if(isset($_POST['btn_addCategory']))
		{
			$this->form_validation->set_rules('category_name','Category Name','required');
			$this->form_validation->set_rules('category_status','Category Status','required');
			
			if($this->form_validation->run())
			{
				$category_name=$this->input->post('category_name');
				$parent_id=0;
				$category_status=$this->input->post('category_status');
				$category_tax=$this->input->post('category_tax');
						
				
				// check already category exists
				$category_exists=$this->category_model1->check_categoryName($category_name,$parent_id);
				//echo $this->db->last_query();exit;
				if($category_exists==0)
				{
						$category_image='';
						$cat_listing_image='';
						if(isset($_FILES['category_image']))
						{
							if($_FILES['category_image']['name']!="")
							{
								$photo_imagename='';
								$new_image_name = rand(1, 99999).$cat_image;
								$config = array(
										'upload_path' => "uploads/prod_cat_image/",
										'allowed_types' => "gif|jpg|png|bmp|jpeg",
										'max_size' => "0", 
										'file_name' =>$new_image_name
										);
								$this->load->library('upload', $config);
								$this->upload->initialize($config);
								if($this->upload->do_upload('category_image'))
								{ 
									$imageDetailArray = $this->upload->data();								
									$photo_imagename =  $imageDetailArray['file_name'];
								}
								else
								{
									//echo $this->upload->display_errors();
								}
								if($_FILES['user_photo']['error']==0)
								{ 
									$category_image=$photo_imagename;
								}
							}
						}
						
						if(isset($_FILES['cat_listing_image']))
						{
							if($_FILES['cat_listing_image']['name']!="")
							{
								$photo_imagename1='';
								$new_image_name1 = rand(1, 99999).$cat_image;
								$config = array(
										'upload_path' => "uploads/prod_cat_image/",
										'allowed_types' => "gif|jpg|png|bmp|jpeg",
										'max_size' => "0", 
										'file_name' =>$new_image_name1
										);
								$this->load->library('upload', $config);
								$this->upload->initialize($config);
								if($this->upload->do_upload('cat_listing_image'))
								{ 
									$imageDetailArray = $this->upload->data();								
									$photo_imagename1 =  $imageDetailArray['file_name'];
								}
								else
								{
									//echo $this->upload->display_errors();
								}
								if($_FILES['user_photo']['error']==0)
								{ 
									$cat_listing_image=$photo_imagename1;
								}
							}
						}
						
						$first_letter=$category_name[0];
						$categoryID =$first_letter."00001";
						
						$input_data=array('categoryID'=>$categoryID,'category_name'=>$category_name,'cat_image'=>$category_image,'cat_listing_image'=>$cat_listing_image,'parent_id'=>$parent_id,'category_status'=>$category_status,'dateadded'=>date('Y-m-d H:i:s'),'dateupdated'=>date('Y-m-d H:i:s'),'category_tax'=>$category_tax);
						
						$category_id=$this->category_model1->add_category($input_data);
						//echo $this->db->last_query();exit;
						if($category_id>0)
						{
							$this->session->set_flashdata('success','Caetgory added successfully');
							redirect(base_url("backend/").'Category/managecategory');
						}
						else
						{
							$this->session->set_flashdata('success','Error while adding caetgory');
							redirect(base_url("backend/").'Category/addcategory');
						}
				}
				else
				{
						$this->session->set_flashdata('error','Category already exists.');
						redirect(base_url("backend/").'Category/addcategory');			
				}
			}
			else
			{
					$this->session->set_flashdata('error',$this->form_validation->error_string());
					redirect(base_url("backend/").'Category/addcategory');			
			}
		}
		
		$data['paraentCatList']=$this->category_model1->getParentCatList();
		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/admin_right',$data);
		$this->load->view('admin/addcategory',$data);
		$this->load->view('admin/admin_footer');
	}
	
	
	
	// code for update category
	public function updatecategory()
	{
		$data['page_title']='Update Category';
		$data['error_msg']='';
		$category_id=base64_decode($this->uri->segment(4));
		if($category_id)
		{
			$categoryInfo=$this->category_model1->getSingleCategoryInfo($category_id,0);
			if($categoryInfo>0)
			{
				$data['categoryInfo']=$this->category_model1->getSingleCategoryInfo($category_id,1);
				
				if(isset($_POST['btn_updateCategory']))
				{
					$this->form_validation->set_rules('category_name','Category Name','required');
					$this->form_validation->set_rules('category_status','Category Status','required');
					
					
					if($this->form_validation->run())
					{
						$category_name=$this->input->post('category_name');
						$parent_id=0;
						$category_tax=$this->input->post('category_tax');
						$category_status=$this->input->post('category_status');
						$old_cat_listing_image=$this->input->post('old_cat_listing_image');
						$old_category_image=$this->input->post('old_category_image');
						$num_category=$this->category_model1->check_categoryName_upt($category_name,$category_id); 
						//echo $this->db->last_query();exit;
						
						if($num_category==0)
						{
							$category_image='';
							if(isset($_FILES['category_image']))
							{
								if($_FILES['category_image']['name']!=""){
									$photo_imagename='';
									$new_image_name = rand(1, 99999).$_FILES['category_image']['name'];
									$config = array(
											'upload_path' => "uploads/prod_cat_image/",
											'allowed_types' => "gif|jpg|png|bmp|jpeg",
											'max_size' => "0", 
											'file_name' =>$new_image_name
											);
									$this->load->library('upload', $config);
									$this->upload->initialize($config);
									if($this->upload->do_upload('category_image'))
									{ 
										$imageDetailArray = $this->upload->data();								
										$photo_imagename =  $imageDetailArray['file_name'];
									}
									else
									{
										//echo $this->upload->display_errors();
									}
									if($_FILES['user_photo']['error']==0)
									{ 
										$category_image=$photo_imagename;
									}
									else
									{
										$category_image=$old_category_image;
									}
								}
								else
								{
									$category_image=$old_category_image;
								}
							}
							else
							{
								$category_image=$old_category_image;
							}
							
							$cat_listing_image='';
							if(isset($_FILES['cat_listing_image']))
							{
								if($_FILES['cat_listing_image']['name']!=""){
									$photo_imagename1='';
									$new_image_name1 = rand(1, 99999).$_FILES['cat_listing_image']['name'];
									$config = array(
											'upload_path' => "uploads/prod_cat_image/",
											'allowed_types' => "gif|jpg|png|bmp|jpeg",
											'max_size' => "0", 
											'file_name' =>$new_image_name1
											);
									$this->load->library('upload', $config);
									$this->upload->initialize($config);
									if($this->upload->do_upload('cat_listing_image'))
									{ 
										$imageDetailArray = $this->upload->data();								
										$photo_imagename1 =  $imageDetailArray['file_name'];
									}
									else
									{
										//echo $this->upload->display_errors();
									}
									if($_FILES['user_photo']['error']==0)
									{ 
										$cat_listing_image=$photo_imagename1;
									}
									else
									{
										$cat_listing_image=$old_cat_listing_image;
									}
								}
								else
								{
									$cat_listing_image=$old_cat_listing_image;
								}
							}
							else
							{
								$cat_listing_image=$old_cat_listing_image;
							}
							
							if($category_status=='Inactive')
							{
								$parentcategoryInfo=$this->category_model1->checkCatParent($category_id,0);
								if($parentcategoryInfo>0)
								{
									$this->session->set_flashdata('error','This category is parent category for other category, so status is not set to inactive.');
									redirect(base_url("backend/").'Category/updatecategory/'.base64_encode($category_id));
								}
							}
							
							$first_letter=$category_name[0];
							$categoryID =$first_letter."00001";
						
							$input_data=array('categoryID'=>$categoryID,'category_name'=>$category_name,'parent_id'=>$parent_id,'cat_image'=>$category_image,'cat_listing_image'=>$cat_listing_image,'category_description'=>$category_description,'category_status'=>$category_status,'dateupdated'=>date('Y-m-d H:i:s'),'category_tax'=>$category_tax);
													
							$category_id=$this->category_model1->upt_category($input_data,$category_id);
							//echo $this->db->last_query();exit;
							if($category_id)
							{	// echo '///';exit;
								$this->session->set_flashdata('success','Category updated successfully.');
								redirect(base_url("backend/").'Category/managecategory');	
							}
							else
							{
								$this->session->set_flashdata('error','Error while updating category.');
								redirect(base_url("backend/").'Category/updatecategory/'.base64_encode($category_id));
							}							
						}
						else
						{
								$this->session->set_flashdata('error','Category name already exists.');
								redirect(base_url("backend/").'Category/updatecategory/'.base64_encode($category_id));								
						}
					}
					else
					{
						$this->session->set_flashdata('error',$this->form_validation->error_string());
						redirect(base_url("admin/").'Category/updatecategory/'.base64_encode($category_id));
					}
				}
			}
			else
			{
				$data['error_msg']='Main Category is not found.';
			}
		}
		else
		{
			$this->session->set_flashdata('error','Category is not found.');
			redirect(base_url("backend/").'Category/updatecategory/'.base64_encode($category_id));
		}
		$data['paraentCatList']=$this->category_model1->getParentCategoryLists();
		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/admin_right',$data);
		$this->load->view('admin/updatecategory',$data);
		$this->load->view('admin/admin_footer');
	}
	

	
	public function deletecategory()
	{
		$data['page_title']='Delete Category';
		$data['error_msg']='';
		$category_id=base64_decode($this->uri->segment(4));
		if($category_id)
		{
			$numcategoryInfo=$this->category_model1->getdelCAtegoryInfo($category_id,0);
			
			if($numcategoryInfo>0)
			{
				$categoryInfo=$this->category_model1->getdelCAtegoryInfo($category_id,1);
				
				// checking it is parent for other
				$parentcategoryInfo=$this->category_model1->checkCatParent($categoryInfo[0]['category_id'],0);
				
				if($parentcategoryInfo>0)
				{
					$this->session->set_flashdata('error','This category is parent category for other category.');
					redirect(base_url("backend/").'Category/managecategory');
				}
				else
				{
					$delcat=$this->category_model1->deleteCategory($category_id);
						if($delcat>0)
						{
							$this->session->set_flashdata('success','Category deleted successfully.');
							redirect(base_url("backend/").'Category/managecategory');	
						}
						else
						{
							$this->session->set_flashdata('error','Error while deleting category.');
							redirect(base_url("backend/").'Category/managecategory');
						}
				}
			}
			else
			{
				$data['error_msg']='Category is not found.';
			}
		}
		else
		{
			$this->session->set_flashdata('error','category is not found.');
			redirect(base_url("backend/").'Category/managecategory');
		}
	}
}
