<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	function __construct()
    {
		// Call the Model constructor
        //$this->load->library('email');
		date_default_timezone_set('Asia/Kolkata');
    }
// ------------------------------------------------------------------------

/**
 * Common Functions Helpers
 * 
 * 
 * @author		CSNS
 * 
 */

// ------------------------------------------------------------------------
function convertsectomin($iSeconds){   $min = intval($iSeconds / 60);    return $min;  
/* return $min . ':' . str_pad(($iSeconds % 60), 2, '0', STR_PAD_LEFT); */
}

if ( ! function_exists('get_lat_long'))
{
	function get_lat_long($address)
	{
		$arrReturn = array();
		if ($address != "")
		{	
			$address = str_replace(" ", "+", $address);
			$str="https://maps.google.com/maps/api/geocode/json?address=$address&sensor=false&key=AIzaSyD7CJZzaVXcO18AfuhbZkKzw7P2MKuivm8"; 
			$json = file_get_contents($str);
			$json = json_decode($json);

			$lat = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
			$long = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};
			
			$city = $json->{'results'}[0]->{'address_components'}[3]->{'long_name'};
			$state = $json->{'results'}[0]->{'address_components'}[4]->{'long_name'};
			$country = $json->{'results'}[0]->{'address_components'}[5]->{'long_name'};
			$zipcode = $json->{'results'}[0]->{'address_components'}[6]->{'long_name'};
			 
			
			$arrReturn['latitude'] = $lat;
			$arrReturn['longitude'] = $long;
			$arrReturn['city'] = $city;
			$arrReturn['state'] = $state;
			$arrReturn['country'] = $country;
			$arrReturn['zipcode'] = $zipcode; //exit;
			//return $lat.','.$long;	
		}
		return $arrReturn;
	}
}

