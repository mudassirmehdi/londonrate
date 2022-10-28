<div class="page-body">


	<!-- Container-fluid starts-->
	<div class="container-fluid">
                <div class="card tab2-card">
                    <div class="card-header">
                        <h5>Update Package Management</h5>
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
                                                <label for="pakage_name" class="col-xl-3 col-md-4"><span>*</span> Package Management Name</label>
                                                <input class="form-control col-md-7" id="pakage_name" name="pakage_name" type="text" value="<?php echo $PackageManagementInfo[0]['package_name'];?>"  required>
                                            </div>
                                            <div class="form-group row">
                                                <label for="full_description" class="col-xl-3 col-md-4"><span>*</span> Package Full description</label>
                                                <textarea class="form-control col-md-7" id="full_description" name="full_description" required><?php echo $PackageManagementInfo[0]['full_description'];?></textarea>
                                            </div>
                                            <div class="form-group row">
                                                <label for="description" class="col-xl-3 col-md-4"><span>*</span> Package description</label>
                                                <textarea class="form-control col-md-7" id="description" name="description" required><?php echo $PackageManagementInfo[0]['description'];?></textarea>
                                            </div>
                                            <div class="form-group row">
                                                <label for="amount" class="col-xl-3 col-md-4"><span>*</span> Package Amount</label>
                                                <input class="form-control col-md-7" id="amount" name="amount" type="number" value="<?php echo $PackageManagementInfo[0]['amount'];?>"  required>
                                            </div>
                                           
											<div class="form-group row">
                                                <label for="package_star" class="col-xl-3 col-md-4"><span>*</span> Select Star</label>
                                                <select name="package_star" id="package_star" class="custom-select col-md-3" required>
                                                	<?php if(isset($PackageManagementInfo[0])){
                                                		echo "<option value='".$PackageManagementInfo[0]['package_star']."'>".$PackageManagementInfo[0]['package_star'].' '."</option>";
                                                	}?>
									                <option value="">Select Star</option>
									                <option value="1">1</option>
									                <option value="2">2</option>
									                <option value="3">3</option>
									                <option value="4">4</option>
									                <option value="5">5</option>
								                     
							                       </select>
                                            </div>
                                            
											
                                           	<div class="form-group row">
                                                 <label class="col-xl-3 col-md-4"><span></span>type Status</label>
                                              <select class="custom-select col-md-3" name="page_status" id="page_status">
                                                    <option value="Active" <?php if($PackageManagementInfo[0]['status']=="active"){ echo 'selected="selected"';}?>>Active</option>
													<option value="Inactive" <?php if($PackageManagementInfo[0]['status']=="inactive"){ echo 'selected="selected"';}?>>Inactive</option>
                                                </select>
                                            </div>
                                           
                                        </div>
                                    </div>
                                
                            </div>
                            
                            
                        </div>
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary" name="btn_updatePackageManagement" id="btn_updatePackageManagement">Add</button>
							<a  class="btn btn-primary" href="<?php echo base_url();?>backend/PackageManagement/managePackageManagement">Cancel</a>
                        </div>
						</form>
                    </div>
                </div>
            </div>
	<!-- Container-fluid Ends-->
</div>