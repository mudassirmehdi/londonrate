<div class="page-body">


	<!-- Container-fluid starts-->
	<div class="container-fluid">
                <div class="card tab2-card">
                    <div class="card-header">
                        <h5>Update IP Type Industries</h5>
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
                                                <label for="iptype_name" class="col-xl-3 col-md-4"><span>*</span>Ip Type Name</label>
                                                <input class="form-control col-md-4" id="iptype_name" name="iptype_name" type="text" required value="<?php echo $indInfo[0]['iptype_name'];?>">
                                            </div>
											<div class="form-group row">
												<label class="col-xl-3 col-md-4"><span>*</span>Ip Type</label>
												 <select name="typeid" id="typeid"  class="form-control col-md-4"  required >
													<option value="" >Select Ip Type</option>
													<?php if(isset($ipType) && count($ipType)>0)
													{
														foreach($ipType as $type)
														{?>
														<option <?php if($indInfo[0]['typeid']==$type['typeid']){ echo 'selected="selected"';}?> value="<?php echo $type['typeid'];?>" ><?php echo $type['type'];?></option>
														<?php }
													}?>
														
												</select>
											</div>
                                            
                                           
                                            <div class="form-group row">
                                                <label for="ipvalue" class="col-xl-3 col-md-4">Industry Type Value<span>*</span></label>
                                                <input class="form-control col-md-4" id="ipvalue" name="ipvalue" type="text" required value="<?php echo $indInfo[0]['ipvalue'];?>">
                                            </div>
											 <div class="form-group row">
                                                <label class="col-xl-3 col-md-4"><span>*</span>Coverage Status</label>
                                              <select class="custom-select col-md-4" name="iptype_status" id="iptype_status">
                                                    <option value="active" <?php if($indInfo[0]['iptype_status']=="active"){ echo 'selected="selected"';}?>>Active</option>
													<option value="inactive" <?php if($indInfo[0]['iptype_status']=="inactive"){ echo 'selected="selected"';}?>>Inactive</option>
                                                </select>
                                            </div>
                                           
                                        </div>
                                    </div>
                                
                            </div>
                            
                            
                        </div>
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary" name="btn_updateiptype" id="btn_updateiptype">Update</button>
							<a  class="btn btn-primary" href="<?php echo base_url();?>backend/IPtypeindustries">Cancel</a>
                        </div>
						</form>
                    </div>
                </div>
            </div>
	<!-- Container-fluid Ends-->
</div>