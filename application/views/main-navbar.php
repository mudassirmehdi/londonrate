<!-- Navbar Start -->
		   <nav class="navbar navbar-expand-lg py-4">
			  <div class="container">
			    <a class="navbar-brand" href="<?php echo base_url('/');?>">
			    	<img src="<?php echo base_url('templates/frontend/');?>images/logo-dark.png" >
			    </a>
			    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			      <!-- <span class="navbar-toggler-icon"></span> -->
			      <img src="<?php echo base_url('templates/frontend/');?>images/icons/menu-icon.svg">
			    </button>
			    <div class="collapse navbar-collapse " id="navbarSupportedContent">
			      <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
			        <li class="nav-item active">
			          <span class="nav-count">01.</span>
			          <a class="nav-link " href="<?php echo base_url('/');?>">Home</a>
			        </li>
			        <li class="nav-item">
			          <span class="nav-count">02.</span>
			          <a class="nav-link" href="<?php echo base_url('home/about');?>">About</a>
			        </li>

			         <li class="nav-item">
			          <span class="nav-count">03.</span>
			          <a class="nav-link" href="<?php echo base_url('ip/valuation');?>">Why Us</a>
			        </li>

			        <li class="nav-item">
			          <span class="nav-count">04.</span>
			          <a class="nav-link" href="<?php echo base_url('home/partnership');?>">Partnership</a>
			        </li>

			        <li class="nav-item">
			          <span class="nav-count">05.</span>
			          <a class="nav-link" href="<?php echo base_url('home/risk');?>">Risk Analysis</a>
			        </li>

			        <li class="nav-item">
			          <span class="nav-count">06.</span>
			          <a class="nav-link" href="<?php echo base_url('home/startup');?>">Startups Rating</a>
			        </li>

			        <li class="nav-item">
			          <span class="nav-count">07.</span>
			          <a class="nav-link" href="<?php echo base_url('home/contact');?>">Contact</a>
			        </li>

			        <li class="nav-item">
			          <div class="d-flex">
			          	<span class="nav-count">08.</span>
			          	<span class="new-badge">New</span>
			          </div>
			          <a class="nav-link" href="<?php echo base_url('home/ipsh');?>">IP-Shares Market</a>
			        </li>
			       
			      </ul>
			      <div class="d-flex align-items-center nav-btn-group" >

			      	<?php if($this->session->userdata('london_logged_in')){?>
						<div class="dropdown">
							  <a class="user-link dropdown-toggle" href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							    <img src="<?php echo base_url('templates/frontend/');?>images/icons/user.svg">
							  </a>

							  <ul class="dropdown-menu">
							    <li><a class="dropdown-item" href="<?php echo base_url('user/updateprofile');?>">Update Profile</a></li>
							    <li><a class="dropdown-item" href="<?php echo base_url('user/mypackage');?>">My Packages</a></li>
							    <li><a class="dropdown-item" href="<?php echo base_url('user/logout');?>">Logout</a></li>
							  </ul>
						 </div>
					<?php } else {?>
						<a href="#"  data-bs-toggle="modal" data-bs-target="#loginModal" class="user-link">
				           <img src="<?php echo base_url('templates/frontend/');?>images/icons/user.svg">
				        </a>
					<?php } ?> 

			          <a href="#valuation-services" class="btn-nav d-flex justify-content-between">
			          	<img src="<?php echo base_url('templates/frontend/');?>images/icons/nav-btn-2.svg">
			          </a>
			      </div>
			    </div>
			  </div>
			</nav>
	    <!-- Navbar End -->