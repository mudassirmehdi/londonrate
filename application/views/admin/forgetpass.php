<!doctype html>
<html class="fixed">
	<head>
		<!-- Basic -->
		<meta charset="utf-8" />
		<meta name="keywords" content="HTML5 Admin templates" />
		<meta name="description" content="Porto Admin - Responsive HTML5 templates">
		<meta name="author" content="okler.net">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="<?php echo base_url();?>vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>vendor/animate/animate.css">

		<link rel="stylesheet" href="<?php echo base_url();?>vendor/font-awesome/css/all.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="<?php echo base_url();?>css/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="<?php echo base_url();?>css/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="<?php echo base_url();?>css/custom.css">

		<!-- Head Libs -->
		<script src="<?php echo base_url();?>vendor/modernizr/modernizr.js"></script>
<style>
.error_msg{ color:red;}
</style>
	</head>
	<body>
		<!-- start: page -->
		<section class="body-sign">
			<div class="center-sign">
				<a href="#" class="logo float-left">
					<img src="<?php echo base_url();?>img/bstfd-logo.png" height="54" alt="Best Food Admin" style="margin-top:5%" />
				</a>
				<form name="frm_login" id="frm_login" method="post">
 				<div class="panel card-sign">
					<div class="card-title-sign mt-3 text-right">
						<h2 class="title text-uppercase font-weight-bold m-0"><i class="fas fa-user mr-1"></i> Sign In</h2>
					</div>
					<div class="card-body">
					<?php if($this->session->flashdata('success')!=""){?>
								<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<?php echo $this->session->flashdata('success');?>
									</div>
								<?php }?>
								
								<?php 
									//echo $this->session->flashdata('error'); exit;
								if($this->session->flashdata('error')!=""){?>
								<div class="alert alert-danger">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<?php echo $this->session->flashdata('error');?>
									</div>
								<?php }?>
								
						<form name="frm_login" id="frm_login" method="post">
							<div class="form-group mb-3">
								<label>Enter Email</label>
								<div class="input-group">
									<input name="email" id="email" type="email" class="form-control form-control-lg" required />
									<span class="input-group-append">
										<span class="input-group-text">
											<i class="fas fa-user"></i>
										</span>
									</span>
									
								</div><div id="err_username" class="error_msg"></div> 	
							</div>

							<div class="row">
								<div class="col-sm-6">
									<a href="<?php echo base_url();?>Login" class="btn btn-primary mt-2" >Login</a>
									<div class="checkbox-custom checkbox-default">
										
										<!-- <input id="RememberMe" name="rememberme" type="checkbox"/>
										<label for="RememberMe">Remember Me</label> -->
									</div>
								</div>
								<div class="col-sm-6 text-right">
									<button type="submit" name="btn_login" id="btn_login" class="btn btn-primary mt-2">Forgot Password</button>
								</div>
							</div>

						</form>
					</div>
				</div>
				</form>	
				<p class="text-center text-muted mt-3 mb-3">&copy; Copyright <?php echo date('Y');?>. All Rights Reserved.</p>
			</div>
		</section>
		<!-- end: page -->

		<!-- Vendor -->
		<script src="<?php echo base_url();?>vendor/jquery/jquery.js"></script>		<script src="<?php echo base_url();?>vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>		<script src="<?php echo base_url();?>vendor/popper/umd/popper.min.js"></script>		<script src="<?php echo base_url();?>vendor/bootstrap/js/bootstrap.js"></script>		<script src="<?php echo base_url();?>vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>		<script src="<?php echo base_url();?>vendor/common/common.js"></script>		<script src="<?php echo base_url();?>vendor/nanoscroller/nanoscroller.js"></script>		<script src="<?php echo base_url();?>vendor/magnific-popup/jquery.magnific-popup.js"></script>		<script src="<?php echo base_url();?>vendor/jquery-placeholder/jquery.placeholder.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="<?php echo base_url();?>js/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="<?php echo base_url();?>js/custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="<?php echo base_url();?>js/theme.init.js"></script>
<script type="text/javascript">
$(document).ready(function($) 
{
$('#btn_login').click(function(){
	 
	var username=$("#username").val();
	var admin_password=$("#admin_password").val();
	var flag=1;
	
	$("#err_username").html('');
	$("#err_admin_password").html('');
	
	if(username=="")
	{
		$("#err_username").html('Enter username.');
		flag=0;
	}
	if(admin_password=="")
	{
		$("#err_admin_password").html('Enter password.');
		flag=0;
	}
	if(flag==1)
		return true;
	else
		return false;
})
});	
</script>
	</body>
</html>