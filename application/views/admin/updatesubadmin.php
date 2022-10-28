<div class="page-body">


	<!-- Container-fluid starts-->
	<div class="container-fluid">
                <div class="card tab2-card">
                    <div class="card-header">
                        <h5>UPDATE SUBADMIN</h5>
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
						<form class="needs-validation " name="frm_updatesubadmin" id="frm_updatesubadmin" method="POST" enctype="multipart/form-data">
                        <div class="tab-content" >
                           <div class="tab-pane fade active show">
                                
                                   
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group row">
                                                <label for="subadmin_name" class="col-xl-3 col-md-4"><span>*</span> Subadmin Name</label>
                                                <input class="form-control col-md-7" id="subadmin_name" name="subadmin_name" type="text" required value="<?php echo $subadminInfo[0]['subadmin_name'];?>">
                                            </div>
										
											 <div class="form-group row">
                                                <label for="subusername" class="col-xl-3 col-md-4"><span>*</span> Subadmin Username</label>
                                                <input class="form-control col-md-7" id="subusername" name="subusername" type="text" required value="<?php echo $subadminInfo[0]['subusername'];?>">
                                            </div>
											
											
											 <div class="form-group row">
                                                <label for="subadmin_password" class="col-xl-3 col-md-4"><span>*</span> Subadmin Password</label>
                                                <input class="form-control col-md-7" id="subadmin_password" name="subadmin_password" type="password" >
												
                                            </div>
											
											 <div class="form-group row">
                                                <label for="subadmin_password" class="col-xl-3 col-md-4"><span></span> </label>
                                                <p>If you do not want to update the password keep this field as blank</p>
                                            </div>
											
											
											<div class="form-group row">
                                                <label for="subadmin_email" class="col-xl-3 col-md-4"><span>*</span> Email Address</label>
                                                <input class="form-control col-md-7" id="subadmin_email" name="subadmin_email" type="text" required value="<?php echo $subadminInfo[0]['subadmin_email'];?>">
                                            </div>
											
											<div class="form-group row">
                                                <label for="submobile_number" class="col-xl-3 col-md-4"><span>*</span> Mobile</label>
                                                <input class="form-control col-md-7" id="submobile_number" name="submobile_number" type="text" required value="<?php echo $subadminInfo[0]['submobile_number'];?>">
                                            </div>
											
											
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-md-4"><span></span>Status</label>
                                              <select class="custom-select col-md-3" name="substatus" id="substatus">
                                                    <option value="">Select Status</option>
												<option <?php if($subadminInfo[0]['substatus']=="Active"){ echo 'selected="selected"';}?> value="Active">Active</option>
												<option  <?php if($subadminInfo[0]['substatus']=="Inactive"){ echo 'selected="selected"';}?> value="Inactive">Inactive</option>
                                                </select>
                                            </div>
											
											<?php //echo '<pre>';print_r($adminModuleData1);
							$adminModuleData=array();
							if(isset($adminModuleData1) && count($adminModuleData1)>0)
							{
								foreach($adminModuleData1 as $ad)
								{
									$adminModuleData['module_name'][]=$ad['module_name'];
								}
							}
							
							//echo '<pre>';print_r($adminModuleData);?>
							
											<div class="form-group row">
                                                <label for="category_name" class="col-xl-3 col-md-4"><span>*</span> Module</label>
                                               <input type="checkbox" name="chk_module[]" id="customer_manage" value="customer_manage" <?php if(isset($adminModuleData) && count($adminModuleData)>0){ if(in_array('customer_manage',$adminModuleData['module_name'])){ echo 'checked="checked"';}}?>/>Customer Management<br/>
											 </div>
											
