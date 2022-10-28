<div class="page-body">


	<!-- Container-fluid starts-->
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-header">
						<h5>IP WORK TYPE MANAGEMENT SYSTEM</h5>
						<div class="card-header-right">
						<div class="row">
							<div class="col-lg-12">
											<a class="btn btn-bgred"  href="<?php echo base_url();?>backend/IP_work_type/addipwork_type" style="float:right;">Add IP WORK TYPE</a>
											</div>
											
							
							
						</div>
					</div>
				</div>	
					<div class="card-body">
					
						<form name="frm_manage_parcels" id="frm_manage_parcels" method="post" action="<?php echo base_url("backend/");?>IP_work_type/mpIP_work_typeSearch/<?php if($this->uri->segment(4)!=""){ echo $this->uri->segment(4);}?>/
										<?php if($this->uri->segment(5)!=""){ echo $this->uri->segment(5);}?>/
										
										">
									<div class="col-lg-12 col-xl-12">
										<div class="row form-group">
											
											<div class="col-lg-3">
												<input type="text" name="object_name" id="object_name" placeholder="Enter Industry Name" class="form-control" value="<?php  if($this->uri->segment(4)!='Na'){ echo $this->uri->segment(4);}?>" onkeypress="return /[0-9a-zA-Z_, ]/i.test(event.key)">
											</div>
											<div class="col-lg-3">
												<input type="text" name="type_name" id="type_name" placeholder="Enter Type Name" class="form-control" value="<?php  if($this->uri->segment(5)!='Na'){ echo $this->uri->segment(5);}?>" onkeypress="return /[0-9a-zA-Z_, ]/i.test(event.key)">
											</div>
											
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
							<table class="table table-bordered table-striped mb-0" id="datatable-default">			
								<?php 

								if(isset($ipworktype_master) && count($ipworktype_master)>0)									
							{
							?>							
									<thead>
										<tr>												
											<th>Sr.No</th>
											<th>Object</th>
											<th>Type</th>
											<th>Status</th>
											<th>Action</th>
										</tr>											
									</thead>											
									<tbody>		
									<?php $i=1; 											
										foreach($ipworktype_master as $us)
										{			
																							
											?>											
											<tr>
												<td><?php echo $i+$page;?></td>
												<td><?php echo ucfirst($us['object']);?></td>
												<td><?php echo ucfirst($us['type']);?></td>
												<td><?php echo ucfirst($us['status']);?></td>
												<td class="actions">
													<a href="<?php echo base_url();?>backend/IP_work_type/updateipwork_type/<?php echo base64_encode($us['type_id']);?>"><i data-feather="edit"></i></a>
													<a href="<?php echo base_url("backend/");?>IP_work_type/deleteipwork_type/<?php echo base64_encode($us['type_id']);?>" class="delete-row" onclick="javascript:return chk_isDeleteComnfirm();"><i data-feather="trash-2"></i></a>
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