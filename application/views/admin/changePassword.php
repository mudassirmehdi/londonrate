 <div class="inner-wrapper">
<!-- start: sidebar -->
				<?php 	$this->load->view('admin/admin_right');?>
<!-- end: sidebar -->
<section role="main" class="content-body card-margin">
					<header class="page-header">
						<h2>Change Password</h2>
					
						<div class="right-wrapper text-right">
							<ol class="breadcrumbs">
								<li>
									<a href="<?php echo base_url();?>Dashboard">
										<i class="fas fa-home"></i>
									</a>
								</li>
								<li><span>Admin</span></li>
								<li><span>Change Password</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
						</div>
					</header>
					
					<!-- start: page -->
						<div class="row">
						
						
									
									
							<div class="col">
								<section class="card">
								<?php if($this->session->flashdata('success')!=""){?>
								<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<?php echo $this->session->flashdata('success');?>
									</div>
								<?php }?>
								
								<?php if($this->session->flashdata('error')!=""){?>
								<div class="alert alert-danger">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<?php echo $this->session->flashdata('error');?>
									</div>
								<?php }?>
								<?php if($this->session->flashdata('error_msg')!=""){?>
								<div class="alert alert-danger">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<?php echo $this->session->flashdata('error_msg');?>
									</div>
								<?php }?>
								
									<header class="card-header">
										<div class="card-actions">
											
										</div>
						
										<h2 class="card-title">Change Password</h2>
									</header>
									<div class="card-body">
									
									<form class="form-horizontal form-bordered" method="post" name="frm_changePassword" id="frm_changePassword" enctype="multipart/form-data">
											<div class="form-group row">
												<label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Old Password <span class="error_msg">*</span></label>
												<div class="col-lg-6">
													<input type="password" class="form-control" id="old_password" name="old_password" placeholder="Enter old password" required>
														<div id="err_old_password" class="error_msg"></div>
												</div>
											</div>
											
													<div class="form-group row">
												<label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">New Password <span class="error_msg">*</span></label>
												<div class="col-lg-6">
													<input type="password" class="form-control" id="admin_password" name="admin_password" placeholder="Enter new password" required>
														<div id="err_admin_password" class="error_msg"></div>
												</div>
											</div>
											
											
											<div class="form-group row">
												<label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Confirm Password <span class="error_msg">*</span></label>
												<div class="col-lg-6">
													<input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Enter confirm password" required>
														<div id="err_confirm_password" class="error_msg"></div>
												</div>
											</div>
											
											
											<div class="form-group row">
												<label class="col-lg-3 control-label text-lg-right pt-2" for="inputHelpText"></label>
												<div class="col-lg-6">
														<button class="btn btn-primary" name="btn_chnagePassword" id="btn_chnagePassword">Submit</button>
												<button type="reset" class="btn btn-default">Reset</button>
												</div>
											</div>
						
											
										</form>
									</div>
								</section>
							</div>
						</div>
						
					<!-- end: page -->
				</section>
			</div>