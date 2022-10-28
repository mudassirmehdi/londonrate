<div class="page-body">


	<!-- Container-fluid starts-->
	<div class="container-fluid">
                <div class="card tab2-card">
                    <div class="card-header">
                        <h5>UPDATE IP WORK OBJECT</h5>
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
                                                <label for="page_name" class="col-xl-3 col-md-4"><span>*</span> Object Name</label>
                                                <input class="form-control col-md-7" id="object_name" name="object_name" type="text" required value="<?php echo $workObjectInfo[0]['object'];?>" >
                                            </div>
											<div class="form-group row">
                                                <label class="col-xl-3 col-md-4"><span></span>Object Status</label>
                                              <select class="custom-select col-md-3" name="page_status" id="page_status">
                                                    <option value="Active" <?php if($workObjectInfo[0]['status']=="active"){ echo 'selected="selected"';}?>>Active</option>
													<option value="Inactive" <?php if($workObjectInfo[0]['status']=="inactive"){ echo 'selected="selected"';}?>>Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                
                            </div>
                            
                            
                        </div>
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary" name="btn_updateworkobject" id="btn_updateworkobject">Update</button>
							<a  class="btn btn-primary" href="<?php echo base_url();?>backend/IP_work_object/manageworkobject">Cancel</a>
                        </div>
						</form>
                    </div>
                </div>
            </div>
	<!-- Container-fluid Ends-->
</div>