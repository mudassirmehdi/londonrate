
<tr >
	<td >
		<table  border="0" align="center" cellpadding="0" cellspacing="0" style="border: solid 3px #4B6A87; padding: 0; margin: 10px; background-image: url('<?php echo base_url();?>templates/admin/assets/images/pdf/shap-bg.png'); background-repeat:no-repeat; background-position: center 100px; " >
			<tr>
				<td align="center">
					<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
						<tr>
							<td align="center">
								<table width="300px" style="margin-top: 40px;padding-top: 30px;">
									<tr>
										<td align="center" valign="mibble"  >
											<img width="100px" src="<?php echo base_url();?>templates/admin/assets/images/pdf/star.png" alt="">
										</td>
									</tr>
								</table>
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
							<td align="center" valign="top" >
								<div class="copperplatefont" style="font-style:normal;font-weight:bold;font-size:82pt;font-family:Copperplate,Copperplate Gothic Light,fantasy;color:#0a2f53;padding-top:10px;" >$ <?Php echo $arrValues['avgstd'];?></div>
							</td>
						</tr>
						<tr>
							<td align="center" valign="top" >
								<img width="1000" src="<?php echo base_url();?>templates/admin/assets/images/pdf/logo.png" alt="">
							</td>
						</tr>
						<tr>
							<td align="center"  valign="top" >						
								<h1 class="copperplatefont" style="font-family:Copperplate,Copperplate Gothic Light,fantasy; font-size: 37px;  color:#001529;font-weight:bold">   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size: 45px;">I</span>NTERNATIONAL <span style="font-size: 45px;">O</span>FFICE <span style="font-size: 45px;">F</span>OR ONLINE <span style="font-size: 45px;">IP</span>-VALUATION&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1>
							</td>
						</tr>
						<tr>
							<td align="center" valign="top" style="padding-top:30px;">
								<img width="750px" src="<?php echo base_url();?>templates/admin/assets/images/pdf/londan-logo.png" alt="">
							</td>
						</tr>

					</table>
				</td>
			</tr>
			<tr>
				<td align="center">
					<table class="tablepage1" width="100%" border="" align="center" cellpadding="0" cellspacing="0" >
						<tr>
							<td width="30%" class="font60" style=" font-family:amiri;padding: 20px;   font-size: 100px; color:#001529; font-weight: bold; text-align:left;">Name of Customer</td>.
							<td width="70%" style="padding: 20px; color: #53718d; font-size: 22px; font-weight: bold; text-align:left;"><?php echo $applicant_name;?></td>
						</tr>
						<tr>
							<td width="30%" class="font60" style="font-family:amiri;padding: 20px;   font-size: 100px; color:#001529; font-weight: bold; text-align:left;">Type of IP-work</td>.
							<td width="70%" style="padding: 20px; color: #53718d; font-size: 22px; font-weight: bold; text-align:left;"><?php echo $reviewobjectinfo[0]['type'];?></td>
						</tr>
						<tr>
							<td width="30%" class="font60" style="font-family:amiri;padding: 20px;   font-size: 100px; color:#001529; font-weight: bold; text-align:left;">Name of IP-work</td>.
							<td width="70%" style="padding: 20px; color: #53718d; font-size: 22px; font-weight: bold; text-align:left;"><?php echo $reviewobjectinfo[0]['ip_work_title'];?></td>
						</tr>
						<tr>
							<td width="30%" class="font60" style="font-family:amiri;padding: 20px;   font-size: 100px; color:#001529; font-weight: bold; text-align:left;">Type of Service</td>.
							<td width="70%" style="padding: 20px; color: #53718d; font-size: 22px; font-weight: bold; text-align:left;">UNIVERSAL Service Package of London-Rate System (Free of Charge) </td>
						</tr>
						<tr>
							<td width="30%" class="font60" style="font-family:amiri;padding: 20px;   font-size: 100px; color:#001529; font-weight: bold; text-align:left;">Validation (KYC) of Customer</td>.
							<td width="70%" style="padding: 20px; color: #53718d; font-size: 22px; font-weight: bold; text-align:left;"><b style="color: #cd363b">NOT PROVIDED </b>(KYC Validation of Customer is available only in VALIDATION Package) </td>
						</tr>
						<tr>
							<td width="30%" class="font60" style="font-family:amiri;padding: 20px;   font-size: 100px; color:#001529; font-weight: bold; text-align:left;">Verification of Submitted Data </td>.
							<td width="70%"  style="padding: 20px; color: #53718d; font-size: 22px; font-weight: bold; text-align:left;"><b style="color: #cd363b">NOT PROVIDED </b>(Expert Examination and Verification of Economic, Financial Indicators, Legal and IP issues available only in VERIFICATION Package) </td>
						</tr>
					</table>
				</td>
				</tr>
				<?php $this->load->view('pdffooter',$arrValues); ?>
		</table>
	</td>
</tr>