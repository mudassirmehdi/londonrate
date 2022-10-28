<?php
/*ini_set("display_errors",1);
error_reporting(E_ALL);*/
require(APPPATH.'/libraries/REST_Controller.php');
class Sixiptype extends REST_Controller {

		public function __construct()
		{
	    	parent::__construct();
			date_default_timezone_set('Asia/Kolkata');
			$this->load->model('apilondonrtedels/Sixiptypemodel');
			$this->load->helper('url');
		} 

		public function getsixiptype_post()
		{
		  	$token 				= $this->input->post("token");
			$typeid		= $this->input->post("typeid");
			$applicant_id		= $this->input->post("applicant_id");

			if($token == TOKEN)
			{
				if($applicant_id!="")
				{
					if($typeid>0)
					{
						/*load ip type list - type of mobile applications*/
						$arriptype   = $this->Sixiptypemodel->getAllIPTypelist($typeid);
						#echo $this->db->last_query();exit;
						$arrTypelist=array();
						if(isset($arriptype) && count($arriptype)>0)
						{
							foreach($arriptype as $k)
							{
								$arrTypelist[]=array('iptype_id'=>$k['iptype_id'],
														'iptype_name'=>$k['iptype_name']
														);
							}
						}
						/* end of ip type listing- type of mobile applications*/
						
							/*load IP Certificate*/
						$arrcertificatetype   = $this->Sixiptypemodel->getAllIPCertificatelist($typeid);
						$arrCertificatelist=array();
						if(isset($arrcertificatetype) && count($arrcertificatetype)>0)
						{
							foreach($arrcertificatetype as $k1)
							{
								$cert_id=$k1['cert_id'];
								
														
								/*load Protected industries*/
								$arrprotectedlist   = $this->Sixiptypemodel->getAllProtectedIndustrieslist($cert_id,$typeid);
								$arrProtectedInduslist=array();
								if(isset($arrprotectedlist) && count($arrprotectedlist)>0)
								{
									foreach($arrprotectedlist as $k)
									{
										$arrProtectedInduslist[]=array('ind_id'=>$k['ind_id'],
																'ind_name'=>$k['ind_name']
																);
									}
								}
								/* end of Protected industries*/	
								
								$arrCertificatelist[]=array('cert_id'=>$k1['cert_id'],
														'cert_name'=>$k1['cert_name'],
														'arrProtectedInduslist'=>$arrProtectedInduslist
														);								
							}
						}
						/* end of IP Certificate*/

						/*load Coverage*/
						$arrcoveragelist   = $this->Sixiptypemodel->getAllCoveragelist($typeid);
						$arrCoveragelist=array();
						if(isset($arrcoveragelist) && count($arrcoveragelist)>0)
						{
							foreach($arrcoveragelist as $k)
							{
								$arrCoveragelist[]=array('coverage_id'=>$k['coverage_id'],
														'coverage_name'=>$k['coverage_name']
														);
							}
						}
						/* end of Coverage*/	
						
						
						/*load right sholders*/
						$arrrightlist   = $this->Sixiptypemodel->getAllRightsholderslist($typeid);
						$arrRightSholderslist=array();
						if(isset($arrrightlist) && count($arrrightlist)>0)
						{
							foreach($arrrightlist as $k)
							{
								$arrRightSholderslist[]=array('rholder_id'=>$k['rholder_id'],
														'rholder_name'=>$k['rholder_name']
														);
							}
						}
						/* end of right sholders*/	
						
						/*load total sales, monthly*/
						$arrTotalsaleslist=array();
						$arrTotalsaleslist[]=array('Totalsales_id'=>'0-10000','values'=>"$0 - $10,000");
						$arrTotalsaleslist[]=array('Totalsales_id'=>'10001-100000','values'=>"$10,001 - $100,000");
						$arrTotalsaleslist[]=array('Totalsales_id'=>'100001-500000','values'=>"$100,001 - $500,000");
						$arrTotalsaleslist[]=array('Totalsales_id'=>'500001-1000000','values'=>"$500,001 - $1,000,000");
						$arrTotalsaleslist[]=array('Totalsales_id'=>'1000001-3000000','values'=>"$100,001 - $3,000,000");
						$arrTotalsaleslist[]=array('Totalsales_id'=>'3000001-5000000','values'=>"$3000,001 - $5,000,000");
						$arrTotalsaleslist[]=array('Totalsales_id'=>'5000001-5000000','values'=>"$5000,001 - $10,000,000");
						$arrTotalsaleslist[]=array('Totalsales_id'=>'10000001-5000000','values'=>"$10000,001 - $25,000,000");
													 
							
						/* end of total sales, monthly*/	
						
						/*load net profit , monthly*/
						$arrNetProfitMonthlylist=array();
						/*$arrNetProfitMonthlylist[]=array('0-10000'=>"$0 - $10,000",
													'10001-100000'=>"$10,001 - $100,000",
													'100001-500000'=>"$100,001 - $500,000",
													'500001-1000000'=>"$500,001 - $1,000,000",
													'1000001'=>"$1,000,001 and More");*/
						$arrNetProfitMonthlylist[]=array('NetProfitMonthly_id'=>'0-10000','values'=>"$0 - $10,000");
						$arrNetProfitMonthlylist[]=array('NetProfitMonthly_id'=>'10001-100000','values'=>"$10,001 - $100,000");
						$arrNetProfitMonthlylist[]=array('NetProfitMonthly_id'=>'100001-500000','values'=>"$100,001 - $500,000");
						$arrNetProfitMonthlylist[]=array('NetProfitMonthly_id'=>'500001-1000000','values'=>"$500,001 - $1,000,000");
						$arrNetProfitMonthlylist[]=array('NetProfitMonthly_id'=>'1000001','values'=>"$1,000,001 and More");
						

						
						/* end of total sales, monthly*/	
						
						/*load how old,company*/
						$arrHowOldlist=array();
						/*$arrHowOldlist[]=array('0-1'=>"0-1",
													'2-5'=>"2-5",
													'6-10'=>"6-10",
													'11-30'=>"11-30",
													'31-70'=>"31-70");*/
						$arrHowOldlist[]=array('HowOld_id'=>'0-1','values'=>"0-1");
						$arrHowOldlist[]=array('HowOld_id'=>'2-5','values'=>"2-5");
						$arrHowOldlist[]=array('HowOld_id'=>'6-10','values'=>"6-10");
						$arrHowOldlist[]=array('HowOld_id'=>'11-30','values'=>"11-30");
						$arrHowOldlist[]=array('HowOld_id'=>'31','values'=>"31 and More");

						
						/* end of how old,company*/	
						
						/*load marketing budget*/
						$arrMarketingBudgetlist=array();
						/*$arrMarketingBudgetlist[]=array('0-1000'=>"$0 - $1000",
													'1001-5000'=>"$1001 - $5,000",
													'5001-10000'=>"$5001 - $10,000",
													'10001-100000'=>"$10,001 - $100,000",
													'100001-500000'=>"$100,001 - $500,000",
													'500001-1000000'=>"$500,001 - $1,000,000",
													'1000001-3000000'=>"$1,000,001 - $3,000,000",
													'3000001-5000000'=>"$3,000,001 - $5,000,000",
													'5000001-10000000'=>"$5,000,001 - $10,000,000",
													'10000001-25000000'=>"$10,000,001 - $25,000,000");*/
						
						$arrMarketingBudgetlist[]=array('MarketingBudget_id'=>'0-1000','values'=>"$0 - $1000");
						$arrMarketingBudgetlist[]=array('MarketingBudget_id'=>'1001-5000','values'=>"$1001 - $5,000");
						$arrMarketingBudgetlist[]=array('MarketingBudget_id'=>'5001-10000','values'=>"$5001 - $10,000");
						$arrMarketingBudgetlist[]=array('MarketingBudget_id'=>'10001-100000','values'=>"$10,001 - $100,000");$arrMarketingBudgetlist[]=array('MarketingBudget_id'=>'100001-500000','values'=>"$500,001 - $1,000,000");
						$arrMarketingBudgetlist[]=array('MarketingBudget_id'=>'1000001-3000000','values'=>"$1,000,001 - $3,000,000");
						$arrMarketingBudgetlist[]=array('MarketingBudget_id'=>'3000001-5000000','values'=>"$3,000,001 - $5,000,000");
						$arrMarketingBudgetlist[]=array('MarketingBudget_id'=>'5000001-10000000','values'=>"$5,000,001 - $10,000,000");
						$arrMarketingBudgetlist[]=array('MarketingBudget_id'=>'10000001-25000000','values'=>"$10,000,001 - $25,000,000");
						
						/* end of marketing budget*/	
						
						/*load salaries monthly*/
						$arrSalariesMonthlylist=array();
						/*$arrSalariesMonthlylist[]=array('0-1000'=>"$0 - $1,000",
													'1001-5000'=>"$1001 - $5,000",
													'5001-10000'=>"$5001 - $10,000",
													'10001-100000'=>"$10,001 - $100,000",
													'100001-500000'=>"$100,001 - $500,000",
													'500001-1000000'=>"$500,001 - $1,000,000",
													'1000001'=>"$1,000,001 and More");*/
						
						$arrSalariesMonthlylist[]=array('SalariesMonthly_id'=>'0-1000','values'=>"$0 - $1,000");
						$arrSalariesMonthlylist[]=array('SalariesMonthly_id'=>'1001-5000','values'=>"$1001 - $5,000");
						$arrSalariesMonthlylist[]=array('SalariesMonthly_id'=>'5001-10000','values'=>"$5001 - $10,000");
						$arrSalariesMonthlylist[]=array('SalariesMonthly_id'=>'10001-100000','values'=>"$10,001 - $100,000");
						$arrSalariesMonthlylist[]=array('SalariesMonthly_id'=>'100001-500000','values'=>"$100,001 - $500,000");
						$arrSalariesMonthlylist[]=array('SalariesMonthly_id'=>'500001-1000000','values'=>"$500,001 - $1,000,000");
						$arrSalariesMonthlylist[]=array('SalariesMonthly_id'=>'1000001','values'=>"$1,000,001 and More");
						
						/* end of salaries monthly*/	
					
					
						$data['arrTypelist'] = $arrTypelist;
						$data['arrCertificatelist'] = $arrCertificatelist;
						$data['arrCoveragelist'] = $arrCoveragelist;
						#$data['arrProtectedInduslist'] = $arrProtectedInduslist;
						$data['arrRightSholderslist'] = $arrRightSholderslist;
						$data['arrTotalsaleslist'] = $arrTotalsaleslist;
						
						$data['arrNetProfitMonthlylist'] = $arrNetProfitMonthlylist;
						$data['arrHowOldlist'] = $arrHowOldlist;
						$data['arrMarketingBudgetlist'] = $arrMarketingBudgetlist;
						$data['arrSalariesMonthlylist'] = $arrSalariesMonthlylist;
						
						$data['responsemessage'] = 'Listing of Data.';
						$data['responsecode'] = "200";
						$response_array=json_encode($data);
					}
					else
					{
						$num = array('responsemessage' => 'IP type is not found',
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


	public function calculatesixiptype_post()
	{
		$token 				= $this->input->post("token");
		$typeid		= $this->input->post("typeid");
		$striptype_id	=	$this->input->post('iptype_id');
		$strIpCertificates = $this->input->post('ipcertificates');
		$strIndustry = $this->input->post('industry'); 
		$strCoverage = $this->input->post('coverage');
		$strRHolder = $this->input->post('rholder');
		$strSales = $this->input->post('sales');
		$strProfit = $this->input->post('profit');
		$strCYears = $this->input->post('cyears');
		$strMarketing = $this->input->post('marketing');
		$strSalaries = $this->input->post('salaries');
		$applicant_id = $this->input->post('applicant_id');

		if($token == TOKEN)
		{
			if($applicant_id!="")
			{
				if($typeid>0)
				{
					if($striptype_id=="" || $strIpCertificates=="" || $strIndustry=="" || $strCoverage=="" || $strRHolder=="" || $strSales=="" || $strProfit=="" || $strCYears=="" || $strMarketing=="" || $strSalaries=="")
					{
						$num = array('responsemessage' => 'Details are required',
						'responsecode' => "204"
							); //create an array

						$obj = (object)$num;
						$response_array=json_encode($obj);
					}
					else
					{
						$arrSales  = explode("-",$strSales);
						if(is_array($arrSales))
						{
							$strSalesValue = round(array_sum($arrSales)/count($arrSales));
						}	
						
						$arrMarketing  = explode("-",$strMarketing);
						if(is_array($arrMarketing))
						{
							$strMarketingValue = round(array_sum($arrMarketing)/count($arrMarketing));
						}
					
						$arrSalaries  = explode("-",$strSalaries);
						if(is_array($arrSalaries))
						{
							$strSalariesValue = round(array_sum($arrSalaries)/count($arrSalaries));
						}
						
						$arrProfit  = explode("-",$strProfit);
						if(is_array($arrProfit))
						{
							$strProfitValue = round(array_sum($arrProfit)/count($arrProfit));
						}
					
						$arrCYears  = explode("-",$strCYears);
						if(is_array($arrCYears))
						{
							$intYear = array_sum($arrCYears)/count($arrCYears);
							$arrCYearsValue = $this->Sixiptypemodel->fnGetYearValue($intYear);
							$strCYearsValue = $arrCYearsValue[0]['mob_value'];
						}
						if($strIndustry >0)
						{
							$arrIndValue = $this->Sixiptypemodel->fnGetIndustryValue($strIndustry,$typeid);				 
							$strIndustryValue = $arrIndValue[0]['ipvalue'];
						}
						if($strCoverage >0)
						{
							$arrCoverageValue = $this->Sixiptypemodel->fnGetCoverageValue($strCoverage,$typeid);
							$strCoverageValue = $arrCoverageValue[0]['cov_value'];
							#print $this->db->last_query(); exit;
						}
						if($strRHolder >0)
						{
							$arrRHolderValue = $this->Sixiptypemodel->fnGetRHolderValue($strRHolder,$typeid);
							#print $this->db->last_query(); exit;
							$strRHolderValue = $arrRHolderValue[0]['rholder_value'];
						}
						if($strIpCertificates >0)
						{
							$arrIpCertificatesValue = $this->Sixiptypemodel->fnGetCertificateValue($strIpCertificates,$typeid);
							$strIpCertificatesValue = $arrIpCertificatesValue[0]['cert_value'];
						}
						if($strMobApp >0)
						{
							$arrIptypeIndValue = $this->Sixiptypemodel->fnGetIndustryIptypeValue($strMobApp,$ipType);
							$strMobAppValue = $arrIptypeIndValue[0]['ipvalue'];
						}
						
					$strMultiple =   (($strMarketingValue*2.4) * (($strCYearsValue  * $strMobAppValue * $strIpCertificatesValue * $strIndustryValue * $strRHolderValue * $strCoverageValue)));
					 
					$strAddVal = ($strProfitValue * 1.7) + ($strSalesValue/12) + ($strSalariesValue*1.8);
					$str1Val =  round($strAddVal + $strMultiple);
					#print "$strMarketingValue => $strCYearsValue => $strMobAppValue=> $strIpCertificatesValue=> $strIndustryValue=> $strRHolderValue=> $strCoverageValue <br> "; 
					#print "$strProfitValue => $strSalesValue => $strSalariesValue <br>"; 
					#print "$strAddVal => $strMultiple => $str1Val"; 
		 
								 
					#print $strTable; EXIT;			 
					$arrBenefits =array(
										"Market Value of IP",
										"Investment Value of IP",
										"Capitalization of Costs for Business & IP Development",
										"Reimbursements for Defamation",
										"Royalty Income (annual)",
										"Debts Clearance using IP-assets instead of Money",
										"Amount for Bank Compliance Verification (for money transfer)",
										"Increasing Net Assets of the Company",
										"Value of Business Reputation",
										"Valuation for IPO, ICO",
										"Increasing Company's Founding (Registered, Authorized) Capital",
										"Bail for Courts, Police, Prosecution Offices",
										"Losses Reduction and Accrued Profit Increasing",
										"Urgent Money Withdrawal during Company Closing (liquidation)",
										"Attraction of Bank and other Commercial Loans",
										);
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
					
					if($str1Val>0)
					{
						for($i=0;$i<15;$i++)
						{
							$strStd = $strMax = "";
							#print "<br>".ARRMOBCONSTANT['H'][$i];	 
							$strStd = ARRMOBCONSTANT['H'][$i];
							$strMax = ARRMOBCONSTANT['I'][$i];
							#print "<br> $i => ". ARRMOBCONSTANT['H'][$i]."=> ". ARRMOBCONSTANT['I'][$i];
							
							$arrValues[] = array
											(
												"benefits"=>"$arrBenefits[$i]",
												"min"=>number_format(round($arrMin[$i])),
												"std"=>number_format(round($arrMin[$i] * $strStd)),
												"max"=>number_format(round($arrMin[$i] * $strMax)),
											);
						}
						
					}
					
						$data['totalmin']=$arrValues[7]['min'];
						$data['totalmax']=$arrValues[7]['max'];
						$data['totalavg']=$arrValues[7]['std'];
						
						$data['arrValues']=$arrValues;
						$data['responsemessage'] = 'Listing of Packages.';
						$data['responsecode'] = "200";
						$response_array=json_encode($data);
					}
				}
				else
				{
					$num = array('responsemessage' => 'IP type is not found',
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
}
 ?>