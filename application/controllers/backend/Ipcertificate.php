<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Ipcertificate extends CI_Controller {

	public function __construct()
	{
		 parent::__construct();
		 $this->load->library("pagination");
		 $this->load->model('adminModel/Ipcertificate_model');
		 $this->load->model('adminModel/Iptype_model');
		 if(! $this->session->userdata('talogged_in'))
		 {
			redirect('backend/login', 'refresh');
		 }
	}
	public function mpCertificateSearch()
	{
		
		//print_r($_REQUEST); exit;
		$certificate_name=$type_name=$coverage_value='Na';
		
		$session_data=$this->session->userdata('logged_in');
		
		if(isset($_POST['btn_clear']))
		{
			 redirect(base_url("backend/").'Ipcertificate/index/');
		}
		  
		if(isset($_POST['btn_search']))
		{
		   
		    if($_POST['certificate_name']!="")
		   {
		   		
			   $certificate_name=trim($_POST['certificate_name']);
			  
		   }
		    if($_POST['type_name']!="")
		   {
			   $type_name=trim($_POST['type_name']);
			   $type_name = str_replace('%20', ' ', $type_name);
		   }
		    if($_POST['coverage_value']!="")
		   {
		   	
			   $coverage_value=trim($_POST['coverage_value']);
			  
		   }
		   
		 
			redirect(base_url("backend/").'Ipcertificate/index/'.$certificate_name.'/'.$type_name.'/'.$coverage_value);
		}		   
		  
		redirect(base_url("backend/").'Ipcertificate/index/');		
	}
	public function index()
	{		
		$data['page_title']='Ip Certificate';
		$certificate_name=$type_name=$coverage_value='Na';

		 if($this->uri->segment(4)!='')
		{
			if($this->uri->segment(4)!="Na")
			{
				$certificate_name=$this->uri->segment(4);
			}
			else
			{
				$certificate_name='Na';
			}

		}
		
		if($this->uri->segment(5)!="")
		{
			if($this->uri->segment(5)!="Na")
			{
				$type_name=$this->uri->segment(5);
			}  
		}
		if($this->uri->segment(6)!="")
		{
			if($this->uri->segment(6)!="Na")
			{
				$coverage_value=$this->uri->segment(6);
			}  
		}


		$data['bannercnt']= $config["total_rows"] = $this->Ipcertificate_model->certificate_record_count($certificate_name,$type_name,$coverage_value);
		$config = array();
		$config["base_url"] = base_url("backend/") . "Ipcertificate/index/".$certificate_name."/".$type_name."/".$coverage_value;
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
		$data['cmsmaster']=$this->Ipcertificate_model->fnGetCertificate($certificate_name,$type_name,$coverage_value,$config["per_page"],$page);
		
		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/admin_right',$data);
		$this->load->view('admin/manageipcertificates',$data);
		$this->load->view('admin/admin_footer');

		
		 
	}

	public function add()
	{
		$data['page_title']='Add Ip Certificate';
		
		$data['error_msg']='';
		if(isset($_POST['btn_addipcert']))
		{
			$this->form_validation->set_rules('cert_name','Certificate Name','required');
			$this->form_validation->set_rules('cert_status','Page Title','required');
			
			if($this->form_validation->run())
			{
				$cert_name=$this->input->post('cert_name');
				$cert_status=$this->input->post('cert_status');
				$typeid=$this->input->post('typeid');
				$cert_value=$this->input->post('cert_value');
				// check already category exists
				$cert_exists=$this->Ipcertificate_model->fncheckCertificate1($cert_name,$typeid);
				#echo $this->db->last_query();exit;
				if($cert_exists==0)
				{
					$input_data=array(
										'cert_name'=>$cert_name,
										'cert_value'=>$cert_value,
										'typeid'=>$typeid,
										'dateadded'=>date('Y-m-d H:i:s'),
										'dateupdated'=>date('Y-m-d H:i:s'),
										'cert_status'=>$cert_status
									);
					
					$cms_id=$this->Ipcertificate_model->addCertificate($input_data);
					//echo $this->db->last_query();exit;
					if($cms_id>0)
					{
						$this->session->set_flashdata('success','IP certificate added successfully');
						redirect(base_url("backend/").'ipcertificate');
					}
					else
					{
						$this->session->set_flashdata('success','Error while adding cms');
						redirect(base_url("backend/").'ipcertificate/add');
					}
				}
				else
				{
						$this->session->set_flashdata('error','IP certificate already exists.');
						redirect(base_url("backend/").'ipcertificate/add');			
				}
			}
			else
			{
					$this->session->set_flashdata('error',$this->form_validation->error_string());
					redirect(base_url("backend/").'ipcertificate/add');			
			}
		}
		$data['ipType']=$this->Iptype_model->fnGetIpType();
		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/admin_right',$data);
		$this->load->view('admin/addipcertificate',$data);
		$this->load->view('admin/admin_footer');
	}
	
	public function update()
	{		
		$data['page_title']='Ip Certificate';
		 
		$data['error_msg']='';
		$cert_id=base64_decode($this->uri->segment(4));
		if($cert_id)
		{
			$certInfo=$this->Ipcertificate_model->getSingleCertificateInfo($cert_id,1);
			$data['certInfo']=$certInfo;
				
			if(is_array($certInfo) && count($certInfo) > 0)
			{				
				if(isset($_POST['btn_updateipcert']))
				{
					$this->form_validation->set_rules('cert_name','Certificate Name','required');
					$this->form_validation->set_rules('cert_status','Page Title','required');
					
					if($this->form_validation->run())
					{
							$cert_name=$this->input->post('cert_name');
							$cert_status=$this->input->post('cert_status');
							$cert_value=$this->input->post('cert_value');
							$typeid=$this->input->post('typeid');
							 
							$num_category=$this->Ipcertificate_model->check_CertificateName_upt1($cert_name,$typeid,$cert_id); 
						//echo $this->db->last_query();exit;
						
						if($num_category==0)
						{
							$input_data=array(
								'cert_name'=>$cert_name,
								'dateadded'=>date('Y-m-d H:i:s'),
								'dateupdated'=>date('Y-m-d H:i:s'),
								'cert_value'=>$cert_value,
								'typeid'=>$typeid,
								'cert_status'=>$cert_status,
							);						
							$page_idd=$this->Ipcertificate_model->upt_ipcertificates($input_data,$cert_id);
							#echo $this->db->last_query();exit;
							if($page_idd)
							{	// echo '///';exit;
								$this->session->set_flashdata('success','IP certificate updated successfully.');
								redirect(base_url("backend/").'ipcertificate');	
							}
							else
							{
								$this->session->set_flashdata('error','Error while updating cms.');
								redirect(base_url("backend/").'ipcertificate/update/'.base64_encode($cert_id));
							}							
						}
						else
						{
								$this->session->set_flashdata('error','IP certificate name already exists.');
								redirect(base_url("backend/").'ipcertificate/update/'.base64_encode($cert_id));								
						}
					}
					else
					{
						$this->session->set_flashdata('error',$this->form_validation->error_string());
						redirect(base_url("admin/").'ipcertificates/update/'.base64_encode($cert_id));
					}
				}
			}
			else
			{
				$data['error_msg']='IP certificate is not found.';
			}
		}
		else
		{
			$this->session->set_flashdata('error','IP certificate is not found.');
			redirect(base_url("backend/").'ipcertificates/update/'.base64_encode($cert_id));
		}
		$data['ipType']=$this->Iptype_model->fnGetIpType();
		
		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/admin_right',$data);
		$this->load->view('admin/updateipcertificate',$data);
		$this->load->view('admin/admin_footer');
	}

	public function delete()
	{
		$data['page_title']='Delete Certificate';
		$data['error_msg']='';
		$page_id=base64_decode($this->uri->segment(4));
		if($page_id)
		{
			$delcat=$this->Ipcertificate_model->delete_cert($page_id);
						if($delcat>0)
						{
							$this->session->set_flashdata('success','Ip certificate deleted successfully.');
							redirect(base_url("backend/").'Ipcertificate/index');	
						}
						else
						{
							$this->session->set_flashdata('error','Error while deleting Ip certificate.');
							redirect(base_url("backend/").'Ipcertificate/index');
						}
		}
		else
		{
			$this->session->set_flashdata('error','Ip certificate is not found.');
			redirect(base_url("backend/").'Ipcertificate/index');
		}
	}
	
	
}

