<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('frontModel/Home_model');
	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		/*for validation*/
		if(isset($_POST['btn_service_packages']))
		{
			$package_name=$_POST['txt_service_package'];
			if($this->session->userdata('session_package_name'))
			{
				 $this->session->unset_userdata('session_package_name');
			} 
			$this->session->set_userdata('session_package_name',$package_name);
			
			redirect(base_url().'questionnaire/universal');
		}
		/*for universal*/
		if(isset($_POST['btn_service_packages1']))
		{
			$package_name=$_POST['txt_service_package1'];
			if($this->session->userdata('session_package_name'))
			{
				 $this->session->unset_userdata('session_package_name');
			} 
			$this->session->set_userdata('session_package_name',$package_name);
			
			redirect(base_url().'questionnaire/universal');
		}
		/*for verification*/
		if(isset($_POST['btn_service_packages2']))
		{
			$package_name=$_POST['txt_service_package2'];
			if($this->session->userdata('session_package_name'))
			{
				 $this->session->unset_userdata('session_package_name');
			} 
			$this->session->set_userdata('session_package_name',$package_name);
			
			redirect(base_url().'questionnaire/universal');
		}
		
		$data['packagedata']=$this->Home_model->getPackagedatasAll();
		$this->load->view('frontheader');
		$this->load->view('home',$data);
		$this->load->view('frontfooter');
	}
	
	public function about()
	{
		$this->load->view('frontheader');
		$this->load->view('aboutus');
		$this->load->view('frontfooter');
	}
	public function partnership()
	{
		$this->load->view('frontheader');
		$this->load->view('partnership');
		$this->load->view('frontfooter');
	}

	public function risk()
	{
		$this->load->view('frontheader');
		$this->load->view('risk');
		$this->load->view('frontfooter');
	}


    public function startup()
	{
		$this->load->view('frontheader');
		$this->load->view('startup');
		$this->load->view('frontfooter');
	}

	public function contact()
	{
		$this->load->view('frontheader');
		$this->load->view('contact');
		$this->load->view('frontfooter');
	}

	public function ipsh()
	{
		$this->load->view('frontheader');
		$this->load->view('ipsh');
		$this->load->view('frontfooter');
	}

	public function investor()
	{
		$this->load->view('frontheader');
		$this->load->view('investor');
		$this->load->view('frontfooter');
	}

	
	public function validation_desc()
	{
		$this->load->view('frontheader');
		$this->load->view('validationdesc');
		$this->load->view('frontfooter');
	}
	public function verification_desc()
	{
		$this->load->view('frontheader');
		$this->load->view('verificationdesc');
		$this->load->view('frontfooter');
	}

    public function terms()
	{
		$data['terms_Data']=$this->Home_model->gettermsdata();

		$this->load->view('frontheader');
		$this->load->view('page_default',$data);
		$this->load->view('frontfooter');
	}
	public function send_mail()
	{
		$name=$_POST['txt_name'];
		$txtemail=$_POST['txtemail'];
		$txt_mobile=$_POST['txt_mobile'];
		$txt_status=$_POST['txt_status'];

		$this->load->helper('commonfunctions_helper');
		#$adminmail=$this->Home_model->getadmindetails();
		$admail="ceo@aston-alliance.com";
		#$admail="info@smcompany.global";
		$input_arr=array();

		$input_arr['custname']=$name;
		$input_arr['custemail']=$txtemail;
		$input_arr['custmobile']=$txt_mobile;
		$input_arr['txt_status']=$txt_status;
		$input_arr['strMobileOTP']=$otp;
		$input_arr['base_pat']=base_url();
		$input_arr['subject_mail']="Londonrate Contact For ".$txt_status;
		$output_arr['view_load']="contact_mail";
		smt_send_mail($admail,$output_arr,$input_arr);

		$this->session->set_flashdata('success','Request send successfully.');
		redirect(base_url().'Home');
	}
}
