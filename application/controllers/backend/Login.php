<?php	
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {  
	public function __construct()
	{	
		 parent::__construct();
		 $this->load->model('adminModel/Login_model');
		  $this->load->helper('commonfunctions');
	}
	public function index()
	{		$data['error']=$data['success']='';
		if(isset($_POST['btn_login']))
		{
			$this->form_validation->set_rules('username','User Name','required');
			$this->form_validation->set_rules('admin_password','Admin Password','required');
			if($this->form_validation->run())
			{
				$user_type=$this->input->post('user_type');
				$username=$this->input->post('username');
				$admin_password=$this->input->post('admin_password');
				//echo md5($this->input->post('admin_password'));exit;
				$data = array('user_type'=>$user_type,'username' => $username,'admin_password' => $admin_password);
				$result1 = $this->Login_model->chk_login($data,0);
				#echo "<pre>";print_r($data);
				//echo "sdss".$this->db->last_query();exit;
				if ($result1>0) 
				{
					$result = $this->Login_model->chk_login($data,1);
					//print_r($result);exit;
					if($user_type=='BusinessOwner')
					{
						$status=$result[0]['status'];
					}
					else if($user_type=='Store')
					{
						$status=$result[0]['store_status'];
					}
					else if($user_type=='Subadmin')
					{
						$status=$result[0]['substatus'];
					}
					if($status=='Active')
					{
						
						if($user_type=='BusinessOwner')
						{
							$session_data = array('store_id' => 0,
													'admin_id' => $result[0]['admin_id'],
													'admin_name' => $result[0]['admin_name'],
													'username' => $result[0]['username'],
													'mobile_number' => $result[0]['mobile_number'],
													'user_type' => 'BusinessOwner',
													'status'=>$result[0]['status']);
													
							$this->session->set_userdata('talogged_in', $session_data);
							redirect(base_url().'backend/Dashboard', 'refresh');						
						}
						else if($user_type=='Store')
						{
							$session_data = array('store_id' => $result[0]['store_id'],
													'admin_id' => 0,
													'admin_name' => $result[0]['store_name'],
													'username' => $result[0]['store_owner_name'],
													'mobile_number' => $result[0]['store_owner_number'],
													'user_type' => 'Store',
													'status'=>$result[0]['store_status']);
							$this->session->set_userdata('talogged_in', $session_data);
							
							
							redirect(base_url().'store/Storedashboard', 'refresh');						
						}
						else if($user_type=='Subadmin')
						{
							$session_data = array('store_id' => 0,
													'admin_id' => $result[0]['subadmin_id'],
													'admin_name' => $result[0]['subadmin_name'],
													'username' => $result[0]['subusername'],
													'mobile_number' => $result[0]['submobile_number'],
													'user_type' => 'Subadmin',
													'status'=>$result[0]['substatus']);
													
							$this->session->set_userdata('talogged_in', $session_data);
							redirect(base_url().'backend/Dashboard', 'refresh');					
						}
						
					}
					else  if($status=='Inactive')
					{					$data['error']='Inactive Status.';
						/*$this->session->set_flashdata('error', 'Inactive Status.');
						redirect('backend/login/index', 'refresh');*/
					}
					else  
					{					$data['error']='Record deleted.';
						/*$this->session->set_flashdata('error', 'Record deleted.');
						redirect('backend/login/index', 'refresh');*/
					}
				}
				else
				{ $data['error']='Invalid Credentials.';
					/*$this->session->set_flashdata('error','Invalid Credentials');
					redirect('backend/login/index', 'refresh');*/
				}
			}
		}
		$this->load->view('admin/login',$data);
	}

	public function logout()
	{
		if(isset($this->session->userdata['talogged_in']))
		{
			unset($_SESSION['talogged_in']);
			redirect('backend/login','refresh');
		}
		else
		{ 

			redirect('backend/Dashboard','refresh');

		}
	}
	
	public function forgotpassword()
	{
		$data['error']=$data['success']='';
		if(isset($_POST['btn_forget_password']))
		{		//print_r($_POST);exit;
			$this->form_validation->set_rules('email_address','Email address','required|valid_email');
			
			if($this->form_validation->run())
			{
				$admin_email=$this->input->post('email_address');
				$user_type='BusinessOwner';
				
				$chk_email=$this->Login_model->chkAdminEmailExists($admin_email,$user_type);
				//echo $this->db->last_query();exit;
				
				if(isset($chk_email)&& count($chk_email)>0)
				{
					$rnd_number=rand(pow(10, 5),pow(10, 6)-1);// Crate 4 Digit Random Number for OTP 
								
					$rnd_number = "123456"; //default SMS
					
					if($user_type=='BusinessOwner')
					{
						$admin_name=$chk_email[0]['admin_name'];
						$subject_mail='BusinessOwner';
						//update for admin password
						$uptem=$this->Login_model->upadteAdminPassword($user_type,$admin_email,$rnd_number);
					}
					else if($user_type=='Store')
					{
						$admin_name=$chk_email[0]['store_owner_name'];
						//update for admin password
						$subject_mail='Store';
						$uptem=$this->Login_model->upadteAdminPassword($user_type,$admin_email,$rnd_number);
					}
					else 
					{
						$admin_name=$chk_email[0]['subadmin_name'];
						//update for admin password
						$subject_mail='Subadmin';
						$uptem=$this->Login_model->upadteAdminPassword($user_type,$admin_email,$rnd_number);
					}
					//echo $this->db->last_query();exit;
					
					$output_arr=array('view_load'=>'adminside_forgot_password');
					$input_arr=array('adminname'=>$admin_name,
									'base_path'=>base_url(),
									'rnd_number'=>$rnd_number,
									'subject_mail'=>'Londonrate: Admin Regarding Forgot Password');
					
					//echo 'pp';exit;
					$ress=smt_send_mail($admin_email,$output_arr,$input_arr);
					//
					if($ress)
					{
						//$data['success']='Password is send to your mail successfully.';
						$this->session->set_flashdata('success', 'Password is send to your mail successfully.');
						redirect(base_url().'backend/Login/index', 'refresh');
						
					}
					else
					{
						$data['error']= 'Error while sending mail';
					}
				}
				else
				{
					$data['error']='Email address is not exists';
				}
			}
			else
			{
				$this->session->set_flashdata('error_msg', $this->form_validation->error_string());
						redirect(base_url().'backend/login/forgotpassword', 'refresh');
			}
		}
		$this->load->view('admin/forgetpasword',$data);
	}

 	public function forgetpass($page='login')
	 {
		$this->load->helper('url');
		$this->form_validation->set_rules('email','Enter Email','required');
		//print_r($_REQUEST);die;
		if($this->form_validation->run())
		{
  	      $strEmail=$this->input->post('email');
		  //Email information
		  $password=$this->randomPassword();
		  $getdata['email']=$strEmail;
		  $getdata['password']= $password;
		  //check if email is exist or not 
		  if($this->Login_model->checkexist($strEmail) > 0)
		  {
				$config = Array(
						'protocol' => 'smtp',
						'smtp_host' => 'dallas167.arvixeshared.com',
						'smtp_port' => 26,
						'smtp_user' => 'support@attendance.csnsindia.com',
						'smtp_pass' => 'm3E7e]1*WyXm',
						'mailtype'  => 'html',
						'wordwrap'  => TRUE,
						'charset'   => 'iso-8859-1'
					);
				$this->load->library('email', $config);
				$this->email->set_newline("\r\n");	
				$this->email->from('support@attendance.csnsindia.com', 'Attendance Support');
				#$this->email->to('mayur.sharma2006@gmail.com'); 
				#$this->email->to('mayur.sharma2006@gmail.com,mayursfriend4u@gmail.com,gunvantbattase@gmail.com');
				#$this->email->to(array('mayur.sharma2006@gmail.com','gunvantbattase@gmail.com'));
				$this->email->to(array('mayur.sharma2006@gmail.com'));

				$strSubJect = "New Password for Food Bird Admin" ;

				$strLogoUrl = base_url("admin/")."/images/logo.png";
				$strMessage = "
<!DOCTYPE html>
<html>
<head>										
<body>										
<div>
	<table border='1' cellpadding='0' cellspacing='0' width='100%' style='margin: 0; padding: 0; font-family: Arial,Helvetica Neue,Helvetica,sans-serif; font-size: 14px'>
		<tbody>
		<tr  style='font-family: Arial,Helvetica Neue,Helvetica,sans-serif'>
		<td align='center' style='font-family: Arial,Helvetica Neue,Helvetica,sans-serif'>
			<table border='0' cellpadding='0' cellspacing='0' width='600'  align='center' style='font-family: Arial,Helvetica Neue,Helvetica,sans-serif'>
				<tbody>
					<tr style='font-family: Arial,Helvetica Neue,Helvetica,sans-serif'>
						<td rowspan='2' style='font-family: Arial,Helvetica Neue,Helvetica,sans-serif; text-align: center'>
								<img src='$strLogoUrl' alt='Food Bird' style='height: 120px;' border='0' style='font-family: Arial,Helvetica Neue,Helvetica,sans-serif' class='CToWUd'>
						</td>
					</tr>
				</tbody>
			</table>
		</td>
		</tr>
		<tr style='font-family: Arial,Helvetica Neue,Helvetica,sans-serif'>
		<td align='center' style='font-family: Arial,Helvetica Neue,Helvetica,sans-serif'>
		<table border='0' cellpadding='0' cellspacing='0' width='600' style='' align='center' style='border-collapse: collapse; font-family: Arial,Helvetica Neue,Helvetica,sans-serif'>
			<tbody>
				<tr bgcolor='#dc2925' style='font-family: Arial','Helvetica Neue','Helvetica,sans-serif'>
					<td colspan='3' align='center' valign='middle' height='50' style='height: 50px; font-family: Arial,Helvetica Neue,Helvetica,sans-serif'>
						<span style='font-size: 22px; font-weight: normal; color: #fff; font-family: Arial,Helvetica Neue,Helvetica,sans-serif'> Best Food Today</span>
					</td>
				</tr>
				<tr bgcolor='#fff'>
			   <!-- <tr bgcolor='#fff' style='background-color: #fff; font-family: Arial,Helvetica Neue,Helvetica,sans-serif;'>-->
					<td colspan='3' style='padding: 5px; border: none; font-family: Arial,Helvetica Neue,Helvetica,sans-serif'>
						<p style='color: #797979; line-height: 21px; margin: 10px 0; font-family: Arial,Helvetica Neue,Helvetica,sans-serif'>
							Dear Admin,
						</p>
						<p style='color: #797979; line-height: 21px; margin: 10px 0; font-family: Arial,Helvetica Neue,Helvetica,sans-serif'>
							As per your request, Password is reset to $password 
							Kindly review it and change your password from  admin panel :<br>
						</p>
						<p style='color: #797979; line-height: 21px; margin: 10px 0; font-family: Arial,Helvetica Neue,Helvetica,sans-serif'>
							Warm Regards,<br style='font-family: Arial,Helvetica Neue,Helvetica,sans-serif'>
							Team<br style='font-family: Arial,Helvetica Neue,Helvetica,sans-serif'>
							Food Bird
						</p>
					</td> 
				</tr> 
			</tbody>
		</table>
		</td>
		</tr>
		</tbody>
	</table>
</div> 
</head>
</body>
</html>
";	
		$sts = $this->Login_model->resetPass($getdata);
		if($sts==1){
					  //send email
					$this->email->subject($strSubJect);
					$this->email->message($strMessage);
					$result = $this->email->send();
					$this->session->set_flashdata('success','Your Password is reset successfully. Check you email for new password');
					redirect('backend/login/index', 'refresh');
					

					 

				  }

				  else{

					  $this->session->set_flashdata('error','Invalid Email');

					  echo $this->session->flashdata('error');

						redirect('backend/login/forgetpass', 'refresh');

					$data['status']=201; //Error Occured   

				  } 

				  

		  }// not valid Email

		  else

		  {

				$this->session->set_flashdata('error','Invalid Email ');

				//redirect('Login/forgetpass', 'refresh');

				//$data['status']=201; //Error Occured   

		  }

		  //Email response

		}

  		$this->load->view('admin/forgetpass');

	 }

	 public function randomPassword() 

	 {

		$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';

		$pass = array(); //remember to declare $pass as an array

		$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache

		for ($i = 0; $i < 8; $i++) 

		{

			$n = rand(0, $alphaLength);

			$pass[] = $alphabet[$n];

		}

		return implode($pass); //turn the array into a string

	}

}