function create_thumb($width,$height,$file_path)
	{
		$ci = get_instance();
		$ci->load->library('image_lib');
        $config['image_library'] = 'gd2';
        $config['source_image'] = $file_path; 
		$config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = $width;
        $config['height'] = $height;
        $config['new_image'] = $file_path;               
        $ci->image_lib->initialize($config);
        if(!$ci->image_lib->resize())
        { 
            echo $ci->image_lib->display_errors();exit;
        }     
	}
	function fnSendEmail($strMessage, $user_email,$strSubjectMessage)
	{
		$config = array();
		$config['useragent']           = "CodeIgniter";
		$config['mailpath']            = "/usr/bin/sendmail"; // or "/usr/sbin/sendmail"
		$config['protocol']            = "smtp";
		$config['smtp_host']           = "localhost";
		$config['smtp_port']           = "25";
		$config['mailtype'] 		   = 'html';
		$config['charset']  		   = 'utf-8';
		$config['newline']  		   = "\r\n";
		$config['wordwrap'] 		   = TRUE;
		$ci = get_instance();
		
		$ci->load->library('email');
						
		
			//echo $message;exit;
	
			$ci->load->library('email', $config);
			$ci->email->set_newline("\r\n");  
			$ci->email->initialize($config);
			$ci->email->from('sales@nashikproperty.com','NashikProperty.com');
			$ci->email->to($user_email); 
			//$this->email->to("shantilal@nashikproperty.com"); 
			$ci->email->subject($strSubjectMessage);
			$ci->email->message($strMessage); 
			$ci->email->send();
	}
 	
	function smt_send_mail($userEmail,$output_arr,$input_arr)
	{
		
		$ci = get_instance();
		
		$config = array();
		$config['useragent']           = "CodeIgniter";
		$config['mailpath']            = "/usr/bin/sendmail"; 
		$config['protocol']            = "smtp";
		$config['smtp_host']           = "localhost";
		$config['smtp_port']           = "25";
		$config['mailtype'] 		   = 'html';
		$config['charset']  		   = 'utf-8';
		$config['newline']  		   = "\r\n";
		$config['wordwrap'] 		   = TRUE;
		
		$ci->load->library('email', $config);		
		$ci->email->initialize($config);
		$ci->email->set_newline("\r\n");  
		//$ci->email->from('info@csns.co.in','londonrate.csns.in');
		$ci->email->from('info@londonrate.org','Londonrate.org');
		$ci->email->to($userEmail); 
		$message = $ci->load->view('emails/'.$output_arr['view_load'],$input_arr,true);
		$ci->email->subject($input_arr['subject_mail']);		
		$ci->email->message($message);
		if($input_arr['pdf_path']!='')
		{
			$ci->email->attach($input_arr['pdf_path']);		
		}
		$str_email=$ci->email->send();				
						
		#$ci->email->initialize($config);
		#$ci->email->set_newline("\r\n");  
		#$ci->email->from($input_arr['admin_email'],'');
		#$ci->email->to($userEmail); 		 
		#$ci->email->subject($input_arr['subject_mail']);
		
		#$ci->email->message($mesg);
		//
		#$str_email=$ci->email->send();
		#print_r($ci->email);exit;
		if($str_email)
		{
			  return true;
		}
		else
		{
			//print_r($ci->email);echo $str_email;exit;
			return false;
		}
	}
	### FUNCTION TO SEND SMS 
	function fnSendSms($strMessage = "", $strMobile= "")
	{ 
		#ini_set("display_errors",1);
		#error_reporting(E_ALL);
		#return "";
		#require FCPATH . '/vendor/twilio/sdk/src/Twilio/autoload.php';
		include_once FCPATH . 'vendor/twilio/src/Twilio/autoload.php';
		#print "in".FCPATH . '/vendor/twilio/sdk/src/Twilio/autoload.php'; exit;
		
		$strMessage = urldecode($strMessage);
		
		$sid    = "ACa5b1772e30a56e369472b12f80a1bda4"; 
		$token  = "5e8cbeb174a5313ce251fa60a47e518c"; 
		try{
			//$twilio = new Client($sid, $token); 
			$client = new Twilio\Rest\Client($sid, $token);
			$twilio_number = "+19514412897";
			$message = $client->messages->create($strMobile, // to $strMobile
							   array(  
										"messagingServiceSid" => "MG14f93b6ed24678e18aebf91c6681690f",      
										"body" => "$strMessage" 
									)
					  );
			return $message->sid;
		}
		catch(exception $e){
			return "";
		}
		
		
	}
	### FUNCTION TO SEND SMS 
	function fnSendSmsTTTTTT($strMessage = "", $strMobile= "")
	{
		return "";	
		#$strUserName = "SHTECH03";
		#$strPassword = "SHTECH123";
		#$strSenderId = "OTPMSG"; 
		#$strUrl = "http://49.50.67.32/smsapi/httpapi.jsp?username=$strUserName&password=$strPassword&from=$strSenderId&to=$strMobile&text=$strMessage";
		
		$strUserName = "kreedak";
		$strPassword = "kreedak";
		$strSenderId = "KREEDO";
		#$strSenderId = "KREDAK";
		$strMobile = $strMobile;
		$strUrl = "http://sms.indiatext.in/api/mt/SendSMS?user=$strUserName&password=$strUserName&senderid=$strSenderId&channel=Trans&DCS=0&flashsms=0&number=$strMobile&text=$strMessage&route=32";
		
		$curl 		 = curl_init() or die("Error"); 		
		curl_setopt($curl, CURLOPT_URL, $strUrl);  // Web service for OTP sending 
		curl_setopt($curl, CURLOPT_RETURNTRANSFER,1); 
		curl_setopt($curl, CURLOPT_HEADER, 0);
		$output = curl_exec($curl); 
		$info = curl_getinfo($curl);		
		curl_close($curl);
		#echo "<pre> $strUrl ";var_dump($output); exit;
	}
	
	### FUNCTION TO SEND SMS WITH EMAIL
	function fnSENDSmSEmail($strMessage = "", $strMobile= "",$userEmail="",$output_arr,$input_arr)
	{
		$strUserName = "cyborgsy";
		$strPassword = "cyborg123";
		$strSenderId = "KREDAK";
		$strMobile = $strMobile;
		 
		$strUrl = "http://49.50.67.32/smsapi/httpapi.jsp?username=$strUserName&password=$strPassword&from=$strSenderId&to=$strMobile&text=$strMessage"; 
	
		$curl 		 = curl_init() or die("Error"); 		
		curl_setopt($curl, CURLOPT_URL, $strUrl);  // Web service for OTP sending 
		curl_setopt($curl, CURLOPT_RETURNTRANSFER,1); 
		curl_setopt($curl, CURLOPT_HEADER, 0);
		$output = curl_exec($curl); 
		$info = curl_getinfo($curl);		
		curl_close($curl);
		echo "<pre>";var_dump($output); exit;
		
		$ci = get_instance();
		$config = Array('protocol' => 'smtp',
								'smtp_host' => 'csns.co.in',
								'smtp_port' => 587,
								'smtp_user' => 'rahul@csns.co.in',
								'smtp_pass' => 'csns123$',
								'mailtype'  => 'html', 
								'charset'   => 'iso-8859-1'
								);
					
		$ci->email->set_newline("\r\n");  
		$ci->email->initialize($config);
		$ci->email->from('mayur@csns.co.in','Kreedak');//$input_arr['admin_email']
		$ci->email->to($userEmail); 		 
		$ci->email->subject($input_arr['subject_mail']);
		
		$mesg = $ci->load->view('email/'.$output_arr['view_load'],$input_arr,true);
		
		$ci->email->message($mesg);
		//
		$str_email=$ci->email->send();
		print_r($ci->email);exit;
		if($str_email)
		{
			  return true;
		}
		else
		{
			//print_r($this->email);echo $str;exit;
			return false;
		}
	}
	
	
	//Common pagination
	//Function for common pagination code
   	function commonPagination($base = '',$count_user = '',$uri = '')
   	{
    	$config = array();
        $config["base_url"] = $base;
        $config["total_rows"] = $count_user;

    	// Number of items you intend to show per page.
        $config["per_page"] = 10;

        //Set that how many number of pages you want to view.
        if(!empty($uri)) {
        	$config["uri_segment"] = $uri;
        }
        else {
        	$config["uri_segment"] = 3;
        }
        // Open tag for CURRENT link.
        $config['cur_tag_open'] = '&nbsp;<a class="current">';

        // Close tag for CURRENT link.
        $config['cur_tag_close'] = '</a>';

        // By clicking on performing NEXT pagination.
        $config['next_link'] = 'Next';

        // By clicking on performing PREVIOUS pagination.
        $config['prev_link'] = 'Previous';

        return $config;
  	}

  	function fnchecktoken($agent_id, $login_token)
	{
		$CI =& get_instance();
        $CI->db->from('tb_users');
        $CI->db->where('id',$agent_id);
        $CI->db->where('login_token',$login_token);
        $query = $CI->db->get();
        $count = $query->row();

        if (count($count) == '1')
        {
        	return 'TRUE';
        }
        else
        {
        	return 'FALSE';
        }	
	}
	
	
