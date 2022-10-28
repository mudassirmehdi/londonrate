<?php
/*ini_set("display_errors",1);
error_reporting(E_ALL);*/
require(APPPATH.'/libraries/REST_Controller.php');
class Home extends REST_Controller {

		public function __construct()
		{
	    	parent::__construct();
			date_default_timezone_set('Asia/Kolkata');
			$this->load->model('apilondonrtedels/Homemodel');
			$this->load->helper('url');
		} 

		public function dashboard_post()
		{
		  	$token 				= $this->input->post("token");
			$applicant_id		= $this->input->post("applicant_id");
			

			if($token == TOKEN)
			{
					/*load package list*/
					$arrpackages   = $this->Homemodel->getAllPackagelist();
					$arrPackagelist=array();
					if(isset($arrpackages) && count($arrpackages)>0)
					{
						foreach($arrpackages as $k)
						{
							$arrPackagelist[]=array('pack_manage_id'=>$k['pack_manage_id'],
													'package_name'=>$k['package_name'],
													'full_description'=>stripslashes($k['full_description']),
													'short_description'=>stripslashes($k['description']),
													'amount'=>$k['amount'],
													'package_star'=>$k['package_star']
													);
						}
					}
					/* end of package listing*/

					
					$arrBanners   = $this->Homemodel->getAllBanners();
			//echo $this->db->last_query();exit;
					$arrDisBanners=array();

					if(isset($arrBanners) && COUNT($arrBanners)>0)
					{
						foreach($arrBanners as $k)
						{
							$strBannersImage = '';

							if($k['banner_image']!="")
							{
								$strBannersImage=base_url()."uploads/banners/".$k['banner_image'];
							}
							$arrDisBanners[] = array(
												"banner_id"=>$k['banner_id'],
												"banner_image"=>$strBannersImage,
												"banner_type"=>$k['banner_type'],
												"banner_title"=>$k['banner_title']
											);							
						}
					}
					
					/*load iptype list*/
					$arriptypes   = $this->Homemodel->getAllIPtypelist();
					$arrIPTypelist=array();
					if(isset($arriptypes) && count($arriptypes)>0)
					{
						foreach($arriptypes as $k)
						{
							$arrIPTypelist[]=array('typeid'=>$k['typeid'],
													'type'=>$k['type']
													);
						}
					}
					/* end of iptype listing*/
					$data['packages'] = $arrPackagelist;
					$data['iptype'] = $arrIPTypelist;
					$data['banners'] = $arrDisBanners;
					$data['responsemessage'] = 'Listing of Packages.';
					$data['responsecode'] = "200";
					$response_array=json_encode($data);

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
	
	
	public function getcountry_post()
		{
		  	$token 				= $this->input->post("token");
			$applicant_id		= $this->input->post("applicant_id");
			

			if($token == TOKEN)
			{
				if($applicant_id>0)
				{
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
					$data['responsemessage'] = 'Listing of Packages.';
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