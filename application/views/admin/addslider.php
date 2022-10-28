<div class="page-body">

	<!-- Container-fluid starts-->
	<div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card tab2-card">
                            <div class="card-header">
                                <h5> ADD SLIDER</h5>
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
						
                                <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                                    <li class="nav-item"><a class="nav-link active show" id="basicinfo-tab" data-toggle="tab" href="#basicinfo" role="tab" aria-controls="basicinfo" aria-selected="true" data-original-title="" title="">Basic Details</a></li>
									
                                </ul>
								<form name="frm_addslider" id="frm_addslider" class="needs-validation user-add" method="POST" enctype="multipart/form-data">
                                <div class="tab-content" id="myTabContent">
								
                                    <div class="tab-pane fade active show" id="basicinfo" role="tabpanel" aria-labelledby="basicinfo-tab">
                                       
									    <div class="form-group row">
                                                <label for="banner_type" class="col-xl-3 col-md-4"><span>*</span> Type</label>
                                                <select class="custom-select col-md-4" name="banner_type" id="banner_type"  required  onchange="return checkSliderType(this.value);">
													<option value="">Select Type</option>
													<option value="Normal">Normal</option>
                                                    <option value="Product">Product</option>
													<option value="Store">Store</option>
												</select>
												<div class="err_msg" id="err_banner_type"></div>
                                            </div>
											
											 <div class="form-group row" id="display_for_normal" style="display:none">
                                                <label for="banner_type" class="col-xl-3 col-md-4"><span>*</span> Position</label>
                                                <input type="checkbox" class="form-control col-xl-1 col-md-1"name="banner_position[]" id="banner_positionf" value="Top" checked="checked"/>Top 
												 <input type="checkbox" class="form-control col-xl-1 col-md-1" name="banner_position[]" id="banner_position" value="Middle" />Middle
                                            </div>
											
											<div style="display:none" id="display_for_product">
											<div class="form-group row" >
                                                <label for="slider_product_id" class="col-xl-3 col-md-4"><span>*</span>Product</label>
                                                <input class="form-control col-xl-4 col-md-4" id="slider_product_id" type="text" name="slider_product_id" placeholder="Enter product title">
												
												<input type="hidden" class="form-control col-xl-4 col-md-4" id="final_product_id" name="final_product_id"  value="0">
                                            </div>
											
											<div class="form-group row" >
                                                <label for="slider_pt_id" class="col-xl-3 col-md-4"><span></span></label>
                                                <div id="display_product_info" class="col-xl-4 col-md-4"></div>
                                            </div>
											
												
											</div>
											
											
											<div  style="display:none" id="display_for_store">
											<div class="form-group row" >
                                                <label for="slider_store_id" class="col-xl-3 col-md-4"><span>*</span>Stores</label>
                                                <input class="form-control col-xl-4 col-md-4" id="slider_store_id" type="text"  name="slider_store_id" placeholder="Enter Store title">
												
												<input type="hidden" class="form-control col-xl-4 col-md-4" id="final_store_id" name="final_store_id"  value="0">
												</div>
												<div class="form-group row" >
                                                <label for="slider_st_id" class="col-xl-3 col-md-4"><span></span></label>
                                                <div id="display_store_info" class="col-xl-4 col-md-4"></div>
                                            </div>
											
											
                                            </div>
											
											  <div class="form-group row">
                                                <label for="banner_title" class="col-xl-3 col-md-4"><span>*</span> Slider Title</label>
                                                <input class="form-control col-xl-4 col-md-4" id="banner_title" type="text" required="" name="banner_title" placeholder="Enter title">
												<div class="err_msg" id="err_banner_title"></div>
                                            </div>
											
											 
											
											  <div class="form-group row">
                                                <label for="banner_image" class="col-xl-3 col-md-4"><span>*</span> Slider Image</label>
                                                <input class="form-control col-xl-4 col-md-4" id="banner_image" type="file" required="" name="banner_image" placeholder="Enter title">
												<div class="err_msg" id="err_banner_image"></div>
                                            </div>
											
                                            <div class="form-group row">
                                                <label for="banner_start_date" class="col-xl-3 col-md-4">
												<span>*</span> Start Date</label>
                                                <input class="form-control col-xl-4 col-md-4 datepicker-here form-control digits" data-language="en"  id="banner_start_date" type="text" required="" name="banner_start_date" placeholder="Enter slider start date">
												<div style="text-align:center !important">MM/DD/YYYY</div>
												<div class="err_msg" id="err_banner_start_date"></div>
                                            </div>
                                           
                                            
                                            <div class="form-group row">
                                                <label for="banner_end_date" class="col-xl-3 col-md-4"><span>*</span> End Date</label>
                                                <input data-language="en" class="form-control col-xl-4 col-md-4 datepicker-here digits " id="banner_end_date" type="text" required="" name="banner_end_date" placeholder="Enter slider end date">
												<div style="text-align:center !important">MM/DD/YYYY</div>
												<div class="err_msg" id="err_banner_end_date"></div>
                                            </div>
											
											
											
											<div class="form-group row">
                                                <label for="banner_status" class="col-xl-3 col-md-4">
												<span>*</span> Select Status</label>
                                                <select class="custom-select col-md-4" name="banner_status" id="banner_status"  required >
                                                    <option value="Active">Active</option>
													  <option value="Inactive">Inactive</option>
												</select>
                                            </div>
                                       
                                    </div>
									
									
                                </div>
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-primary"  name="btn_addslider" id="btn_addslider">
									Add</button>
									
									   <a  class="btn btn-primary"  href="<?php echo base_url();?>backend/Slider/manageslider">
									Cancel</a>
                                </div></form>
                            </div>
                        </div>
                    </div>
                </div>
				
            </div>
	<!-- Container-fluid Ends-->
</div>