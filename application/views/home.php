 <div class="hero-main">
        <!-- Navbar Start -->
            <?php require 'main-navbar.php'; ?>
        <!-- Navbar End -->

        <div class="hero-content container">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <h6 class="tagline">Sit back & relax, we help you:</h6>
                    <h1>Determine your true value</h1>
                    <p>Innovative Fintech Aggregator that allows Entrepreneurs to get additional Financial Benefits through Valuation and Monetization of their Intellectual Property</p>

                    <div class="hero-actions d-flex align-items-center flex-wrap">
                        <a href="#" class="btn-hero btn-lg mb-md-0 mb-4">Order Valuation</a>
                        <div class="mb-md-0 mb-4">
                            <h6>Get Support</h6>
                            <h5>+(123) 45 678 90</h5>
                        </div>
                    </div>

                </div>
                <div class="col-md-5">
                    <div class="hero-content-img">
                        <a href="#"><img src="<?php echo base_url('templates/frontend/');?>images/icons/play-icon.svg" class="play-icon"></a>
                        <img src="<?php echo base_url('templates/frontend/');?>images/hero-img.png" class="img-fluid  main-img mt-md-0 mt-5">
                    </div>
                </div>
            </div>

        </div>
    </div>

    <section class="notification-section section-padding pb-0" id="notification">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <div class="toast align-items-center" role="alert" aria-live="assertive" aria-atomic="true">
                          <div class="d-flex justify-content-between w-100">
                            <div class="toast-body bg-transparent">
                              By using this website, you agree to our <a href="#">cookie policy.</a>
                            </div>
                            <button type="button" class="btn-dismiss" data-bs-dismiss="toast" aria-label="Close">Close</button>
                          </div>
                        </div>
                </div>
            </div>
        </div>
    </section>

    <section id="about" class="about-section section-padding"> 
          <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mb-4 mb-md-0">
                       <img src="<?php echo base_url('templates/frontend/');?>images/about-img.png" class="img-fluid  w-100">
                </div>

                <div class="col-md-6 mb-4 mb-md-0">
                    <div class="about-content ms-md-4">
                         <span class="tagline d-inline-block">Explore About Us</span>
                         <h3>We can take your business <br> to the next level.</h3>

                         <blockquote>
                                      London Rate is the partner of choice for many of the world’s leading
                    enterprises, SMEs and technology challengers.
                                      <span> <strong>Dr. Sandjar Muminov </strong>- The chairman of the Presidium of the Sandjar Group</span>
                                    </blockquote>

                         <p>We provide the IP community with a visionary approach to calculating and communicating the financial impact of trademarks, copyrights, patents, brands and intangible assets.</p>

                         <a href="#" class="site-btn">Learn More</a>
                    </div>
                </div>
            </div>
          </div>
    </section>


    <section id="services" class="services-section section-padding">
          <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading text-center">
                          <span class="tagline">Our Services</span>
                          <h2>Find Values by IP Type</h2>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-3 mb-4">
                    <div class="services-items text-center">
                        <img src="<?php echo base_url('templates/frontend/');?>images/icons/services-mobile.svg">
                        <h5>Mobile <br> Application</h5>
                        <div class="services-action">
                            <a href="<?php echo base_url('iptype/mobile');?>">Service Details <img class="services-action-icon" src="<?php echo base_url('templates/frontend/');?>images/icons/bi_arrow-right-carousel.svg"></a>

                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-4">
                    <div class="services-items text-center">
                        <img src="<?php echo base_url('templates/frontend/');?>images/icons/services-hand.svg">
                        <h5>Technology <br> Product</h5>
                        <div class="services-action">
                            <a href="<?php echo base_url('iptype/technology');?>">Service Details <img class="services-action-icon" src="<?php echo base_url('templates/frontend/');?>images/icons/bi_arrow-right-carousel.svg"></a>

                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-4">
                    <div class="services-items text-center">
                        <img src="<?php echo base_url('templates/frontend/');?>images/icons/services-brand.svg">
                        <h5>Brand <br> Trademark</h5>
                        <div class="services-action">
                            <a href="<?php echo base_url('iptype/trademark');?>">Service Details <img class="services-action-icon" src="<?php echo base_url('templates/frontend/');?>images/icons/bi_arrow-right-carousel.svg"></a>

                        </div>
                    </div>
                </div>

                 <div class="col-md-3 mb-4">
                    <div class="services-items text-center">
                        <img src="<?php echo base_url('templates/frontend/');?>images/icons/services-paint.svg">
                        <h5>Art Work</h5>
                        <div class="services-action">
                            <a href="<?php echo base_url('iptype/artwork');?>">Service Details <img class="services-action-icon" src="<?php echo base_url('templates/frontend/');?>images/icons/bi_arrow-right-carousel.svg"></a>

                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-4">
                    <div class="services-items text-center">
                        <img src="<?php echo base_url('templates/frontend/');?>images/icons/services-globe.svg">
                        <h5>Web-site Domain</h5>
                        <div class="services-action">
                            <a href="<?php echo base_url('iptype/webdomain');?>">Service Details <img class="services-action-icon" src="<?php echo base_url('templates/frontend/');?>images/icons/bi_arrow-right-carousel.svg"></a>

                        </div>
                    </div>
                </div>



                <div class="col-md-3 mb-4">
                    <div class="services-items text-center">
                        <img src="<?php echo base_url('templates/frontend/');?>images/icons/services-award.svg">
                        <h5>License</h5>
                        <div class="services-action">
                            <a href="<?php echo base_url('iptype/license');?>">Service Details <img class="services-action-icon" src="<?php echo base_url('templates/frontend/');?>images/icons/bi_arrow-right-carousel.svg"></a>

                        </div>
                    </div>
                </div>

               
            </div>
          </div>
    </section>


    <section class="portfolio-section portfolio-padding">
        <div class="container">
              <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="section-heading text-start">
                          <span class="tagline">Case Study</span>
                          <h2>Our latest projects</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                              <div class="carousel-inner">
                                <div class="carousel-item active">

                                    <div class="row align-items-center portfolio-items">
                                        <div class="col-md-6 mb-4 mb-md-0">
                                             <img src="<?php echo base_url('templates/frontend/');?>images/project-1.png" class="d-block w-100 img-fluid " alt="project-1.png">
                                        </div>

                                        <div class="col-md-6  mb-4 mb-md-0">
                                          <div class="ms-md-4">
                                             <h3>IP-Shares Market</h3>
                                             <p>Innovative Business Projects with<br>Verified, Protected and Valued Intellectual Property</p>
                                             <a href="#" class="site-btn">Learn More</a>
                                          </div>    
                                        </div>
                                    </div>
                                 
                                </div>

                                <div class="carousel-item">

                                    <div class="row align-items-center portfolio-items">
                                        <div class="col-md-6 mb-4 mb-md-0">
                                             <img src="<?php echo base_url('templates/frontend/');?>images/project-1.png" class="d-block w-100 img-fluid " alt="project-1.png">
                                        </div>

                                        <div class="col-md-6  mb-4 mb-md-0">
                                          <div class="ms-md-4">
                                            <h3>IP-Shares Market</h3>
                                            <p>Innovative Business Projects with<br>Verified, Protected and Valued Intellectual Property</p>
                                            <a href="#" class="site-btn">Learn More</a>
                                          </div>    
                                        </div>
                                    </div>
                                 
                                </div>

                                <div class="carousel-item">

                                    <div class="row align-items-center portfolio-items">
                                        <div class="col-md-6 mb-4 mb-md-0">
                                             <img src="<?php echo base_url('templates/frontend/');?>images/project-1.png" class="d-block w-100 img-fluid " alt="project-1.png">
                                        </div>

                                        <div class="col-md-6  mb-4 mb-md-0">
                                          <div class="ms-md-4">
                                            <h3>IP-Shares Market</h3>
                                            <p>Innovative Business Projects with<br>Verified, Protected and Valued Intellectual Property</p>
                                            <a href="#" class="site-btn">Learn More</a>
                                          </div>    
                                        </div>
                                    </div>
                                 
                                </div>
                              
                              </div>
                             <div class="carousel-control">
                                 <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span> 
                                    Prev
                                  </button>
                                  |
                                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                    Next
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span> 
                                  </button>
                             </div>
                            </div>
                </div>
            </div>
        </div>
    </section>

    <section class="testimonial-section testimonial-padding " id="testimonial">

        <div class="container trusted-by">
               <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="section-heading mb-0 text-center"> 
                          <h2 class="text-dark">We’ve been trusted by</h2>
                    </div>
                </div>
            </div>

            <div class="logo-container px-md-0 px-3">
                    <div class="row bg-white">
                        <div class="col-lg-3 col-md-4 col-6 py-5 text-center c-logo bt-none bl-none">
                              <img src="<?php echo base_url('templates/frontend/');?>images/client-logo/client-1.svg">
                        </div>

                        <div class="col-lg-3 col-md-4 col-6 py-5 text-center c-logo bt-none">
                              <img src="<?php echo base_url('templates/frontend/');?>images/client-logo/client-2.svg">
                        </div>

                        <div class="col-lg-3 col-md-4 col-6 py-5 text-center c-logo bt-none">
                              <img src="<?php echo base_url('templates/frontend/');?>images/client-logo/client-3.svg">
                        </div>

                        <div class="col-lg-3 col-md-4 col-6 py-5 text-center c-logo bt-none br-none">
                              <img src="<?php echo base_url('templates/frontend/');?>images/client-logo/client-4.svg">
                        </div>

                        <div class="col-lg-3 col-md-4 col-6 py-5 text-center c-logo bt-none bl-none">
                              <img src="<?php echo base_url('templates/frontend/');?>images/client-logo/client-5.svg">
                        </div>

                        <div class="col-lg-3 col-md-4 col-6 py-5 text-center c-logo bt-none">
                              <img src="<?php echo base_url('templates/frontend/');?>images/client-logo/client-6.svg">
                        </div>

                        <div class="col-lg-3 col-md-4 col-6 py-5 text-center c-logo bt-none">
                              <img src="<?php echo base_url('templates/frontend/');?>images/client-logo/client-7.svg">
                        </div>

                        <div class="col-lg-3 col-md-4 col-6 py-5 text-center c-logo bt-none br-none">
                              <img src="<?php echo base_url('templates/frontend/');?>images/client-logo/client-8.svg">
                        </div>
                    </div>
            </div>

          
        </div>


        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mb-5 mb-md-0">
                     <div class="video-thumbnail">
                          <a href="#"><img src="<?php echo base_url('templates/frontend/');?>images/icons/video-play-icon.svg" class="video-play-icon"></a>
                          <img src="<?php echo base_url('templates/frontend/');?>images/video-thumbnail.jpg" class="img-fluid  w-100 rounded">
                     </div>
                </div>

                <div class="col-md-6 mb-5 mb-md-0">
                     <div class="testimonial-content ms-md-5">
                        <span class="tagline">Client Story</span>
                        <h3>Our clients feedback</h3>

                        <div class="testimonial-content-slider">

                            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                                      <div class="carousel-indicators">
                                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                      </div>
                                      <div class="carousel-inner">
                                        <div class="carousel-item active">
                                          <div class="testimonial-content-items">
                                              <div class="row">
                                                <div class="col-12">
                                                    <p class="testi-p">“For us, London Rate offers the best value verification system. Exceptional quality overall, and a super user-friendly system to help you through the steps.”</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="testimonial-client-info d-flex align-items-center">
                                                         <img src="<?php echo base_url('templates/frontend/');?>images/testi-1.png" class="me-3">
                                                         <div class="client-name">
                                                             <h5 class="mb-0">Maria D. Dowson</h5>
                                                             <p class="mb-0">
                                                                CEO, <span>Example Corp Co.</span>
                                                             </p>
                                                         </div>
                                                    </div>
                                                </div>
                                              </div>

                                          </div>
                                        </div>
                                        <div class="carousel-item">
                                          <div class="testimonial-content-items">
                                              <div class="row">
                                                <div class="col-12">
                                                    <p class="testi-p">“For us, London Rate offers the best value verification system. Exceptional quality overall, and a super user-friendly system to help you through the steps.”</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="testimonial-client-info d-flex align-items-center">
                                                         <img src="<?php echo base_url('templates/frontend/');?>images/testi-1.png" class="me-3">
                                                         <div class="client-name">
                                                             <h5 class="mb-0">Maria D. Dowson</h5>
                                                             <p class="mb-0">
                                                                CEO, <span>Example Corp Co.</span>
                                                             </p>
                                                         </div>
                                                    </div>
                                                </div>
                                              </div> 
                                          </div>
                                        </div> 

                                         <div class="carousel-item">
                                          <div class="testimonial-content-items">
                                              <div class="row">
                                                <div class="col-12">
                                                    <p class="testi-p">“For us, London Rate offers the best value verification system. Exceptional quality overall, and a super user-friendly system to help you through the steps.”</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="testimonial-client-info d-flex align-items-center">
                                                         <img src="<?php echo base_url('templates/frontend/');?>images/testi-1.png" class="me-3">
                                                         <div class="client-name">
                                                             <h5 class="mb-0">Maria D. Dowson</h5>
                                                             <p class="mb-0">
                                                                CEO, <span>Example Corp Co.</span>
                                                             </p>
                                                         </div>
                                                    </div>
                                                </div>
                                              </div> 
                                          </div>
                                        </div>
                                      </div> 
                                    </div>
                        </div>
                     </div>
                </div>
            </div>
        </div>
    </section>


    <section class="pricing-section section-padding" id="pricing">
        <div class="container">
             <div class="row">
                <div class="col-md-12">
                    <div class="section-heading text-center">
                          <span class="tagline">Start</span>
                          <h2>Flexible pricing options</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-5 mb-md-0">
                    <div class="pricing-card">
                         <div class="top-card text-center">
                             <h4>Free Samples <br> of Documents</h4>

                             <a href="#" class="pricing-card-btn"> Get it Now </a>
                         </div>
                         <div class="bottom-card">
                              <ul class="unstyled_list ps-0 row">
                                <li class="col-md-11">Applications for trademarks, patent or copyright registrations</li>
                                <div class="col-md-1 text-center"><img src="<?php echo base_url('templates/frontend/');?>images/icons/check-icon.svg"></div>
                                            <li class="col-md-11">Pitch decks templates for startups, projects, business plans,invest.memo</li>
                                            <div class="col-md-1 text-center"><img src="<?php echo base_url('templates/frontend/');?>images/icons/check-icon.svg"></div>
                                            <li class="col-md-11">Documents for valuation, capitalization and investmentsattraction</li>
                                            <div class="col-md-1 text-center"><img src="<?php echo base_url('templates/frontend/');?>images/icons/check-icon.svg"></div>
                              </ul>
                         </div>
                    </div>
                </div>

                <div class="col-md-4 mb-5 mb-md-0">
                    <div class="pricing-card active-card">
                         <div class="top-card text-center">
                             <h4>Make An Order <br> For Expert Services</h4>

                             <a href="#" class="pricing-card-btn"> Get it Now </a>
                         </div>
                         <div class="bottom-card">
                              <ul class="unstyled_list ps-0 row">
                                <li class="col-md-11">Applications for trademarks, patent or copyright registrations</li>
                                <div class="col-md-1 text-center"><img src="<?php echo base_url('templates/frontend/');?>images/icons/check-icon.svg"></div>
                                            <li class="col-md-11">Pitch decks templates for startups, projects, business plans,invest.memo</li>
                                            <div class="col-md-1 text-center"><img src="<?php echo base_url('templates/frontend/');?>images/icons/check-icon.svg"></div>
                                            <li class="col-md-11">Documents for valuation, capitalization and investmentsattraction</li>
                                            <div class="col-md-1 text-center"><img src="<?php echo base_url('templates/frontend/');?>images/icons/check-icon.svg"></div>
                              </ul>
                         </div>
                    </div>
                </div>

                <div class="col-md-4 mb-5 mb-md-0">
                    <div class="pricing-card">
                         <div class="top-card text-center">
                             <h4>Free Consultation <br> Of Experts (Online)</h4>

                             <a href="#" class="pricing-card-btn "> Get it Now </a>
                         </div>
                         <div class="bottom-card">
                              <ul class="unstyled_list ps-0 row">
                                <li class="col-md-11">Applications for trademarks, patent or copyright registrations</li>
                                <div class="col-md-1 text-center"><img src="<?php echo base_url('templates/frontend/');?>images/icons/check-icon.svg"></div>
                                            <li class="col-md-11">Pitch decks templates for startups, projects, business plans,invest.memo</li>
                                            <div class="col-md-1 text-center"><img src="<?php echo base_url('templates/frontend/');?>images/icons/check-icon.svg"></div>
                                            <li class="col-md-11">Documents for valuation, capitalization and investmentsattraction</li>
                                            <div class="col-md-1 text-center"><img src="<?php echo base_url('templates/frontend/');?>images/icons/check-icon.svg"></div>
                              </ul>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="team-section section-padding ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-7 ">
                    <div class="section-heading text-md-start text-center">
                          <span class="tagline">Team</span>
                          <h2>Our experts team</h2>
                    </div>
                </div>

                <div class="col-md-5  text-md-end text-center mb-5 mb-md-0">
                    <a href="#" class="section-heading-btn">Join our Team</a>
                </div>
            </div>

            <div class="row justify-content-center mt-2">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-4 mb-5">
                            <div class="team-card">
                                  <div class="text-center team-img">
                                    <img src="<?php echo base_url('templates/frontend/');?>images/team-1.png" class="img-fluid ">
                                  </div>
                                  <p>The chairman of the Presidium of the Sandjar Group</p>
                                  <h5>Dr. Sandjar Muminov</h5>
                            </div>
                            <div class="team-social">
                                 <a href="#" class="mx-2"><img src="<?php echo base_url('templates/frontend/');?>images/icons/bi_facebook.svg"></a>
                                 <a href="#" class="mx-2"><img src="<?php echo base_url('templates/frontend/');?>images/icons/bi_twitter.svg"></a>
                                 <a href="#" class="mx-2"><img src="<?php echo base_url('templates/frontend/');?>images/icons/bi_linkedin.svg"></a>
                            </div>
                        </div>

                        <div class="col-md-4 mb-5">
                            <div class="team-card">
                                  <div class="text-center team-img">
                                    <img src="<?php echo base_url('templates/frontend/');?>images/team-2.png" class="img-fluid ">
                                  </div>
                                  <p>Head of legal team Sandjar Group</p>
                                  <h5>Sherzod Muminov</h5>
                            </div>
                            <div class="team-social">
                                 <a href="#" class="mx-2"><img src="<?php echo base_url('templates/frontend/');?>images/icons/bi_facebook.svg"></a>
                                 <a href="#" class="mx-2"><img src="<?php echo base_url('templates/frontend/');?>images/icons/bi_twitter.svg"></a>
                                 <a href="#" class="mx-2"><img src="<?php echo base_url('templates/frontend/');?>images/icons/bi_linkedin.svg"></a>
                            </div>
                        </div>

                        <div class="col-md-4 mb-5">
                            <div class="team-card">
                                  <div class="text-center team-img">
                                    <img src="<?php echo base_url('templates/frontend/');?>images/team-3.png" class="img-fluid ">
                                  </div>
                                  <p>Managing Partner</p>
                                  <h5>Ilyas Madimov</h5>
                            </div>
                            <div class="team-social">
                                 <a href="#" class="mx-2"><img src="<?php echo base_url('templates/frontend/');?>images/icons/bi_facebook.svg"></a>
                                 <a href="#" class="mx-2"><img src="<?php echo base_url('templates/frontend/');?>images/icons/bi_twitter.svg"></a>
                                 <a href="#" class="mx-2"><img src="<?php echo base_url('templates/frontend/');?>images/icons/bi_linkedin.svg"></a>
                            </div>
                        </div>

                        <div class="col-md-4 mb-5">
                            <div class="team-card">
                                  <div class="text-center team-img">
                                    <img src="<?php echo base_url('templates/frontend/');?>images/team-4.png" class="img-fluid ">
                                  </div>
                                  <p>Marketing & PR</p>
                                  <h5>Michelle Sandajan</h5>
                            </div>
                            <div class="team-social">
                                 <a href="#" class="mx-2"><img src="<?php echo base_url('templates/frontend/');?>images/icons/bi_facebook.svg"></a>
                                 <a href="#" class="mx-2"><img src="<?php echo base_url('templates/frontend/');?>images/icons/bi_twitter.svg"></a>
                                 <a href="#" class="mx-2"><img src="<?php echo base_url('templates/frontend/');?>images/icons/bi_linkedin.svg"></a>
                            </div>
                        </div>

                        <div class="col-md-4 mb-5">
                            <div class="team-card">
                                  <div class="text-center team-img">
                                    <img src="<?php echo base_url('templates/frontend/');?>images/team-5.png" class="img-fluid ">
                                  </div>
                                  <p>IT Manager</p>
                                  <h5>Sardor Utabekov</h5>
                            </div>
                            <div class="team-social">
                                 <a href="#" class="mx-2"><img src="<?php echo base_url('templates/frontend/');?>images/icons/bi_facebook.svg"></a>
                                 <a href="#" class="mx-2"><img src="<?php echo base_url('templates/frontend/');?>images/icons/bi_twitter.svg"></a>
                                 <a href="#" class="mx-2"><img src="<?php echo base_url('templates/frontend/');?>images/icons/bi_linkedin.svg"></a>
                            </div>
                        </div>

                        <div class="col-md-4 mb-5">
                            <div class="team-card">
                                  <div class="text-center team-img">
                                    <img src="<?php echo base_url('templates/frontend/');?>images/team-6.png" class="img-fluid ">
                                  </div>
                                  <p>Project Manager of London-Rate</p>
                                  <h5>Shavkat Narkulov</h5>
                            </div>
                            <div class="team-social">
                                 <a href="#" class="mx-2"><img src="<?php echo base_url('templates/frontend/');?>images/icons/bi_facebook.svg"></a>
                                 <a href="#" class="mx-2"><img src="<?php echo base_url('templates/frontend/');?>images/icons/bi_twitter.svg"></a>
                                 <a href="#" class="mx-2"><img src="<?php echo base_url('templates/frontend/');?>images/icons/bi_linkedin.svg"></a>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="call-to-action section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                       <div class="call-to-action-content text-center">
                            <img src="<?php echo base_url('templates/frontend/');?>images/logo-footer.png">
                            <h2>World’s Leading <br> IP Valuation Service.</h2>

                            <div class="call-to-action-btn-group flex-wrap flex-md-nowrap gap-md-0 gap-4">
                                <a href="#" class="action-btn bg-green"> Get A Quote <img src="<?php echo base_url('templates/frontend/');?>images/icons/bi_arrow-left-white.svg"> </a>
                                <a href="#" class="action-btn bg-dark"> Our Services </a>
                            </div>
                       </div>
                </div>
            </div>
        </div>
    </section>

    <div class="three-section-bg">


        <?php if(isset($packagedata) && count($packagedata)>0) {?>

        <section class="certificate-section section-padding" id="valuation-services">
            <div class="container">
                 <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="section-heading text-center">
                              <span class="tagline">Start now</span>
                              <h2>Valuation Services Packages</h2>
                        </div>
                    </div> 
                </div>


                <form name="frm_london_home" id="frm_london_home" method="post">

                <div class="row">
                    <div class="col-md-4 px-md-4 mb-md-0 mb-5">
                        <div class="certificate-item">
                             
                             <a href="<?php echo base_url('uploads/');?>services-packages/Healerr-Universal.pdf" target="_blank">
                                 <img src="<?php echo base_url('templates/frontend/');?>images/certificate-1.png" class="img-fluid w-100">
                             </a>

                             <div class="certificate-item-info">
                                  <h5><?php echo ucfirst($packagedata[0]['package_name']);?></h5>
                                  <div class="certificate-price">
                                    Free
                                  </div>
                             </div>

                             <input type="hidden" name="txt_service_package1" id="txt_service_package1" value="universal" />

                             <button class="button certificate-item-action" name="btn_service_packages1" id="btn_service_packages1">
                                  <h5>Start Now</h5>
                                  <img src="<?php echo base_url('templates/frontend/');?>images/icons/bi_arrow-left.svg">
                             </button>

                        </div>
                    </div>

                    <div class="col-md-4 px-md-4 mb-md-0 mb-5">
                        <div class="certificate-item">
                             <a href="<?php echo base_url('uploads/');?>services-packages/Healerr-Validation-26-03.pdf" target="_blank">
                                <img src="<?php echo base_url('templates/frontend/');?>images/certificate-2.png" class="img-fluid w-100">
                             </a>

                             <div class="certificate-item-info">
                                  <h5><?php echo ucfirst($packagedata[1]['package_name']);?></h5>
                                  <div class="certificate-price">
                                    £ <?php echo $packagedata[1]['amount'];?>
                                  </div>
                             </div>

                             <input type="hidden" name="txt_service_package" id="txt_service_package" value="validation" />
                             <button class="button certificate-item-action" name="btn_service_packages" id="btn_service_packages">
                                  <h5>Start Now</h5>
                                  <img src="<?php echo base_url('templates/frontend/');?>images/icons/bi_arrow-left.svg">
                             </button>

                        </div>
                    </div>

                    <div class="col-md-4 px-md-4 mb-md-0 mb-5">
                        <div class="certificate-item">
                             
                            <a href="<?php echo base_url('uploads/');?>services-packages/Healerr-Verification.pdf" target="_blank">
                                 <img src="<?php echo base_url('templates/frontend/');?>images/certificate-3.png" class="img-fluid w-100">
                            </a>

                             <div class="certificate-item-info">
                                  <h5><?php echo ucfirst($packagedata[2]['package_name']);?></h5>
                                  <div class="certificate-price">
                                    £ <?php echo $packagedata[2]['amount'];?>
                                  </div>
                             </div>

                             <input type="hidden" name="txt_service_package2" id="txt_service_package2" value="verification" />
                             <button class="certificate-item-action button" name="btn_service_packages2" id="btn_service_packages2">
                                  <h5>Start Now</h5>
                                  <img src="<?php echo base_url('templates/frontend/');?>images/icons/bi_arrow-left.svg">
                             </button>

                        </div>
                    </div>
                </div>
                </form>
            </div>
        </section>

        <?php } ?>


        <section class="our-mission-section section-padding pt-5">
             <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="section-heading text-center">
                                  <span class="tagline">About</span>
                                  <h2>Our mission</h2>
                            </div>
                        </div> 
                    </div>

                    <div class="row align-items-center">
                        <div class="col-md-5">
                            <img src="<?php echo base_url('templates/frontend/');?>images/mission-img.png" class="w-100 img-fluid">
                        </div>
                        <div class="col-md-7">
                            <p class="mb-0 mission-paragraph">
                                We provide the IP community with a visionary approach to calculating and 
                                        communicating the financial impact of trademarks, copyrights, patents, 
                                        brands and intangible assets. As a pioneer in the IP Community, we also 
                                        deliver IP infringement damages calculations and IP strategic advisory 
                                        services. We work with entrepreneurs, corporations, legal counsel and IP 
                                        owners to analyze and maximize the value of IP assets. It would be difficult 
                                        to name an industry where we have not served or have not appraised an 
                                        IP-asset, nor a valuation service  <br>
                                        we have not provided.

                                        <img src="<?php echo base_url('templates/frontend/');?>images/signature.png" class="signature-img">
                                    </p>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-md-3 mb-5 mb-md-0">
                            <div class="mission-items">
                                <h4>01. Innovation</h4>
                                <p class="mb-0">Drive innovation through smart management of intellectual property.</p>

                                <div class="mission-items-icon">
                                    <img src="<?php echo base_url('templates/frontend/');?>images/icons/bi_arrow-right-carousel.svg">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 mb-5 mb-md-0">
                            <div class="mission-items">
                                <h4>02. Growth</h4>
                                <p class="mb-0">Implement vision and exceed goals in todays competitive markets.</p>

                                <div class="mission-items-icon">
                                    <img src="<?php echo base_url('templates/frontend/');?>images/icons/bi_arrow-right-carousel.svg">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 mb-5 mb-md-0">
                            <div class="mission-items">
                                <h4>03. Trust</h4>
                                <p class="mb-0">Rely on expert advisory based on working methodologies and data driven analysis.</p>

                                <div class="mission-items-icon">
                                    <img src="<?php echo base_url('templates/frontend/');?>images/icons/bi_arrow-right-carousel.svg">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 mb-5 mb-md-0">
                            <div class="mission-items">
                                <h4>04. Global</h4>
                                <p class="mb-0">Our insights and approaches to connect technologies and markets across the world.</p>

                                <div class="mission-items-icon">
                                    <img src="<?php echo base_url('templates/frontend/');?>images/icons/bi_arrow-right-carousel.svg">
                                </div>
                            </div>
                        </div>
                    </div>
             </div>
        </section>

      </div>


      <section class="faqs-section section-padding">
        <div class="container">
               <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="section-heading text-center">
                                  <h2>Frequently Asked Questions</h2>
                            </div>
                        </div> 
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                        <div class="faqs-section-accordion accordion" id="accordionExample">
                                      <div class="accordion-item mb-4">
                                        <h2 class="accordion-header" id="headingOne">
                                          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            What possible benefits will I get from assessing my IP?
                                          </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                          <div class="accordion-body">
                                            <p>
                                                The common benefits that you can gain from IP-valuation are: <br>
                                                to determine the value of the contribution to the authorized capital and/ or in case of sales <br>
                                                purchase transactions, M&A, licensing & franchising to establish the value of your IP or the value of right assignments;<br>
                                                to optimize taxes as in many countries worldwide taxation system allows certain <br>
                                                 preferences and taxation reliefs for intellectual property assets transactions;
                                                to attract investments due to evaluated IP-Portfolio;<br>
                                            </p>
                                          </div>
                                        </div>
                                      </div>

                                      <div class="accordion-item mb-4">
                                        <h2 class="accordion-header" id="headingTwo">
                                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            What are the main differences between 3 valuation packages presented here?
                                          </button>
                                        </h2>
                                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                          <div class="accordion-body">
                                            <p>The key differences between the packages lay in the sense of practical usage
                                            of the issued valuation.</p>
                                        <p>If the basic automatically generated free valuation (Universal Package)
                                            provides you general understanding of value
                                            of IP-assets, but with the least practical usage (you can have it for your
                                            own acknowledgment and use it internally
                                            in your own company).</p>
                                        <p>Other two valuation packages have serious distinctions in the practical use
                                            and recognition by legal entities (for
                                            the valuation package Validation), and by legal entities and official
                                            authorities, state courts (for valuation
                                            package Verification).</p>
                                        <p>You can find more about IP-valuation packages <a href="https://londonrate.csns.in/home/validation_desc" style="color:#1890ff;">here</a></p>
                                          </div>
                                        </div>
                                      </div>

                                      <div class="accordion-item mb-4">
                                        <h2 class="accordion-header" id="headingThree">
                                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            How does the procedure work if I have chosen the highest valuation package - Verification?
                                          </button>
                                        </h2>
                                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                          <div class="accordion-body">
                                            <p>First step is to fill in the enquiry form provided on our website where you
                                            have to put your personal details.</p>
                                        <p>Shortly, one of our experts contact you for clarification of necessary
                                            details to understand your current status of
                                            IP and ask you to submit certain documentation to carry out IP-Valuation.
                                        </p>
                                        <p>List of documents submitted for examination and evaluation may vary from case
                                            to case depending on the purposes that
                                            must be achieved by the carried out evaluation.</p>
                                          </div>
                                        </div>
                                      </div>
 

                                       <div class="accordion-item mb-4">
                                        <h2 class="accordion-header" id="headingFive">
                                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                            Do I need to pass the mandatory KYC procedure?
                                          </button>
                                        </h2>
                                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                          <div class="accordion-body">
                                            <p>The KYC procedure is not a mandatory step if you select the option of
                                            valuation package - Universal.</p>
                                        <p>However, if you are going to proceed with the valuation packages - Validation
                                            &amp; Verification - KYC procedure is a
                                            mandatory requirement stipulated by London Rate internal compliance
                                            reglaments.</p>
                                        <p>KYC usually refers to the process of verifying the identity of our customers,
                                            either before or during the time that
                                            they start doing business with London Rate.</p>
                                        <p>From our side, we assure that all personal information received by us during
                                            business dealings is kept in
                                            confidential and duly-preserved manner.</p>
                                          </div>
                                        </div>
                                      </div>

                                       <div class="accordion-item mb-4">
                                        <h2 class="accordion-header" id="headingSix">
                                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                            Where is the guarantee that I can later use the valuation issued by London Rate in some state bodies?

                                          </button>
                                        </h2>
                                        <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                                          <div class="accordion-body">
                                             <p>It is worth mentioning that not all the packages allow you to present a
                                            valuation report in front of official
                                            bodies. The valuation packages like Universal &amp; Validation do not
                                            provide this feature.</p>
                                        <p>However, the valuation package - Verification allows you to submit the report
                                            in front of any interested official
                                            body. The guarantee is presented that each Verification valuation report is
                                            signed by a licensed independent
                                            appraiser who bears full responsibility with his/her professional appraisers
                                            licence.</p>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                    </div>
                  </div>
        </div>
      </section>

      <section class="section-padding download-app pt-2">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="app-download-content text-center">
                        <h2>Get LondonRate App</h2>
                        <p>Londonrate is available for free on the App Store and Google Play.</p>

                        <div class="app-logo">
                            <a href="#" class="mx-4"><img src="<?php echo base_url('templates/frontend/');?>images/app-store-logo.png" class="mb-4 mb-md-0"></a>
                            <a href="#" class="mx-4"><img src="<?php echo base_url('templates/frontend/');?>images/play-store-logo.png" class="mb-4 mb-md-0"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </section>


      <script type="text/javascript">
    function getpopoup(cnt)
    {
            if(cnt==1)
            {
                document.getElementById('txt_status').value="FREE SAMPLES OF DOCUMENTS";
                $("#idheade").html('FREE SAMPLES OF DOCUMENTS');
            }
            else if(cnt==2)
            {
                document.getElementById('txt_status').value="MAKE AN ORDER FOR EXPERT SERVICES";
                $("#idheade").html('MAKE AN ORDER FOR EXPERT SERVICES');
            }
            else
            {
                document.getElementById('txt_status').value="FREE CONSULTATION OF EXPERTS (ONLINE)";
                $("#idheade").html('FREE CONSULTATION OF EXPERTS (ONLINE)');
            }
            $('#myModal').modal('show');
    }
    //sender address
