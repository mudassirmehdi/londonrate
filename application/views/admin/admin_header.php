<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Multikart admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin templates with unlimited possibilities.">
    <meta name="keywords" content="admin templates, Multikart admin templates, dashboard templates, flat admin templates, responsive admin templates, web app">
    <meta name="author" content="pixelstrap">
    
	<link data-n-head="ssr" rel="icon" type="image/x-icon" href="<?php echo base_url('templates/frontend/');?>images/favicon.ico" />

    <title>Londonrate - <?php echo $page_title;?></title>

    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('templates/admin/');?>assets/css/fontawesome.css">

    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('templates/admin/');?>assets/css/flag-icon.css">

    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('templates/admin/');?>assets/css/icofont.css">

    <!-- Prism css-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('templates/admin/');?>assets/css/prism.css">

    <!-- Chartist css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('templates/admin/');?>assets/css/chartist.css">
	
	<!-- Datepicker css-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('templates/admin/');?>assets/css/date-picker.css">
	<!-- Timepicker css-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('templates/admin/');?>assets/scss/bootstrap-timepicker/css/bootstrap-timepicker.css">
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('templates/admin/');?>assets/css/bootstrap.css">

    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('templates/admin/');?>assets/css/admin.css">
	<script type="text/javascript">var BASEPATH="<?php echo base_url('backend/');?>";</script>
	<style>.err_msg{ color:red;}</style>
</head>

<body>

<!-- page-wrapper Start-->
<div class="page-wrapper">

    <!-- Page Header Start-->
    <div class="page-main-header" style="margin-left: 270px;">
        <div class="main-header-right row">
            <div class="main-header-left d-lg-none">
                <div class="logo-wrapper"><a href="<?php echo base_url();?>backend/dashboard">
					<img class="blur-up lazyloaded" src="<?php echo base_url('templates/admin/');?>assets/images/dashboard/logo2.png" alt="Londonrate.org" style="width:179px;height:79px;"></a>
				</div>
            </div>
            <!--<div class="mobile-sidebar">
                <div class="media-body text-right switch-sm">
                    <label class="switch"><a href="javascript:void(0);"><i id="sidebar-toggle" data-feather="align-left"></i></a></label>
                </div>
            </div>-->
            <div class="nav-right col">
                <ul class="nav-menus">
                    <!--<li>
                        <form class="form-inline search-form">
                            <div class="form-group">
                                <input class="form-control-plaintext" type="search" placeholder="Search.."><span class="d-sm-none mobile-search"><i data-feather="search"></i></span>
                            </div>
                        </form>
                    </li>
                    <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize-2"></i></a></li>
                    <li class="onhover-dropdown"><a class="txt-dark" href="#">
                        <h6>EN</h6></a>
                        <ul class="language-dropdown onhover-show-div p-20">
                            <li><a href="#" data-lng="en"><i class="flag-icon flag-icon-is"></i> English</a></li>
                            <li><a href="#" data-lng="es"><i class="flag-icon flag-icon-um"></i> Spanish</a></li>
                            <li><a href="#" data-lng="pt"><i class="flag-icon flag-icon-uy"></i> Portuguese</a></li>
                            <li><a href="#" data-lng="fr"><i class="flag-icon flag-icon-nz"></i> French</a></li>
                        </ul>
                    </li>
                    <li class="onhover-dropdown"><i data-feather="bell"></i><span class="badge badge-pill badge-primary pull-right notification-badge">3</span><span class="dot"></span>
                        <ul class="notification-dropdown onhover-show-div p-0">
                            <li>Notification <span class="badge badge-pill badge-primary pull-right">3</span></li>
                            <li>
                                <div class="media">
                                    <div class="media-body">
                                        <h6 class="mt-0"><span><i class="shopping-color" data-feather="shopping-bag"></i></span>Your order ready for Ship..!</h6>
                                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetuer.</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="media">
                                    <div class="media-body">
                                        <h6 class="mt-0 txt-success"><span><i class="download-color font-success" data-feather="download"></i></span>Download Complete</h6>
                                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetuer.</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="media">
                                    <div class="media-body">
                                        <h6 class="mt-0 txt-danger"><span><i class="alert-color font-danger" data-feather="alert-circle"></i></span>250 MB trash files</h6>
                                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetuer.</p>
                                    </div>
                                </div>
                            </li>
                            <li class="txt-dark"><a href="#">All</a> notification</li>
                        </ul>
                    </li>-->
                    <li style="display:none"><a href="#"><i class="right_side_toggle" data-feather="message-square"></i><span class="dot"></span></a></li>
                    <li class="onhover-dropdown">
                        <div class="media align-items-center"><img class="align-self-center pull-right img-50 rounded-circle blur-up lazyloaded" src="<?php echo base_url('templates/admin/');?>assets/images/avatar.jpg" alt="header-user">
                            <!--<div class="dotted-animation"><span class="animate-circle"></span><span class="main-circle"></span></div>-->
                        </div>
                        <ul class="profile-dropdown onhover-show-div p-20 profile-dropdown-hover">
							<li><a href="<?php echo base_url();?>backend/Admin/updateprofile"><i data-feather="user"></i>Update Profile</a></li>
                           <!--<li><a href="#"><i data-feather="mail"></i>Inbox</a></li>
                            <li><a href="#"><i data-feather="lock"></i>Lock Screen</a></li>
                            <li><a href="#"><i data-feather="settings"></i>Settings</a></li>-->
                            <li><a href="<?php echo base_url();?>backend/Login/logout"><i data-feather="log-out"></i>Logout</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="d-lg-none mobile-toggle pull-right"><i data-feather="more-horizontal"></i></div>
            </div>
        </div>
    </div>
    <!-- Page Header Ends -->
	<!-- Page Body Start-->
    <div class="page-body-wrapper">