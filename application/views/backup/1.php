<tr>
		<td>
			<table  width="1160px" border="0" align="center" cellpadding="0" cellspacing="0" style="border: solid 3px #4B6A87; padding: 0; margin: 10px; background-image: url('<?php echo base_url();?>templates/admin/assets/images/pdf/shap-bg.png'); background-repeat:no-repeat; background-position: center 270px;  " >
				<tr>
					<td align="center">
						<table width="950" border="0" align="center" cellpadding="0" cellspacing="0">
							<tr>
								<td align="center">
									<table width="300px" style="margin-top: 40px;">
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
									<h1 style="font-size: 42px; color:#0a2f53">VALUATION CERTIFICATE </h1>
								</td>
							</tr>
							<tr>
								<td align="center" valign="mibble"  >
									<img  src="<?php echo base_url();?>templates/admin/assets/images/pdf/universal.png" alt="">
								</td>
							</tr>
							<tr>
								
								<td align="center" valign="top" >
									<div style="font-size: 90px; color: #0a2f53;  padding:0; ">$ <?Php echo $arrValues['avgstd'];?> </div>
								</td>
							</tr>
							<tr>
								<td align="center" valign="top" >
									<img width="800px" src="<?php echo base_url();?>templates/admin/assets/images/pdf/logo.png" alt="">
								</td>
							</tr>
							<tr>
								<td align="center" valign="top" style="font-size: 34px; padding:0; color:#0a2f53; font-weight: bold;" >
									INTERNATIONAL OFFICE FOR ONLINE IP-VALUATION
								</td>
							</tr>
							<tr>
								<td align="center" valign="top" style="padding-top:10px;">
									<img width="650px" src="<?php echo base_url();?>templates/admin/assets/images/pdf/londan-logo.png" alt="">
								</td>
							</tr>

						</table>
					</td>
				</tr>
				<tr>
					<td align="center">
						<table width="950" style="" border="1" align="center" cellpadding="0" cellspacing="0" >
							<tr>
								<td width="30%" style="padding: 13px; color: #000; font-size: 22px; font-weight: bold; text-align:left;">Name of Customer</td>.
								<td width="70%" style="padding: 13px; color: #53718d; font-size: 22px; font-weight: bold; text-align:left;"><?php echo $applicant_name;?></td>
							</tr>
							<tr>
								<td width="30%" style="padding: 13px; color: #000; font-size: 22px; font-weight: bold; text-align:left;">Type of IP-work</td>.
								<td width="70%" style="padding: 13px; color: #53718d; font-size: 22px; font-weight: bold; text-align:left;"><?php echo $reviewobjectinfo[0]['type'];?></td>
							</tr>
							<tr>
								<td width="30%" style="padding: 13px; color: #000; font-size: 22px; font-weight: bold; text-align:left;">Name of IP-work</td>.
								<td width="70%" style="padding: 13px; color: #53718d; font-size: 22px; font-weight: bold; text-align:left;"><?php echo $reviewobjectinfo[0]['ip_work_title'];?> </td>
							</tr>
							<tr>
								<td width="30%" style="padding: 13px; color: #000; font-size: 22px; font-weight: bold; text-align:left;">Type of Service</td>.
								<td width="70%" style="padding: 13px; color: #53718d; font-size: 22px; font-weight: bold; text-align:left;">UNIVERSAL Service Package of London-Rate System (Free of Charge) </td>
							</tr>
							<tr>
								<td width="30%" style="padding: 13px; color: #000; font-size: 22px; font-weight: bold; text-align:left;">Validation (KYC) of Customer</td>.
								<td width="70%" style="padding: 13px; color: #53718d; font-size: 22px; font-weight: bold; text-align:left;"><b style="color: #cd363b">NOT PROVIDED </b>(KYC Validation of Customer is available only in VALIDATION Package) </td>
							</tr>
							<tr>
								<td width="30%" style="padding: 15px; color: #000; font-size: 22px; font-weight: bold; text-align:left;">Verification of Submitted Data </td>.
								<td width="70%" style="padding: 15px; color: #53718d; font-size: 22px; font-weight: bold; text-align:left;"><b style="color: #cd363b">NOT PROVIDED </b>(Expert Examination and Verification of Economic, Financial Indicators, Legal and IP issues available only in VERIFICATION Package) </td>
							</tr>
						</table>
					</td>
					</tr>
					<?php $this->load->view('pdffooter',$arrValues); ?>
			</table>
		</td>
	</tr>
	
	