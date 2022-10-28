<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Industries extends CI_Controller {

	public function __construct()
	{
		 parent::__construct();
		 $this->load->library("pagination");
		 $this->load->model('adminModel/Iptype_model');
		 $this->load->model('adminModel/Industry_model');
		 if(! $this->session->userdata('talogged_in'))
		 {
			redirect('backend/login', 'refresh');
		 }
	}
	public function mpIndustrySearch()
	{
		
		//print_r($_REQUEST); exit;
		$industri_name=$type_name=$coverage_value=$ip_certificate='Na';
		
		$session_data=$this->session->userdata('logged_in');
		
		if(isset($_POST['btn_clear']))
		{
			 redirect(base_url("backend/").'Industries/index/');
		}
		  
		if(isset($_POST['btn_search']))
		{
		   
		    if($_POST['industri_name']!="")
		   {
		   		
			   $industri_name=trim($_POST['industri_name']);
			  
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
		   if($_POST['ip_certificate']!="")
		   {
		   		$ip_certificate=trim($_POST['ip_certificate']);
			  
			  
		   }
		 
			redirect(base_url("backend/").'Industries/index/'.$industri_name.'/'.$type_name.'/'.$coverage_value.'/'.$ip_certificate);
		}		   
		  
		redirect(base_url("backend/").'Industries/index/');		
	}
	public function index()
	{		
		$data['page_title']='Industries';

		 $industri_name=$type_name=$coverage_value=$ip_certificate='Na';

		 if($this->uri->segment(4)!='')
		{
			if($this->uri->segment(4)!="Na")
			{
				$industri_name=$this->uri->segment(4);
			}
			else
			{
				$industri_name='Na';
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

		if($this->uri->segment(7)!="")
		{
			if($this->uri->segment(7)!="Na")
			{
				$ip_certificate=$this->uri->segment(7);
			}  
		}


		$data['bannercnt']= $config["total_rows"] = $this->Industry_model->industry_record_count($industri_name,$type_name,$coverage_value,$ip_certificate);
		$config = array();
		$config["base_url"] = base_url("backend/") . "industries/index/".$industri_name."/".$type_name."/".$coverage_value."/".$ip_certificate;
		$config['per_page'] = 25;
		$config["uri_segment"] = 8;
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
				
		$page = ($this->uri->segment(8)) ? $this->uri->segment(8) : 0;
		$data["total_rows"] = $config["total_rows"]; 
		$data["links"] = $this->pagination->create_links();
		
		$data['page']=$page;
		$data['indmaster']=$this->Industry_model->fnGetIndustries($industri_name,$type_name,$coverage_value,$ip_certificate,$config["per_page"],$page);
		
		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/admin_right',$data);
		$this->load->view('admin/manageindustries',$data);
		$this->load->view('admin/admin_footer');

		
		 
	}

	public function add()
	{
		$data['page_title']='Add Protected Industry';
		
		$data['error_msg']='';
		if(isset($_POST['btn_addindustry']))
		{
			$this->form_validation->set_rules('ind_name','Industry Name','required');
			$this->form_validation->set_rules('ind_status','Industry Status','required');
			if($this->form_validation->run())
			{
				$ind_name=$this->input->post('ind_name');
				$ind_status=$this->input->post('ind_status');
				$cert_id=$this->input->post('cert_id');
				$typeid=$this->input->post('typeid');
				$ipvalue=$this->input->post('ipvalue');
				// check already category exists
				$cert_exists=$this->Industry_model->fncheckIndustry($ind_name,$cert_id,$typeid);
				#echo $this->db->last_query();exit;
				if($cert_exists==0)
				{
						
						$input_data=array(
											'ind_name'=>$ind_name,
											'cert_id'=>$cert_id,
											'typeid'=>$typeid,
											'ipvalue'=>$ipvalue,
											'dateadded'=>date('Y-m-d H:i:s'),
											'dateupdated'=>date('Y-m-d H:i:s'),
											'ind_status'=>$ind_status
										);
						$cms_id=$this->Industry_model->addIndustry($input_data);
						//echo $this->db->last_query();exit;
						if($cms_id>0)
						{
							$this->session->set_flashdata('success','Protected Industry added successfully');
							redirect(base_url("backend/").'industries');
						}
						else
						{
							$this->session->set_flashdata('success','Error while adding protected industries');
							redirect(base_url("backend/").'industries/add');
						}
				}
				else
				{
						$this->session->set_flashdata('error','Protected Industry already exists.');
						redirect(base_url("backend/").'industries/add');			
				}
			}
			else
			{
					$this->session->set_flashdata('error',$this->form_validation->error_string());
					redirect(base_url("backend/").'industries/add');			
			}
		}
		$data['ipType']=$this->Iptype_model->fnGetIpType();
		//$data['ipcertificateType']=$this->Industry_model->fnGetIpcertificateType();
		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/admin_right',$data);
		$this->load->view('admin/addindustries',$data);
		$this->load->view('admin/admin_footer');
	}
	
	public function ajaxgettypecertificate()
	{
		$typeid=$_POST['typeid'];
		$resNum=$this->Iptype_model->getiptypecertificate($typeid);
		#echo $this->db->last_query();exit;
		if(count($resNum)>0)
		{
			$str=$pp ='';
			$str .='<option value="">--Select--</option>';
				//print_r($arrattributemaster);
				foreach($resNum as $attr)
				{
					$str .='<option value='.$attr['cert_id'].'>'.$attr['cert_name'].'</option>';
				}	
		}
		echo json_encode(array('resstr'=>$str));
	}
	
	public function update()
	{		
		$data['page_title']='Protected Industry';
		 
		$data['error_msg']='';
		$ind_id=base64_decode($this->uri->segment(4));
		$proIndInfo=$this->Industry_model->getSingleIndustryInfo($ind_id,1);
			$data['indInfo']=$proIndInfo;
			
		if($ind_id)
		{
			
				
			if(is_array($proIndInfo) && count($proIndInfo) > 0)
			{				
				if(isset($_POST['btn_updateipcert']))
				{
					$this->form_validation->set_rules('ind_name','Insustry Name','required');
					$this->form_validation->set_rules('ind_status','Insustry Status','required');
					
					if($this->form_validation->run())
					{
							$ind_name=$this->input->post('ind_name');
							$ind_status=$this->input->post('ind_status');
							$ipvalue=$this->input->post('ipvalue');
							$cert_id=$this->input->post('cert_id');
							$typeid=$this->input->post('typeid');
							$num_category=$this->Industry_model->check_IndustryName_upt($ind_name,$cert_id,$typeid,$ind_id); 
						#echo $this->db->last_query();exit;
						
						if($num_category==0)
						{
							$input_data=array(
											'ind_name'=>$ind_name,
											'cert_id'=>$cert_id,
											'ipvalue'=>$ipvalue,
											'typeid'=>$typeid,
											'dateupdated'=>date('Y-m-d H:i:s'),
											'ind_status'=>$ind_status
										);		
							$page_idd=$this->Industry_model->updatIndustry($input_data,$ind_id);
							#echo $this->db->last_query();exit;
							if($page_idd)
							{	// echo '///';exit;
								$this->session->set_flashdata('success','Protected industries updated successfully.');
								redirect(base_url("backend/").'industries');	
							}
							else
							{
								$this->session->set_flashdata('error','Error while updating protecting industries.');
								redirect(base_url("backend/").'industries/update/'.base64_encode($ind_id));
							}							
						}
						else
						{
								$this->session->set_flashdata('error','Protected industries name already exists.');
								redirect(base_url("backend/").'industries/update/'.base64_encode($ind_id));								
						}
					}
					else
					{
						$this->session->set_flashdata('error',$this->form_validation->error_string());
						redirect(base_url("admin/").'industries/update/'.base64_encode($ind_id));
					}
				}
			}
			else
			{
				$data['error_msg']='Protected industries is not found.';
			}
		}
		else
		{
			$this->session->set_flashdata('error','Protected industries is not found.');
			redirect(base_url("backend/").'industries/update/'.base64_encode($ind_id));
		}
		$data['ipType']=$this->Iptype_model->fnGetIpType();
		$data['ipcertificateType']=$this->Industry_model->fnGetIpcertificateType1($proIndInfo[0]['typeid']);
		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/admin_right',$data);
		$this->load->view('admin/updateindustries',$data);
		$this->load->view('admin/admin_footer');
	}
	
	public function deleteprotectedinst()
	{
		$ind_id=base64_decode($this->uri->segment(4));
		if($ind_id)
		{
			$res=$this->Industry_model->deleteProtectedindustries($ind_id);
			if($res)
			{	
				$this->session->set_flashdata('success','Protected industries deleted successfully.');
				redirect(base_url("backend/").'Industries');	
			}
			else
			{
				$this->session->set_flashdata('error','Error while deleting protected industries.');
				redirect(base_url("backend/").'Industries/deleteip/'.base64_encode($iptype_id));
			}	
		}
		else
		{
			$this->session->set_flashdata('error','Protected industries is not found.');
			redirect(base_url("backend/").'Industries');
		}
	}
}

