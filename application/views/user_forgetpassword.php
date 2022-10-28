  
		<section class="questionnaire" style="min-height:430px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-xl-7 mx-auto">
                        <div class="section-title">
                            <h2 class="mb-0">Forgot Password</h2>
                            <?php 
                            session_start();
                            $session_otp=$this->session->userdata('session_otp');
                $applicant_id=$this->session->userdata('applicant_email');
                            ?>

                                <input type="hidden" name="app_id" id="app_id" value="<?php echo $applicant_id;?>">
                        </div>
                        <div class="wizard">
                            
                            <form role="form" action="<?php echo site_url('User/forget_password');?>" name="frm_forget_password" id="frm_forget_password" class="login-box" method="post" >
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
                                                <label>Enter OTP *</label>
                                                <div class="input-wrap" >
                                                     <input class="form-control" type="text" name="otp_id" id="otp_id" value="" placeholder="Enter OTP Code.."/>
													
                                                </div>
													<!-- <span id="err_applicant_email" class="error_class"></span> -->
                                            </div>
                                            <div class="form-group">
                                                <label>New Password *</label>
                                                <input class="form-control" type="password" name="applicant_password" id="applicant_password" placeholder="Enter password"/>
												<span id="err_applicant_password" class="error_class"></span>
                                            </div>
                                            
											 <div class="form-group">
                                                <label>Confirm Password *</label>
                                                <input class="form-control" type="password" name="applicant_confirm_password" id="applicant_confirm_password" placeholder="Enter password"/>
												<span id="err_applicant_confirm_password" class="error_class"></span>
                                            </div>
                                            
											
                                        <div class="form-group d-flex justify-content-between mt-5">
                                             <button type="reset" class="button next-step" style="color:#fff;">Cancel</button>
                                            
                                             <button type="submit" name="btn_usersubmit"  class="button next-step">Submit</button>
											<!-- id="btn_forgot" -->
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        