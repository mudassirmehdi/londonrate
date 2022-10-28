
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
                        <li class="breadcrumb-item active">Services</li>
                      </ol>
                    </nav>

                    <h1>Request <?php echo $session_package_name;?> Certificate</h1>

                </div>
            </div>

        </div>
    </div>

		<section class="questionnaire form-wizard-section section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 mx-auto">
                
                        <div class="wizard">
                            <div class="wizard-inner">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active">
                                        <a href="<?php echo base_url();?>Questionnaire/universal" data-toggle="tab" aria-controls="step1" role="tab"
                                            aria-expanded="true"><span class="round-tab">1 </span><i>Applicant
                                                information</i></a>
                                    </li>
                                    <li role="presentation" class="active">
                                        <a href="<?php echo base_url();?>Questionnaire/companyinformation" data-toggle="tab" aria-controls="step2" role="tab"
                                            aria-expanded="false"><span class="round-tab">2</span><i>Company
                                                information</i></a>
                                    </li>
                                    <li role="presentation" class="active">
                                        <a href="<?php echo base_url();?>Questionnaire/ipworkinformation" data-toggle="tab" aria-controls="step3" role="tab"><span
                                                class="round-tab">3</span><i>IP-work information</i></a>
                                    </li>
                                    <li role="presentation" class="active">
                                        <a href="javascript:void(0);" data-toggle="tab" aria-controls="step4" role="tab"><span
                                                class="round-tab">4</span><i>Additional information</i></a>
                                    </li>
                                </ul>
                            </div>
                            <form role="form" name="frm_questionnaire_universal4" id="frm_questionnaire_universal4" class="login-box" method="post" >
                                <div class="tab-content" id="main_form">
                                    
                                    
                                    <div class="tab-pane active" role="tabpanel" id="step4">
                                        <h4 class="text-left fs-title">Additional information</h4>
                                        <div class="form-card">
                                            <div class="form-group row align-items-center mb-4">
                                                <div class="col-md-4 text-start">
                                                    <label class="form-label">Currency *</label>
                                                </div>
                                                <div class="col-md-8">
                                                     <select class="form-control" name="currency" id="currency">
                                                        <option value="usd">USD</option>
                                                     </select>
                                                     <span id="err_currency" class="error_class"></span>
                                                </div>
                                               
                                            </div>
                                            <div class="form-group row align-items-center mb-4">
                                                <div class="col-md-4 text-start">
                                                     <label class="form-label">Average monthly sales *</label>
                                                </div>
                                               
                                                <!-- <input type="hidden" name="average_sales_hidden" id="average_sales_hidden"> -->
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" name="average_sales" id="average_sales" onkeyup="getComma_average_sales('average_sales')" />
                                                <span id="err_average_sales" class="error_class"></span>
                                                </div>
                                                
                                            </div>
                                            <div class="form-group row align-items-center mb-4">
                                                <div class="col-md-4 text-start">
                                                    <label class="form-label">Average monthly salaries *</label>
                                                </div>
                                                
                                                <div class="col-md-8">
                                                     <input class="form-control" type="text" name="average_salaries" id="average_salaries" onkeyup="getComma_average_sales('average_salaries')"/>
                                                     <span id="err_average_salaries" class="error_class"></span>
                                                </div>
                                               
                                            </div>
                                            <div class="form-group row align-items-center mb-4">
                                                <div class="col-md-4 text-start">
                                                    <label class="form-label">Average monthly marketing budget *</label>
                                                </div>
                                                
                                                <div class="col-md-8">
                                                     <input class="form-control" type="text" name="average_budget" id="average_budget" onkeyup="getComma_average_sales('average_budget')"/>
                                                <span id="err_average_budget" class="error_class"></span>
                                                </div>
                                               
                                            </div>
                                            <div class="form-group row align-items-center mb-4">
                                                <div class="col-md-4 text-start">
                                                    <label class="form-label">Average monthly net profit *</label>
                                                </div>
                                                
                                                <div class="col-md-8">
                                                     <input class="form-control" type="text" name="average_net_profit" id="average_net_profit" onkeyup="getComma_average_sales('average_net_profit')"/>
                                                <span id="err_average_net_profit" class="error_class"></span>
                                                </div>
                                               
                                            </div>

                                             <div class="form-group d-flex justify-content-between mt-5">
                                            <a href="<?php echo base_url();?>Questionnaire/ipworkinformation" class="button prev-step action-button-previous">Back</a>
                                             <button type="submit" name="btn_applicant_info4" id="btn_applicant_info4" class="button next-step action-button">Submit</button>
                                        </div>
                                        </div>
                                       
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        