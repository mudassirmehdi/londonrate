<tr>
	<td>
		<table  width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="border: solid 3px #4B6A87; padding-top: 20px; margin: 20px; background-image: url('<?php echo base_url();?>templates/admin/assets/images/pdf/shape-bg1.png'); background-repeat:no-repeat; background-position: center 10px; " >
			<tr>
				<td align="center" style="padding-top: 30px;">
					<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
						<tr>
							<td align="center" valign="top" style="padding-left: 30px">
								<img width="25%" src="<?php echo base_url();?>templates/admin/assets/images/pdf/hors-logo.png" alt="">
							</td>
							<td align="left" valign="top" style="padding-left: 55%;padding-top: 30px;">
								<img width="100%" src="<?php echo base_url();?>templates/admin/assets/images/pdf/universal.png" alt="">
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
								<td width="30%" style=" font-family:amiri;padding: 20px;   font-size: 35px; color:#001529; font-weight: bold; text-align:left;">Name of Customer</td>
								<td width="70%" style="padding: 20px; color: #53718d; font-size: 35px; font-weight: bold; text-align:left;"><?php echo $applicant_name;?></td>
							</tr>
							<tr>
								<td width="30%" style="font-family:amiri;padding: 20px;   font-size: 35px; color:#001529; font-weight: bold; text-align:left;">Type of IP-work</td>
								<td width="70%" style="padding: 20px; color: #53718d; font-size: 35px; font-weight: bold; text-align:left;"><?php echo $reviewobjectinfo[0]['type'];?></td>
							</tr>
							<tr>
								<td width="30%" style="font-family:amiri;padding: 20px;   font-size: 35px; color:#001529; font-weight: bold; text-align:left;">Name of IP-work</td>
								<td width="70%" style="padding: 20px; color: #53718d; font-size: 35px; font-weight: bold; text-align:left;"><?php echo $reviewobjectinfo[0]['ip_work_title'];?></td>
							</tr>								
						</table>
					</td>
				</tr>
				<tr  align="center">
					<td align="center" style="border: none; padding-top: 5px;">
						<table width="80%" style="border: none; " align="center" cellpadding="5" cellspacing="5" >
						<tr >
							<td colspan="3"  style="font-family:Copperplate,Copperplate Gothic Light,fantasy;border: none; padding-top: 10px; text-align:center;">
								<h2  style="font-family:Copperplate,Copperplate Gothic Light,fantasy;font-size: 50px;color:#092f56">II Submitted Data And Valuation Results:</h2>
								<table>
									 
									<tr>
									<td style="text-align:right;padding: 10px 0;"><div  style="font-family:Copperplate,Copperplate Gothic Light,fantasy;font-style:normal;font-weight:bold;font-size:28px;color:#092f56;margin-bottom:20px;">HOW OLD IS THE COMPANY: </div></td>
									<td style="text-align:left;padding: 10px 0 10px 10px;"><span style="font-family:Copperplate,Copperplate Gothic Light,fantasy;font-size: 28px;font-weight:normal;"><?php echo $pdf_age;?> YEARS</span> </td>
									
									</tr>
									<tr>
									<td style="text-align:right;padding: 10px 0;"><div  style="font-family:Copperplate,Copperplate Gothic Light,fantasy;font-style:normal;font-weight:bold;font-size:28px;color:#092f56;margin-bottom:20px;">TOTAL SALARIES, MONTHLY:</div></td>
									<td style="text-align:left;padding: 10px 0 10px 10px;"><span style="font-family:Copperplate,Copperplate Gothic Light,fantasy;font-size: 28px;font-weight:normal;"><?php echo number_format($average_salaries);?> USD</span> </td>
									
									</tr>
									<tr>
									<td style="text-align:right;padding: 10px 0;"><div  style="font-family:Copperplate,Copperplate Gothic Light,fantasy;font-style:normal;font-weight:bold;font-size:28px;color:#092f56;margin-bottom:20px;">TOTAL SALES, MONTHLY: </div></td>
									<td style="text-align:left;padding: 10px 0 10px 10px;"><span style="font-family:Copperplate,Copperplate Gothic Light,fantasy;font-size: 28px;font-weight:normal;"><?php echo number_format($average_sales);?> USD</span> </td>
									
									</tr>
									<tr>
									<td style="text-align:right;padding: 10px 0;"><div  style="font-family:Copperplate,Copperplate Gothic Light,fantasy;font-style:normal;font-weight:bold;font-size:28px;color:#092f56;margin-bottom:20px;">NET PROFILE, MONTHLY:</div></td>
									<td style="text-align:left;padding: 10px 0 10px 10px;"><span style="font-family:Copperplate,Copperplate Gothic Light,fantasy;font-size: 28px;font-weight:normal;"><?php echo number_format($average_net_profit);?> USD</span> </td>
									
									</tr>
									<tr>
									<td style="text-align:right;padding: 10px 0;"><div  style="font-family:Copperplate,Copperplate Gothic Light,fantasy;font-style:normal;font-weight:bold;font-size:28px;color:#092f56;margin-bottom:20px;">TOTAL MARKET BUDGET, MONTHLY:</div></td>
									<td style="text-align:left;padding: 10px 0 10px 10px;"><span style="font-family:Copperplate,Copperplate Gothic Light,fantasy;font-size: 28px;font-weight:normal;"><?php echo number_format($average_budget);?> USD</span> </td>
									</tr>
								</table>
								
								
							</td>
						</tr>
						</table>
					</td>
				</tr>	
				<tr>
					<td align="center" style="padding-top: 10px; ">
						 <table  style="width:1800px" border="1" align="center" cellpadding="0" cellspacing="0" >							
								<tr>
									<th width="5%" rowspan="2" style=" font-family:Copperplate,Copperplate Gothic Light,fantasy;padding: 5px; color: #fff; font-size: 35px; font-weight: bold; background-color:#0a2f53; ">#</th>
									<th width="50%" rowspan="2" style="border-right:2px solid #ffffff; border-left:2px solid #ffffff;font-family:Copperplate,Copperplate Gothic Light,fantasy;padding: 15px 5px; color: #fff; font-size: 35px; font-weight: bold; background-color:#0a2f53;">POSSIBLE BENEFIT</th>
									<th colspan="3" width="45%" style="border:2px solid #ffffff; font-family:Copperplate,Copperplate Gothic Light,fantasy;padding: 5px; color: #fff; font-size: 24px; text-align: center; background-color:#0a2f53; border-bottom:2px solid #ffffff;">USD</th>									
								</tr>
								<tr>
									<th style="font-family:Copperplate,Copperplate Gothic Light,fantasy; padding: 40px 5px; color: #fff; font-size: 24px; text-align: center; background-color:#0a2f53; border-top:2px solid #ffffff;border-right:2px solid #ffffff; border-left:2px solid #ffffff;">MINIMUM</th>
									<th style="font-family:Copperplate,Copperplate Gothic Light,fantasy;padding:  40px 5px; color: #fff; font-size: 24px; text-align: center; background-color:#0a2f53; border-top:2px solid #ffffff; border-right:2px solid #ffffff; border-left:2px solid #ffffff;">STANDARD</th>
									<th style="font-family:Copperplate,Copperplate Gothic Light,fantasy;padding:  40px 5px; color: #fff; font-size: 24px; text-align: center; background-color:#0a2f53;border-top:2px solid #ffffff; border-left:2px solid #ffffff;">MAXIMUM</th>
								</tr>
								
								<?php 
								$cnt = 0;
								for($i=0;$i<15;$i++)
								{?>
									<tr>
									<td width="5%" style="padding: 5px; color: #53718d; font-size: 40px; font-weight: bold;"><?php echo $i+1; ?></td>
									<td width="50%" style="text-align:left;padding: 5px; color: #093057; font-size: 40px; font-weight: bold;"><?PHP echo  $arrValues[$i]['benefits'];?></td>
									<td width="15%" style="text-align:right;padding: 5px; color: #747474; font-size: 40px; font-weight: bold;"><?php echo number_format($arrValues[$i]['min']); ?></td>
									<td width="15%" style="text-align:right;padding: 5px; color: #747474; font-size: 40px; font-weight: bold;"><?php echo number_format($arrValues[$i]['std']); ?></td>
									<td width="15%" style="text-align:right;padding: 5px; color: #747474; font-size: 40px; font-weight: bold;"><?php echo number_format($arrValues[$i]['max']); ?></td>
								</tr>
								<?php 
								
								}	
								?>
												 
								<tr>
									<td width="5%" style="padding: 5px; color: #53718d; font-size: 40px; font-weight: bold;">16</td>
									<td width="50%" style="text-align:left;padding: 5px; color: #093057; font-size: 40px; font-weight: bold;">Average Value (UNIVERSAL):</td>
									<td colspan="3" width="45%" style="padding: 5px; color: #747474; font-size: 40px; font-weight: bold; text-align: center;"><?Php echo $arrValues['avgstd'];?> USD</td>
								</tr>
							</table>
					</td>
				</tr>


			 <tr>
				<td align="center" style="border: none; padding-top: 20px; text-align: center;" >
					<table align="center" width="80%" border="0" cellspacing="0" cellpadding="0" style="font-family:amiri;margin:20px 0; text-align: center;">
						<tr  >
							<td align="center"  >
								<div style="color: #1a1a1a;  font-size: 35px; margin: 5px; text-align: center;  ">Reg. No 6055547216-2 </div>
							</td>
							<td align="center" style="border: none; " >
								<p style="color: #1a1a1a; font-size: 35px; margin: 5px; padding: 0;">
								Date of valuation: <?php echo date('M d, Y',strtotime($addeddate));?></p>
							</td>
							<td align="center" style="border: none;" >
								<p style="color: #1a1a1a; font-size: 35px;margin:5px; padding: 0;">
								Valuation valid till: <?php echo date('M d, Y',strtotime($after3month));?></p> 
							</td>
						</tr>
					</table>
					<table align="center" width="90%" border="0" cellspacing="0" cellpadding="0" style="font-family:amiri;  text-align: center;">
						<tr>				 
							<td align="center" style="text-align:center;" >
								<p style="color: #1a1a1a; font-size: 32px; margin: 0 auto; padding: 30px; text-align:center;">
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
					<table align="center" width="1600px" border="0" cellspacing="0" cellpadding="0" style=" margin:20px 0; font-weight: bold; text-align: center;">
						<tr>
							<td align="center" valign="top" >
								<img width="480px" src="<?php echo base_url();?>templates/admin/assets/images/pdf/img-1.png" style="" alt="">
							</td>

							<td><img width="160px" src="<?php echo base_url();?>templates/admin/assets/images/pdf/arrow.png" style="" alt=""></td>

							<td align="center" valign="top" >
								<img width="480px" src="<?php echo base_url();?>templates/admin/assets/images/pdf/img-2.png" style="" alt="">
							</td>

							<td><img width="160px" src="<?php echo base_url();?>templates/admin/assets/images/pdf/arrow.png" style="" alt=""></td>

							<td align="center" valign="top" >
								<img width="480px" src="<?php echo base_url();?>templates/admin/assets/images/pdf/img-3.png" style="" alt="">
							</td>
						</tr>
					</table>					
					<table width="90%" style="margin-bottom:30px;" >
						<tr>
							<td width="30%" align="center" valign="top" >
								<img src="<?php echo base_url();?>uploads/qrcode/<?php echo $qrcode_image_blue;?>" style="width: 250px; text-align: center;padding:10px 0;">
								<p style="font-size: 32px; font-weight:bold;  margin: 0;color: #18325c; padding:5px 0;">Download PDF Report</p>
							</td>
							<td></td>
							<td width="30%" align="center" valign="top" style="padding-left:80px;">
								<img src="<?php echo base_url();?>uploads/qrcode/<?php echo $qrcode_image_black;?>" style="width: 250px; text-align: center;padding:10px 0;">
								<p style="font-size: 32px; font-weight:bold;  margin: 0;color: #18325c; padding:5px 0;">Upgrade to Validation (KYC)</p>
							</td>
							<td></td>
							<td width="35%" align="center" valign="top" style="padding-left:100px;">
								<img src="<?php echo base_url();?>uploads/qrcode/<?php echo $qrcode_image_black;?>" style="width: 250px; text-align: center;padding:10px 0;">
								<p style="font-size: 32px; margin: 0; font-weight:bold;color: #18325c; padding:5px 0 15px;">Highest Class Valuation Report</p>
							</td>
						</tr>
					</table>						
				</td>
			</tr>
		</table>
	</td>
</tr>