<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Iptype extends CI_Controller {
	
	public function __construct()
	{
		 parent::__construct();
		 $this->load->library("pagination");
		 $this->load->model('frontModel/Iptype_model');
	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function mobile()
	{
		$arrValues = array();
		$data['arrPost'] = array();
		$data['ipType']=$ipType = 1;	
		if(isset($_POST['btnCalculate']))
		{
			$strMobApp = $this->input->post('mobile_app');
			$strIpCertificates = $this->input->post('ipcertificates');
			$strIndustry = $this->input->post('industry'); 
			$strCoverage = $this->input->post('coverage');
			$strRHolder = $this->input->post('rholder');
			$strSales = $this->input->post('sales');
			$strProfit = $this->input->post('profit');
			$strCYears = $this->input->post('cyears');
			$strMarketing = $this->input->post('marketing');
			$strSalaries = $this->input->post('salaries');
			
			 
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
				$arrCYearsValue = $this->Iptype_model->fnGetYearValue($intYear);
				$strCYearsValue = $arrCYearsValue[0]['mob_value'];
			}
			if($strIndustry >0){
				$arrIndValue = $this->Iptype_model->fnGetIndustryValue($strIndustry,$ipType);				 
				$strIndustryValue = $arrIndValue[0]['ipvalue'];
			}
			if($strCoverage >0){
				$arrCoverageValue = $this->Iptype_model->fnGetCoverageValue($strCoverage,$ipType);
				$strCoverageValue = $arrCoverageValue[0]['cov_value'];
				#print $this->db->last_query(); exit;
			}
			if($strRHolder >0){
				$arrRHolderValue = $this->Iptype_model->fnGetRHolderValue($strRHolder,$ipType);
				#print $this->db->last_query(); exit;
				$strRHolderValue = $arrRHolderValue[0]['rholder_value'];
			}
			if($strIpCertificates >0){
				$arrIpCertificatesValue = $this->Iptype_model->fnGetCertificateValue($strIpCertificates,$ipType);
				$strIpCertificatesValue = $arrIpCertificatesValue[0]['cert_value'];
			}
			if($strMobApp >0){
				$arrIptypeIndValue = $this->Iptype_model->fnGetIndustryIptypeValue($strMobApp,$ipType);
				$strMobAppValue = $arrIptypeIndValue[0]['ipvalue'];
			}
			
			#$strCYearsValue = 2.10;
			#$strMobAppValue = 1.30;
			#$strIpCertificatesValue = 2.12;
			#$strCoverageValue = 1.50;
			#$strIndustryValue = 5.00;
			#$strRHolderValue = 1.30;
			
			
			# print "P: $strProfitValue => SV: $strSalariesValue => SLV: $strSalesValue =>  MKtV: $strMarketingValue => MV: $strMobAppValue=> IP: $strIpCertificatesValue=> IND: $strIndustryValue=> RV: $strRHolderValue=> strCoverageValue: $strCoverageValue";
			  #(E3*1.7)+(E4/12)+(E5*1.8)+(E6*2.4)*F7*F8*F9*F10*F11*F12
			$strMultiple =   (($strMarketingValue*2.4) * (($strCYearsValue  * $strMobAppValue * $strIpCertificatesValue * $strIndustryValue * $strRHolderValue * $strCoverageValue)));
			 
			$strAddVal = ($strProfitValue * 1.7) + ($strSalesValue/12) + ($strSalariesValue*1.8);
			$str1Val =  round($strAddVal + $strMultiple);
			#print "$strMarketingValue => $strCYearsValue => $strMobAppValue=> $strIpCertificatesValue=> $strIndustryValue=> $strRHolderValue=> $strCoverageValue <br> "; 
			#print "$strProfitValue => $strSalesValue => $strSalariesValue <br>"; 
			#print "$strAddVal => $strMultiple => $str1Val"; 
 

			$strTable = "<table> 
						 <tr>
						 <td>Net profit, monthly:<td> 
						 <td>$strProfitValue<td> 
						 </tr> 
						 <tr>
						 <td>Total sales, monthly:<td> 
						 <td>$strSalesValue<td> 
						 </tr> 
						 <tr>
						 <td>Total salaries, monthly:<td> 
						 <td>$strSalariesValue<td> 
						 </tr> 
						 <tr>
						 <td>Total marketing budget, monthly:<td> 
						 <td>$strMarketingValue<td> 
						 </tr> 
						 <tr>
						 <td>How old is the company:<td> 
						 <td>$intYear=>   $strCYearsValue <td> 
						 </tr> 
						 <tr>
						 <td>Type of Mob App:<td> 
						 <td> $strMobApp = >  $strMobAppValue<td> 
						 </tr> 
						 <tr>
						 <td>Type of IP-Certificate:	<td> 
						 <td>$strIpCertificates => $strIpCertificatesValue<td> 
						 </tr> 
						 <tr>
						 <td>Coverage<td> 
						 <td>$strCoverage => $strCoverageValue<td> 
						 </tr> 
						 <tr>
						 <td>Protected Industries:<td> 
						  <td>$strIndustry => $strIndustryValue<td> 
						 </tr> 
						 <tr>
						 <td>Rightsholder<td> 
						 <td>$strRHolder => $strRHolderValue<td> 
						 </tr> 
						 
						 </table>";
						 
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
										"min"=>round($arrMin[$i]),
										"std"=>round($arrMin[$i] * $strStd),
										"max"=>round($arrMin[$i] * $strMax),
									);
				}
				#exit;
				
				$_SESSION['arrAverageValues'] = $arrValues;
			}
			//$data['arrPost'] = $_POST;
			if($_POST['ipcertificates']!="" && $ipType=="")
			{
				$data['protectedindustry'] = $this->Iptype_model->fnGetAllProtectedIndustryValue($ipType,$_POST['ipcertificates']);
			}
		}
		$data['arrIpvalues'] = $arrValues;
		$data['coverage'] = $this->Iptype_model->fnGetAllCoverage($ipType);
		$data['ipindustries'] = $this->Iptype_model->fnGetAllIPIndustries($ipType);
		
		$data['certificate'] = $this->Iptype_model->fnGetAllCertificateValue($ipType);
		$data['rholder'] = $this->Iptype_model->fnGetAllRHolderValue($ipType);
		$data['industry'] = $this->Iptype_model->fnGetAllIndustryValue($ipType);
		
		
		
		$this->load->view('frontheader');
		$this->load->view('mobile-application',$data);
		$this->load->view('frontfooter');
	}
	
	public function technology()
	{
		$arrValues = array();
		$data['arrPost'] = array();
		$data['ipType']=$ipType = 2;
		if(isset($_POST['btnCalculate']))
		{
			$strMobApp = $this->input->post('mobile_app');
			$strIpCertificates = $this->input->post('ipcertificates');
			$strIndustry = $this->input->post('industry'); 
			$strCoverage = $this->input->post('coverage');
			$strRHolder = $this->input->post('rholder');
			$strSales = $this->input->post('sales');
			$strProfit = $this->input->post('profit');
			$strCYears = $this->input->post('cyears');
			$strMarketing = $this->input->post('marketing');
			$strSalaries = $this->input->post('salaries');
			
			 
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
				$arrCYearsValue = $this->Iptype_model->fnGetYearValue($intYear);
				$strCYearsValue = $arrCYearsValue[0]['mob_value'];
			}
			if($strIndustry >0){
				$arrIndValue = $this->Iptype_model->fnGetIndustryValue($strIndustry,$ipType);				 
				$strIndustryValue = $arrIndValue[0]['ipvalue'];
			}
			if($strCoverage >0){
				$arrCoverageValue = $this->Iptype_model->fnGetCoverageValue($strCoverage,$ipType);
				$strCoverageValue = $arrCoverageValue[0]['cov_value'];
				#print $this->db->last_query(); exit;
			}
			if($strRHolder >0){
				$arrRHolderValue = $this->Iptype_model->fnGetRHolderValue($strRHolder,$ipType);
				#print $this->db->last_query(); exit;
				$strRHolderValue = $arrRHolderValue[0]['rholder_value'];
			}
			if($strIpCertificates >0){
				$arrIpCertificatesValue = $this->Iptype_model->fnGetCertificateValue($strIpCertificates,$ipType);
				$strIpCertificatesValue = $arrIpCertificatesValue[0]['cert_value'];
			}
			if($strMobApp >0){
				$arrIptypeIndValue = $this->Iptype_model->fnGetIndustryIptypeValue($strMobApp,$ipType);
				$strMobAppValue = $arrIptypeIndValue[0]['ipvalue'];
			}
			
			#$strCYearsValue = 2.10;
			#$strMobAppValue = 1.30;
			#$strIpCertificatesValue = 2.12;
			#$strCoverageValue = 1.50;
			#$strIndustryValue = 5.00;
			#$strRHolderValue = 1.30;
			
			
			# print "P: $strProfitValue => SV: $strSalariesValue => SLV: $strSalesValue =>  MKtV: $strMarketingValue => MV: $strMobAppValue=> IP: $strIpCertificatesValue=> IND: $strIndustryValue=> RV: $strRHolderValue=> strCoverageValue: $strCoverageValue";
			  #(E3*1.7)+(E4/12)+(E5*1.8)+(E6*2.4)*F7*F8*F9*F10*F11*F12
			$strMultiple =   (($strMarketingValue*2.4) * (($strCYearsValue  * $strMobAppValue * $strIpCertificatesValue * $strIndustryValue * $strRHolderValue * $strCoverageValue)));
			 
			$strAddVal = ($strProfitValue * 1.7) + ($strSalesValue/12) + ($strSalariesValue*1.8);
			$str1Val =  round($strAddVal + $strMultiple);
			#print "$strMarketingValue => $strCYearsValue => $strMobAppValue=> $strIpCertificatesValue=> $strIndustryValue=> $strRHolderValue=> $strCoverageValue <br> "; 
			#print "$strProfitValue => $strSalesValue => $strSalariesValue <br>"; 
			#print "$strAddVal => $strMultiple => $str1Val"; 
 

			$strTable = "<table> 
						 <tr>
						 <td>Net profit, monthly:<td> 
						 <td>$strProfitValue<td> 
						 </tr> 
						 <tr>
						 <td>Total sales, monthly:<td> 
						 <td>$strSalesValue<td> 
						 </tr> 
						 <tr>
						 <td>Total salaries, monthly:<td> 
						 <td>$strSalariesValue<td> 
						 </tr> 
						 <tr>
						 <td>Total marketing budget, monthly:<td> 
						 <td>$strMarketingValue<td> 
						 </tr> 
						 <tr>
						 <td>How old is the company:<td> 
						 <td>$intYear=>   $strCYearsValue <td> 
						 </tr> 
						 <tr>
						 <td>Type of Mob App:<td> 
						 <td> $strMobApp = >  $strMobAppValue<td> 
						 </tr> 
						 <tr>
						 <td>Type of IP-Certificate:	<td> 
						 <td>$strIpCertificates => $strIpCertificatesValue<td> 
						 </tr> 
						 <tr>
						 <td>Coverage<td> 
						 <td>$strCoverage => $strCoverageValue<td> 
						 </tr> 
						 <tr>
						 <td>Protected Industries:<td> 
						  <td>$strIndustry => $strIndustryValue<td> 
						 </tr> 
						 <tr>
						 <td>Rightsholder<td> 
						 <td>$strRHolder => $strRHolderValue<td> 
						 </tr> 
						 
						 </table>";
						 
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
										"min"=>round($arrMin[$i]),
										"std"=>round($arrMin[$i] * $strStd),
										"max"=>round($arrMin[$i] * $strMax),
									);
				}
				#exit;
				$_SESSION['arrValues'] = $arrValues;
			}
			//$data['arrPost'] = $_POST;
			if($_POST['ipcertificates']!="" && $ipType=="")
			{
				$data['protectedindustry'] = $this->Iptype_model->fnGetAllProtectedIndustryValue($ipType,$_POST['ipcertificates']);
			}
		}
		
		
		
		
		$data['arrIpvalues'] = $arrValues;
		$data['coverage'] = $this->Iptype_model->fnGetAllCoverage($ipType);
		$data['ipindustries'] = $this->Iptype_model->fnGetAllIPIndustries($ipType);		
		$data['certificate'] = $this->Iptype_model->fnGetAllCertificateValue($ipType);
		$data['rholder'] = $this->Iptype_model->fnGetAllRHolderValue($ipType);
		$data['industry'] = $this->Iptype_model->fnGetAllIndustryValue($ipType);
		$this->load->view('frontheader');
		$this->load->view('technology-product',$data);
		$this->load->view('frontfooter');
	}

	public function trademark()
	{
		$arrValues = array();
		$data['arrPost'] = array();
		$data['ipType']=$ipType = 3;
		if(isset($_POST['btnCalculate']))
		{
			$strMobApp = $this->input->post('mobile_app');
			$strIpCertificates = $this->input->post('ipcertificates');
			$strIndustry = $this->input->post('industry'); 
			$strCoverage = $this->input->post('coverage');
			$strRHolder = $this->input->post('rholder');
			$strSales = $this->input->post('sales');
			$strProfit = $this->input->post('profit');
			$strCYears = $this->input->post('cyears');
			$strMarketing = $this->input->post('marketing');
			$strSalaries = $this->input->post('salaries');
			
			 
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
				$arrCYearsValue = $this->Iptype_model->fnGetYearValue($intYear);
				$strCYearsValue = $arrCYearsValue[0]['mob_value'];
			}
			if($strIndustry >0){
				$arrIndValue = $this->Iptype_model->fnGetIndustryValue($strIndustry,$ipType);				 
				$strIndustryValue = $arrIndValue[0]['ipvalue'];
			}
			if($strCoverage >0){
				$arrCoverageValue = $this->Iptype_model->fnGetCoverageValue($strCoverage,$ipType);
				$strCoverageValue = $arrCoverageValue[0]['cov_value'];
				#print $this->db->last_query(); exit;
			}
			if($strRHolder >0){
				$arrRHolderValue = $this->Iptype_model->fnGetRHolderValue($strRHolder,$ipType);
				#print $this->db->last_query(); exit;
				$strRHolderValue = $arrRHolderValue[0]['rholder_value'];
			}
			if($strIpCertificates >0){
				$arrIpCertificatesValue = $this->Iptype_model->fnGetCertificateValue($strIpCertificates,$ipType);
				$strIpCertificatesValue = $arrIpCertificatesValue[0]['cert_value'];
			}
			if($strMobApp >0){
				$arrIptypeIndValue = $this->Iptype_model->fnGetIndustryIptypeValue($strMobApp,$ipType);
				$strMobAppValue = $arrIptypeIndValue[0]['ipvalue'];
			}
			
			#$strCYearsValue = 2.10;
			#$strMobAppValue = 1.30;
			#$strIpCertificatesValue = 2.12;
			#$strCoverageValue = 1.50;
			#$strIndustryValue = 5.00;
			#$strRHolderValue = 1.30;
			
			
			# print "P: $strProfitValue => SV: $strSalariesValue => SLV: $strSalesValue =>  MKtV: $strMarketingValue => MV: $strMobAppValue=> IP: $strIpCertificatesValue=> IND: $strIndustryValue=> RV: $strRHolderValue=> strCoverageValue: $strCoverageValue";
			  #(E3*1.7)+(E4/12)+(E5*1.8)+(E6*2.4)*F7*F8*F9*F10*F11*F12
			$strMultiple =   (($strMarketingValue*2.4) * (($strCYearsValue  * $strMobAppValue * $strIpCertificatesValue * $strIndustryValue * $strRHolderValue * $strCoverageValue)));
			 
			$strAddVal = ($strProfitValue * 1.7) + ($strSalesValue/12) + ($strSalariesValue*1.8);
			$str1Val =  round($strAddVal + $strMultiple);
			#print "$strMarketingValue => $strCYearsValue => $strMobAppValue=> $strIpCertificatesValue=> $strIndustryValue=> $strRHolderValue=> $strCoverageValue <br> "; 
			#print "$strProfitValue => $strSalesValue => $strSalariesValue <br>"; 
			#print "$strAddVal => $strMultiple => $str1Val"; 
 

			$strTable = "<table> 
						 <tr>
						 <td>Net profit, monthly:<td> 
						 <td>$strProfitValue<td> 
						 </tr> 
						 <tr>
						 <td>Total sales, monthly:<td> 
						 <td>$strSalesValue<td> 
						 </tr> 
						 <tr>
						 <td>Total salaries, monthly:<td> 
						 <td>$strSalariesValue<td> 
						 </tr> 
						 <tr>
						 <td>Total marketing budget, monthly:<td> 
						 <td>$strMarketingValue<td> 
						 </tr> 
						 <tr>
						 <td>How old is the company:<td> 
						 <td>$intYear=>   $strCYearsValue <td> 
						 </tr> 
						 <tr>
						 <td>Type of Mob App:<td> 
						 <td> $strMobApp = >  $strMobAppValue<td> 
						 </tr> 
						 <tr>
						 <td>Type of IP-Certificate:	<td> 
						 <td>$strIpCertificates => $strIpCertificatesValue<td> 
						 </tr> 
						 <tr>
						 <td>Coverage<td> 
						 <td>$strCoverage => $strCoverageValue<td> 
						 </tr> 
						 <tr>
						 <td>Protected Industries:<td> 
						  <td>$strIndustry => $strIndustryValue<td> 
						 </tr> 
						 <tr>
						 <td>Rightsholder<td> 
						 <td>$strRHolder => $strRHolderValue<td> 
						 </tr> 
						 
						 </table>";
						 
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
										"min"=>round($arrMin[$i]),
										"std"=>round($arrMin[$i] * $strStd),
										"max"=>round($arrMin[$i] * $strMax),
									);
				}
				#exit;
				$_SESSION['arrValues'] = $arrValues;
			}
			//$data['arrPost'] = $_POST;
			if($_POST['ipcertificates']!="" && $ipType=="")
			{
				$data['protectedindustry'] = $this->Iptype_model->fnGetAllProtectedIndustryValue($ipType,$_POST['ipcertificates']);
			}
		}
		$data['arrIpvalues'] = $arrValues;
		$data['coverage'] = $this->Iptype_model->fnGetAllCoverage($ipType);
		$data['ipindustries'] = $this->Iptype_model->fnGetAllIPIndustries($ipType);		
		$data['certificate'] = $this->Iptype_model->fnGetAllCertificateValue($ipType);
		$data['rholder'] = $this->Iptype_model->fnGetAllRHolderValue($ipType);
		$data['industry'] = $this->Iptype_model->fnGetAllIndustryValue($ipType);
		$this->load->view('frontheader');
		$this->load->view('brand-trademark',$data);
		$this->load->view('frontfooter');
	}
	
	public function artwork()
	{
		$arrValues = array();
		$data['arrPost'] = array();
		$data['ipType']=$ipType = 4;
		if(isset($_POST['btnCalculate']))
		{
			$strMobApp = $this->input->post('mobile_app');
			$strIpCertificates = $this->input->post('ipcertificates');
			$strIndustry = $this->input->post('industry'); 
			$strCoverage = $this->input->post('coverage');
			$strRHolder = $this->input->post('rholder');
			$strSales = $this->input->post('sales');
			$strProfit = $this->input->post('profit');
			$strCYears = $this->input->post('cyears');
			$strMarketing = $this->input->post('marketing');
			$strSalaries = $this->input->post('salaries');
			
			 
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
				$arrCYearsValue = $this->Iptype_model->fnGetYearValue($intYear);
				$strCYearsValue = $arrCYearsValue[0]['mob_value'];
			}
			if($strIndustry >0){
				$arrIndValue = $this->Iptype_model->fnGetIndustryValue($strIndustry,$ipType);				 
				$strIndustryValue = $arrIndValue[0]['ipvalue'];
			}
			if($strCoverage >0){
				$arrCoverageValue = $this->Iptype_model->fnGetCoverageValue($strCoverage,$ipType);
				$strCoverageValue = $arrCoverageValue[0]['cov_value'];
				#print $this->db->last_query(); exit;
			}
			if($strRHolder >0){
				$arrRHolderValue = $this->Iptype_model->fnGetRHolderValue($strRHolder,$ipType);
				#print $this->db->last_query(); exit;
				$strRHolderValue = $arrRHolderValue[0]['rholder_value'];
			}
			if($strIpCertificates >0){
				$arrIpCertificatesValue = $this->Iptype_model->fnGetCertificateValue($strIpCertificates,$ipType);
				$strIpCertificatesValue = $arrIpCertificatesValue[0]['cert_value'];
			}
			if($strMobApp >0){
				$arrIptypeIndValue = $this->Iptype_model->fnGetIndustryIptypeValue($strMobApp,$ipType);
				$strMobAppValue = $arrIptypeIndValue[0]['ipvalue'];
			}
			
			#$strCYearsValue = 2.10;
			#$strMobAppValue = 1.30;
			#$strIpCertificatesValue = 2.12;
			#$strCoverageValue = 1.50;
			#$strIndustryValue = 5.00;
			#$strRHolderValue = 1.30;
			
			
			# print "P: $strProfitValue => SV: $strSalariesValue => SLV: $strSalesValue =>  MKtV: $strMarketingValue => MV: $strMobAppValue=> IP: $strIpCertificatesValue=> IND: $strIndustryValue=> RV: $strRHolderValue=> strCoverageValue: $strCoverageValue";
			  #(E3*1.7)+(E4/12)+(E5*1.8)+(E6*2.4)*F7*F8*F9*F10*F11*F12
			$strMultiple =   (($strMarketingValue*2.4) * (($strCYearsValue  * $strMobAppValue * $strIpCertificatesValue * $strIndustryValue * $strRHolderValue * $strCoverageValue)));
			 
			$strAddVal = ($strProfitValue * 1.7) + ($strSalesValue/12) + ($strSalariesValue*1.8);
			$str1Val =  round($strAddVal + $strMultiple);
			#print "$strMarketingValue => $strCYearsValue => $strMobAppValue=> $strIpCertificatesValue=> $strIndustryValue=> $strRHolderValue=> $strCoverageValue <br> "; 
			#print "$strProfitValue => $strSalesValue => $strSalariesValue <br>"; 
			#print "$strAddVal => $strMultiple => $str1Val"; 
 

			$strTable = "<table> 
						 <tr>
						 <td>Net profit, monthly:<td> 
						 <td>$strProfitValue<td> 
						 </tr> 
						 <tr>
						 <td>Total sales, monthly:<td> 
						 <td>$strSalesValue<td> 
						 </tr> 
						 <tr>
						 <td>Total salaries, monthly:<td> 
						 <td>$strSalariesValue<td> 
						 </tr> 
						 <tr>
						 <td>Total marketing budget, monthly:<td> 
						 <td>$strMarketingValue<td> 
						 </tr> 
						 <tr>
						 <td>How old is the company:<td> 
						 <td>$intYear=>   $strCYearsValue <td> 
						 </tr> 
						 <tr>
						 <td>Type of Mob App:<td> 
						 <td> $strMobApp = >  $strMobAppValue<td> 
						 </tr> 
						 <tr>
						 <td>Type of IP-Certificate:	<td> 
						 <td>$strIpCertificates => $strIpCertificatesValue<td> 
						 </tr> 
						 <tr>
						 <td>Coverage<td> 
						 <td>$strCoverage => $strCoverageValue<td> 
						 </tr> 
						 <tr>
						 <td>Protected Industries:<td> 
						  <td>$strIndustry => $strIndustryValue<td> 
						 </tr> 
						 <tr>
						 <td>Rightsholder<td> 
						 <td>$strRHolder => $strRHolderValue<td> 
						 </tr> 
						 
						 </table>";
						 
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
										"min"=>round($arrMin[$i]),
										"std"=>round($arrMin[$i] * $strStd),
										"max"=>round($arrMin[$i] * $strMax),
									);
				}
				#exit;
				$_SESSION['arrValues'] = $arrValues;
			}
			//$data['arrPost'] = $_POST;
			if($_POST['ipcertificates']!="" && $ipType=="")
			{
				$data['protectedindustry'] = $this->Iptype_model->fnGetAllProtectedIndustryValue($ipType,$_POST['ipcertificates']);
			}
		}
		$data['arrIpvalues'] = $arrValues;
		$data['coverage'] = $this->Iptype_model->fnGetAllCoverage($ipType);
		$data['ipindustries'] = $this->Iptype_model->fnGetAllIPIndustries($ipType);		
		$data['certificate'] = $this->Iptype_model->fnGetAllCertificateValue($ipType);
		$data['rholder'] = $this->Iptype_model->fnGetAllRHolderValue($ipType);
		$data['industry'] = $this->Iptype_model->fnGetAllIndustryValue($ipType);
		$this->load->view('frontheader');
		$this->load->view('art-work',$data);
		$this->load->view('frontfooter');
	}
	
	public function webdomain()
	{
		$arrValues = array();
		$data['arrPost'] = array();
		$data['ipType']=$ipType = 5;
		if(isset($_POST['btnCalculate']))
		{
			$strMobApp = $this->input->post('mobile_app');
			$strIpCertificates = $this->input->post('ipcertificates');
			$strIndustry = $this->input->post('industry'); 
			$strCoverage = $this->input->post('coverage');
			$strRHolder = $this->input->post('rholder');
			$strSales = $this->input->post('sales');
			$strProfit = $this->input->post('profit');
			$strCYears = $this->input->post('cyears');
			$strMarketing = $this->input->post('marketing');
			$strSalaries = $this->input->post('salaries');
			
			 
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
				$arrCYearsValue = $this->Iptype_model->fnGetYearValue($intYear);
				$strCYearsValue = $arrCYearsValue[0]['mob_value'];
			}
			if($strIndustry >0){
				$arrIndValue = $this->Iptype_model->fnGetIndustryValue($strIndustry,$ipType);				 
				$strIndustryValue = $arrIndValue[0]['ipvalue'];
			}
			if($strCoverage >0){
				$arrCoverageValue = $this->Iptype_model->fnGetCoverageValue($strCoverage,$ipType);
				$strCoverageValue = $arrCoverageValue[0]['cov_value'];
				#print $this->db->last_query(); exit;
			}
			if($strRHolder >0){
				$arrRHolderValue = $this->Iptype_model->fnGetRHolderValue($strRHolder,$ipType);
				#print $this->db->last_query(); exit;
				$strRHolderValue = $arrRHolderValue[0]['rholder_value'];
			}
			if($strIpCertificates >0){
				$arrIpCertificatesValue = $this->Iptype_model->fnGetCertificateValue($strIpCertificates,$ipType);
				$strIpCertificatesValue = $arrIpCertificatesValue[0]['cert_value'];
			}
			if($strMobApp >0){
				$arrIptypeIndValue = $this->Iptype_model->fnGetIndustryIptypeValue($strMobApp,$ipType);
				$strMobAppValue = $arrIptypeIndValue[0]['ipvalue'];
			}
			
			#$strCYearsValue = 2.10;
			#$strMobAppValue = 1.30;
			#$strIpCertificatesValue = 2.12;
			#$strCoverageValue = 1.50;
			#$strIndustryValue = 5.00;
			#$strRHolderValue = 1.30;
			
			
			# print "P: $strProfitValue => SV: $strSalariesValue => SLV: $strSalesValue =>  MKtV: $strMarketingValue => MV: $strMobAppValue=> IP: $strIpCertificatesValue=> IND: $strIndustryValue=> RV: $strRHolderValue=> strCoverageValue: $strCoverageValue";
			  #(E3*1.7)+(E4/12)+(E5*1.8)+(E6*2.4)*F7*F8*F9*F10*F11*F12
			$strMultiple =   (($strMarketingValue*2.4) * (($strCYearsValue  * $strMobAppValue * $strIpCertificatesValue * $strIndustryValue * $strRHolderValue * $strCoverageValue)));
			 
			$strAddVal = ($strProfitValue * 1.7) + ($strSalesValue/12) + ($strSalariesValue*1.8);
			$str1Val =  round($strAddVal + $strMultiple);
			#print "$strMarketingValue => $strCYearsValue => $strMobAppValue=> $strIpCertificatesValue=> $strIndustryValue=> $strRHolderValue=> $strCoverageValue <br> "; 
			#print "$strProfitValue => $strSalesValue => $strSalariesValue <br>"; 
			#print "$strAddVal => $strMultiple => $str1Val"; 
 

			$strTable = "<table> 
						 <tr>
						 <td>Net profit, monthly:<td> 
						 <td>$strProfitValue<td> 
						 </tr> 
						 <tr>
						 <td>Total sales, monthly:<td> 
						 <td>$strSalesValue<td> 
						 </tr> 
						 <tr>
						 <td>Total salaries, monthly:<td> 
						 <td>$strSalariesValue<td> 
						 </tr> 
						 <tr>
						 <td>Total marketing budget, monthly:<td> 
						 <td>$strMarketingValue<td> 
						 </tr> 
						 <tr>
						 <td>How old is the company:<td> 
						 <td>$intYear=>   $strCYearsValue <td> 
						 </tr> 
						 <tr>
						 <td>Type of Mob App:<td> 
						 <td> $strMobApp = >  $strMobAppValue<td> 
						 </tr> 
						 <tr>
						 <td>Type of IP-Certificate:	<td> 
						 <td>$strIpCertificates => $strIpCertificatesValue<td> 
						 </tr> 
						 <tr>
						 <td>Coverage<td> 
						 <td>$strCoverage => $strCoverageValue<td> 
						 </tr> 
						 <tr>
						 <td>Protected Industries:<td> 
						  <td>$strIndustry => $strIndustryValue<td> 
						 </tr> 
						 <tr>
						 <td>Rightsholder<td> 
						 <td>$strRHolder => $strRHolderValue<td> 
						 </tr> 
						 
						 </table>";
						 
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
										"min"=>round($arrMin[$i]),
										"std"=>round($arrMin[$i] * $strStd),
										"max"=>round($arrMin[$i] * $strMax),
									);
				}
				#exit;
				$_SESSION['arrValues'] = $arrValues;
			}
			//$data['arrPost'] = $_POST;
			if($_POST['ipcertificates']!="" && $ipType=="")
			{
				$data['protectedindustry'] = $this->Iptype_model->fnGetAllProtectedIndustryValue($ipType,$_POST['ipcertificates']);
			}
		}
		$data['arrIpvalues'] = $arrValues;
		$data['coverage'] = $this->Iptype_model->fnGetAllCoverage($ipType);
		$data['ipindustries'] = $this->Iptype_model->fnGetAllIPIndustries($ipType);		
		$data['certificate'] = $this->Iptype_model->fnGetAllCertificateValue($ipType);
		$data['rholder'] = $this->Iptype_model->fnGetAllRHolderValue($ipType);
		$data['industry'] = $this->Iptype_model->fnGetAllIndustryValue($ipType);
		$this->load->view('frontheader');
		$this->load->view('website-domain',$data);
		$this->load->view('frontfooter');
	}
	
	public function license()
	{
		$arrValues = array();
		$data['arrPost'] = array();
		$data['ipType']=$ipType = 6;
		if(isset($_POST['btnCalculate']))
		{
			$strMobApp = $this->input->post('mobile_app');
			$strIpCertificates = $this->input->post('ipcertificates');
			$strIndustry = $this->input->post('industry'); 
			$strCoverage = $this->input->post('coverage');
			$strRHolder = $this->input->post('rholder');
			$strSales = $this->input->post('sales');
			$strProfit = $this->input->post('profit');
			$strCYears = $this->input->post('cyears');
			$strMarketing = $this->input->post('marketing');
			$strSalaries = $this->input->post('salaries');
			
			 
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
				$arrCYearsValue = $this->Iptype_model->fnGetYearValue($intYear);
				$strCYearsValue = $arrCYearsValue[0]['mob_value'];
			}
			if($strIndustry >0){
				$arrIndValue = $this->Iptype_model->fnGetIndustryValue($strIndustry,$ipType);				 
				$strIndustryValue = $arrIndValue[0]['ipvalue'];
			}
			if($strCoverage >0){
				$arrCoverageValue = $this->Iptype_model->fnGetCoverageValue($strCoverage,$ipType);
				$strCoverageValue = $arrCoverageValue[0]['cov_value'];
				#print $this->db->last_query(); exit;
			}
			if($strRHolder >0){
				$arrRHolderValue = $this->Iptype_model->fnGetRHolderValue($strRHolder,$ipType);
				#print $this->db->last_query(); exit;
				$strRHolderValue = $arrRHolderValue[0]['rholder_value'];
			}
			if($strIpCertificates >0){
				$arrIpCertificatesValue = $this->Iptype_model->fnGetCertificateValue($strIpCertificates,$ipType);
				$strIpCertificatesValue = $arrIpCertificatesValue[0]['cert_value'];
			}
			if($strMobApp >0){
				$arrIptypeIndValue = $this->Iptype_model->fnGetIndustryIptypeValue($strMobApp,$ipType);
				$strMobAppValue = $arrIptypeIndValue[0]['ipvalue'];
			}
			
			#$strCYearsValue = 2.10;
			#$strMobAppValue = 1.30;
			#$strIpCertificatesValue = 2.12;
			#$strCoverageValue = 1.50;
			#$strIndustryValue = 5.00;
			#$strRHolderValue = 1.30;
			
			
			# print "P: $strProfitValue => SV: $strSalariesValue => SLV: $strSalesValue =>  MKtV: $strMarketingValue => MV: $strMobAppValue=> IP: $strIpCertificatesValue=> IND: $strIndustryValue=> RV: $strRHolderValue=> strCoverageValue: $strCoverageValue";
			  #(E3*1.7)+(E4/12)+(E5*1.8)+(E6*2.4)*F7*F8*F9*F10*F11*F12
			$strMultiple =   (($strMarketingValue*2.4) * (($strCYearsValue  * $strMobAppValue * $strIpCertificatesValue * $strIndustryValue * $strRHolderValue * $strCoverageValue)));
			 
			$strAddVal = ($strProfitValue * 1.7) + ($strSalesValue/12) + ($strSalariesValue*1.8);
			$str1Val =  round($strAddVal + $strMultiple);
			#print "$strMarketingValue => $strCYearsValue => $strMobAppValue=> $strIpCertificatesValue=> $strIndustryValue=> $strRHolderValue=> $strCoverageValue <br> "; 
			#print "$strProfitValue => $strSalesValue => $strSalariesValue <br>"; 
			#print "$strAddVal => $strMultiple => $str1Val"; 
 

			$strTable = "<table> 
						 <tr>
						 <td>Net profit, monthly:<td> 
						 <td>$strProfitValue<td> 
						 </tr> 
						 <tr>
						 <td>Total sales, monthly:<td> 
						 <td>$strSalesValue<td> 
						 </tr> 
						 <tr>
						 <td>Total salaries, monthly:<td> 
						 <td>$strSalariesValue<td> 
						 </tr> 
						 <tr>
						 <td>Total marketing budget, monthly:<td> 
						 <td>$strMarketingValue<td> 
						 </tr> 
						 <tr>
						 <td>How old is the company:<td> 
						 <td>$intYear=>   $strCYearsValue <td> 
						 </tr> 
						 <tr>
						 <td>Type of Mob App:<td> 
						 <td> $strMobApp = >  $strMobAppValue<td> 
						 </tr> 
						 <tr>
						 <td>Type of IP-Certificate:	<td> 
						 <td>$strIpCertificates => $strIpCertificatesValue<td> 
						 </tr> 
						 <tr>
						 <td>Coverage<td> 
						 <td>$strCoverage => $strCoverageValue<td> 
						 </tr> 
						 <tr>
						 <td>Protected Industries:<td> 
						  <td>$strIndustry => $strIndustryValue<td> 
						 </tr> 
						 <tr>
						 <td>Rightsholder<td> 
						 <td>$strRHolder => $strRHolderValue<td> 
						 </tr> 
						 
						 </table>";
						 
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
										"min"=>round($arrMin[$i]),
										"std"=>round($arrMin[$i] * $strStd),
										"max"=>round($arrMin[$i] * $strMax),
									);
				}
				#exit;
				$_SESSION['arrValues'] = $arrValues;
			}
			//$data['arrPost'] = $_POST;
			if($_POST['ipcertificates']!="" && $ipType=="")
			{
				$data['protectedindustry'] = $this->Iptype_model->fnGetAllProtectedIndustryValue($ipType,$_POST['ipcertificates']);
			}
		}
		
		$data['arrIpvalues'] = $arrValues;
		$data['coverage'] = $this->Iptype_model->fnGetAllCoverage($ipType);
		$data['ipindustries'] = $this->Iptype_model->fnGetAllIPIndustries($ipType);		
		$data['certificate'] = $this->Iptype_model->fnGetAllCertificateValue($ipType);
		$data['rholder'] = $this->Iptype_model->fnGetAllRHolderValue($ipType);
		$data['industry'] = $this->Iptype_model->fnGetAllIndustryValue($ipType);
		
		
		$this->load->view('frontheader');
		$this->load->view('license',$data);
		$this->load->view('frontfooter');
	}
	
	
	public function ajaxgetprotectedindustrieslist()
	{
		$cert_id=$_POST['ipcertificates'];
		$typeid=$_POST['typeid'];
		$str='';
		
		$protectedindustry = $this->Iptype_model->fnGetAllProtectedIndustryValue($typeid,$cert_id);
		#echo $this->db->last_query();exit;
		if(isset($protectedindustry) && count($protectedindustry)>0)
		{
			//$str .='<select class="form-control populate"  name="industry" id="industry" multiple data-plugin-selectTwo >';
			$str .='<option value="">--Select--</option>';
				//print_r($arrattributemaster);
				foreach($protectedindustry as $attr)
				{ $ress = '';
					if($arrPost['industry']==$attr['ind_id'])
					{ $ress .= 'selected="selected"';}
					$str .='<option value='.$attr['ind_id'].' '.$ress.'>'.$attr['ind_name'].'</option>';
				}	
			//$str .= '</select>';	
		}
		echo json_encode(array('resstr'=>$str));
	}
	
	public function getipuniversalformulae()
	{
		$strSalaries = $this->input->post('salaries');
		$strMarketing = $this->input->post('marketing');
		$strSales = $this->input->post('sales');
		$strProfit = $this->input->post('profit');
		$strCYears = $this->input->post('cyears');

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
			$arrCYearsValue = $this->Iptype_model->fnGetYearValue($intYear);
			$strCYearsValue = $arrCYearsValue[0]['mob_value'];
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
								
								
		$strSalariesValue = 10000;
		$strProfitValue = 10000;
		$strMarketingValue = 10000;
		$strCYearsValue = 1;
		$strSalesValue = 10000;
		//(E49*12/3+E50/2*12+E55+E51*6.2)*E47*0.11
		//Brackets, Order (meaning powers), Division, Multiplication, Addition, Subtraction
		$strMin1Value  = $strSalariesValue/2.8 * 12 ;//55						
		
		
		$str21 =$strSalesValue * 12/3;
		$str22 =(($strProfitValue/2) *12) ;
		$str23 =$strMarketingValue *6.2 ;
		$str24 =$strCYearsValue * 0.11;
		 
		#print  "$str21 => $str22 => $strMin1Value => $str23 => $str24 <br> "; 
		$strMin2Value = round(($str21 + $str22 + $strMin1Value + $str23) * $str24);
		#$strMin2Value  = ($strSalesValue * (12/3) + (($strProfitValue/2) *12) + $strMin1Value + ($strMarketingValue *0.62)) * ($strCYearsValue * 0.11);
		
		
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
			$avgStd  = array_sum($arrStd)/count($arrStd);
			$arrValues['avgstd'] = round($strSumStd/25);
			echo "<pre>";print_r($arrValues);exit;
			$_SESSION['arrValues'] = $arrValues;
		}				 
		$data['arrIpvalues'] = $arrValues;
		$data['coverage'] = $this->Iptype_model->fnGetAllCoverage($ipType);
		$data['ipindustries'] = $this->Iptype_model->fnGetAllIPIndustries($ipType);		
		$data['certificate'] = $this->Iptype_model->fnGetAllCertificateValue($ipType);
		$data['rholder'] = $this->Iptype_model->fnGetAllRHolderValue($ipType);
		$data['industry'] = $this->Iptype_model->fnGetAllIndustryValue($ipType);
		
		
		$this->load->view('frontheader');
		$this->load->view('getipuniversalformulae',$data);
		$this->load->view('frontfooter');				 
	}
	
}
