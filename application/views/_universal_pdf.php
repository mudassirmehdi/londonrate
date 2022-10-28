 <!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
   <title>London Rate - Realise your IP value</title>
<style>
.questionnaire {
    
}@media (min-width: 1200px)
.container {
    max-width: 1140px;
}
@media (min-width: 992px)
.container {
    max-width: 960px;
}
@media (min-width: 768px)
.container {
    max-width: 720px;
}
@media (min-width: 576px)
.container {
    max-width: 540px;
}
.container {
    width: 100%;
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
}
.main {
    position: relative;
    margin-top: 63px;
}
.row {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-right: -15px;
    margin-left: -15px;
}
*, a, a:active, a:focus, a:hover, button:focus {
    text-decoration: none;
    -webkit-box-shadow: none;
    box-shadow: none;
    outline: 0;
}
*, ul, ol {
    font-family: "copperplate",serif;
    margin: 0;
    padding: 0;
    list-style-type: none;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}

.ml-auto, .mx-auto {
    margin-left: auto!important;
}
.mr-auto, .mx-auto {
    margin-right: auto!important;
}
@media (min-width: 1200px)
.col-xl-7 {
    -webkit-box-flex: 0;
    -ms-flex: 0 0 58.333333%;
    flex: 0 0 58.333333%;
    max-width: 58.333333%;
}
.section-title {
    display: flex;
    flex-flow: row wrap;
    justify-content: center;
    align-items: center;
}
.questionnaire .section-title h2 {
    font-size: 25.5px;
    font-weight: 400;
}
.wizard > div.wizard-inner {
    position: relative;
    text-align: center;
}
.wizard .nav-tabs {
    position: relative;
    margin-bottom: 0;
    padding-left: 0;
    border-bottom-color: transparent;
    display: flex;
    align-items: center;
    justify-content: space-between;
}
.nav-tabs {
    border-bottom: 1px solid #dee2e6;
}
.nav {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    padding-left: 0;
    margin-bottom: 0;
    list-style: none;
}
*, ul, ol {
    font-family: "copperplate",serif;
    margin: 0;
    padding: 0;
    list-style-type: none;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}
dl, ol, ul {
    margin-top: 0;
    margin-bottom: 1rem;
}
*, a, a:active, a:focus, a:hover, button:focus {
    text-decoration: none;
    -webkit-box-shadow: none;
    box-shadow: none;
    outline: 0;
}
</style>	
</head>


<body> 
<main class="main">
		<section class="questionnaire">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-xl-7 mx-auto">
                        <div class="section-title">
                            <h2 class="mb-0" style="text-align:center">Valuation Certificate</h2>
                        </div>
                        <div class="wizard">
                            <div class="logo-wrap text-center">
                               <img src="https://londonrate.csns.in/templates/frontend/images/banner-logo1.svg" alt="Logo">
							   <h2 class="mb-0" style="text-align: center; margin-bottom: 14px;margin-top: -97px;">London Rate</h2>
                            </div>
							
                            <form role="form" name="frm_questionnaire_universal4" id="frm_questionnaire_universal4" class="login-box" method="post" >
                                <div class="tab-content" id="main_form">
                                    
                                    
                                    <div class="tab-pane active" role="tabpanel" id="step4">
                                        <h4 class="text-center" style=" margin-bottom: 14px;margin-top: 50px;text-align:center">INTERNATIONAL OFFICE FOR ONLINE IP-VALUATION</h4>
										
										<h2 class="mb-0" style=" margin-bottom: 14px;text-align:center">COVER STATEMENT</h2>
										 <h4 class="text-center" style=" margin-bottom: 14px;text-align:center">TYPE OF VALUE OF INTELLECTUAL PROPERTY</h4>
										 
										 <h2 class="mb-0" style=" margin-bottom: 14px;text-align:center">UNIVERSAL</h2>
										 <h4 class="text-center" style=" margin-bottom: 14px;text-align:center">€ <?Php echo $arrValues['avgstd'];?></h4>
                                        <div>
										
										
										<h4 class="text-center" style=" margin-bottom: 14px;text-align:center">SUBMITTED DATA AND VALUATION RESULTS</h4>
										
										<h6 class="mb-0" style=" margin-bottom: 10px;font-size:13px;text-align:center">HOW OLD IS THE COMPANY: <?php echo $pdf_age;?></h6>
										<h6 class="mb-0" style=" margin-bottom: 10px;font-size:13px;text-align:center">TOTAL SALARIES, MONTHLY:<?php echo $average_salaries;?></h6>
										<h6 class="mb-0" style=" margin-bottom: 10px;font-size:13px;text-align:center">TOTAL SALES, MONTHLY:<?php echo $average_sales;?></h6>
										<h6 class="mb-0" style=" margin-bottom: 10px;font-size:13px;text-align:center">NET PROFILE, MONTHLY:<?php echo $average_net_profit;?></h6>
										
                                           <table style="border:1px solid #9999;">
											<tr style="border-bottom:1px solid #9999;">
												<th style="border-left:1px solid #9999;border-bottom:1px solid #9999;">#</th>
												<th style="border-left:1px solid #9999;border-bottom:1px solid #9999;">POSSIBLE BENEFITS</th>
												<th style="border-left:1px solid #9999;border-bottom:1px solid #9999;">MINIMUM</th>
												<th style="border-left:1px solid #9999;border-bottom:1px solid #9999;">STANDAND</th>
												<th style="border-left:1px solid #9999;border-bottom:1px solid #9999;">MAXIMUM</th>
											</tr>
											
											<?php 
											$i=1;
											$cnt_arrValues=count($arrValues)-1;
											if(isset($arrValues) && count($arrValues)>0)
											{
											 foreach($arrValues as $ar)
											 {
												if(count($arrValues)>$cnt_arrValues)
												{													
													?>
											<tr style="border-bottom:1px solid #9999;">
												<th style="border-left:1px solid #9999;border-bottom:1px solid #9999;"><?php echo $i;?></th>
												<th style="border-left:1px solid #9999;border-bottom:1px solid #9999;"><?php echo $ar['benefits'];?></th>
												<th style="border-left:1px solid #9999;border-bottom:1px solid #9999;"><?php echo $ar['min'];?></th>
												<th style="border-left:1px solid #9999;border-bottom:1px solid #9999;"><?php echo $ar['std'];?></th>
												<th style="border-left:1px solid #9999;border-bottom:1px solid #9999;"><?php echo $ar['max'];?></th>
											</tr>
											<?php $i++;
												}
											}
											} ?>
										   </table>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section> 
		</main>
</body>
</html>	     