function chk_validation()
{
    var txt_name=$("#txt_name").val();
    var txtemail=$("#txtemail").val();
    var txt_mobile=$("#txt_mobile").val();
    var txt_status=$("#txt_status").val();

    
    var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    //alert(sender_country);
    var flag=1;
    $("#err_txt_name").html('');
    $("#err_txtemail").html('');
    $("#err_txt_mobile").html('');

    
    /*alert(sel_productType);*/

    

    if(txt_name=="")
    {
        $("#err_txt_name").html('Please enter name.');
        flag=0;
    }
    if(txtemail=="")
    {
        $("#err_txtemail").html('Please enter email.');
        flag=0;
    }
    if (txtemail!="" && !testEmail.test(txtemail))
    {
        $("#err_txtemail").html('Enter valid email address.');
        flag=0;
    }
    if(txt_mobile=="")
    {
        $("#err_txt_mobile").html("Please enter mobile number.");
        flag=0;
    }
    if(txt_mobile!="" && isNaN(txt_mobile))
    {
        $("#err_txt_mobile").html('Enter valid mobile number.');
        flag=0;
    }
    if(flag==1)
    {
        $('#idspin').show();
        $.ajax({
                              type:"POST",
                              url:"<?php echo base_url();?>Home/send_mail",
                               data:{
                                       txt_name:txt_name,
                                       txt_status:txt_status,
                                       txt_mobile:txt_mobile,
                                       txtemail:txtemail,
                                       
                                     }              
                                }).done(function(message){
                                var res=message.split('_|_');
                                $('#idspin').hide();
                                $('#div_success').show();
                                 $('#frm_addslider').hide();
                                //$('#div_success').hide(5000);
                                //$('myModal').modal('hide');
                                setTimeout(function() {$('#myModal').modal('hide');}, 5000);
                                $("#txt_name").val("");
                                $("#txtemail").val("");
                                $("#txt_mobile").val("");
                                //$("#txt_status").val();

              
                               });
            return true;
    }
    else
    {
        return false;
                
    }
}

</script>


      