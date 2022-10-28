<div class="page-body">


	<!-- Container-fluid starts-->
	<div class="container-fluid">
                <div class="card tab2-card">
                    <div class="card-header">
                        <h5>UPDATE HELP</h5>
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
						<form class="needs-validation " name="frm_addcategory" id="frm_addcategory" method="POST" enctype="multipart/form-data">
                        <div class="tab-content" >
                            <div class="tab-pane fade active show">
                                
                                   
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group row">
                                                <label for="help_title" class="col-xl-3 col-md-4"><span>*</span> Title</label>
                                                <input class="form-control col-md-7" id="help_title" name="help_title" type="text" required value="<?php echo $helpinfo[0]['help_title']; ?>">
                                            </div>
											
                                            <div class="form-group row">
                                                <label for="help_description" class="col-xl-3 col-md-4"><span></span>Description</label>
                                               <textarea name="help_description" id="editor1"  placeholder="Enter description" required><?php echo stripslashes($helpinfo[0]['help_description']); ?></textarea>
												</div>
												
                                            
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-md-4"><span></span>Help Status</label>
                                              <select class="custom-select col-md-3" name="help_status" id="help_status">
                                                    <option value="Active" <?php if($helpinfo[0]['help_status']=="Active") { echo 'selected="selected"';}?>>Active</option>
													<option value="Inactive" <?php if($helpinfo[0]['help_status']=="Inactive") { echo 'selected="selected"';}?>>Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                
                            </div>
                            
                            
                        </div>
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary" name="btn_updateHelp" id="btn_updateHelp">Update</button>
							<a  class="btn btn-primary" href="<?php echo base_url();?>backend/Help/managehelp">Cancel</a>
                        </div>
						</form>
                    </div>
                </div>
            </div>
	<!-- Container-fluid Ends-->
</div>