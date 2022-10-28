    <section class="questionnaire" style="min-height:430px;">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h2 class="mb-0">My Packages</h2>
                        </div>
                        <br/>
                        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="margin: 0 auto; padding:0 15px; padding-left:0;">

		<!-- START HEADER/BANNER -->
		<tr>
			
				
			<td>
				<table  width="100%" border="0" valign="top" cellpadding="0" cellspacing="0">
					<tr>
						<td align="center">
						<?php if(isset($mypacklist) && count($mypacklist)>0){
							$i=1;
							?>
						<table width="950"  border="1" align="center" cellpadding="0" cellspacing="0" >
							<tr>
									<td width="5%" style="padding: 10px; color: #fff; font-size: 18px; font-weight: bold; background-color:#0a2f53; ">#</td>
									<td width="12%" style="padding: 10px; color: #fff; font-size: 18px; font-weight: bold; background-color:#0a2f53;">Order No</td>
									<td width="12%" style="padding: 10px; color: #fff; font-size: 18px; font-weight: bold; background-color:#0a2f53;">Package Name</td>
									<td width="30%" style="padding: 10px; color: #fff; font-size: 18px; font-weight: bold;text-align: center; background-color:#0a2f53;">Company</td>
									<td width="20%" style="padding: 10px; color: #fff; font-size: 18px; font-weight: bold; text-align: center; background-color:#0a2f53;">Business Type</td>
									<td width="15%" style="padding: 10px; color: #fff; font-size: 18px; font-weight: bold; text-align: center;background-color:#0a2f53;">Order Date</td>
									<td width="10%" style="padding: 10px; color: #fff; font-size: 18px; font-weight: bold; text-align: center;background-color:#0a2f53;">Download</td>
								</tr>
							<?php foreach($mypacklist as $my){ ?>
								<tr>
									<td width="5%" style="padding: 10px; color: #000; font-size: 18px; font-weight: bold;"><?php echo $i;?></td>
									<td width="12%" style="padding: 10px; color: #53718d; font-size: 18px; font-weight: bold;"><?php echo $my['order_no'];?></td>
									<td width="12%" style="padding: 10px; color: #53718d; font-size: 18px; font-weight: bold;"><?php echo ucfirst($my['package_name']);?></td>
									<td width="30%" style="padding: 10px; color: #000; font-size: 18px; font-weight: bold;"><?php echo $my['company_name'];?></td>
									<td width="20%" style="padding: 10px; color: #53718d; font-size: 18px; font-weight: bold;"><?php echo $my['business_type'];?></td>
									<td width="15%" style="padding: 10px; color: #000; font-size: 18px; font-weight: bold;"><?php echo date('M, d Y H:i:s',strtotime($my['addeddate']));?></td>
									<td width="10%" style="padding: 10px; color: #000; font-size: 18px; font-weight: bold;"><?php if($my['package_pdf']!="" && $my['package_name']=='universal') {?><a href="<?php echo base_url();?>uploads/5f0871ad51b324d6756af4daeb0537cb/<?php echo $my['package_pdf'];?>" download >Download</a><?php } else { echo '-';}?></td>
								</tr>
							<?php $i++; } ?>


							</table>
						<?php } else { ?> 
						<div class="alert alert-danger">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							Sorry! No packages available.
						</div>
						<?php }?>
						</td>
					</tr>

					<!-- END WHAT WE DO -->

					<tr> <td><br/></td>
					</tr>
				</table>
			</td>
		</tr>
	</table>	
                    </div>
                </div>
            </div>
        </section>
    