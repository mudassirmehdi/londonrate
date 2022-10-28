<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('frontModel/User_model');
		$this->load->model('frontModel/Questionnaire_model');
		$this->load->helper('commonfunctions_helper');
	}
	
	public function login()
	{
		$data['error_msg']='';
		if(isset($_POST['btn_userlogin']))
		{
			$this->form_validation->set_rules('applicant_email','Email Address','required|valid_email');

			$this->form_validation->set_rules('applicant_password','User password','required');

			if($this->form_validation->run())
			{
				$applicant_email=$this->input->post('applicant_email');
				$applicant_password=$this->input->post('applicant_password');
				
				$num_mobile_exists = $this->User_model->check_userexists($applicant_email);
				
				if($num_mobile_exists>0)
				{
					$num_password_exists = $this->User_model->check_userpasswordexists($applicant_email,$applicant_password);
					//echo $this->db->last_query();exit;
					if(count($num_password_exists)>0)
					{
						$result = $this->User_model->check_userpasswordexists($applicant_email,$applicant_password);
						
						$usrstatus=$result[0]['applicant_status'];
						if($usrstatus=='Active')
						{ 
							$session_data = array('session_applicant_id' => $result[0]['applicant_id'],
												'session_applicant_name' => $result[0]['applicant_name'],
												'session_applicant_email' => ucfirst($result[0]['applicant_email']),
												'session_applicant_country' => $result[0]['applicant_country'],
												'session_applicant_country_code' => $result[0]['applicant_country_code'],
												'session_applicant_contact_number' => $result[0]['applicant_contact_number'],);
							$this->session->set_userdata('london_logged_in', $session_data);
					
							redirect(base_url());								
						}
						else
						{
							$data['error_msg']='Your status is block by admin side.';
						}
					}
					else
					{
							$data['error_msg']='Invalid Credentials';								

					}
				}
				else
				{ 	
						$data['error_msg']='Email address is not exists';								

				}
			}
			else
			{

				$data['error_msg']=$this->form_validation->error_string();

			}
		}
		$this->load->view('frontheader');
		$this->load->view('user_login',$data);		
		$this->load->view('frontfooter');
	}	
	
	public function mypackage()
	{
		if(! $this->session->userdata('london_logged_in'))
		{
			redirect('user/login', 'refresh');
		}
		else
		{
			if($this->session->userdata('london_logged_in'))
			{
				$london_logged_in=$this->session->userdata('london_logged_in');
				$session_applicant_id=$london_logged_in['session_applicant_id'];
			}
			if($session_applicant_id>0)
			{
				$data['mypacklist']=$this->User_model->getmypacklist($session_applicant_id);
				#echo $this->db->last_query();exit;
				$this->load->view('frontheader');
				$this->load->view('users_packages',$data);		
				$this->load->view('frontfooter');
			}
			else
			{
				redirect('user/login', 'refresh');
			}
		}
	}
	
	
	public function logout()
	{
		if(isset($this->session->userdata['london_logged_in']))
		{
			session_destroy();
			//unset($_SESSION['london_logged_in']);
			redirect(base_url());
		}
		else
		{ 

			redirect('user/mypackage','refresh');

		}
	}
	
	public function updateprofile()
	{
		
		if(! $this->session->userdata('london_logged_in'))
		{
			redirect('user/login', 'refresh');
		}
		else
		{
			/* getting user country here */
		$data['usercountry']='';
		$userIP = $_SERVER['REMOTE_ADDR']; 
		$data['usercountry']=getusercountry($userIP);
		/* end of getting user country */
		
			if($this->session->userdata('london_logged_in'))
			{
				$london_logged_in=$this->session->userdata('london_logged_in');
				$session_applicant_id=$london_logged_in['session_applicant_id'];
			}
			if($session_applicant_id>0)
			{
				$data['countrylist']=$this->Questionnaire_model->getcountry();
				$data['profiledata']=$this->User_model->getmyprofile($session_applicant_id);
				
				if(isset($_POST['btn_update_profile']))
				{
					$this->form_validation->set_rules('applicant_name','Name','required');
					$this->form_validation->set_rules('applicant_country','Country','required');
					$this->form_validation->set_rules('applicant_email','Email Address','required');
					$this->form_validation->set_rules('applicant_country_code','Country Code','required');
					$this->form_validation->set_rules('applicant_contact_number','Contact Number','required');

					if($this->form_validation->run())
					{
						$applicant_name=$this->input->post('applicant_name');
						$applicant_country=$this->input->post('applicant_country');
						
						$applicant_email=$this->input->post('applicant_email');
						$applicant_country_code=$this->input->post('applicant_country_code');
						$applicant_contact_number=$this->input->post('applicant_contact_number');
						
						$input_array=array('applicant_name'=>$applicant_name,
											'applicant_country'=>$applicant_country,
											'applicant_email'=>$applicant_email,
											'applicant_country_code'=>$applicant_country_code,
											'applicant_contact_number'=>$applicant_contact_number);
											
						$res=$this->User_model->udpatemyprofile($input_array,$session_applicant_id);
						
						if($res)
						{
							$this->session->set_flashdata('success','Profile updated successfully.');
							redirect(base_url().'user/updateprofile');								
						}
						else
						{
							$this->session->set_flashdata('error','Error while updating profile.');
							redirect(base_url().'user/updateprofile');
						}
					}
				}
				$this->load->view('frontheader');
				$this->load->view('users_profile',$data);		
				$this->load->view('frontfooter');
			}
			else
			{
				redirect('user/login', 'refresh');
			}
		}
	}
	
	public function forget_password_otp()
	{
		session_start();
		$data['error_msg']='';
		if(isset($_POST['btn_send_otp']))
		{
				$this->form_validation->set_rules('applicant_email','Email Address','required|valid_email');
				if($this->form_validation->run())
				{
					$applicant_email=$this->input->post('applicant_email');
					$get_mobile_exists = $this->User_model->check_getuserexists($applicant_email);
				
					if(isset($get_mobile_exists) && count($get_mobile_exists)>0)
					{
						$otp = rand(10000, 99999);
	                		//$_SESSION['session_otp'] = $otp;
						$result = $this->User_model->set_userpassword_otp($applicant_email,$otp);
					
						if($result)	
						{
							

	                		$session_data = array('session_otp' => $otp,
	                							'applicant_email' => $applicant_email,

	                							'applicant_id' => $applicant_id,
	            								);
								$this->session->set_userdata($session_data);

								$this->load->helper('commonfunctions_helper');
							
								$input_arr=array();
								$input_arr['custname']=$get_mobile_exists[0]['applicant_name'];
								$input_arr['strMobileOTP']=$otp;
								$input_arr['base_path']=base_url();
								$input_arr['subject_mail']="Londonrate Forgot Password OTP Code";
								
								$output_arr['view_load']="forget_password_otp_mail_for_customer_app";
								smt_send_mail($applicant_email,$output_arr,$input_arr);
								//echo $this->email->print_debugger();
								//echo display_errors();
								//echo phpinfo();
								

								$this->session->set_flashdata('success','OTP Code has sent successfully to '.$applicant_email.' Please Check Your Email');
								redirect(base_url().'user/forget_password');
						}
						else
						{
							$this->session->set_flashdata('error','Error while sending otp.');
							redirect(base_url().'user/forget_password');
						}
					}
					else
					{ 	
							$data['error_msg']='Email address is not exists';								

					}
				}
				else
				{

					$data['error_msg']=$this->form_validation->error_string();

				}
				
		}
		$this->load->view('frontheader');
		$this->load->view('user_forgotpassword_otp',$data);		
		$this->load->view('frontfooter');
	}
	public function forget_password()
	{
		session_start();
		$data['error_msg']='';
		if(isset($_POST['btn_usersubmit']))
		{
			$this->form_validation->set_rules('otp_id','OTP Code','required');
			$this->form_validation->set_rules('applicant_password','New password','required');
			$this->form_validation->set_rules('applicant_confirm_password','Confirm password','required|matches[applicant_password]');

			if($this->form_validation->run())
			{
				$otp_id=$this->input->post('otp_id');
				$session_applicant_id=$this->input->post('app_id');
				
				$applicant_password=$this->input->post('applicant_password');
				$applicant_confirm_password=$this->input->post('applicant_confirm_password');
				
				$session_otp=$this->session->userdata('session_otp');
				$applicant_email=$this->session->userdata('applicant_email');
				
				$get_mobile_exists = $this->User_model->check_getuserexists_otp($otp_id,$applicant_email);
				
				if(isset($get_mobile_exists) && count($get_mobile_exists)>0)
				{
					$result = $this->User_model->set_userpassword_new($applicant_email,$applicant_password);
					
					if($result)	
					{
/*						$output_arr=array('view_load'=>'forgot_password');
				
						$input_arr=array('applicant_name'=>$get_mobile_exists[0]['applicant_name'],
										'subject_mail'=>'London Rate- Forgot Password',
										'base_pat'=>base_url());
						
						
						$strMessageSid  = smt_send_mail($applicant_email,$output_arr,$input_arr);*/
						
						
							$this->session->set_flashdata('success','Password set successfully.');
							redirect(base_url().'user/login');								
					}
					else
					{
						$this->session->set_flashdata('error','Error while updating password.');
						redirect(base_url().'user/forget_password');
					}
				}
				else
				{ 	
						$data['error_msg']='OTP Code is not exists';								

				}
			}
			else
			{

				$data['error_msg']=$this->form_validation->error_string();

			}
			
		}
		$this->load->view('frontheader');
			$this->load->view('user_forgetpassword',$data);		
			$this->load->view('frontfooter');
		
	}	
	
	/*public function forget_password()
	{
		$data['error_msg']='';
		if(isset($_POST['btn_usersubmit']))
		{
			$this->form_validation->set_rules('applicant_email','Email Address','required|valid_email');
			$this->form_validation->set_rules('applicant_password','New password','required');
			$this->form_validation->set_rules('applicant_confirm_password','Confirm password','required|matches[applicant_password]');

			if($this->form_validation->run())
			{
				$applicant_email=$this->input->post('applicant_email');
				$applicant_password=$this->input->post('applicant_password');
				$applicant_confirm_password=$this->input->post('applicant_confirm_password');
				
				$get_mobile_exists = $this->User_model->check_getuserexists($applicant_email);
				
				if(isset($get_mobile_exists) && count($get_mobile_exists)>0)
				{
					$result = $this->User_model->set_userpassword($applicant_email,$applicant_password);
					
					if($result)	
					{
						$output_arr=array('view_load'=>'forgot_password');
				
						$input_arr=array('applicant_name'=>$get_mobile_exists[0]['applicant_name'],
										'subject_mail'=>'London Rate- Forgot Password',
										'base_pat'=>base_url());
						
						
						$strMessageSid  = smt_send_mail($applicant_email,$output_arr,$input_arr);
						
						
							$this->session->set_flashdata('success','Password set successfully.');
							redirect(base_url().'user/login');								
					}
					else
					{
						$this->session->set_flashdata('error','Error while updating password.');
						redirect(base_url().'user/forget_password');
					}
				}
				else
				{ 	
						$data['error_msg']='Email address is not exists';								

				}
			}
			else
			{

				$data['error_msg']=$this->form_validation->error_string();

			}
		}
		$this->load->view('frontheader');
		$this->load->view('user_forgetpassword',$data);		
		$this->load->view('frontfooter');
	}	*/
}
