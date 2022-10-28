<?php
/*ini_set("display_errors",1);
error_reporting(E_ALL);*/
	require(APPPATH.'/libraries/REST_Controller.php');
	class Registration extends REST_Controller {

		public function __construct()
		{
	    	parent::__construct();
			date_default_timezone_set('Asia/Kolkata');
			$this->load->model('apilondonrtedels/Registrationmodel');
			$this->load->model('apilondonrtedels/Loginmodel');
			$this->load->helper('url');
		} 

		public function customersignup_post()
		{
		  	$applicant_name	= $this->input->post("applicant_name");
			$applicant_email	= $this->input->post("applicant_email");
			$applicant_country_code	= $this->input->post("applicant_country_code");
			$applicant_contact_number	= $this->input->post("applicant_contact_number");
			$applicant_password	= $this->input->post("applicant_password");
			$fcm_token	= $this->input->post("fcm_token");
			$token 		= $this->input->post("token");
			
			
			if($token == TOKEN)
			{
				if($applicant_name == "" || $applicant_email == ""|| $applicant_country_code == ""|| $applicant_contact_number == ""|| $applicant_password == "" || $fcm_token=="")
				{
					$num = array( 'responsemessage' => 'Enter customer details',
								  'responsecode' => "403"
								);
					$obj = (object)$num;
					$response_array=json_encode($obj);
				}
				else
				{
					$customers_emailexits = $this->Loginmodel->fetchsingleCustomerdata($applicant_email);
					if($customers_emailexits == 0)
					{
						$insertData['applicant_name'] 	= $applicant_name;
						$insertData['applicant_email'] 	= $applicant_email;
						$insertData['applicant_country_code'] 	= $applicant_country_code;
						$insertData['applicant_contact_number'] 	= $applicant_contact_number;
						$insertData['applicant_password'] 	= md5($applicant_password);
						$insertData['applicant_status'] 	= 'Active';
						$insertData['addeddate'] 	= date('Y-m-d H:i:s');
						$insertData['updateddate'] 	= date('Y-m-d H:i:s');
						$insertData['fcm_token']		=$fcm_token;
						$applicant_id 					= $this->Registrationmodel->insertDatas($insertData);
						if($applicant_id>0)
						{
							$datas =array("applicant_id"=>$applicant_id,
											"applicant_name"=>$applicant_name,
											"applicant_email"=>$applicant_email,
											"applicant_mobile"=>$applicant_country_code.$applicant_contact_number);
										
							$data['data'] = $datas;
							$data['responsemessage'] = 'Customer register successfully.';
							$data['responsecode'] = "200";
							$response_array=json_encode($data);
						}
						else
						{
							$num = array('responsemessage' => 'Error while register.',
									 'responsecode' => "201"
									); 

							$obj = (object)$num;
							$response_array=json_encode($obj); 
						}
					}
					else
					{
						$num = array('responsemessage' => 'Email address already exists!',
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