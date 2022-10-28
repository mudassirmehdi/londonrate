<style>
.questionnaire {
    padding: 56px 0;
    min-height: 500px;	
}
@media (max-width: 767px){
   .questionnaire {
       min-height: auto;
   }
}
</style>  
		<section class="questionnaire">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-xl-7 mx-auto">
                        <div class="section-title">
                            <h2 class="mb-0">Login</h2>
                        </div>
                        <div class="wizard">
                            
                            <form role="form" name="frm_questionnaire_universal4" id="frm_questionnaire_universal4" class="login-box" method="post" >
                                <div class="tab-content" id="main_form">
                                    
                                    
                                    <div class="tab-pane active" role="tabpanel" id="step4">
                                        
                                        <div>
										
										<?php if($this->session->flashdata('success')!=""){?>
						<div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<?php echo $this->session->flashdata('success');?>
						</div>
						<?php }?>
				
						<?php if($error_msg!=""){?>
						<div class="alert alert-danger">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<?php echo $error_msg;?>
						</div>
						<?php }?>
						
                                            <div class="form-group">
                                                <label>Email Address *</label>
                                                <div class="input-wrap" >
                                                     <input class="form-control" type="text" name="applicant_email" id="applicant_email" value="<?php echo $applicant_email;?>" placeholder="Enter email address"/>
													
                                                </div>
													<span id="err_applicant_email" class="error_class"></span>
                                            </div>
                                            <div class="form-group">
                                                <label>Password *</label>
                                                <input class="form-control" type="password" name="applicant_password" id="applicant_password" placeholder="Enter password"/>
												<span id="err_applicant_password" class="error_class"></span>
                                            </div>
                                            
                                        <div class="form-group d-flex justify-content-between mt-5">
                                            
                                             <button type="submit" name="btn_userlogin" id="btn_userlogin" class="button next-step">Login</button>
                                             
											  <a href="<?php echo base_url();?>user/forget_password_otp" style="color:#1890ff">Forgot Password?</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        