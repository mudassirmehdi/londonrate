<div class="page-body">


	<!-- Container-fluid starts-->
	<div class="container-fluid">
                <div class="card tab2-card">
                    <div class="card-header">
                        <h5>ADD TESTIMONIALS</h5>
                    </div>
                    <div class="card-body">
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
						<form class="needs-validation" name="frm_addCMS" id="frm_addCMS" method="POST" enctype="multipart/form-data">
                        <div class="tab-content" >
                            <div class="tab-pane fade active show">
                                
                                   
                                    <div class="row">
                                        <div class="col-sm-12">
                                        	<div class="form-group row">
                                                <label for="test_photo" class="col-xl-3 col-md-4"><span>*</span> Photo</label>
                                                <input type="file" name="test_photo" id="imgInp" class="col-xl-3 col-md-3"  class="form-control" required>
                                                
                                            </div>
                                            <div class="form-group row">
                                                <label for="test_photo" class="col-xl-3 col-md-4"> </label>
                                                
                                                <img class="col-xl-2 col-md-3" id="blah" src="<?php echo base_url()."templates/admin/assets/images/testimonials/user.png";?>" style="height: 100px;width: 100px;">
                                            </div>
                                            <div class="form-group row">
                                                <label for="title_name" class="col-xl-3 col-md-4"><span>*</span> Name</label>
                                                <input class="form-control col-md-3" id="title_name" name="title_name" type="text" required onkeypress="return /[0-9a-zA-Z_, ]/i.test(event.key)">
                                            </div>
                                            <div class="form-group row">
                                                <label for="test_position" class="col-xl-3 col-md-4"><span>*</span> Position</label>
                                                <input class="form-control col-md-3" id="test_position" name="test_position" type="text" required onkeypress="return /[0-9a-zA-Z_, ]/i.test(event.key)">
                                            </div>
											<div class="form-group row">
                                                <label for="test_description" class="col-xl-3 col-md-4"><span>*</span> Paragraph</label>
                                                <textarea class="col-xl-3 col-md-5" name="test_description" id="test_description" onkeypress="return /[0-9a-zA-Z_, ]/i.test(event.key)" required></textarea >
                                            </div>
                                           	<div class="form-group row">
                                                 <label class="col-xl-3 col-md-4"><span></span>type Status</label>
                                              <select class="custom-select col-md-3" name="page_status" id="page_status">
                                                    <option value="Active">Active</option>
													<option value="Inactive">Inactive</option>
                                                </select>
                                            </div>
                                           
                                        </div>
                                    </div>
                                
                            </div>
                            
                            
                        </div>
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary" name="btn_addcms" id="btn_addcms">Add</button>
							<a  class="btn btn-primary" href="<?php echo base_url();?>backend/Testimonials/manageTestimonials">Cancel</a>
                        </div>
						</form>
                    </div>
                </div>
            </div>
	<!-- Container-fluid Ends-->
</div>