if ( ! function_exists('fnSendNotification'))
{
	function fnSendNotification($strTitle, $strMessage, $arrGcmID, $arrData=array()) 
	{
		$msg = array(
						'message' => "$strMessage",
						'contentTitle' => "$strTitle", 
						'order_id' => $order_id, 
						'order_no' =>  $order_no, 
						'order_date' => $order_date, 
						'oreder_by' => $oreder_by, 
						'order_status' => $order_status, 
						'order_amount' => $order_amount, 
						'user_role' =>$user_role, 
						'vibrate' => 1, 
						'sound' => 1, 
						'status' => "$status1"
					);
		
			$fields = array(
							'registration_ids' => $arrGcmID,
							//'notification' 	   => array('title' => $strTitle, 'body' => $strMessage,'sound'=>'Default', 'data'=>$msg),
							'priority' 		   => 'high',
							'data' 			   => $msg,
							);
			//echo "<pre>"; print_r( $fields ); //die;
			define('FIREBASE_API_KEY', 'AAAAPkZ_Lm4:APA91bHWkzgcvuzslY6EyXT_vBtwulp3Sfclzaf8PifPJs2B-kSft-00tq1M18uzANpwa4IGHXs0zo-R6MBH_n3kd-Ud3REl_1S9j-ZnfplB-pCiWL-g-P1gZUviAwHF6o_a0sVWvCWQ');
			//define( 'FIREBASE_API_KEY', 'AIzaSyD3JzXow72jcze-PvQevko5KWNsgjLvuQ0' );
			//firebase server url to send the curl request
			$url = 'https://fcm.googleapis.com/fcm/send';
			 //building headers for the request
			$headers = array(
				'Authorization: key=' . FIREBASE_API_KEY,
				'Content-Type: application/json'
			);
	 
			//Initializing curl to open a connection
			$ch = curl_init();
	 
			//Setting the curl url
			curl_setopt($ch, CURLOPT_URL, $url);
			
			//setting the method as post
			curl_setopt($ch, CURLOPT_POST, true);
	 
			//adding headers 
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	 
			//disabling ssl support
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			
			#print json_encode($fields);
			//adding the fields in json format 
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
	 
			//finally executing the curl request 
			$result = curl_exec($ch);
			//var_dump($result); exit;
			if ($result === FALSE) 
			{
				die('Curl failed: ' . curl_error($ch));
			}
			//Now close the connection
			curl_close($ch);
			#print_r($fields); 
			#print_r($result);exit;	 
			//and return the result 
			return $result;
	}
}	

