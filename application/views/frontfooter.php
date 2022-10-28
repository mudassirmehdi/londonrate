<footer id="footer">
    	<div class="footer-top">
    		<div class="container">
	    		<div class="row">
	    			<div class="col-md-4 mb-5 mb-md-0">
	    				<div class="company-info">
	    					<img src="<?php echo base_url('templates/frontend/');?>images/logo-footer.png">
	    					<p>We provide the IP community with a visionary approach to calculating and communicating the financial impact of trademarks, copyrights, patents, brands and intangible assets. As a pioneer in the IP Community,</p>

	    					<form action="#" method="Post" class="newslatter-form">
	    						<img src="<?php echo base_url('templates/frontend/');?>images/icons/email-icon.svg" class="email-icon">
	    						<input type="email" name="email" placeholder="Email Address">
	    						<button type="submit" class="newslatter-btn">Subscribe</button>
	    					</form>
	    				</div>
	    			</div>

	    			<div class="col-md-5 mb-5 mb-md-0">
	    				<div class="footer-links">
	    					<h4>Main Links</h4>

	    					<div class="row">
	    						<div class="col-md-4 col-6">
	    							<ul>
	    								<li><a href="#">Company</a></li>
	    								<li><a href="#">Careers</a></li>
	    								<li><a href="#">Press media</a></li>
	    								<li><a href="#">Our Blog</a></li>
	    								<li><a href="#">Privacy Policy</a></li>
	    								<li><a href="#">Pricing</a></li> 
	    							</ul>
	    						</div>

	    						<div class="col-md-4 col-6">
	    							<ul>
	    								<li><a href="<?php echo base_url('ip/valuation');?>">Why Us</a></li>
	    								<li><a href="<?php echo base_url('home/about');?>">About Us</a></li>
	    								<li><a href="<?php echo base_url('home/partnership');?>">Partnership</a></li>
	    								<li><a href="#">Our Services</a></li>
	    								<li><a href="#">Sitemap</a></li>
	    								<li><a href="<?php echo base_url('home/risk');?>">Risk Analysis</a></li> 
	    							</ul>
	    						</div>

	    						<div class="col-md-4 col-6">
	    							<ul>
	    								<li><a href="<?php echo base_url('iptype/mobile');?>">Mobile Aplication</a></li>
	    								<li><a href="<?php echo base_url('iptype/technology');?>">Technology Product</a></li>
	    								<li><a href="<?php echo base_url('iptype/trademark');?>">Brand Trademark</a></li>
	    								<li><a href="<?php echo base_url('iptype/artwork');?>">Artwork</a></li>
	    								<li><a href="<?php echo base_url('iptype/webdomain');?>">Website Domain</a></li>
	    								<li><a href="<?php echo base_url('iptype/license');?>">License</a></li> 
	    							</ul>
	    						</div>
	    					</div>
	    				</div>

	    			</div>

	    			<div class="col-md-3 mb-5 mb-md-0">
	    				<div class="news-project">
	    					<h4>News & Projects</h4>
	    					<ul class="unstyled_list">
	    						<li class="news-project-items">
	    							<div class="row">
	    								<div class="col-4">
	    									<img src="<?php echo base_url('templates/frontend/');?>images/footer-p1.png">
	    								</div>
	    								<div class="col-8">
	    									<h6>Oct 12, 2022</h6>
	    									<h5>IP-Shares Market</h5>
	    								</div>
	    							</div>
	    						</li>

	    						<hr>

	    						<li class="news-project-items">
	    							<div class="row">
	    								<div class="col-4">
	    									<img src="<?php echo base_url('templates/frontend/');?>images/footer-p2.png">
	    								</div>
	    								<div class="col-8">
	    									<h6>Oct 12, 2022</h6>
	    									<h5>How to prepare your company for IP Valuation</h5>
	    								</div>
	    							</div>
	    						</li>

	    					</ul>
	    				</div>
	    			</div>
	    		</div>
	    	</div>
    	</div>
    	<div class="copyright-area">
    		<div class="container">
    			<div class="d-flex justify-content-md-between justify-content-center flex-wrap"> 
					<p class="copyright-text mb-4 mb-md-0">Copyright © Design By <a href="#" target="_blank">RED</a></p>  
					<ul class="unstyled_list d-flex social-links mb-md-0 ps-0">
						<li class="mx-3"><a href="#" target="_blank">Fb.</a></li>
						<li class="mx-3"><a href="#" target="_blank">Tw.</a></li>
						<li class="mx-3"><a href="#" target="_blank">Ln.</a></li>
					</ul> 
    			</div>
    		</div>
    	</div>
    </footer>


 

<!-- Login Modal -->
<div class="modal fade login-modal" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body p-0">
          <div class="modal-logo">
          	<img src="<?php echo base_url('templates/frontend/');?>images/logo-dark.png">
          </div>



          <form class="login-box modal-form" role="form" name="frm_questionnaire_universal4" id="frm_questionnaire_universal4" method="post" >

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

          	 <div class="input-group mb-4">
								  <span class="input-group-text" id="basic-addon1">Username</span>
								  <input class="form-control" type="text" name="applicant_email" id="applicant_email" value="<?php echo $applicant_email;?>">
							 </div>

							 <div class="input-group mb-5">
								  <span class="input-group-text" id="basic-addon1">Password</span>
								  <input class="form-control" type="password" name="applicant_password" id="applicant_password">
								  <span id="err_applicant_password" class="error_class"></span>
							 </div>

							 <div class="modal-form-btn mb-4 text-center">
							 	<button type="submit" name="btn_userlogin" id="btn_userlogin" class="button next-step">Login</button>
							 </div>

							 <div class="form-next-text text-center">
							 	<small>or continue with:</small>
							 </div>

							 <div class="social-login">
							 	<button class="facebook-btn">
							 		<img src="<?php echo base_url('templates/frontend/');?>images/icons/facebook-icon.svg">
							 	</button>

							 	<button class="google-btn">
							 		<img src="<?php echo base_url('templates/frontend/');?>images/icons/google-icon.svg">
							 	</button>
							 </div>


							 <div class="form-next-text text-center">
							 	<small>Don’t have an account? <a href="#">Register here</a></small>
							 </div>

          </form>
      </div>
    </div>
  </div>
</div>




	<script src="<?php echo base_url('templates/frontend/');?>js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('templates/frontend/');?>js/script.js"></script>

	<script src="<?php echo base_url('templates/frontend/');?>js/front_validation.js"></script>

	<script type="text/javascript">
	    function getComma_average_sales(txtinpfld)
	    { 
	       document.getElementById(txtinpfld).addEventListener('input', event =>
	       event.target.value = (parseInt(event.target.value.replace(/[^\d]+/gi, '')) || 0).toLocaleString('en-US')); 
	    }
	</script>
</body>
</html>