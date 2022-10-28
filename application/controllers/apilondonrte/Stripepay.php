<?php
	require(APPPATH.'/libraries/REST_Controller.php');
	require_once('application/libraries/stripe-php/init.php');
	class Stripepay extends REST_Controller {
		public function __construct()
		{ 
			parent::__construct();
			date_default_timezone_set('Asia/Kolkata');
			$this->load->model('apilondonrtedels/Paymentmodel');
			$this->load->helper('url');
			$this->load->helper('commonfunctions_helper');
		}
		
		public function paystatus_post()
		{
			$token 				= $this->input->post("token");
			$response 			= $this->input->post("response");
			$strPaymentStatus 	= $this->input->post("pay_status");
			$txn_id 			= $this->input->post("txn_id");
			$intStripeId 		= $this->input->post("stripe_pay_id");
			$order_id 			= $this->input->post("order_id");
			$strPaymentFrom 	= $this->input->post("payment_from");
			if($token == TOKEN)
			{
				if($strPaymentStatus == 'Succeeded')
				{
					### update txn_id and payment status here
					$arrResponse = json_decode($response);
					if($order_id > 0)
					{
						//$intStripeId = $arrResponse->id;
						$arrUpdateTransac = array(
													"transaction_id"=>$txn_id,
													"order_id"=>$order_id,
													"stripe_pay_id"=>$intStripeId,
													"payment_type"=>"stripe",
													"payment_status"=>$strPaymentStatus,
													"payment_response"=>$response,
													"dateupdated"=>date("Y-m-d H:i:s")
												);
						$result   = $this->Paymentmodel->updatePayStatus($arrUpdateTransac);
						#echo 'pp';exit;
						$arrPostData = array(
								"order_status"  => 'order_delivered', 
								"updateddate"    => date('Y-m-d H:i:s'));
						$result1   = $this->Paymentmodel->updateOrder($arrPostData,$order_id);
						#echo $this->db->last_query();exit;
						/*mail send to customer */
						
						$applicant_info=$this->Paymentmodel->getapllicantinfo($order_id);
						$output_arr=array('view_load'=>'package_order_place_to_applicant1');
				#print_r($applicant_info);exit;
						$strApplicantEmail=$applicant_info[0]['applicant_email'];
						if($strApplicantEmail!="")
						{						
							$applicant_name=$applicant_info[0]['applicant_name'];
							$order_no=$applicant_info[0]['order_no'];
							$package_name=$applicant_info[0]['package_name'];
							$package_amount=$applicant_info[0]['package_amount'];
							$package_pdf=	$applicant_info[0]['package_pdf'];
							
							$strSubject = "Order on London-Rate No.".$order_no;
							
							$input_arr=array('strApplicantName'=>$applicant_name,
											'subject_mail'=>$strSubject,
											'strOrderno'=>$order_no,
											'base_pat'=>base_url(),
											'package_name'=>ucfirst($package_name),
											'packamount'=>$package_amount,
											'pdf_path'=>'');
							
							
							$strMessageSid  = smt_send_mail($strApplicantEmail,$output_arr,$input_arr);
						}
				
						$data['responsemessage'] = 'Payment done Successfully.';
						$data['responsecode'] = "200";
						$response_array=json_encode($data);
					}
					else
					{
						$arrUpdateTransac = array(
													"transaction_id"=>$txn_id,
													"order_id"=>$order_id,
													"stripe_pay_id"=>$intStripeId,
													"payment_type"=>"stripe",
													"payment_status"=>$strPaymentStatus,
													"payment_response"=>$response,
													"dateupdated"=>date("Y-m-d H:i:s")
												);
						$result   = $this->Paymentmodel->updatePayStatus($arrUpdateTransac);
						
						$arrPostData = array(
								"order_status"  => 'order_cancel', //Delete
								"updateddate"    => date('Y-m-d H:i:s'),
							);
						#print_r($arrPostData);exit;
						$intOrderId   = $this->Paymentmodel->updateOrder($arrPostData,$order_id);
					
						$num = array(
									'responsemessage' => 'order status failed',
									'responsecode' => "203"
								); //create an array
						$obj = (object)$num;//Creating Object from array
						$response_array=json_encode($obj);	
					}
					
				}
				else
				{
					$arrUpdateTransac = array(
												"transaction_id"=>$txn_id,
												"order_id"=>$order_id,
												"payment_type"=>"stripe",
												#"payment_from"=>$strPaymentFrom,
												"payment_status"=>$strPaymentStatus,
												"payment_response"=>$response,
												"dateupdated"=>date("Y-m-d H:i:s"),
										   );
					$result   = $this->Paymentmodel->updatePayStatus($arrUpdateTransac);
					
					
					$arrPostData = array(
								"order_status"  => 'order_cancel', //Delete
								"updateddate"    => date('Y-m-d H:i:s'),
							);
					#print_r($arrPostData);exit;
					$intOrderId   = $this->Paymentmodel->updateOrder($arrPostData,$order_id);
					
					
					$num = array(
									'responsemessage' => 'Payment failed',
									'responsecode' => "201"
								); //create an array
					$obj = (object)$num;//Creating Object from array
					$response_array=json_encode($obj);	
				}
				
			}
			else{
				$num = array(
									'responsemessage' => 'Token not matched',
									'responsecode' => "210"
								); //create an array
				$obj = (object)$num;//Creating Object from array
				$response_array=json_encode($obj);				
			}
			print_r($response_array);
		}
		
		
		
		public function createpay_post()
		{
			#$token 		= $this->input->post("token");
			$token = TOKEN;
			if($token == TOKEN)
			{
				/*$stripe = new \Stripe\StripeClient('sk_test_6s250nCh3Td0dfGDgOlGy2cn');
				$customer = $stripe->customers->create([
															'description' => 'Testing 1 Customer',
															'email' => 'test@example.com',
															'payment_method' => 'pm_card_visa',
														]);*/
				try {
						
						\Stripe\Stripe::setApiKey('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');
						
					//\Stripe\Stripe::setApiKey('sk_test_6s250nCh3Td0dfGDgOlGy2cn');	
					//\Stripe\Stripe::setApiKey('sk_test_51JCRyHKP7cPoaXd6nYAZXmby9SktMMGuCIlkNBvlYz29c85bnd3IcAYakmbRZew1gIIvUQXns0uC2dD3ruOYi6JX005Fo0UY9L');

					  // retrieve JSON from POST body
					  $json_str = file_get_contents('php://input');
					  $json_obj = json_decode($json_str);

					  $paymentIntent = \Stripe\PaymentIntent::create([
						'amount' => 100,
						'currency' => 'usd',
					  ]);

					  $output = [
						'clientSecret' => $paymentIntent->client_secret,
					  ];

					  echo json_encode($output);
					}
				catch (Error $e) {
					  http_response_code(500);
					  echo json_encode(['error' => $e->getMessage()]);
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
			
	}
 ?>