   <div class="bread-main">
        <!-- Navbar Start -->
         <?php require 'main-navbar.php'; ?>
        <!-- Navbar End -->

        <div class="bread-content container">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('/');?>">Home</a></li>
                        <li class="breadcrumb-item active">License</li>
                      </ol>
                    </nav>

                    <h1>Calculate average  value <br class="d-none d-lg-block"> of your IP</h1>

                </div>
            </div>

        </div>
    </div> 


		<section class="find-values demo-calc section-padding services-detail">
            <div class="container">
            
                <div class="row">
                    <div class="col-6 col-sm-4 col-md-6 col-xl-4 mx-auto">
                        <div class="card">
                            <div class="card-img">
                                 <img src="<?php echo base_url('templates/frontend/');?>images/icons/services-award.svg" alt="License">
                            </div>
                            <h4>License</h4>
                        </div>
                    </div>
                    <div class="col-12 py-4"></div>
                    <div class="col-lg-9 mx-auto">
                       <form class="form-card" name="mobapp" id="mobapp" action="" method="post" enctype="multipart/form-data" autocomplete="off">
                            <div class="form-group row align-items-center mb-4">
                                <div class="col-md-4">
                                    <label>Type of License *</label>
                                </div>
                                <div class="col-md-8">
                                    <select class="form-control"  name="mobile_app" id="mobile_app">
                                 <option value="">--Select--</option>
                                    <?php if(isset($ipindustries) && count($ipindustries)>0)
                                    {
                                        foreach($ipindustries as $type)
                                        {?>
                                        <option <?php if($arrPost['mobile_app']==$type['iptype_id']){ echo 'selected="selected"';}?>  value="<?php echo $type['iptype_id'];?>" ><?php echo $type['iptype_name'];?></option>
                                        <?php }
                                    }?>
                                </select>
                                <span id="err_mobile_app" class="error_class"></span>
                                </div>
                                
                                
                            </div>
                            <div class="form-group row align-items-center mb-4">
                                <div class="col-md-4">
                                    <label>Type of IP Certificate *</label>
                                </div>
                                <div class="col-md-8">
                                    <select class="form-control" name="ipcertificates" id="ipcertificates" onchange="javascript:return getallprotectedindustries(this.value,'<?php echo $ipType;?>');">
                                      <option value="">--Select--</option>
                                    <?php if(isset($certificate) && count($certificate)>0)
                                    {
                                        foreach($certificate as $type)
                                        {?>
                                        <option <?php if($arrPost['ipcertificates']==$type['cert_id']){ echo 'selected="selected"';}?>  value="<?php echo $type['cert_id'];?>" ><?php echo $type['cert_name'];?></option>
                                        <?php }
                                    }?>

                                </select>
                                <span id="err_ipcertificates" class="error_class"></span>
                                </div>
                                
                               
                            </div>
                            <div class="form-group row align-items-center mb-4">
                                <div class="col-md-4">
                                     <label>Coverage *</label>
                                </div>
                                <div class="col-md-8">
                                    <select class="form-control"  name="coverage" id="coverage">
                                     <option value="">--Select--</option>
                                        <?php if(isset($coverage) && count($coverage)>0)
                                         {                                       
                                            foreach($coverage as $type)
                                            {                                           
                                            ?>
                                            <option   <?php if($arrPost['coverage']==$type['coverage_id']){ echo 'selected="selected"';}?> value="<?php echo $type['coverage_id'];?>" ><?php echo $type['coverage_name'];?></option>
                                            <?php }
                                         } ?>
                                    </select>
                                    <span id="err_coverage" class="error_class"></span>
                                </div>
                               
                                
                            </div>
                            <div class="form-group row align-items-center mb-4">
                                <div class="col-md-4">
                                     <label>Protected Industries *</label>
                                </div>
                                <div class="col-md-8">
                                    <select   name="industry" id="industry" class="form-control">
                                     <option value="">--Select--</option>
                                        <?php  
                                            foreach($industry as $p){                                            
                                        ?>
                                            <option  <?php if($arrPost['industry']==$p['ind_id']){ echo 'selected="selected"';}?> value="<?php echo $p['ind_id'];?>"><?php echo $p['ind_name'];?></option>
                                        <?php }
                                        ?>
                                    </select>
                                    <span id="err_industry" class="error_class"></span>
                                </div>
                               
                                
                            </div>
                            <div class="form-group row align-items-center mb-4">
                                <div class="col-md-4">
                                    <label>Rightsholder *</label>
                                </div>
                                <div class="col-md-8">
                                     <select class="form-control"  name="rholder" id="rholder">
                                         <option value="">--Select--</option>
                                        <?php if(isset($rholder) && count($rholder)>0)
                                         {
                                            foreach($rholder as $type)
                                            {?>
                                            <option <?php if($arrPost['rholder']==$type['rholder_id']){ echo 'selected="selected"';}?>  value="<?php echo $type['rholder_id'];?>" ><?php echo $type['rholder_name'];?></option>
                                            <?php }
                                         } ?>
                                    </select>
                                    <span id="err_rholder" class="error_class"></span>
                                </div>
                                
                                
                            </div>
                            <div class="form-group row align-items-center mb-4">
                                <div class="col-md-4">
                                     <label>Total sales, monthly *</label>
                                </div>
                                <div class="col-md-8">
                                    <select class="form-control"  name="sales" id="sales">
                                         <option value="">--Select--</option>
                                        <option <?php if($arrPost['sales']=="0-10000"){ echo 'selected="selected"';}?> value="0-10000">$0 - $10,000</option>
                                        <option <?php if($arrPost['sales']=="10001-100000"){ echo 'selected="selected"';}?> value="10001-100000">$10,001 - $100,000</option>
                                        <option <?php if($arrPost['sales']=="100001-500000"){ echo 'selected="selected"';}?> value="100001-500000">$100,001 - $500,000</option>
                                        <option <?php if($arrPost['sales']=="500001-1000000"){ echo 'selected="selected"';}?> value="500001-1000000">$500,001 - $1,000,000</option>
                                        <option <?php if($arrPost['sales']=="1000001-3000000"){ echo 'selected="selected"';}?> value="1000001-3000000">$100,001 - $3,000,000</option>
                                        <option <?php if($arrPost['sales']=="3000001-5000000"){ echo 'selected="selected"';}?> value="3000001-5000000">$3000,001 - $5,000,000</option>
                                        <option <?php if($arrPost['sales']=="5000001-5000000"){ echo 'selected="selected"';}?> value="5000001-10000000">$5000,001 - $10,000,000</option>
                                        <option <?php if($arrPost['sales']=="10000001-5000000"){ echo 'selected="selected"';}?> value="10000001-25000000">$10000,001 - $25,000,000</option>
                                    </select>
                                    <span id="err_sales" class="error_class"></span>
                                </div>
                               
                                
                            </div>
                            <div class="form-group row align-items-center mb-4">
                                <div class="col-md-4">
                                     <label>Net profit, monthly *</label>
                                </div>
                                <div class="col-md-8">
                                    <select class="form-control"  name="profit" id="profit">
                                      <option value="">--Select--</option>
                                        <option <?php if($arrPost['profit']=="0-10000"){ echo 'selected="selected"';}?> value="0-10000">$0 - $10,000</option>
                                        <option <?php if($arrPost['profit']=="10001-100000"){ echo 'selected="selected"';}?> value="10001-100000">$10,001 - $100,000</option>
                                        <option <?php if($arrPost['profit']=="100001-500000"){ echo 'selected="selected"';}?> value="100001-500000">$100,001 - $500,000</option>
                                        <option <?php if($arrPost['profit']=="500001-1000000"){ echo 'selected="selected"';}?> value="500001-1000000">$500,001 - $1,000,000</option>
                                        <option <?php if($arrPost['profit']>="1000001"){ echo 'selected="selected"';}?> value="1000001">$1,000,001 and More</option>
                                    </select>
                                    <span id="err_profit" class="error_class"></span>
                                </div>
                               
                               
                            </div>
                            <div class="form-group row align-items-center mb-4">
                                <div class="col-md-4">
                                    <label>How old is the company *</label>
                                </div>
                                <div class="col-md-8">
                                    <select class="form-control"  name="cyears" id="cyears">
                                         <option value="">--Select--</option>
                                         <option <?php if($arrPost['cyears']=="0-1"){ echo 'selected="selected"';}?>  value="0-1">0 - 1</option>
                                        <option <?php if($arrPost['cyears']=="2-5"){ echo 'selected="selected"';}?> value="2-5">2 - 5</option>
                                        <option <?php if($arrPost['cyears']=="6-10"){ echo 'selected="selected"';}?> value="6-10">6 - 10</option>
                                        <option <?php if($arrPost['cyears']=="11-30"){ echo 'selected="selected"';}?> value="11-30">11 - 30</option>
                                        <option <?php if($arrPost['cyears']>="31"){ echo 'selected="selected"';}?> value="31">31 and More</option>
                                    </select>
                                    <span id="err_cyears" class="error_class"></span>
                                </div>
                                
                                
                            </div>
                            <div class="form-group row align-items-center mb-4">
                                <div class="col-md-4">
                                     <label>Total marketing budget, monthly *</label>
                                </div>
                                <div class="col-md-8">
                                    <select class="form-control"   name="marketing" id="marketing">
                                         <option value="">--Select--</option>
                                        <option <?php if($arrPost['marketing']=="0-1000"){ echo 'selected="selected"';}?> value="0-1000">$0 - $1000</option>
                                        <option <?php if($arrPost['marketing']=="1001-5000"){ echo 'selected="selected"';}?> value="1001-5000">$1001 - $5,000</option>
                                        <option <?php if($arrPost['marketing']=="5001-10000"){ echo 'selected="selected"';}?> value="5001-10000">$5001 - $10,000</option>
                                        <option <?php if($arrPost['marketing']=="10001-100000"){ echo 'selected="selected"';}?> value="10001-100000">$10,001 - $100,000</option>
                                        <option <?php if($arrPost['marketing']=="100001-500000"){ echo 'selected="selected"';}?> value="100001-500000">$100,001 - $500,000</option>
                                        <option <?php if($arrPost['marketing']=="500001-1000000"){ echo 'selected="selected"';}?> value="500001-1000000">$500,001 - $1,000,000</option>
                                        <option <?php if($arrPost['marketing']=="1000001-3000000"){ echo 'selected="selected"';}?> value="1000001-3000000">$1,000,001 - $3,000,000</option>
                                        <option <?php if($arrPost['marketing']=="3000001-5000000"){ echo 'selected="selected"';}?> value="3000001-5000000">$3,000,001 - $5,000,000</option>
                                        <option <?php if($arrPost['marketing']=="5000001-10000000"){ echo 'selected="selected"';}?> value="5000001-10000000">$5,000,001 - $10,000,000</option>
                                        <option <?php if($arrPost['marketing']=="10000001-25000000"){ echo 'selected="selected"';}?> value="10000001-25000000">$10,000,001 - $25,000,000</option>
                                         
                                        
                                    </select>
                                    <span id="err_marketing" class="error_class"></span>
                                </div>
                               
                                
                            </div>
                            <div class="form-group row align-items-center mb-4">
                                <div class="col-md-4">
                                     <label>Total salaries, monthly *</label>
                                </div>
                                <div class="col-md-8">
                                    <select class="form-control"  name="salaries" id="salaries">
                                         <option value="">--Select--</option>
                                         <option <?php if($arrPost['salaries']=="0-1000"){ echo 'selected="selected"';}?> value="0-1000">$0 - $1,000</option>
                                        <option <?php if($arrPost['salaries']=="1001-5000"){ echo 'selected="selected"';}?> value="1001-5000">$1001 - $5,000</option>
                                        <option <?php if($arrPost['salaries']=="5001-10000"){ echo 'selected="selected"';}?> value="5001-10000">$5001 - $10,000</option>
                                         <option <?php if($arrPost['salaries']=="10001-100000"){ echo 'selected="selected"';}?> value="10001-100000">$10,001 - $100,000</option>
                                         <option <?php if($arrPost['salaries']=="100001-500000"){ echo 'selected="selected"';}?> value="100001-500000">$100,001 - $500,000</option>
                                        <option <?php if($arrPost['salaries']=="500001-1000000"){ echo 'selected="selected"';}?> value="500001-1000000">$500,001 - $1,000,000</option>
                                        <option <?php if($arrPost['salaries']>="1000001"){ echo 'selected="selected"';}?> value="1000001">$1,000,001 and More</option>
                                    </select>
                                    <span id="err_salaries" class="error_class"></span>
                                </div>
                               
                                 
                            </div>
                            <div class="form-group text-center mt-5">
								<button class="button cls_js_license" name="btnCalculate" id="btnCalculate">Calculate Value</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-9 mx-auto text-center">
                        
						<?php 
						if(isset($arrIpvalues) && count($arrIpvalues) > 0){
						?>
						<ul class="calc-result">
                            <li>
                                <h4>Estimated value of your IP is:</h4>
                            </li>
                            <li>
                                <h4><span>Min:</span> <span>$ <?php echo number_format($arrIpvalues[7]['min']);?> </span></h4>
                            </li>
                            <li>
                                <h4><span>Max:</span> <span>$ <?php echo number_format($arrIpvalues[7]['max']);?></span></h4>
                            </li>
                            <li>
                                <h4><span>Average:</span> <span>$ <?php echo number_format($arrIpvalues[7]['std']);?> </span></h4>
                            </li>
                        </ul>
						<table style="" width="950" cellspacing="0" cellpadding="0" border="1" align="center">		<!--class="table table-bordered table-striped mb-0" id="datatable-default"-->
						<thead>
							<tr>												
								<th style="padding: 10px; color: #fff; font-size: 18px; font-weight: bold; background-color:#0a2f53; ">#</th>
								<th style="padding: 10px; color: #fff; font-size: 18px; font-weight: bold; background-color:#0a2f53; ">POSSIBLE BENEFITS</th>
								<th style="padding: 10px; color: #fff; font-size: 18px; font-weight: bold; background-color:#0a2f53; ">Minimum</th>
								<th style="padding: 10px; color: #fff; font-size: 18px; font-weight: bold; background-color:#0a2f53; ">Standard</th>
								<th style="padding: 10px; color: #fff; font-size: 18px; font-weight: bold; background-color:#0a2f53; ">Maximum</th>
							</tr>											
						</thead>
						<tbody>
						<?php 
							$i=1; 
							foreach($arrIpvalues as $us)
							{
								
							?>	
							<tr>
								<td style="padding: 10px; color: #000; font-size: 18px; font-weight: bold;"><?php echo $i;?></td>
								<td style="padding: 10px; color: #000; font-size: 18px; font-weight: bold;"><?php echo $us['benefits']; ?></td>
								<td style="padding: 10px; color: #000; font-size: 18px; font-weight: bold;"><?php echo number_format($us['min']);?></td>
								<td style="padding: 10px; color: #000; font-size: 18px; font-weight: bold;"><?php echo number_format($us['std']);?></td>
								<td style="padding: 10px; color: #000; font-size: 18px; font-weight: bold;"><?php echo number_format($us['max']);?></td>
							</tr>	
							<?php
							$i++; 							
							}
						?>
						</tbody>
						
						</table>
						<br>
						<div class="get-certificate">
                            <div class="certificate-info">
                                <h2>Get real valuation and Certificate!</h2>
                                <div class="img-box">
                                    <img src="<?php echo base_url('templates/frontend/');?>images/download.svg" alt="download">
                                </div>
                                <a href="<?php echo base_url('#valuation-services');?>" class="button">Order Valuation</a>
                            </div>
                        </div>
						<?php 
						}
						?>
                        
                    </div>
                </div>
            </div>
        </section>
       