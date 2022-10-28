<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Questionnaire extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('phpqrcode/qrlib');
		$this->load->model('frontModel/Questionnaire_model');
		$this->load->helper('commonfunctions_helper');
	}
	public function universal()
	{
		/* getting user country here */
		$data['usercountry']='';
		$userIP = $_SERVER['REMOTE_ADDR']; 
		$data['usercountry']=getusercountry($userIP);
		/* end of getting user country */
			
		$data['session_package_name']='universal';
		if($this->session->userdata('session_package_name'))
		{
			$data['session_package_name']=$session_package_name=$this->session->userdata('session_package_name');
		}	
		
 
		
		/* destroy session here*/
		if(isset($_GET['q']) && $_GET['q']=='success')
		{ 
			if($this->session->userdata('first_form'))
			{
				$this->session->unset_userdata('first_form');
			}
			if($this->session->userdata('second_form'))
			{
				$this->session->unset_userdata('second_form');
			}
			if($this->session->userdata('third_form'))
			{
				$this->session->unset_userdata('third_form');
			}
			if(isset($_SESSION['arrAverageValues']) && !empty($_SESSION['arrAverageValues']))
			{
				$this->session->unset_userdata('arrAverageValues');
			}
			
			if($this->session->userdata('payment_info'))
			{
				$payment_info=$this->session->userdata('payment_info');
				#print_r($payment_info);exit;
				$output_arr=array('view_load'=>'package_order_place_to_applicant1');
				
				$strApplicantEmail=$payment_info['strApplicantEmail'];
								
				$input_arr=array('strApplicantName'=>$payment_info['strApplicantName'],
								'subject_mail'=>$payment_info['subject_mail'],
								'strOrderno'=>$payment_info['strOrderno'],
								'base_pat'=>$payment_info['base_pat'],
								'package_name'=>ucfirst($payment_info['package_name']),
								'packamount'=>$payment_info['packamount'],
								'pdf_path'=>$payment_info['pdf_path']);
				
				
				$strMessageSid  = smt_send_mail($strApplicantEmail,$output_arr,$input_arr);
				$this->session->unset_userdata('payment_info');
			}
				?>
				<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
				<script type="text/javascript">
						$(document).ready(function($) 
						{
								$("#success_paymentModal").modal('show');
								
						});
				</script>
				<?php 
			
		}
		/* end of destroy session */
				
		$data['session_applicant_id']=0;
		if($this->session->userdata('london_logged_in'))
		{
			$london_logged_in=$this->session->userdata('london_logged_in');
			$data['session_applicant_id']=$london_logged_in['session_applicant_id'];
		}
		$data['countrylist']=$this->Questionnaire_model->getcountry();
		$data['applicant_name']=$data['applicant_country']=$data['applicant_email']=$data['applicant_country_code']=$data['applicant_contact_number']=$data['is_terms']=$data['is_privacy']="";
		if(isset($_POST['btn_applicant_info']))
		{
			#echo '<pre>';	print_r($_POST);exit;
			$this->form_validation->set_rules('applicant_name','Applicant Name','required');
			$this->form_validation->set_rules('applicant_country','Applicant Country','required');
			$this->form_validation->set_rules('applicant_email','Email Address','required|valid_email');
			$this->form_validation->set_rules('applicant_country_code','Country Code','required');
			$this->form_validation->set_rules('applicant_contact_number','Contact Number','required');
			
			if($data['session_applicant_id']==0)
			{
				$this->form_validation->set_rules('applicant_password','Password','required');
				$this->form_validation->set_rules('confirm_applicant_password','Confirm Password','required|matches[applicant_password]');
			}
			
			if($this->form_validation->run())
			{
					$applicant_name=$this->input->post('applicant_name');
					$applicant_country=$this->input->post('applicant_country');
					$applicant_email=$this->input->post('applicant_email');
					$applicant_country_code=$this->input->post('applicant_country_code11');
					$applicant_contact_number=$this->input->post('applicant_contact_number');
					$applicant_password=$this->input->post('applicant_password');
					
					$is_terms='No';$is_privacy='No';
					if(isset($_POST['is_terms']))
						$is_terms='Yes';
					if(isset($_POST['is_privacy']))
						$is_privacy='Yes';	
					
					$first_form=array('applicant_name'=>$applicant_name,
								   'applicant_country'=>$applicant_country,
								   'applicant_email'=>$applicant_email,
								   'applicant_country_code'=>$applicant_country_code,
								   'applicant_contact_number'=>$applicant_contact_number,
								   'applicant_password'=>md5($applicant_password),
								   'is_privacy'=>$is_privacy,
								   'is_terms'=>$is_terms);
								   
					$this->session->set_userdata('first_form',$first_form);
					
					if($data['session_applicant_id']==0)
					{
						$alreadyEmailexists=$this->Questionnaire_model->checkapplicantexists($applicant_email);
						
						if(isset($alreadyEmailexists) && count($alreadyEmailexists)>0)
						{
							$data['session_applicant_id']=$alreadyEmailexists[0]['applicant_id'];
							$mdpassword=md5($applicant_password);
							$chkpasswordexists=$this->Questionnaire_model->checkapplicantpaswordexists($applicant_email,$mdpassword);
							if($chkpasswordexists==0)
							{
								$this->session->set_flashdata('error','Email address already exists, please enter correct password');
								redirect(base_url().'Questionnaire/universal');
							}
							else
							{
								$session_data = array('session_applicant_id' => $alreadyEmailexists[0]['applicant_id'],
												'session_applicant_name' => $alreadyEmailexists[0]['applicant_name'],
												'session_applicant_email' => ucfirst($alreadyEmailexists[0]['applicant_email']),
												'session_applicant_country' => $alreadyEmailexists[0]['applicant_country'],
												'session_applicant_country_code' => $alreadyEmailexists[0]['applicant_country_code'],
												'session_applicant_contact_number' => $alreadyEmailexists[0]['applicant_contact_number'],);
							   $this->session->set_userdata('london_logged_in', $session_data);
							}
						}
					}
					
					$this->session->set_flashdata('success','information added successfully.');
					redirect(base_url().'Questionnaire/companyinformation');
			}
			else
			{
				$this->session->set_flashdata('error',$this->form_validation->error_string());
				redirect(base_url().'Questionnaire/universal');
			}
		}
		
		if($this->session->userdata('first_form'))
		{
			$use_sessiondata=$this->session->userdata('first_form');
			$data['applicant_name']=$use_sessiondata['applicant_name'];
			$data['applicant_country']=$use_sessiondata['applicant_country'];
			$data['applicant_email']=$use_sessiondata['applicant_email'];
			$data['applicant_country_code']=$use_sessiondata['applicant_country_code'];
			$data['applicant_contact_number']=$use_sessiondata['applicant_contact_number'];
			$data['is_terms']=$use_sessiondata['is_terms'];
			$data['is_privacy']=$use_sessiondata['is_privacy'];
		}
		else if($data['session_applicant_id']>0)
		{
			$use_london_logged_in=$this->session->userdata('london_logged_in');
			#print_r($use_london_logged_in);exit;
			$data['applicant_name']=$use_london_logged_in['session_applicant_name']; 
			$data['applicant_country']=$use_london_logged_in['session_applicant_country'];
			$data['applicant_email']=$use_london_logged_in['session_applicant_email'];
			$data['applicant_country_code']=$use_london_logged_in['session_applicant_country_code'];
			$data['applicant_contact_number']=$use_london_logged_in['session_applicant_contact_number'];
		}
		
		$this->load->view('frontheader');
		$this->load->view('questionnaire-universal1',$data);
		$this->load->view('frontfooter');
	}
	
	public function companyinformation()
	{
		$data['session_package_name']='universal';
		if($this->session->userdata('session_package_name'))
		{
			$data['session_package_name']=$session_package_name=$this->session->userdata('session_package_name');
		}

		/* getting user country here */
		$data['usercountry']='';
		$userIP = $_SERVER['REMOTE_ADDR']; 
		$data['usercountry']=getusercountry($userIP);
		/* end of getting user country */
		
		$data['countrylist']=$this->Questionnaire_model->getcountry();
		$data['businesstypelist']=$this->Questionnaire_model->getbusinesslist();
		$data['hidden_applicant_country2']=$data['hidden_applicant_email2']='';
		if($this->session->userdata('first_form'))
		{
			$firstsessiondata=$this->session->userdata('first_form');
			$data['hidden_applicant_country2']=$firstsessiondata['applicant_country'];
			$data['hidden_applicant_email2']=$firstsessiondata['applicant_email'];
			$data['hidden_applicant_country_code2']=$firstsessiondata['applicant_country_code'];
			$data['hidden_applicant_contact_number2']=$firstsessiondata['applicant_contact_number'];
		}
		$data['company_name']=$data['is_same_country']=$data['applicant_country2']=$data['year_establish']=$data['is_website']=$data['business_type']=$data['website_url']=$data['is_same_applicantemail']=$data['applicant_email2']=$data['is_same_applicantcontact']=$data['applicant_country_code2']=$data['applicant_contact_number2']=$data['protected_regions']=$data['current_team_partners']=$data['uniqueness_product']='';
		$data['main_products']=$data['potential_competitor']=$data['potential_customer']=array();
		if($this->session->userdata('second_form'))
		{
			$use_sessiondata1=$this->session->userdata('second_form');
			$data['company_name']=$use_sessiondata1['company_name'];
			$data['is_same_country']=$use_sessiondata1['is_same_country'];
			$data['applicant_country2']=$use_sessiondata1['applicant_country2'];
			$data['year_establish']=$use_sessiondata1['year_establish'];			
			$data['business_type']=$use_sessiondata1['business_type'];
			
			$data['is_website']=$use_sessiondata1['is_website'];
			$data['website_url']=$use_sessiondata1['website_url'];
			$data['is_same_applicantemail']=$use_sessiondata1['is_same_applicantemail'];
			
			$data['applicant_email2']=$use_sessiondata1['applicant_email2'];
			$data['is_same_applicantcontact']=$use_sessiondata1['is_same_applicantcontact'];
			$data['applicant_country_code2']=$use_sessiondata1['applicant_country_code2'];
			$data['applicant_contact_number2']=$use_sessiondata1['applicant_contact_number2'];
			$data['protected_regions']=$use_sessiondata1['protected_regions'];
			$data['current_team_partners']=$use_sessiondata1['current_team_partners'];
			$data['uniqueness_product']=$use_sessiondata1['uniqueness_product'];
			$data['main_products']=$use_sessiondata1['main_products'];
			$data['potential_customer']=$use_sessiondata1['potential_customer'];
			$data['potential_competitor']=$use_sessiondata1['potential_competitor'];
		}
		
		if(isset($_POST['btn_applicant_info2']))
		{
				//	echo '<pre>';	print_r($_POST); exit;
			$company_name=$this->input->post('company_name');
			$applicant_country2=$this->input->post('applicant_country2');
			$year_establish=$this->input->post('year_establish');
			$business_type=$this->input->post('business_type');
			$website_url=$this->input->post('website_url');
			$applicant_email2=$this->input->post('applicant_email2');
			$is_same_applicantcontact=$this->input->post('is_same_applicantcontact');
			$applicant_country_code2=$this->input->post('applicant_country_code12');
			
			
			$applicant_contact_number2=$this->input->post('applicant_contact_number2');
			$potential_customer=$this->input->post('potential_customer');
			$potential_competitor=$this->input->post('potential_competitor');
			$protected_regions=$this->input->post('protected_regions');
			$current_team_partners=$this->input->post('current_team_partners');
			$uniqueness_product=$this->input->post('uniqueness_product');
			
			$is_same_country=$is_same_applicantemail=$is_same_applicantcontact='No';
			$is_website='Yes';
			if(isset($_POST['is_same_country']))
				$is_same_country='Yes';
			
			if(isset($_POST['is_website']))
				$is_website='No';
			
			if(isset($_POST['is_same_applicantemail']))
				$is_same_applicantemail='Yes';
			
			if(isset($_POST['is_same_applicantcontact']))
				$is_same_applicantcontact='Yes';
			
			$main_products=$potential_customer=$potential_competitor=array();
			if(isset($_POST['main_products']))
				$main_products=$_POST['main_products'];
			if(isset($_POST['potential_customer']))
				$potential_customer=$_POST['potential_customer'];
			if(isset($_POST['potential_competitor']))
				$potential_competitor=$_POST['potential_competitor'];
			
			
			$second_form=array('company_name'=>$company_name,
							'is_same_country'=>$is_same_country,
						   'applicant_country2'=>$applicant_country2,
						   'year_establish'=>$year_establish,
						   'business_type'=>$business_type,
						   'main_products'=>$main_products,
						   'is_website'=>$is_website,
						   'website_url'=>$website_url,
						   'is_same_applicantemail'=>$is_same_applicantemail,
						   'applicant_email2'=>$applicant_email2,
						   'is_same_applicantcontact'=>$is_same_applicantcontact,
						   'applicant_country_code2'=>$applicant_country_code2,
						   'applicant_contact_number2'=>$applicant_contact_number2,
						   'potential_customer'=>$potential_customer,
						   'potential_competitor'=>$potential_competitor,
						   'protected_regions'=>$protected_regions,
						   'current_team_partners'=>$current_team_partners,
						   'uniqueness_product'=>$uniqueness_product
						   );
						   
			$this->session->set_userdata('second_form',$second_form);
			$this->session->set_flashdata('success','information added successfully.');
			redirect(base_url().'Questionnaire/ipworkinformation');
		}
		
		$this->load->view('frontheader');
		$this->load->view('questionnaire-universal2',$data);
		$this->load->view('frontfooter');
	}
		
	public function ipworkinformation()
	{
		$data['session_package_name']='universal';
		if($this->session->userdata('session_package_name'))
		{
			$data['session_package_name']=$session_package_name=$this->session->userdata('session_package_name');
		}
		$data['ip_work_object']=$data['ip_work_type']=$data['coverage_area']=array();
		
		$data['ip_work_title']=$data['industry_ip_work']=$data['ip_work_status']=$data['development_date']=$data['registration_date']=$data['registration_org']=$data['rightsholders']=$data['industries']=array();
		$data['reviewobject']=0;
		if($this->session->userdata('third_form'))
		{
			$use_sessiondata2=$this->session->userdata('third_form');
			$data['ip_work_title']=$use_sessiondata2['ip_work_title'];
			$data['ip_work_object']=$use_sessiondata2['ip_work_object'];
			
			// getting the ip_work_type here
			$data['ip_work_type']=$this->Questionnaire_model->getipworktype($data['ip_work_object'][0]);
			
			
			$data['industry_ip_work']=$use_sessiondata2['industry_ip_work'];			
			$data['ip_work_status']=$use_sessiondata2['ip_work_status'];
			
			$data['development_date']=$use_sessiondata2['development_date'];
			$data['registration_date']=$use_sessiondata2['registration_date'];
			$data['coverage_area']=$use_sessiondata2['coverage_area'];
			$data['registration_org']=$use_sessiondata2['registration_org'];
			$data['rightsholders']=$use_sessiondata2['rightsholders'];
			$data['industries']=$use_sessiondata2['industries'];
			$data['nice_classification']=$use_sessiondata2['nice_classification'];
			$data['is_industries']=$use_sessiondata2['is_industries'];
		}
		
		if(isset($_POST['btn_applicant_info3']))
		{
			#echo '<pre>';	print_r($_POST); exit;
			$ip_work_title=$this->input->post('ip_work_title');
			$ip_work_object=$this->input->post('ip_work_object');
			$ip_work_type=$this->input->post('ip_work_type');
			$industry_ip_work=$this->input->post('industry_ip_work');
			$ip_work_status=$this->input->post('ip_work_status');
			
			$development_date=$this->input->post('development_date');
			$registration_date=$this->input->post('registration_date');
			$coverage_area=$this->input->post('coverage_area');
			$registration_org=$this->input->post('registration_org');
			$rightsholders=$this->input->post('rightsholders');
			
			$is_industries=$this->input->post('is_industries');
			
			$industries=$this->input->post('industries');
			$nice_classification=$this->input->post('nice_classification');
			
			if(isset($_POST['reviewobject']))
				$reviewobject=$_POST['reviewobject'];
			#echo $reviewobject;exit;
		   $third_form=array('ip_work_title'=>$ip_work_title,
						   'ip_work_object'=>$ip_work_object,
						   'ip_work_type'=>$ip_work_type,
						   'industry_ip_work'=>$industry_ip_work,
						   'ip_work_status'=>$ip_work_status,						   
						   'development_date'=>$development_date,
						   'registration_date'=>$registration_date,
						   'coverage_area'=>$coverage_area,
						   'registration_org'=>$registration_org,
						   'rightsholders'=>$rightsholders,
						   'is_industries'=>$is_industries,
						   'industries'=>$industries,
						   'nice_classification'=>$nice_classification,
						   'reviewobject'=>$reviewobject
						   );
						   
			$this->session->set_userdata('third_form',$third_form);
			$this->session->set_flashdata('success','information added successfully.');
			redirect(base_url().'Questionnaire/additionalinformation');
		}
		$data['ipworkobjectlist']=$this->Questionnaire_model->getobjectofIPwork();
		$data['ipworkusagelist']=$this->Questionnaire_model->getIPworkusage();
		
		$this->load->view('frontheader');
		$this->load->view('questionnaire-universal3',$data);
		$this->load->view('frontfooter');
	}	
	
	public function additionalinformation()
	{
$data['session_package_name']='universal';
		if($this->session->userdata('session_package_name'))
		{
			$data['session_package_name']=$session_package_name=$this->session->userdata('session_package_name');
		}

		$data['session_applicant_id']=0;
		if($this->session->userdata('london_logged_in'))
		{
			$london_logged_in=$this->session->userdata('london_logged_in');
			$data['session_applicant_id']=$london_logged_in['session_applicant_id'];
		}
		
		if(isset($_POST['btn_applicant_info4']))
		{
			//echo '<pre>';	print_r($_POST); exit;
			$currency=$this->input->post('currency');
			$average_sales=$this->input->post('average_sales');
			$average_salaries=$this->input->post('average_salaries');
			$average_budget=$this->input->post('average_budget');
			$average_net_profit=$this->input->post('average_net_profit');
			
			$average_sales=str_replace(',', '', $average_sales);
			$average_salaries=str_replace(',', '', $average_salaries);
			$average_budget=str_replace(',', '', $average_budget);
			$average_net_profit=str_replace(',', '', $average_net_profit);
			
			/* code for adding first form entry in array */
			$insert_array=$applicant_array=array();
			$main_products=$potential_customer=$potential_competitor=array();
			$step=0;
			if($this->session->userdata('first_form'))
			{
				$firstsessiondata=$this->session->userdata('first_form');
				
				$applicant_array['applicant_name']=$firstsessiondata['applicant_name'];
				$applicant_array['applicant_country']=$firstsessiondata['applicant_country']; 
				$applicant_array['applicant_email']=$firstsessiondata['applicant_email'];
				$applicant_array['applicant_country_code']=$firstsessiondata['applicant_country_code'];
				$applicant_array['applicant_contact_number']=$firstsessiondata['applicant_contact_number'];
				$applicant_array['applicant_password']=$firstsessiondata['applicant_password'];
				$applicant_array['applicant_status']='Active';
				
				$insert_array['is_privacy']=$firstsessiondata['is_privacy'];
				$insert_array['is_terms']=$firstsessiondata['is_terms'];
				$step=1;
			}	
			if($this->session->userdata('second_form'))
			{
				$secsessiondata=$this->session->userdata('second_form');
				//print_r($secsessiondata);exit;
				$insert_array['company_name']=$secsessiondata['company_name'];
				$insert_array['is_same_country']=$secsessiondata['is_same_country'];
				$insert_array['applicant_country2']=$secsessiondata['applicant_country2']; 
				$insert_array['year_establish']=$secsessiondata['year_establish'];
				$business_type=$insert_array['business_type']=$secsessiondata['business_type'];
				$insert_array['is_website']=$secsessiondata['is_website'];
				$insert_array['website_url']=$secsessiondata['website_url'];
				$insert_array['is_same_applicantemail']=$secsessiondata['is_same_applicantemail'];
				$insert_array['applicant_email2']=$secsessiondata['applicant_email2'];
				$insert_array['is_same_applicantcontact']=$secsessiondata['is_same_applicantcontact'];
				$insert_array['applicant_country_code2']=$secsessiondata['applicant_country_code2'];
				$insert_array['applicant_contact_number2']=$secsessiondata['applicant_contact_number2'];
				$potential_regions=$insert_array['potential_regions']=$secsessiondata['protected_regions'];
				$current_team_partners=$insert_array['current_team_partners']=$secsessiondata['current_team_partners'];
				$uniqueness_product=$insert_array['uniqueness_product']=$secsessiondata['uniqueness_product'];
				$main_products=$secsessiondata['main_products'];
				$potential_customer=$secsessiondata['potential_customer'];
				$potential_competitor=$secsessiondata['potential_competitor'];
				$step=2;
			}	
			if($this->session->userdata('third_form'))
			{
				$thirddsessiondata=$this->session->userdata('third_form');
				$reviewobject=$insert_array['reviewobject']=$thirddsessiondata['reviewobject'];
			}
			$insert_array['currency']=$currency;
			$insert_array['average_sales']=$average_sales; 
			$insert_array['average_salaries']=$average_salaries;
			$insert_array['average_budget']=$average_budget;
			$insert_array['average_net_profit']=$average_net_profit;
			
			$insert_array['addeddate']=date('Y-m-d H:i:s');
			$insert_array['updateddate']=date('Y-m-d H:i:s');
			
			
			if($data['session_applicant_id']==0)
			{
				$applicant_id=$this->Questionnaire_model->addapplicant($applicant_array);
			}
			else
			{
				$applicant_id=$data['session_applicant_id'];
			}
			if($applicant_id>0)
			{
				$order_status='order_place';
				$payment_status='pending';
				$payment_type="stripe";
				
				if($session_package_name=="universal")
				{
					$order_status='order_delivered';
					$payment_status='completed';
					$payment_type="free";
				}
				
				$insert_array['applicant_id']=$applicant_id;
				$insert_array['package_name']=$session_package_name;
				
				// get package name
				$arrpackage_id_used=$this->Questionnaire_model->getMAinpackageName($session_package_name);
				$package_id_used=$arrpackage_id_used[0]['pack_manage_id'];
				$package_amount=$arrpackage_id_used[0]['amount'];
				
				$insert_array['main_package_id']=$package_id_used;
				$insert_array['package_amount']=$package_amount;
				$insert_array['order_status']=$order_status;
				$insert_array['purchase_from']="Website";            
				
				$pack_id=$this->Questionnaire_model->adduniversalpackage($insert_array);
				
				$insert_array['order_no']=$order_no="LR000".$pack_id;
				$resorder=$this->Questionnaire_model->updateordernumber($order_no,$pack_id);
				
				
				
				$transaction_id = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
				$clientSecret = "";
				$payment_response = "";
						
				$arrOrderTxnData = array(	"applicant_id"     	 	 => $applicant_id,
												"order_id"     	 	 => $pack_id,
												"transaction_id" 	 => $transaction_id,
												"payment_type"   	 => $payment_type,
												"payment_response"   => $payment_response,
												"order_amount"      		 => round($package_amount,2),
												"payment_status"   	 => $payment_status,
												"dateadded"     	 => date('Y-m-d H:i:s'),
												"dateupdated"    => date('Y-m-d H:i:s')
										);
				
				
				$intOrderDetailId   = $this->Questionnaire_model->addOrderTransaction($arrOrderTxnData);	
				if($this->session->userdata('second_form'))
				{
					/*add here for main product */
					if(!empty($main_products))
					{
						$cnt_main_products=count($main_products);
						if($cnt_main_products>0)
						{
							for($i=0;$i<$cnt_main_products;$i++)
							{
								$input_main_product_array=array('pack_id'=>$pack_id,
																'main_product'=>$main_products[$i],
																'dateadded'=>date('Y-m-d H:i:s'),
																'dateupdated'=>date('Y-m-d H:i:s'));
								$main_product_id=$this->Questionnaire_model->addforsecoundform($input_main_product_array,'package_main_products');								
							}
						}
					}
					/* end of code for main product */
					/*add here for Potential customer */
					if(!empty($potential_customer))
					{
						$cnt_potential_customer=count($potential_customer);
						if($cnt_potential_customer>0)
						{
							for($i=0;$i<$cnt_potential_customer;$i++)
							{
								$input_potential_customer_array=array('pack_id'=>$pack_id,
																'potential_customer'=>$potential_customer[$i],
																'dateadded'=>date('Y-m-d H:i:s'),
																'dateupdated'=>date('Y-m-d H:i:s'));
								$potential_customer_id=$this->Questionnaire_model->addforsecoundform($input_potential_customer_array,'package_potential_customer');								
							}
						}
					}
					/* end of code for Potential customer */
					/*add here for Potential competitor */
					if(!empty($potential_competitor))
					{
						$cnt_potential_competitor=count($potential_competitor);
						if($cnt_potential_competitor>0)
						{
							for($i=0;$i<$cnt_potential_competitor;$i++)
							{
								$input_potential_competitor_array=array('pack_id'=>$pack_id,
																'potential_competitor'=>$potential_competitor[$i],
																'dateadded'=>date('Y-m-d H:i:s'),
																'dateupdated'=>date('Y-m-d H:i:s'));
								$potential_competitor_id=$this->Questionnaire_model->addforsecoundform($input_potential_competitor_array,'package_potential_competitor');								
							}
						}
					}
					/* end of code for Potential competitor */
				}
				
				if($this->session->userdata('third_form'))
				{
					$thirdsessiondata=$this->session->userdata('third_form');
					//print_r($secsessiondata);exit;
					$ip_work_title=$thirdsessiondata['ip_work_title'];
					$ip_work_object=$thirdsessiondata['ip_work_object'];
					$ip_work_type=$thirdsessiondata['ip_work_type'];
					$industry_ip_work=$thirdsessiondata['industry_ip_work'];
					$ip_work_status=$thirdsessiondata['ip_work_status'];
					$development_date=$thirdsessiondata['development_date'];
					$registration_date=$thirdsessiondata['registration_date'];
					$coverage_area=$thirdsessiondata['coverage_area'];
					$registration_org=$thirdsessiondata['registration_org'];
					$rightsholders=$thirdsessiondata['rightsholders'];
					$industries=$thirdsessiondata['industries'];
					$is_industries=$thirdsessiondata['is_industries'];
					$nice_classification=$thirdsessiondata['nice_classification'];
					
					if(!empty($ip_work_title))
					{
						$cnt_ip_work_title=count($ip_work_title);
						if($cnt_ip_work_title>0)
						{
							for($i=0;$i<$cnt_ip_work_title;$i++)
							{
								$txt_industries=0;
								$txt_nice_classification=0;
								
								if($industries[$i]!="" || $is_industries[$i]=="YES")
								{
									$txt_industries=$industries[$i];
								}
								if($nice_classification[$i]!="" || $is_industries[$i]=="NO")
								{
									$txt_nice_classification=$nice_classification[$i];
								}
								
								$input_third_array=array('pack_id'=>$pack_id,
								
														'reviewobject'=>$reviewobject,
														'ip_work_title'=>$ip_work_title[$i],
														'ip_work_object'=>$ip_work_object[$i],
														'ip_work_type'=>$ip_work_type[$i],
														'industry_ip_work'=>$industry_ip_work[$i],
														'ip_work_status'=>$ip_work_status[$i],
														'development_date'=>date('Y-m-d',strtotime($development_date[$i])),
														'registration_date'=>date('Y-m-d',strtotime($registration_date[$i])),
														'coverage_area'=>$coverage_area[$i],
														'registration_org'=>$registration_org[$i],
														'rightsholders'=>$rightsholders[$i],
														'industries'=>$txt_industries,
														'nice_classification'=>$txt_nice_classification,
														'is_industries'=>$is_industries[$i],
														'dateadded'=>date('Y-m-d H:i:s'),
														'dateupdated'=>date('Y-m-d H:i:s'));
																			
								$work_info_id=$this->Questionnaire_model->addforsecoundform($input_third_array,'package_ip_works_information');
							}
						}
					}
				}
				
				/* code for generating pdf here*/
				$data['order_no']=$order_no;
				$data['currency']=$currency;
				$data['average_sales']=$average_sales; 
				$data['average_salaries']=$average_salaries;
				$data['average_budget']=$average_budget;
				$data['average_net_profit']=$average_net_profit;
				
			 	$data['pdf_age']=$pdf_age=cal_year_age($insert_array['year_establish']);
				$mob_value=$this->Questionnaire_model->fnGetYearValue($pdf_age);
				#echo $this->db->last_query();
				$data['mob_value']=$mob_value;
				$data['applicant_name']=ucwords($applicant_array['applicant_name']);
				$addeddate=$data['addeddate']=date('Y-m-d H:i:s');
				$data['after3month'] = date('Y-m-d', strtotime("+3 months", strtotime($addeddate)));
				
				$reviewobject=$insert_array['reviewobject'];
				$data['reviewobjectinfo']=$this->Questionnaire_model->getreviewinfo($reviewobject,$pack_id);
				
				$data['arrValues']=getallcalculations($average_salaries,$average_budget,$average_sales,$average_net_profit,$pdf_age,$mob_value);
				
				
				$data['str_main_products']=implode(',',$main_products);
				$data['businessinduinfo']=$this->Questionnaire_model->getbusinessindustry($business_type);
				$strprotectedindustries='';
				if($txt_industries!=0)
				{
					
							$isindustriesdata=$this->Questionnaire_model->getindustriesdata($txt_industries);
							
							$strprotectedindustries =$isindustriesdata[0]['industries'];
					}
					else if($txt_nice_classification!=0)
					{
						$isnicedata=$this->Questionnaire_model->getnicedata($txt_nice_classification);
						
						$strprotectedindustries =$isnicedata[0]['nice'];
					}
				#echo $this->db->last_query();
				$data['protectedinfo']=$strprotectedindustries;
				
				$data['businessinduinfo']=$this->Questionnaire_model->getbusinessindustry($business_type);
				
				$potentialcustinfo=$this->Questionnaire_model->getpotentialcustomers($pack_id);

				$strpotentialcustinfo='';
				if(isset($potentialcustinfo) && count($potentialcustinfo)>0)
				{
					for($j=0;$j<count($potentialcustinfo);$j++)
					{
						$strpotentialcustinfo .=$potentialcustinfo[$j]['potential_customer'].",";
					}
				}
				$data['strpotentialcustinfo']=$strpotentialcustinfo;

				$data['current_team_partners']=$current_team_partners;
				$data['uniqueness_product']=$uniqueness_product;
				$data['potential_regions']=$potential_regions;
				$data['potential_competitor']=implode(",",$potential_competitor);
				/* code for qrcode */
				
				
				/*if(isset($_SESSION['arrAverageValues']) && !empty($_SESSION['arrAverageValues']))
				{
					$data['arrAverageValues']=$_SESSION['arrAverageValues'];
				}*/
				
				if($this->session->userdata('session_package_name'))
				{
					$data['session_package_name']=$session_package_name=$this->session->userdata('session_package_name');
				}
				else
				{
					$data['session_package_name']=$session_package_name='universal';
				}
				$data['qrcode_image']='';
			   #$registrtaion_no="https://londonrate.org/";
			    $SERVERFILEPATH = $_SERVER['DOCUMENT_ROOT'].'/uploads/qrcode/';
				
				$pdfFilename1 = md5("LondonRate-Order".time());
				$pdfFilename = $pdfFilename1.".pdf";
				
				$folder = $SERVERFILEPATH;
				$file_name_blue = $pack_id."-Qrcode-blue" . rand(10,200) . ".png";
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
					$file_name_black = $pack_id."-Qrcode-black" . rand(10,200) . ".png";
					$svgTagId1   = $file_name = $folder.$file_name_black;
					QRcode::png($dataText1, $svgTagId1, 'h', 250, 1, true, $back_color, $fore_color);
					
					#QRcode::png($dataText,$file_name);
					$data['qrcode_image_blue']=$file_name_blue;
					$data['qrcode_image_black']=$file_name_black;
					
					#print $data['qrcode_image'];exit;	
				}
			   /* $registrtaion_no="https://londonrate.org/";

					if($registrtaion_no!="")
					{
						//file path for store qrcode
						$SERVERFILEPATH = $_SERVER['DOCUMENT_ROOT'].'/uploads/qrcode/';
					   
						$registrtaion_no1= substr($registrtaion_no, 0,9);
						
						$folder = $SERVERFILEPATH;
						$file_name1 = $pack_id."-Qrcode" . rand(2,200) . ".png";
						$file_name = $folder.$file_name1;
						QRcode::png($registrtaion_no,$file_name);
						$data['qrcode_image']=$file_name1;
						#print $data['qrcode_image'];exit;	
					}*/
				/* end of code for qrcode */
				#$this->load->view('universal_pdf',$data, true);exit;
				
				#echo '<pre>';print_r($data);exit;
				
				
				#$html=$this->load->view('universal_pdf',$data, true);
				#$pdfFilename = "LondonRate-Order".date('Y-m-d')."_".date('h:i:s').".pdf";
				#$this->load->library('m_pdf');
				#$this->m_pdf->pdf->WriteHTML($html);
				
				//$pdfFilename = "LondonRate-Order".time().".pdf";
				$this->load->library('m_pdf');
				$this->m_pdf->pdf->AddPage('P','','','','',3,3,3,3,1,1);
				$html=$this->load->view('pdf/mayurpdf',$data, true);
				$this->m_pdf->pdf->WriteHTML($html);
				$this->m_pdf->pdf->AddPage('P','','','','',3,3,3,3,1,1);
				$html=$this->load->view('pdf/mayurpdf1',$data, true);
				$this->m_pdf->pdf->WriteHTML($html);
				$this->m_pdf->pdf->AddPage('P','','','','',3,3,3,3,1,1);
				$html=$this->load->view('pdf/mayurpdf2',$data, true);
				$this->m_pdf->pdf->WriteHTML($html);
				$this->m_pdf->pdf->Output("uploads/5f0871ad51b324d6756af4daeb0537cb/".$pdfFilename, "F");
			
			/* end of code for generating pdf here*/
				
				/* code for sending mail to applicant*/
				$strSubject = "Order on London-Rate No.".$order_no;
				$base_pat=base_url();
				$strApplicantEmail = $applicant_array['applicant_email'];
				$strApplicantName = ucwords($applicant_array['applicant_name']);
				
				
				
				$pdf_download_path='';
				if($session_package_name=='universal')
				{
					$packamount='(Free of charge)';
					$pdf_download_path=base_url()."uploads/5f0871ad51b324d6756af4daeb0537cb/".$pdfFilename;
				}
				if($session_package_name=='validation')
				{
					$packamount=$package_amount;
				}
				else if($session_package_name=='verification')
				{
					$packamount=$package_amount;
				}

				$output_arr=array('view_load'=>'package_order_place_to_applicant1');
				#$output_arr=array('view_load'=>'emailtemplate_ordersent');
				$input_arr=array('strApplicantName'=>$strApplicantName,
								'subject_mail'=>$strSubject,
								'strOrderno'=>$order_no,
								'base_pat'=>$base_pat,
								'package_name'=>ucfirst($session_package_name),
								'packamount'=>$packamount,
								'pdf_path'=>$pdf_download_path);
				
				
				if($session_package_name=='universal')
				{
					$strMessageSid  = smt_send_mail($strApplicantEmail,$output_arr,$input_arr);
				}
				/* end of code for sending mail to applicant */
				/* store pdf to table */
				$this->Questionnaire_model->savepdftotable($pdfFilename,$pack_id);
				if($session_package_name!='universal')
				{
					$payment_arr=array('strApplicantName'=>$strApplicantName,
								'strApplicantEmail'=>$strApplicantEmail,
								'view_load'=>'package_order_place_to_applicant1',
								'subject_mail'=>$strSubject,
								'strOrderno'=>$order_no,
								'base_pat'=>$base_pat,
								'package_name'=>ucfirst($session_package_name),
								'packamount'=>$packamount,
								'pdf_path'=>$pdf_download_path);
					$this->session->set_userdata('payment_info',$payment_arr);
					if($session_package_name=='validation')
					{
						redirect(PAYMENT_URL1);
					}
					else
					{
						redirect(PAYMENT_URL2);
					}
				}
				else
				{
					/* destroy session here*/
					$this->session->unset_userdata('first_form');
					$this->session->unset_userdata('second_form');
					$this->session->unset_userdata('third_form');
					if(isset($_SESSION['arrAverageValues']) && !empty($_SESSION['arrAverageValues']))
					{
						$this->session->unset_userdata('arrAverageValues');
					}
					/* end of destroy session */
					?>
					<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
					<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
					<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
					<script type="text/javascript">
							$(document).ready(function($) 
							{
									$("#success_universalModal").modal('show');
									
							});
					</script>
		<?php 
				#redirect(base_url().'Questionnaire/universalthankyou',$data);
				}
			}
			else
			{
				$this->session->set_flashdata('error','Error while adding information');
				redirect(base_url().'Questionnaire/additionalinformation');
			}
			/* end of code for adding form entry in array */
			
		}
		
		$this->load->view('frontheader');
		$this->load->view('questionnaire-universal4');
		$this->load->view('frontfooter');
	}
	
	public function universal_pdf()
	{
		$average_salaries = 3000;
		$average_sales = 5000;
		$pdf_age = 0;
		$mob_value=0;
		$average_budget=2000;
		//$mob_value = 100000;
		$average_net_profit=1000;
		
		$data['arrValues']=getallcalculations($average_salaries,$average_budget,$average_sales,$average_net_profit,$pdf_age,$mob_value);
		exit;
		
		$html=$this->load->view('newpdf',$data, true);
		//$html=$this->load->view('universal_pdf',$data, true);
		#print $html; exit;
		$pdfFilename = "LondonRate-Order".time().".pdf";
		$this->load->library('m_pdf');
		//$this->m_pdf->pdf->SetFont('amiri');
		//$this->m_pdf->pdf->SetDisplayMode('fullwidth');
		$this->m_pdf->pdf->WriteHTML($html);

		$this->m_pdf->pdf->Output($pdfFilename, "D");
		
		exit;
		$this->load->view('universal_pdf',$data);
	}
	
	public function newuniversal_pdf()
	{
		$average_salaries = 100000;
		$average_sales = 100000;
		$pdf_age = 4;
		$mob_value = 100000;
		
		$data['arrValues']=getallcalculations($average_salaries,0,$average_sales,$average_net_profit,$pdf_age,$mob_value);
		$pdfFilename = "LondonRate-Order".time().".pdf";
		$this->load->library('m_pdf');
		
		$this->m_pdf->pdf->SetFont("amiri");
		$this->m_pdf->pdf->SetMargins(0, 1,1); // will set it to 0 for all pages.
		#$this->m_pdf->pdf->setAutoTopMargin (0, 1,1); // will set it to 0 for all pages.

		$stylesheet = file_get_contents(base_url().'templates/admin/assets/css/MyStyleWithFont.css');
		#print $stylesheet ; exit;
		$this->m_pdf->pdf->WriteHTML($stylesheet,1);
		$html=$this->load->view('pdf/mayurpdf',$data, true);
		#print $html; exit;
		$this->m_pdf->pdf->WriteHTML($html);
		$this->m_pdf->pdf->Output($pdfFilename, "D");
		
		exit;
		$this->load->view('universal_pdf',$data);
	}
	public function shravan_pdf()
	{
		$average_salaries = 100000;
		$average_sales = 100000;
		$pdf_age = 4;
		$mob_value = 100000;
		
		$data['arrValues']=getallcalculations($average_salaries,0,$average_sales,$average_net_profit,$pdf_age,$mob_value);
		$pdfFilename = "LondonRate-Order".time().".pdf";
		$this->load->library('m_pdf');
		
		$this->m_pdf->pdf->SetFont("amiri");
		$this->m_pdf->pdf->SetMargins(0, 1,1); // will set it to 0 for all pages.
		#$this->m_pdf->pdf->setAutoTopMargin (0, 1,1); // will set it to 0 for all pages.

		$stylesheet = file_get_contents(base_url().'templates/admin/assets/css/MyStyleWithFont.css');
		#print $stylesheet ; exit;
		$this->m_pdf->pdf->WriteHTML($stylesheet,1);
		$html=$this->load->view('mayurpdf',$data, true);
		#print $html; exit;
		$footerHtml = $this->load->view('pdffooter',$data, true);
		$this->m_pdf->pdf->SetHTMLFooter($footerHtml);
		 
		$this->m_pdf->pdf->WriteHTML($html);
		$this->m_pdf->pdf->Output($pdfFilename, "D");
		
		exit;
		$this->load->view('universal_pdf',$data);
	}
	
	public function temp_pdf()
	{
		ini_set("display_errors",1);
		error_reporting(E_ERROR);
		$average_salaries = 100000;
		$average_sales = 100000;
		$pdf_age = 4;
		$mob_value = 100000;
		
		$data['arrValues']=getallcalculations($average_salaries,0,$average_sales,$average_net_profit,$pdf_age,$mob_value);
		$pdfFilename = "LondonRate-Order".time().".pdf";
		$this->load->library('m_pdf');
		#$footerhtml=$this->load->view('pdffooter',$data, true);
		//$this->m_pdf->pdf->SetHTMLFooter($footerhtml);
		$this->m_pdf->pdf->AddPage('P','','','','',3,3,3,3,1,1);

		#$this->m_pdf->pdf->AddPage('', '', 1, '', 'on');    // suppress page numbering for the introduction
		$html=$this->load->view('pdf/mayurpdf',$data, true);
		$this->m_pdf->pdf->WriteHTML($html);
		#$this->m_pdf->pdf->AddPage('','E'); 
		
		$this->m_pdf->pdf->AddPage('P','','','','',3,3,3,3,1,1); // suppress page numbering for the introduction
		$html=$this->load->view('pdf/mayurpdf1',$data, true);
		$this->m_pdf->pdf->WriteHTML($html);
		print $html; exit;
		$this->m_pdf->pdf->AddPage('P','','','','',3,3,3,3,1,1); // suppress page numbering for the introduction
		$html=$this->load->view('pdf/mayurpdf2',$data, true);
		$this->m_pdf->pdf->WriteHTML($html);
		
		$this->m_pdf->pdf->Output($pdfFilename, "D");

						
		
		
		
		
	}
	public function universal_mail()
	{
		$data['base_pat']=base_url();
		$this->load->view('emails/package_order_place_to_applicant',$data);
	}
	
	public function universalthankyou()
	{
		$this->load->view('frontheader');
		$this->load->view('universalthankyou');
		$this->load->view('frontfooter');
	}
	
	public function validation()
	{
		$this->load->view('frontheader');
		$this->load->view('questionnaire-validation');
		$this->load->view('frontfooter');
	}
	public function verification()
	{
		$this->load->view('frontheader');
		$this->load->view('questionnaire-verification');		
		$this->load->view('frontfooter');
	}	
	
	public function ajaxgettypeofIPwork()
	{
		$ip_work_object=$_POST['ip_work_object'];
		$session_ip_work_type=$_POST['session_ip_work_type'];
		$resNum=$this->Questionnaire_model->getipworktype($ip_work_object);
		#echo $this->db->last_query();exit;
		if(count($resNum)>0)
		{
			$str=$pp ='';
			$str .='<option value="">--Select--</option>';
				//print_r($arrattributemaster);
				foreach($resNum as $attr)
				{
					$pp = '';
					if($session_ip_work_type==$attr['type_id'])
					{
						$pp .= 'selected="selected"'; 
					}
					$str .='<option value='.$attr['type_id'].' '.$pp.'>'.$attr['type'].'</option>';
				}	
		}
		echo json_encode(array('resstr'=>$str));
	}
	
	public function ajaxgetCoverageareaClassification()
	{
		$ip_work_type=$_POST['ip_work_type'];
		$ip_work_object=$_POST['ip_work_object'];
		$session_industry_ip_work=$_POST['session_industry_ip_work'];
		$str='';
			$str1='';
			
		$resNum=$this->Questionnaire_model->getcoveragearea($ip_work_type,$ip_work_object);
		if(count($resNum)>0)
		{
			
			#$str .='<option value="">Select</option>';
				//print_r($arrattributemaster);
				foreach($resNum as $attr)
				{
					$pp = '';
					if($session_industry_ip_work==$attr['coverage_id'])
					{
						$pp .= 'selected="selected"'; 
					}
					$str .='<option value='.$attr['coverage_id'].' '.$pp.'>'.$attr['coverage'].'</option>';
				}	
		}
		
		$which='';
		# load nice classification/industries
		$resNum1=$this->Questionnaire_model->getniceclass($ip_work_type,$ip_work_object);
		#echo $this->db->last_query();exit;
		if(count($resNum1)>0)
		{
			$which='nice';
			$str1 .='<option value="">--Select--</option>';
				//print_r($arrattributemaster);
				foreach($resNum1 as $attr)
				{
					$pp = '';
					/*if($session_industry_ip_work==$attr['classi_id'])
					{
						$pp .= 'selected="selected"'; 
					}*/
					$str1 .='<option value='.$attr['classi_id'].' '.$pp.'>'.$attr['nice'].'</option>';
				}	
		}
		else
		{
			$which='indus';
			$resNum1=$this->Questionnaire_model->getindustries($ip_work_type,$ip_work_object);
			if(count($resNum1)>0)
			{
					$str1 .='<option value="">--Select--</option>';
					//print_r($arrattributemaster);
					foreach($resNum1 as $attr)
					{
						$pp = '';
						/*if($session_industry_ip_work==$attr['classi_id'])
						{
							$pp .= 'selected="selected"'; 
						}*/
						$str1 .='<option value='.$attr['ind_id'].' '.$pp.'>'.$attr['industries'].'</option>';
					}	
			}
		}
		echo json_encode(array('resstr'=>$str,'resstr1'=>$str1,'which'=>$which));
	}
	
	public function ajaxsetpackagename()
	{
		$package_name=$_POST['package_name'];
		$this->session->set_userdata('session_package_name',$package_name);
		if($this->session->userdata('session_package_name'))
		{
			 $session_package_name=$this->session->userdata('session_package_name');
		} 
		echo json_encode(array('res'=>$session_package_name));exit;
	}
	
	public function ajaxgetindustryofusageofIPwork()
	{
		$ip_work_type=$_POST['ip_work_type'];
		$ip_work_object=$_POST['ip_work_object'];
		$str1='';
		
	
			$resNum1=$this->Questionnaire_model->getajaxbyipworkusage($ip_work_type,$ip_work_object);
			if(count($resNum1)>0)
			{
					$str1 .='<option value="">--Select--</option>';
					//print_r($arrattributemaster);
					foreach($resNum1 as $attr)
					{
						$pp = '';
						/*if($session_industry_ip_work==$attr['classi_id'])
						{
							$pp .= 'selected="selected"'; 
						}*/
						$str1 .='<option value='.$attr['usage_id'].' '.$pp.'>'.$attr['usage'].'</option>';
					}	
			}
			else
			{
				$resNum2=$this->Questionnaire_model->getajaxbyipworkusage(0,0);
				if(count($resNum2)>0)
				{
						$str1 .='<option value="">--Select--</option>';
						//print_r($arrattributemaster);
						foreach($resNum2 as $attr)
						{
							$pp = '';
							/*if($session_industry_ip_work==$attr['classi_id'])
							{
								$pp .= 'selected="selected"'; 
							}*/
							$str1 .='<option value='.$attr['usage_id'].' '.$pp.'>'.$attr['usage'].'</option>';
						}	
				}
			}	
		
		echo json_encode(array('resstr1'=>$str1));
	}
}
