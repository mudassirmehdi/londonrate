<div class="page-body">


	<!-- Container-fluid starts-->
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-header">
						<h5>SERVICE PACKAGE MANAGEMENT SYSTEM DETAILS</h5>
						<div class="card-header-right">
							<div class="row">
								<div class="col-lg-12">
									<a class="btn btn-bgred"  href="<?php echo base_url();?>backend/ServicePackages/manageServicePackages" style="float:right">Back</a>
								</div>
								
							</div>
						</div>
					</div>	
					<div class="card-body">
						<div class="row">
							<div class="col-lg-4 mb-3 mb-lg-0">
								<div class="form-group row">
										<label class="col-sm-6 control-label text-lg-right ">Applicant Name:</label>
											<div class="col-sm-6">
											<?php echo $packInfo[0]['applicant_name'];?> 
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-6 control-label text-lg-right ">Package Name:</label>
											<div class="col-sm-6">
											<?php echo $packInfo[0]['package_name'];?> 
										</div>
									</div>
									
									
									<div class="form-group row">
										<label class="col-sm-6 control-label text-lg-right ">Order No:</label>
											<div class="col-sm-6">
											<?php echo stripslashes($packInfo[0]['order_no']);?> 
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-6 control-label text-lg-right ">Country:</label>
											<div class="col-sm-6">
											<?php echo stripslashes($packInfo[0]['country_name']);?> 
										</div>
									</div>
									<div class="form-group row">
									<label class="col-sm-6 control-label text-lg-right ">Mobile Numner:</label>
										<div class="col-sm-6">
										<?php echo $packInfo[0]['applicant_contact_number2'];?> 
									</div>
										
									</div>
									<div class="form-group row">
									<label class="col-sm-6 control-label text-lg-right ">Potential Regions:</label>
										<div class="col-sm-6">
										<?php echo $packInfo[0]['potential_regions'];?> 
									</div>
								</div>	
							</div>		
							<div class="col-lg-4 mb-3 mb-lg-0">
								
									
									
									
									<div class="form-group row">
										<label class="col-sm-6 control-label text-lg-right ">Company Name:</label>
											<div class="col-sm-6">
											<?php echo $packInfo[0]['company_name'];?> 
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-6 control-label text-lg-right ">Uniqueness Product:</label>
											<div class="col-sm-6">
											<?php echo $packInfo[0]['uniqueness_product'];?> 
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-6 control-label text-lg-right ">Current Team Partners:</label>
											<div class="col-sm-6">
											<?php echo $packInfo[0]['current_team_partners'];?> 
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-6 control-label text-lg-right "> Sales:</label>
											<div class="col-sm-6">
											<?php echo $packInfo[0]['average_sales'];?> 
										</div>
									</div>
									
									<div class="form-group row">
									<label class="col-sm-6 control-label text-lg-right ">Email:</label>
										<div class="col-sm-6">
										<?php echo $packInfo[0]['applicant_email2'];?> 
									</div>
								</div>
									
									
							</div>
							<div class="col-lg-4">
								
							
								
								
									
									
								<div class="form-group row">
									<label class="col-sm-6 control-label text-lg-right ">Established Year:</label>
										<div class="col-sm-6">
										<?php echo date('d-m-Y',strtotime($packInfo[0]['year_establish']));?> 
									</div>
								</div>
								
								
								<div class="form-group row">
									<label class="col-sm-6 control-label text-lg-right ">Package status:</label>
										<div class="col-sm-6">
										<?php echo $packInfo[0]['status'];?> 
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-6 control-label text-lg-right ">Package Currency:</label>
										<div class="col-sm-6">
										<?php echo $packInfo[0]['currency'];?> 
									</div>
								</div>
								
								
								<div class="form-group row">
										<label class="col-sm-6 control-label text-lg-right ">Budget:</label>
											<div class="col-sm-6">
											<?php echo $packInfo[0]['average_budget'];?> 
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-6 control-label text-lg-right ">Net Profit:</label>
											<div class="col-sm-6">
											<?php echo $packInfo[0]['average_net_profit'];?> 
										</div>
									</div>	
									<div class="form-group row">
										<label class="col-sm-6 control-label text-lg-right "> Salary:</label>
											<div class="col-sm-6">
											<?php echo $packInfo[0]['average_salaries'];?> 
										</div>
									</div>
								
							</div>
						
						</div>
					</div>
					<?php 

					if(isset($works_informationdeatilsInfo) && count($works_informationdeatilsInfo)>0)		
					{
					?>	
					<div class="card-body">
						<div class="row text-center">
							<div class="col-lg-12">
								<h4>IP WORK INFORMATION</h4>
							</div>
						</div><br/>
						<div class="row">
							<div class="col-lg-12">
								<table class="table table-hover">
															
												<thead>
													<tr>												
														<th>Sr.No</th>
														<th>IP Work Title</th>
														<th>IP Work Object</th>
														<th>IP Work Type</th>
														<th>IP Work Industry</th>
														<th>Development Date</th>
														<th>Registration Date</th>
														<th>IP Work Status</th>
														
													</tr>											
												</thead>											
												<tbody>		
												<?php $i=1; 											
													foreach($works_informationdeatilsInfo as $us)
													{			
																										
														?>											
														<tr>
															<td><?php echo $i+$page;?></td>
															<td><?php echo ucfirst($us['ip_work_title']);?></td>
															<td><?php echo ucfirst($us['object']);?></td>
															<td><?php echo ucfirst($us['type']);?></td>
															<td><?php echo ucfirst($us['industries']);?></td>
															<td><?php echo date('d-m-Y',strtotime($us['development_date']));?></td>
															<td><?php echo date('d-m-Y',strtotime($us['registration_date']));?></td>
															<td><?php echo ucfirst($us['ip_work_status']);?></td>
															
														</tr>											
													<?php $i++; }?>
												</tbody>									
											
											</table>
												
										</div>
									
						</div>
					</div>
					<?php } ?>	
					<?php 

					if(isset($main_productInfo) && count($main_productInfo)>0)		
					{
					?>	
					<div class="card-body">
						<div class="row text-center">
							<div class="col-lg-12">
								<h4>MAIN PRODUCT</h4>
							</div>
						</div><br/>
						<div class="row">
					
							<div class="col-lg-12">
								<table class="table table-hover">
															
												<thead>
													<tr>												
														<th style="width:30%">Sr.No</th>
														<th>Main Product</th>
														
														
													</tr>											
												</thead>											
												<tbody>		
												<?php $i=1; 											
													foreach($main_productInfo as $us)
													{			
																										
														?>											
														<tr>
															<td><?php echo $i+$page;?></td>
															<td><?php echo ucfirst($us['main_product']);?></td>
															
															
														</tr>											
												<?php $i++; }?>
												</tbody>									
											
											</table>
												
										</div>
								
						</div>
					</div>
					<?php } ?>	

					<?php 

					if(isset($potential_competitorInfo) && count($potential_competitorInfo)>0)		
					{
					?>	
					<div class="card-body">
						<div class="row text-center">
							<div class="col-lg-12">
								<h4>POTENTIAL COMPETITOR</h4>
							</div>
						</div><br/>
						<div class="row">
						
							<div class="col-lg-12">
								<table class="table table-hover">
															
												<thead>
													<tr>												
														<th style="width:30%">Sr.No</th>
														<th>Potential Competitor</th>
														
														
													</tr>											
												</thead>											
												<tbody>		
												<?php $i=1; 											
													foreach($potential_competitorInfo as $us)
													{			
																										
														?>											
														<tr>
															<td><?php echo $i+$page;?></td>
															<td><?php echo ucfirst($us['potential_competitor']);?></td>
															
															
														</tr>											
												<?php $i++; }?>
												</tbody>									
											
											</table>
												
										</div>
								
						</div>
					</div>
					<?php } ?>	
					<?php 

					if(isset($potential_customerInfo) && count($potential_customerInfo)>0)		
					{
					?>	
					<div class="card-body">
						<div class="row text-center">
							<div class="col-lg-12">
								<h4>POTENTIAL CUSTOMER</h4>
							</div>
						</div><br/>
						<div class="row">
							<div class="col-lg-12">
								<table class="table table-hover">
															
												<thead>
													<tr>												
														<th style="width:30%">Sr.No</th>
														<th>Potential Customer</th>
														
														
													</tr>											
												</thead>											
												<tbody>		
												<?php $i=1; 											
													foreach($potential_customerInfo as $us)
													{			
																										
														?>											
														<tr>
															<td><?php echo $i+$page;?></td>
															<td><?php echo ucfirst($us['potential_customer']);?></td>
															
															
														</tr>											
												<?php $i++; }?>
												</tbody>									
											
											</table>
												
										</div>
									
						</div>
					</div>
					<?php } ?>	
				</div>
			</div>
		</div>
	</div>
	<!-- Container-fluid Ends-->
</div>