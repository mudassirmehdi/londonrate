<?php
defined('BASEPATH') OR exit('No direct scrt access allowed');
class NiceClassification extends CI_Controller {
	public function __construct()
	{
		 parent::__construct();
		 $this->load->library("pagination");
		
		$this->load->model('adminModel/NiceClassification_model');		 
		 if(! $this->session->userdata('talogged_in'))
		 {
			redirect('backend/login', 'refresh');
		 }
	}
	
	
	// code for manage Transaction
	public function manageNiceClassification()
	{

		$data['page_title']='Manage Nice Classification';
		
		$sel_object=$sel_type=$classification_name='Na';
		if($this->uri->segment(4)!='')
		{
			if($this->uri->segment(4)!="Na")
			{
				$sel_object=$this->uri->segment(4);
			}
		}
		
		if($this->uri->segment(5)!="")
		{
			if($this->uri->segment(5)!="Na")
			{
				$sel_type=$this->uri->segment(5);
			}  
		}
		
		if($this->uri->segment(6)!="")
		{
			if($this->uri->segment(6)!="Na")
			{
				$classification_name=$this->uri->segment(6);
			}  
		}
		
		

		$data['bannercnt']= $config["total_rows"] = $this->NiceClassification_model->NiceClassification_record_count($sel_object,$sel_type,$classification_name);

		$config = array();
		$config["base_url"] = base_url("backend/") . "NiceClassification/manageNiceClassification/".$sel_object."/".$sel_type."/".$classification_name;
		$config['per_page'] = 25;
		$config["uri_segment"] = 7;
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
				
		$page = ($this->uri->segment(7)) ? $this->uri->segment(7) : 0;
		$data["total_rows"] = $config["total_rows"]; 
		$data["links"] = $this->pagination->create_links();
		
		$data['page']=$page;
		$data['NiceClassification_master']=$this->NiceClassification_model->getAllNiceClassification($sel_object,$sel_type,$classification_name,$config["per_page"],$page);

		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/admin_right',$data);
		$this->load->view('admin/manage_NiceClassification',$data);
		$this->load->view('admin/admin_footer');
	}
	
	
	public function addNiceClassification()
	{
		$data['page_title']='ADD  NICE CLASSIFICATION ';
		
		$data['error_msg']='';
		if(isset($_POST['btn_addcms']))
		{
			$this->form_validation->set_rules('type_name','type Name','required');
					$this->form_validation->set_rules('nice_name','Classification Name','required');
					$this->form_validation->set_rules('sel_object','Object','required');	
						
			
			if($this->form_validation->run())
			{
				$nice_name=$this->input->post('nice_name');
				$type_name=$this->input->post('type_name');
				$sel_object=$this->input->post('sel_object');		
				$page_status=$this->input->post('page_status');	
				// check already category exists
				$category_exists=$this->NiceClassification_model->check_pageName($nice_name);
				//echo $this->db->last_query();exit;
				if($category_exists==0)
				{
						
						$input_data=array('nice'=>$nice_name,'object_id'=>$sel_object,'type_id'=>$type_name,'status'=>$page_status);
						$cms_id=$this->NiceClassification_model->add_NiceClassification($input_data);
						//echo $this->db->last_query();exit;
						if($cms_id>0)
						{
							$this->session->set_flashdata('success',' Nice Classification added successfully');
							redirect(base_url("backend/").'NiceClassification/manageNiceClassification');
						}
						else
						{
							$this->session->set_flashdata('success','Error while adding  Nice Classification');
							redirect(base_url("backend/").'NiceClassification/addNiceClassification');
						}
				}
				else
				{
						$this->session->set_flashdata('error',' Nice Classification already exists.');
						redirect(base_url("backend/").'NiceClassification/addNiceClassification');			
				}
			}
			else
			{
					$this->session->set_flashdata('error',$this->form_validation->error_string());
					redirect(base_url("backend/").'NiceClassification/addNiceClassification');			
			}
		}
		
		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/admin_right',$data);
		$this->load->view('admin/addNiceClassification',$data);
		$this->load->view('admin/admin_footer');
	}
	
