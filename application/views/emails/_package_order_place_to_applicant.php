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
    <table align="center" border="0" cellpadding="0" cellspacing="0"
        style="padding: 0 30px;background-color: #fff; -webkit-box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353);box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353);width: 100%;">
        <tbody>
            <tr>
                <td>
                    <table align="center" border="0" cellpadding="0" cellspacing="0" style="text-align: left;">
                        <tr>
                            <td style="text-align: center;">
                                <img src="<?php echo $base_pat;?>templates/frontend/images/gg.jpg" alt="" style="margin-bottom: 30px;" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p style="font-size: 14px;"><b>Dear, <?php echo $strApplicantName;?>!</b></p>
                                <p style="font-size: 14px;">You placed an order on London-Rate</p>
                                <p style="font-size: 14px;">Order No: <?php echo $strOrderno;?></p>
								
                            </td>
                        </tr>
                    </table>

                    <table class="order-detail" border="0" cellpadding="0" cellspacing="0" align="center"
                        style="width: 100%;    margin-bottom: 50px;border: 1px solid #ddd;">
                        <tr  style="text-align:left;border: 1px solid #ddd;">
                            <th style="background-color: #fafafa;">Code</th>
                            <th style="text-align:left;padding-left: 15px!important;background-color: #fafafa;">Package</th>
                            <th style="text-align:left;padding-left: 15px!important;background-color: #fafafa;">Q-ty</th>
                            <th style="text-align:left;padding-left: 15px !important;background-color: #fafafa;">Amount </th>
							 <th style="text-align:left;padding-left: 15px !important;background-color: #fafafa;"> </th>
                        </tr>
						
                        <tr style="border: 1px solid #ddd;">
                            <td valign="top" style="padding-left: 15px;"><h5 style="margin-top: 15px;">UNI</h5></td >
                            <td valign="top" style="padding-left: 15px;">
                                <h5 style="margin-top: 15px;">Universal</h5>
                            </td>
                            <td valign="top" style="padding-left: 15px;">
                                <h5 style="font-size: 14px; color:#444;margin-top: 15px;"><span>1</span></h5>
                            </td>
                            <td valign="top" style="padding-left: 15px;">
                                <h5 style="font-size: 14px; color:#444;margin-top:15px">(Free of charge)</h5>
                            </td>
							<td valign="top" style="padding-left: 15px;">
                                <h5 style="font-size: 14px; color:#444;margin-top:15px"><a href="<?php echo $pdf_path;?>" download >Download</a></h5>
                            </td>
                        </tr>
                        
                        
                      

                    </table>
					
					<table align="center" border="0" cellpadding="0" cellspacing="0" style="text-align: left;" width="100%">
                       <tr>
                            <td>
                                <p style="font-size: 14px;">We invite you to register on the London-Rate. Registration will simplify the work on the online platform, providing the following benefits:</p>
                                <p style="font-size: 14px;">1) You do not need to re-enter all your personal data to work with our service;</p>
                                <p style="font-size: 14px;">2) You will have a personal account where you can see a list of your assets and track the status of your orders.</p>
								
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <p style="font-size: 14px;">Note:</p>
                                <p style="font-size: 14px;">KYC validation of customer is available in Validation package. Expert examination and verification of economic, financial indicators, legal and IP issues are available in Verification package.</p>
								
                            </td>
                        </tr>
                    </table>
					
					<table cellpadding="0" cellspacing="0" border="0" align="center"
                        style="width: 100%;margin-top: 10px;    margin-bottom: 10px;">
                        <tbody>
                            <tr>
                                <td
                                    style="background-color: #fafafa;border: 1px solid #ddd;padding: 15px;letter-spacing: 0.3px;width: 50%;">
                                    <h5
                                        style="font-size: 16px; font-weight: 600;color: #000; line-height: 16px; padding-bottom: 13px; border-bottom: 1px solid #e6e8eb; letter-spacing: -0.65px; margin-top:0; margin-bottom: 13px;">
                                        Sincerely:</h5>
                                    <p
                                        style="text-align: left;font-weight: normal; font-size: 14px; color: #000000;line-height: 21px;    margin-top: 0;">
                                        London-Rate,<br/></p>
										
										<p
                                        style="text-align: left;font-weight: normal; font-size: 14px; color: #000000;line-height: 21px;    margin-top: 0;">
                                       Contact number: +1 123-456-789<br/>
									   Email: info@londonrate.org
									   Website: www.londonrate.org</p>
                                </td>
                                
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    <table class="main-bg-light text-center top-0" align="center" border="0" cellpadding="0" cellspacing="0"
        width="100%">
		<tr>
