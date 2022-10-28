<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/images/favicon/1.png" type="image/x-icon">
    <link rel="shortcut icon" href="../assets/images/favicon/1.png" type="image/x-icon">
    <title>London Rate | Package order place</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">

    <style type="text/css">
        body {
            text-align: center;
            margin: 0 auto;
            width: 650px;
            font-family: 'Open Sans', sans-serif;
            background-color: #e2e2e2;
            display: block;
        }

        ul {
            margin: 0;
            padding: 0;
        }

        li {
            display: inline-block;
            text-decoration: unset;
        }

        a {
            text-decoration: none;
        }

        p {
            margin: 15px 0;
        }

        h5 {
            color: #444;
            text-align: left;
            font-weight: 400;
        }

        .text-center {
            text-align: center
        }

        .main-bg-light {
            background-color: #fafafa;
        }

        .title {
            color: #444444;
            font-size: 20px;
            font-weight: bold;
            margin-top: 10px;
            margin-bottom: 10px;
            padding-bottom: 0;
            text-transform: uppercase;
            display: inline-block;
            line-height: 1;
        }

        table {
            margin-top: 30px
        }

        table.top-0 {
            margin-top: 0;
        }

        table.order-detail {
            border: 1px solid #ddd;
            border-collapse: collapse;
        }

        table.order-detail tr:nth-child(even) {
            border-top: 1px solid #ddd;
            border-bottom: 1px solid #ddd;
        }

        table.order-detail tr:nth-child(odd) {
            border-bottom: 1px solid #ddd;
        }

        .pad-left-right-space {
            border: unset !important;
        }

        .pad-left-right-space td {
            padding: 5px 15px;
        }

        .pad-left-right-space td p {
            margin: 0;
        }

        .pad-left-right-space td b {
            font-size: 15px;
            font-family: 'Roboto', sans-serif;
        }

        .order-detail th {
            font-size: 16px;
            padding: 15px;
			padding-bottom: 0px;
            text-align: center;
            background: #fafafa;
        }

        .footer-social-icon tr td img {
            margin-left: 5px;
            margin-right: 5px;
        }
    </style>
</head>

