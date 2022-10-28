<div class="page-body">


	<!-- Container-fluid starts-->
	<div class="container-fluid">
                <div class="card tab2-card">
                    <div class="card-header">
                        <h5>Update Nice Classification</h5>
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
                                                <label for="type_name" class="col-xl-3 col-md-4"><span>*</span> Nice Classification Name</label>
                                                <input class="form-control col-md-7" id="nice_name" name="nice_name" type="text" value="<?php echo $NiceClassificationInfo[0]['nice'];?>"  required>
                                            </div>
                                            <?php $res2=$this->NiceClassification_model->get_object_all();

                                            ?>
											<div class="form-group row">
                                                <label for="sel_object" class="col-xl-3 col-md-4"><span>*</span> Select Object</label>
                                                <select name="sel_object" id="sel_object" class="custom-select col-md-3" onchange="getTypeByObject()" required>
                                                	<?php if(isset($NiceClassificationInfo[0])){
                                                		echo "<option value='".$NiceClassificationInfo[0]['object_id']."'>".$NiceClassificationInfo[0]['object'].' '."</option>";
                                                	}?>
									                <option value="">Select Object</option>
								                     <?php foreach ($res2 as $row) 
						                            {
						                                echo "<option value='".$row->object_id."'>".$row->object.' '."</option>";
						                            } 
						                                                    
						                             ?>
							                       </select>
                                            </div>
                                            <?php $res=$this->NiceClassification_model->get_type_all();

                                            ?>
											<div class="form-group row">
                                                <label for="type_name" class="col-xl-3 col-md-4"><span>*</span> Select Type</label>
                                                <select name="type_name" id="type_name" class="custom-select col-md-3"  required>
                                                	<?php if(isset($NiceClassificationInfo[0])){
                                                		echo "<option value='".$NiceClassificationInfo[0]['type_id']."'>".$NiceClassificationInfo[0]['type'].' '."</option>";
                                                	}?>
									                <option value="">Select Object</option>
								                     <?php foreach ($res as $row) 
						                            {
						                                echo "<option value='".$row->type_id."'>".$row->type.' '."</option>";
						                            } 
						                                                    
						                             ?>
							                       </select>
                                            </div>
											
                                           	<div class="form-group row">
                                                 <label class="col-xl-3 col-md-4"><span></span>type Status</label>
                                              <select class="custom-select col-md-3" name="page_status" id="page_status">
                                                    <option value="Active" <?php if($NiceClassificationInfo[0]['status']=="active"){ echo 'selected="selected"';}?>>Active</option>
													<option value="Inactive" <?php if($NiceClassificationInfo[0]['status']=="inactive"){ echo 'selected="selected"';}?>>Inactive</option>
                                                </select>
                                            </div>
                                           
                                        </div>
                                    </div>
                                
                            </div>
                            
                            
                        </div>
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary" name="btn_updateNiceClassification" id="btn_updateNiceClassification">Add</button>
							<a  class="btn btn-primary" href="<?php echo base_url();?>backend/NiceClassification/manageNiceClassification">Cancel</a>
                        </div>
						</form>
                    </div>
                </div>
            </div>
	<!-- Container-fluid Ends-->
</div>