<?php
require(APPPATH.'/libraries/REST_Controller.php');
class Customer extends REST_Controller 
{
	public function __construct()
	{
		
			parent::__construct();
			date_default_timezone_set('Asia/Kolkata');
			$this->load->model('apilondonrtedels/Customer_model');
			$this->load->helper('url');
			$this->load->helper('commonfunctions_helper');
		
	}
	
	
	public function updateprofile_post()
	{
		$token = $this->input->post("token");
		$applicant_id = $this->input->post('applicant_id');
		$applicant_name = $this->input->post('applicant_name');
		#$applicant_photo	 = $this->input->post("applicant_photo");
	#echo '<pre>';print_r($_FILES);
		if($token == TOKEN)
		{
			if($applicant_id>0)
			{
				//$applicant_photo='';
				$photo_imagename='';
				if(isset($_FILES['applicant_photo']))
					$applicant_photo=$_FILES['applicant_photo']['name'];
				//if($applicant_photo!="")
				{
					
					$new_image_name = rand(1, 99999).$applicant_photo;
					
					$config = array(
						'upload_path' => "uploads/customers/",
						'allowed_types' => "gif|jpg|png|bmp|jpeg|tif",
						'max_size' => "0", 
						'file_name' =>$new_image_name
						);
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					if($this->upload->do_upload('applicant_photo'))
					{ 
						$imageDetailArray = $this->upload->data();						
						$photo_imagename =  $imageDetailArray['file_name'];
					}
				}
				#echo $photo_imagename;
				$arrdata = array("applicant_name"=>$applicant_name, 
								"updateddate"=>date("Y-m-d H:i:s") ); 
				if($photo_imagename!="")
				{
					$arrdata['applicant_photo'] = $photo_imagename;
				}	
		
				$arrGetVersion		=	$this->Customer_model->updatesProfile($arrdata,$applicant_id);	
				
				$data['responsemessage'] = 'Profile updated successfully';
				$data['responsecode'] = "200";
				$response_array=json_encode($data);
			}
			else
			{
				$num = array(
							'responsemessage' => 'Customer is not found',
							'responsecode' => "203"
						); //create an array
				$obj = (object)$num;//Creating Object from array
				$response_array=json_encode($obj);
			}
		}
		else
		{
			$num = array(
								'responsemessage' => 'Token not match',
								'responsecode' => "201"
							); //create an array
				$obj = (object)$num;//Creating Object from array
				$response_array=json_encode($obj);
		}
		print_r($response_array);
	}
	
