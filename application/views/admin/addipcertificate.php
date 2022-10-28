<div class="page-body">


    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="card tab2-card">
            <div class="card-header">
                <h5>ADD Ip Certificate</h5>
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
                <form class="needs-validation" name="frm_addCMS" id="frm_addCMS" method="POST" enctype="multipart/form-data">
                    <div class="tab-content">
                        <div class="tab-pane fade active show">


                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group row">
                                        <label for="cert_name" class="col-xl-3 col-md-4"><span>*</span> Certificate Name</label>
                                        <input class="form-control col-md-4" id="cert_name" name="cert_name" type="text" required>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-md-4"><span></span>Ip Type</label>
                                         <select name="typeid" id="typeid"  class="form-control col-md-4"  required >
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
										<label for="cert_value" class="col-xl-3 col-md-4"><span>*</span>Certificate Value</label>
										<input class="form-control col-md-4" id="cert_value" name="cert_value" type="text" required value="<?php echo $certInfo[0]['cert_value'];?>">
									</div>
									<div class="form-group row">
                                        <label class="col-xl-3 col-md-4"><span></span>Certificate Status</label>
                                        <select class="custom-select col-md-4" name="cert_status" id="cert_status">
                                            <option value="Active">Active</option>
                                            <option value="Inactive">Inactive</option>
                                        </select>
                                    </div>

                                </div>
                            </div>

                        </div>


                    </div>
                    <div class="pull-right">
                        <button type="submit" class="btn btn-primary" name="btn_addipcert" id="btn_addipcert">Add</button>
                        <a class="btn btn-primary" href="<?php echo base_url(); ?>backend/ipcertificate">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
</div>