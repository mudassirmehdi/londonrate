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
					<td align="center" style="border: none; padding-top: 30px;">
						<table width="950" style="border: none; " align="center" cellpadding="5" cellspacing="5" >
						<tr style="border: none; ">
							<td colspan="3" style="border: none; padding-top: 30px;">
								<h2 style="font-size: 35px; padding:20px; margin:20px 0; color:#0a2f53">II. SUBMITTED DATA AND VALUATION RESULTS: </h2>
								<p  style="font-size: 20px; padding-bottom:20px; margin:20px 0; color:#0a2f53"><b>HOW OLD IS THE COMPANY:</b> <?php echo $pdf_age;?> YEARS </p>
								<p  style="font-size: 20px; padding-bottom; margin:20px 0; color:#0a2f53"><b>HOW OLD IS THE COMPANY:</b> <?php echo $average_salaries;?> USD</p>
								<p  style="font-size: 20px; padding-bottom; margin:20px 0; color:#0a2f53"><b>HOW OLD IS THE COMPANY:</b> <?php echo $average_sales;?>  USD</p>
								<p  style="font-size: 20px;padding-bottom;  margin:20px 0; color:#0a2f53"><b>HOW OLD IS THE COMPANY:</b> <?php echo $average_net_profit;?> USD</p>
								<p  style="font-size: 20px; padding-bottom; margin:20px 0; color:#0a2f53"><b>HOW OLD IS THE COMPANY:</b> <?php echo $average_net_profit;?> USD</p>
							</td>
						</tr>
						</table>
					</td>
				</tr>	
				<tr>
					<td align="center" style="padding-top: 30px;">
						<table width="950" style="" border="1" align="center" cellpadding="0" cellspacing="0" >
							<tr>
								<td rowspan="2" style="padding: 10px; color: #fff; font-size: 18px; font-weight: bold; background-color:#0a2f53; ">#</td>
								<td rowspan="2" style="padding: 10px; color: #fff; font-size: 18px; font-weight: bold; background-color:#0a2f53;">POSSIBLE BENEFIT</td>
								<td colspan="3" style="padding: 10px; color: #fff; font-size: 14px; text-align: center; background-color:#0a2f53;">USD</td>
							</tr>
							<tr>
								<td style="padding: 10px; color: #fff; font-size: 14px; text-align: center; background-color:#0a2f53;">MINIMUM</td>
								<td style="padding: 10px; color: #fff; font-size: 14px; text-align: center; background-color:#0a2f53;">STANDARD</td>
								<td style="padding: 10px; color: #fff; font-size: 14px; text-align: center; background-color:#0a2f53;">MAXIMUM</td>
							</tr>
							<?php 
							$i=1;
							$cnt_arrValues=count($arrValues)-1;
							if(isset($arrValues) && count($arrValues)>0)
							{
								 foreach($arrValues as $ar)
								 { ?>
									<tr>
										<td width="5%" style="padding: 10px; color: #000; font-size: 18px; font-weight: bold;"><?php echo $i;?></td>.
										<td width="35%" style="padding: 10px; color: #53718d; font-size: 18px; font-weight: bold;"><?php  echo $ar['benefits'];?></td>
										<td width="20%" style="padding: 10px; color: #000; font-size: 18px; font-weight: bold;"><?php echo $ar['min'];?></td>.
										<td width="20%" style="padding: 10px; color: #53718d; font-size: 18px; font-weight: bold;"><?php echo $ar['std'];?></td>
										<td width="20%" style="padding: 10px; color: #000; font-size: 18px; font-weight: bold;"><?php echo $ar['max'];?></td>.
									</tr>
							<?php $i++;
								}
							} ?>
							
							<tr>
								<td width="5%" style="padding: 10px; color: #000; font-size: 18px; font-weight: bold;">#</td>.
								<td width="35%" style="padding: 10px; color: #53718d; font-size: 18px; font-weight: bold;">Market Value of IP</td>
								<td colspan="3" width="20%" style="padding: 10px; color: #000; font-size: 18px; font-weight: bold; text-align: center;"><?Php echo $arrValues['avgstd'];?> USD</td>
							</tr>
						</table>
					</td>
				</tr>
				<?php $this->load->view('pdffooter',$arrValues); ?>
			</table>
		</td>
	</tr>