<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Coverage extends CI_Controller {

	public function __construct()
	{
		 parent::__construct();
		 $this->load->library("pagination");
		 $this->load->model('adminModel/Iptype_model');
		 $this->load->model('adminModel/Coverage_model');
		 if(! $this->session->userdata('talogged_in'))
		 {
			redirect('backend/login', 'refresh');
		 }
	}
	public function mpCoverageSearch()
	{
		
		//print_r($_REQUEST); exit;
		$coverage_name=$type_name=$coverage_value='Na';
		
		$session_data=$this->session->userdata('logged_in');
		
		if(isset($_POST['btn_clear']))
		{
			 redirect(base_url("backend/").'Coverage/index/');
		}
		  
		if(isset($_POST['btn_search']))
		{
		   
		    if($_POST['coverage_name']!="")
		   {
		   	
			   $coverage_name=trim($_POST['coverage_name']);
			  
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
		 
			redirect(base_url("backend/").'Coverage/index/'.$coverage_name.'/'.$type_name.'/'.$coverage_value);
		}		   
		  
		redirect(base_url("backend/").'Coverage/index/');		
	}
	public function index()
	{		
		$data['page_title']='Coverage';

		 $coverage_name=$type_name=$coverage_value='Na';


		if($this->uri->segment(4)!='')
		{
			if($this->uri->segment(4)!="Na")
			{
				$coverage_name=$this->uri->segment(4);
			}
			else
			{
				$coverage_name='Na';
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

		$data['bannercnt']= $config["total_rows"] = $this->Coverage_model->coverage_record_count($coverage_name,$type_name,$coverage_value);

		$config = array();
		$config["base_url"] = base_url("backend/") . "coverage/index/".$coverage_name."/".$type_name."/".$coverage_value;
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
		$data['coveragemaster']=$this->Coverage_model->fnGetCoverage($coverage_name,$type_name,$coverage_value,$config["per_page"],$page);
		
		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/admin_right',$data);
		$this->load->view('admin/managecoverage',$data);
		$this->load->view('admin/admin_footer');

		
		 
	}

	public function add()
	{
		$data['page_title']='Add Coverage';
		
		$data['error_msg']='';
		if(isset($_POST['btn_addcoverage']))
		{
			$this->form_validation->set_rules('coverage_name','Coverage Name','required');
			$this->form_validation->set_rules('coverage_status','Coverage Status','required');
			if($this->form_validation->run())
			{
				$coverage_name=$this->input->post('coverage_name');
				$coverage_status=$this->input->post('coverage_status');
				$typeid=$this->input->post('typeid');
				$cov_value=$this->input->post('cov_value');
				// check already category exists
				$cert_exists=$this->Coverage_model->fncheckCoverage($coverage_name,$typeid);
				#echo $this->db->last_query();exit;
				if($cert_exists==0)
				{
						
						$input_data=array(
											'coverage_name'=>$coverage_name,
											'cov_value'=>$cov_value,
											'typeid'=>$typeid,
											'dateadded'=>date('Y-m-d H:i:s'),
											'dateupdated'=>date('Y-m-d H:i:s'),
											'coverage_status'=>$coverage_status
										);
						$cms_id=$this->Coverage_model->addCoverage($input_data);
						//echo $this->db->last_query();exit;
						if($cms_id>0)
						{
							$this->session->set_flashdata('success','IP Coverage added successfully');
							redirect(base_url("backend/").'coverage');
						}
						else
						{
							$this->session->set_flashdata('success','Error while adding cms');
							redirect(base_url("backend/").'coverage/add');
						}
				}
				else
				{
						$this->session->set_flashdata('error','IP Coverage already exists.');
						redirect(base_url("backend/").'coverage/add');			
				}
			}
			else
			{
					$this->session->set_flashdata('error',$this->form_validation->error_string());
					redirect(base_url("backend/").'coverage/add');			
			}
		}
		$data['ipType']=$this->Iptype_model->fnGetIpType();
		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/admin_right',$data);
		$this->load->view('admin/addcoverage',$data);
		$this->load->view('admin/admin_footer');
	}
	
	public function update()
	{		
		$data['page_title']='Ip Certificate';
		 
		$data['error_msg']='';
		$coverage_id=base64_decode($this->uri->segment(4));
		if($coverage_id)
		{
			$certInfo=$this->Coverage_model->getSingleCoverageInfo($coverage_id,1);
			$data['coverageInfo']=$certInfo;
				
			if(is_array($certInfo) && count($certInfo) > 0)
			{				
				if(isset($_POST['btn_updateipcert']))
				{
					$this->form_validation->set_rules('coverage_name','Coverage Name','required');
					$this->form_validation->set_rules('coverage_status','Coverage Status','required');
					
					if($this->form_validation->run())
					{
							$coverage_name=$this->input->post('coverage_name');
							$coverage_status=$this->input->post('coverage_status');
							$typeid=$this->input->post('typeid');
							$cov_value=$this->input->post('cov_value');
							$num_category=$this->Coverage_model->check_CoverageName_upt($coverage_name,$coverage_id); 
						//echo $this->db->last_query();exit;
						
						if($num_category==0)
						{
							$input_data=array(
								'coverage_name'=>$coverage_name,
								'cov_value'=>$cov_value,
								'typeid'=>$typeid,
								'dateadded'=>date('Y-m-d H:i:s'),
								'dateupdated'=>date('Y-m-d H:i:s'),
								'coverage_status'=>$coverage_status
							);						
							$page_idd=$this->Coverage_model->upt_Coverage($input_data,$coverage_id);
							#echo $this->db->last_query();exit;
							if($page_idd)
							{	// echo '///';exit;
								$this->session->set_flashdata('success','IP Coverage updated successfully.');
								redirect(base_url("backend/").'coverage');	
							}
							else
							{
								$this->session->set_flashdata('error','Error while updating cms.');
								redirect(base_url("backend/").'coverage/update/'.base64_encode($coverage_id));
							}							
						}
						else
						{
								$this->session->set_flashdata('error','IP Coverage name already exists.');
								redirect(base_url("backend/").'coverage/update/'.base64_encode($coverage_id));								
						}
					}
					else
					{
						$this->session->set_flashdata('error',$this->form_validation->error_string());
						redirect(base_url("admin/").'coverage/update/'.base64_encode($coverage_id));
					}
				}
			}
			else
			{
				$data['error_msg']='IP Coverage is not found.';
			}
		}
		else
		{
			$this->session->set_flashdata('error','IP certificate is not found.');
			redirect(base_url("backend/").'coverage/update/'.base64_encode($cert_id));
		}
		$data['ipType']=$this->Iptype_model->fnGetIpType();
		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/admin_right',$data);
		$this->load->view('admin/updatecoverage',$data);
		$this->load->view('admin/admin_footer');
	}
	
	
}

