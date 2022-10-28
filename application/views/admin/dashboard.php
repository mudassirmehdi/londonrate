<div class="page-body">

	<!-- Container-fluid starts-->
	<div class="container-fluid">
		<div class="page-header">
			<div class="row">
				<div class="col-lg-12">
					
				</div>
				
			</div>
		</div>
	</div>
	<!-- Container-fluid Ends-->

	<!-- Container-fluid starts-->
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4 xl-40">
				<div class="card o-hidden widget-cards">
					<div class="bg-warning card-body" >
					
						<div class="media static-top-widget row">
							<a href="<?php echo base_url();?>backend/Customer/managecustomer" target="_new"/>
							<div class="media-body col-12">
							
								<span class="m-0" style="color: #ffffff;">TOTAL CUSTOMERS</span>
								<h3 class="mb-0"><span class="counter"><?php echo $getTotalUsers;?></span></h3>
								
							</div>
						</a>
						</div>	
					</div>
				</div>
			</div>
			<div class="col-md-4 xl-40" >
				<div class="card o-hidden  widget-cards">
					<div class="bg-secondary card-body" >
						<div class="media static-top-widget row">
							<a href="<?php echo base_url();?>backend/Store/managestores" target="_new"/>
							<div class="media-body col-12"><span class="m-0" style="color: #ffffff;">TOTAL STORES</span>
								<h3 class="mb-0"><span class="counter"><?php echo $getTotalstores;?></span></h3>
							</div>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4 xl-40" >
				<div class="card o-hidden widget-cards"> 
					<div class="bg-danger card-body">
						<div class="media static-top-widget row">
							<a href="<?php echo base_url();?>backend/Product/manageproducts" target="_new"/>
							<div class="media-body col-12"><span class="m-0"  style="color: #ffffff;">TOTAL TALADDESI PRODUCTS</span>
								<h3 class="mb-0"><span class="counter"><?php echo $getTotalitems;?></span></h3>
							</div>
							</a>
						</div>
					</div>
				</div>
			</div>
			
			</div>
		
		<div class="row">
		<div class="col-md-4 xl-40">
				<div class="card o-hidden widget-cards">
					<div class="bg-warning card-body" >
						<div class="media static-top-widget row">
							<a href="<?php echo base_url();?>backend/Order/manageorders" target="_new"/>
							<div class="media-body col-12"><span class="m-0"  style="color: #ffffff;">TOTAL TALADDESI ORDERS</span>
								<h3 class="mb-0"><span class="counter"><?php echo $getTotalTaladorders;?></span></h3>
							</div>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4 xl-40">
				<div class="card o-hidden widget-cards">
					<div class="bg-secondary card-body" >
						<div class="media static-top-widget row">
							<a href="<?php echo base_url();?>backend/Virtualorder/managevirtualorders" target="_new"/>
							<div class="media-body col-12"><span class="m-0"  style="color: #ffffff;">TOTAL VIRTUAL TALAD ORDERS</span>
								<h3 class="mb-0"><span class="counter"><?php echo $getTotalVirtaulorders;?></span></h3>
							</div>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4 xl-40" >
				<div class="card o-hidden widget-cards">
					<div class="bg-danger card-body"  >
						<div class="media static-top-widget row">
								
							<div class="media-body col-12"><span class="m-0">TOTAL REVENUE</span>
								<h3 class="mb-0">£ <span class="counter"><?php echo $all_order_amount;?></span></h3>
							</div>
							
						</div>
					</div>
				</div>
			</div>
			
			
		</div>
		<div class="row">
			
			<div class="col-xl-6 xl-50">
				<div class="card">
					<div class="card-header">
						<h6 style="font-weight: 600;">LATEST CUSTOMERS</h6>
						
						
						<!--<div class="card-header-right">
						<div class="row">
							<div class="col-6">
								<select class="custom-select" name="subcategory_id" id="subcategory_id">
                                                 <option value="0">--Category--</option>  </select>
							</div>
							<div class="col-6">
								<select class="custom-select" name="subcategory_id" id="subcategory_id">
                                                 <option value="0">--Category--</option>  </select>
							</div>
						</div>
						</div>-->
					</div>
					<div class="card-body">
					<?PHP if(isset($getLatestCustomers) && count($getLatestCustomers)>0)
					{ ?>
						<div class="user-status table-responsive latest-order-table">
							<table class="table table-bordernone">
								
								<tbody>
								<?php $i=1;
								foreach($getLatestCustomers as $g) {?>
								<tr>
									<td style="border-top:0px;">#<?php echo $i;?></td>
									<td class="digits" style="border-top:0px;"><?php echo ucfirst($g['first_name'])." ".ucfirst($g['last_name']);?></td>
									
									<td class="digits" style="border-top:0px;"><?php echo $g['country_code']." ".$g['mobile_number'];?></td>
									
								</tr>
								<?php $i++;} ?>
								</tbody>
							</table>
							
						</div>
						<?PHP } else { ?>
						<div class="alert alert-danger">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>No records  found.
								</div>									
								<?php }?>
					</div>
				</div>
			</div>
			
			<div class="col-xl-6 xl-50">
				<div class="card">
					<div class="card-header">
						<h6 style="font-weight: 600;">TRENDING ITEM/MOST ORDERED ITEM</h6>
						
					</div>
					<div class="card-body">
						<div class="user-status table-responsive latest-order-table">
						<?php if(isset($getTotalTrendingItems) && count($getTotalTrendingItems)>0) { ?>
							<table class="table table-bordernone">
								
								<tbody>
								<?php
					$i=1;
								foreach($getTotalTrendingItems as $g)
								{
									$productordercnt=$this->Dashboard_model->itmeordercount($g['product_id']);
									$productimage='';
									$arrproductimage=$this->Dashboard_model->getProductImages($g['product_id']);
									if(isset($arrproductimage) && count($arrproductimage)>0)
									{
										$productimage=$arrproductimage[0]['image_name'];
									}	
?>
								<tr>
									<td style="border-top:0px;">#<?php echo $i;?></td>
									<td class="digits" style="border-top:0px;"><?php echo $g['product_name'];?></td>
									<td class="font-danger" style="border-top:0px;">Ordered <?php echo $productordercnt;?> Times</td>
									<td class="digits" style="border-top:0px;">
									
								<?php if($productimage!=""){?>
										<div class="align-middle image-sm-size"><img class="img-radius align-top m-r-30  blur-up lazyloaded" src="<?php echo base_url();?>uploads/products/<?php echo $productimage;?>" alt="" data-original-title="" title="">
											
										</div>
									<?php } else {?>
									<div class="align-middle image-sm-size"><img class="img-radius align-top m-r-30  blur-up lazyloaded" src="<?php echo base_url();?>template/admin/assets/images/dashboard/user2.jpg" alt="" data-original-title="" title="">
											
									</div><?php }?>
										
										</td>
								</tr>
								<?php $i++;
								} ?>
								</tbody>
							</table>
						<?PHP } else { ?>
						<div class="alert alert-danger">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>No records  found.
								</div>									
								<?php }?>
						</div>
						
					</div>
				</div>
			</div>
			<div class="col-xl-6 xl-50">
				<div class="card">
					<div class="card-header">
						<h6 style="font-weight: 600;">REVENUE BY CARD/QRcode</h6>
						<div class="card-header-right" style="padding: 18px 20px;">
						<div class="row">
						<a href="<?php echo base_url();?>backend/Transaction/managetransaction/Na/Na/Na/Qrcode/Na/Na" style="font-weight: 600;color: #fff;">View All</a>
						<!--<form name="frm_dash1" id="frm_dash1" method="post" >
							<div class="col-12">
								<select class="custom-select" name="revenue_by_card" id="revenue_by_card" onchange="javascript:this.form.submit();">
								  <option value="day" <?php //if(isset($_POST['revenue_by_card'])){ if($_POST['revenue_by_card']=="day") { echo 'selected="selected"';} }?>>--Daily--</option>
                                                 <option value="week" <?php //if(isset($_POST['revenue_by_card'])){ if($_POST['revenue_by_card']=="week") { echo 'selected="selected"';} }?>>--Weekly--</option>  
												  <option value="month" <?php //if(isset($_POST['revenue_by_card'])){ if($_POST['revenue_by_card']=="month") { echo 'selected="selected"';} }?>>--Monthly--</option>  
								</select>
							</div>
							</form>-->
						</div>
						</div>
					</div>
					<div class="card-body">
					<?PHP 
					//print_r($getlastorders);exit;
					if(isset($getrevene_card) && count($getrevene_card)>0)
					{ ?>
						<div class="user-status table-responsive latest-order-table">
							<table class="table table-bordernone">
								
								<tbody>
								<?php $k=1;
								foreach($getrevene_card as $g) 
								{
									$strProduct ='';$i=1;$strcustt ='';
									$arrproduct_name=$this->Dashboard_model->getProducthistory($g['order_id']);	
									foreach($arrproduct_name as $arr)
									{
										
										$strProduct .=$i.")". $arr['product_name']."<br/>";
										$i++;
									}
									
									$arrcust_name=$this->Dashboard_model->getCustomerName($g['customer_id']);
									foreach($arrcust_name as $arr)
									{
										$strcustt =$arr['first_name']." ".$arr['last_name'];
									}
									?>
								<tr>
									<td style="border-top:0px;">#<?php echo $k;?></td>
									<td class="digits" style="border-top:0px;"><?php echo $g['order_no'];?></td>
									<!--<td class="digits" style="border-top:0px;max-height:15px;scroll:auto;"><?php //echo $strProduct;?></td>-->
									<td class="font-danger" style="border-top:0px;"><?php echo $strcustt;?></td>
									<td class="font-danger" style="border-top:0px;"><?php echo  date('d M Y',strtotime($g['order_date']));?></td>
									<td class="font-danger" style="border-top:0px;"><a href="<?php echo base_url();?>backend/Order/vieworder/<?php echo base64_encode($g['order_id']);?>">View</a></td>
								</tr>
								<?php $k++;} ?>
								</tbody>
							</table>
							
						</div>
						<?PHP } else { ?>
						<div class="alert alert-danger">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>No records  found.
								</div>									
								<?php }?>	
					</div>
				</div>
			</div>
			<div class="col-xl-6 xl-50">
				<div class="card">
					<div class="card-header">
						<h6 style="font-weight: 600;">REVENUE BY CASH</h6>
						<div class="card-header-right" style="padding: 18px 20px;">
						<div class="row">
						<a href="<?php echo base_url();?>backend/Transaction/managetransaction/Na/Na/Na/cod/Na/Na" style="font-weight: 600;color: #fff;">View All</a>
						<!--<form name="frm_dash2" id="frm_dash2" method="post" >
							<div class="col-12">
								<select class="custom-select" name="revenue_by_cash" id="revenue_by_cash" onchange="javascript:this.form.submit();">
								  <option value="day" <?php //if(isset($_POST['revenue_by_cash'])){ if($_POST['revenue_by_cash']=="day") { echo 'selected="selected"';} }?>>--Daily--</option>
                                                 <option value="week" <?php //if(isset($_POST['revenue_by_cash'])){ if($_POST['revenue_by_cash']=="week") { echo 'selected="selected"';} }?>>--Weekly--</option>  
												  <option value="month" <?php //if(isset($_POST['revenue_by_cash'])){ if($_POST['revenue_by_cash']=="month") { echo 'selected="selected"';} }?>>--Monthly--</option>  
								</select>
							</div>
							</form>-->
						</div>
						</div>
					</div>
					<div class="card-body">
					<?PHP 
					//print_r($getlastorders);exit;
					if(isset($getrevene_cash) && count($getrevene_cash)>0)
					{ ?>
						<div class="user-status table-responsive latest-order-table">
							<table class="table table-bordernone">
								
								<tbody>
								<?php $k=1;
								foreach($getrevene_cash as $g) 
								{
									$strProduct ='';$i=1;$strcustt ='';
									$arrproduct_name=$this->Dashboard_model->getProducthistory($g['order_id']);	
									foreach($arrproduct_name as $arr)
									{
										
										$strProduct .=$i.")". $arr['product_name']."<br/>";
										$i++;
									}
									
									$arrcust_name=$this->Dashboard_model->getCustomerName($g['customer_id']);
									foreach($arrcust_name as $arr)
									{
										$strcustt =$arr['first_name']." ".$arr['last_name'];
									}
									?>
								<tr>
									<td style="border-top:0px;">#<?php echo $k;?></td>
									<td class="digits" style="border-top:0px;"><?php echo $g['order_no'];?></td>
									<!--<td class="digits" style="border-top:0px;max-height:15px;scroll:auto;"><?php //echo $strProduct;?></td>-->
									<td class="font-danger" style="border-top:0px;"><?php echo $strcustt;?></td>
									<td class="font-danger" style="border-top:0px;"><?php echo  date('d M Y',strtotime($g['order_date']));?></td>
									<td class="font-danger" style="border-top:0px;"><a href="<?php echo base_url();?>backend/Order/vieworder/<?php echo base64_encode($g['order_id']);?>">View</a></td>
								</tr>
								<?php $k++;} ?>
								</tbody>
							</table>
							
						</div>
						<?PHP } else { ?>
						<div class="alert alert-danger">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>No records  found.
								</div>									
								<?php }?>
					</div>
				</div>
			</div>
			
			<div class="col-xl-6 xl-50">
				<div class="card">
					<div class="card-header">
						<h6 style="font-weight: 600;">ORDER REPORT OVERVIEW</h6>
						<div class="card-header-right"  style="padding: 18px 20px;">
						<div class="row">
						<a href="<?php echo base_url();?>backend/Order/manageorders" style="font-weight: 600;color: #fff;">View All</a>
							<!--<form name="frm_dashboard" id="frm_dashboard" action="<?php echo base_url();?>backend/Dashboard" method="post">
							
							<div class="col-12">
								<select class="custom-select" name="order_report" id="order_report" onchange="javascript:this.form.submit();">
								  <option value="day" <?php //if(isset($_POST['order_report'])){ if($_POST['order_report']=="day") { echo 'selected="selected"';} }?>>--Daily--</option>
                                                 <option value="week" <?php //if(isset($_POST['order_report'])){ if($_POST['order_report']=="week") { echo 'selected="selected"';} }?>>--Weekly--</option>  
												  <option value="month" <?php //if(isset($_POST['order_report'])){ if($_POST['order_report']=="month") { echo 'selected="selected"';} }?>>--Monthly--</option>  
								</select>
							</div>
							</form>-->
							
						</div>
						</div>
					</div>
					<div class="card-body">
					<?PHP 
					//print_r($getlastorders);exit;
					if(isset($getlastorders) && count($getlastorders)>0)
					{ ?>
						<div class="user-status table-responsive latest-order-table">
							<table class="table table-bordernone">
								
								<tbody>
								<?php $k=1;
								foreach($getlastorders as $g) 
								{
									$strProduct ='';$i=1;$strcustt ='';
									$arrproduct_name=$this->Dashboard_model->getProducthistory($g['order_id']);	
									foreach($arrproduct_name as $arr)
									{
										
										$strProduct .=$i.")". $arr['product_name']."<br/>";
										$i++;
									}
									
									$arrcust_name=$this->Dashboard_model->getCustomerName($g['customer_id']);
									foreach($arrcust_name as $arr)
									{
										$strcustt =$arr['first_name']." ".$arr['last_name'];
									}
									?>
								<tr>
									<td style="border-top:0px;">#<?php echo $k;?></td>
									<td class="digits" style="border-top:0px;"><?php echo $g['order_no'];?></td>
									<!--<td class="digits" style="border-top:0px;max-height:15px;scroll:auto;"><?php //echo $strProduct;?></td>-->
									<td class="font-danger" style="border-top:0px;"><?php echo $strcustt;?></td>
									<td class="font-danger" style="border-top:0px;"><?php echo  date('d M Y',strtotime($g['order_date']));?></td>
									<td class="font-danger" style="border-top:0px;"><a href="<?php echo base_url();?>backend/Order/vieworder/<?php echo base64_encode($g['order_id']);?>">View</a></td>
								</tr>
								<?php $k++;} ?>
								</tbody>
							</table>
							
						</div>
						<?PHP } else { ?>
						<div class="alert alert-danger">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>No records  found.
								</div>									
								<?php }?>
					</div>
				</div>
			</div>
			
			
			<div class="col-xl-6 xl-50">
				<div class="card">
					<div class="card-header">
						<a href="<?php echo base_url();?>backend/Store/managestores" class="btn btn-primary">TOP STORE</a>
					</div>
					<div class="card-body">
					<?php 
					if(isset($getTopStores) && count($getTopStores)>0)
					{
						foreach($getTopStores as $g) {?>
						<div class="row">
                                    <div class="col-6">
                                       STORE NAME
                                    </div>
                                    <div class="col-6">
                                      <?php echo $g['store_name'];?>
                                    </div>
                                </div>
						<div class="row">
                                    <div class="col-6">
                                       CONTACT 
                                    </div>
                                    <div class="col-6">
                                       <?php echo $g['store_contact_number'];?>
                                    </div>
                                </div>
								<div class="row">
                                    <div class="col-6">
                                      <?php echo $g['store_owner_email'];?>
                                    </div>
                                    <div class="col-6">
                                    <a href="<?php echo base_url();?>backend/Store/viewstore/<?php echo base64_encode($g['store_id']);?>" class="btn btn-primary">VIEW DETAILS</a>
                                    </div>
                                </div>
								
								<hr/>
								
					<?php } 
					} else { ?>
					<div class="alert alert-danger">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>No records  found.
								</div>									
								<?php }?>	
					</div>
				</div>
			</div>
			
			
			
			
			<div class="col-xl-6 xl-50">
				<div class="card">
					<div class="card-header">
						<h6 style="font-weight: 600;">LOYAL CUSTOMERS</h6>
						
					</div>
					<div class="card-body">
					<?PHP if(isset($getLoyalCustomers) && count($getLoyalCustomers)>0)
					{ ?>
						<div class="user-status table-responsive latest-order-table">
							<table class="table table-bordernone">
								
								<tbody>
								<?php $i=1;
								foreach($getLoyalCustomers as $g) {?>
								<tr>
									<td style="border-top:0px;">#<?php echo $i;?></td>
									<td class="digits" style="border-top:0px;"><?php echo $g['first_name']." ".$g['last_name'];?></td>
									<td class="font-danger" style="border-top:0px;">Ordered <?php echo $g['CNT_CUSTOMERS'];?></td>
										<td class="digits" style="border-top:0px;"><?php echo $g['country_code']." ".$g['mobile_number'];?></td>
									
								</tr>
								<?php $i++;} ?>
								</tbody>
							</table>
							
						</div>
						<?PHP } else { ?>
						<div class="alert alert-danger">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>No records  found.
								</div>									
								<?php }?>
					</div>
				</div>
			</div>
			
			
			<div class="col-xl-6 xl-50">
				<div class="card">
					<div class="card-header">
						<h6 style="font-weight: 600;">TOP SUPPLIER REPORT</h6>
						<!--<div class="card-header-right">
						<div class="row">
							<div class="col-6">
								<select class="custom-select" name="subcategory_id" id="subcategory_id">
                                                 <option value="0">--Grocery--</option>  </select>
							</div>
							<div class="col-6">
								<select class="custom-select" name="subcategory_id" id="subcategory_id">
                                                 <option value="0">--Suppliers--</option>  </select>
							</div>
						</div>
						</div>-->
					</div>
					<div class="card-body">
					<?PHP if(isset($getAllSuppliers) && count($getAllSuppliers)>0)
					{ ?>
						<div class="user-status table-responsive latest-order-table">
							<table class="table table-bordernone">
								
								<tbody>
								<?php $i=1;
								foreach($getAllSuppliers as $g) {?>
								<tr>
									<td style="border-top:0px;">#<?php echo $i;?></td>
									<td class="digits" style="border-top:0px;"><?php echo $g['full_name'];?></td>
									<td class="font-danger" style="border-top:0px;">Delivered <strong><?php echo $g['CNT_SUPPLIERS'];?></strong> Products</td>
									
								</tr>
								<?php $i++;} ?>
								</tbody>
							</table>
							
						</div>
					<?PHP } else { ?>
						<div class="alert alert-danger">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>No records  found.
								</div>									
								<?php }?>
					</div>
				</div>
			</div>
			
			
			
			
			
			
			
			

		</div>
	</div>
	<!-- Container-fluid Ends-->

</div>