<body style="margin: 20px auto;">
<table width="100%" border="0" cellpadding="0" cellspacing="0" style="font-family:'Amiri','Sylfaen',serif;font-size:17px;color:#4b6a87">
<tbody>
<tr>
<td align="center" valign="top">
<table width="640" border="0" cellpadding="0" cellspacing="0" role="presentation" style="font-family:'Amiri','Sylfaen',serif;font-size:17px;color:#4b6a87">
<tbody><tr>
<td valign="top"><a href="<?php echo $base_pat;?>" style="text-decoration:none" target="_blank" ><img src="<?php echo $base_pat;?>templates/frontend/images/gg.jpg" alt="London Rate" width="640" height="223" class="CToWUd"></a></td>
</tr>
</tbody></table>
</td>
</tr>
<tr>
<td align="center" valign="top">
<table width="561" border="0" cellpadding="0" cellspacing="0" role="presentation" style="padding-right:40px;padding-left:39px;font-family:'Amiri','Sylfaen',serif;font-size:17px;color:#4b6a87">
<tbody><tr>
<td style="padding-top:30px;font-family:'Amiri','Sylfaen',serif">Dear, <?php echo $strApplicantName;?>!</td>
</tr>
<tr>
<td>
<p>You placed an order on London-Rate</p>
<p>Order No. <strong style="color:#0a2f53"><?php echo $strOrderno;?></strong></p>
</td>
</tr>
<tr>
<td valign="top" align="center" style="padding-top:20px">
<table width="561" border="0" cellpadding="0" cellspacing="0" role="presentation" style="font-family:'Amiri','Sylfaen',serif;font-size:17px;color:#4b6a87">
<tbody><tr>
<td valign="top" style="padding-top:5px;padding-right:11px;padding-bottom:8px;padding-left:11px;font-family:'Amiri','Sylfaen',serif;color:#0a2f53"><strong>Code</strong></td>
<td valign="top" style="padding-top:5px;padding-right:11px;padding-bottom:8px;padding-left:11px;font-family:'Amiri','Sylfaen',serif;color:#0a2f53"><strong>Package</strong></td>
<td valign="top" style="padding-top:5px;padding-right:11px;padding-bottom:8px;padding-left:11px;font-family:'Amiri','Sylfaen',serif;color:#0a2f53"><strong>Q-ty</strong></td>
<td valign="top" style="padding-top:5px;padding-right:11px;padding-bottom:8px;padding-left:11px;font-family:'Amiri','Sylfaen',serif;color:#0a2f53"><strong>Amount</strong></td>
<td></td>
</tr>
<tr>
<td valign="top" style="padding-top:5px;padding-right:11px;padding-bottom:8px;padding-left:11px;font-family:'Amiri','Sylfaen',serif;background-color:rgba(75,106,135,0.05)">UNI</td>
<td valign="top" style="padding-top:5px;padding-right:11px;padding-bottom:8px;padding-left:11px;font-family:'Amiri','Sylfaen',serif;background-color:rgba(75,106,135,0.05);word-break:break-all"><?php echo $package_name;?></td>
<td valign="top" style="padding-top:5px;padding-right:11px;padding-bottom:8px;padding-left:11px;font-family:'Amiri','Sylfaen',serif;background-color:rgba(75,106,135,0.05)">1</td>
<td valign="top" style="padding-top:5px;padding-right:11px;padding-bottom:8px;padding-left:11px;font-family:'Amiri','Sylfaen',serif;background-color:rgba(75,106,135,0.05)"><?php echo $packamount;?></td>
<?php if($pdf_path!="") {?>
<td valign="top" style="padding-top:5px;padding-right:11px;padding-bottom:8px;padding-left:11px;font-family:'Amiri','Sylfaen',serif;background-color:rgba(75,106,135,0.05)"><a href="<?php echo $pdf_path;?>" style="text-decoration:none;color:#1890ff" target="_blank" ><img src="<?php echo $base_pat;?>templates/frontend/images/download1.png" width="83" height="11" alt="Download" class="CToWUd"></a></td>
<?php }?>
</tr>
</tbody></table>
</td>
</tr>
<tr>
<td style="padding-top:16px;font-family:'Amiri','Sylfaen',serif">We invite you to register on the London-Rate. Registration will simplify the work on the online platform, providing the following benefits:</td>
</tr>
<tr>
<td valign="top" align="center" style="padding-top:4px;font-family:'Amiri','Sylfaen',serif">
<table width="561" border="0" cellpadding="0" cellspacing="0" role="presentation" style="font-family:'Amiri','Sylfaen',serif;font-size:17px;color:#4b6a87">
<tbody><tr>
<td valign="top" align="center" style="padding-top:4px"><img src="<?php echo $base_pat;?>templates/frontend/images/plus1.png" alt="+" width="16" height="16" class="CToWUd"></td>
<td valign="top" style="padding-left:10px;font-family:'Amiri','Sylfaen',serif"><span>You do not need to re-enter all your personal data to work with our service;</span></td>
</tr>
</tbody></table>
</td>
</tr>
<tr>
<td valign="top" align="center" style="padding-top:4px;padding-bottom:20px;font-family:'Amiri','Sylfaen',serif">
<table width="561" border="0" cellpadding="0" cellspacing="0" role="presentation" style="font-family:'Amiri','Sylfaen',serif;font-size:17px;color:#4b6a87">
<tbody><tr>
<td valign="top" align="center" style="padding-top:4px"><img src="<?php echo $base_pat;?>templates/frontend/images/plus1.png" alt="+" width="16" height="16" class="CToWUd"></td>
<td valign="top" style="padding-left:10px;font-family:'Amiri','Sylfaen',serif"><span>You will have a personal account where you can see a list of your assets and track the status of your orders.</span></td>
</tr>
</tbody></table>
</td>
</tr>
<tr>
<td style="padding-top:6px;padding-right:11px;padding-bottom:6px;padding-left:11px;font-family:'Amiri','Sylfaen',serif;background-color:rgba(75,106,135,0.05)">
<p>Note:</p>
<p><span>KYC validation of customer is available in Validation package. Expert examination and verification of economic, financial indicators, legal and IP issues are available in Verification package.</span></p>
</td>
</tr>
<tr>
<td style="padding-top:30px;padding-bottom:20px;font-family:'Amiri','Sylfaen',serif">
<div>---</div>
<div>Sincerely,</div>
<div>London-Rate</div>
</td>
</tr>
<tr>
<td style="padding-bottom:20px;font-family:'Amiri','Sylfaen',serif">
<div>Contact number: <a href="tel:+1%20123-456-789" style="text-decoration:none;color:#4b6a87" target="_blank">+1 123-456-789</a></div>
<div>Email: <a href="mailto:info@londonrate.org" style="text-decoration:none;color:#4b6a87" target="_blank">info@londonrate.org</a></div>
<div>Website: <a href="https://londonrate.org" style="text-decoration:none;color:#4b6a87" target="_blank" >www.londonrate.org</a></div>
</td>
</tr>
<tr>
<td style="padding-bottom:70px;font-size:13px;font-family:'Amiri','Sylfaen',serif">This is an automated message. Please do not reply to this e-mail.</td>
</tr>
</tbody></table>
</td>
</tr>
<tr>
<td align="center" valign="top">
<table   border="0" cellpadding="0" cellspacing="0" role="presentation" style="padding-top:9px;padding-right:64px;padding-bottom:10px;padding-left:63px;background-color:#001529">
<tbody><tr>
<td align="center" style="font-family:'Amiri','Sylfaen',serif;font-size:17px"><a href="<?php echo $base_pat;?>" style="text-decoration:none" target="_blank" >
<img src="<?php echo $base_pat;?>templates/frontend/images/logo11.png" alt="London Rate" width="163" height="30" class="CToWUd"></a></td>
</tr>
 
