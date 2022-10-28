
	<tr>
		<td>
			<table  width="1160px" border="0" align="center" cellpadding="0" cellspacing="0" style="border: solid 3px #4B6A87; padding: 0; margin: 20px; background-image: url('<?php echo base_url();?>templates/admin/assets/images/pdf/shap-bg.png'); background-repeat:no-repeat; background-position: center 270px; " >
				<tr>
					<td align="center" style="padding-top: 30px;">
						<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
							<tr>
								<td align="center" valign="top" style="padding-left: 30px">
									<img width="100px" src="<?php echo base_url();?>templates/admin/assets/images/pdf/hors-logo.png" alt="">
								</td>
								<td align="center" valign="top" >
									<img width="65%" src="<?php echo base_url();?>templates/admin/assets/images/pdf/universal.png" alt="">
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td align="center" style="padding-top: 30px;">
						<table width="950" border="0" align="center" cellpadding="0" cellspacing="0">						
							<tr>								
								<td align="center" valign="top" >
									<h1 style="font-size: 36px; margin:0; color:#0a2f53">VALUATION CERTIFICATE 	ASSESSMENT SUMMARY</h1>
								</td>
							</tr>			
						</table>
					</td>
				</tr>
				<tr>
						<td align="center" style="padding-top: 30px;">
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
							</table>
						</td>
					</tr>
					<tr style="border: none; ">
						<td align="center" style="border: none; padding-top: 30px;  ">
							<table width="950" style="border: none; " align="center" cellpadding="5" cellspacing="5" >
							<tr style="border: none; ">
								<td colspan="3" style="border: none; ">
									<h2 style="font-size: 35px; padding:20px; margin:20px 0; color:#0a2f53">III. DESCRIPTION OF BUSINESS AND PRODUCT: </h2>
								</td>
							</tr>
							</table>
						</td>
					</tr>	
					<tr>
						<td align="center" style="padding-top: 30px;">
							<table width="950" style="" border="1" align="center" cellpadding="0" cellspacing="0" >
								<tr>
									<td width="30%" style="padding: 13px; color: #000; font-size: 22px; font-weight: bold; text-align:left;">Product Description </td>.
									<td width="70%" style="padding: 13px; color: #53718d; font-size: 22px; font-weight: bold; text-align:left;"><?php echo $str_main_products;?></td>
								</tr>
								<tr>
									<td width="30%" style="padding: 13px; color: #000; font-size: 22px; font-weight: bold; text-align:left;">Business Industry</td>.
									<td width="70%" style="padding: 13px; color: #53718d; font-size: 22px; font-weight: bold; text-align:left;"><?php echo $businessinduinfo[0]['business_type'];?></td>
								</tr>
								<tr>
									<td width="30%" style="padding: 13px; color: #000; font-size: 22px; font-weight: bold; text-align:left;">Type of IP-Certificate</td>.
									<td width="70%" style="padding: 13px; color: #53718d; font-size: 22px; font-weight: bold; text-align:left;"><?php echo $reviewobjectinfo[0]['type'];?> </td>
								</tr>
								<tr>
									<td width="30%" style="padding: 13px; color: #000; font-size: 22px; font-weight: bold; text-align:left;">Date of IP-Certificate</td>.
									<td width="70%" style="padding: 13px; color: #53718d; font-size: 22px; font-weight: bold; text-align:left;"><?php echo date('M d Y',strtotime($reviewobjectinfo[0]['registration_date']));?> </td>
								</tr>
								<tr>
									<td width="30%" style="padding: 13px; color: #000; font-size: 22px; font-weight: bold; text-align:left;">Registration Organisation</td>.
									<td width="70%" style="padding: 13px; color: #53718d; font-size: 22px; font-weight: bold; text-align:left;"><?php echo $reviewobjectinfo[0]['registration_org'];?> </td>
								</tr>
								<tr>
									<td width="30%" style="padding: 13px; color: #000; font-size: 22px; font-weight: bold; text-align:left;">Protected Regions</td>.
									<td width="70%" style="padding: 13px; color: #53718d; font-size: 22px; font-weight: bold; text-align:left;"><?php echo $potential_regions;?> </td>
								</tr>
								<tr>
									<td width="30%" style="padding: 13px; color: #000; font-size: 22px; font-weight: bold; text-align:left;">Protected Indistries</td>.
									<td width="70%" style="padding: 13px; color: #53718d; font-size: 22px; font-weight: bold; text-align:left;"><?php echo '-';?> </td>
								</tr>
								<tr>
									<td width="30%" style="padding: 13px; color: #000; font-size: 22px; font-weight: bold; text-align:left;">Potential Customer</td>.
									<td width="70%" style="padding: 13px; color: #53718d; font-size: 22px; font-weight: bold; text-align:left;"><?php echo $strpotentialcustinfo;?> </td>
								</tr>
								<tr>
									<td width="30%" style="padding: 13px; color: #000; font-size: 22px; font-weight: bold; text-align:left;">Current Team and Partners</td>.
									<td width="70%" style="padding: 13px; color: #53718d; font-size: 22px; font-weight: bold; text-align:left;"><?php echo $current_team_partners;?> </td>
								</tr>
								<tr>
									<td width="30%" style="padding: 13px; color: #000; font-size: 22px; font-weight: bold; text-align:left;">Existing Competitors</td>.
									<td width="70%" style="padding: 13px; color: #53718d; font-size: 22px; font-weight: bold; text-align:left;"><?php echo $potential_competitor;?> </td>
								</tr>
								<tr>
									<td width="30%" style="padding: 13px; color: #000; font-size: 22px; font-weight: bold; text-align:left;">UNiqueness and key advantages of product </td>.
									<td width="70%" style="padding: 13px; color: #53718d; font-size: 22px; font-weight: bold; text-align:left;"><?php echo $uniqueness_product;?> </td>
								</tr>
								<tr>
									<td width="30%" style="padding: 13px; color: #000; font-size: 22px; font-weight: bold; text-align:left;">Current status of product development </td>.
									<td width="70%" style="padding: 13px; color: #53718d; font-size: 22px; font-weight: bold; text-align:left;"><?php echo str_replace('_',' ',$reviewobjectinfo[0]['ip_work_status']);?> </td>
								</tr>
								
							</table>
						</td>
					</tr>
					<?php $this->load->view('pdffooter',$arrValues); ?>
			</table>
		</td>
	</tr>
	