<td valign="top" align="center">
<table role="presentation" style="padding-top:9px;padding-right:64px;padding-bottom:10px;padding-left:63px;background-color:#001529" width="513" cellspacing="0" cellpadding="0" border="0">
<tbody><tr>
<td style="font-family:'Amiri','Sylfaen',serif;font-size:17px" align="center"><a href="https://londonrate.org" style="text-decoration:none" rel="noreferrer" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://londonrate.org&amp;source=gmail&amp;ust=1630402847076000&amp;usg=AFQjCNEC7mZaNDWCsy859Wzzx_lUr_GfPQ"><img src="https://ci3.googleusercontent.com/proxy/xeVxr2LgYTMMgXGyNaVHc3h7D-G-3EcgWYLRCrPmR5NI-j93HUMszWCs7dwhgJdUTSX57-1H2LyzfXJ3Q8hgL-q72tP-TtGC0WVQxqowizd69WAzROPD4HAygQ=s0-d-e1-ft#https://api.londonrate.org/static/notification/template_message/logo.png" alt="London Rate" class="CToWUd" width="163" height="30"></a></td>
</tr>
<tr>
<td valign="top" align="center">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center">
<tbody><tr>
<td style="font-family:'Amiri','Sylfaen',serif" valign="middle"><a href="https://londonrate.org/terms-conditions" style="display:block;padding-bottom:6px;font-size:15px;text-decoration:none;color:white;opacity:0.65" rel="noreferrer" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://londonrate.org/terms-conditions&amp;source=gmail&amp;ust=1630402847076000&amp;usg=AFQjCNHgmqQ2lEK8XInQOx62K7cOeisA5A"><img src="https://ci3.googleusercontent.com/proxy/NJCwz6L8PIe9Iv2ghJOPQA_ZM1cyTgWN3VjQOQrIxmF7aB42ISYjJa82OqwuwZEVsWvP51KjcVLsQutCbyfdwR7U8Pfk6z5LBBysfX66PxuAjU8gHQpQ4ezLd5I=s0-d-e1-ft#https://api.londonrate.org/static/notification/template_message/terms.png" alt="Terms" class="CToWUd" width="46" height="10"></a></td>
<td style="padding-right:16px;padding-left:16px">
<div style="width:1px;height:19px;background-color:rgba(255,255,255,0.35)"></div>
</td>
<td style="font-family:'Amiri','Sylfaen',serif;font-size:17px" valign="middle"><a href="https://www.iubenda.com/privacy-policy/79758240" style="display:block;padding-bottom:6px;font-size:15px;text-decoration:none;color:white;opacity:0.65" rel="noreferrer" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://www.iubenda.com/privacy-policy/79758240&amp;source=gmail&amp;ust=1630402847076000&amp;usg=AFQjCNGbvx5U-dMmJr-rIBPfKT__jhLw8w"><img src="https://ci6.googleusercontent.com/proxy/bN8XLQrkoCvjBK6qtdEr3Kt8rxC89wYGFyLZf9DG9xvqYJ0O90IH3SzhadPd-0eBSEDU6GI-COx2Ihel2KhmEo3bGgDhNSPYBKxxVQGUHH3-bBko8gePvVrXV1bAxg=s0-d-e1-ft#https://api.londonrate.org/static/notification/template_message/privacy.png" alt="Privacy" class="CToWUd" width="57" height="9"></a></td>
</tr>
</tbody></table>
</td>
</tr>
<tr>
<td style="padding-top:12px" valign="top" align="center">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center">
<tbody><tr>
<td style="padding-right:15px;font-family:'Amiri','Sylfaen',serif"><a href="https://www.facebook.com/ipvaluationservice" style="font-size:15px;text-decoration:none;color:white;opacity:0.7" rel="noreferrer" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://www.facebook.com/ipvaluationservice&amp;source=gmail&amp;ust=1630402847076000&amp;usg=AFQjCNEDnGIDXM1S3akuIT41Gjx-MNkidA"><img src="https://ci5.googleusercontent.com/proxy/ai-cZc3xmNXakDdFYn2sxW582bOv5X83hxIjyPWP4JKwAQmFZLFBA4DoDyoJ4acETPjLUpiyE2e2_xLGFIslhUoTV_IlG912bdv8YfWES28jtbwZabwmNQk=s0-d-e1-ft#https://api.londonrate.org/static/notification/template_message/fb.png" alt="Facebook" class="CToWUd" width="30" height="30"></a></td>
<td style="padding-right:15px;font-family:'Amiri','Sylfaen',serif"><a href="https://www.linkedin.com/company/ipvaluationservice/" style="font-size:15px;text-decoration:none;color:white;opacity:0.7" rel="noreferrer" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://www.linkedin.com/company/ipvaluationservice/&amp;source=gmail&amp;ust=1630402847076000&amp;usg=AFQjCNFqIE8P67-a4LGebN3ieuVolh-BfA"><img src="https://ci4.googleusercontent.com/proxy/POlvBb7Me32ZZs-CCPRPmY3wSzW6qUdkJtDZpF-CYQ5MhPDpOek0FDoBd6K8Cl9W9yiX9RDyOo1PqZyCtSNs-P2NivrFirBo3305MK9Ur-f-hwe4Are_SVWgIndiDIQ=s0-d-e1-ft#https://api.londonrate.org/static/notification/template_message/linkedin.png" alt="Linkedin" class="CToWUd" width="30" height="30"></a></td>
<td style="padding-right:15px;font-family:'Amiri','Sylfaen',serif"><a href="https://www.instagram.com/ipvaluation/" style="font-size:15px;text-decoration:none;color:white;opacity:0.7" rel="noreferrer" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://www.instagram.com/ipvaluation/&amp;source=gmail&amp;ust=1630402847076000&amp;usg=AFQjCNGkkCei_65EWrxLoTGDWghJqDd6FQ"><img src="https://ci5.googleusercontent.com/proxy/bgjcDhknVrSGHjRB3Aqq-XcnCp0q6I_xfZKgryYcTCvDWsNUjXSpm50uLaOqKdl6yVdBa2S6ddIcxi2OSapbPNuCnJiNrG4Fajz8Hn2ymJagopU1D9NSFuP0i1YU-PGp=s0-d-e1-ft#https://api.londonrate.org/static/notification/template_message/instagram.png" alt="Instagram" class="CToWUd" width="30" height="30"></a></td>
<td style="padding-right:15px;font-family:'Amiri','Sylfaen',serif"><a href="https://twitter.com/ipvaluation" style="font-size:15px;text-decoration:none;color:white;opacity:0.7" rel="noreferrer" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://twitter.com/ipvaluation&amp;source=gmail&amp;ust=1630402847076000&amp;usg=AFQjCNHwn6u0RekwYlJYBW97h-1HmlJilw"><img src="https://ci6.googleusercontent.com/proxy/QfeurtkeKkW26qBPRgJv9PYU7Rq_ZqsmZhnzdbcK7UolFXoOrWpo9VQ76DMvOc3vwxmtZnfCZa-GDDpgCY9X5hgZGO81OP9yE4R0uwNyD_fBaqtBKFl-oZr0xLpDDQ=s0-d-e1-ft#https://api.londonrate.org/static/notification/template_message/twitter.png" alt="Twitter" class="CToWUd" width="30" height="30"></a></td>
<td style="padding-right:15px;font-family:'Amiri','Sylfaen',serif"><a href="https://t.me/ipvaluation" style="font-size:15px;text-decoration:none;color:white;opacity:0.7" rel="noreferrer" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://t.me/ipvaluation&amp;source=gmail&amp;ust=1630402847076000&amp;usg=AFQjCNG2UWVFHSbDiBmlucpf2MTeW9wxSA"><img src="https://ci4.googleusercontent.com/proxy/lN5HaOt49hhZshCMXnCdrXVUUd472jzW5Lh3XpDILtiyY49iWiFggGG1alnGgALSVZtigtP5EGcrZ3W2mXpWB6eVkHX40JD7K-dIFKBe2tk3DT3RG_8TiUm-1-YGbqA=s0-d-e1-ft#https://api.londonrate.org/static/notification/template_message/telegram.png" alt="Telegram" class="CToWUd" width="30" height="30"></a></td>
<td style="font-family:'Amiri','Sylfaen',serif"><a href="https://www.youtube.com/channel/UC9WPDThxergnrMeBFAEdqTA/" style="font-size:15px;text-decoration:none;color:white;opacity:0.7" rel="noreferrer" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://www.youtube.com/channel/UC9WPDThxergnrMeBFAEdqTA/&amp;source=gmail&amp;ust=1630402847076000&amp;usg=AFQjCNFpHr9gGl_KnvUv_fPfQW7al4ci-A"><img src="https://ci5.googleusercontent.com/proxy/-3v4ygko1VgEALEmN-efzGZutr-7jEXK3BAV3m3o0BPCo_3FKBrUV28-fP3lcDCQE6TRtPa27oEo7l20PjJtcCrAMljBMXY3JKbYyA6IsDHmpA4f0Bnb49FavFUupg=s0-d-e1-ft#https://api.londonrate.org/static/notification/template_message/youtube.png" alt="Youtube" class="CToWUd" width="30" height="30"></a></td>
</tr>
</tbody></table>
</td>
</tr>
<tr>
<td style="padding-top:12px" valign="top" align="center">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center">
<tbody><tr>
<td style="padding-right:8px;font-family:'Amiri','Sylfaen',serif"><span style="font-size:15px;text-decoration:none;color:white"><img src="https://ci4.googleusercontent.com/proxy/cPgeKo3c_xPsRgbIimZfqD1t3jqhE_9Vs3UJatKcKK7tm6M4uLdwg-oThEbDM4YAyDwpq1qd7dZc5mf220O_bm-YgbKJksjV2kjI1FSplC-0GVzgJ8Pk_jNTx4cb=s0-d-e1-ft#https://api.londonrate.org/static/notification/template_message/stripe.png" alt="Stripe" class="CToWUd" width="26" height="20"></span></td>
<td style="padding-right:8px;font-family:'Amiri','Sylfaen',serif"><span style="font-size:15px;text-decoration:none;color:white"><img src="https://ci5.googleusercontent.com/proxy/_PN6e8otckiIyQ9qC3b31memSXjxQct8YxnvrC-UK50SJj0bw-X3WvK65MVGLoUaN5pDwSUmgKrS1gQ97deKpkQy7UnyItvPbTLkEdOLZL3PtTMs_2Wu5Mxq9Q=s0-d-e1-ft#https://api.londonrate.org/static/notification/template_message/visa.png" alt="Visa" class="CToWUd" width="26" height="20"></span></td>
<td style="padding-right:8px;font-family:'Amiri','Sylfaen',serif"><span style="font-size:15px;text-decoration:none;color:white"><img src="https://ci3.googleusercontent.com/proxy/zhs57WvrLUoRSRKU1Gu3pOZTTZiQFo6ZJU1QOp2OFziKUgsikeB8GveaE8QX8DtPvieV7Y0X0hADdszbGX4wRv1hMUEorBWlglB_F2pL8_MdBQCrQFUN5M7hA8do12dbjg=s0-d-e1-ft#https://api.londonrate.org/static/notification/template_message/mastercard.png" alt="Mastercard" class="CToWUd" width="26" height="20"></span></td>
<td style="padding-right:8px;font-family:'Amiri','Sylfaen',serif"><span style="font-size:15px;text-decoration:none;color:white"><img src="https://ci3.googleusercontent.com/proxy/ff03nDxc4WjRKtCEhY51aoqezb5N60la4220Kob1bpZnofnzcC_uvn_dRATmvPpplMduGolRwm0Hw7KG4Ky59Cc6vjhrrIqXIp_Fs-PYmvZsfgm-3veIdqzLTAorjExAel0=s0-d-e1-ft#https://api.londonrate.org/static/notification/template_message/diners-club.png" alt="Diners Club" class="CToWUd" width="26" height="20"></span></td>
<td style="padding-right:8px;font-family:'Amiri','Sylfaen',serif"><span style="font-size:15px;text-decoration:none;color:white"><img src="https://ci5.googleusercontent.com/proxy/vDvgwqCikt2nvfFlpeDyLVHSwJu3qTuhJ7CGRF61kiH-C05T_Ym0PSPxOW0lIDAQ6i0unwno5aeDMHarKYIj5etNF_KNeMVzaHgBaE7JC9Hipfm_bR6-Uy-Bf88PPXY=s0-d-e1-ft#https://api.londonrate.org/static/notification/template_message/discover.png" alt="Discover" class="CToWUd" width="26" height="20"></span></td>
<td style="padding-right:8px;font-family:'Amiri','Sylfaen',serif"><span style="font-size:15px;text-decoration:none;color:white"><img src="https://ci6.googleusercontent.com/proxy/c9aVHEqWLGq89tthIAzv6JgHJucIgvigDhHm1I9Luuq5iN0ZzUw54HEUDksWXc5O7tdXi8jTNmhz_7H80iv0mh7v_KczLHaptqaZgr98QacXq8YyE1xBSOiHa35LjsbId8tFfJH5ZA=s0-d-e1-ft#https://api.londonrate.org/static/notification/template_message/american-express.png" alt="American Express" class="CToWUd" width="26" height="20"></span></td>
<td style="padding-right:8px;font-family:'Amiri','Sylfaen',serif"><span style="font-size:15px;text-decoration:none;color:white"><img src="https://ci3.googleusercontent.com/proxy/YXDFehRrBQkfJAjcqPydxgf4BIPEB3uY3huRLwGRNTgPru3ll0MfD2A05-sZEsPhGIfT32CGF_hZE20aPUJHWxQAVYelQwIwRqBhy-4mIsTAPJjFkkr5YTBGyA=s0-d-e1-ft#https://api.londonrate.org/static/notification/template_message/sepa.png" alt="Sepa" class="CToWUd" width="26" height="20"></span></td>
<td style="padding-right:8px;font-family:'Amiri','Sylfaen',serif"><span style="font-size:15px;text-decoration:none;color:white"><img src="https://ci5.googleusercontent.com/proxy/RHtB_QRE9I3AX3RSj2FxwUGCf3w_ji6WBhinzHTfQkUwxr3m3QMxYatN5FhNVsWTJIXyvGndkWhfL7CzFXTyc0pR44hPCJnkjLYu9iekahVdmDUOJuPdiR6OwjgT=s0-d-e1-ft#https://api.londonrate.org/static/notification/template_message/alipay.png" alt="AliPay" class="CToWUd" width="26" height="20"></span></td>
<td style="padding-right:8px;font-family:'Amiri','Sylfaen',serif"><span style="font-size:15px;text-decoration:none;color:white"><img src="https://ci4.googleusercontent.com/proxy/GXwaH8hJrAzk2CJHNjfAk9_Cz_biDAYKwg0Y3iNphI8CDlrC07qXrKD48GPBwiFMext0Ou8dsXHz1Dn8NNBEwAjHNQkMNM87LZLpSwK-gdD9k_96bh24ELl4=s0-d-e1-ft#https://api.londonrate.org/static/notification/template_message/jcb.png" alt="JCB" class="CToWUd" width="26" height="20"></span></td>
<td style="font-family:'Amiri','Sylfaen',serif"><span style="font-size:15px;text-decoration:none;color:white"><img src="https://ci6.googleusercontent.com/proxy/prM6edRys1ejIMePvYQJlIUcW3qPwCdPKKbI5PEhjE3WANpZKoaFy8w-P2td3ViuHqyl1REHhdHs9HbJMus0nlsxU4EcEnydvVrc6XE0zaD4OpjMl2pekPk8SdI=s0-d-e1-ft#https://api.londonrate.org/static/notification/template_message/ideal.png" alt="Ideal" class="CToWUd" width="26" height="20"></span></td>
</tr>
</tbody></table>
</td>
</tr>
<tr>
<td style="line-height:1;font-family:'Amiri','Sylfaen',serif" valign="top" align="center"><span style="font-size:15px;text-decoration:none;color:white"><img src="https://ci4.googleusercontent.com/proxy/pfBLw9vOdWY14ycnE3RiMkW8EJZs-bNVVPN7U7o5TgH9J5yTnojx5OBePOpWPElbJQh1Rt41ckwKnud4i_NW9PB5gpsft7lCqqotg2R75R2zbqOY9a_tRVj5OyzIozJiIoo=s0-d-e1-ft#https://api.londonrate.org/static/notification/template_message/partnership.png" alt="ITALY: Platform Operator - Far Rainbow S.R.L., 2021 – VAT num. 03894780133, REA LC-405002" class="CToWUd" width="513" height="9"></span></td>
</tr>
<tr>
<td style="line-height:1;font-family:'Amiri','Sylfaen',serif" valign="top" align="center"><span style="font-size:15px;text-decoration:none;color:white"><img src="https://ci4.googleusercontent.com/proxy/r398UUtC-vRHfPyIZakErZEBJFvksVKVyScknV7q6pA-42Q6rS6rEl_NZdUKKOTERJq2C9U9l6d2PcEBPCLiUuF1XUhyMCBAB_wYtRHcZNwsCS2JZONYgdlD_5K9pZYc=s0-d-e1-ft#https://api.londonrate.org/static/notification/template_message/copyright.png" alt="UNITED KINGDOM: (c) Brit Management Consultants Limited – Company number 9041058" class="CToWUd" width="482" height="9"></span></td>
</tr>
</tbody></table>
</td>
</tr>
        <tr>
            <td style="padding: 30px;">
                
                <div style="border-top: 1px solid #ddd; margin: 20px auto 0;"></div>
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin: 20px auto 0;">
                    
                    <tr>
                        <td>
                            <p style="font-size:13px; margin:0;"><?php echo date('Y');?> London Rate. All rights reserved.</p>
                        </td>
                    </tr>
                    
                </table>
            </td>
        </tr>
    </table>
</body>

</html>