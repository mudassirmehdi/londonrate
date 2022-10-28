<style>  
select{-webkit-appearance:none;  appearance: none; background-color:#fffff;}
</style>  


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
                                        <a href="<?php echo base_url();?>Questionnaire/universal" ><span class="round-tab">1 </span><i>Applicant
                                                information</i></a>
                                    </li>
                                    <li role="presentation" class="active">
                                        <a href="javascript:void(0);" data-toggle="tab" aria-controls="step2" role="tab"
                                            aria-expanded="true"><span class="round-tab">2</span><i>Company
                                                information</i></a>
                                    </li>
                                    <li role="presentation" class="disabled">
                                        <a href="javascript:void(0);"  role="tab"><span
                                                class="round-tab">3</span><i>IP-work information</i></a>
                                    </li>
                                    <li role="presentation" class="disabled">
                                        <a href="javascript:void(0);"  role="tab"><span
                                                class="round-tab">4</span><i>Additional information</i></a>
                                    </li>
                                </ul>
                            </div>
                            <form role="form" name="frm_questionnaire_universal2" id="frm_questionnaire_universal2" class="login-box" method="post">
							
							<input type="hidden" name="hidden_applicant_country2" id="hidden_applicant_country2" value="<?php echo $hidden_applicant_country2;?>" />
							<input type="hidden" name="hidden_applicant_email2" id="hidden_applicant_email2" value="<?php echo $hidden_applicant_email2;?>" />
							<input type="hidden" name="hidden_applicant_country_code2" id="hidden_applicant_country_code2" value="<?php echo $hidden_applicant_country_code2;?>" />
							
							<input type="hidden" name="hidden_applicant_contact_number2" id="hidden_applicant_contact_number2" value="<?php echo $hidden_applicant_contact_number2;?>" />
							
							
							
                                <div class="tab-content" id="main_form">
                                    
                                    <div class="tab-pane active" role="tabpanel" id="step2">
                                        <h4 class="text-left fs-title">Applicant information</h4>
                                        <div class="form-card">

                                            <div class="row form-group align-items-center">
                                                <div class="col-md-4 text-start"> <label class="form-label">Company name *</label></div>
                                                <div class="col-md-8">
                                                     <input class="form-control" type="text" name="company_name" id="company_name" value="<?php echo $company_name;?>"/>
                                                <span id="err_company_name" class="error_class"></span>
                                                </div>
                                            </div>

                                            <div class="form-group row align-items-center mb-4">
                                                <div class="col-md-4 text-start">
                                                    <label class="mb-0 form-label">Country of registration
                                                        *</label>
                                                    </div>
                                                <div class="col-md-8">

                                                     <select class="form-control mb-3"   name="applicant_country2" id="applicant_country2">
                                                       <option value="">--Select--</option>
                                                    <?php if(isset($countrylist) && count($countrylist)>0)
                                                    { 
                                                foreach($countrylist as $con){?>
                                                    <option value="<?php echo $con['country_id'];?>" <?php if($applicant_country2==$con['country_id']){ echo 'selected="selected"';}?>><?php echo $con['country_name']?></option>
                                                <?php }
                                                    }?>
                                                    </select>

                                                    <span id="err_applicant_country2" class="error_class"></span>

                                                     <div class="flex-row  text-start">
                                                        <input id="is_same_country" type="checkbox"
                                                            class="custom-checkbox" name="is_same_country" 
                                                            <?php if($is_same_country!=""){ echo 'checked="checked"';}?>>
                                                        <label for="is_same_country" class="custom-checkbox-lable" >
                                                            Same as applicant`s country of presence
                                                        </label>
                                                    </div>
                                                </div> 
                                            </div>

                                            <div class="row align-items-center mb-4 form-group">
                                                <div class="col-md-4 text-start">
                                                     <label class="form-label">Year established *</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input class="form-control" type="date"  name="year_establish" id="year_establish" value="<?php echo $year_establish;?>">
                                                    <span id="err_year_establish" class="error_class"></span>
                                                </div>
                                            </div> 

                                            <div class="form-group row align-items-center mb-4"> 
                                                <div class="col-md-4 text-start">
                                                    <label class="form-label">Business type *</label>
                                                </div>

                                                <div class="col-md-8">
                                                    <select class="form-control" name="business_type" id="business_type">
                                                        <option value="">--Select--</option>
                                                        <?php if(isset($businesstypelist) && count($businesstypelist)>0){
                                                            foreach($businesstypelist as $bu){?>
                                                        <option value="<?php echo $bu['business_type_id'];?>" <?php if($bu['business_type_id']==$business_type){ echo 'selected="selected"'; }?>><?php echo $bu['business_type'];?></option>
                                                            <?php }
                                                        }?>
                                                    </select>
                                                    <span id="err_business_type" class="error_class"></span>
                                                </div> 
                                            </div> 
											
											
											<div class="row align-items-center mb-4 form-group">
                                               <div class="col-md-4 text-start">
                                                    <label class="form-label">Main product(s) *</label>
                                               </div>
                                               <div class="col-md-8">
                                                    <input type="text" class="form-control cls_main_product" name="main_products[]" id="main_products_1" data-id="1" value="<?php echo $main_products[0];?>">
                                                    <span id="error_main_products_1" class="error_class"></span>

                                                    <div class="form-group" id="div_add_main_product">
                                            <?php if(isset($main_products) && count($main_products)>0) 
                                            {
                                                $r=2;
                                                for($j=1;$j<count($main_products);$j++)
                                                {?>
                                                <div class="form-group">
                                                    <label class="form-label">Main product </label>
                                                    <input type="text" class="form-control cls_main_product" name="main_products[]" id="main_products_<?php echo $r;?>" data-id="<?php echo $r;?>" value="<?php echo $main_products[$j];?>" style="width:90%"><span id="error_main_products_<?php echo $r;?>" class="error_class"></span><img src="<?php echo base_url();?>templates/frontend/images/close-input.svg" alt="Input close" class="remove_main_product_field" id="remove_<?php echo $r;?>" >
                                                </div>
                                            <?php $r++;
                                            } 
                                            }?>
                                            </div>

                                               </div>
                                            </div>
											
											
											
											
											
										<!-- 	
                                           <div class="form-group add-input add_main_product_field_button">
                                                <a href="javascript:void(0);" class="add-close"><img src="<?php/// echo base_url('templates/frontend/');?>images/add-input.svg"
                                                        alt="Input close"> Add</a>
                                            </div> -->
											
											
                                            <div class="row align-items-center mb-4">
                                                <div class="col-md-4 text-start">
                                                    <label class="mb-0 form-label">Website *</label>
                                                </div>
                                                <div class="col-md-8"> 
                                                        <input type="text" class="form-control" id="website_url" name="website_url" value="<?php echo $website_url;?>">
                                                        <span id="err_website_url" class="error_class"></span> 

                                                <div class="flex-row text-start mt-3">
                                                    <input id="is_website" name="is_website" type="checkbox" class="custom-checkbox" value="No" <?php if("No"==$is_website){ echo 'checked="checked"'; }?>>
                                                        <label for="is_website" class="custom-checkbox-lable" >
                                                            My company does not have a website
                                                        </label>
                                                    </div>
                                                </div> 
                                            </div>

                                            <div class="row align-items-center mb-4">
                                                <div class="col-md-4 text-start">
                                                    <label class="mb-0 form-label">E-mail *</label>
                                                </div>

                                                <div class="col-md-8">
                                                     <input type="email" class="form-control" id="applicant_email2" name="applicant_email2" value="<?php echo $applicant_email2;?>">
                                                    <span id="err_applicant_email2" class="error_class"></span>

                                                    <div class="flex-row text-start mt-3">
                                                        <input id="is_same_applicantemail" name="is_same_applicantemail" type="checkbox" class="custom-checkbox" value="Yes" <?php if("Yes"==$is_same_applicantemail){ echo 'checked="checked"'; }?>>
                                                        <label for="is_same_applicantemail" class="custom-checkbox-lable">
                                                            Same as applicant’s email
                                                        </label>
                                                    </div>
                                                </div> 
												
                                            </div>
											
                                            <div class="row align-items-center mb-4">
                                                <div class="col-md-4 text-start">
                                                    <label class="mb-0 form-label">Contact number *</label>
                                                </div>
                                                <div class="col-md-8"> 

                                                    <div class="input-wrap">
                                                    <input type="hidden" name="applicant_country_code12" id="applicant_country_code12" value="" />

                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1">
                                                           <input type="hidden" name="applicant_country_code11" id="applicant_country_code11" value="" />
                                                            <img src="<?php echo base_url('templates/frontend/');?>images/icons/world-icon.svg">

                                                             <select class="vodiapicker" name="applicant_country_code2" id="applicant_country_code2">
                                                          <option data-class="vti__flag af" data-note='AF' value="+93">
                                                                Afghanistan (&#x202B;افغانستان&#x202C;&lrm;) +93
                                                            </option>
                                                            <option data-class="vti__flag al" data-note='AL' value="+355">
                                                                Albania (Shqipëri) +355
                                                            </option>
                                                            <option data-class="vti__flag dz" data-note='DZ' value="+213">
                                                                Algeria (&#x202B;الجزائر&#x202C;&lrm;) +213
                                                            </option>
                                                            <option data-class="vti__flag as" data-note='AS' value="+1684">
                                                                American Samoa +1684
                                                            </option>
                                                            <option data-class="vti__flag ad" data-note='AD' value="+376">
                                                                Andorra +376
                                                            </option>
                                                            <option data-class="vti__flag ao" data-note='AO' value="+244">
                                                                Angola +244
                                                            </option>
                                                            <option data-class="vti__flag ai" data-note='AI' value="+1264">
                                                                Anguilla +1264
                                                            </option>
                                                            <option data-class="vti__flag ag" data-note='AG' value="+1264">
                                                                Antigua and Barbuda +1268
                                                            </option>
                                                            <option data-class="vti__flag ar" data-note='AR' value="+54">
                                                                Argentina +54
                                                            </option>
                                                            <option data-class="vti__flag am" data-note='AM' value="+374">
                                                                Armenia (Հայաստան) +374
                                                            </option>
                                                            <option data-class="vti__flag aw" data-note='AW' value="+297">
                                                                Aruba +297
                                                            </option>
                                                            <option data-class="vti__flag au" data-note='AU' value="+61">
                                                                Australia +61
                                                            </option>
                                                            <option data-class="vti__flag at" data-note='AT' value="+43">
                                                                Austria (Österreich) +43
                                                            </option>
                                                            <option data-class="vti__flag az" data-note='AZ' value="+994">
                                                                Azerbaijan (Azərbaycan) +994
                                                            </option>
                                                            <option data-class="vti__flag bs" data-note='BS' value="+1242">
                                                                Bahamas +1242
                                                            </option>
                                                            <option data-class="vti__flag bh" data-note='BH' value="+973">
                                                                Bahrain (&#x202B;البحرين&#x202C;&lrm;) +973
                                                            </option>
                                                            <option data-class="vti__flag bd" data-note='BD' value="+880">
                                                                Bangladesh (বাংলাদেশ) +880
                                                            </option>
                                                            <option data-class="vti__flag bb" data-note='BB' value="+1246">
                                                                Barbados +1246
                                                            </option>
                                                            <option data-class="vti__flag by" data-note='BY' value="+375">
                                                                Belarus (Беларусь) +375
                                                            </option>
                                                            <option data-class="vti__flag be" data-note='BE' value="+32">
                                                                Belgium (België) +32
                                                            </option>
                                                            <option data-class="vti__flag bz" data-note='BZ' value="+501">
                                                                Belize +501
                                                            </option>
                                                            <option data-class="vti__flag bj" data-note='BJ' value="+229">
                                                                Benin (Bénin) +229
                                                            </option>
                                                            <option data-class="vti__flag bm" data-note='BM' value="+1441">
                                                                Bermuda +1441
                                                            </option>
                                                            <option data-class="vti__flag bt" data-note='BT' value="+975">
                                                                Bhutan (འབྲུག) +975
                                                            </option>
                                                            <option data-class="vti__flag bo" data-note='BO' value="+591">
                                                                Bolivia +591
                                                            </option>
                                                            <option data-class="vti__flag ba" data-note='BA' value="+387">
                                                                Bosnia and Herzegovina (Босна и Херцеговина) +387
                                                            </option>
                                                            <option data-class="vti__flag bw" data-note='BW' value="+267"> 
                                                                Botswana +267
                                                            </option>
                                                            <option data-class="vti__flag br" data-note='BR' value="+55">
                                                                Brazil (Brasil) +55
                                                            </option>
                                                            <option data-class="vti__flag io" data-note='IO' value="+246">
                                                                British Indian Ocean Territory +246
                                                            </option>
                                                            <option data-class="vti__flag vg" data-note='VG' value="+1284">
                                                                British Virgin Islands +1284
                                                            </option>
                                                            <option data-class="vti__flag bn" data-note='BN' value="+673">
                                                                Brunei +673
                                                            </option>
                                                            <option data-class="vti__flag bg" data-note='BG' value=" +359">
                                                                Bulgaria (България) +359
                                                            </option>
                                                            <option data-class="vti__flag bf" data-note='BF' value="+226">
                                                                Burkina Faso +226
                                                            </option>
                                                            <option data-class="vti__flag bi" data-note='BI' value="+257">
                                                                Burundi (Uburundi) +257
                                                            </option>
                                                            <option data-class="vti__flag kh" data-note='KH' value="+855">
                                                                Cambodia (កម្ពុជា) +855
                                                            </option>
                                                            <option data-class="vti__flag cm" data-note='CM' value="+237">
                                                                Cameroon (Cameroun) +237
                                                            </option>
                                                            <option data-class="vti__flag ca" data-note='CA' value="+1">
                                                                Canada +1
                                                            </option>
                                                            <option data-class="vti__flag cv" data-note='CV' value="+238">
                                                                Cape Verde (Kabu Verdi) +238
                                                            </option>
                                                            <option data-class="vti__flag bq" data-note='BQ' value="+599">
                                                                Caribbean Netherlands +599
                                                            </option>
                                                            <option data-class="vti__flag ky" data-note='KY' value="+1345">
                                                                Cayman Islands +1345
                                                            </option>
                                                            <option data-class="vti__flag cf" data-note='CF' value="+236">
                                                                Central African Republic (République centrafricaine)
                                                                +236
                                                            </option>
                                                            <option data-class="vti__flag td" data-note='TD' value="+235">
                                                                Chad (Tchad) +235
                                                            </option>
                                                            <option data-class="vti__flag cl" data-note='CL' value="+56">
                                                                Chile +56
                                                            </option>
                                                            <option data-class="vti__flag cn" data-note='CN' value="+86">
                                                                China (中国) +86
                                                            </option>
                                                            <option data-class="vti__flag cx" data-note='CX' value=" +61">
                                                                Christmas Island +61
                                                            </option>
                                                            <option classdata-class="vti__flag cc" data-note='CC' value="+61">
                                                                Cocos (Keeling) Islands +61
                                                            </option>
                                                            <option data-class="vti__flag co" data-note='CO' value="+57">
                                                                Colombia +57
                                                            </option>
                                                            <option data-class="vti__flag km" data-note='KM' value="+269">
                                                                Comoros (&#x202B;جزر القمر&#x202C;&lrm;) +269
                                                            </option>
                                                            <option data-class="vti__flag cd" data-note='CD' value="+243">
                                                                Congo (DRC) (Jamhuri ya Kidemokrasia ya Kongo) +243
                                                            </option>
                                                            <option data-class="vti__flag cg" data-note='CG' value="+242">
                                                                Congo (Republic) (Congo-Brazzaville) +242
                                                            </option>
                                                            <option data-class="vti__flag ck" data-note='CK' value="+682">
                                                                Cook Islands +682
                                                            </option>
                                                            <option data-class="vti__flag cr" data-note='CR' value="+506">
                                                                Costa Rica +506
                                                            </option>
                                                            <option data-class="vti__flag ci" data-note='CI' value="+225">
                                                                Côte d’Ivoire +225
                                                            </option>
                                                            <option data-class="vti__flag hr" data-note='HR' value="+385">
                                                                Croatia (Hrvatska) +385
                                                            </option>
                                                            <option data-class="vti__flag cu" data-note='CU' value="+53">
                                                                Cuba +53
                                                            </option>
                                                            <option data-class="vti__flag cw" data-note='CW' value="+599">
                                                                Curaçao +599
                                                            </option>
                                                            <option data-class="vti__flag cy" data-note='CY' value="+357">
                                                                Cyprus (Κύπρος) +357
                                                            </option>
                                                            <option data-class="vti__flag cz" data-note='CZ' value="+420">
                                                                Czech Republic (Česká republika) +420
                                                            </option>
                                                            <option data-class="vti__flag dk" data-note='DK' value="+45">
                                                                Denmark (Danmark) +45
                                                            </option>
                                                            <option data-class="vti__flag dj" data-note='DJ' value="+253">
                                                                Djibouti +253
                                                            </option>
                                                            <option data-class="vti__flag dm" data-note='DM' value="+1767">
                                                                Dominica +1767
                                                            </option>
                                                            <option data-class="vti__flag do" data-note='DO' value="+1">
                                                                Dominican Republic (República Dominicana) +1
                                                            </option>
                                                            <option data-class="vti__flag ec" data-note='EC' value="+593">
                                                                Ecuador +593
                                                            </option>
                                                            <option data-class="vti__flag eg" data-note='EG' value="+20">
                                                                Egypt (&#x202B;مصر&#x202C;&lrm;) +20
                                                            </option>
                                                            <option data-class="vti__flag sv" data-note='SV' value="+503">
                                                                El Salvador +503
                                                            </option>
                                                            <option data-class="vti__flag gq" data-note='GQ' value="+240">
                                                                Equatorial Guinea (Guinea Ecuatorial) +240
                                                            </option>
                                                            <option data-class="vti__flag er" data-note='ER' value="+291">
                                                                Eritrea +291
                                                            </option>
                                                            <option data-class="vti__flag ee" data-note='EE' value="+372">
                                                                Estonia (Eesti) +372
                                                            </option>
                                                            <option data-class="vti__flag et" data-note='ET' value="+251">
                                                                Ethiopia +251
                                                            </option>
                                                            <option data-class="vti__flag fk" data-note='FK' value="+500">
                                                                Falkland Islands (Islas Malvinas) +500
                                                            </option>
                                                            <option data-class="vti__flag fo" data-note='FO' value="+298">
                                                                Faroe Islands (Føroyar) +298
                                                            </option>
                                                            <option data-class="vti__flag fj" data-note='FJ' value="+679">
                                                                Fiji +679
                                                            </option>
                                                            <option data-class="vti__flag fi" data-note='FI' value="+358">
                                                                Finland (Suomi) +358
                                                            </option>
                                                            <option data-class="vti__flag fr" data-note='FR' value="+33">
                                                                France +33
                                                            </option>
                                                            <option data-class="vti__flag gf" data-note='GF' value="+594">
                                                                French Guiana (Guyane française) +594
                                                            </option>
                                                            <option data-class="vti__flag pf" data-note='PF' value="+689">
                                                                French Polynesia (Polynésie française) +689
                                                            </option>
                                                            <option data-class="vti__flag ga" data-note='GA' value="+241">
                                                                Gabon +241
                                                            </option>
                                                            <option data-class="vti__flag gm" data-note='GM' value="+220">
                                                                Gambia +220
                                                            </option>
                                                            <option data-class="vti__flag ge" data-note='GE' value="+995">
                                                                Georgia (საქართველო) +995
                                                            </option>
                                                            <option data-class="vti__flag de" data-note='DE' value="+49">
                                                                Germany (Deutschland) +49
                                                            </option>
                                                            <option data-class="vti__flag gh" data-note='GH' value="+233">
                                                                Ghana (Gaana) +233
                                                            </option>
                                                            <option data-class="vti__flag gi" data-note='GI' value="+350">
                                                                Gibraltar +350
                                                            </option>
                                                            <option data-class="vti__flag gr" data-note='GR' value="+30">
                                                                Greece (Ελλάδα) +30
                                                            </option>
                                                            <option data-class="vti__flag gl" data-note='GL' value="+299">
                                                                Greenland (Kalaallit Nunaat) +299
                                                            </option>
                                                            <option data-class="vti__flag gd" data-note='GD' value="+1473">
                                                                Grenada +1473
                                                            </option>
                                                            <option data-class="vti__flag gp" data-note='GP' value="+590">
                                                                Guadeloupe +590
                                                            </option>
                                                            <option data-class="vti__flag gu" data-note='GU' value="+1671">
                                                                Guam +1671
                                                            </option>
                                                            <option data-class="vti__flag gt" data-note='GT' value="+502">
                                                                Guatemala +502
                                                            </option>
                                                            <option data-class="vti__flag gg" data-note='GG' value="+44">
                                                                Guernsey +44
                                                            </option>
                                                            <option data-class="vti__flag gn" data-note='GN' value="+224">
                                                                Guinea (Guinée) +224
                                                            </option>
                                                            <option data-class="vti__flag gw" data-note='GW' value="+245">
                                                                Guinea-Bissau (Guiné Bissau) +245
                                                            </option>
                                                            <option data-class="vti__flag gy" data-note='GY' value="+592">
                                                                Guyana +592
                                                            </option>
                                                            <option data-class="vti__flag ht" data-note='HT' value="+509">
                                                                Haiti +509
                                                            </option>
                                                            <option data-class="vti__flag hn" data-note='HN' value="+504">
                                                                Honduras +504
                                                            </option>
                                                            <option data-class="vti__flag hk" data-note='HK' value="+852">
                                                                Hong Kong (香港) +852
                                                            </option>
                                                            <option data-class="vti__flag hu" data-note='HU' value="+36">
                                                                Hungary (Magyarország) +36
                                                            </option>
                                                            <option data-class="vti__flag is" data-note='IS' value="+354">
                                                                Iceland (Ísland) +354
                                                            </option>
                                                            <option data-class="vti__flag in" data-note='IN' value="+91">
                                                                India (भारत) +91
                                                            </option>
                                                            <option data-class="vti__flag id" data-note='ID' value="+62">
                                                                Indonesia +62
                                                            </option>
                                                            <option data-class="vti__flag ir" data-note='IR' value="+98">
                                                                Iran (&#x202B;ایران&#x202C;&lrm;) +98
                                                            </option>
                                                            <option data-class="vti__flag iq" data-note='IQ' value="+964">
                                                                Iraq (&#x202B;العراق&#x202C;&lrm;) +964
                                                            </option>
                                                            <option data-class="vti__flag ie" data-note='IE' value="+353">
                                                                Ireland +353
                                                            </option>
                                                            <option data-class="vti__flag im" data-note='IM' value="+44">
                                                                Isle of Man +44
                                                            </option>
                                                            <option data-class="vti__flag il" data-note='IL' value="+972">
                                                                Israel (&#x202B;ישראל&#x202C;&lrm;) +972
                                                            </option>
                                                            <option data-class="vti__flag it" data-note='IT' value="+39">
                                                                Italy (Italia) +39
                                                            </option>
                                                            <option data-class="vti__flag jm" data-note='JM' value="+1876">
                                                                Jamaica +1876
                                                            </option>
                                                            <option data-class="vti__flag jp"  data-note='JP' value="+81">
                                                                Japan (日本) +81
                                                            </option>
                                                            <option data-class="vti__flag je"  data-note='JE' value="+44">
                                                                Jersey +44
                                                            </option>
                                                            <option data-class="vti__flag jo"  data-note='JO' value="+962">
                                                                Jordan (&#x202B;الأردن&#x202C;&lrm;) +962
                                                            </option>
                                                            <option data-class="vti__flag kz"  data-note='KZ' value="+7"> 
                                                                Kazakhstan (Казахстан) +7
                                                            </option>
                                                            <option data-class="vti__flag ke"  data-note='KE' value="+254">
                                                                Kenya +254
                                                            </option>
                                                            <option data-class="vti__flag ki"  data-note='KI' value="+686">
                                                                Kiribati +686
                                                            </option>
                                                            <option data-class="vti__flag xk"  data-note='XK' value="+383">
                                                                Kosovo +383
                                                            </option>
                                                            <option data-class="vti__flag kw"  data-note='KW' value="+965">
                                                                Kuwait (&#x202B;الكويت&#x202C;&lrm;) +965
                                                            </option>
                                                            <option data-class="vti__flag kg"  data-note='KG' value="+996">
                                                                Kyrgyzstan (Кыргызстан) +996
                                                            </option>
                                                            <option data-class="vti__flag la"  data-note='LA' value="+856">
                                                                Laos (ລາວ) +856
                                                            </option>
                                                            <option data-class="vti__flag lv"  data-note='LV' value="+371">
                                                                Latvia (Latvija) +371
                                                            </option>
                                                            <option data-class="vti__flag lb"  data-note='LB' value="+961">
                                                                Lebanon (&#x202B;لبنان&#x202C;&lrm;) +961
                                                            </option>
                                                            <option data-class="vti__flag ls"  data-note='LS' value="+266">
                                                                Lesotho +266
                                                            </option>
                                                            <option data-class="vti__flag lr"  data-note='LR' value="+231">
                                                                Liberia +231
                                                            </option>
                                                            <option data-class="vti__flag ly"  data-note='LY' value="+218">
                                                                Libya (&#x202B;ليبيا&#x202C;&lrm;) +218
                                                            </option>
                                                            <option data-class="vti__flag li"  data-note='LI' value="+218">
                                                                Liechtenstein +423
                                                            </option>
                                                            <option data-class="vti__flag lt"  data-note='LT' value="+370">
                                                                Lithuania (Lietuva) +370
                                                            </option>
                                                            <option data-class="vti__flag lu"  data-note='LU' value="+352">
                                                                Luxembourg +352
                                                            </option>
                                                            <option data-class="vti__flag mo"  data-note='MO' value="+853">
                                                                Macau (澳門) +853
                                                            </option>
                                                            <option data-class="vti__flag mk"   data-note='MK' value="+389">
                                                                Macedonia (FYROM) (Македонија) +389
                                                            </option>
                                                            <option data-class="vti__flag mg"  data-note='MG' value="+261">
                                                                Madagascar (Madagasikara) +261
                                                            </option>
                                                            <option data-class="vti__flag mw"  data-note='MW'  value="+265">
                                                                Malawi +265
                                                            </option>
                                                            <option data-class="vti__flag my"  data-note='MY' value="+60">
                                                                Malaysia +60
                                                            </option>
                                                            <option data-class="vti__flag mv"  data-note='MV' value="+960">
                                                                Maldives +960
                                                            </option>
                                                            <option data-class="vti__flag ml"  data-note='ML' value="+223"> 
                                                                Mali +223
                                                            </option>
                                                            <option data-class="vti__flag mt"  data-note='MT' value="+356">
                                                                Malta +356
                                                            </option>
                                                            <option data-class="vti__flag mh"  data-note='MH' value="+692">
                                                                Marshall Islands +692
                                                            </option>
                                                            <option data-class="vti__flag mq"  data-note='MQ' value="+596">
                                                                Martinique +596
                                                            </option>
                                                            <option data-class="vti__flag mr"  data-note='MR' value="+222">
                                                                Mauritania (&#x202B;موريتانيا&#x202C;&lrm;) +222
                                                            </option>
                                                            <option data-class="vti__flag mu"  data-note='MU' value="+230">
                                                                Mauritius (Moris) +230
                                                            </option>
                                                            <option data-class="vti__flag yt"  data-note='YT' value="+262"> 
                                                                Mayotte +262
                                                            </option>
                                                            <option data-class="vti__flag mx"  data-note='MX' value="+52">
                                                                Mexico (México) +52
                                                            </option>
                                                            <option data-class="vti__flag fm"  data-note='FM' value="+691">
                                                                Micronesia +691
                                                            </option>
                                                            <option data-class="vti__flag md"  data-note='MD' value="+373">
                                                                Moldova (Republica Moldova) +373
                                                            </option>
                                                            <option data-class="vti__flag mc"  data-note='MC' value="+377">
                                                                Monaco +377
                                                            </option>
                                                            <option data-class="vti__flag mn"  data-note='MN' value="+976">
                                                                Mongolia (Монгол) +976
                                                            </option>
                                                            <option data-class="vti__flag me"  data-note='ME' value="+382">
                                                                Montenegro (Crna Gora) +382
                                                            </option>
                                                            <option data-class="vti__flag ms"  data-note='MS' value="+1664">
                                                                Montserrat +1664
                                                            </option>
                                                            <option data-class="vti__flag ma"  data-note='MA' value="+212">
                                                                Morocco (&#x202B;المغرب&#x202C;&lrm;) +212
                                                            </option>
                                                            <option data-class="vti__flag mz"  data-note='MZ' value="+258">
                                                                Mozambique (Moçambique) +258
                                                            </option>
                                                            <option data-class="vti__flag mm"  data-note='MM' value="+95">
                                                                Myanmar (Burma) (မြန်မာ) +95
                                                            </option>
                                                            <option data-class="vti__flag na"  data-note='NA' value="+264">
                                                                Namibia (Namibië) +264
                                                            </option>
                                                            <option data-class="vti__flag nr"  data-note='NR' value="+674">
                                                                Nauru +674
                                                            </option>
                                                            <option data-class="vti__flag np"  data-note='NP' value="+977">
                                                                Nepal (नेपाल) +977
                                                            </option>
                                                            <option data-class="vti__flag nl"  data-note='NL' value="+31">
                                                                Netherlands (Nederland) +31
                                                            </option>
                                                            <option data-class="vti__flag nc"  data-note='NC' value="+687">
                                                                New Caledonia (Nouvelle-Calédonie) +687
                                                            </option>
                                                            <option data-class="vti__flag nz"  data-note='NZ' value="+64">
                                                                New Zealand +64
                                                            </option>
                                                            <option data-class="vti__flag ni"  data-note='NI' value="+505">
                                                                Nicaragua +505
                                                            </option>
                                                            <option data-class="vti__flag ne" data-note='NE' value="+227">
                                                                Niger (Nijar) +227
                                                            </option>
                                                            <option data-class="vti__flag ng"  data-note='NG' value="+234">
                                                                Nigeria +234
                                                            </option>
                                                            <option data-class="vti__flag nu"  data-note='NU' value="+683">
                                                                Niue +683
                                                            </option>
                                                            <option data-class="vti__flag nf"  data-note='NF'value="+672">
                                                                Norfolk Island +672
                                                            </option>
                                                            <option data-class="vti__flag kp"  data-note='KP' value="+850">
                                                                North Korea (조선 민주주의 인민 공화국) +850
                                                            </option>
                                                            <option data-class="vti__flag mp"  data-note='MP' value="+1670">
                                                                Northern Mariana Islands +1670
                                                            </option>
                                                            <option data-class="vti__flag no"  data-note='NO' value="+47">
                                                                Norway (Norge) +47
                                                            </option>
                                                            <option data-class="vti__flag om"  data-note='OM' value="+968">
                                                                Oman (&#x202B;عُمان&#x202C;&lrm;) +968
                                                            </option>
                                                            <option data-class="vti__flag pk"  data-note='PK' value="+92">
                                                                Pakistan (&#x202B;پاکستان&#x202C;&lrm;) +92
                                                            </option>
                                                            <option data-class="vti__flag pw"  data-note='PW' value="+680">
                                                                Palau +680
                                                            </option>
                                                            <option data-class="vti__flag ps"  data-note='PS' value="+970">
                                                                Palestine (&#x202B;فلسطين&#x202C;&lrm;) +970
                                                            </option>
                                                            <option data-class="vti__flag pa"  data-note='PA' value="+675">
                                                                Panama (Panamá) +507
                                                            </option>
                                                            <option data-class="vti__flag pg"  data-note='PG' value="+675">
                                                                Papua New Guinea +675
                                                            </option>
                                                            <option data-class="vti__flag py"  data-note='PY' value="+595">
                                                                Paraguay +595
                                                            </option>
                                                            <option data-class="vti__flag pe"  data-note='SMPE' value="+51">
                                                                Peru (Perú) +51
                                                            </option>
                                                            <option data-class="vti__flag ph"  data-note='PH' value="+63">
                                                                Philippines +63
                                                            </option>
                                                            <option data-class="vti__flag pl"  data-note='PL' value="+48">
                                                                Poland (Polska) +48
                                                            </option>
                                                            <option data-class="vti__flag pt"  data-note='PT' value="+351">
                                                                Portugal +351
                                                            </option>
                                                            <option data-class="vti__flag pr"  data-note='PR' value="+1">
                                                                Puerto Rico +1
                                                            </option>
                                                            <option data-class="vti__flag qa"  data-note='QA' value="+590">
                                                                Qatar (&#x202B;قطر&#x202C;&lrm;) +974
                                                            </option>
                                                            <option data-class="vti__flag re"  data-note='RE' value="+262">
                                                                Réunion (La Réunion) +262
                                                            </option>
                                                            <option data-class="vti__flag ro"  data-note='RO' value="+40">
                                                                Romania (România) +40
                                                            </option>
                                                            <option data-class="vti__flag ru"  data-note='RU' value="+590">
                                                                Russia (Россия) +7
                                                            </option>
                                                            <option data-class="vti__flag rw"  data-note='RW' value="+590">
                                                                Rwanda +250
                                                            </option>
                                                            <option data-class="vti__flag bl"  data-note='BL' value="+590">
                                                                Saint Barthélemy +590
                                                            </option>
                                                            <option data-class="vti__flag sh"  data-note='SH' value="+290">
                                                                Saint Helena +290
                                                            </option>
                                                            <option data-class="vti__flag kn"  data-note='KN' value="+1869">
                                                                Saint Kitts and Nevis +1869
                                                            </option>
                                                            <option data-class="vti__flag lc"  data-note='LC' value="+1758">
                                                                Saint Lucia +1758
                                                            </option>
                                                            <option data-class="vti__flag mf"  data-note='MF' value="+590">
                                                                Saint Martin (Saint-Martin (partie française)) +590
                                                            </option>
                                                            <option data-class="vti__flag pm"  data-note='PM'  value="+508">
                                                                Saint Pierre and Miquelon (Saint-Pierre-et-Miquelon)
                                                                +508
                                                            </option>
                                                            <option data-class="vti__flag vc"  data-note='VC' value="+1784">
                                                                Saint Vincent and the Grenadines +1784
                                                            </option>
                                                            <option data-class="vti__flag ws"  data-note='WS' value="+685">
                                                                Samoa +685
                                                            </option>
                                                            <option data-class="vti__flag sm" data-note='SM' value="+378">
                                                                San Marino +378
                                                            </option>
                                                            <option data-class="vti__flag st" data-note='ST' value="+239">
                                                                São Tomé and Príncipe (São Tomé e Príncipe) +239
                                                            </option>
                                                            <option data-class="vti__flag sa" data-note='SA' value="+966">
                                                                Saudi Arabia (&#x202B;المملكة العربية
                                                                السعودية&#x202C;&lrm;)
                                                                +966
                                                            </option>
                                                            <option data-class="vti__flag sn" data-note='SN' value="+221">
                                                                Senegal (Sénégal) +221
                                                            </option>
                                                            <option data-class="vti__flag rs" data-note='RS' value="+381">
                                                                Serbia (Србија) +381
                                                            </option>
                                                            <option data-class="vti__flag sc" data-note='SC' value="+248">
                                                                Seychelles +248
                                                            </option>
                                                            <option data-class="vti__flag sl" data-note='SL' value="+232">
                                                                Sierra Leone +232
                                                            </option>
                                                            <option data-class="vti__flag sg" data-note='SG' value="+65">
                                                                Singapore +65
                                                            </option>
                                                            <option data-class="vti__flag sx" data-note='SX' value="+1721">
                                                                Sint Maarten +1721
                                                            </option>
                                                            <option data-class="vti__flag sk" data-note='SK' value="+421">
                                                                Slovakia (Slovensko) +421
                                                            </option>
                                                            <option data-class="vti__flag si" data-note='SI' value="+386">
                                                                Slovenia (Slovenija) +386
                                                            </option>
                                                            <option data-class="vti__flag sb" data-note='SB' value="+677">
                                                                Solomon Islands +677
                                                            </option>
                                                            <option data-class="vti__flag so" data-note='SO' value="+252">
                                                                Somalia (Soomaaliya) +252
                                                            </option>
                                                            <option data-class="vti__flag za" data-note='ZA' value="+27">
                                                                South Africa +27
                                                            </option>
                                                            <option data-class="vti__flag kr" data-note='KR' value="+82">
                                                                South Korea (대한민국) +82
                                                            </option>
                                                            <option data-class="vti__flag ss" data-note='SS' value="+211">
                                                                South Sudan (&#x202B;جنوب السودان&#x202C;&lrm;) +211
                                                            </option>
                                                            <option data-class="vti__flag es" data-note='ES' value="+34">
                                                                Spain (España) +34
                                                            </option>
                                                            <option data-class="vti__flag lk" data-note='LK' value="+94">
                                                                Sri Lanka (ශ්&zwj;රී ලංකාව) +94
                                                            </option>
                                                            <option data-class="vti__flag sd" data-note='SD' value="+249">
                                                                Sudan (&#x202B;السودان&#x202C;&lrm;) +249
                                                            </option>
                                                            <option data-class="vti__flag sr" data-note='SR' value="+597">
                                                                Suriname +597
                                                            </option>
                                                            <option data-class="vti__flag sj" data-note='SJ' value="+47">
                                                                Svalbard and Jan Mayen +47
                                                            </option>
                                                            <option data-class="vti__flag sz" data-note='SZ' value="+268">
                                                                Swaziland +268
                                                            </option>
                                                            <option data-class="vti__flag se" data-note='SE' value="+46">
                                                                Sweden (Sverige) +46
                                                            </option>
                                                            <option data-class="vti__flag ch" data-note='CH' value="+41">
                                                                Switzerland (Schweiz) +41
                                                            </option>
                                                            <option data-class="vti__flag sy" data-note='SY' value="+963">
                                                                Syria (&#x202B;سوريا&#x202C;&lrm;) +963
                                                            </option>
                                                            <option data-class="vti__flag tw" data-note='TW' value="+886">
                                                                Taiwan (台灣) +886
                                                            </option>
                                                            <option data-class="vti__flag tj" data-note='TJ' value="+992">
                                                                Tajikistan +992
                                                            </option>
                                                            <option data-class="vti__flag tz" data-note='TZ' value="+255">
                                                                Tanzania +255
                                                            </option>
                                                            <option data-class="vti__flag th" data-note='TH' value="+66">
                                                                Thailand (ไทย) +66
                                                            </option>
                                                            <option data-class="vti__flag tl" data-note='TL' value="+670">
                                                                Timor-Leste +670
                                                            </option>
                                                            <option data-class="vti__flag tg" data-note='TG' value="+228">
                                                                Togo +228
                                                            </option>
                                                            <option data-class="vti__flag tk" data-note='TK' value="+690">
                                                                Tokelau +690
                                                            </option>
                                                            <option data-class="vti__flag to" data-note='TO' value="+676">
                                                                Tonga +676
                                                            </option>
                                                            <option data-class="vti__flag tt" data-note='TT' value="+1868">
                                                                Trinidad and Tobago +1868
                                                            </option>
                                                            <option data-class="vti__flag tn" data-note='TN' value="+216">
                                                                Tunisia (&#x202B;تونس&#x202C;&lrm;) +216
                                                            </option>
                                                            <option data-class="vti__flag tr" data-note='TR' value="+90">
                                                                Turkey (Türkiye) +90
                                                            </option>
                                                            <option data-class="vti__flag tm" data-note='TM' 
                                                            value="+993">
                                                                Turkmenistan +993
                                                            </option>
                                                            <option data-class="vti__flag tc" data-note='TC' value="+1649">
                                                                Turks and Caicos Islands +1649
                                                            </option>
                                                            <option data-class="vti__flag tv" data-note='TV' value="+688">
                                                                Tuvalu +688
                                                            </option>
                                                            <option data-class="vti__flag vi" data-note='VI' value="+1340">
                                                                U.S. Virgin Islands +1340
                                                            </option>
                                                            <option data-class="vti__flag ug" data-note='UG' value="+256">
                                                                Uganda +256
                                                            </option>
                                                            <option data-class="vti__flag ua" data-note='UA' value="+380">
                                                                Ukraine (Україна) +380
                                                            </option>
                                                            <option data-class="vti__flag ae" data-note='AE' value="+971">
                                                                United Arab Emirates (&#x202B;الإمارات العربية
                                                                المتحدة&#x202C;&lrm;) +971
                                                            </option>
                                                            <option data-class="vti__flag gb" data-note='GB' value="+44">
                                                                United Kingdom +44
                                                            </option>
                                                            <option data-class="vti__flag us" data-note='US' value="+1">
                                                                United States +1
                                                            </option>
                                                            <option data-class="vti__flag uy" data-note='UY' value="+598">
                                                                Uruguay +598
                                                            </option>
                                                            <option data-class="vti__flag uz" data-note='UZ' value="+998">
                                                                Uzbekistan (Oʻzbekiston) +998
                                                            </option> 
                                                            <option data-class="vti__flag vu" data-note='VU' value="+678">
                                                                Vanuatu +678
                                                            </option>
                                                            <option data-class="vti__flag va" data-note='VA' value="+39">
                                                                Vatican City (Città del Vaticano) +39
                                                            </option>
                                                            <option data-class="vti__flag ve" data-note='VE' value="+58">
                                                                Venezuela +58
                                                            </option>
                                                            <option data-class="vti__flag vn" data-note='VN' value="+84">
                                                                Vietnam (Việt Nam) +84
                                                            </option>
                                                            <option data-class="vti__flag wf" data-note='WF' value="+681">
                                                                Wallis and Futuna (Wallis-et-Futuna) +681
                                                            </option>
                                                            <option data-class="vti__flag eh" data-note='EH' value="+212">
                                                                Western Sahara (&#x202B;الصحراء الغربية&#x202C;&lrm;)
                                                                +212
                                                            </option>
                                                            <option data-class="vti__flag ye" data-note='YE' value="+967">
                                                                Yemen (&#x202B;اليمن&#x202C;&lrm;) +967
                                                            </option>
                                                            <option data-class="vti__flag zm" data-note='ZM' value="+260">
                                                                Zambia +260
                                                            </option>
                                                            <option data-class="vti__flag zw" data-note='ZW' value="+263">
                                                                Zimbabwe +263
                                                            </option>
                                                            <option data-class="vti__flag ax" data-note='AX' value="+358">
                                                                Åland Islands +358
                                                            </option>
                                                       </select>
 
                                                      <div class="lang-select">
                                                            <a href="javaScript:void(0)" class="btn-select"
                                                                value=""></a>
                                                            <div class="b">
                                                                <ul class="b"></ul>
                                                            </div>
                                                        </div>
                                                        </span>
                                                         <input class="form-control" type="number" name="applicant_contact_number2" id="applicant_contact_number2" value="<?php echo $applicant_contact_number2;?>"/>
                                                    </div>  
                                                    <span id="err_applicant_contact_number2" class="error_class"></span>
                                                </div>

                                                    <div class="flex-row text-start mt-3">
                                                        <input  id="is_same_applicantcontact" name="is_same_applicantcontact" type="checkbox" class="custom-checkbox" value="Yes" <?php if("Yes"==$is_same_applicantcontact){ echo 'checked="checked"'; }?>>
                                                        <label for="is_same_applicantcontact" class="custom-checkbox-lable">
                                                            Same as applicant’s contact number
                                                        </label>
                                                    </div>
                                                </div> 
                                            </div>


                                            <div class="form-group row align-items-center mb-4">
                                                <div class="col-md-4 text-start">
                                                    <label class="form-label">Potential customer(s) *</label>
                                                </div>
                                                <div class="col-md-8">
                                                     <input type="text" class="form-control cls_potential_customer" name="potential_customer[]" id="potential_customer_1" data-id="1" value="<?php echo $potential_customer[0];?>">
                                                 <span id="error_potential_customer_1" class="error_class"></span>
                                                </div>
                                                
                                               
                                            </div>
											
											<div class="form-group row align-items-center mb-4" id="div_add_potential_customer">
											<?php if(isset($potential_customer) && count($potential_customer)>0) 
											{
												$r=2;
												for($j=1;$j<count($potential_customer);$j++)
												{?>
												<div class="form-group">
													<label class="form-label">Potential customer </label>
													<input type="text" class="form-control cls_potential_customer" name="potential_customer[]" id="potential_customer_<?php echo $r;?>" data-id="<?php echo $r;?>" value="<?php echo $potential_customer[$j];?>" style="width:90%"><span id="error_potential_customer_<?php echo $r;?>" class="error_class"></span><img src="<?php echo base_url();?>templates/frontend/images/close-input.svg" alt="Input close" class="remove_potential_customer_field" id="remove_<?php echo $r;?>" >
												</div>
											<?php $r++;
											} 
											}?>
											</div>
											
                                           <!--  <div class="form-group add-input add_potential_customer_field_button">
                                                <a href="javascript:void(0);" class="add-close"><img src="<?php // echo base_url('templates/frontend/');?>images/add-input.svg"
                                                        alt="Input close"> Add</a>
                                            </div> -->
											
                                            <div class="form-group row align-items-center mb-4">
                                                <div class="col-md-4 text-start">
                                                     <label class="form-label">Potential competitor(s) *</label>
                                                </div>
                                                
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control cls_potential_competitor" name="potential_competitor[]" id="potential_competitor_1" data-id="1" value="<?php echo $potential_competitor[0];?>">
                                                    <span id="error_potential_competitor_1" class="error_class"></span>
                                                </div> 
                                            </div>
											
											<div class="form-group" id="div_add_potential_competitor">
											<?php if(isset($potential_competitor) && count($potential_competitor)>0) 
											{
												$r=2;
												for($j=1;$j<count($potential_competitor);$j++)
												{?>
												<div class="form-group">
													<label class="form-label">Potential competitor </label>
													<input type="text" class="form-control cls_potential_competitor" name="potential_competitor[]" id="potential_competitor_<?php echo $r;?>" data-id="<?php echo $r;?>" value="<?php echo $potential_competitor[$j];?>" style="width:90%"><span id="error_potential_competitor_<?php echo $r;?>" class="error_class"></span><img src="<?php echo base_url();?>templates/frontend/images/close-input.svg" alt="Input close" class="remove_potential_competitor_field" id="remove_<?php echo $r;?>" >
												</div>
											<?php $r++;
											} 
											}?>
											</div>
											
											
                                            <!-- <div class="form-group add-input add_potential_competitor_field_button">
                                                <a href="javascript:void(0);" class="add-close"><img src="<?php // echo base_url('templates/frontend/');?>images/add-input.svg"
                                                        alt="Input close"> Add</a>
                                            </div> -->
											
                                            <div class="form-group row align-items-center mb-4">
                                                <div class="col-md-4 text-start">
                                                    <label class="form-label">Protected regions *</label>
                                                </div>
                                                
                                                <div class="col-md-8">
                                                     <input type="text" class="form-control" name="protected_regions" id="protected_regions" value="<?php echo $protected_regions;?>">
                                                     <span id="err_protected_regions" class="error_class"></span>
                                                </div>
                                               
                                            </div>

                                            <div class="form-group row align-items-center mb-4">
                                                <div class="col-md-4 text-start">
                                                    <label class="form-label">Current team and partners *</label>
                                                </div>
                                                
                                                <div class="col-md-8">
                                                     <input type="text" class="form-control" name="current_team_partners" id="current_team_partners" value="<?php echo $current_team_partners;?>">
                                                     <span id="err_current_team_partners" class="error_class"></span>
                                                </div>
                                               
                                            </div>

                                            <div class="form-group row align-items-center mb-4">
                                                <div class="col-md-4 text-start">
                                                    <label class="form-label">Uniqueness and key advantages of product *</label>
                                                </div>
                                                
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="uniqueness_product" id="uniqueness_product" value="<?php echo $uniqueness_product;?>">
    												<span id="err_uniqueness_product" class="error_class"></span>
                                                </div>
                                            </div>

                                            <div class="form-group d-flex justify-content-between mt-5">
                                                <a href="<?php echo base_url();?>questionnaire/universal" class="button prev-step  action-button-previous">Back</a>
                                                 <button type="submit" name="btn_applicant_info2" id="btn_applicant_info2" class="button action-button next-step">Next</button>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- TAB TWO END -->
                                    </div>
									
                                    
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
		
		<?php 
		if(isset($main_products) && count($main_products)>0)
		 {
			 $cnt_session_main_products=count($main_products);
		 }else{ $cnt_session_main_products=1;}
		 
		 if(isset($potential_customer) && count($potential_customer)>0)
		 {
			 $cnt_session_potential_customer=count($potential_customer);
		 }else{ $cnt_session_potential_customer=1;}
		 
		 if(isset($potential_competitor) && count($potential_competitor)>0)
		 {
			 $cnt_session_potential_competitor=count($potential_competitor);
		 }else{ $cnt_session_potential_competitor=1;}
		 ?>
<input type="hidden" name="usercountry" id="usercountry" value="<?php echo $usercountry;?>" />			
	 
     <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">        
$(document).ready(function() {
	
	/* for main products */
    var max_fields      = 50; //maximum input boxes allowed
    
    var x = <?php echo $cnt_session_main_products;?>; //initlal text box count
	
    $(".add_main_product_field_button").click(function(e)
	{
	    e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
			//alert(x);
            $("#div_add_main_product").append('<div class="form-group"><label>Main product*</label><input type="text" class="form-control cls_main_product" name="main_products[]" id="main_products_'+x+'" data-id='+x+' style="width:90%"><span id="error_main_products_'+x+'" class="error_class"></span><img src="'+BASEPATH+'templates/frontend/images/close-input.svg" alt="Input close" class="remove_main_product_field" id="remove_'+x+'" ></div>'); //add input box
        }
			
    });
   
    $("#div_add_main_product").on("click",".remove_main_product_field", function(e){
			//alert(this.id);//user click on remove text
			var clickID=this.id;
        e.preventDefault(); 
		//$(this).parent('div').remove(); 
		$("#"+clickID).parent('div').remove(); 
		x--;
    });
	/* end of  main products */
	
	/* for Potential customer */
    var max_fields1      = 50; //maximum input boxes allowed
    
    var y = <?php echo $cnt_session_potential_customer;?>; //initlal text box count
	
    $(".add_potential_customer_field_button").click(function(e)
	{
	   e.preventDefault();
        if(y < max_fields1){ //max input box allowed
            y++; //text box increment
			//alert(x);
            $("#div_add_potential_customer").append('<div class="form-group"><label>Potential Customer*</label><input type="text" class="form-control cls_potential_customer" name="potential_customer[]" id="potential_customer_'+y+'" data-id='+y+' style="width:90%"><span id="error_potential_customer_'+y+'" class="error_class"></span><img src="'+BASEPATH+'templates/frontend/images/close-input.svg" alt="Input close" class="remove_potential_customer_field" id="remove_potential_customer_'+y+'" ></div>'); //add input box
        }
			
    });
   
    $("#div_add_potential_customer").on("click",".remove_potential_customer_field", function(e){
			//alert(this.id);//user click on remove text
			var clickID=this.id;
        e.preventDefault(); 
		//$(this).parent('div').remove(); 
		$("#"+clickID).parent('div').remove(); 
		y--;
    });
	/* end of  Potential customer */
	
	
	/* for Potential competitor */
    var max_fields2      = 50; //maximum input boxes allowed
    
    var z = <?php echo $cnt_session_potential_competitor;?>; //initlal text box count
	
    $(".add_potential_competitor_field_button").click(function(e)
	{
	   e.preventDefault();
        if(z < max_fields2){ //max input box allowed
            z++; //text box increment
			//alert(x);
            $("#div_add_potential_competitor").append('<div class="form-group"><label>Potential Customer*</label><input type="text" class="form-control cls_potential_competitor" name="potential_competitor[]" id="potential_competitor_'+z+'" data-id='+z+' style="width:90%"><span id="error_potential_competitor_'+z+'" class="error_class"></span><img src="'+BASEPATH+'templates/frontend/images/close-input.svg" alt="Input close" class="remove_potential_competitor_field" id="remove_potential_competitor_'+z+'" ></div>'); //add input box
        }
			
    });
   
    $("#div_add_potential_competitor").on("click",".remove_potential_competitor_field", function(e){
			//alert(this.id);//user click on remove text
			var clickID=this.id;
        e.preventDefault(); 
		//$(this).parent('div').remove(); 
		$("#"+clickID).parent('div').remove(); 
		z--;
    });
	/* end of  Potential customer */
});

	
// COUNTRY CODE
$(document).ready(function($)
{

    $('.input-group-text').click(function() {
    $('.lang-select').toggle();
    $('.b').show();
});

	

var langArray = [];
var langvalue = [];
var t=0;
var pp=0;
$(".vodiapicker option").each(function () {

  var flagClass = $(this).attr("data-class");
  
  var flagNote = $(this).attr("data-note");
  var usercountry=$("#usercountry").val();
  var text = this.innerText;

  var value = $(this).val();
	
   if(usercountry==flagNote)
   {
	   pp=t;
   }	   
   
  var item =
	
	'<li><div class="' +

    flagClass +

    '" value="' +

    value +

    '"></div><span>' +

    text +

    "</span></li>";

	
  langArray.push(item);
  langvalue.push(value);
  t++;

});



$(".a, .b").html(langArray);
   

var current_location=langArray[pp];
var currentvalue=langvalue[pp];
 
$(".btn-select").html(current_location);

$("#applicant_country_code12").val(currentvalue);


$(".btn-select").attr("value", "en");



$(".a li, .b li").click(function () {

  var flagClass = $(this).find("div").attr("class");

  var value = $(this).find("div").attr("value");

  var text = this.innerText;

  var item =

    '<li><div class="' +

    flagClass +

    '" value="' +

    value +

    '"></div><span>' +

    text +

    "</span></li>";

  $(".btn-select").html(item);

  $(".btn-select").attr("value", value);

  $(".b").toggle();

});



$(".btn-select").click(function () {

  $(".b").toggle();

});



var sessionLang = localStorage.getItem("lang");

if (sessionLang) {

  var langIndex = langArray.indexOf(sessionLang);

  $(".btn-select").html(langArray[langIndex]);

  $(".btn-select").attr("value", sessionLang);

} else {

  var langIndex = langArray.indexOf("ch");

  console.log(langIndex);

  $(".btn-select").html(langArray[langIndex]);

}
});
</script>