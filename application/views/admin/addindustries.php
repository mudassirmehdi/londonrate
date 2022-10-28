<div class="page-body">


    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="card tab2-card">
            <div class="card-header">
                <h5>Add Protected Industries</h5>
            </div>
            <div class="card-body">
                <?php if ($this->session->flashdata('success') != "") { ?>
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                <?php } ?>

                <?php if ($this->session->flashdata('error') != "") { ?>
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?php echo $this->session->flashdata('error'); ?>
                    </div>
                <?php } ?>
                <?php if ($this->session->flashdata('error_msg') != "") { ?>
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?php echo $this->session->flashdata('error_msg'); ?>
                    </div>
                <?php } ?>
                <form class="needs-validation" name="frm_addprotectedindustries" id="frm_addprotectedindustries" method="POST" enctype="multipart/form-data">
                    <div class="tab-content">
                        <div class="tab-pane fade active show">


                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group row">
                                        <label for="ind_name" class="col-xl-3 col-md-4"><span>*</span>Protected Industries Name</label>
                                        <input class="form-control col-md-4" id="ind_name" name="ind_name" type="text" required>
                                    </div>
									<div class="form-group row">
                                        <label class="col-xl-3 col-md-4"><span></span>Ip Type</label>
                                         <select name="typeid" id="typeid"  class="form-control col-md-4"  required onchange="return get_type_certificate(this.value);">
											<option value="" >Select Ip Type</option>
											<?php if(isset($ipType) && count($ipType)>0)
											{
												foreach($ipType as $type)
												{?>
												<option value="<?php echo $type['typeid'];?>" ><?php echo $type['type'];?></option>
												<?php }
											}?>
												
										</select>
                                    </div>
									<div class="form-group row">
                                        <label class="col-xl-3 col-md-4"><span></span>Type of IP Certificate</label>
                                         <select name="cert_id" id="cert_id"  class="form-control col-md-4"  required >
											<option value="" >Select IP Certificate</option>
											</select>
                                    </div>
									<div class="form-group row">
										<label for="ipvalue" class="col-xl-3 col-md-4"><span>*</span>Industry Type Value</label>
										<input class="form-control col-md-4" id="ipvalue" name="ipvalue" type="text" required value="<?php echo $certInfo[0]['ipvalue'];?>">
									</div>
								   
									
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-md-4"><span></span>Industries Status</label>
                                        <select class="custom-select col-md-4" name="ind_status" id="ind_status">
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                        </select>
                                    </div>

                                </div>
                            </div>

                        </div>


                    </div>
                    <div class="pull-right">
                        <button type="submit" class="btn btn-primary" name="btn_addindustry" id="btn_addindustry">Add</button>
                        <a class="btn btn-primary" href="<?php echo base_url(); ?>backend/industries">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
</div>