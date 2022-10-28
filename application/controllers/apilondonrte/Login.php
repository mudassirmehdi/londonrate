<?php
ini_set("display_errors",1);
error_reporting(E_ALL); 
	require(APPPATH.'/libraries/REST_Controller.php');
	class Login extends REST_Controller {

		public function __construct()
		{
			#echo md5('L0NdOnR@t#@ecom$$');exit;
	    	parent::__construct();
			date_default_timezone_set('Asia/Kolkata');
			$this->load->model('apilondonrtedels/Loginmodel');
			$this->load->helper('url');
			
		} 

		
		public function customerlogin_post()
		{
			
		  	$applicant_email	= $this->input->post("applicant_email");
			$applicant_password	= $this->input->post("applicant_password");
			$fcm_token	= $this->input->post("fcm_token");
			$token 		= $this->input->post("token");
			
			
			if($token == TOKEN)
			{
				if($applicant_email == "")
				{
					$num = array( 'responsemessage' => 'Enter customer email address',
								  'responsecode' => "403"
								);
					$obj = (object)$num;
					$response_array=json_encode($obj);
				}
				else if($applicant_password == "")
				{
					$num = array( 'responsemessage' => 'Enter customer password',
								  'responsecode' => "404"
								);
					$obj = (object)$num;
					$response_array=json_encode($obj);
				}
				else
				{
					$customers_emailexits = $this->Loginmodel->fetchsingleCustomerdata($applicant_email);
					if($customers_emailexits > 0)
					{
						$customers_passwordexits = $this->Loginmodel->fetchsingleCustomerpassdata($applicant_email,$applicant_password);
						
						if(isset($customers_passwordexits) && count($customers_passwordexits) > 0)
						{
						
							if($customers_passwordexits[0]['applicant_status']=='Delete')
							{
								$num = array('responsemessage' => 'Your account is deleted by admin',
										 'responsecode' => "406"
										); 

								$obj = (object)$num;
								$response_array=json_encode($obj);
							}
							else if($customers_passwordexits[0]['applicant_status']=='Inactive')
							{
								$num = array('responsemessage' => 'Your account is inactive',
										 'responsecode' => "407"
										); 

								$obj = (object)$num;
								$response_array=json_encode($obj);
							}
							else
							{
								$updateData['fcm_token'] 	= $fcm_token;
								$updateOtp 					= $this->Loginmodel->updateDatas($customers_passwordexits[0]['applicant_id'],$updateData);

								
								$datas =array("applicant_id"=>$customers_passwordexits[0]['applicant_id'],
													"applicant_name"=>$customers_passwordexits[0]['applicant_name'],
													"applicant_email"=>$customers_passwordexits[0]['applicant_email'],
													"applicant_mobile"=>$customers_passwordexits[0]['applicant_country_code'].$customers_passwordexits[0]['applicant_contact_number']
												);
										
								$data['data'] = $datas;
								$data['responsemessage'] = 'Customer login successfully';
								$data['responsecode'] = "200";
								$response_array=json_encode($data);
							}
						}
						else
						{
							$num = array('responsemessage' => "Incorrect password",
										 'responsecode' => "410"
										); 

							$obj = (object)$num;
							$response_array=json_encode($obj); 
						}
					}
					else
					{
						$num = array('responsemessage' => 'Email address is not exists!',
									 'responsecode' => "405"
									); 

						$obj = (object)$num;
						$response_array=json_encode($obj); 
					}
				}
			}
			else
			{
				$num = array(
								'responsemessage' => 'Token not match',
								'responsecode' => "201"
							); 
				$obj = (object)$num;
				$response_array=json_encode($obj);
			}
			print_r($response_array);
		}
		
		

	}

 ?>