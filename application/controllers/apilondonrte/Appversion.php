<?php
	require(APPPATH.'/libraries/REST_Controller.php');
	class Appversion extends REST_Controller {

		public function __construct()
		{ 
			parent::__construct();
			date_default_timezone_set('Asia/Kolkata');
			$this->load->model('apimdvsk/Homemodel');
			$this->load->helper('url');
		}
		public function appversion_post()
		{
			$token = $this->input->post('token');
			if($token == TOKEN)
			{
				$arrGetVersion		=	$this->Homemodel->getVersion();	
				 
				if(is_array($arrGetVersion) && count($arrGetVersion)> 0)
				{
					$app_id = $arrGetVersion[0]['app_id'];
					$releasing_date = $arrGetVersion[0]['releasing_date'];
					$version_name = $arrGetVersion[0]['version_name'];
					$addedDate = $arrGetVersion[0]['addedDate'];
					
					$arrVersion = array(
												"app_id"=> $app_id,
												"releasing_date"=> $releasing_date,
												"version_name"=> $version_name,
												"addedDate"=> $addedDate,
											  );
					$datas['data'] = $arrVersion;
					$datas['responsemessage'] = 'Data Saved Successfully';
					$datas['responsecode'] = "200";
					$response_array=json_encode($datas);						  
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
		
		public function updateappversion_post()
		{
			$token = $this->input->post('token');
			$version_name = $this->input->post('version_name');
			if($token == TOKEN)
			{
				$arrAppVersion = array(
										"releasing_date"=>date("Y-m-d"),
										"addedDate"=>date("Y-m-d H:i:s"),
										"version_name"=>$version_name,
									  );
				$arrGetVersion		=	$this->Homemodel->updatesVersion($arrAppVersion);	
				$datas['data'] = $arrAppVersion;
				$datas['responsemessage'] = 'Data Saved Successfully';
				$datas['responsecode'] = "200";
				$response_array=json_encode($datas);
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
		
?>