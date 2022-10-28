<!DOCTYPE html>
<html lang="en">
<head>
<title>Certification</title>
<meta charset="utf-8">
<link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&display=swap" rel="stylesheet" >
<link href="https://fonts.googleapis.com/css2?family=Copperplate:wght@400;700&display=swap" rel="stylesheet" >
<style  type="text/css" >
@page *{
    margin-top: 2px;
    margin-bottom: 2px;
    margin-left: 2px;
    margin-right: 2px;
	size: 8.5in 11in;
}
body { font-family: "amiri"; }
@font-face {
    font-family: copperplate;
    src: url("<?php echo base_url();?>templates/admin/assets/fonts/Copperplate.ttf");
}
 
.copperplate { font-family: Copperplate; font-size: 18px; font-style: normal; font-variant: normal; font-weight: 700; line-height: 19.8px; } .copperplate h3 { font-family: Copperplate; font-size: 17px; font-style: normal; font-variant: normal; font-weight: 700; line-height: 18.7px; } .copperplate p { font-family: Copperplate, "Copperplate Gothic Light", fantasy; font-size: 14px; font-style: normal; font-variant: normal; font-weight: 400; line-height: 23px; } .copperplate blockquote { font-family: Copperplate, "Copperplate Gothic Light", fantasy; font-size: 17px; font-style: normal; font-variant: normal; font-weight: 400; line-height: 23px; } .copperplate pre { font-family: Copperplate, "Copperplate Gothic Light", fantasy; font-size: 11px; font-style: normal; font-variant: normal; font-weight: 400; line-height: 23px; }
.tablepage1 td{
	border: 1px solid  #4B6A87;
}
 </style>
</head>
<body  style="margin: 0 ; padding: 0; background-image: url('<?php echo base_url();?>templates/admin/assets/images/pdf/bg1.png'); background-repeat:repeat; background-size: contain;" >
	<div>
	
	</div>
	<table width="1300"  align="center" cellpadding="0" cellspacing="0" style="margin: 0 auto; padding:0 0; padding-left:0; ">
	<?php 
	$this->load->view('pdf/3',$arrValues);
	?>
	</table>

</body>
</html>