<div class="page-body">

	

	<!-- Container-fluid starts-->
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-header">
						<h5>SUBADMIN LISTING</h5>
						
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
																
							
						<div class="btn-popup pull-right">
							<a class="btn btn-primary"  href="<?php echo base_url();?>backend/Subadmin/addsubadmin">Add Subadmin</a>
						</div>
						<div class="table-responsive">
							<div id="basicScenario" class="product-physical"></div>
							<?php if(count($adminInfo)>0)									
							{
							?>										
								<table class="table table-bordered table-striped mb-0" > <!--id="datatable-default"-->
											<thead>
												<tr>
													<th>Sr.No</th>
													<th>Subadmin Name</th>
													<th>User name</th>
													 
													<th>Contact Detail</th>
													<th>Status</th>
													<th>Dateadded</th>
													<th>Actions</th>
												</tr>
											</thead>
											<tbody>
											<?php $i=1; 
											foreach($adminInfo as $us)
											{											
												?>
												<tr>
													<td><?php echo $i+$page;?></td>
													<td><?php echo ucfirst($us['subadmin_name']);?></td>
													<td><?php echo $us['subusername'];?></td>
													<td>Mobile: <?php echo $us['submobile_number']?> <br/> Email: <?php echo $us['subadmin_email'] ?></td>
													<td><?php echo $us['substatus'];?></td>
													<td><?php echo date('d M Y',strtotime($us['dateadded']));?></td>
													<td class="actions">
														<a href="<?php echo base_url();?>backend/Subadmin/updatesubadmin/<?php echo base64_encode($us['subadmin_id']);?>"><i data-feather="edit"></i></a>
														<?php if($us['substatus']!='Delete')
												{?>
													<a href="<?php echo base_url("backend/");?>Subadmin/deletesubadmin/<?php echo base64_encode($us['subadmin_id']);?>" class="delete-row" onclick="javascript:return chk_isDeleteComnfirm();"><i data-feather="trash-2"></i></a>
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