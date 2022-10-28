<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class IPtypeindustries extends CI_Controller {

	public function __construct()
	{
		 parent::__construct();
		 $this->load->library("pagination");
		 $this->load->model('adminModel/IPtypeindustries_model');
		 if(! $this->session->userdata('talogged_in'))
		 {
			redirect('backend/login', 'refresh');
		 }
	}
	public function mpIPtypeindustriesSearch()
	{
		
		//print_r($_REQUEST); exit;
		$ind_type_name=$type_name=$coverage_value='Na';
		
		$session_data=$this->session->userdata('logged_in');
		
		if(isset($_POST['btn_clear']))
		{
			 redirect(base_url("backend/").'IPtypeindustries/index/');
		}
		  
		if(isset($_POST['btn_search']))
		{
		   
		    if($_POST['ind_type_name']!="")
		   {
		   		
			   $ind_type_name=trim($_POST['ind_type_name']);
			  
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
		   
		 
			redirect(base_url("backend/").'IPtypeindustries/index/'.$ind_type_name.'/'.$type_name.'/'.$coverage_value);
		}		   
		  
		redirect(base_url("backend/").'IPtypeindustries/index/');		
	}
	public function index()
	{		
		$data['page_title']='IP Type Industries';

		 $ind_type_name=$type_name=$coverage_value='Na';

		 if($this->uri->segment(4)!='')
		{
			if($this->uri->segment(4)!="Na")
			{
				$ind_type_name=$this->uri->segment(4);
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

		$data['bannercnt']= $config["total_rows"] = $this->IPtypeindustries_model->industry_record_count($ind_type_name,$type_name,$coverage_value);
		$config = array();
		$config["base_url"] = base_url("backend/") . "IPtypeindustries/index/".$ind_type_name."/".$type_name."/".$coverage_value;;
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
		$data['indmaster']=$this->IPtypeindustries_model->fnGetIndustries($ind_type_name,$type_name,$coverage_value,$config["per_page"],$page);
		
		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/admin_right',$data);
		$this->load->view('admin/manageiptypeindustries',$data);
		$this->load->view('admin/admin_footer');

		
		 
	}

	public function add()
	{
		$data['page_title']='Add Protected Industry';
		
		$data['error_msg']='';
		if(isset($_POST['btn_addiptype']))
		{
			$this->form_validation->set_rules('iptype_name','IP Type Name','required');
			$this->form_validation->set_rules('typeid','Type ID','required');
			if($this->form_validation->run())
			{
				$iptype_name=$this->input->post('iptype_name');
				$typeid=$this->input->post('typeid');
				$ipvalue=$this->input->post('ipvalue');
				$iptype_status=$this->input->post('iptype_status');
				// check already category exists
				$cert_exists=$this->IPtypeindustries_model->fncheckIndustry($iptype_name,$typeid);
				#echo $this->db->last_query();exit;
				if($cert_exists==0)
				{
						
						$input_data=array(
											'typeid'=>$typeid,
											'ipvalue'=>$ipvalue,
											'iptype_name'=>trim($iptype_name),
											'dateadded'=>date('Y-m-d H:i:s'),
											'dateupdated'=>date('Y-m-d H:i:s'),
											'iptype_status'=>$iptype_status
										);
						$cms_id=$this->IPtypeindustries_model->addIPtypeindustries($input_data);
						//echo $this->db->last_query();exit;
						if($cms_id>0)
						{
							$this->session->set_flashdata('success','IP Type Industry added successfully');
							redirect(base_url("backend/").'IPtypeindustries');
						}
						else
						{
							$this->session->set_flashdata('success','Error while adding IP type industries');
							redirect(base_url("backend/").'IPtypeindustries/add');
						}
				}
				else
				{
						$this->session->set_flashdata('error','IP Type Industry already exists.');
						redirect(base_url("backend/").'IPtypeindustries/add');			
				}
			}
			else
			{
					$this->session->set_flashdata('error',$this->form_validation->error_string());
					redirect(base_url("backend/").'IPtypeindustries/add');			
			}
		}
		$data['ipType']=$this->IPtypeindustries_model->fnGetType();
		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/admin_right',$data);
		$this->load->view('admin/addiptypeindustries',$data);
		$this->load->view('admin/admin_footer');
	}
	
	public function update()
	{		
		$data['page_title']='Protected Industry';
		 
		$data['error_msg']='';
		$iptype_id=base64_decode($this->uri->segment(4));
		if($iptype_id)
		{
			$proIndInfo=$this->IPtypeindustries_model->getSingleIndustryInfo($iptype_id,1);
			$data['indInfo']=$proIndInfo;
				
			if(is_array($proIndInfo) && count($proIndInfo) > 0)
			{				
				if(isset($_POST['btn_updateiptype']))
				{
					$this->form_validation->set_rules('iptype_name','IP Type Name','required');
					$this->form_validation->set_rules('typeid','Type ID','required');
					if($this->form_validation->run())
					{
						$iptype_name=$this->input->post('iptype_name');
						$typeid=$this->input->post('typeid');
						$ipvalue=$this->input->post('ipvalue');
						$iptype_status=$this->input->post('iptype_status');
						
						$num_category=$this->IPtypeindustries_model->check_IndustryName_upt($iptype_name,$iptype_id); 
						#echo $this->db->last_query();exit;
						
						if($num_category==0)
						{
							$input_data=array(
											'iptype_name'=>$iptype_name,
											'typeid'=>$typeid,
											'ipvalue'=>$ipvalue,
											'dateupdated'=>date('Y-m-d H:i:s'),
											'iptype_status'=>$iptype_status
										);		
							$page_idd=$this->IPtypeindustries_model->upt_iptype($input_data,$iptype_id);
							#echo $this->db->last_query();exit;
							if($page_idd)
							{	// echo '///';exit;
								$this->session->set_flashdata('success','IP industries updated successfully.');
								redirect(base_url("backend/").'IPtypeindustries');	
							}
							else
							{
								$this->session->set_flashdata('error','Error while updating ip type industries.');
								redirect(base_url("backend/").'IPtypeindustries/update/'.base64_encode($iptype_id));
							}							
						}
						else
						{
								$this->session->set_flashdata('error','IP type industries name already exists.');
								redirect(base_url("backend/").'IPtypeindustries/update/'.base64_encode($iptype_id));								
						}
					}
					else
					{
						$this->session->set_flashdata('error',$this->form_validation->error_string());
						redirect(base_url("admin/").'IPtypeindustries/update/'.base64_encode($iptype_id));
					}
				}
			}
			else
			{
				$data['error_msg']='IP type industries is not found.';
			}
		}
		else
		{
			$this->session->set_flashdata('error','IP type industries is not found.');
			redirect(base_url("backend/").'IPtypeindustries/update/'.base64_encode($iptype_id));
		}
		$data['ipType']=$this->IPtypeindustries_model->fnGetType();
		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/admin_right',$data);
		$this->load->view('admin/updateiptypeindustries',$data);
		$this->load->view('admin/admin_footer');
	}
	
	public function deleteip()
	{
		$iptype_id=base64_decode($this->uri->segment(4));
		if($iptype_id)
		{
			$res=$this->IPtypeindustries_model->deleteIPtypeindustries($iptype_id);
			if($res)
			{	
				$this->session->set_flashdata('success','IP industries deleted successfully.');
				redirect(base_url("backend/").'IPtypeindustries');	
			}
			else
			{
				$this->session->set_flashdata('error','Error while deleting ip type industries.');
				redirect(base_url("backend/").'IPtypeindustries/deleteip/'.base64_encode($iptype_id));
			}	
		}
		else
		{
			$this->session->set_flashdata('error','IP type industries is not found.');
			redirect(base_url("backend/").'IPtypeindustries');
		}
	}
}

