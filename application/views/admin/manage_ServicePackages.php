<div class="page-body">


	<!-- Container-fluid starts-->
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-header">
						<h5>SERVICE PACKAGE MANAGEMENT SYSTEM</h5>
						<div class="card-header-right">
						<div class="row">
							<div class="col-lg-12">
											<!-- <a class="btn btn-bgred"  href="<?php //echo base_url();?>backend/ServicePackages/addServicePackages" style="float:right">Add Service Packages</a> -->
											</div>
											
							
							
						</div>
					</div>
				</div>	
					<div class="card-body">
					
						<form name="frm_manage_parcels" id="frm_manage_parcels" method="post" action="<?php echo base_url("backend/");?>ServicePackages/mpServicePackageSearch/<?php if($this->uri->segment(4)!=""){ echo $this->uri->segment(4);}?>/
										<?php if($this->uri->segment(5)!=""){ echo $this->uri->segment(5);}?>/
										<?php if($this->uri->segment(6)!=""){ echo $this->uri->segment(6);}?>/
										<?php if($this->uri->segment(7)!=""){ echo $this->uri->segment(7);}?>/
										<?php if($this->uri->segment(8)!=""){ echo $this->uri->segment(8);}?>/
										<?php if($this->uri->segment(9)!=""){ echo $this->uri->segment(9);}?>/
										<?php if($this->uri->segment(10)!=""){ echo $this->uri->segment(10);}?>/
										">
									<div class="col-lg-12 col-xl-12">
										<div class="row form-group">
											
											<div class="col-lg-3">
												<input type="text" name="order_id" id="order_id" placeholder="Enter Order ID" class="form-control" value="<?php  if($this->uri->segment(4)!='Na'){ echo $this->uri->segment(4);}?>" onkeypress="return /[0-9a-zA-Z_, ]/i.test(event.key)">
											</div>
											
											
											<div class="col-lg-3">
												<input type="text" name="applicant_name" id="applicant_name" placeholder="Enter Applicant Name" class="form-control" value="<?php  if($this->uri->segment(6)!='Na'){ echo $this->uri->segment(6);}?>" onkeypress="return /[0-9a-zA-Z_, ]/i.test(event.key)">
											</div>
											<?php $res2=$this->ServicePackages_model->get_package_all();

                                            ?>
											<div class="col-lg-3">
												<select name="package_name" id="package_name" class="custom-select" >                                            	
									                <option value="">Select Package</option>
								                     <?php foreach ($res2 as $row) 
						                            { ?>
						                                <option value='<?php echo $row->package_name;?>' <?php if($this->uri->segment(5)==$row->package_name){ echo 'selected="selected"';}?>><?php echo $row->package_name;?></option>;
						                         <?php  
						                     		} 
					                                                    
					                             ?>
						                       	</select>
											</div>
											<?php $res2=$this->ServicePackages_model->get_country_all();

                                            ?>
											<div class="col-lg-3">
												<select name="country_name" id="country_name" class="custom-select" >                                            	
									                <option value="">Select Country</option>
								                     <?php foreach ($res2 as $row) 
						                            { ?>
						                                <option value='<?php echo $row->country_id;?>' <?php if($this->uri->segment(7)==$row->country_id){ echo 'selected="selected"';}?>><?php echo $row->country_name;?></option>;
						                         <?php  
						                     		} 
					                                                    
					                             ?>
						                       	</select>
											</div>

											
											
											
											
										</div>
									<div class="row form-group">
										<div class="col-lg-3">
											<label> </label><br/>
												<select name="pay_status" id="pay_status" class="custom-select" style="margin-top:7px;">                                            	
									                <option value="">Select Payment Status</option>
													<option value="completed" <?php if($this->uri->segment(10)=="completed"){ echo 'selected="selected"';}?>>Completed</option>
													<option value="pending" <?php if($this->uri->segment(10)=="pending"){ echo 'selected="selected"';}?>>Pending</option>
													<option value="Canceled" <?php if($this->uri->segment(10)=="Canceled"){ echo 'selected="selected"';}?>>Canceled</option>
													<option value="Succeeded" <?php if($this->uri->segment(10)=="Succeeded"){ echo 'selected="selected"';}?>>Succeeded</option>
													<option value="Failed" <?php if($this->uri->segment(10)=="Failed"){ echo 'selected="selected"';}?>>Failed</option>
													
						                       	</select>
											</div>
										<div class="col-lg-3">
											<label>From Date : </label>
												<input type="date" name="from_date" id="from_date" placeholder="Select Date" class="form-control" value="<?php  if($this->uri->segment(8)!='Na'){ echo $this->uri->segment(8);}?>" placeholder="dd-mm-yyyy">
											</div>	
										<div class="col-lg-3">
											<label>To Date : </label>
												<input type="date" name="to_date" id="to_date" placeholder="Select date" class="form-control" value="<?php  if($this->uri->segment(9)!='Na'){ echo $this->uri->segment(9);}?>" placeholder="dd-mm-yyyy">
											</div>
										</div>
										<div class="row form-group">
											<div class="col-lg-10">
												<label> </label><br/>
												<button class="btn btn-primary" type="submit" name="btn_search" id="btn_search">Search</button>
												<button class="btn btn-primary" name="btn_clear" id="btn_clear">Clear</button>
												<button class="btn btn-primary" name="btn_export" id="btn_export">Export To Excel</button>
												
											</div>
											<div class="col-lg-2">
												<label> </label><br/>
												<button type="button" class="btn btn-primary" name="btn_delete" id="btn_delete" onclick="chk_isDeleteComnfirmPackage();"  disabled>Delete</button>
											</div>
										</div>
										
									</div>
							</form>

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
										
						
						<div class="table-responsive">
							<div id="basicScenario" class="product-physical"></div>
							<table class="table table-bordered table-striped mb-0" id="datatable-default">			
								<?php 

								if(isset($ServicePackages_master) && count($ServicePackages_master)>0)									
							{
							?>							
									<thead>
										<tr>
																							
											<th colspan="2">Sr.No</th>
											<th>Order ID</th>
											<th>Packages Name</th>
											<th>Applicant Name</th>
											<th>Package Amount</th>

											<th>Addeddate</th>
											<th>User From</th>
											<th>Status</th>
											<!-- <th>Status</th> -->
											<th>Action</th>
										</tr>											
									</thead>											
									<tbody>		
									<?php $i=1; 		#echo '<pre>';print_r($ServicePackages_master);exit;									
										foreach($ServicePackages_master as $us)
										{			
																							
											?>											
											<tr>
												<td><input class="checkbox1" type="checkbox" id="check_list"  name="check_list[]" value="<?php echo ucfirst($us['pack_id']);?>"></td>
												<td><?php echo $i+$page;?></td>
												<td><?php echo ucfirst($us['order_no']);?></td>
												<td><?php echo ucfirst($us['package_name']);?></td>
												<td><?php echo ucfirst($us['applicant_name']);?></td>
												<td>£ <?php echo ucfirst($us['package_amount']);?></td>
												
												<td><?php echo date('d-m-Y',strtotime($us['addeddate']));?></td>
												<td><?php echo ucfirst($us['purchase_from']);?></td>
												<td><?php echo ucfirst($us['payment_status']);?></td>
												<!-- <td><?php //echo ucfirst($us['status']);?></td> -->
												<td class="actions">
													<!-- <a href="<?php //echo base_url();?>backend/ServicePackages/updateServicePackages/<?php //echo base64_encode($us['pack_id']);?>"><i data-feather="edit"></i></a> -->
													<a href="<?php echo base_url("backend/");?>ServicePackages/viewServicePackages/<?php echo base64_encode($us['pack_id']);?>" class="delete-row" ><i data-feather="eye"></i></a>
												</td>
											</tr>											
										<?php $i++; }?>
									</tbody>									
								</table>
									<div class="dataTables_paginate paging_simple_numbers" id="datatable-default_paginate" style="margin-top:10px;">
									<?php echo $links; ?>
								</div>									
								<?php } else 
								{?>
								<div class="alert alert-danger">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>No records  found.
								</div>									
								<?php }?>									
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Container-fluid Ends-->
</div>
