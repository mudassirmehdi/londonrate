
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
                        <li class="breadcrumb-item active">Services</li>
                      </ol>
                    </nav>

                    <h1>Request <?php echo $session_package_name;?> Certificate</h1>

                </div>
            </div>

        </div>
    </div>
  
		<section class="questionnaire form-wizard-section section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 mx-auto">
                        <div class="wizard">
                            <div class="wizard-inner">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active">
                                        <a href="<?php echo base_url();?>Questionnaire/universal" ><span class="round-tab">1 </span><i>Applicant
                                                information</i></a>
                                    </li>
                                    <li role="presentation" class="active">
                                        <a href="<?php echo base_url();?>Questionnaire/companyinformation" ><span class="round-tab">2</span><i>Company
                                                information</i></a>
                                    </li>
                                    <li role="presentation" class="active">
                                        <a href="javascript:void(0);" role="tab"><span
                                                class="round-tab">3</span><i>IP-work information</i></a>
                                    </li>
                                    <li role="presentation" class="disabled">
                                        <a href="javascript:void(0);"  role="tab"><span
                                                class="round-tab">4</span><i>Additional information</i></a>
                                    </li>
                                </ul>
                            </div>
                            <form role="form" name="frm_questionnaire_universal3" id="frm_questionnaire_universal3" class="login-box" method="post">
                                <div class="tab-content" id="main_form">
                                    
                                    
                                    <div class="tab-pane active" role="tabpanel" id="step3">
                                        <h4 class="text-left fs-title">IP-work information</h4>
                                        <div class="form-card">
                                            <div class="accordion" id="accordionExample">
											
                                                <div class="card">
                                                    <!-- <button class="btn" type="button" data-toggle="collapse"
                                                        data-target="#ipWrokOne0" aria-expanded="true"
                                                        aria-controls="ipWrokOne0">
                                                        Object of IP-Work #1
                                                        <div class="accord-arrow">
                                                            <img src="<?php // echo base_url('templates/frontend/');?>images//accrd-arrow.svg" alt="Accord arrow">
                                                        </div>
                                                    </button> -->
													
                                                    <div id="ipWrokOne0" class="collapse show"
                                                        aria-labelledby="headingOne" data-parent="#accordionExample">
                                                        <div class="card-body">
                                                            <div class="form-group row align-items-center mb-4">
                                                                <div class="col-md-4 text-start">
                                                                    <label class="form-label">Title of IP-work *</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input class="form-control cls_ip_work_title" type="text" name="ip_work_title[]" id="ip_work_title_1" data-id="1" value="<?php echo $ip_work_title[0];?>"/>
                                                                    <span id="err_ip_work_title_1" class="error_class"></span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row align-items-center mb-4">
                                                               <div class="col-md-4 text-start">
                                                                    <label class="form-label">Object of IP-Work *</label>
                                                               </div>
                                                               <div class="col-md-8">
                                                                    <select class="form-control cls_ip_work_object" name="ip_work_object[]" id="ip_work_object_1" data-id="1" onchange="javascript:return load_object_IP_work(this.value,'1','<?php echo $ip_work_type[0];?>');">
                                                                    <option value="">--Select--</option>
                                                                    <?php if(isset($ipworkobjectlist) && count($ipworkobjectlist)>0){
                                                                        foreach($ipworkobjectlist as $ip){?>
                                                                    <option value="<?php echo $ip['object_id'];?>" <?php if($ip['object_id']==$ip_work_object[0]){echo 'selected="selected"'; }?>><?php echo $ip['object'];?></option>
                                                                        <?php }
                                                                    }?>
                                                                </select>
                                                                <span id="err_ip_work_object_1" class="error_class"></span>
                                                               </div>
                                                            </div>
															
															
															
                                                            <div class="form-group row align-items-center mb-4">
                                                               <div class="col-md-4 text-start">
                                                                    <label class="form-label">Type of IP-Work *</label>
                                                               </div>
                                                               <div class="col-md-8">
                                                                    <select class="form-control" name="ip_work_type[]" id="ip_work_type_1" data-id="1" onchange="javascript:return load_ip_work_type(this.value,'1','<?php echo $industry_ip_work[0];?>');">
                                                                    <option value="">--Select--</option>
                                                                    <?php /*if(isset($ip_work_type) && count($ip_work_type)>0){
                                                                        for($i=0;$i<count($ip_work_type);$i++) {?>
                                                                    <option value="<?php echo $ip_work_type[$i];?>"><?php echo $ip_work_type[$i];?></option>
                                                                    <?php }
                                                                    }*/ ?>
                                                                </select>
                                                                <span id="err_ip_work_type_1" class="error_class"></span>
                                                               </div>
                                                            </div>
															
															
															
                                                            <div class="form-group row align-items-center mb-4">

                                                                <div class="col-md-4 text-start">
                                                                     <label class="form-label">Industry of usage of IP-work *</label>
                                                                </div>
                                                               
                                                                <div class="col-md-8">
                                                                     <select class="form-control" name="industry_ip_work[]" id="industry_ip_work_1" data-id="1">
                                                                    <option value="">--Select--</option>
                                                                    <?php if(isset($ipworkusagelist) && count($ipworkusagelist)>0){
                                                                        foreach($ipworkusagelist as $ip){?>
                                                                    <option value="<?php echo $ip['usage_id'];?>" <?php if($ip['usage_id']==$industry_ip_work[0]){echo 'selected="selected"'; }?>><?php echo $ip['usage'];?></option>
                                                                        <?php }
                                                                    }?>
                                                                </select>
                                                                <span id="err_industry_ip_work_1" class="error_class"></span>
                                                                </div>
                                                            </div>

                                                                    <div class="form-group row align-items-center mb-4">
                                                                       <div class="col-md-4 text-start">
                                                                            <label class="form-label">Status of IP-work *</label>
                                                                       </div>
                                                                       <div class="col-md-8">
                                                                            <select class="form-control" name="ip_work_status[]" id="ip_work_status_1" data-id="1" onclick="javascript:return set_development_date(this.value,'1')">
                                                                            <option value="">--Select--</option>
                                                                            <option value="Already_created" <?php if("Already_created"==$ip_work_status[0]){echo 'selected="selected"'; }?>>Already created</option>
                                                                            <option value="In_process_of_creation" <?php if("In_process_of_creation"==$ip_work_status[0]){echo 'selected="selected"'; }?>>In process of creation</option>
                                                                        </select>
                                                                        <span id="err_ip_work_status_1" class="error_class"></span>
                                                                       </div>
                                                                    </div>

                                                                    <div class="form-group row align-items-center mb-4">
                                                                        <div class="col-md-4 text-start">
                                                                            <label id="display_developement_status_1">Creation date *</label>
                                                                        </div>

                                                                        <div class="col-md-8">
                                                                            <input class="form-control" type="date" name="development_date[]" id="development_date_1" data-id="1" value="<?php echo $development_date[0];?>" placeholder="yyyy-mm-dd" > 
                                                                            <span id="err_development_date_1" class="error_class"></span>
                                                                        </div>
                                                                    </div> 

                                                            <div class="form-group text-start py-4">
                                                                <label class="form-label">Form of registration of IP-Work</label>
                                                            </div>


                                                            <div class="form-group row align-items-center mb-4">
                                                                <div class="col-md-4 text-start">
                                                                     <label class="form-label">Date of registration *</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                     <input class="form-control" type="date" name="registration_date[]" id="registration_date_1" data-id="1" value="<?php echo $registration_date[0];?>">
                                                                <span id="err_registration_date_1" class="error_class"></span>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row align-items-center mb-4">
                                                                <div class="col-md-4 text-start">
                                                                    <label class="form-label">Coverage area *</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <select class="form-control" name="coverage_area[]" id="coverage_area_1" data-id="1">
                                                                        <option value="">--Select--</option>
                                                                    </select>
                                                                    <span id="err_coverage_area_1" class="error_class"></span> 
                                                                </div>
                                                            </div>

 
                                                          
                                                                    <div class="form-group row align-items-center mb-4">
                                                                       <div class="col-md-4 text-start">
                                                                            <label class="form-label">Registration organisation *</label>
                                                                       </div>

                                                                       <div class="col-md-8">
                                                                             <input class="form-control" type="text" name="registration_org[]" id="registration_org_1" data-id="1" value="<?php echo $registration_org[0];?>">
                                                                            <span id="err_registration_org_1" class="error_class"></span>
                                                                       </div>
                                                                      
																	</div> 

                                                                    <div class="form-group row align-items-center mb-4"> 
                                                                        <div class="col-md-4 text-start">
                                                                            <label class="form-label">Rightsholder(s) *</label>
                                                                        </div>
                                                                       <div class="col-md-8">
                                                                            <select class="form-control"  name="rightsholders[]" id="rightsholders_1" data-id="1">
                                                                            <option value="">--Select--</option>
                                                                            <option value="Individual" <?php if("Individual"==$rightsholders[0]){echo 'selected="selected"'; }?>>Individual</option>
                                                                            <option value="Company" <?php if("Company"==$rightsholders[0]){echo 'selected="selected"'; }?>>Company</option>
                                                                            <option value="Combined" <?php if("Combined"==$rightsholders[0]){echo 'selected="selected"'; }?>>Combined</option>
                                                                             <option value="Government" <?php if("Government"==$rightsholders[0]){echo 'selected="selected"'; }?>>Government</option>
                                                                        </select>
                                                                        <span id="err_rightsholders_1" class="error_class"></span>
                                                                       </div>
                                                                    </div> 
															
                                                            <div class="form-group row align-items-center mb-4" id="div_indust_1"> 
                                                                <div class="col-md-4 text-start">
                                                                    <label class="form-label">Industries *</label>
                                                                </div>
																<div class="col-md-8">
                                                                 <select class="form-control" name="industries[]" id="industries_1" data-id="1">
                                                                    <option value="">--Select--</option>
                                                                 </select>
                                                                  <span id="err_industries_1" class="error_class"></span>                                                
                                                                </div>
                                                            </div>
															
                                                            <div class="form-group" id="div_nice_class_1" style="display:none;">
                                                                <label class="form-label">List of industries(Nice classification for TM) *</label>
																 <select class="form-control" name="nice_classification[]" id="nice_classification_1" data-id="1">
                                                                            <option value="">--Select--</option>
                                                                            
                                                                        </select>
																		
																<span id="err_nice_classification_1" class="error_class"></span>
                                                            </div>
															
															<input type="hidden" name="is_industries[]"	id="is_industries_1" value="YES" />
                                                        </div>
                                                    </div>
                                                </div>
												
												<div class="form-group" id="div_add_ip_work_information">
												<?php if(isset($ip_work_title) && count($ip_work_title)>0) 
												{
													$r=2;
													for($j=1;$j<count($ip_work_title);$j++)
													{?>
												<div class="card">
                                                    <button class="btn" type="button" data-toggle="collapse"
                                                        data-target="#ipWrokOne0" aria-expanded="true"
                                                        aria-controls="ipWrokOne0">
                                                        Object of IP-Work #<?php echo $r;?>
                                                        <div class="accord-arrow">
                                                            <img src="<?php echo base_url('templates/frontend/');?>images//accrd-arrow.svg" alt="Accord arrow">
                                                        </div>
                                                    </button>
													
                                                    <div id="ipWrokOne0" class="collapse show"
                                                        aria-labelledby="headingOne" data-parent="#accordionExample">
                                                        <div class="card-body">
                                                            <div class="form-group">
                                                                <label class="form-label">Title of IP-work *</label>
                                                                <input class="form-control cls_ip_work_title" type="text" name="ip_work_title[]" id="ip_work_title_<?php echo $r;?>" data-id="<?php echo $r;?>" value="<?php echo $ip_work_title[$j];?>"/>
																<span id="err_ip_work_title_<?php echo $r;?>" class="error_class"></span>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label">Object of IP-Work *</label>
                                                                <select class="form-control cls_ip_work_object" name="ip_work_object[]" id="ip_work_object_<?php echo $r;?>" data-id="<?php echo $r;?>" onchange="javascript:return load_object_IP_work(this.value,'<?php echo $r;?>','<?php echo $ip_work_type[$j];?>');">
                                                                    <option value="">--Select--</option>
																	<?php if(isset($ipworkobjectlist) && count($ipworkobjectlist)>0){
																		foreach($ipworkobjectlist as $ip){?>
                                                                    <option value="<?php echo $ip['object_id'];?>" <?php if($ip['object_id']==$ip_work_object[$j]){echo 'selected="selected"'; }?>><?php echo $ip['object'];?></option>
																		<?php }
																	}?>
                                                                </select>
																<span id="err_ip_work_object_<?php echo $r;?>" class="error_class"></span>
                                                            </div>
															
															
															
                                                            <div class="form-group">
                                                                <label class="form-label">Type of IP-Work *</label>
                                                                <select class="form-control" name="ip_work_type[]" id="ip_work_type_<?php echo $r;?>" data-id="<?php echo $r;?>" onchange="javascript:return load_ip_work_type(this.value,'<?php echo $r;?>','<?php echo $industry_ip_work[$j];?>');">
                                                                    <option value="">--Select--</option>
																	<?php /*if(isset($ip_work_type) && count($ip_work_type)>0){
																		for($i=0;$i<count($ip_work_type);$i++) {?>
																	<option value="<?php echo $ip_work_type[$i];?>"><?php echo $ip_work_type[$i];?></option>
																	<?php }
																	}*/ ?>
                                                                </select>
																<span id="err_ip_work_type_<?php echo $r;?>" class="error_class"></span>
                                                            </div>
															
															
															
                                                            <div class="form-group">
                                                                <label class="form-label">Industry of usage of IP-work *</label>
                                                                <select class="form-control" name="industry_ip_work[]" id="industry_ip_work_<?php echo $r;?>" data-id="<?php echo $r;?>">
                                                                    <option value="">--Select--</option>
                                                                    <?php if(isset($ipworkusagelist) && count($ipworkusagelist)>0){
																		foreach($ipworkusagelist as $ip){?>
                                                                    <option value="<?php echo $ip['usage_id'];?>" <?php if($ip['usage_id']==$industry_ip_work[$j]){echo 'selected="selected"'; }?>><?php echo $ip['usage'];?></option>
																		<?php }
																	}?>
                                                                </select>
																<span id="err_industry_ip_work_<?php echo $r;?>" class="error_class"></span>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="form-label">Status of IP-work *</label>
                                                                        <select class="form-control" name="ip_work_status[]" id="ip_work_status_<?php echo $r;?>" data-id="<?php echo $r;?>" onclick="javascript:return set_development_date(this.value,'<?php echo $r;?>')">
                                                                            <option value="">--Select--</option>
                                                                            <option value="Already_created" <?php if("Already_created"==$ip_work_status[$j]){echo 'selected="selected"'; }?>>Already created</option>
                                                                            <option value="In_process_of_creation" <?php if("In_process_of_creation"==$ip_work_status[$j]){echo 'selected="selected"'; }?>>In process of creation</option>
                                                                        </select>
																		<span id="err_ip_work_status_<?php echo $r;?>" class="error_class"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="form-label">Creation date *</label>
                                                                        <input class="form-control" type="date" name="development_date[]" id="development_date_<?php echo $r;?>" data-id="<?php echo $r;?>" value="<?php echo $development_date[$j];?>"> 
																		<span id="err_development_date_<?php echo $r;?>" class="error_class"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label">Form of registration of IP-Work</label>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label id="display_developement_status_<?php echo $r;?>">Date of registration *</label>
                                                                        <input class="form-control" type="date" name="registration_date[]" id="registration_date_<?php echo $r;?>" data-id="<?php echo $r;?>" value="<?php echo $registration_date[$j];?>">
																		<span id="err_registration_date_<?php echo $r;?>" class="error_class"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="form-label">Coverage area *</label>
                                                                        <select class="form-control" name="coverage_area[]" id="coverage_area_<?php echo $r;?>" data-id="<?php echo $r;?>">
                                                                            <option value="">--Select--</option>
                                                                        </select>
																		<span id="err_coverage_area_<?php echo $r;?>" class="error_class"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="form-label">Registration organisation *</label>
                                                                        <input class="form-control" type="text" name="registration_org[]" id="registration_org_<?php echo $r;?>" data-id="<?php echo $r;?>" value="<?php echo $registration_org[$j];?>">
                                                                    <span id="err_registration_org_<?php echo $r;?>" class="error_class"></span>
																	</div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="form-label">Rightsholder(s) *</label>
                                                                        <select class="form-control"  name="rightsholders[]" id="rightsholders_<?php echo $r;?>" data-id="<?php echo $r;?>">
                                                                            <option value="">--Select--</option>
                                                                            <option value="Individual" <?php if("Individual"==$rightsholders[$j]){echo 'selected="selected"'; }?>>Individual</option>
                                                                            <option value="Company" <?php if("Company"==$rightsholders[$j]){echo 'selected="selected"'; }?>>Company</option>
                                                                            <option value="Combined" <?php if("Combined"==$rightsholders[$j]){echo 'selected="selected"'; }?>>Combined</option>
																			 <option value="Government" <?php if("Government"==$rightsholders[$j]){echo 'selected="selected"'; }?>>Government</option>
                                                                        </select>
																		<span id="err_rightsholders_<?php echo $r;?>" class="error_class"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
															<div class="form-group">
                                                                <label class="form-label">Industries *</label>
																 <select class="form-control" name="industries[]" id="industries_<?php echo $r;?>" data-id="<?php echo $r;?>">
                                                                            <option value="">--Select--</option>
                                                                 </select>
																<span id="err_industries_<?php echo $r;?>" class="error_class"></span>
                                                            </div>
															
                                                            <div class="form-group">
                                                                <label class="form-label">List of industries(Nice classification for TM) *</label>
																 <select class="form-control" name="nice_classification[]" id="nice_classification_<?php echo $r;?>" data-id="<?php echo $r;?>">
                                                                            <option value="">--Select--</option>
                                                                            
                                                                        </select>
																		
																<span id="err_nice_classification_<?php echo $r;?>" class="error_class"></span>
                                                            </div>
															<input type="hidden" name="is_industries[]"	id="is_industries_<?php echo $r;?>" value="YES" />
                                                        </div>
                                                    </div>
                                                </div>
													<?php }
												}?>
												</div>
											
                                               <!--  <div class="form-group add-input">
                                                    <a href="javascript:void(0);" class="add-close add_ip_work_field_button"><img src="<?php // echo base_url('templates/frontend/');?>images/add-input.svg"
                                                            alt="Input close"> Add object</a>
                                                </div> -->
                                                <div class="form-group">
                                                    <h5>Select object to review</h5>
                                                    <div class="custom-control custom-radio" id="remove_custom_radio_1">
                                                        <input type="radio" id="customRadio_1" name="reviewobject"
                                                            class="custom-control-input" value="1" <?php if($reviewobject==0){ ?> checked="checked" <?php }  ?>>
                                                        <label class="custom-control-label" for="customRadio_1">Object of IP-work #1</label>
                                                    </div>
													
													<div  id="div_object_to_review">
													<?php if(isset($ip_work_title) && count($ip_work_title)>0) 
												{
													$r=2;
													for($j=1;$j<count($ip_work_title);$j++)
													{?>
												<div class="custom-control custom-radio" id="remove_custom_radio_<?php echo $r;?>">
                                                        <input type="radio" id="customRadio_<?php echo $r;?>" name="reviewobject"
													class="custom-control-input" value="<?php echo $r;?>" <?php if(isset($reviewobject)){ if($reviewobject==$r){ ?>checked="checked" <?php } }?>>
                                                        <label class="custom-control-label" for="customRadio_<?php echo $r;?>">Object of IP-work #<?php echo $r;?> </label>
                                                    </div>
													<?php }
												}?>
													</div>
													
                                                </div>
												
												
												
                                            </div>
                                            <div class="form-group d-flex justify-content-between mt-5">
                                                <a href="<?php echo base_url();?>questionnaire/companyinformation" class="button prev-step  action-button-previous">Back</a>
                                               <button type="submit" name="btn_applicant_info3" id="btn_applicant_info3" class="button next-step action-button">Next</button>
                                            </div>
                                        </div>
                                    </div>
									
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
		<?php $str_object_ip_work='<option value=""></option>';
		if(isset($ip_work_title) && count($ip_work_title)>0)
				{
					
					$cnt_session_ip_work_title=count($ip_work_title);
			 }
			 else
			 {
				 $cnt_session_ip_work_title=1;
			 }
			 
		?>
																		
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>	
<script>        
$(document).ready(function() {
	
	/* for ip work information */
    var max_fields      = 50; //maximum input boxes allowed
    
    var x = <?php echo $cnt_session_ip_work_title;?>; //initlal text box count
	
    $(".add_ip_work_field_button").click(function(e)
	{
	    e.preventDefault();
        if(x < max_fields)
		{ //max input box allowed
			var str_object_ip_work=str_work_usage="<option value=''>--Select--</option>";
            x++; //text box increment
			<?php if(isset($ipworkobjectlist) && count($ipworkobjectlist)>0){
			foreach($ipworkobjectlist as $ip)
			{
				$ress .='';
				$intObjectId = $ip['object_id'];
				$strObject = $ip['object'];
				if($ip['object_id']==$ip_work_object[0])
				{  $ress .= 'selected="selected"'; }
				?>
				str_object_ip_work +="<option value='<?php echo $intObjectId; ?>'   ><?php echo $strObject; ?> </option>";
			<?php 		
			} }
			 ?>	

               <?php if(isset($ipworkusagelist) && count($ipworkusagelist)>0){
					foreach($ipworkusagelist as $ip)
					{
						$intUsageId = $ip['usage_id'];
				$strUsgae = $ip['usage'];
				?>
                  str_work_usage +="<option value='<?php echo $intUsageId;?>' ><?php echo $strUsgae;?></option>";
				<?php }
			}?>
																	
			
			//console.log(str_object_ip_work);
			//return false;
			//alert(x);
            $("#div_add_ip_work_information").append('<div><div class="card"><button class="btn" type="button" data-toggle="collapse" data-target="#ipWrokOne'+x+'" aria-expanded="true" aria-controls="ipWrokOne'+x+'">Object of IP-Work #'+x+'<div class="accord-arrow" id="accord-arrow'+x+'"><img src="'+BASEPATH+'templates/frontend/images/accrd-arrow.svg" alt="Accord arrow"></div></button><div id="ipWrokOne'+x+'" class="collapse show"aria-labelledby="headingOne" data-parent="#accordionExample"><div class="card-body"><div class="form-group"><label>Title of IP-work *</label><input class="form-control cls_ip_work_title" type="text" name="ip_work_title[]" id="ip_work_title_'+x+'" data-id="'+x+'" value=""/><span id="err_ip_work_title_'+x+'" class="error_class"></span></div><div class="form-group"><label>Object of IP-Work *</label><select class="form-control" name="ip_work_object[]" id="ip_work_object_'+x+'" data-id="'+x+'" onchange="javascript:return load_object_IP_work(this.value,'+x+','+"<?php echo $ip_work_type[0];?>"+');">'+str_object_ip_work+'</select><span id="err_ip_work_object_'+x+'" class="error_class"></span></div><div class="form-group"><label>Type of IP-Work *</label><select class="form-control" name="ip_work_type[]" id="ip_work_type_'+x+'"  onchange="javascript:return load_ip_work_type(this.value,'+x+','+"<?php echo $industry_ip_work[0];?>"+');"><option value=""></option></select><span id="err_ip_work_type_'+x+'" class="error_class"></span></div><div class="form-group"><label>Industry of usage of IP-work *</label><select class="form-control" name="industry_ip_work[]" id="industry_ip_work_'+x+'"><option value=""></option>'+str_work_usage+'</select><span id="err_industry_ip_work_'+x+'" class="error_class"></span></div><div class="row"><div class="col-md-6"><div class="form-group"><label>Status of IP-work *</label><select class="form-control" name="ip_work_status[]" id="ip_work_status_'+x+'" onclick="javascript:return set_development_date(this.value,'+x+')"><option value=""></option><option value="Already_created">Already created</option><option value="In_process_of_creation">In process of creation</option></select><span id="err_ip_work_status_'+x+'" class="error_class"></span></div></div><div class="col-md-6"><div class="form-group"><label id="display_developement_status_'+x+'">Creation date *</label><input class="form-control" type="date" name="development_date[]" id="development_date_'+x+'"><span id="err_development_date_'+x+'" class="error_class"></span></div></div></div><div class="form-group"><label>Form of registration of IP-Work</label></div><div class="row"><div class="col-md-6"><div class="form-group"><label >Date of registration *</label><input class="form-control" type="date" name="registration_date[]" id="registration_date_'+x+'"><span id="err_registration_date_'+x+'" class="error_class"></span></div></div><div class="col-md-6"><div class="form-group"><label>Coverage area *</label><select class="form-control" name="coverage_area[]" id="coverage_area_'+x+'"><option value=""></option><option value="">Country 1</option><option value="">Country 2</option><option value="">Country 3</option></select><span id="err_coverage_area_'+x+'" class="error_class"></span></div></div></div><div class="row"><div class="col-md-6"><div class="form-group"><label>Registration organisation *</label><input class="form-control" type="text" name="registration_org[]" id="registration_org_'+x+'"><span id="err_registration_org_'+x+'" class="error_class"></span></div></div><div class="col-md-6"><div class="form-group"><label>Rightsholder(s) *</label><select class="form-control"  name="rightsholders[]" id="rightsholders_'+x+'"><option value=""></option><option value="Individual">Individual</option><option value="Company">Company</option><option value="Combined">Combined</option><option value="Government">Government</option></select><span id="err_rightsholders_'+x+'" class="error_class"></span></div></div></div><div class="form-group" id="div_indust_'+x+'"><label>Industries *</label><select class="form-control" name="industries[]" id="industries_'+x+'" data-id="'+x+'"><option value="">--Select--</option></select><span id="err_industries_'+x+'" class="error_class"></span></div><div class="form-group" id="div_nice_class_'+x+'" style="display:none;"><label>List of industries(Nice classification for TM) *</label><select class="form-control" name="nice_classification[]" id="nice_classification_'+x+'" data-id="'+x+'"><option value="">--Select--</option></select><span id="err_nice_classification_'+x+'" class="error_class"></span></div><input type="hidden" name="is_industries[]"	id="is_industries_'+x+'" value="YES" /></div></div></div><img src="'+BASEPATH+'templates/frontend/images/close-input.svg" alt="Input close" class="remove_ip_work_field" id="remove_'+x+'" data-id="'+x+'"></div>'); //add input box
			
			
			$("#div_object_to_review").append('<div class="custom-control custom-radio" id="remove_custom_radio_'+x+'"><input type="radio" id="customRadio_'+x+'" name="reviewobject" class="custom-control-input" value="'+x+'"><label class="custom-control-label" for="customRadio_'+x+'">Object of IP-work #'+x+'</label></div>');
        }
			
    });
   
    $("#div_add_ip_work_information").on("click",".remove_ip_work_field", function(e){
			//alert(this.id);//user click on remove text
		var clickID=this.id;
		var dataid=$(this).attr('data-id');
        e.preventDefault(); 
		//$(this).parent('div').remove(); 
		$("#"+clickID).parent('div').remove(); 
		$("#remove_custom_radio_"+dataid).remove(); 
		x--;
    });
 });	
	/* end for ip work information */
</script>	