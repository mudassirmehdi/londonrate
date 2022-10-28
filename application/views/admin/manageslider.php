<div class="page-body">


	<!-- Container-fluid starts-->
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-header">
						<h5>SLIDER LISTING</h5>
						<div class="card-header-right">
						<div class="row">
							<div class="col-lg-12">
							<a class="btn btn-bgred"  href="<?php echo base_url();?>backend/Slider/addslider" style="float:right">Add Slider</a>
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
					
<form class="needs-validation" name="frm_manage_slider" id="frm_manage_slider" method="post" action="<?php echo base_url("backend/");?>Slider/mslidersearch/<?php if($this->uri->segment(4)!=""){ echo $this->uri->segment(4);}?>/
		<?php if($this->uri->segment(5)!=""){ echo $this->uri->segment(5);}?>">					
							<div class="row">
			<div class="col-md-3 xl-30">
				<input type="text" name="banner_title" id="banner_title" placeholder="Banner Title" class="form-control" value="<?php  if($this->uri->segment(4)!='Na'){ echo $this->uri->segment(4);}?>">
			</div>
		
			
			<div class="col-md-6 xl-60" >
				<button class="btn btn-primary" name="btn_search" id="btn_search">Search</button>
											<button class="btn btn-primary" name="btn_clear" id="btn_clear">Clear</button>
			</div>
			
			</div>
			
			
		</form>

						<hr/>
						
						<div class="table-responsive">
							<div id="basicScenario" class="product-physical"></div>
							<table class="table table-bordered table-striped mb-0" id="datatable-default">			
							<?php if(isset($bannermaster) && count($bannermaster)>0)									
							{
							?>							
									<thead>
										<tr>												
											<th>Sr.No</th>
											<th>Type</th>
											<th>Position</th>
											<th>Title</th>
											<th>Image</th>
											<th>Date</th>
											<th>Status</th>
											<th>Action</th>
										</tr>											
									</thead>											
									<tbody>	
<?php $i=1; 											
										foreach($bannermaster as $us)
										{			
											$str_images='';										
											if($us['banner_image']!="")
											{
												$str_images='<img src="'.base_url().'uploads/banners/'.$us['banner_image'].'" width="50" height="50" class="img-fluid img-50 blur-up lazyloaded">';
											}												
											?>										
											<tr>
												<td><?php echo $i+$page;?></td>
												<td><?php echo $us['banner_type'];?></td>
												<td><?php echo $us['banner_position'];?></td>
												<td><?php echo $us['banner_title'];?></td>
												
												<?php if($str_images!="") {?>
												<td> <?php echo $str_images;?></td>
												<?php } else {?>
												<td> <img src="<?php echo base_url();?>template/admin/assets/images/lookbook.jpg" alt="" class="img-fluid img-50 blur-up lazyloaded"></td>
												<?php } ?>
												<td><?php echo date('d-m-Y',strtotime($us['banner_start_date']))." - ".date('d-m-Y',strtotime($us['banner_end_date'])) ;?></td>
												<td><?php echo $us['banner_status'];?></td>
												<td class="actions">
												<?php if($us['banner_status']!="Delete") {?>
													<a href="<?php echo base_url();?>backend/Slider/deleteslider/<?php echo base64_encode($us['banner_id']);?>" onclick="javascript:return chk_isDeleteComnfirm();"><i data-feather="trash-2"></i></a>
												<?php } ?>
													<a href="<?php echo base_url();?>backend/Slider/updateslider/<?php echo base64_encode($us['banner_id']);?>"><i data-feather="edit"></i></a>
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