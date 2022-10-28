<div class="page-body">

	

	<!-- Container-fluid starts-->
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-header">
						<h5>HELP & SUPPORT LISTING</h5>
						<div class="card-header-right">
						<div class="row">
							<div class="col-lg-12">
											<a class="btn btn-primary"  href="<?php echo base_url();?>backend/Help/addhelp" style="float:right">Add Help</a>
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
																
		<form class="needs-validation" name="frm_manage_support" id="frm_manage_support" method="post" action="<?php echo base_url("backend/");?>Help/mhelpsearch/<?php if($this->uri->segment(4)!=""){ echo $this->uri->segment(4);}?>/
		<?php if($this->uri->segment(5)!=""){ echo $this->uri->segment(5);}?>/<?php if($this->uri->segment(6)!=""){ echo $this->uri->segment(6);}?>/<?php if($this->uri->segment(7)!=""){ echo $this->uri->segment(7);}?>">					
							<div class="row">
			<div class="col-md-3 xl-30">
				<input type="text" name="help_title" id="help_title" placeholder="Help Title" class="form-control" value="<?php  if($this->uri->segment(4)!='Na'){ echo $this->uri->segment(4);}?>">
			</div>
			
				<div class="col-md-3 xl-30">
				<input type="text" name="help_added_date" id="help_added_date" placeholder="Added Date" class="form-control datepicker-here  digits" data-language="en"  value="<?php  if($this->uri->segment(5)!='Na'){ echo $this->uri->segment(5);}?>">
			</div>
			
			<div class="col-md-3 xl-30" >
				<select name="help_status" id="help_status" class="custom-select">
														<option value="">--Status--</option>
														<option value="Active" <?php if($this->uri->segment(6)=="Active"){ echo 'selected="selected"';}?>>Active</option>
														<option value="Inactive" <?php if($this->uri->segment(6)=="Inactive"){ echo 'selected="selected"';}?>>Inactive</option>
														<option value="Delete" <?php if($this->uri->segment(6)=="Delete"){ echo 'selected="selected"';}?>>Delete</option>
					</select>
			</div>
			</div>
			<div class="row"  style="padding-top:15px;">
			<div class="col-md-6 xl-60" >
				<button class="btn btn-primary" name="btn_search" id="btn_search">Search</button>
				<button class="btn btn-primary" name="btn_clear" id="btn_clear">Clear</button>
											
				
			</div>
			</div>
			
			
		</form>

						<hr/>
						
						<div class="table-responsive">
							<div id="basicScenario" class="product-physical"></div>
							<?php if(count($helpmaster)>0)									
							{
							?>										
								<table class="table table-bordered table-striped mb-0" id="datatable-default">										
									<thead>
										<tr>												
											<th>Sr.No</th>
											<th>Title</th>
											
											<th>Description</th>
											<th>Status</th>
											<th>Actions</th>
										</tr>											
									</thead>											
									<tbody>											
										<?php $i=1; 											
										foreach($helpmaster as $us)
										{												
											?>												
											<tr>
												<td><?php echo $i+$page;?></td>
												<td><?php echo $us['help_title'];?></td>
												<td><?php echo trim($us['help_description']);?></td>
												
												
												
												<td><?php echo $us['help_status'];?></td>	
												<td class="actions">
												
													<a href="<?php echo base_url("backend/");?>Help/updatehelp/<?php echo base64_encode($us['help_id']);?>"><i data-feather="edit"></i></a>
												<?php if($us['help_status']!='Delete')
												{?>
													<a href="<?php echo base_url("backend/");?>Help/deletehelp/<?php echo base64_encode($us['help_id']);?>" class="delete-row" onclick="javascript:return chk_isDeleteComnfirm();"><i data-feather="trash-2"></i></a>
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