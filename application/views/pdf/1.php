<tr >
	<td >
		<table  border="0" align="center" cellpadding="0" cellspacing="0" style="border: solid 3px #4B6A87; padding: 0; margin: 10px; background-image: url('<?php echo base_url();?>templates/admin/assets/images/pdf/shap-bg.png'); background-repeat:no-repeat; background-position: center 130px; " >
			<tr>
				<td align="center">
					<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
						<tr>
							<td align="center" style="padding-top:60px;">
								<img width="100px" src="<?php echo base_url();?>templates/admin/assets/images/pdf/star.png" alt="">	
							</td>
						</tr>
						<tr>
							<td align="center" valign="top" style="border: none; padding-top: 30px;"  >
								<h1 class="copperplatefont" style="font-family:Copperplate,Copperplate Gothic Light,fantasy; font-size: 45px; color:#0a2f53;font-weight:bold"><span style="font-size: 54px;">V</span>ALUATION <span style="font-size: 54px;">C</span>ERTIFICATE </h1>
							</td>
						</tr>
						<tr>
							<td align="center" valign="mibble"  >
								<img width="100%" src="<?php echo base_url();?>templates/admin/assets/images/pdf/universal.png" alt="">
							</td>
						</tr>
						<tr>
							<td align="center" valign="top" style="padding-top:20px;">
								<div class="copperplatefont" style="font-style:normal;font-weight:bold;font-size:70pt;font-family:Copperplate,Copperplate Gothic Light,fantasy;color:#0a2f53;" >$ <?Php echo number_format($arrValues['avgstd']);?></div>
							</td>
						</tr>
						<tr>
							<td align="center" valign="top" >
								<table>
									<tr>
										<td><img width="300px" src="<?php echo base_url();?>templates/admin/assets/images/pdf/logo-left-shap.png"  alt=""></td>
										<td><img width="500px"  src="<?php echo base_url();?>templates/admin/assets/images/pdf/logo1.png"  style="margin-bottom: 20px" alt=""></td>
										<td><img width="300px" src="<?php echo base_url();?>templates/admin/assets/images/pdf/logo-left-shap.png"  alt=""></td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td align="center"  valign="top" >						
								<div class="copperplatefont" style="font-family:Copperplate,Copperplate Gothic Light,fantasy; color:#001529; font-size:45px; font-weight:bold">  INTERNATIONAL OFFICE FOR ONLINE IP-VALUATION</div>
							</td>
						</tr>
						<tr>
							<td align="center" valign="top" style="padding-top:30px;">
								<img width="1050px" src="<?php echo base_url();?>templates/admin/assets/images/pdf/londan-logo.png" alt="">
							</td>
						</tr>

					</table>
				</td>
			</tr>
			<tr>
				<td align="center">
					<table class="tablepage1" width="80%" border="" align="center" cellpadding="0" cellspacing="0" >
						<tr>
							<td width="30%" class="font60" style=" font-family:amiri;padding: 20px;   font-size: 35px; color:#001529; font-weight: bold; text-align:left;">Name of Customer</td>.
							<td width="70%" style="padding: 20px; color: #53718d; font-size: 35px; font-weight: bold; text-align:left;"><?php echo $applicant_name;?></td>
						</tr>
						<tr>
							<td width="30%" class="font60" style="font-family:amiri;padding: 20px;   font-size: 35px; color:#001529; font-weight: bold; text-align:left;">Type of IP-work</td>.
							<td width="70%" style="padding: 20px; color: #53718d; font-size: 35px; font-weight: bold; text-align:left;"><?php echo $reviewobjectinfo[0]['type'];?></td>
						</tr>
						<tr>
							<td width="30%" class="font60" style="font-family:amiri;padding: 20px;   font-size: 35px; color:#001529; font-weight: bold; text-align:left;">Name of IP-work</td>.
							<td width="70%" style="padding: 20px; color: #53718d; font-size: 35px; font-weight: bold; text-align:left;"><?php echo $reviewobjectinfo[0]['ip_work_title'];?></td>
						</tr>
						<tr>
							<td width="30%" class="font60" style="font-family:amiri;padding: 20px;   font-size: 35px; color:#001529; font-weight: bold; text-align:left;">Type of Service</td>.
							<td width="70%" style="padding: 20px; color: #53718d; font-size: 35px; font-weight: bold; text-align:left;">UNIVERSAL Service Package of London-Rate System (Free of Charge) </td>
						</tr>
						<tr>
							<td width="30%" class="font60" style="font-family:amiri;padding: 20px;   font-size: 35px; color:#001529; font-weight: bold; text-align:left;">Validation (KYC) of Customer</td>.
							<td width="70%" style="padding: 20px; color: #53718d; font-size: 35px; font-weight: bold; text-align:left;"><b style="color: #cd363b">NOT PROVIDED </b>(KYC Validation of Customer is available only in VALIDATION Package) </td>
						</tr>
						<tr>
							<td width="30%" class="font60" style="font-family:amiri;padding: 20px;   font-size: 35px; color:#001529; font-weight: bold; text-align:left;">Verification of Submitted Data </td>.
							<td width="70%"  style="padding: 20px; color: #53718d; font-size: 35px; font-weight: bold; text-align:left;"><b style="color: #cd363b">NOT PROVIDED </b>(Expert Examination and Verification of Economic, Financial Indicators, Legal and IP issues available only in VERIFICATION Package) </td>
						</tr>
					</table>
				</td>
				</tr>
				<?php $this->load->view('pdf/pdffooter',$data); ?>
		</table>
	</td>
</tr>