<tr>
<td align="center" valign="top" style="padding-top:12px">
<table border="0" cellpadding="0" cellspacing="0" align="center" role="presentation" style="margin:5px;">
<tbody><tr>
<td style="padding-right:15px;font-family:'Amiri','Sylfaen',serif"><a href="https://www.facebook.com/ipvaluationservice" style="font-size:15px;text-decoration:none;color:white;opacity:0.7" target="_blank" data-saferedirecturl="https://www.facebook.com/ipvaluationservice"><img src="<?php echo $base_pat;?>templates/frontend/images/facebook.png" alt="Facebook" width="30" height="30" class="CToWUd"></a></td>
<td style="padding-right:15px;font-family:'Amiri','Sylfaen',serif"><a href="https://www.linkedin.com/company/ipvaluationservice/" style="font-size:15px;text-decoration:none;color:white;opacity:0.7" target="_blank" ><img src="<?php echo $base_pat;?>templates/frontend/images/linkedin.png" alt="Linkedin" width="30" height="30" class="CToWUd"></a></td>
<td style="padding-right:15px;font-family:'Amiri','Sylfaen',serif"><a href="https://www.instagram.com/ipvaluation/" style="font-size:15px;text-decoration:none;color:white;opacity:0.7" target="_blank"><img src="<?php echo $base_pat;?>templates/frontend/images/insta.png" alt="Instagram" width="30" height="30" class="CToWUd"></a></td>
<td style="padding-right:15px;font-family:'Amiri','Sylfaen',serif"><a href="https://twitter.com/ipvaluation" style="font-size:15px;text-decoration:none;color:white;opacity:0.7" target="_blank" <img src="<?php echo $base_pat;?>templates/frontend/images/twitter.png" alt="Twitter" width="30" height="30" class="CToWUd"></a></td>
<!--<td style="padding-right:15px;font-family:'Amiri','Sylfaen',serif"><a href="https://t.me/ipvaluation" style="font-size:15px;text-decoration:none;color:white;opacity:0.7" target="_blank" ><img src="<?php echo $base_pat;?>templates/frontend/images/telegram.png" alt="Telegram" width="30" height="30" class="CToWUd"></a></td>-->
<td style="font-family:'Amiri','Sylfaen',serif"><a href="https://www.youtube.com/channel/UCK6vz4-rrtGKyqZFo2bqmEg" style="font-size:15px;text-decoration:none;color:white;opacity:0.7" target="_blank" ><img src="<?php echo $base_pat;?>templates/frontend/images/youtube.png" alt="Youtube" width="30" height="30" class="CToWUd"></a></td>
</tr>
</tbody></table>
</td>
</tr>
<tr>
<td align="center" valign="top" style="padding-top:12px">
<table border="0" cellpadding="0" cellspacing="0" align="center" role="presentation"  style="margin:5px;">
<tbody>
<tr>

