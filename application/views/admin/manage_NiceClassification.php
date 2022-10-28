<div class="page-body">


	<!-- Container-fluid starts-->
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-header">
						<h5>NICE CLASSIFICATION MANAGEMENT SYSTEM</h5>
						<div class="card-header-right">
						<div class="row">
							<div class="col-lg-12">
								<a class="btn btn-bgred"  href="<?php echo base_url();?>backend/NiceClassification/addNiceClassification" style="float:right;">Add Nice Classification</a>
							</div>
						</div>
					</div>
				</div>	
					<div class="card-body">
						
						<form name="frm_manage_parcels" id="frm_manage_parcels" method="post" action="<?php echo base_url("backend/");?>NiceClassification/mpClassificationSearch/<?php if($this->uri->segment(4)!=""){ echo $this->uri->segment(4);}?>/
										<?php if($this->uri->segment(5)!=""){ echo $this->uri->segment(5);}?>/
										<?php if($this->uri->segment(6)!=""){ echo $this->uri->segment(6);}?>
										">
									<div class="col-lg-12 col-xl-12">
										<div class="row form-group">
											<?php $res=$this->NiceClassification_model->get_object_all();

                                            ?>
											<div class="col-lg-3">
												<select name="sel_object" id="sel_object" class="custom-select" onchange="getTypeByObject()"  >                                            	
								                <option value="">Select Object</option>
							                     <?php foreach ($res as $row) 
					                            { ?>
					                                <option value='<?php echo $row->object_id;?>' <?php if($this->uri->segment(4)==$row->object_id){ echo 'selected="selected"';}?>><?php echo $row->object;?></option>;
					                         <?php  
					                     		} 
					                                                    
					                             ?>
						                       </select>
												
											</div>

											<?php $res2=$this->NiceClassification_model->get_type_all();

                                            ?>
											<div class="col-lg-3">
												<select name="type_name" id="type_name" class="custom-select"  onchange="getNiceByType()">                                            	
								                <option value="">Select Type</option>
							                     <?php foreach ($res2 as $row) 
					                            { ?>
					                                <option value='<?php echo $row->type_id;?>' <?php if($this->uri->segment(5)==$row->type_id){ echo 'selected="selected"';}?>><?php echo $row->type;?></option>;
					                         <?php  
					                     		} 
					                                                    
					                             ?>
						                       </select>
												
											</div>
											<?php $res2=$this->NiceClassification_model->get_classification_all();

                                            ?>
											<div class="col-lg-3">
												<select name="classification_name" id="classification_name" class="custom-select" >                                            	
								                <option value="">Select Type</option>
							                     <?php foreach ($res2 as $row) 
					                            { ?>
					                                <option value='<?php echo $row->classi_id;?>' <?php if($this->uri->segment(6)==$row->classi_id){ echo 'selected="selected"';}?>><?php echo $row->nice;?></option>;
					                         <?php  
					                     		} 
					                                                    
					                             ?>
						                       </select>
												
											</div>
											
											<!-- <div class="col-lg-3">
												<input type="text" name="classification_name" id="classification_name" placeholder="Enter Classification" class="form-control" value="<?php  //if($this->uri->segment(6)!='Na'){ echo $this->uri->segment(6);}?>">
											</div> -->
										
											
											
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
							<table class="table table-bordered table-striped mb-0" id="datatable-default">			
								<?php 

							if($NiceClassification_master>0)									
							{
								
							?>							
									<thead>
										<tr>												
											<th>Sr.No</th>
											<th>Object</th>
											<th>Type</th>
											<th>Nice Classification</th>
											<th>Status</th>
											<th>Action</th>
										</tr>											
									</thead>											
									<tbody>		
									<?php $i=1; 											
										foreach($NiceClassification_master as $us)
										{			
																							
											?>											
											<tr>
												<td><?php echo $i+$page;?></td>
												<td><?php echo ucfirst($us['object']);?></td>
												<td><?php echo ucfirst($us['type']);?></td>
												<td><?php echo ucfirst($us['nice']);?></td>
												<td><?php echo ucfirst($us['status']);?></td>
												<td class="actions">
													<a href="<?php echo base_url();?>backend/NiceClassification/updateNiceClassification/<?php echo base64_encode($us['classi_id']);?>"><i data-feather="edit"></i></a>
													<a href="<?php echo base_url("backend/");?>NiceClassification/deleteNiceClassification/<?php echo base64_encode($us['classi_id']);?>" class="delete-row" onclick="javascript:return chk_isDeleteComnfirm();"><i data-feather="trash-2"></i></a>
												</td>
											</tr>											
										<?php $i++; }?>
									</tbody>									
								</table>
																	
								<?php } 
								else 
								{?>
								<div class="alert alert-danger">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>No records  found.
								</div>									
								<?php }?>	
								<div class="dataTables_paginate paging_simple_numbers" id="datatable-default_paginate" style="margin-top:10px;">
									<?php echo $links; ?>
								</div>									
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Container-fluid Ends-->
</div>