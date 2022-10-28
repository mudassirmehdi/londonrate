<?php
defined('BASEPATH') OR exit('No direct scrt access allowed');
class PackageManagement extends CI_Controller {
	public function __construct()
	{
		 parent::__construct();
		 $this->load->library("pagination");
		
		$this->load->model('adminModel/PackageManagement_model');		 
		 if(! $this->session->userdata('talogged_in'))
		 {
			redirect('backend/login', 'refresh');
		 }
	}
	// code for manage Transaction
	public function managePackageManagement()
	{
		$data['page_title']='Manage Package Management';
		
		$data['bannercnt']= $config["total_rows"] = $this->PackageManagement_model->PackageManagement_record_count();
		$config = array();
		$config["base_url"] = base_url("backend/") . "PackageManagement/managePackageManagement";
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
		$data['PackageManagement_master']=$this->PackageManagement_model->getAllPackageManagement($config["per_page"],$page);

		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/admin_right',$data);
		$this->load->view('admin/manage_PackageManagement',$data);
		$this->load->view('admin/admin_footer');
	}
	
	
	public function addPackageManagement()
	{
		$data['page_title']='Add  Package Management';
		
		$data['error_msg']='';
		if(isset($_POST['btn_addcms']))
		{
			$this->form_validation->set_rules('pakage_name','Package Name','required');
			$this->form_validation->set_rules('full_description','Full Description','required');
			$this->form_validation->set_rules('description','Description','required');
			$this->form_validation->set_rules('amount','Amount','required');	
			$this->form_validation->set_rules('package_star','Star','required');

			if($this->form_validation->run())
			{
				$pakage_name=$this->input->post('pakage_name');
				$full_description=$this->input->post('full_description');
				$description=$this->input->post('description');
				$amount=$this->input->post('amount');
				$description=$this->input->post('description');		
				$package_star=$this->input->post('package_star');
				$page_status=$this->input->post('page_status');	
				// check already category exists
				$category_exists=$this->PackageManagement_model->check_pageName($pakage_name);
				//echo $this->db->last_query();exit;
				if($category_exists==0)
				{
						
						$input_data=array('package_name'=>$pakage_name,'full_description'=>$full_description,'description'=>$description,'amount'=>$amount,'package_star'=>$package_star,'package_status'=>$page_status,'dateadded'=>date('Y-m-d H:i'));
						
						$cms_id=$this->PackageManagement_model->add_PackageManagement($input_data);
						//echo $this->db->last_query();exit;
						if($cms_id>0)
						{
							$this->session->set_flashdata('success',' Package added successfully');
							redirect(base_url("backend/").'PackageManagement/managePackageManagement');
						}
						else
						{
							$this->session->set_flashdata('success','Error while adding  Package');
							redirect(base_url("backend/").'PackageManagement/addPackageManagement');
						}
				}
				else
				{
						$this->session->set_flashdata('error',' Package already exists.');
						redirect(base_url("backend/").'PackageManagement/addPackageManagement');			
				}
			}
			else
			{
					$this->session->set_flashdata('error',$this->form_validation->error_string());
					redirect(base_url("backend/").'PackageManagement/addPackageManagement');			
			}
		}
		
		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/admin_right',$data);
		$this->load->view('admin/addPackageManagement',$data);
		$this->load->view('admin/admin_footer');
	}
	
	// code for update category
	public function updatePackageManagement()
	{
		$data['page_title']='Update  Package';
		$data['error_msg']='';
		$page_id=base64_decode($this->uri->segment(4));

		if($page_id)
		{
			$cmsInfo=$this->PackageManagement_model->getSinglePackageManagementInfo($page_id,0);
			 
			if($cmsInfo>0)
			{
				$data['PackageManagementInfo']=$this->PackageManagement_model->getSinglePackageManagementInfo($page_id,1);
				
				if(isset($_POST['btn_updatePackageManagement']))
				{
					$this->form_validation->set_rules('pakage_name','Package Name','required');
					$this->form_validation->set_rules('full_description','Full Description','required');
					$this->form_validation->set_rules('description','Description','required');
					$this->form_validation->set_rules('amount','Amount','required');	
					$this->form_validation->set_rules('package_star','Star','required');
						
						if($this->form_validation->run())
						{
							$pakage_name=$this->input->post('pakage_name');
							$full_description=$this->input->post('full_description');
							$description=$this->input->post('description');
							$amount=$this->input->post('amount');
							$description=$this->input->post('description');		
							$package_star=$this->input->post('package_star');
							$page_status=$this->input->post('page_status');	
						$num_category=$this->PackageManagement_model->check_typeName_upt($pakage_name,$page_id); 
						//echo $this->db->last_query();exit;
						
						if($num_category==0)
						{
							
							$input_data=array('package_name'=>$pakage_name,'full_description'=>$full_description,'description'=>$description,'amount'=>$amount,'package_star'=>$package_star,'package_status'=>$page_status,'dateupdated'=>date('Y-m-d H:i'));
													
							$page_idd=$this->PackageManagement_model->upt_PackageManagement($input_data,$page_id);
							//echo $this->db->last_query();exit;
							if($page_idd)
							{	// echo '///';exit;
								$this->session->set_flashdata('success',' Package updated successfully.');
								redirect(base_url("backend/").'PackageManagement/managePackageManagement');	
							}
							else
							{
								$this->session->set_flashdata('error','Error while updating  Package.');
								redirect(base_url("backend/").'PackageManagement/updatePackageManagement/'.base64_encode($page_id));
							}							
						}
						else
						{
								$this->session->set_flashdata('error',' Package name already exists.');
								redirect(base_url("backend/").'PackageManagement/updatePackageManagement/'.base64_encode($page_id));								
						}
					}
					else
					{
						$this->session->set_flashdata('error',$this->form_validation->error_string());
						redirect(base_url("admin/").'PackageManagement/updatePackageManagement/'.base64_encode($page_id));
					}
				}
			}
			else
			{
				$data['error_msg']=' Package is not found.';
			}
		}
		else
		{
			$this->session->set_flashdata('error',' Package is not found.');
			redirect(base_url("backend/").'PackageManagement/updatePackageManagement/'.base64_encode($page_id));
		}
		
		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/admin_right',$data);
		$this->load->view('admin/updatePackageManagement',$data);
		$this->load->view('admin/admin_footer');
	}
	
	
	public function deletePackageManagement()
	{
		$data['page_title']='Delete  Package';
		$data['error_msg']='';
		$page_id=base64_decode($this->uri->segment(4));
		if($page_id)
		{
			$delcat=$this->PackageManagement_model->deletepackage_management($page_id);
						if($delcat>0)
						{
							$this->session->set_flashdata('success',' Package deleted successfully.');
							redirect(base_url("backend/").'PackageManagement/managePackageManagement');	
						}
						else
						{
							$this->session->set_flashdata('error','Error while deleting  Package.');
							redirect(base_url("backend/").'PackageManagement/managePackageManagement');
						}
		}
		else
		{
			$this->session->set_flashdata('error',' Package is not found.');
			redirect(base_url("backend/").'PackageManagement/managePackageManagement');
		}
	}
	public function getTypeByObjectId()
	{	
		$object_name=$_POST['sel_object'];
      	$outputData='';	
     
		$res=$this->PackageManagement_model->get_type_by_objectid($object_name);
		
		if(count($res)>0)
		{
			$count=1;
			$outputData.='<option value="">Select Object</option>';	
			
             foreach ($res as $row) 
            {
                $outputData.='<option value="'.$row->type_id.'"">'.$row->type.'</option>';
            } 
		}
		echo $outputData;
	}
}

?>