<td style="padding-right:8px;font-family:'Amiri','Sylfaen',serif"><span style="font-size:15px;text-decoration:none;color:white"><img src="<?php echo $base_pat;?>templates/frontend/images/visa.png" alt="Visa" width="26" height="20" class="CToWUd"></span></td>
<td style="padding-right:8px;font-family:'Amiri','Sylfaen',serif"><span style="font-size:15px;text-decoration:none;color:white"><img src="<?php echo $base_pat;?>templates/frontend/images/master.png" alt="Mastercard" width="26" height="20" class="CToWUd"></span></td>
<td style="padding-right:8px;font-family:'Amiri','Sylfaen',serif"><span style="font-size:15px;text-decoration:none;color:white"><img src="<?php echo $base_pat;?>templates/frontend/images/diners.png" alt="Diners Club" width="26" height="20" class="CToWUd"></span></td>
<td style="padding-right:8px;font-family:'Amiri','Sylfaen',serif"><span style="font-size:15px;text-decoration:none;color:white"><img src="<?php echo $base_pat;?>templates/frontend/images/discover.png" alt="Discover" width="26" height="20" class="CToWUd"></span></td>
<td style="padding-right:8px;font-family:'Amiri','Sylfaen',serif"><span style="font-size:15px;text-decoration:none;color:white"><img src="<?php echo $base_pat;?>templates/frontend/images/express.png" alt="American Express" width="26" height="20" class="CToWUd"></span></td>
<td style="padding-right:8px;font-family:'Amiri','Sylfaen',serif"><span style="font-size:15px;text-decoration:none;color:white"><img src="<?php echo $base_pat;?>templates/frontend/images/sepa.png" alt="Sepa" width="26" height="20" class="CToWUd"></span></td>
<td style="padding-right:8px;font-family:'Amiri','Sylfaen',serif"><span style="font-size:15px;text-decoration:none;color:white"><img src="<?php echo $base_pat;?>templates/frontend/images/alipay.png" alt="AliPay" width="26" height="20" class="CToWUd"></span></td>
<td style="padding-right:8px;font-family:'Amiri','Sylfaen',serif"><span style="font-size:15px;text-decoration:none;color:white"><img src="<?php echo $base_pat;?>templates/frontend/images/jcb.png" alt="JCB" width="26" height="20" class="CToWUd"></span></td>
<td style="font-family:'Amiri','Sylfaen',serif"><span style="font-size:15px;text-decoration:none;color:white"><img src="<?php echo $base_pat;?>templates/frontend/images/idl.png" alt="Ideal" width="26" height="20" class="CToWUd"></span></td>
</tr>
</tbody></table>
</td>
</tr>
<tr>
<td align="center" valign="top" style="line-height:1;font-family:'Amiri','Sylfaen',serif"><span style="font-size:15px;text-decoration:none;color:white">S M MANAGEMENT CONSULTANCIES CO.Al Attar Business Center Al Barsha 1 - Dubai,2-nd floor, Office 214.</span></td>
</tr>
<!--<tr>
<td align="center" valign="top" style="line-height:1;font-family:'Amiri','Sylfaen',serif"><span style="font-size:15px;text-decoration:none;color:white">UNITED KINGDOM: (c) Brit Management Consultants Limited – Company number 904105</span></td>
</tr>-->
</tbody></table>
</td>
</tr>
</tbody>
</table>
</body>

</html>