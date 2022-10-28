<tr>
	<td>
		<table  width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="border: solid 3px #4B6A87; padding-top: 20px; margin: 20px; background-image: url('<?php echo base_url();?>templates/admin/assets/images/pdf/shape-bg2.png');background-repeat:no-repeat; background-position: center 270px; " >
			<tr>
				<td align="center" style="padding-top: 30px;">
					<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
						<tr>
							<td align="center" valign="top" style="padding-left: 30px">
								<img width="20%" src="<?php echo base_url();?>templates/admin/assets/images/pdf/hors-logo.png" alt="">
							</td>
							<td align="left" valign="top" style="padding-left: 35%;padding-top: 30px;">
								<img width="70%" src="<?php echo base_url();?>templates/admin/assets/images/pdf/universal.png" alt="">
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td align="center" style="padding-top: 30px;">
					<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">						
						<tr>								
							<td align="center" valign="top" >
								<div class="copperplatefont" style="font-family:Copperplate,Copperplate Gothic Light,fantasy; font-size: 50px;  color:#0a2f53;font-weight:bold">VALUATION CERTIFICATE ASSESSMENT SUMMARY </div>
							</td>
						</tr>			
					</table>
				</td>
			</tr>
			<tr>
				<td align="center" style="padding-top: 30px;">
					<table class="tablepage1" width="80%" border="" align="center" cellpadding="0" cellspacing="0" >
						<tr>
							<td width="30%"  style=" font-family:amiri;padding: 20px;   font-size: 30px; color:#001529; font-weight: bold; text-align:left;" >Name of Customer</td>
							<td width="70%" style="padding: 20px; color: #53718d; font-size: 30px; font-weight: bold; text-align:left;"><?php echo $applicant_name;?></td>
						</tr>
						<tr>
							<td width="30%" style="font-family:amiri;padding: 20px;   font-size: 30px; color:#001529; font-weight: bold; text-align:left;">Type of IP-work</td>
							<td width="70%" style="padding: 20px; color: #53718d; font-size: 30px; font-weight: bold; text-align:left;"><?php echo $reviewobjectinfo[0]['type'];?></td>
						</tr>
						<tr>
							<td width="30%" style="font-family:amiri;padding: 20px;   font-size: 30px; color:#001529; font-weight: bold; text-align:left;">Name of IP-work</td>
							<td width="70%" style="padding: 20px; color: #53718d; font-size: 30px; font-weight: bold; text-align:left;"><?php echo $reviewobjectinfo[0]['ip_work_title'];?></td>
						</tr>								
					</table>
				</td>
			</tr>
			<tr style="border: none; ">
				<td align="center" style="border: none; padding-top: 30px;  ">
					<table width="80%" style="border: none; " align="center" cellpadding="5" cellspacing="5" >
					<tr style="border: none; ">
						<td colspan="3"  style="font-family:Copperplate,Copperplate Gothic Light,fantasy;border: none; padding-top: 10px; text-align:center;">
							<h2  style="  font-family:Copperplate,Copperplate Gothic Light,fantasy;font-size: 35px; padding:10px; margin:10px 0; color:#092f56"><span style="font-size: 35px;">III. D</span>ESCRIPTION <span style="font-size: 35px;">O</span>F<span style="font-size: 35px;"> B</span>USINESS <span style="font-size: 35px;">A</span>ND <span style="font-size: 35px;">P</span>RODUCT: </h2>
							
						</td>
					</tr>
					</table>
				</td>
			</tr>	
			<tr>
				<td align="center" style="border: none; padding-top: 20px;  " > 
					<table width="80%" style="" border="1" align="center" cellpadding="0" cellspacing="0" >
						<tr>
							<td width="30%" style="font-family:amiri;padding: 20px;   font-size: 28px; color:#001529; font-weight: bold; text-align:left;">Product Description </td>
							<td width="70%" style="padding: 20px; color: #53718d; font-size: 28px; font-weight: bold; text-align:left;"><?php echo $str_main_products;?></td>
						</tr>
						<tr>
							<td width="30%" style="font-family:amiri;padding: 20px;   font-size: 28px; color:#001529; font-weight: bold; text-align:left;">Business Industry</td>
							<td width="70%" style="padding: 20px; color: #53718d; font-size: 28px; font-weight: bold; text-align:left;"><?php echo $businessinduinfo[0]['business_type'];?></td>
						</tr>
						<tr>
							<td width="30%" style="font-family:amiri;padding: 20px;   font-size: 28px; color:#001529; font-weight: bold; text-align:left;">Type of IP-Certificate</td>
							<td width="70%" style="padding: 20px; color: #53718d; font-size: 28px; font-weight: bold; text-align:left;"><?php echo $reviewobjectinfo[0]['type'];?> </td>
						</tr>
						<tr>
							<td width="30%" style="font-family:amiri;padding: 20px;   font-size: 28px; color:#001529; font-weight: bold; text-align:left;">Date of IP-Certificate</td>
							<td width="70%" style="padding: 20px; color: #53718d; font-size: 28px; font-weight: bold; text-align:left;"><?php echo date('M d Y',strtotime($reviewobjectinfo[0]['registration_date']));?> </td>
						</tr>
						<tr>
							<td width="30%" style="font-family:amiri;padding: 20px;   font-size: 28px; color:#001529; font-weight: bold; text-align:left;">Registration Organisation</td>
							<td width="70%" style="padding: 20px; color: #53718d; font-size: 28px; font-weight: bold; text-align:left;"><?php echo $reviewobjectinfo[0]['registration_org'];?> </td>
						</tr>
						<tr>
							<td width="30%" style="font-family:amiri;padding: 20px;   font-size: 28px; color:#001529; font-weight: bold; text-align:left;">Protected Regions</td>
							<td width="70%" style="padding: 20px; color: #53718d; font-size: 28px; font-weight: bold; text-align:left;"><?php echo $potential_regions;?> </td>
						</tr>
						<tr>
							<td width="30%" style="font-family:amiri;padding: 20px;   font-size: 28px; color:#001529; font-weight: bold; text-align:left;">Protected Industries</td>
							<td width="70%" style="padding: 20px; color: #53718d; font-size: 28px; font-weight: bold; text-align:left;"><?php echo $protectedinfo;?> </td>
						</tr>
						<tr>
							<td width="30%" style="font-family:amiri;padding: 20px;   font-size: 28px; color:#001529; font-weight: bold; text-align:left;">Potential Customer</td>
							<td width="70%" style="padding: 20px; color: #53718d; font-size: 28px; font-weight: bold; text-align:left;"><?php echo $strpotentialcustinfo;?> </td>
						</tr>
						<tr>
							<td width="30%" style="font-family:amiri;padding: 20px;   font-size: 28px; color:#001529; font-weight: bold; text-align:left;">Current Team and Partners</td>
							<td width="70%" style="padding: 20px; color: #53718d; font-size: 28px; font-weight: bold; text-align:left;"><?php echo $current_team_partners;?> </td>
						</tr>
						<tr>
							<td width="30%" style="font-family:amiri;padding: 20px;   font-size: 28px; color:#001529; font-weight: bold; text-align:left;">Existing Competitors</td>
							<td width="70%" style="padding: 20px; color: #53718d; font-size: 28px; font-weight: bold; text-align:left;"><?php echo $potential_competitor;?> </td>
						</tr>
						<tr>
							<td width="30%" style="font-family:amiri;padding: 20px;   font-size: 28px; color:#001529; font-weight: bold; text-align:left;">Uniqueness and key advantages of product </td>
							<td width="70%" style="padding: 20px; color: #53718d; font-size: 28px; font-weight: bold; text-align:left;"><?php echo $uniqueness_product;?> </td>
						</tr>
						<tr>
							<td width="30%" style="font-family:amiri;padding: 20px;   font-size: 28px; color:#001529; font-weight: bold; text-align:left;">Current status of product development </td>
							<td width="70%" style="font-family:amiri;padding: 20px;   font-size: 30px; color:#001529; font-weight: bold; text-align:left;"><?php echo str_replace('_',' ',$reviewobjectinfo[0]['ip_work_status']);?> </td>
						</tr>
						
					</table>
					
				</td>
			</tr>
			<tr>
				<td style="border: none; padding-top: 30px;" align="center">
					<table width="80%" align="center" cellpadding="0" cellspacing="0" border="0" style="border: none;">
						<tr>
							<td style="border: none; text-align: left;">
								<p style="padding-top: 20px; padding-bottom: 50px; color: #54718d; font-size: 35px;text-align: left; ">Present Valuation Certificate was created automatically for general understanding of the value of IP-work , and this Valuation Certificate could not be used for official records in corporate accounting balance sheets, for receiving bank loans and other financial and legal transactions.</p>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr style="border: none; width:100%; text-align: center; ">
				<td align="center" style="border: none; padding-top: 20px; text-align: center;" >
					<table align="center" width="80%" border="0" cellspacing="0" cellpadding="0" style="font-family:amiri;border: none; margin:20px 0;   text-align: center;">
						<tr  >
							<td align="center" style="border: none; padding-top: 30px; padding-left:20px;" >
								<div style="color: #1a1a1a;  font-size: 28px; margin: 5px; text-align: center;  ">Reg. No 6055547216-2 </div>
							</td>
							<td align="center" style="border: none; padding-top: 30px;" >
								<p style="color: #1a1a1a; font-size: 28px; margin: 5px; padding: 0;">
								Date of valuation: <?php echo date('M d, Y',strtotime($addeddate));?></p>
							</td>
							<td align="center" style="border: none; padding-top: 30px;" >
								<p style="color: #1a1a1a; font-size: 28px;margin:5px; padding: 0;">
								Valuation valid till: <?php echo date('M d, Y',strtotime($after3month));?></p> 
							</td>
						</tr>
					</table>
					<table align="center" width="90%" border="0" cellspacing="0" cellpadding="0" style="font-family:amiri;  text-align: center;">
						<tr>				 
							<td align="center" style="text-align:center;" >
								<p style="color: #1a1a1a; font-size: 28px; margin: 0 auto; padding: 30px; text-align:center;">
								<b>LONDON-RATE</b> International Office of  Online IP_Valuation is a brand name of  product of  Brit Management Consultants Ltd. (BMC Company), 
								Address: The Gridiron Building, Pancras Square, London, UK, N1C 4AG, www.londonrate. 
								The authenticity of present Valuation Certificate could be checked by scanning following QR-code </p>
							</td>
						</tr>
					</table>					
				</td>
			</tr>
			<tr style="border: none; ">
				<td align="center" style="border: none; " >
					<table align="center" width="1000px" border="0" cellspacing="0" cellpadding="0" style=" margin:20px 0; font-weight: bold; text-align: center;">
						<tr>
							<td align="center" valign="top" >
								<img width="360px" src="<?php echo base_url();?>templates/admin/assets/images/pdf/img-1.png" style="" alt="">
							</td>

							<td><img width="140px" src="<?php echo base_url();?>templates/admin/assets/images/pdf/arrow.png" style="" alt=""></td>

							<td align="center" valign="top" >
								<img width="360px" src="<?php echo base_url();?>templates/admin/assets/images/pdf/img-2.png" style="" alt="">
							</td>

							<td><img width="140px" src="<?php echo base_url();?>templates/admin/assets/images/pdf/arrow.png" style="" alt=""></td>

							<td align="center" valign="top" >
								<img width="360px" src="<?php echo base_url();?>templates/admin/assets/images/pdf/img-3.png" style="" alt="">
							</td>
						</tr>
					</table>					
					<table width="90%" style="margin-bottom: 30px;">
						<tr>
							<td width="30%" align="center" valign="top">
								<img src="<?php echo base_url();?>uploads/qrcode/<?php echo $qrcode_image_blue;?>" style="width: 200px; text-align: center;padding:10px 0;">
								<p style="font-size: 28px; font-weight: bold; margin: 0;color: #18325c; padding:5px 20px 0 ;">Download PDF Report</p>
							</td>
							<td></td>
							<td width="30%" align="center" valign="top" style="padding-left: 50px;">
								<img src="<?php echo base_url();?>uploads/qrcode/<?php echo $qrcode_image_black;?>" style="width: 200px; text-align: center;padding:10px 0;">
								<p style="font-size: 28px; font-weight: bold;  margin: 0;color: #18325c; padding:5px 20px 0;">Upgrade to Validation (KYC)</p>
							</td>
							<td></td>
							<td width="30%" align="center" valign="top" style="padding-left: 20px;">
								<img src="<?php echo base_url();?>uploads/qrcode/<?php echo $qrcode_image_black;?>" style="width: 200px; text-align: center;padding:10px 0;">
								<p style="font-size:28px; font-weight: bold;  margin: 0;color: #18325c; padding:5px 20px 0 40px;">Highest Class Valuation Report</p>
							</td>
						</tr>
					</table>						
				</td>
			</tr>
		</table>
	</td>
</tr>