function fnSendNotificationALL($strTitle, $strMessage, $arrGcmID, $msg) 
		{
			
				$fields = array(
					'registration_ids' => $arrGcmID,
					'data' => $msg,
				);
				
				//echo "<pre>"; print_r( $fields ); //die;
				define('FIREBASE_API_KEY', 'AAAAuDMnQjA:APA91bFww0T5ROAZEluSPbnjz4Y6yXybZiSJbrAhFPzXVYhRvc9GbbAUN49eGL97Glr0hmmM_jByfQi2IttroEvAPyYC1t171ZRVxrMQ3QGXbGX7hD63EvqUW2y5cm3MxsTxj3FRiTm7');
				//define( 'FIREBASE_API_KEY', 'AIzaSyD3JzXow72jcze-PvQevko5KWNsgjLvuQ0' );
				//firebase server url to send the curl request
				$url = 'https://fcm.googleapis.com/fcm/send';
				 //building headers for the request
				$headers = array(
					'Authorization: key=' . FIREBASE_API_KEY,
					'Content-Type: application/json'
				);
		 
				//Initializing curl to open a connection
				$ch = curl_init();
		 
				//Setting the curl url
				curl_setopt($ch, CURLOPT_URL, $url);
				
				//setting the method as post
				curl_setopt($ch, CURLOPT_POST, true);
		 
				//adding headers 
				curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		 
				//disabling ssl support
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
				
				#print json_encode($fields);
				//adding the fields in json format 
				curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
		 
				//finally executing the curl request 
				$result = curl_exec($ch);
				//var_dump($result); exit;
				if ($result === FALSE) 
				{
					die('Curl failed: ' . curl_error($ch));
				} 
				//Now close the connection
				curl_close($ch);
				#print_r($result);exit;	
				//and return the result 
				return $result;
		}
		
		
	function random_strings($length_of_string) 
	{ 
		$str_result = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890'; 
		return substr(str_shuffle($str_result), 0, $length_of_string); 
	} 	
	
	function Calculatedistance($lat1, $lon1, $lat2, $lon2, $unit) 
	{
	
	  $theta = $lon1 - $lon2;
	  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
	  $dist = acos($dist);
	  $dist = rad2deg($dist);
	  $miles = $dist * 60 * 1.1515;
	  $unit = strtoupper($unit);

	  if ($unit == "K") {
		  return ($miles * 1.609344);
	  } else if ($unit == "N") {
		  return ($miles * 0.8684);
	  } else if ($unit == "nmi") {
		  return ($miles * 59.97662);
	  }else {
		  return $miles;
	  }
	}
	
	function CalculateTime($distance,$speed= 30) 
	{
		#return $distance;
		$hours="00";
		$minutes="00";
		$seconds="00";

		#$time=($hours*3600)+($minutes*60)+$seconds;
		#return $time = ($speed * $distance)/60;
		$time=($distance/$speed);
		$time = $time*(18/5);
		return $time;
		#return $formated=date('i:s', $time);
	}		
	
	function time_elapsed_string($datetime, $full = false) 
	{    
		$now = new DateTime;    $ago = new DateTime($datetime);    $diff = $now->diff($ago);    $diff->w = floor($diff->d / 7);    $diff->d -= $diff->w * 7;    $string = array(        'y' => 'year',        'm' => 'month',        'w' => 'week',        'd' => 'day',        'h' => 'hour',        'i' => 'minute',        's' => 'second',    );    foreach ($string as $k => &$v) {        if ($diff->$k) {            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');        } else {            unset($string[$k]);        }    }    if (!$full) $string = array_slice($string, 0, 1);    return $string ? implode(', ', $string) . ' ago' : 'just now';
	}
	
	
	function getallcalculationsoldformat($salaries,$marketing,$sales,$profit,$cyears,$mob_value)
	{
		$strSalaries = $salaries;
		$strMarketing = $marketing;
		$strSales = $sales;
		$strProfit = $profit;
		$strCYears = $cyears;

		$arrSales  = explode("-",$strSales);
			if(is_array($arrSales)){
				$strSalesValue = round(array_sum($arrSales)/count($arrSales));
			}	
		$arrMarketing  = explode("-",$strMarketing);
			if(is_array($arrMarketing)){
				$strMarketingValue = round(array_sum($arrMarketing)/count($arrMarketing));
			}
			
		$arrSalaries  = explode("-",$strSalaries);
		if(is_array($arrSalaries)){
			$strSalariesValue = round(array_sum($arrSalaries)/count($arrSalaries));
		}
		$arrProfit  = explode("-",$strProfit);
		if(is_array($arrProfit)){
			$strProfitValue = round(array_sum($arrProfit)/count($arrProfit));
		}
		
		$arrCYears  = explode("-",$strCYears);
		if(is_array($arrCYears)){
			$intYear = array_sum($arrCYears)/count($arrCYears);
			#$arrCYearsValue = $this->Iptype_model->fnGetYearValue($intYear);
			$strCYearsValue = $mob_value;
		}
		
		$arrBenefits =array(
								"Costs Capitalization (annual)",
								"Market Valuation for Financial statements",
								"Bank loans, mortgage for leasing transactions  (using 100% IP-assets as collateral)",								
								"Attraction of investments (sale 20% ownership of IP-assets)",
								"Attraction of commercial loans (using 100% IP-assets as collateral)",								
								"Attraction of investments (sale 20% ownership of IP-assets on IP-Exchange - www.ip-maris.com)",							
								"Royalty Income (annual)",
								"Reimbursements for defamation",
								"Debts clearance using IP instead of money",
								"Losses reduction & Profit increasing",
								"Money withdrawal during liquidation",
								"Reimbursements for trade secret disclosure",
								"Reimbursements for unfair competition",
								"Income source verification for banks and official bodies",
								"Contribution as an investments into business project",
								"Inceasing of net assets of the company",
								"Bail for courts, police, prosecution offices",
								"Business reputation (valuation)",
								"Valuation for M&A transactions",
								"Valuation for Smart-Inheritance transactions",
								"Part of money for receiving by divorce",
								"Golden parachute (compensation payments due to hidden requirements)",
								"Valuation for IPO, ICO",
								"Increasing founding (authorized) capital",
								"Smart-HR payments (instead of salary)",
								
								);
		/*$strSalariesValue = 10003;
		$strProfitValue = 500002;
		$strMarketingValue = 20003;
		$strCYearsValue = 7;
		$strSalesValue = 10000002;*/
						
		$strMin1Value  = $strSalariesValue/2.8 * 12 ;//55						
		
		
		$str21 =$strSalesValue * 12/3;
		$str22 =(($strProfitValue/2) *12) ;
		$str23 =$strMarketingValue *6.2 ;
		$str24 =$strCYearsValue * 0.11;
		 
		$strMin2Value = round(($str21 + $str22 + $strMin1Value + $str23) * $str24);
		$strMin3Value  =  $strMin1Value/3.9 + $strProfitValue/2.1;
		$strMin4Value  =  $strMin2Value/7.2;
		$strMin5Value  =  $strMin4Value*1.96;
		$strMin6Value  =  $strMin4Value*1.35;		
		$strMin7Value  =  $strMin1Value*0.41 +$strProfitValue *12/7.2;
		$strMin8Value  =  $strMin2Value*0.07;
		$strMin9Value  =  $strMin1Value*0.71;
		$strMin10Value =  $strMin1Value + $strMin102;
		$strMin10Value =  $strMin1Value + ($strMarketingValue * 12/7.3);
		$strMin11Value =  $strMin1Value*1.27;
		$strMin12Value =  $strMin8Value*0.5;
		$strMin13Value =  $strMin2Value/10;
		$strMin14Value =  $strMin7Value*3.4;
		$strMin15Value = $strMin2Value/1.32;
		$strMin16Value = $strMin1Value/0.92+ $strMarketingValue/2 *12;
		$strMin17Value = $strMin3Value/1.3;
		$strMin18Value = $strMin2Value*0.12;
		$strMin19Value = $strMin2Value*0.82;
		$strMin20Value = $strMin2Value*1.21;
		$strMin21Value = $strMin2Value/1.43;
		$strMin22Value = $strMin2Value*1.36;
		$strMin23Value = $strMin2Value*1.18;
		$strMin24Value = $strMin2Value/2.4;
		$strMin25Value = $strMin7Value*2.1;
		
		
		$arrMin =array(
							$strMin1Value,
							$strMin2Value,
							$strMin3Value,
							$strMin4Value,
							$strMin5Value,
							$strMin6Value,
							$strMin7Value,
							$strMin8Value,
							$strMin9Value,
							$strMin10Value,
							$strMin11Value,
							$strMin12Value,
							$strMin13Value,
							$strMin14Value,
							$strMin15Value,
							$strMin16Value,
							$strMin17Value,
							$strMin18Value,
							$strMin19Value,
							$strMin20Value,
							$strMin21Value,
							$strMin22Value,
							$strMin23Value,
							$strMin24Value,
							$strMin25Value,
							
						 );
		
		$arrStd =array(
							$strMin1Value*1.27,
							$strMin2Value*1.27,
							$strMin3Value*1.27,
							$strMin4Value*1.27,
							$strMin5Value*1.27,
							$strMin6Value*1.27,
							$strMin7Value*1.27,
							$strMin8Value*1.27,
							$strMin9Value*1.27,
							$strMin10Value*1.27,
							$strMin11Value*1.27,
							$strMin12Value*1.27,
							$strMin13Value*1.27,
							$strMin14Value*1.27,
							$strMin15Value*1.27,
							$strMin16Value*1.27,
							$strMin17Value*1.27,
							$strMin18Value*1.27,
							$strMin19Value*1.27,
							$strMin20Value*1.27,
							$strMin21Value*1.27,
							$strMin22Value*1.27,
							$strMin23Value*1.27,
							$strMin24Value*1.27,
							$strMin25Value*1.27,
							
						 );
		
		$arrMax =array(
							$arrStd[0]*1.21,
							$arrStd[1]*1.21,
							$arrStd[2]*1.21,
							$arrStd[3]*1.38,
							$arrStd[4]*1.38,
							$arrStd[5]*1.38,
							$arrStd[6]*1.38,
							$arrStd[7]*1.38,
							$arrStd[8]*1.38,
							$arrStd[9]*1.38,
							$arrStd[10]*1.38,
							$arrStd[11]*1.38,
							$arrStd[12]*1.38,
							$arrStd[13]*1.38,
							$arrStd[14]*1.38,
							$arrStd[15]*1.38,
							$arrStd[16]*1.38,
							$arrStd[17]*1.38,
							$arrStd[18]*1.38,
							$arrStd[19]*1.38,
							$arrStd[20]*1.38,
							$arrStd[21]*1.38,
							$arrStd[22]*1.38,
							$arrStd[23]*1.38,
							$arrStd[24]*1.38,
							 
							
						 );
		if($strMin1Value>0)
		{
			$strSumStd = 0;
			for($i=0;$i<25;$i++)
			{
				$strStd = $strMax = "";
				$arrValues[] = array
								(
									"benefits"=>"$arrBenefits[$i]",
									"min"=>round($arrMin[$i]),
									"std"=>round($arrStd[$i]),
									"max"=>round($arrMax[$i]),
								);
				$strSumStd  += 	round($arrStd[$i]);						
			}
			
			$arrValues['avgstd'] = round($strSumStd/25);
			//echo "<pre>";print_r($arrValues);exit;
			$_SESSION['arrValues'] = $arrValues;
		}				 
		return  $arrValues;
		
	}
	function getallcalculations($salaries,$marketing,$sales,$profit,$cyears,$mob_value)
	{
		#echo "<br/>".$salaries;echo "<br/>".$marketing;echo "<br/>".$sales;echo "<br/>".$profit;echo "<br/>".$cyears;echo "<br/>".$mob_value;exit;
		$arrBenefits =array(
								"Market Value of IP <br> <br>",
								"Investment Value of IP <br>",
								"Capitalization of Costs for Business & IP Development",
								"Reimbursements for Defamation <br>",
								"Royalty Income (annual) <br>",
								"Debts Clearance using IP-assets instead of Money",
								"Amount for Bank Compliance Verification (for money transfer)",
								"Increasing Net Assets of the Company <br>",
								"Value of Business Reputation <br>",
								"Valuation for IPO, ICO <br>",
								"Increasing Company's Founding (Registered, Authorized) Capital",
								"Bail for Courts, Police, Prosecution Offices",
								"Losses Reduction and Accrued Profit Increasing",
								"Urgent Money Withdrawal during Company Closing (liquidation)",
								"Attraction of Bank and other Commercial Loans",
								);
		/*$strSalariesValue = 10003;
		$strProfitValue = 500002;
		$strMarketingValue = 20003;
		$strCYearsValue = 7;
		$strSalesValue = 10000002;*/
		//=(E3*1.7)+(E4/12)+(E5*1.8)+(E6*2.4)*F7
		
		$strSalariesValue = $salaries;
		$strMarketingValue = $marketing;
		$strSalesValue = $sales;
		$strProfitValue = $profit;
		$strCYearsValue = $cyears;
		
		#$strMin1Value  = $strSalariesValue/2.8 * 12 ;//55						
		#(E3*1.7)+(E4/12)+(E5*1.8)+(E6*2.4)*F7
		
		$strMultiple =   (($strMarketingValue*2.4) * (($strCYearsValue  * $strMobAppValue * $strIpCertificatesValue * $strIndustryValue * $strRHolderValue * $strCoverageValue)));
		$strAddVal = ($strProfitValue * 1.7) + ($strSalesValue/12) + ($strSalariesValue*1.8);
		
		$str1Val =  round($strAddVal + $strMultiple);
		
		$arrMin =array(
							$str1Val,
							round($str1Val * 1.9),
							round((($strSalariesValue*1.3)+($strMarketingValue/3))),
							$str1Val/20,							 
							$str1Val/8,
							$str1Val/3,							 
							$str1Val * 1.3,							 
							$str1Val * 0.7,							 
							$str1Val * 0.42,							 
							$str1Val * 1.65,							 
							$str1Val * 0.72,							 
							$str1Val/21,
							$str1Val * 0.63,	
							$str1Val * 0.81,	
							$str1Val * 0.41
						 );
						 #echo '<pre>';print_r($arrMin);
		if($str1Val>0)
		{
			$strSumStd = 0;
			for($i=0;$i<15;$i++)
			{
				$strStd = $strMax = "";
				$strStd = ARRMOBCONSTANT['H'][$i]; 
				$strMax = ARRMOBCONSTANT['I'][$i];
				$arrValues[] = array
								(
									"benefits"=>"$arrBenefits[$i]",
									"min"=>round($arrMin[$i]),
									"std"=>round($arrMin[$i] * $strStd),
									"max"=>round($arrMin[$i] * $strMax),
								);
								#echo $i.")".$arrMin[$i] * $strStd; echo '<br/>';
				$newval=$arrMin[$i] * $strStd;
				$strSumStd  += 	round($newval);					
			}
			#echo '<br/>final val: '.$strSumStd;exit;
			$arrValues['avgstd'] = round($strSumStd/15);
			
			//$_SESSION['arrAverageValues'] = $arrValues;
		}				 
		return  $arrValues;
		
	}
	
	function cal_year_age($year_establish)
	{
		$year_establish=date('Y',strtotime($year_establish));
		$todays_date=date('Y');
		$diff = ($todays_date - $year_establish);
		return  $diff;
	}
	
	function getusercountry($userIP)
	{
		// API end URL 
		$apiURL = 'https://freegeoip.app/json/'.$userIP; 
		// Create a new cURL resource with URL 
		$ch = curl_init($apiURL); 
		// Return response instead of outputting 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
 
		// Execute API request 
		$apiResponse = curl_exec($ch); 
 
		// Close cURL resource 
		curl_close($ch); 
 
		// Retrieve IP data from API response 
		$ipData = json_decode($apiResponse, true); 
		$country_code='';
		if(!empty($ipData))
		{ 
			$country_code = $ipData['country_code']; 
			/*$country_name = $ipData['country_name']; 
			$region_code = $ipData['region_code']; 
			$region_name = $ipData['region_name']; 
			$city = $ipData['city']; 
			$zip_code = $ipData['zip_code']; 
			$latitude = $ipData['latitude']; 
			$longitude = $ipData['longitude']; 
			$time_zone = $ipData['time_zone'];*/ 
		}
		return $country_code;
   /*echo 'Country Name: '.$country_name.'<br/>'; 
    echo 'Country Code: '.$country_code.'<br/>'; 
    echo 'Region Code: '.$region_code.'<br/>'; 
    echo 'Region Name: '.$region_name.'<br/>'; 
    echo 'City: '.$city.'<br/>'; 
    echo 'Zipcode: '.$zip_code.'<br/>'; 
    echo 'Latitude: '.$latitude.'<br/>'; 
    echo 'Longitude: '.$longitude.'<br/>'; 
    echo 'Time Zone: '.$time_zone; 
		}else{ 
			echo 'IP data is not found!'; 
		} */
	}

/* End of file csv_helper.php */
/* Location: ./system/helpers/commonfunctions.php */