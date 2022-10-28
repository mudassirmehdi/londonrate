<div class="page-body">


	<!-- Container-fluid starts-->
	<div class="container-fluid">
                <div class="card tab2-card">
                    <div class="card-header">
                        <h5>ADD IP WORK TYPE</h5>
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
                                                <label for="type_name" class="col-xl-3 col-md-4"><span>*</span> Type Name</label>
                                                <input class="form-control col-md-7" id="type_name" name="type_name" type="text" required>
                                            </div>
                                            <?php $res=$this->IP_work_type_model->get_object_all();

                                            ?>
											<div class="form-group row">
                                                <label for="type_name" class="col-xl-3 col-md-4"><span>*</span> Select Object</label>
                                                <select name="sel_object" id="sel_object" class="custom-select col-md-3"  required>
													
								                      <option value="">Select Object</option>
								                     <?php foreach ($res as $row) 
						                            {
						                                echo "<option value='".$row->object_id."'>".$row->object.' '."</option>";
						                            } 
						                                                    
						                             ?>
							                       </select>
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
							<a  class="btn btn-primary" href="<?php echo base_url();?>backend/IP_work_type/manageworktype">Cancel</a>
                        </div>
						</form>
                    </div>
                </div>
            </div>
	<!-- Container-fluid Ends-->
</div>