<div class="form-group row">
                                                <label for="category_name" class="col-xl-3 col-md-4"></label>
													<strong>Taladdesi-</strong>
											</div>
											
											<div class="form-group row">
                                                <label for="category_name" class="col-xl-3 col-md-4"></label>
											<input type="checkbox" name="chk_module[]" id="mastercategory_manage" value="master_category_manage" <?php if(isset($adminModuleData) && count($adminModuleData)>0){ if(in_array('master_category_manage',$adminModuleData['module_name'])){ echo 'checked="checked"';}}?>/> Master Category
											</div>
											
											<div class="form-group row">
                                                <label for="category_name" class="col-xl-3 col-md-4"></label>
											<input type="checkbox" name="chk_module[]" id="category_manage" value="category_manage" <?php if(isset($adminModuleData) && count($adminModuleData)>0){ if(in_array('category_manage',$adminModuleData['module_name'])){ echo 'checked="checked"';}}?>/>Category
											</div>
											
												<div class="form-group row">
                                                <label for="category_name" class="col-xl-3 col-md-4"></label>
											<input type="checkbox" name="chk_module[]" id="subcategory_manage" value="subcategory_manage" <?php if(isset($adminModuleData) && count($adminModuleData)>0){ if(in_array('subcategory_manage',$adminModuleData['module_name'])){ echo 'checked="checked"';}}?>/>Sub Category
											</div>
											
									<div class="form-group row">
                                                <label for="category_name" class="col-xl-3 col-md-4"></label>
											<input type="checkbox" name="chk_module[]" id="product_manage" value="taladdesi_product_manage" <?php if(isset($adminModuleData) && count($adminModuleData)>0){ if(in_array('product_manage',$adminModuleData['module_name'])){ echo 'checked="checked"';}}?>/>Products
											</div>
											
											<div class="form-group row">
                                                <label for="category_name" class="col-xl-3 col-md-4"></label>
											<input type="checkbox" name="chk_module[]" id="supplier_manage" value="taladdesi_supplier_manage" <?php if(isset($adminModuleData) && count($adminModuleData)>0){ if(in_array('supplier_manage',$adminModuleData['module_name'])){ echo 'checked="checked"';}}?>/>Supplier
											</div>
											
											
											<div class="form-group row">
                                                <label for="category_name" class="col-xl-3 col-md-4"></label>
											<input type="checkbox" name="chk_module[]" id="orders_manage" value="taladdesi_orders_manage" <?php if(isset($adminModuleData) && count($adminModuleData)>0){ if(in_array('orders_manage',$adminModuleData['module_name'])){ echo 'checked="checked"';}}?>/>Orders
											</div>
											
											
											<div class="form-group row">
                                                <label for="category_name" class="col-xl-3 col-md-4"></label>
											<input type="checkbox" name="chk_module[]" id="transaction_manage" value="taladdesi_transaction_manage" <?php if(isset($adminModuleData) && count($adminModuleData)>0){ if(in_array('transaction_manage',$adminModuleData['module_name'])){ echo 'checked="checked"';}}?>/>Transactions
											</div>
									
										<div class="form-group row">
                                                <label for="category_name" class="col-xl-3 col-md-4"></label>
													<strong>Vitual Talad-</strong>
											</div>
											
											<div class="form-group row">
                                                <label for="category_name" class="col-xl-3 col-md-4"></label>
											<input type="checkbox" name="chk_module[]" id="virtual_category_manage" value="virtual_category_manage" <?php if(isset($adminModuleData) && count($adminModuleData)>0){ if(in_array('virtual_category_manage',$adminModuleData['module_name'])){ echo 'checked="checked"';}}?>/>Category
											</div>
											
											<div class="form-group row">
                                                <label for="category_name" class="col-xl-3 col-md-4"></label>
											<input type="checkbox" name="chk_module[]" id="virtual_store_manage" value="virtual_store_manage" <?php if(isset($adminModuleData) && count($adminModuleData)>0){ if(in_array('virtual_store_manage',$adminModuleData['module_name'])){ echo 'checked="checked"';}}?>/>Store Listings<br/>
											</div>
											
											<div class="form-group row">
                                                <label for="category_name" class="col-xl-3 col-md-4"></label>
											<input type="checkbox" name="chk_module[]" id="virtual_store_category" value="virtual_store_category" <?php if(isset($adminModuleData) && count($adminModuleData)>0){ if(in_array('virtual_store_category',$adminModuleData['module_name'])){ echo 'checked="checked"';}}?>/>Store Category<br/>
											</div>
											
											
											<div class="form-group row">
                                                <label for="category_name" class="col-xl-3 col-md-4"></label>
											<input type="checkbox" name="chk_module[]" id="virtual_store_products" value="virtual_store_products" <?php if(isset($adminModuleData) && count($adminModuleData)>0){ if(in_array('virtual_store_products',$adminModuleData['module_name'])){ echo 'checked="checked"';}}?>/>Products<br/>
											</div>
											
											<div class="form-group row">
                                                <label for="category_name" class="col-xl-3 col-md-4"></label>
											<input type="checkbox" name="chk_module[]" id="virtual_store_orders" value="virtual_store_orders" <?php if(isset($adminModuleData) && count($adminModuleData)>0){ if(in_array('virtual_store_orders',$adminModuleData['module_name'])){ echo 'checked="checked"';}}?>/>Orders<br/>
											</div>
											
											<div class="form-group row">
                                                <label for="category_name" class="col-xl-3 col-md-4"></label>
											<input type="checkbox" name="chk_module[]" id="virtual_store_transactions" value="virtual_store_transactions" <?php if(isset($adminModuleData) && count($adminModuleData)>0){ if(in_array('virtual_store_transactions',$adminModuleData['module_name'])){ echo 'checked="checked"';}}?>/>Transactions<br/>
											</div>
											
										<div class="form-group row">
                                                <label for="category_name" class="col-xl-3 col-md-4"></label>
													<strong>Settings-</strong>
											</div>

											<div class="form-group row">
                                                <label for="category_name" class="col-xl-3 col-md-4"></label>
											<input type="checkbox" name="chk_module[]" id="delivery_setting_manage" value="delivery_setting_manage" <?php if(isset($adminModuleData) && count($adminModuleData)>0){ if(in_array('delivery_setting_manage',$adminModuleData['module_name'])){ echo 'checked="checked"';}}?>/>Delivery Settings
											</div>
											
											<div class="form-group row">
                                                <label for="category_name" class="col-xl-3 col-md-4"></label>
											<input type="checkbox" name="chk_module[]" id="time_slots" value="time_slots" <?php if(isset($adminModuleData) && count($adminModuleData)>0){ if(in_array('time_slots',$adminModuleData['module_name'])){ echo 'checked="checked"';}}?>/>Time Slots
											</div>
											
										
											
											<div class="form-group row">
                                                <label for="category_name" class="col-xl-3 col-md-4"></label>
											<input type="checkbox" name="chk_module[]" id="product_type" value="product_type" <?php if(isset($adminModuleData) && count($adminModuleData)>0){ if(in_array('product_type',$adminModuleData['module_name'])){ echo 'checked="checked"';}}?>/>Product Type
											</div>
											
											<div class="form-group row">
                                                <label for="category_name" class="col-xl-3 col-md-4"></label>
											<input type="checkbox" name="chk_module[]" id="cms" value="cms" <?php if(isset($adminModuleData) && count($adminModuleData)>0){ if(in_array('cms',$adminModuleData['module_name'])){ echo 'checked="checked"';}}?>/>CMS
											</div>
											
											<div class="form-group row">
                                                <label for="category_name" class="col-xl-3 col-md-4"></label>
											<input type="checkbox" name="chk_module[]" id="slider" value="slider" <?php if(isset($adminModuleData) && count($adminModuleData)>0){ if(in_array('slider',$adminModuleData['module_name'])){ echo 'checked="checked"';}}?>/>Slider
											</div>
											
											<div class="form-group row">
                                                <label for="category_name" class="col-xl-3 col-md-4"></label>
											<input type="checkbox" name="chk_module[]" id="help_support" value="help_support" <?php if(isset($adminModuleData) && count($adminModuleData)>0){ if(in_array('help_support',$adminModuleData['module_name'])){ echo 'checked="checked"';}}?>/>Help & Support
											</div>
											
											<div class="form-group row">
                                                <label for="category_name" class="col-xl-3 col-md-4"></label>
											<input type="checkbox" name="chk_module[]" id="notification" value="notification" <?php if(isset($adminModuleData) && count($adminModuleData)>0){ if(in_array('notification',$adminModuleData['module_name'])){ echo 'checked="checked"';}}?>/>Notification
											</div>
											
											<div class="form-group row">
                                                <label for="category_name" class="col-xl-3 col-md-4"></label>
											<input type="checkbox" name="chk_module[]" id="admin_settings" value="admin_settings" <?php if(isset($adminModuleData) && count($adminModuleData)>0){ if(in_array('admin_settings',$adminModuleData['module_name'])){ echo 'checked="checked"';}}?>/>Admin Settings
											</div>
											
											<div class="form-group row">
                                                <label for="category_name" class="col-xl-3 col-md-4"></label>
											<input type="checkbox" name="chk_module[]" id="offers_manage" value="offers_manage" <?php if(isset($adminModuleData) && count($adminModuleData)>0){ if(in_array('offers_manage',$adminModuleData['module_name'])){ echo 'checked="checked"';}}?>/>Offers
											</div>
											
										
                                        </div>
                                    </div>
                                
                            </div>
                            
                            
                        </div>
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary" name="btn_updatesubadmin" id="btn_updatesubadmin">Update</button>
							<a  class="btn btn-primary"  href="<?php echo base_url();?>backend/Subadmin/managesubadmin">
									Cancel</a>
                        </div>
						</form>
                    </div>
                </div>
            </div>
	<!-- Container-fluid Ends-->
</div>