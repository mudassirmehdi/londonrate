<tr>
	<td>
		<table  width="1160px" border="0" align="center" cellpadding="0" cellspacing="0" style="border: solid 3px #4B6A87; padding: 0; margin: 20px; background-image: url('<?php echo base_url();?>templates/admin/assets/images/pdf/shap-bgpng'); background-repeat:no-repeat; background-position: center 270px; " >
			<tr>
				<td align="center" style="margin-top: 40px;padding-top: 30px;">
					<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
						<tr>
							<td align="center" valign="top" style="padding-left: 30px">
								<img width="100px" src="<?php echo base_url();?>templates/admin/assets/images/pdf/hors-logo.png" alt="">
							</td>
							<td align="center" valign="top" >
								<img width="75%" src="<?php echo base_url();?>templates/admin/assets/images/pdf/universal.png" alt="">
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td align="center" style="padding-top: 30px;">
					<table width="1050" border="0" align="center" cellpadding="0" cellspacing="0">						
						<tr>								
							<td align="center" valign="top" >
								<h1 class="copperplatefont" style="font-family:Copperplate,Copperplate Gothic Light,fantasy; font-size: 48px;  color:#0a2f53;font-weight:bold">VALUATION CERTIFICATE ASSESSMENT SUMMARY </h1>
							</td>
						</tr>			
					</table>
				</td>
			</tr>
			<tr>
					<td align="center" style="padding-top: 30px;">
						<table class="tablepage1" width="1100" border="" align="center" cellpadding="0" cellspacing="0" >
							<tr>
								<td width="30%" style=" font-family:amiri;padding: 20px;   font-size: 30px; color:#001529; font-weight: bold; text-align:left;">Name of Customer</td>
								<td width="70%" style="padding: 20px; color: #53718d; font-size: 22px; font-weight: bold; text-align:left;"><?php echo $applicant_name;?></td>
							</tr>
							<tr>
								<td width="30%" style="font-family:amiri;padding: 20px;   font-size: 30px; color:#001529; font-weight: bold; text-align:left;">Type of IP-work</td>
								<td width="70%" style="padding: 20px; color: #53718d; font-size: 22px; font-weight: bold; text-align:left;"><?php echo $reviewobjectinfo[0]['type'];?></td>
							</tr>
							<tr>
								<td width="30%" style="font-family:amiri;padding: 20px;   font-size: 30px; color:#001529; font-weight: bold; text-align:left;">Name of IP-work</td>
								<td width="70%" style="padding: 20px; color: #53718d; font-size: 22px; font-weight: bold; text-align:left;"><?php echo $reviewobjectinfo[0]['ip_work_title'];?> </td>
							</tr>								
						</table>
					</td>
				</tr>
				<tr  align="center"  style="border: none; ">
					<td align="center" style="border: none; padding-top: 30px;">
						<table width="1050" style="border: none; " align="center" cellpadding="5" cellspacing="5" >
						<tr style="border: none; ">
							<td colspan="3"  style="font-family:Copperplate,Copperplate Gothic Light,fantasy;border: none; padding-top: 10px; text-align:center;">
								<h2  style="font-family:Copperplate,Copperplate Gothic Light,fantasy;font-size: 32pt; padding:10px; margin:10px 0; color:#092f56">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size: 45px;">II S</span>UBMITTED <span style="font-size: 45px;">D</span>ATA<span style="font-size: 45px;"> A</span>ND <span style="font-size: 45px;">V</span>ALUATION <span style="font-size: 45px;">R</span>ESULTS: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h2>
								<div  style="font-family:Copperplate,Copperplate Gothic Light,fantasy;font-style:normal;font-weight:bold;font-size:21pt;color:#092f56;margin-bottom:10px;">HOW OLD IS THE COMPANY: <span style="font-size: 38px;font-weight:normal;"><?php echo $pdf_age;?> YEARS</span></div>
								<div  style="font-family:Copperplate,Copperplate Gothic Light,fantasy;font-style:normal;font-weight:bold;font-size:21pt;color:#092f56;margin-bottom:10px;">TOTAL SALARIES, MONTHLY: <span style="font-size: 38px;font-weight:normal;"><?php echo $average_salaries;?> USD</span></div>
								<div  style="font-family:Copperplate,Copperplate Gothic Light,fantasy;font-style:normal;font-weight:bold;font-size:21pt;color:#092f56;margin-bottom:10px;">TOTAL SALES, MONTHLY: <span style="font-size: 38px;font-weight:normal;"><?php echo $average_sales;?>  USD</span></div>
								<div  style="font-family:Copperplate,Copperplate Gothic Light,fantasy;font-style:normal;font-weight:bold;font-size:21pt;color:#092f56;margin-bottom:10px;">NET PROFILE, MONTHLY: <span style="font-size: 38px;font-weight:normal;"><?php echo $average_net_profit;?> USD</span></div>
								<div  style="font-family:Copperplate,Copperplate Gothic Light,fantasy;font-style:normal;font-weight:bold;font-size:21pt;color:#092f56;margin-bottom:10px;">TOTAL MARKET BUDGET, MONTHLY: <span style="font-size: 38px;font-weight:normal;"><?php echo $average_budget;?>  USD</span></div>
							</td>
						</tr>
						</table>
					</td>
				</tr>	
				<tr>
					<td align="center" style="padding-top: 10px;">
						 <table width="1250" style="font-family:Copperplate,Copperplate Gothic Light,fantasy;" border="1" align="center" cellpadding="0" cellspacing="0" >							
								<tr>
									<td rowspan="2" style="font-family:Copperplate,Copperplate Gothic Light,fantasy;padding: 20px; color: #fff; font-size: 24px; font-weight: bold; background-color:#0a2f53; ">#</td>
									<td rowspan="2" style="font-family:Copperplate,Copperplate Gothic Light,fantasy;padding: 20px; color: #fff; font-size: 32px; font-weight: bold; background-color:#0a2f53;">POSSIBLE BENEFIT</td>
									<td colspan="3" style="font-family:Copperplate,Copperplate Gothic Light,fantasy;padding: 20px; color: #fff; font-size: 24px; text-align: center; background-color:#0a2f53;">USD</td>									
								</tr>
								<tr>
									<td style="font-family:Copperplate,Copperplate Gothic Light,fantasy; padding: 20px; color: #fff; font-size: 24px; text-align: center; background-color:#0a2f53;">MINIMUM</td>
									<td style="font-family:Copperplate,Copperplate Gothic Light,fantasy;padding: 20px; color: #fff; font-size: 24px; text-align: center; background-color:#0a2f53;">STANDARD</td>
									<td style="font-family:Copperplate,Copperplate Gothic Light,fantasy;padding: 20px; color: #fff; font-size: 24px; text-align: center; background-color:#0a2f53;">MAXIMUM</td>
								</tr>
								<tr>
									<td width="5%" style="padding: 20px; color: #53718d; font-size: 24px; font-weight: bold;">1</td>
									<td width="35%" style="text-align:left;padding: 20px; color: #093057; font-size: 24px; font-weight: bold;"><?php echo $arrValues[0]['benefits']; ?></td>
									<td width="20%" style="text-align:right;padding: 20px; color: #747474; font-size: 24px; font-weight: bold;"><?php echo $arrValues[0]['min']; ?></td>
									<td width="20%" style="text-align:right;padding: 20px; color: #747474; font-size: 24px; font-weight: bold;"><?php echo $arrValues[0]['std']; ?></td>
									<td width="20%" style="text-align:right;padding: 20px; color: #747474; font-size: 24px; font-weight: bold;"><?php echo $arrValues[0]['max']; ?></td>
								</tr>
								<tr>
									<td width="5%" style="padding: 20px; color: #093057; font-size: 24px; font-weight: bold;">2</td>
									<td width="35%" style="text-align:left;padding: 20px; color: #093057; font-size: 24px; font-weight: bold;"><?php echo $arrValues[1]['benefits']; ?></td>
									<td width="20%" style="text-align:right;padding: 20px; color: #747474; font-size: 24px; font-weight: bold;"><?php echo $arrValues[1]['min']; ?></td>
									<td width="20%" style="text-align:right;padding: 20px; color: #747474; font-size: 24px; font-weight: bold;"><?php echo $arrValues[1]['std']; ?></td>
									<td width="20%" style="text-align:right;padding: 20px; color: #747474; font-size: 24px; font-weight: bold;"><?php echo $arrValues[1]['max']; ?></td>
								</tr>
								<tr>
									<td width="5%" style="padding: 20px; color: #093057; font-size: 24px; font-weight: bold;">3</td>
									<td width="35%" style="text-align:left;padding: 20px; color: #093057; font-size: 24px; font-weight: bold;"><?php echo $arrValues[2]['benefits']; ?></td>
									<td width="20%" style="text-align:right;padding: 20px; color: #747474; font-size: 24px; font-weight: bold;"><?php echo $arrValues[2]['min']; ?></td>
									<td width="20%" style="text-align:right;padding: 20px; color: #747474; font-size: 24px; font-weight: bold;"><?php echo $arrValues[2]['std']; ?></td>
									<td width="20%" style="text-align:right;padding: 20px; color: #747474; font-size: 24px; font-weight: bold;"><?php echo $arrValues[2]['max']; ?></td>
								</tr>
								<tr>
									<td width="5%" style="padding: 20px; color: #093057; font-size: 24px; font-weight: bold;">4</td>
									<td width="35%" style="text-align:left;padding: 20px; color: #093057; font-size: 24px; font-weight: bold;"><?php echo $arrValues[3]['benefits']; ?></td>
									<td width="20%" style="text-align:right;padding: 20px; color: #747474; font-size: 24px; font-weight: bold;"><?php echo $arrValues[3]['min']; ?></td>
									<td width="20%" style="text-align:right;padding: 20px; color: #747474; font-size: 24px; font-weight: bold;"><?php echo $arrValues[3]['std']; ?></td>
									<td width="20%" style="text-align:right;padding: 20px; color: #747474; font-size: 24px; font-weight: bold;"><?php echo $arrValues[3]['max']; ?></td>
								</tr>
								<tr>
									<td width="5%" style="padding: 10px; color: #093057; font-size: 24px; font-weight: bold;">5</td>
									<td width="35%" style="text-align:left;padding: 20px; color: #093057; font-size: 24px; font-weight: bold;"><?php echo $arrValues[4]['benefits']; ?></td>
									<td width="20%" style="text-align:right;padding: 20px; color: #747474; font-size: 24px; font-weight: bold;"><?php echo $arrValues[4]['min']; ?></td>
									<td width="20%" style="text-align:right;padding: 20px; color: #747474; font-size: 24px; font-weight: bold;"><?php echo $arrValues[4]['std']; ?></td>
									<td width="20%" style="text-align:right;padding: 20px; color: #747474; font-size: 24px; font-weight: bold;"><?php echo $arrValues[4]['max']; ?></td>
								</tr>
								<tr>
									<td width="5%" style="padding: 20px; color: #093057; font-size: 24px; font-weight: bold;">6</td>
									<td width="35%" style="text-align:left;padding: 20px; color: #093057; font-size: 24px; font-weight: bold;"><?php echo $arrValues[5]['benefits']; ?></td>
									<td width="20%" style="text-align:right;padding: 20px; color: #747474; font-size: 24px; font-weight: bold;"><?php echo $arrValues[5]['min']; ?></td>
									<td width="20%" style="text-align:right;padding: 20px; color: #747474; font-size: 24px; font-weight: bold;"><?php echo $arrValues[5]['std']; ?></td>
									<td width="20%" style="text-align:right;padding: 20px; color: #747474; font-size: 24px; font-weight: bold;"><?php echo $arrValues[5]['max']; ?></td>
								</tr>
								<tr>
									<td width="5%" style="padding: 20px; color: #093057; font-size: 24px; font-weight: bold;">7</td>
									<td width="35%" style="text-align:left;padding: 20px; color: #093057; font-size: 24px; font-weight: bold;"><?php echo $arrValues[6]['benefits']; ?></td>
									<td width="20%" style="text-align:right;padding: 20px; color: #747474; font-size: 24px; font-weight: bold;"><?php echo $arrValues[6]['min']; ?></td>
									<td width="20%" style="text-align:right;padding: 20px; color: #747474; font-size: 24px; font-weight: bold;"><?php echo $arrValues[6]['std']; ?></td>
									<td width="20%" style="text-align:right;padding: 20px; color: #747474; font-size: 24px; font-weight: bold;"><?php echo $arrValues[6]['max']; ?></td>
								</tr>
								<tr>
									<td width="5%" style="padding: 20px; color: #093057; font-size: 24px; font-weight: bold;">8</td>
									<td width="35%" style="text-align:left;padding: 20px; color: #093057; font-size: 24px; font-weight: bold;"><?php echo $arrValues[7]['benefits']; ?></td>
									<td width="20%" style="text-align:right;padding: 20px; color: #747474; font-size: 24px; font-weight: bold;"><?php echo $arrValues[7]['min']; ?></td>
									<td width="20%" style="text-align:right;padding: 20px; color: #747474; font-size: 24px; font-weight: bold;"><?php echo $arrValues[7]['std']; ?></td>
									<td width="20%" style="text-align:right;padding: 20px; color: #747474; font-size: 24px; font-weight: bold;"><?php echo $arrValues[7]['max']; ?></td>
								</tr>
								<tr>
									<td width="5%" style="padding: 20px; color: #093057; font-size: 24px; font-weight: bold;">9</td>
									<td width="35%" style="text-align:left;padding: 20px; color: #093057; font-size: 24px; font-weight: bold;"><?php echo $arrValues[8]['benefits']; ?></td>
									<td width="20%" style="text-align:right;padding: 20px; color: #747474; font-size: 24px; font-weight: bold;"><?php echo $arrValues[8]['min']; ?></td>
									<td width="20%" style="text-align:right;padding: 20px; color: #747474; font-size: 24px; font-weight: bold;"><?php echo $arrValues[8]['std']; ?></td>
									<td width="20%" style="text-align:right;padding: 20px; color: #747474; font-size: 24px; font-weight: bold;"><?php echo $arrValues[8]['max']; ?></td>
								</tr>
								<tr>
									<td width="5%" style="padding: 20px; color: #093057; font-size: 24px; font-weight: bold;">10</td>
									<td width="35%" style="text-align:left;padding: 20px; color: #093057; font-size: 24px; font-weight: bold;"><?php echo $arrValues[9]['benefits']; ?></td>
									<td width="20%" style="text-align:right;padding: 20px; color: #747474; font-size: 24px; font-weight: bold;"><?php echo $arrValues[9]['min']; ?></td>
									<td width="20%" style="text-align:right;padding: 20px; color: #747474; font-size: 24px; font-weight: bold;"><?php echo $arrValues[9]['std']; ?></td>
									<td width="20%" style="text-align:right;padding: 20px; color: #747474; font-size: 24px; font-weight: bold;"><?php echo $arrValues[9]['max']; ?></td>
								</tr>								 
								<tr>
									<td width="5%" style="padding: 20px; color: #093057; font-size: 24px; font-weight: bold;">11</td>
									<td width="35%" style="text-align:left;padding: 20px; color: #093057; font-size: 24px; font-weight: bold;"><?php echo $arrValues[10]['benefits']; ?></td>
									<td width="20%" style="text-align:right;padding: 20px; color: #747474; font-size: 24px; font-weight: bold;"><?php echo $arrValues[10]['min']; ?></td>
									<td width="20%" style="text-align:right;padding: 20px; color: #747474; font-size: 24px; font-weight: bold;"><?php echo $arrValues[10]['std']; ?></td>
									<td width="20%" style="text-align:right;padding: 20px; color: #747474; font-size: 24px; font-weight: bold;"><?php echo $arrValues[10]['max']; ?></td>
								</tr>
								<tr>
									<td width="5%" style="padding: 20px; color: #093057; font-size: 24px; font-weight: bold;">12</td>
									<td width="35%" style="text-align:left;padding: 20px; color: #093057; font-size: 24px; font-weight: bold;"><?php echo $arrValues[11]['benefits']; ?></td>
									<td width="20%" style="text-align:right;padding: 20px; color: #747474; font-size: 24px; font-weight: bold;"><?php echo $arrValues[11]['min']; ?></td>
									<td width="20%" style="text-align:right;padding: 20px; color: #747474; font-size: 24px; font-weight: bold;"><?php echo $arrValues[11]['std']; ?></td>
									<td width="20%" style="text-align:right;padding: 20px; color: #747474; font-size: 24px; font-weight: bold;"><?php echo $arrValues[11]['max']; ?></td>
								</tr>
								<tr>
									<td width="5%" style="padding: 20px; color: #093057; font-size: 24px; font-weight: bold;">13</td>
									<td width="35%" style="text-align:left;padding: 20px; color: #093057; font-size: 24px; font-weight: bold;"><?php echo $arrValues[12]['benefits']; ?></td>
									<td width="20%" style="text-align:right;padding: 20px; color: #747474; font-size: 24px; font-weight: bold;"><?php echo $arrValues[12]['min']; ?></td>
									<td width="20%" style="text-align:right;padding: 20px; color: #747474; font-size: 24px; font-weight: bold;"><?php echo $arrValues[12]['std']; ?></td>
									<td width="20%" style="text-align:right;padding: 20px; color: #747474; font-size: 24px; font-weight: bold;"><?php echo $arrValues[12]['max']; ?></td>
								</tr>
								<tr>
									<td width="5%" style="padding: 20px; color: #093057; font-size: 24px; font-weight: bold;">14</td>
									<td width="35%" style="text-align:left;padding: 20px; color: #093057; font-size: 24px; font-weight: bold;"><?php echo $arrValues[13]['benefits']; ?></td>
									<td width="20%" style="text-align:right;padding: 20px; color: #747474; font-size: 24px; font-weight: bold;"><?php echo $arrValues[13]['min']; ?></td>
									<td width="20%" style="text-align:right;padding: 20px; color: #747474; font-size: 24px; font-weight: bold;"><?php echo $arrValues[13]['std']; ?></td>
									<td width="20%" style="text-align:right;padding: 20px; color: #747474; font-size: 24px; font-weight: bold;"><?php echo $arrValues[13]['max']; ?></td>
								</tr>
								<tr>
									<td width="5%" style="padding: 20px; color: #093057; font-size: 24px; font-weight: bold;">15</td>
									<td width="35%" style="text-align:left;padding: 20px; color: #093057; font-size: 24px; font-weight: bold;"><?php echo $arrValues[14]['benefits']; ?></td>
									<td width="20%" style="text-align:right;padding: 20px; color: #747474; font-size: 24px; font-weight: bold;"><?php echo $arrValues[14]['min']; ?></td>
									<td width="20%" style="text-align:right;padding: 20px; color: #747474; font-size: 24px; font-weight: bold;"><?php echo $arrValues[14]['std']; ?></td>
									<td width="20%" style="text-align:right;padding: 20px; color: #747474; font-size: 24px; font-weight: bold;"><?php echo $arrValues[14]['max']; ?></td>
								</tr> 						 
								<tr>
									<td width="5%" style="padding: 20px; color: #093057; font-size: 24px; font-weight: bold;">16</td>
									<td width="35%" style="text-align:left;padding: 20px; color: #093057; font-size: 24px; font-weight: bold;">Average Value (UNIVERSAL):</td>
									<td colspan="3" width="20%" style="padding: 20px; color: #747474; font-size: 24px; font-weight: bold; text-align: center;"><?Php echo $arrValues['avgstd'];?> USD</td>
								</tr>
							</table>
					</td>
				</tr>
				<?php $this->load->view('pdffooter',$arrValues); ?>
		</table>
	</td>
</tr>