	// code for update category
	public function updateNiceClassification()
	{
		$data['page_title']='Update  Nice Classification';
		$data['error_msg']='';
		$page_id=base64_decode($this->uri->segment(4));

		if($page_id)
		{
			$cmsInfo=$this->NiceClassification_model->getSingleNiceClassificationInfo($page_id,0);
			 
			if($cmsInfo>0)
			{
				$data['NiceClassificationInfo']=$this->NiceClassification_model->getSingleNiceClassificationInfo($page_id,1);
				
				if(isset($_POST['btn_updateNiceClassification']))
				{
					$this->form_validation->set_rules('type_name','type Name','required');
					$this->form_validation->set_rules('nice_name','Classification Name','required');
					$this->form_validation->set_rules('sel_object','Object','required');	
						
						if($this->form_validation->run())
						{
							$nice_name=$this->input->post('nice_name');
							$type_name=$this->input->post('type_name');
							$sel_object=$this->input->post('sel_object');		
							$page_status=$this->input->post('page_status');	
						$num_category=$this->NiceClassification_model->check_typeName_upt($type_name,$page_id); 
						//echo $this->db->last_query();exit;
						
						if($num_category==0)
						{
							
							$input_data=array('nice'=>$nice_name,'object_id'=>$sel_object,'type_id'=>$type_name,'status'=>$page_status);
													
							$page_idd=$this->NiceClassification_model->upt_NiceClassification($input_data,$page_id);
							//echo $this->db->last_query();exit;
							if($page_idd)
							{	// echo '///';exit;
								$this->session->set_flashdata('success',' Nice Classification updated successfully.');
								redirect(base_url("backend/").'NiceClassification/manageNiceClassification');	
							}
							else
							{
								$this->session->set_flashdata('error','Error while updating  Nice Classification.');
								redirect(base_url("backend/").'NiceClassification/updateNiceClassification/'.base64_encode($page_id));
							}							
						}
						else
						{
								$this->session->set_flashdata('error',' Nice Classification name already exists.');
								redirect(base_url("backend/").'NiceClassification/updateNiceClassification/'.base64_encode($page_id));								
						}
					}
					else
					{
						$this->session->set_flashdata('error',$this->form_validation->error_string());
						redirect(base_url("admin/").'NiceClassification/updateNiceClassification/'.base64_encode($page_id));
					}
				}
			}
			else
			{
				$data['error_msg']=' Nice Classification is not found.';
			}
		}
		else
		{
			$this->session->set_flashdata('error',' Nice Classification is not found.');
			redirect(base_url("backend/").'NiceClassification/updateNiceClassification/'.base64_encode($page_id));
		}
		
		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/admin_right',$data);
		$this->load->view('admin/updateNiceClassification',$data);
		$this->load->view('admin/admin_footer');
	}
	
	
	public function deleteNiceClassification()
	{
		$data['page_title']='Delete  Nice Classification';
		$data['error_msg']='';
		$page_id=base64_decode($this->uri->segment(4));
		if($page_id)
		{
			$delcat=$this->NiceClassification_model->deleteNiceClassification($page_id);
						if($delcat>0)
						{
							$this->session->set_flashdata('success',' Nice Classification deleted successfully.');
							redirect(base_url("backend/").'NiceClassification/manageNiceClassification');	
						}
						else
						{
							$this->session->set_flashdata('error','Error while deleting  Nice Classification.');
							redirect(base_url("backend/").'NiceClassification/manageNiceClassification');
						}
		}
		else
		{
			$this->session->set_flashdata('error',' Nice Classification is not found.');
			redirect(base_url("backend/").'NiceClassification/manageNiceClassification');
		}
	}
	public function getTypeByObjectId()
	{	
		$object_name=$_POST['sel_object'];
      	$outputData='';	
     
		$res=$this->NiceClassification_model->get_type_by_objectid($object_name);
		
		if(count($res)>0)
		{
			$count=1;
			$outputData.='<option value="">Select Type</option>';	
			
             foreach ($res as $row) 
            {
                $outputData.='<option value="'.$row->type_id.'"">'.$row->type.'</option>';
            } 
		}
		echo $outputData;
	}
	public function getNiceByTypeId()
	{	
		$object_name=$_POST['sel_object'];
		$type_name=$_POST['type_name'];
      	$outputData='';	
     
		$res=$this->NiceClassification_model->get_nice_by_typeid($object_name,$type_name);
		
		if(count($res)>0)
		{
			$count=1;
			$outputData.='<option value="">Select Nice Classification</option>';	
			
             foreach ($res as $row) 
            {
                $outputData.='<option value="'.$row->classi_id.'"">'.$row->nice.'</option>';
            } 
		}
		echo $outputData;
	}
	public function mpClassificationSearch()
	{
		
		//print_r($_REQUEST); exit;
		$sel_object=$sel_type=$classification_name='Na';
		
		$session_data=$this->session->userdata('logged_in');
		
		
		if(isset($_POST['btn_clear']))
		{
			 redirect(base_url("backend/").'NiceClassification/manageNiceClassification/');
		}
		  
		if(isset($_POST['btn_search']))
		{
		   
		    if($_POST['sel_object']!="")
		   {
			   $sel_object=$_POST['sel_object'];
			   
		   }
		    if($_POST['type_name']!="")
		   {
			   $sel_type=$_POST['type_name'];
		   }
		     if($_POST['classification_name']!="")
		   {
			   $classification_name=$_POST['classification_name'];
			   
			   //$fullname = str_replace(' ', '_', $fullname);
		   }  
		  

		  
			redirect(base_url("backend/").'NiceClassification/manageNiceClassification/'.$sel_object.'/'.$sel_type.'/'.$classification_name);
		}		   
		  
		redirect(base_url("backend/").'NiceClassification/manageNiceClassification/');		
	}
}

?>