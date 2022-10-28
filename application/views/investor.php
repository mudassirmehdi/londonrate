    <div class="bread-main">
    	<!-- Navbar Start -->
		  <?php require 'main-navbar.php'; ?>
	    <!-- Navbar End -->

	    <div class="bread-content container">
	    	<div class="row align-items-center">
	    		<div class="col-md-12">
	    			<nav aria-label="breadcrumb">
					  <ol class="breadcrumb">
					    <li class="breadcrumb-item"><a href="<?php echo base_url('/');?>">Home</a></li>
					    <li class="breadcrumb-item active">Investors Page</li>
					  </ol>
					</nav>

	    			<h1>For Investors</h1>

	    		</div>
	    	</div>

	    </div>
    </div>

    <main class="main-padding">
     	<div class="container">
     		<div class="row">
     			<div class="col-md-12">
     				<p class="fw-bold mb-5">Please fill the form and we will send to you Pitch Deck presentation about London-Rate project  with description of investment opportunities</p>
     			</div>

     			<div class="col-md-6 mb-5 mb-md-0">
     				<img src="<?php echo base_url('templates/frontend/');?>images/investor-img.png" class="img-fluid">
     			</div>

     			<div class="col-md-6 mb-5 mb-md-0">
     				<form action="" method="" class="investor-form">
     					<div class="row">
     						<div class="col-md-6 mb-4">
     							<div class="form-group">
     								<input type="text" name="name" placeholder="Name Lastname" class="form-control text-center">
     							</div>
     						</div>

     						<div class="col-md-6 mb-4">
     							<div class="form-group">
     								<input type="text" name="phone" placeholder="Phone" class="form-control text-center">
     							</div>
     						</div>

     						<div class="col-md-12 mb-4">
     							<div class="input-group mb-3">
								  <span class="input-group-text" id="basic-addon1">
								  	<img src="<?php echo base_url('templates/frontend/');?>images/icons/world-icon.svg">
								  </span>
								  <input type="email" class="form-control text-center" placeholder="e-mail" aria-label="Username" aria-describedby="basic-addon1">
								</div>

     						</div>

     						<div class="col-md-12">
     							<button class="investor-form-btn" type="submit">Send</button>
     						</div>
     					</div>
     				</form>
     			</div>
     		</div>
     	</div>
     </main>