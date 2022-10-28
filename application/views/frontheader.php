<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>London Rate - Realise your IP value</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('templates/frontend/');?>css/bootstrap.min.css" > 
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('templates/frontend/');?>css/style.css">


    <script type="text/javascript">var BASEPATH='<?php echo base_url();?>';</script>
    
    <style type="text/css">  
        <?php if($this->session->userdata('london_logged_in')){?>
            .navbar-expand-xl .navbar-nav .nav-link{
                padding: 10px 8px !important;
                font-size: 13.29px;
            }
        <?php } else {?>
            .navbar-expand-xl .navbar-nav .nav-link{
                padding: 10px 11px !important;
                font-size: 13.29px;
            }
        <?php }?> 
    </style>

</head>
<body>


  