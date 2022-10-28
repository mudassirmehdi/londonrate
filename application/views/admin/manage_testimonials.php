<div class="page-body">


	<!-- Container-fluid starts-->
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-header">
						<h5>TESTIMONIALS MANAGEMENT SYSTEM</h5>
						<div class="card-header-right">
						<div class="row">
							<div class="col-lg-12">
											<a class="btn btn-bgred"  href="<?php echo base_url();?>backend/Testimonials/addtestimonials" style="float:right;">Add TESTIMONIALS</a>
											</div>
											
							
							
						</div>
					</div>
				</div>	
					<div class="card-body">
					
						<form name="frm_manage_parcels" id="frm_manage_parcels" method="post" action="<?php echo base_url("backend/");?>Testimonials/mpTestimonialsSearch/<?php if($this->uri->segment(4)!=""){ echo $this->uri->segment(4);}?>/
										<?php if($this->uri->segment(5)!=""){ echo $this->uri->segment(5);}?>/
										
										">
									<div class="col-lg-12 col-xl-12">
										<div class="row form-group">
											
											<div class="col-lg-3">
												<input type="text" name="title_name" id="title_name" placeholder="Enter Title Name" class="form-control" value="<?php  if($this->uri->segment(4)!='Na'){ echo $this->uri->segment(4);}?>" onkeypress="return /[0-9a-zA-Z_, ]/i.test(event.key)">
											</div>
											<div class="col-lg-3">
												<input type="text" name="test_position" id="test_position" placeholder="Enter Position" class="form-control" value="<?php  if($this->uri->segment(5)!='Na'){ echo $this->uri->segment(5);}?>" onkeypress="return /[0-9a-zA-Z_, ]/i.test(event.key)">
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
							<table class="table table-bordered table-striped mb-0" id="datatable-default" style="width: 100%;">			
								<?php 

								if(isset($testimonials_master) && count($testimonials_master)>0)									
							{
							?>							
									<thead>
										<tr style="width: 100%;">												
											<th style="width: 5%;">Sr.No</th>
											<th style="width: 15%;">Photo</th>
											<th style="width: 10%;">Name</th>
											<th style="width: 15%;">Position</th>
											<th style="width: 15%;">Description</th>
											<th style="width: 10%;">Addeddate</th>
											<th style="width: 10%;">Updatedate</th>
											<th style="width: 10%;">Status</th>
											<th style="width: 10%;">Action</th>
										</tr>											
									</thead>											
									<tbody>		
									<?php $i=1; 											
										foreach($testimonials_master as $us)
										{			
																							
											?>											
											<tr style="width: 100%;">
												<td style="width: 5%;"><?php echo $i+$page;?></td>
												<td style="width: 15%;"><img src="<?php echo base_url().$us['test_photo'];?>" height="100px" width="100px;"></td>
												<td style="width: 10%;"><?php echo ucfirst($us['title_name']);?></td>
												<td style="width: 15%;"><?php echo ucfirst($us['test_position']);?></td>
												<td style="width: 15%;"><?php echo ucfirst($us['test_description']);?></td>
												<td style="width: 10%;"><?php echo date('d-m-Y',strtotime($us['addeddate']));?></td>
												<td style="width: 10%;"><?php echo date('d-m-Y',strtotime($us['updatedate']));?></td>
												<td style="width: 10%;"><?php echo ucfirst($us['status']);?></td>
												<td style="width: 10%;" class="actions">
													<a href="<?php echo base_url();?>backend/Testimonials/updatetestimonials/<?php echo base64_encode($us['test_id']);?>"><i data-feather="edit"></i></a>
													<a href="<?php echo base_url("backend/");?>Testimonials/deletetestimonials/<?php echo base64_encode($us['test_id']);?>" class="delete-row" onclick="javascript:return chk_isDeleteComnfirm();"><i data-feather="trash-2"></i></a>
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