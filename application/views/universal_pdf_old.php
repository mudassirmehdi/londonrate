<!DOCTYPE html>
<html lang="en">
<head>
<title>Certification</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&display=swap" rel="stylesheet">
</head>
<body  style="margin: 0 ; padding: 0;"  align="center">
	<table width="1000px" border="0" align="center" cellpadding="0" cellspacing="0" style="margin: 0 auto; padding: 15px; background-image: url('<?php echo base_url();?>templates/frontend/images/bg.jpg'); background-repeat:repeat; ">

	<!-- START HEADER/BANNER -->
		<tr>
			<td>
			<table  width="1000px" border="0" align="center" cellpadding="0" cellspacing="0" style="margin: 0 auto; padding: 15px; border: solid 1px #000; ">
				<tr>
					<td align="center">
						<table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
							<tr>
								<td align="center" valign="top" >
									<h1 style="font-size: 50px; margin:10px 0; color:#0a2f53">VALUATION CERTIFICATE </h1>
								</td>
							</tr>
							<tr>
								<td align="center" valign="top" >
									<img src="logo.png" alt="">
								</td>
							</tr>
							<tr>
								<td align="center" valign="top" style="font-size: 30px; margin:20px 0; color:#0a2f53; font-weight: bold;" >
									<u>INTERNATIONAL OFFICE FOR ONLINE IP-VALUATION</u>
								</td>
							</tr>
							<tr>
								<td align="center" valign="top" >
									<div style="font-size: 50px; color: #e9ba29; margin:80px 0; font-weight: bold;">COVER STATEMENT</div>
								</td>
							</tr>
							<tr>
								<td align="center" valign="top" >
									<div style="font-size: 30px;  margin:10px 0; color:#0a2f53; font-weight: bold;">I. TYPE OF VALUE OF INTELLECTUAL PROPERTY:</div>
								</td>
							</tr>

							<tr>
								<td align="center" valign="top" >
									<img width="100px" src="<?php echo base_url();?>templates/frontend/images/star.png" alt="">
								</td>
							</tr>

							<tr>
								<td align="center" valign="top" >
									<div style="font-size: 90px; color: #0a2f53; margin:10px 0; border: solid 5px #0a2f53; padding:0 20px; border-radius: 20px; width: 570px;font-weight: bold;">UNIVERSAL </div>
								</td>
							</tr>
							<tr>
								
								<td align="center" valign="top" >
									<div style="font-size: 90px; color: #0a2f53; margin:10px 0; padding:0 20px; font-weight: bold;">€ <?Php echo $arrValues['avgstd'];?> </div>
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr>
					<td align="center">
						<table width="800" style="" border="1" align="center" cellpadding="0" cellspacing="0" >
							<tr>
								<td width="30%" style="padding: 15px; color: #000; font-size: 22px; font-weight: bold;">Name of Customer</td>.
								<td width="70%" style="padding: 15px; color: #53718d; font-size: 22px; font-weight: bold;"><?php echo $applicant_name;?></td>
							</tr>
							<tr>
								<td width="30%" style="padding: 15px; color: #000; font-size: 22px; font-weight: bold;">Type of IP-work</td>.
								<td width="70%" style="padding: 15px; color: #53718d; font-size: 22px; font-weight: bold;"><?php echo $reviewobjectinfo[0]['type'];?></td>
							</tr>
							<tr>
								<td width="30%" style="padding: 15px; color: #000; font-size: 22px; font-weight: bold;">Name of IP-work</td>.
								<td width="70%" style="padding: 15px; color: #53718d; font-size: 22px; font-weight: bold;"><?php echo $reviewobjectinfo[0]['ip_work_title'];?> </td>
							</tr>
							<tr>
								<td width="30%" style="padding: 15px; color: #000; font-size: 22px; font-weight: bold;">Type of Service</td>.
								<td width="70%" style="padding: 15px; color: #53718d; font-size: 22px; font-weight: bold;">UNIVERSAL Service Package of London-Rate System (Free of Charge) </td>
							</tr>
							<tr>
								<td width="30%" style="padding: 15px; color: #000; font-size: 22px; font-weight: bold;">Validation (KYC) of Customer</td>.
								<td width="70%" style="padding: 15px; color: #53718d; font-size: 22px; font-weight: bold;"><b style="color: #cd363b">NOT PROVIDED </b>(KYC Validation of Customer is available only in VALIDATION Package) </td>
							</tr>
							<tr>
								<td width="30%" style="padding: 15px; color: #000; font-size: 22px; font-weight: bold;">Verification of Submitted Data </td>.
								<td width="70%" style="padding: 15px; color: #53718d; font-size: 22px; font-weight: bold;"><b style="color: #cd363b">NOT PROVIDED </b>(Expert Examination and Verification of Economic, Financial Indicators, Legal and IP issues available only in VERIFICATION Package) </td>
							</tr>
						</table>
					</td>
				</tr>

			<!-- END WHAT WE DO -->

			<!-- START FOOTER -->

				<tr>
					<td align="center">
						<table align="center" width="800" border="0" cellspacing="0" cellpadding="0" style="margin:40px 0; font-weight: bold;">
							<tr>
								<td width="40%" valign="top" style="padding: 0 10px 0 0;">
									<p style="color: #53718d; font-weight: bold; font-size: 25px; margin: 0;">Reg. No 6055547216-2 </p>
									<p style="color: #53718d; font-size: 18px;font-weight: bold; ">The authenticity of present Valuation Certificate could be checked by scanning following QR-code </p>
									<p style="color: #53718d; font-size: 18px;"><b style="font-size: 20px;">Date of valuation:</b> <?php echo date('M d, Y',strtotime($addeddate));?></p>
									<p style="color: #53718d; font-size: 18px;"><b style="font-size: 20px;">Valuation valid till:</b> <?php echo date('M d, Y',strtotime($after3month));?></p> 
								</td>
								<td width="25%" align="center" valign="top">
									<img src="<?php echo base_url();?>uploads/qrcode/<?php echo $qrcode_image;?>" style="width: 200px; text-align: center;">
								</td>

								<td width="35%" valign="top" style="padding: 0 0 0 15px;">
									<p style="color: #53718d; font-size: 18px; margin: 0 0 15px 0; font-weight: bold;"><b style="font-size: 20px; ">LONDON-RATE</b> International Office of Online IP_Valuation is a brand name of product of Brit Management Consultants Ltd. (BMC Company), The Gridiron Building, 1 Pancras Square, London, UK, N1C 4AG </p>
									<a href="https://londonrate.org/" style="color: #53718d; font-weight: bold; font-size: 25px; "	>www.londonrate.org  </a> 
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			</td>
		</tr>
	</table>	
</body>