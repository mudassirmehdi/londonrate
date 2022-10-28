<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Customer extends CI_Controller 
{
	public function __construct()
	{
		 parent::__construct();
		 $this->load->library("pagination");
		$this->load->model('adminModel/Customer_model');		 
		 if(! $this->session->userdata('talogged_in'))
		 {
			redirect('backend/login', 'refresh');
		 }
	}
	public function mpCustomerSearch()
	{
		
		//print_r($_REQUEST); exit;
		$customer_name=$contact_no=$customer_email='Na';
		
		$session_data=$this->session->userdata('logged_in');
		
		if(isset($_POST['btn_clear']))
		{
			 redirect(base_url("backend/").'Customer/manageCustomer/');
		}
		  
		if(isset($_POST['btn_search']))
		{
		   
		    if($_POST['customer_name']!="")
		   {
		   		
			   $customer_name=trim($_POST['customer_name']);
			  
		   }
		    if($_POST['contact_no']!="")
		   {
		   		
			   $contact_no=trim($_POST['contact_no']);
			  
		   }
		    if($_POST['customer_email']!="")
		   {
		   		
			   $customer_email=trim($_POST['customer_email']);
			  
		   }
		 
			redirect(base_url("backend/").'Customer/manageCustomer/'.$customer_name.'/'.$contact_no.'/'.$customer_email);
		}		   
		  
		redirect(base_url("backend/").'Customer/manageCustomer/');		
	}
	public function manageCustomer()
	{
		$data['page_title']='Manage Customer';

		$customer_name=$contact_no=$customer_email='Na';

		 if($this->uri->segment(4)!='')
		{
			if($this->uri->segment(4)!="Na")
			{
				$customer_name=trim($this->uri->segment(4));
			}
			

		}

		if($this->uri->segment(5)!='')
		{
			if($this->uri->segment(5)!="Na")
			{
				$contact_no=trim($this->uri->segment(5));
			}
			

		}

		if($this->uri->segment(6)!='')
		{
			if($this->uri->segment(6)!="Na")
			{
				$customer_email=trim($this->uri->segment(6));
			}
			

		}

		$data['bannercnt']= $config["total_rows"] = $this->Customer_model->customer_record_count($customer_name,$contact_no,$customer_email);
		$config = array();

		$config["base_url"] = base_url("backend/") . "Customer/manageCustomer/".$customer_name."/".$contact_no."/".$customer_email;
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
		$data['customermaster']=$this->Customer_model->getAllCustomer($customer_name,$contact_no,$customer_email,$config["per_page"],$page);
		
		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/admin_right',$data);
		$this->load->view('admin/manage_customer',$data);
		$this->load->view('admin/admin_footer');
	}
	public function deletecustomer()
	{
		$data['page_title']='Delete Customer';
		$data['error_msg']='';
		$page_id=base64_decode($this->uri->segment(4));
		if($page_id)
		{
			$delcat=$this->Customer_model->deleteCustomer($page_id);
						if($delcat>0)
						{
							$this->session->set_flashdata('success','Customer deleted successfully.');
							redirect(base_url("backend/").'Customer/manageCustomer');	
						}
						else
						{
							$this->session->set_flashdata('error','Error while deleting Customer.');
							redirect(base_url("backend/").'Customer/manageCustomer');
						}
		}
		else
		{
			$this->session->set_flashdata('error','Customer is not found.');
			redirect(base_url("backend/").'Customer/manageCustomer');
		}
	}
}
?>
