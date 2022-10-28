<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Slider extends CI_Controller {
	public function __construct()
	{
		 parent::__construct();
		 $this->load->library("pagination");	
		 $this->load->model('adminModel/Slider_model');
		 if(! $this->session->userdata('talogged_in'))
		 {
			redirect('backend/login', 'refresh');
		 }
	}
	
	
	// code for manage Transaction
	public function manageslider()
	{
		$data['page_title']='Manage Slider';
		
		$banner_title='Na';
		
		 
		if($this->uri->segment(4)!='')
		{
			if($this->uri->segment(4)!="Na")
			{
				$banner_title=$this->uri->segment(4);
			}
		}
		
		$data['bannercnt']= $config["total_rows"] = $this->Slider_model->banner_record_count($banner_title);
		$config = array();
		$config["base_url"] = base_url("backend/") . "Slider/manageslider/".$banner_title;
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
		
		$data['bannermaster']=$this->Slider_model->getAllbaners($banner_title,$config["per_page"],$page);
		
		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/admin_right',$data);
		$this->load->view('admin/manageslider',$data);
		$this->load->view('admin/admin_footer');
	}
	
	public function mslidersearch()
	{
		
		//print_r($_REQUEST); exit;
		$banner_title='Na';
		
		$session_data=$this->session->userdata('talogged_in');
		$user_type=$session_data['user_type'];
		$admin_id=$session_data['admin_id'];
		
		if(isset($_POST['btn_clear']))
		{
			 redirect(base_url("backend/").'Slider/manageslider/');
		}
		  
		if(isset($_POST['btn_search']))
		{
		   if($_POST['banner_title']!="")
		   {
			   $banner_title=trim($_POST['banner_title']);
			   $banner_title = str_replace(' ', '_', $banner_title);
		  }
		  
			redirect(base_url("backend/").'Slider/manageslider/'.$banner_title);
		}		   
		  
		redirect('Slider/manageslider', 'refresh');		
	}
	public function addslider()
	{
		$data['page_title']='Add Slider';
		$data['error_msg']='';
		if(isset($_POST['btn_addslider']))
		{
			//print_r($_POST);exit;
			$this->form_validation->set_rules('banner_type','Banner Type','required');
			$this->form_validation->set_rules('banner_title','Banner Title','required');
			$this->form_validation->set_rules('banner_start_date','Start Date','required');
			$this->form_validation->set_rules('banner_end_date','End Date','required');
			$this->form_validation->set_rules('banner_status','Banner Status','required');
			
			if($this->form_validation->run())
			{
				$banner_type=$this->input->post('banner_type');
				$banner_title=$this->input->post('banner_title');
				$banner_start_date=$this->input->post('banner_start_date');
				$banner_end_date=$this->input->post('banner_end_date');
				$banner_rank=0;
				$banner_status=$this->input->post('banner_status');
				$banner_position="Top";
				if($banner_type=="Normal")
				{
					if(isset($_POST['banner_position']))
					{
						//print_r($_POST['banner_position']);exit;
						$banner_position=implode(",",$_POST['banner_position']);
					}
					else
						$banner_position="Top";
				}
				
				$banner_image='';
				if(isset($_FILES['banner_image']))
				{ 
					if($_FILES['banner_image']['name']!="")
					{
						$photo_imagename='';
						$new_image_name = rand(1, 99999).$_FILES['banner_image']['name'];
						 $config1 = array(
							'upload_path' => "uploads/banners/",
							'allowed_types' => "gif|jpg|png|bmp|jpeg",
							'max_size' => "0", 
							'file_name' =>$new_image_name
							);
							$this->load->library('upload', $config1);
							$this->upload->initialize($config1);
							if($this->upload->do_upload('banner_image'))
							{ 
								$imageDetailArray = $this->upload->data();								
								$photo_imagename =  $imageDetailArray['file_name'];
							}
							else
							{
								//echo $this->upload->display_errors();
							}
							if($_FILES['banner_image']['error']==0)
							{ 
								$banner_image=$photo_imagename;
							}
					}
				}	
				//$bannertanks=$this->Slider_model->checkSliderRank($banner_start_date,$banner_end_date,$banner_rank,0);
				//echo $this->db->last_query();exit;
				/*if($bannertanks==0)
				{*/
					$final_product_id=$final_store_id=0;
					if($banner_type=='Product')
					{
						$final_product_id=$this->input->post('final_product_id');
					}
					if($banner_type=='Store')
					{
						$final_store_id=$this->input->post('final_store_id');
					}
					$input_data=array(	'banner_position'=>$banner_position,
										'banner_type'=>$banner_type,
										'final_product_id'=>$final_product_id,
										'final_store_id'=>$final_store_id,
										'banner_title'=>$banner_title,
										'banner_start_date'=>date('Y-m-d',strtotime($banner_start_date)),
										'banner_end_date'=>date('Y-m-d',strtotime($banner_end_date)),
										'banner_rank'=>$banner_rank,
										'banner_status'=>$banner_status,
										'banner_image'=>$banner_image,
										'dateadded'=>date('Y-m-d H:i:s'),
										'dateupdated'=>date('Y-m-d H:i:s')
									 );
					
					$store_id=$this->Slider_model->add_slider($input_data);
					//echo $this->db->last_query();exit;
					if($store_id>0)
					{
						$this->session->set_flashdata('success','Slider added successfully.');
						redirect(base_url("backend/").'Slider/manageslider');	
					}
					else
					{
						$this->session->set_flashdata('error','Error while adding slider.');
						redirect(base_url("backend/").'Slider/addslider');
					}
				/*}
				else
				{
					$this->session->set_flashdata('error','Rank is already assigned.');
					redirect(base_url("backend/").'Slider/addslider');
				}*/
			}
			else
			{
				$this->session->set_flashdata('error',$this->form_validation->error_string());
				redirect(base_url("backend/").'Slider/addslider');
			}
		}
		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/admin_right',$data);
		$this->load->view('admin/addslider',$data);
		$this->load->view('admin/admin_footer');
	}
	
	public function deleteslider()
	{
		$data['page_title']='Delete slider';
		$data['error_msg']='';
		$slider_id=base64_decode($this->uri->segment(4));
		if($slider_id)
		{
			$delcat=$this->Slider_model->deleteSilderd($slider_id);
				if($delcat>0)
				{
					$this->session->set_flashdata('success','Slider deleted successfully.');
					redirect(base_url("backend/").'Slider/manageslider');	
				}
				else
				{
					$this->session->set_flashdata('error','Error while deleting slider.');
					redirect(base_url("backend/").'Slider/manageslider');
				}
		}
		else
		{
			$this->session->set_flashdata('error','slider is not found.');
			redirect(base_url("backend/").'Slider/manageslider');
		}
	}
	
		
	public function updateslider()
	{
		$data['page_title']='Update Slider';
		$banner_id=base64_decode($this->uri->segment(4));
		$data['bannerInfo']=$this->Slider_model->getbannerinfo($banner_id);
		$data['error_msg']='';
		if(isset($_POST['btn_updateslider']))
		{
			//print_r($_POST);exit;
			$this->form_validation->set_rules('banner_title','Banner Title','required');
			$this->form_validation->set_rules('banner_start_date','Start Date','required');
			$this->form_validation->set_rules('banner_end_date','End Date','required');
			$this->form_validation->set_rules('banner_status','Banner Status','required');
			
			if($this->form_validation->run())
			{
				$banner_title=$this->input->post('banner_title');
				$banner_start_date=$this->input->post('banner_start_date');
				$banner_end_date=$this->input->post('banner_end_date');
				$banner_rank=0;
				$banner_status=$this->input->post('banner_status');
				$old_banner_image=$this->input->post('old_banner_image');
				$banner_type=$data['bannerInfo'][0]['banner_type'];
				$banner_position="Top";
				if($banner_type=="Normal")
				{
					if(isset($_POST['banner_position']))
					{
						//print_r($_POST['banner_position']);exit;
						$banner_position=implode(",",$_POST['banner_position']);
					}
					else
						$banner_position="Top";
				}
				
				$banner_image='';
				if(isset($_FILES['banner_image']))
				{ 
					if($_FILES['banner_image']['name']!="")
					{
						$photo_imagename='';
						$new_image_name = rand(1, 99999).$_FILES['banner_image']['name'];
						 $config1 = array(
							'upload_path' => "uploads/banners/",
							'allowed_types' => "gif|jpg|png|bmp|jpeg",
							'max_size' => "0", 
							'file_name' =>$new_image_name
							);
							$this->load->library('upload', $config1);
							$this->upload->initialize($config1);
							if($this->upload->do_upload('banner_image'))
							{ 
								$imageDetailArray = $this->upload->data();								
								$photo_imagename =  $imageDetailArray['file_name'];
							}
							else
							{
								//echo $this->upload->display_errors();
							}
							if($_FILES['banner_image']['error']==0)
							{ 
								$banner_image=$photo_imagename;
							}
					}
					else
					{
						$banner_image=$old_banner_image;
					}
				}
				else
				{
					$banner_image=$old_banner_image;
				}
				
				$final_product_id=$data['bannerInfo'][0]['final_product_id'];
				$final_store_id=$data['bannerInfo'][0]['final_store_id'];
					if($banner_type=='Product')
					{
						$final_product_id=$this->input->post('final_product_id');
					}
					if($banner_type=='Store')
					{
						$final_store_id=$this->input->post('final_store_id');
					}
					$input_data=array(	'banner_position'=>$banner_position,
										'banner_type'=>$banner_type,
										'final_product_id'=>$final_product_id,
										'final_store_id'=>$final_store_id,
										'banner_title'=>$banner_title,
										'banner_start_date'=>date('Y-m-d',strtotime($banner_start_date)),
										'banner_end_date'=>date('Y-m-d',strtotime($banner_end_date)),
										'banner_status'=>$banner_status,
										'banner_image'=>$banner_image,
										'dateupdated'=>date('Y-m-d H:i:s')
									 );
				
					$banner_id=$this->Slider_model->updates_slider($input_data,$banner_id);
					//echo $this->db->last_query();exit;
					if($banner_id>0)
					{
						$this->session->set_flashdata('success','Slider updated successfully.');
						redirect(base_url("backend/").'Slider/manageslider');	
					}
					else
					{
						$this->session->set_flashdata('error','Error while updating slider.');
						redirect(base_url("backend/").'Slider/updateslider/'.base64_encode($banner_id));
					}
			}
			else
			{
				$this->session->set_flashdata('error',$this->form_validation->error_string());
				redirect(base_url("backend/").'Slider/updateslider/'.base64_encode($banner_id));
			}
		}
		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/admin_right',$data);
		$this->load->view('admin/updateslider',$data);
		$this->load->view('admin/admin_footer');
	}
	
	public function getSliderProductDetails()
	{
		$code_search=$_GET['term'];
		$str='';
		$returnData = array();
		$res=$this->Slider_model->getSliderProducts($code_search);
		
		if(count($res)>0)
		{
			foreach($res as $re)
			{
				$thirdcat=$catname='';
				if($re['category_id']!=0)
					$mastercat=$this->Slider_model->getmastername($re['category_id']);
				if($re['subcategory_id']!=0)
					$catname=$this->Slider_model->getmastername($re['subcategory_id']);
				
				if($re['thirdcategory_id']!=0)
					$thirdcat=$this->Slider_model->getmastername($re['thirdcategory_id']);
				
				
				 $data['id'] = $re['product_id'];
				 $str =$re['product_name'];
				 
				$str1="<strong>Product Name:</strong> ".$re['product_name']."\n<strong> Master Category:</strong> ".$mastercat."\n<strong> Category:</strong> ".$catname."";
				
				if($thirdcat!="")
					$str1 .="\n<strong> Sub Category:</strong> ".$thirdcat."";
				
				$str1 .="\n<strong> Weight:</strong> ".$re['weight'].$re['units']." \n<strong>Discount Price:</strong> ฿ ".$re['discount_price'];
				
				$data['value'] = $str;	
				$data['value1'] = nl2br($str1);					
				array_push($returnData, $data);
			}
			
		}
		 echo json_encode($returnData);die;
		//echo json_encode(array('resstr'=>$returnData));
	}
	
	public function getSliderStoreDetails()
	{
		$code_search=$_GET['term'];
		$str='';
		$returnData = array();
		$res=$this->Slider_model->getSliderStores($code_search);
		//echo $this->db->last_query();exit;
		if(count($res)>0)
		{
			foreach($res as $re)
			{
				 $data['id'] = $re['store_id'];
				$str=$re['store_name'];
				
				$str1 .="<strong> Name:</strong> ".$re['store_name']."\n<strong> Owner Name:</strong> ".$re['store_owner_name']." \n<strong>Owner Number:</strong> ".$re['store_owner_number'];
				
				$data['value'] = $str;	
				$data['value1'] = nl2br($str1);	
															
				array_push($returnData, $data);
			}
			
		}
		//print_r($returnData);exit;
		 echo json_encode($returnData);die;
		//echo json_encode(array('resstr'=>$returnData));
	}
	
	public function order_place_mail_app_customer()
	{
		$this->load->view('emails/order_place_mail_app_customer');
	}
}
