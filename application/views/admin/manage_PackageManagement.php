<div class="page-body">


	<!-- Container-fluid starts-->
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-header">
						<h5>PACKAGE MANAGEMENT SYSTEM</h5>
						<div class="card-header-right">
						<div class="row">
							<div class="col-lg-12">
											<a class="btn btn-bgred"  href="<?php echo base_url();?>backend/PackageManagement/addPackageManagement" style="float:right;">Add Package Management</a>
											</div>
											
							
							
						</div>
					</div>
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
										
						
						<div class="table-responsive">
							<div id="basicScenario" class="product-physical"></div>
							<table class="table table-bordered table-striped mb-0" id="datatable-default">			
								<?php 

								if(isset($PackageManagement_master) && count($PackageManagement_master)>0)									
							{
							?>							
									<thead>
										<tr>												
											<th>Sr.No</th>
											<th>Package Name</th>
											<th>Full Description</th>
											<th>Description</th>
											<th>Amount</th>
											<th>Package Star</th>
											<th>Status</th>
											<th>Action</th>
										</tr>											
									</thead>											
									<tbody>		
									<?php $i=1; 											
										foreach($PackageManagement_master as $us)
										{			
																							
											?>											
											<tr>
												<td><?php echo $i+$page;?></td>
												<td><?php echo ucfirst($us['package_name']);?></td>
												<td><?php echo ucfirst($us['full_description']);?></td>
												<td><?php echo ucfirst($us['description']);?></td>
												<td><?php echo ucfirst($us['amount']);?></td>
												<td><?php echo ucfirst($us['package_star']);?></td>
												<td><?php echo ucfirst($us['package_status']);?></td>
												<td class="actions">
													<a href="<?php echo base_url();?>backend/PackageManagement/updatePackageManagement/<?php echo base64_encode($us['pack_manage_id']);?>"><i data-feather="edit"></i></a>
													<a href="<?php echo base_url("backend/");?>PackageManagement/deletePackageManagement/<?php echo base64_encode($us['pack_manage_id']);?>" class="delete-row" onclick="javascript:return chk_isDeleteComnfirm();"><i data-feather="trash-2"></i></a>
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