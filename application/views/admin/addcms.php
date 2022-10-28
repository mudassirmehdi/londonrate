<div class="page-body">


	<!-- Container-fluid starts-->
	<div class="container-fluid">
                <div class="card tab2-card">
                    <div class="card-header">
                        <h5>ADD CMS</h5>
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
                                                <label for="page_name" class="col-xl-3 col-md-4"><span>*</span> Page Name</label>
                                                <input class="form-control col-md-7" id="page_name" name="page_name" type="text" required>
                                            </div>
											
                                           <div class="form-group row">
                                                <label for="page_title" class="col-xl-3 col-md-4"><span>*</span> Page Title</label>
                                                <input class="form-control col-md-7" id="page_title" name="page_title" type="text" required>
                                            </div>
                                            
											 <div class="form-group row">
                                                <label for="page_desc" class="col-xl-3 col-md-4"><span>*</span> Description</label>
                                                <textarea class="form-control col-md-7" id="editor1" name="page_desc"  required ></textarea>
                                            </div>
											 <div class="form-group row">
                                                <label class="col-xl-3 col-md-4"><span></span>Page Status</label>
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
							<a  class="btn btn-primary" href="<?php echo base_url();?>backend/CMS/managecms">Cancel</a>
                        </div>
						</form>
                    </div>
                </div>
            </div>
	<!-- Container-fluid Ends-->
</div>