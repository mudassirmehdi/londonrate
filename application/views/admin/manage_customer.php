<div class="page-body">


	<!-- Container-fluid starts-->
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-header">
						<h5>CUSTOMER MANAGEMENT</h5>
						<div class="card-header-right">
						<div class="row">
							<div class="col-lg-12">
											<!-- <a class="btn btn-primary"  href="<?php// echo base_url();?>backend/CMS/addcms" style="float:right;background-color:#ff4d53;color:white;">Add CMS</a> -->
											</div>
											
							
							
						</div>
					</div>
				</div>	
					<div class="card-body">
					

							<form name="frm_manage_parcels" id="frm_manage_parcels" method="post" action="<?php echo base_url("backend/");?>Customer/mpCustomerSearch/<?php if($this->uri->segment(4)!=""){ echo $this->uri->segment(4);}?>/
										<?php if($this->uri->segment(5)!=""){ echo $this->uri->segment(5);}?>/
										
										">
									<div class="col-lg-12 col-xl-12">
										<div class="row form-group">
											
											<div class="col-lg-3">
												<input type="text" name="customer_name" id="customer_name" placeholder="Enter Customer Name" class="form-control" value="<?php  if($this->uri->segment(4)!='Na'){ echo $this->uri->segment(4);}?>" onkeypress="return /[0-9a-zA-Z_, ]/i.test(event.key)">
											</div>
											<div class="col-lg-3 text-center">
												<input type="text" name="contact_no" id="contact_no" placeholder="Enter Contact Number" class="form-control" value="<?php  if($this->uri->segment(5)!='Na'){ echo $this->uri->segment(5);}?>" onkeypress="return /[0-9a-zA-Z_, ]/i.test(event.key)">
												<label class="text-danger" style="margin-top:10px;"><b>Note : Without Enter Country Code</b></label>
											</div>
											<div class="col-lg-3">
												<input type="text" name="customer_email" id="customer_email" placeholder="Enter Email" class="form-control" value="<?php  if($this->uri->segment(6)!='Na'){ echo $this->uri->segment(6);}?>" onkeypress="return /[0-9a-zA-Z_,@. ]/i.test(event.key)">
											</div>
											
											
										</div>
									
										
									</div>
									<div class="col-lg-12 col-xl-12">
										<div class="row form-group">
											<div class="col-lg-6">
												<button class="btn btn-primary" type="submit" name="btn_search" id="btn_search">Search</button>
												<button class="btn btn-primary" name="btn_clear" id="btn_clear">Clear</button>
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
							<table class="table table-bordered table-striped mb-0" id="datatable-default">			<?php if(isset($customermaster) && count($customermaster)>0)									
							{
							?>							
									<thead>
										<tr>												
											<th>Sr.No</th>
											<th>Customer Name</th>
											<th>Contact Number</th>
											<th>Customer Email</th>
											<th>Status</th>
											<th>Added Date	</th>
											
											<th>Action</th>
										</tr>											
									</thead>											
									<tbody>		
<?php $i=1; 											
										foreach($customermaster as $us)
										{			
																							
											?>											
											<tr>
												<td><?php echo $i+$page;?></td>
												<td><?php echo ucfirst($us['applicant_name']);?></td>
												<td><?php echo $us['applicant_country_code'].''.$us['applicant_contact_number'];?></td>
												<td><?php echo $us['applicant_email'];?></td>
												<td><?php echo $us['applicant_status'];?></td>
												<td><?php echo date('d-m-Y',strtotime($us['addeddate']));?></td>
												
												<td class="actions">
													<!-- <a href="<?php //echo base_url();?>backend/CMS/updatecms/<?php //echo base64_encode($us['applicant_id']);?>"><i data-feather="edit"></i></a> -->
												<?php if($us['applicant_status']!="Delete"){?>
													<a href="<?php echo base_url("backend/");?>Customer/deletecustomer/<?php echo base64_encode($us['applicant_id']);?>" class="delete-row" onclick="javascript:return chk_isDeleteComnfirm();"><i data-feather="trash-2"></i></a>
												<?php } ?>
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