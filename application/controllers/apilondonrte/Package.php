<?php
/*ini_set("display_errors",1);
error_reporting(E_ALL);*/
require(APPPATH.'/libraries/REST_Controller.php');
class Package extends REST_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Kolkata');
		$this->load->model('apilondonrtedels/Packagemodel');
		$this->load->model('apilondonrtedels/Homemodel');
		$this->load->helper('commonfunctions_helper');
		$this->load->library('phpqrcode/qrlib');
		$this->load->helper('url');
	} 

	public function purchasepackage_post()
	{
		$token 				= $this->input->post("token");
		$applicant_id 		= $this->input->post('applicant_id');
		$main_package_id 		= $this->input->post('package_id'); 
		$applicant_country		=	$this->input->post('applicant_country');	
		$is_privacy			=	'Yes';
		$is_terms			=	'Yes';
		$company_name = $this->input->post('company_name');
		$is_same_country = $this->input->post('is_same_country'); 
		$applicant_country2 = $this->input->post('applicant_country2');
		$year_establish = $this->input->post('year_establish');
		$business_type = $this->input->post('business_type');
		
		$strmain_products = $this->input->post('main_products');
		$is_website = $this->input->post('is_website');
		$is_same_applicantemail = $this->input->post('is_same_applicantemail');
		$applicant_email2 = $this->input->post('applicant_email2');
		$is_same_applicantcontact = $this->input->post('is_same_applicantcontact');
		$applicant_country_code2 = $this->input->post('applicant_country_code2');
		$applicant_contact_number2 = $this->input->post('applicant_contact_number2');
		
		$strpotential_customer = $this->input->post('potential_customer');
		
		$strpotential_competitor = $this->input->post('potential_competitor');
		
		$protected_regions = $this->input->post('protected_regions');
		$current_team_partners = $this->input->post('current_team_partners');
		$uniqueness_product = $this->input->post('uniqueness_product');
		
		
		$strip_work_title = $this->input->post('ip_work_title');
		$strip_work_object = $this->input->post('ip_work_object');
		$strip_work_type = $this->input->post('ip_work_type');
		$strindustry_ip_work = $this->input->post('industry_ip_work');
		$strip_work_status = $this->input->post('ip_work_status');
		$strdevelopment_date = $this->input->post('development_date');
		$strregistration_date = $this->input->post('registration_date');
		$strcoverage_area = $this->input->post('coverage_area');
		$strregistration_org = $this->input->post('registration_org');
		$strrightsholders = $this->input->post('rightsholders');
		$stris_industries = $this->input->post('is_industries');
		$strindustries = $this->input->post('industries');
		$strnice_classification = $this->input->post('nice_classification');
		
		$reviewobject = $this->input->post('reviewobject');
		$currency = $this->input->post('currency');
		$average_sales = $this->input->post('average_sales');
		$average_salaries = $this->input->post('average_salaries');
		$average_budget = $this->input->post('average_budget');
		$average_net_profit = $this->input->post('average_net_profit');
		#$payment_type	= $this->input->post('payment_type');
		
		
		$average_sales=str_replace(',', '', $average_sales);
		$average_salaries=str_replace(',', '', $average_salaries);
		$average_budget=str_replace(',', '', $average_budget);
		$average_net_profit=str_replace(',', '', $average_net_profit);
		
		if($token == TOKEN)
		{
			if($applicant_id!="")
			{
				if($main_package_id>0)
				{
					if($company_name=="" || $is_same_country=="" || $applicant_country2=="" || $year_establish=="" || $business_type=="" || $strmain_products=="" || $is_website=="" || $is_same_applicantemail=="" || $applicant_email2=="" || $is_same_applicantcontact==""|| $applicant_country_code2==""|| $applicant_contact_number2==""|| $strpotential_customer==""|| $strpotential_competitor==""|| $protected_regions==""|| $current_team_partners==""|| $uniqueness_product==""|| $strip_work_title==""|| $strip_work_object==""|| $strip_work_type==""|| $strindustry_ip_work=="")
					{
						$num = array('responsemessage' => 'Details are required',
						'responsecode' => "204"
							); //create an array

						$obj = (object)$num;
						$response_array=json_encode($obj);
					}
					else
					{ 
						// get package name
						$arrpackage_name_used=$this->Packagemodel->getMAinpackageName($main_package_id);
						$package_name_used=$arrpackage_name_used[0]['package_name'];
						$order_amount=$arrpackage_name_used[0]['amount'];
						
						$applicantdatainfos=$this->Packagemodel->getapplicantdata($applicant_id);
						
						$applicant_name=$applicantdatainfos[0]['applicant_name'];
						$applicant_contact_number=$applicantdatainfos[0]['applicant_country_code'].$applicantdatainfos[0]['applicant_contact_number'];
						$applicant_email=$applicantdatainfos[0]['applicant_email'];
						
						$order_status='order_place';
						$payment_status='pending';
						$payment_type="stripe";
						
						if($main_package_id==1)
						{
							$order_status='order_delivered';
							$payment_status='completed';
							$payment_type="free";
						}
						
						$this->Packagemodel->updatefirstpurchasepackage($applicant_country,$applicant_id);
						
						$insert_array=array('applicant_id'=>$applicant_id,
									'main_package_id'=>$main_package_id,
									'package_name'=>$package_name_used,
									'is_privacy'=>$is_privacy,
									'is_terms'=>$is_terms,
									'company_name'=>$company_name,
									'is_same_country'=>$is_same_country,
									'applicant_country2'=>$applicant_country2,
									'year_establish'=>date('Y-m-d',strtotime($year_establish)),
									'business_type'=>$business_type,
									'is_website'=>$is_website,
									'website_url'=>$website_url,
									'is_same_applicantemail'=>$is_same_applicantemail,
									'applicant_email2'=>$applicant_email2,
									'is_same_applicantcontact'=>$is_same_applicantcontact,
									'applicant_country_code2'=>$applicant_country_code2,
									'applicant_contact_number2'=>$applicant_contact_number2,
									'potential_regions'=>$protected_regions,
									'current_team_partners'=>$current_team_partners,
									'uniqueness_product'=>$uniqueness_product,
									'reviewobject'=>$reviewobject,
									'currency'=>$currency,
									'average_sales'=>$average_sales,
									'average_salaries'=>$average_salaries,
									'average_budget'=>$average_budget,
									'average_net_profit'=>$average_net_profit,
									'order_status'=>$order_status,
									'package_amount'=>$order_amount,
									'purchase_from'=>"App",
									'addeddate'=>date('Y-m-d H:i:s'),
									'updateddate'=>date('Y-m-d H:i:s'));
						$new_pack_id=$this->Packagemodel->addpurchasepackage($insert_array);
						
						$order_no="LR000".$new_pack_id;
						
						$resorder=$this->Packagemodel->updateordernumber($order_no,$new_pack_id);
						
						$transaction_id = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
						$clientSecret = "";
						
						/* code for stripe payment here*/
						if($payment_type == "stripe" && $order_amount>=1)
						{ 
							require_once('application/libraries/stripe-php/init.php');
							$strAccountId  = "";
							
							$stripe = new \Stripe\StripeClient('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');
							
							//$stripe = new \Stripe\StripeClient('sk_test_51JCRyHKP7cPoaXd6nYAZXmby9SktMMGuCIlkNBvlYz29c85bnd3IcAYakmbRZew1gIIvUQXns0uC2dD3ruOYi6JX005Fo0UY9L');
							//$stripe = new \Stripe\StripeClient('sk_test_6s250nCh3Td0dfGDgOlGy2cn');
							$customer = $stripe->customers->create([
													'description' => $applicant_name,
													'name' => $applicant_name,
													'phone' => $applicant_contact_number,
													'email' => $applicant_email,
													['metadata' => ['order_id' => $new_pack_id]],
													#['shipping' => ['address' => ['line1' => $strUserAddress1]]],
													#['shipping' => ['address' => ['city' => $strUserCity]]],

													//'shipping.address.line1' => $strUserAddress1,
													//'shipping.address.line2' => $strUserAddress2,
													//'shipping.address.city' => $strUserCity,
													//'shipping.address.state' => $strUserState,
													//'payment_method' => 'pm_card_visa',
												]);
							
								\Stripe\Stripe::setApiKey('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');	 							
													//['stripe_account' => $strAccountId]		
							 // \Stripe\Stripe::setApiKey('sk_test_6s250nCh3Td0dfGDgOlGy2cn');		
							//  \Stripe\Stripe::setApiKey('sk_test_51JCRyHKP7cPoaXd6nYAZXmby9SktMMGuCIlkNBvlYz29c85bnd3IcAYakmbRZew1gIIvUQXns0uC2dD3ruOYi6JX005Fo0UY9L');	 	
							$argument = array( 
												 'payment_method_types' => ['card'],
												  'amount' => $order_amount*100,
												  'currency' => 'gbp',
												  'customer' =>  $customer->id,
												array('metadata' => array('order_id' => $new_pack_id,'transaction_id' => $transaction_id))
											);
							
							$paymentIntent = \Stripe\PaymentIntent::create
														(
															$argument
														);
										
										
										#echo "<pre>"; print_r($paymentIntent); exit;
										$clientSecret = 	$paymentIntent->client_secret;
										$output = [
													'clientSecret' => $paymentIntent->client_secret,
												  ];				  
							}
							/* end of code for strip payment getway*/
						$payment_response = "";
						
						$arrOrderTxnData = array(	"applicant_id"     	 	 => $applicant_id,
														"order_id"     	 	 => $new_pack_id,
														"transaction_id" 	 => $transaction_id,
														"payment_type"   	 => $payment_type,
														"payment_response"   => $payment_response,
														"order_amount"      		 => round($order_amount,2),
														"payment_status"   	 => $payment_status,
														"dateadded"     	 => date('Y-m-d H:i:s'),
														"dateupdated"    => date('Y-m-d H:i:s')
												);
						
						
						$intOrderDetailId   = $this->Packagemodel->addOrderTransaction($arrOrderTxnData);	
						
						$arrOrderResponse = array("order_id"=>$new_pack_id,
												"order_no"=>$order_no,
												'order_amount'=>$order_amount);
													 
						/*add here for main product */
						if($strmain_products !="")
						{
							#$strmain_products;
							$arrmainproduct = json_decode($strmain_products,true);
							#print_r($arrmainproduct);
							if(is_array($arrmainproduct))		
							{
								$cnt_main=count($arrmainproduct);
								for($i=0;$i<$cnt_main;$i++)
								{
									#echo $arrmainproduct[$i]['main_product'];
									$input_main_product_array=array('pack_id'=>$new_pack_id,
																'main_product'=>$arrmainproduct[$i]['main_product'],
																'dateadded'=>date('Y-m-d H:i:s'),
																'dateupdated'=>date('Y-m-d H:i:s'));
									$main_product_id=$this->Packagemodel->addforsecoundform($input_main_product_array,'package_main_products');	
								}
							}
							#exit;
						}
						/*end here for main product */
						
						/*add here for Potential customer */
						if($strpotential_customer !="")
						{
							$arrpotential = json_decode($strpotential_customer,true);
							if(is_array($arrpotential))		
							{
								$cnt_potential=count($arrpotential);
								for($i=0;$i<$cnt_potential;$i++)
								{
									$input_potential_customer_array=array('pack_id'=>$new_pack_id,
																	'potential_customer'=>$arrpotential[$i]['potcustomer'],
																	'dateadded'=>date('Y-m-d H:i:s'),
																	'dateupdated'=>date('Y-m-d H:i:s'));
									$potential_customer_id=$this->Packagemodel->addforsecoundform($input_potential_customer_array,'package_potential_customer');								
								}
							}
						}
						/* end of code for Potential customer */
						
						/*add here for Potential competitor */
						if($strpotential_competitor !="")
						{
							$arrpotentialcompetitor = json_decode($strpotential_competitor,true);
							if(is_array($arrpotentialcompetitor))		
							{
								$cnt_potentialcompetitor=count($arrpotentialcompetitor);
								for($i=0;$i<$cnt_potentialcompetitor;$i++)
								{
									$input_potential_com_array=array('pack_id'=>$new_pack_id,
																	'potential_competitor'=>$arrpotentialcompetitor[$i]['potcompetitor'],
																	'dateadded'=>date('Y-m-d H:i:s'),
																	'dateupdated'=>date('Y-m-d H:i:s'));
									$potential_competitor_id=$this->Packagemodel->addforsecoundform($input_potential_com_array,'package_potential_competitor');								
								}
							}
						}
						/* end of code for Potential competitor */
						
						
						/*add here for 3rd form */
						if($strip_work_title !="")
						{
							$arripwork = json_decode($strip_work_title,true);
							$arrindustries = json_decode($strindustries,true);
							$arrnice_classification	= json_decode($strnice_classification,true);
							$arrip_work_object		=	json_decode($strip_work_object,true);
							$arrip_work_type		=	json_decode($strip_work_type,true);
							$arrindustry_ip_work		=	json_decode($strindustry_ip_work,true);
							$arrip_work_status		=	json_decode($strip_work_status,true);
							$arrdevelopment_date		=	json_decode($strdevelopment_date,true);
							$arrregistration_date		=	json_decode($strregistration_date,true);
							$arrcoverage_area		=	json_decode($strcoverage_area,true);
							$arrregistration_org		=	json_decode($strregistration_org,true);
							$arrrightsholders		=	json_decode($strrightsholders,true);
							
							if(is_array($arripwork))		
							{
								$cnt_ipwork=count($arripwork);
								for($i=0;$i<$cnt_ipwork;$i++)
								{
									$txt_industries=0;
									$txt_nice_classification=0;
									
									
									if($arrindustries[$i]['ind']!="")
									{
										$is_industries='Yes';
										$txt_industries=$arrindustries[$i]['ind'];
									}
									if($arrnice_classification[$i]['nice']!="")
									{
										$is_industries='No';
										$txt_nice_classification=$arrnice_classification[$i]['nice'];
									}
									
									$input_third_array=array('pack_id'=>$new_pack_id,
															'reviewobject'=>$reviewobject,
															'ip_work_title'=>$arripwork[$i]['iptitle'],
															'ip_work_object'=>$arrip_work_object[$i]['ipobject'],
															'ip_work_type'=>$arrip_work_type[$i]['iptype'],
															'industry_ip_work'=>$arrindustry_ip_work[$i]['ipwork'],
															'ip_work_status'=>$arrip_work_status[$i]['ipstatus'],
															'development_date'=>date('Y-m-d',strtotime($arrdevelopment_date[$i]['dev_date'])),
															'registration_date'=>date('Y-m-d',strtotime($arrregistration_date[$i]['reg_date'])),
															'coverage_area'=>$arrcoverage_area[$i]['cov'],
															'registration_org'=>$arrregistration_org[$i]['reg'],
															'rightsholders'=>$arrrightsholders[$i]['right'],
															'industries'=>$txt_industries,
															'nice_classification'=>$txt_nice_classification,
															'is_industries'=>$is_industries,
															'dateadded'=>date('Y-m-d H:i:s'),
															'dateupdated'=>date('Y-m-d H:i:s'));
																				
									$work_info_id=$this->Packagemodel->addforsecoundform($input_third_array,'package_ip_works_information');								
								}
							}
						}
						/* end of code for 3rd form */
						 
						/* code for generating pdf here*/
						$pdfdata['order_no']=$order_no;
						$pdfdata['currency']=$currency;
						$pdfdata['average_sales']=$average_sales; 
						$pdfdata['average_salaries']=$average_salaries;
						$pdfdata['average_budget']=$average_budget;
						$pdfdata['average_net_profit']=$average_net_profit;
						
						$pdfdata['pdf_age']=$pdf_age=cal_year_age($insert_array['year_establish']);
						$mob_value=$this->Packagemodel->fnGetYearValue($pdf_age);
						#echo $this->db->last_query();
						$pdfdata['mob_value']=$mob_value;
						
						
						$pdfdata['applicant_name']=ucwords($applicant_name);
						$addeddate=$pdfdata['addeddate']=date('Y-m-d H:i:s');
						$pdfdata['after3month'] = date('Y-m-d', strtotime("+3 months", strtotime($addeddate)));
						
						$reviewobject=$insert_array['reviewobject'];
						$pdfdata['reviewobjectinfo']=$this->Packagemodel->getreviewinfo($reviewobject,$new_pack_id);
						
						$pdfdata['arrValues']=getallcalculations($average_salaries,$average_budget,$average_sales,$average_net_profit,$pdf_age,$mob_value);
						
						if(isset($arrmainproduct) && count($arrmainproduct)>0)
						{
							for($j=0;$j<count($arrmainproduct);$j++)
							{
								$str_main_products .=$arrmainproduct[$j]['main_product'].",";
							}
						}
						$pdfdata['str_main_products']=$str_main_products;
						$pdfdata['businessinduinfo']=$this->Packagemodel->getbusinessindustry($business_type);
						$strprotectedindustries='';
						if($txt_industries!=0)
						{
							$isindustriesdata=$this->Packagemodel->getindustriesdata($txt_industries);
									
									$strprotectedindustries =$isindustriesdata[0]['industries'];
						}
						else if($txt_nice_classification!=0)
						{
							$isnicedata=$this->Packagemodel->getnicedata($txt_nice_classification);
							
							$strprotectedindustries =$isnicedata[0]['nice'];
						}
						#echo $this->db->last_query();
						$pdfdata['protectedinfo']=$strprotectedindustries;
						
						$pdfdata['businessinduinfo']=$this->Packagemodel->getbusinessindustry($business_type);
						
						$potentialcustinfo=$this->Packagemodel->getpotentialcustomers($new_pack_id);
	
						$strpotentialcustinfo='';
						if(isset($potentialcustinfo) && count($potentialcustinfo)>0)
						{
							for($j=0;$j<count($potentialcustinfo);$j++)
							{
								$strpotentialcustinfo .=$potentialcustinfo[$j]['potential_customer'].",";
							}
						}
						$pdfdata['strpotentialcustinfo']=$strpotentialcustinfo;

						$pdfdata['current_team_partners']=$current_team_partners;
						$pdfdata['uniqueness_product']=$uniqueness_product;
						
						
						$pdfdata['potential_regions']=$protected_regions;
						
						if(isset($arrpotentialcompetitor) && count($arrpotentialcompetitor)>0)
						{
							for($j=0;$j<count($arrpotentialcompetitor);$j++)
							{
								$str_potentialcompetitor .=$arrpotentialcompetitor[$j]['potcompetitor'].",";
							}
						}
						
						$pdfdata['potential_competitor']=$str_potentialcompetitor;
						$pdfdata['session_package_name']=$package_name_used;
						$pdfdata['qrcode_image']='';
						
						/*code for qrcode genertaion*/
						$SERVERFILEPATH = $_SERVER['DOCUMENT_ROOT'].'/uploads/qrcode/';
						$pdfFilename1 = md5("LondonRate-Order".time());
						$pdfFilename = $pdfFilename1.".pdf";
						$folder = $SERVERFILEPATH;
						$file_name_blue = $new_pack_id."-Qrcode-blue" . rand(10,200) . ".png";
						$dataText   = base_url()."uploads/5f0871ad51b324d6756af4daeb0537cb/".$pdfFilename;
						
						$dataText1="https://londonrate.org/";
						
						if($dataText!="")
						{
							$registrtaion_no1= substr($dataText, 0,9);
							
							$saveToFile = TRUE;
							$imageWidth = 250; // px
							$margin  =0;
							$margin  =0;
							#$fore_color  ="#41596d";
							$svgTagId   = $file_name = $folder.$file_name_blue;
							$back_color = 0xFFFFFF;
							$fore_color = 0x41596d;
							#QRcode::png($dataText, $saveToFile, 'h', 250, 1, $svgTagId, $back_color, $fore_color);
							
							QRcode::png($dataText, $svgTagId, 'h', 250, 1, true, $back_color, $fore_color);
							
							
							$back_color = 0xFFFFFF;
							$fore_color = 0x949494;
							$file_name_black = $new_pack_id."-Qrcode-black" . rand(10,200) . ".png";
							$svgTagId1   = $file_name = $folder.$file_name_black;
							QRcode::png($dataText1, $svgTagId1, 'h', 250, 1, true, $back_color, $fore_color);
							
							#QRcode::png($dataText,$file_name);
							$pdfdata['qrcode_image_blue']=$file_name_blue;
							$pdfdata['qrcode_image_black']=$file_name_black;
							
							#print $data['qrcode_image'];exit;	
						}
				/*end of code for qrcode genertaion*/
						//$pdfFilename = "LondonRate-Order".time().".pdf";
						$this->load->library('m_pdf');
						$this->m_pdf->pdf->AddPage('P','','','','',3,3,3,3,1,1);
						$html=$this->load->view('pdf/mayurpdf',$pdfdata, true);
						$this->m_pdf->pdf->WriteHTML($html);
						$this->m_pdf->pdf->AddPage('P','','','','',3,3,3,3,1,1);
						$html=$this->load->view('pdf/mayurpdf1',$pdfdata, true);
						$this->m_pdf->pdf->WriteHTML($html);
						$this->m_pdf->pdf->AddPage('P','','','','',3,3,3,3,1,1);
						$html=$this->load->view('pdf/mayurpdf2',$pdfdata, true);
						$this->m_pdf->pdf->WriteHTML($html);
						$this->m_pdf->pdf->Output("uploads/5f0871ad51b324d6756af4daeb0537cb/".$pdfFilename, "F");
						
						/* code for sending mail to applicant*/
					if($package_name_used=='universal')
					{	
						$strSubject = "Order on London-Rate No.".$order_no;
						$base_pat=base_url();
						$applicantinfo=$this->Packagemodel->getapplicantdata($applicant_id);
						$strApplicantEmail = $applicantinfo[0]['applicant_email'];
						$strApplicantName = ucwords($applicantinfo[0]['applicant_name']);
						
						
						
						$pdf_download_path='';
						if($package_name_used=='universal')
						{
							$packamount='(Free of charge)';
							$pdf_download_path=base_url()."uploads/5f0871ad51b324d6756af4daeb0537cb/".$pdfFilename;
						}
						if($package_name_used=='validation')
						{
							$packamount=$order_amount;
						}
						else if($package_name_used=='verification')
						{
							$packamount=$order_amount;
						}

						$output_arr=array('view_load'=>'package_order_place_to_applicant1');
						#$output_arr=array('view_load'=>'emailtemplate_ordersent');
						$input_arr=array('strApplicantName'=>$strApplicantName,
										'subject_mail'=>$strSubject,
										'strOrderno'=>$order_no,
										'base_pat'=>$base_pat,
										'package_name'=>ucfirst($package_name_used),
										'packamount'=>$packamount,
										'pdf_path'=>$pdf_download_path);
						
						
						
							$strMessageSid  = smt_send_mail($strApplicantEmail,$output_arr,$input_arr);
						}
						/* end of code for sending mail to applicant */
						
						$this->Packagemodel->savepdftotable($pdfFilename,$new_pack_id);
						
						
						$data['order'] = $arrOrderResponse;
						$data['order_txn'] = $arrOrderTxnData;
						$data['clientSecret'] = $clientSecret;
						
						$data['responsemessage'] = 'Order place successfully.';
						$data['responsecode'] = "200";
						$response_array=json_encode($data);
					}
				}
				else
				{
					$num = array('responsemessage' => 'Package is not found',
						'responsecode' => "203"
							); //create an array

					$obj = (object)$num;
					$response_array=json_encode($obj);
				}
			}
			else
			{
				$num = array('responsemessage' => 'Customer is not found.',
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
	
	
	public function getcompanyinformation_post()
	{
		$token 				= $this->input->post("token");
		$applicant_id 		= $this->input->post('applicant_id');
		
		if($token == TOKEN)
		{
			if($applicant_id!="")
			{
				/*load business type list*/
					$arrbusiness   = $this->Packagemodel->getAllBusinesstypelist();
					$arrBusinesslist=array();
					if(isset($arrbusiness) && count($arrbusiness)>0)
					{
						foreach($arrbusiness as $k)
						{
							$arrBusinesslist[]=array('business_type_id'=>$k['business_type_id'],
													'business_type'=>$k['business_type']
													);
						}
					}
					/* end of  business type listing*/
					$arrcountry   = $this->Homemodel->getAllCountrylist();
					$countrylist=array();
					if(isset($arrcountry) && count($arrcountry)>0)
					{
						foreach($arrcountry as $k)
						{
							$countrylist[]=array('country_id'=>$k['country_id'],
													'country_name'=>$k['country_name']
													);
						}
					}
					/* end of iptype listing*/
					$data['countrylist'] = $countrylist;
					$data['arrBusinesslist']=$arrBusinesslist;
					$data['responsemessage'] = 'business type list successfully.';
					$data['responsecode'] = "200";
					$response_array=json_encode($data);
			}
			else
			{
				$num = array('responsemessage' => 'Customer is not found.',
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
	
	public function getipworkinformation_post()
	{
		$token 				= $this->input->post("token");
		$applicant_id 		= $this->input->post('applicant_id');
		
		if($token == TOKEN)
		{
			if($applicant_id!="")
			{
				/*load object of ip work list*/
					$arrobjectip   = $this->Packagemodel->getAllIPworklist();
					$arrObjectWorklist=array();
					if(isset($arrobjectip) && count($arrobjectip)>0)
					{
						foreach($arrobjectip as $k)
						{
							$arrTypeOfIPWorklist=array();
							
							$object_id=$k['object_id'];
							$arrIpworktype   = $this->Packagemodel->getAllTypeWorklist($object_id);
							
							if(isset($arrIpworktype) && count($arrIpworktype)>0)
							{
								foreach($arrIpworktype as $k1)
								{
									$arrIndustryusagelist=$arrCoveragelist=$arrNiceClasslist=$arrIndustrieslist=array();
									$type_id=$k1['type_id'];
									
									$arrIndustryUsagetype   = $this->Packagemodel->getAllIndustryUsagelist($object_id,$type_id);
									
									if(isset($arrIndustryUsagetype) && count($arrIndustryUsagetype)>0)
									{
										foreach($arrIndustryUsagetype as $k2)
										{
											$arrIndustryusagelist[]=array('usage_id'=>$k2['usage_id'],
																'usage'=>$k2['usage']);
										}
									}
									else
									{
										$arrIndustryUsagetype1   = $this->Packagemodel->getAllIndustryUsagelist(0,0);
										if(isset($arrIndustryUsagetype1) && count($arrIndustryUsagetype1)>0)
										{
											foreach($arrIndustryUsagetype1 as $k7)
											{
												$arrIndustryusagelist[]=array('usage_id'=>$k7['usage_id'],
																	'usage'=>$k7['usage']);
											}
										}
									}
									
									$arrCoverageArea   = $this->Packagemodel->getAllCovergearealist($object_id,$type_id);
									
									if(isset($arrCoverageArea) && count($arrCoverageArea)>0)
									{
										foreach($arrCoverageArea as $k3)
										{
											$arrCoveragelist[]=array('coverage_id'=>$k3['coverage_id'],
																'coverage'=>$k3['coverage']);
										}
									}
									
									$arrNiceclass   = $this->Packagemodel->getAllNicelist($object_id,$type_id);
									
									if(isset($arrNiceclass) && count($arrNiceclass)>0)
									{
										foreach($arrNiceclass as $k4)
										{
											$arrNiceClasslist[]=array('classi_id'=>$k4['classi_id'],
																'nice'=>$k4['nice']);
										}
									}
									$arrIndustries   = $this->Packagemodel->arrIndustrieslist($object_id,$type_id);
									
									if(isset($arrIndustries) && count($arrIndustries)>0)
									{
										foreach($arrIndustries as $k5)
										{
											$arrIndustrieslist[]=array('ind_id'=>$k5['ind_id'],
																'industries'=>$k5['industries']);
										}
									}
									
									$arrTypeOfIPWorklist[]=array('type_id'=>$k1['type_id'],
																'type'=>$k1['type'],
																'arrIndustryusagelist'=>$arrIndustryusagelist,
																'arrCoveragelist'=>$arrCoveragelist,
																'arrNiceClasslist'=>$arrNiceClasslist,
																'arrIndustrieslist'=>$arrIndustrieslist);
								}
							}
							$arrObjectWorklist[]=array('object_id'=>$k['object_id'],
													'object'=>$k['object'],
													'arrTypeOfIPWorklist'=>$arrTypeOfIPWorklist
													);
						}
					}
					
					$ipworkstatuslist=array();
					$ipworkstatuslist=array("Already created","In process of creation");
											
					$rightsholderslist=array();
						$rightsholderslist=array('Individual','Company','Combined','Government');
					
					$data['ipworkstatuslist']=$ipworkstatuslist;
					$data['rightsholderslist']=$rightsholderslist;
					$data['arrObjectWorklist']=$arrObjectWorklist;
					$data['responsemessage'] = 'ip work information list successfully.';
					$data['responsecode'] = "200";
					$response_array=json_encode($data);
			}
			else
			{
				$num = array('responsemessage' => 'Customer is not found.',
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