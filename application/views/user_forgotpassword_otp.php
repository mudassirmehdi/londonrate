<section class="questionnaire" style="min-height:430px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-xl-7 mx-auto">
                        <div class="section-title">
                            <h2 class="mb-0">Forgot Password</h2>
                        </div>
                        <div class="wizard">
                            
                            <form role="form" action="<?php echo site_url('User/forget_password_otp');?>" name="frm_forget_password" id="frm_forget_password" class="login-box" method="post" >
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
                                            
                                            
											
                                        <div class="form-group d-flex justify-content-between mt-5">
                                             <button type="reset" class="button next-step" style="color:#fff;">Cancel</button>
											
                                             <button type="submit" name="btn_send_otp" id="btn_send_otp" class="button next-step">Submit</button>
											
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        