<!DOCTYPE html>
<html lang="en">
<head>
<title>Certification</title>
<meta charset="utf-8">
<link href="<?php echo base_url();?>templates/frontend/css/fonts/pdf_fonts.css" rel="stylesheet" >
<style>
body { font-family: "Amiri"; }
 </style>
</head>
<body  style="margin: 0 ; padding: 0;" >
	<div>
	
	</div>
	<table width="1200px"  align="center" cellpadding="0" cellspacing="0" style="margin: 0 auto; padding:0 0; padding-left:0;  background-image: url('<?php echo base_url();?>templates/admin/assets/images/pdf/bg.jpg'); background-repeat:repeat; background-size: contain; ">
	<?php 
	$this->load->view('1',$arrValues);
	$this->load->view('2',$arrValues);
	$this->load->view('3',$arrValues);
	?>
	</table>

</body>
</html>