	public function getprofile_post()
	{
		$token = $this->input->post('token');
		$applicant_id = $this->input->post('applicant_id');

		if($token == TOKEN)
		{
			if($applicant_id>0)
			{
				$arrcustomerinfo=array();
				$arrGetVersion		=	$this->Customer_model->getProfileinfo($applicant_id);	
				if(isset($arrGetVersion) && count($arrGetVersion)>0)
				{
					$applicant_photo='';
					if($arrGetVersion[0]['applicant_photo']!="")
					{
						$applicant_photo =base_url().'uploads/customers/'.$arrGetVersion[0]['applicant_photo'];
					}
					$arrcustomerinfo=array('applicant_name'=>$arrGetVersion[0]['applicant_name'],
											'applicant_email'=>$arrGetVersion[0]['applicant_email'],
											'applicant_country_code'=>$arrGetVersion[0]['applicant_country_code'],
											'applicant_contact_number'=>$arrGetVersion[0]['applicant_contact_number'],
											'applicant_photo'=>$applicant_photo);
				}
				$datas['customerdata'] = $arrcustomerinfo;
				$datas['responsemessage'] = 'Data Saved Successfully';
				$datas['responsecode'] = "200";
				$response_array=json_encode($datas);
			}
			else
			{
				$num = array(
							'responsemessage' => 'Token not match',
							'responsecode' => "202"
						); //create an array
				$obj = (object)$num;//Creating Object from array
				$response_array=json_encode($obj);
			}
		}
		else
		{
			$num = array(
							'responsemessage' => 'Token not match',
							'responsecode' => "201"
						); //create an array
			$obj = (object)$num;//Creating Object from array
			$response_array=json_encode($obj);
		}
		print_r($response_array);
	}
	
	
	public function mypackages_post()
	{
		$token 				= $this->input->post("token");
		$applicant_id		= $this->input->post("applicant_id");
		

		if($token == TOKEN)
		{
			if($applicant_id>0)
			{
				/*load package list*/
				$arrpackages   = $this->Customer_model->getAllMyPackagelist($applicant_id);
				$arrmyPackagelist=array();
				if(isset($arrpackages) && count($arrpackages)>0)
				{
					foreach($arrpackages as $k)
					{
						$package_pdf='';
						if($k['package_pdf']!="")
						{
							$package_pdf=base_url().'uploads/5f0871ad51b324d6756af4daeb0537cb/'.$k['package_pdf'];
						}
						$arrmyPackagelist[]=array('pack_id'=>$k['pack_id'],
												'package_name'=>ucfirst($k['package_name']),
												'order_no'=>$k['order_no'],
												'company_name'=>$k['company_name'],
												'package_pdf'=>$package_pdf,
												'amount'=>$k['amount'],
												'order_status'=>$k['order_status'],
												'addeddate'=>date('M d Y H:i:s',strtotime($k['addeddate'])),
												'business_type'=>$k['business_type']
												);
					}
				}
				/* end of package listing*/
					$data['packagelist'] = $arrmyPackagelist;
					$data['responsemessage'] = 'Listing of My Packages.';
					$data['responsecode'] = "200";
					$response_array=json_encode($data);
			}
			else
			{
				$num = array('responsemessage' => 'Applicant is not found.',
						'responsecode' => "202"
							); //create an array

					$obj = (object)$num;
					$response_array=json_encode($obj);
			}

		}
		else
		{
			$num = array('responsemessage' => 'Token not match',
					'responsecode' => "201"
						); //create an array

				$obj = (object)$num;
				$response_array=json_encode($obj);
		}
		print_r($response_array);		
	}

		
    public function forgetpassword_post()
	{
		$token 				= $this->input->post("token");
		$applicant_email		= $this->input->post("applicant_email");
		

		if($token == TOKEN)
		{
			if($applicant_email!="")
			{
				$customerinfo=$this->Customer_model->checkemailaddress($applicant_email);
				if(isset($customerinfo) && count($customerinfo)>0)
				{
					if($customerinfo[0]['applicant_status']=="Inactive")
					{
						$num = array('responsemessage' => 'Applicant is inactive from admin.',
						'responsecode' => "204"
							); //create an array

						$obj = (object)$num;
						$response_array=json_encode($obj);
					}
					else if($customerinfo[0]['applicant_status']=="Delete")
					{
						$num = array('responsemessage' => 'Applicant is deleted from admin.',
						'responsecode' => "205"
							); //create an array

						$obj = (object)$num;
						$response_array=json_encode($obj);
					}
					else
					{
						$rnd=rand(pow(10, 4),pow(10, 5)-1);
						
						$forget_otp 	= $rnd;
						
						$this->Customer_model->updateotp($forget_otp,$applicant_email);
						if($applicant_email!="")
						{
							$applicant_name=$customerinfo[0]['applicant_name'];
							$applicant_id=$customerinfo[0]['applicant_id'];
							
							$strSubject = "Forget Password OTP For Londonrate";
							$base_pat=base_url();
							$strCustName = $applicant_name;
							$strMobileOTP=$rnd;
							
							$output_arr=array('view_load'=>'forget_password_otp_mail_for_customer_app');
							$input_arr=array('custname'=>$strCustName,
												'base_path'=>$base_pat,
												'strMobileOTP'=>$strMobileOTP,
												'subject_mail'=>$strSubject);
							
							$strMessageSid  = smt_send_mail($applicant_email,$output_arr,$input_arr);
					   }
					   
					   $data['applicant_id']=$applicant_id;
					   $data['applicant_email']=$applicant_email;
						$data['responsemessage'] = 'OTP send to your email successfully.';
						$data['responsecode'] = "200";
						$response_array=json_encode($data);
					}
				}
				else
				{
					$num = array('responsemessage' => 'Invalid email address.',
					'responsecode' => "203"
						); //create an array

					$obj = (object)$num;
					$response_array=json_encode($obj);
				}				
			}
			else
			{
				$num = array('responsemessage' => 'Provide email address.',
					'responsecode' => "202"
						); //create an array

				$obj = (object)$num;
				$response_array=json_encode($obj);
			}
		}
		else
		{
			$num = array('responsemessage' => 'Token not match',
					'responsecode' => "201"
						); //create an array

				$obj = (object)$num;
				$response_array=json_encode($obj);
		}
		print_r($response_array);
	}
	
	public function changepassword_post()
	{
		$token 				= $this->input->post("token");
		$applicant_id		= $this->input->post("applicant_id");
		$forget_otp		= $this->input->post("forget_otp");
		$new_password		= $this->input->post("new_password");

		if($token == TOKEN)
		{
			if($applicant_id>0)
			{
				$otpcustomerinfo=$this->Customer_model->checkforgetotpexists($applicant_id,$forget_otp);
				if(isset($otpcustomerinfo) && count($otpcustomerinfo)>0)	
				{
					$res=$this->Customer_model->updatepassword($applicant_id,md5($new_password));
					if($res)
					{
						$data['responsemessage'] = 'Password change successfully.';
						$data['responsecode'] = "200";
						$response_array=json_encode($data);
					}
					else
					{
						$num = array('responsemessage' => 'Error while updating password.',
						'responsecode' => "204"
							); //create an array

						$obj = (object)$num;
						$response_array=json_encode($obj);
					}
				}
				else
				{
					$num = array('responsemessage' => 'Invalid OTP.',
						'responsecode' => "203"
							); //create an array

					$obj = (object)$num;
					$response_array=json_encode($obj);
				}
			}
			else
			{
				$num = array('responsemessage' => 'Applicant is not found.',
					'responsecode' => "202"
						); //create an array

				$obj = (object)$num;
				$response_array=json_encode($obj);
			}
		}
		else
		{
			$num = array('responsemessage' => 'Token not match',
					'responsecode' => "201"
						); //create an array

				$obj = (object)$num;
				$response_array=json_encode($obj);
		}
		print_r($response_array);
	}
		
}
?>