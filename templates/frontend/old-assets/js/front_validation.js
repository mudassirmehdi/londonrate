function getpackagename(package_name)
{
	var package_name=package_name;  
	$.ajax({
				type: "POST",
				url: BASEPATH+"Questionnaire/ajaxsetpackagename",
				data:'package_name='+package_name,
				dataType: 'json',
				success: function(response)
				{
					
					//return true;
				}
			});
			
}
function set_development_date(ip_work_status,j)
{
	var ip_work_status=ip_work_status;    
var j=j;	
	if(ip_work_status=="All_ready_development")
	{
		//$("#display_developement_status_"+j).prop('label', 'Development date *'); 
		
		$("#display_developement_status_"+j).html('Development date *');
	}
	else if(ip_work_status=="In_process_development")
	{
		//$("#display_developement_status_"+j).prop('label', 'Development start date *'); 
		$("#display_developement_status_"+j).html('Development start date *');
	}
}
function load_object_IP_work(ip_work_object,ip_work_object_id,session_ip_work_type)
{	
	var ip_work_object = ip_work_object;
	var ip_work_object_id=ip_work_object_id;
	var session_ip_work_type=session_ip_work_type;
	if(ip_work_object!='')
	{
		$.ajax({
				type: "POST",
				url: BASEPATH+"Questionnaire/ajaxgettypeofIPwork",
				data:'ip_work_object='+ip_work_object+"&session_ip_work_type="+session_ip_work_type,
				dataType: 'json',
				success: function(response)
				{
					$("#ip_work_type_"+ip_work_object_id).html(response.resstr);
				}
			});
	}
}
function load_ip_work_type(ip_work_type,ip_work_type_id,session_industry_ip_work)
{
	var ip_work_type = ip_work_type;
	var ip_work_type_id=ip_work_type_id;
	var ip_work_object=$("#ip_work_object_"+ip_work_type_id).val();
	var session_industry_ip_work=session_industry_ip_work;
	$("#div_indust_"+ip_work_type_id).hide();
	$("#div_nice_class_"+ip_work_type_id).hide();
	
	if(ip_work_type!='')
	{
		$.ajax({
				type: "POST",
				url: BASEPATH+"Questionnaire/ajaxgetCoverageareaClassification",
				data:'ip_work_type='+ip_work_type+"&ip_work_object="+ip_work_object+"&session_industry_ip_work="+session_industry_ip_work,
				dataType: 'json',
				success: function(response)
				{ 
					$("#coverage_area_"+ip_work_type_id).html(response.resstr);
					if(response.which=="indus")
					{
						$("#is_industries_"+ip_work_type_id).val('YES');
						$("#div_indust_"+ip_work_type_id).show();
						$("#industries_"+ip_work_type_id).html(response.resstr1);
					}
					else
					{
						$("#is_industries_"+ip_work_type_id).val('NO');
						$("#div_nice_class_"+ip_work_type_id).show();
						$("#nice_classification_"+ip_work_type_id).html(response.resstr1);
					}
				}
			});
			
			//if(ip_work_object!="13")
			{ 
				$.ajax({
					type: "POST",
					url: BASEPATH+"Questionnaire/ajaxgetindustryofusageofIPwork",
					data:'ip_work_type='+ip_work_type+"&ip_work_object="+ip_work_object,
					dataType: 'json',
					success: function(response)
					{  
						$("#industry_ip_work_"+ip_work_type_id).html(response.resstr1);
						
					}
				});
			}
	}
}
function getallprotectedindustries(ipcertificates,typeid)
{
	var ipcertificates = ipcertificates;
	var typeid=typeid; 
	
	if(ipcertificates!='')
	{
		$.ajax({
				type: "POST",
				url: BASEPATH+"Iptype/ajaxgetprotectedindustrieslist",
				data:'ipcertificates='+ipcertificates+"&typeid="+typeid,
				dataType: 'json',
				success: function(response)
				{
					$("#industry").html(response.resstr);
				}
			});
	}
}

$(document).ready(function($)
{
/* validation for mobile application */
$(".cls_js_mobile_applications").click(function(){
		
		var mobile_app = $("#mobile_app").val();
		var ipcertificates= $("#ipcertificates").val();
		var coverage= $("#coverage").val();
		var industry= $("#industry").val();
		var rholder= $("#rholder").val();
		var sales= $("#sales").val();
		var profit= $("#profit").val();
		var cyears= $("#cyears").val();
		var marketing= $("#marketing").val();
		var salaries= $("#salaries").val();
		
		$("#err_mobile_app").html('');
		$("#err_ipcertificates").html('');
		$("#err_coverage").html('');
		$("#err_industry").html('');
		$("#err_rholder").html('');
		$("#err_sales").html('');
		$("#err_profit").html('');
		$("#err_cyears").html('');
		$("#err_marketing").html('');
		$("#err_salaries").html('');
		
		var flag=1;

		if(mobile_app=="")
		{
			$("#err_mobile_app").html('Select type of mobile application.');
			flag=0;
		}
		if (ipcertificates=="")
		{
			$("#err_ipcertificates").html('Select type of IP certificate .');
			flag=0;
		}
		if(coverage=="")
		{
			$("#err_coverage").html('Select coverage.');
			flag=0;
		}
		if(industry=="")
		{
			$("#err_industry").html('Select industry.');
			flag=0;
		}
		if(rholder=="")
		{
			$("#err_rholder").html('Select right sholders.');
			flag=0;
		}
		if(sales=="")
		{
			$("#err_sales").html('Select total sales, monthly.');
			flag=0;
		}
		if(profit=="")
		{
			$("#err_profit").html('Select net profit, monthly.');
			flag=0;
		}
		if(cyears=="")
		{
			$("#err_cyears").html('How old is the company?.');
			flag=0;
		}
		if(marketing=="")
		{
			$("#err_marketing").html('Select marketing budget,monthly.');
			flag=0;
		}
		if(salaries=="")
		{
			$("#err_salaries").html('Select total salaries, monthly.');
			flag=0;
		}
		if(flag==1)
		{
			return true;
		}
		else
		{
			return false;
		}
		
	});
	/* validation for applicant login*/

/* validation for technology product */
$(".cls_js_techno_product").click(function(){
		
		var mobile_app = $("#mobile_app").val();
		var ipcertificates= $("#ipcertificates").val();
		var coverage= $("#coverage").val();
		var industry= $("#industry").val();
		var rholder= $("#rholder").val();
		var sales= $("#sales").val();
		var profit= $("#profit").val();
		var cyears= $("#cyears").val();
		var marketing= $("#marketing").val();
		var salaries= $("#salaries").val();
		
		$("#err_mobile_app").html('');
		$("#err_ipcertificates").html('');
		$("#err_coverage").html('');
		$("#err_industry").html('');
		$("#err_rholder").html('');
		$("#err_sales").html('');
		$("#err_profit").html('');
		$("#err_cyears").html('');
		$("#err_marketing").html('');
		$("#err_salaries").html('');
		
		var flag=1;

		if(mobile_app=="")
		{
			$("#err_mobile_app").html('Select type of technology, product.');
			flag=0;
		}
		if (ipcertificates=="")
		{
			$("#err_ipcertificates").html('Select type of IP certificate .');
			flag=0;
		}
		if(coverage=="")
		{
			$("#err_coverage").html('Select coverage.');
			flag=0;
		}
		if(industry=="")
		{
			$("#err_industry").html('Select industry.');
			flag=0;
		}
		if(rholder=="")
		{
			$("#err_rholder").html('Select right sholders.');
			flag=0;
		}
		if(sales=="")
		{
			$("#err_sales").html('Select total sales, monthly.');
			flag=0;
		}
		if(profit=="")
		{
			$("#err_profit").html('Select net profit, monthly.');
			flag=0;
		}
		if(cyears=="")
		{
			$("#err_cyears").html('How old is the company?.');
			flag=0;
		}
		if(marketing=="")
		{
			$("#err_marketing").html('Select marketing budget,monthly.');
			flag=0;
		}
		if(salaries=="")
		{
			$("#err_salaries").html('Select total salaries, monthly.');
			flag=0;
		}
		if(flag==1)
		{
			return true;
		}
		else
		{
			return false;
		}
		
	});
	/* validation for  technology product*/	

/* validation for brand trademark */
$(".cls_js_brand_trademark").click(function(){
		
		var mobile_app = $("#mobile_app").val();
		var ipcertificates= $("#ipcertificates").val();
		var coverage= $("#coverage").val();
		var industry= $("#industry").val();
		var rholder= $("#rholder").val();
		var sales= $("#sales").val();
		var profit= $("#profit").val();
		var cyears= $("#cyears").val();
		var marketing= $("#marketing").val();
		var salaries= $("#salaries").val();
		
		$("#err_mobile_app").html('');
		$("#err_ipcertificates").html('');
		$("#err_coverage").html('');
		$("#err_industry").html('');
		$("#err_rholder").html('');
		$("#err_sales").html('');
		$("#err_profit").html('');
		$("#err_cyears").html('');
		$("#err_marketing").html('');
		$("#err_salaries").html('');
		
		var flag=1;

		if(mobile_app=="")
		{
			$("#err_mobile_app").html('Select type of brand.');
			flag=0;
		}
		if (ipcertificates=="")
		{
			$("#err_ipcertificates").html('Select type of IP certificate .');
			flag=0;
		}
		if(coverage=="")
		{
			$("#err_coverage").html('Select coverage.');
			flag=0;
		}
		if(industry=="")
		{
			$("#err_industry").html('Select industry.');
			flag=0;
		}
		if(rholder=="")
		{
			$("#err_rholder").html('Select right sholders.');
			flag=0;
		}
		if(sales=="")
		{
			$("#err_sales").html('Select total sales, monthly.');
			flag=0;
		}
		if(profit=="")
		{
			$("#err_profit").html('Select net profit, monthly.');
			flag=0;
		}
		if(cyears=="")
		{
			$("#err_cyears").html('How old is the company?.');
			flag=0;
		}
		if(marketing=="")
		{
			$("#err_marketing").html('Select marketing budget,monthly.');
			flag=0;
		}
		if(salaries=="")
		{
			$("#err_salaries").html('Select total salaries, monthly.');
			flag=0;
		}
		if(flag==1)
		{
			return true;
		}
		else
		{
			return false;
		}
		
	});
	/* validation for  brand trademark*/

/* validation for art work */
$(".cls_js_art_work").click(function(){
		
		var mobile_app = $("#mobile_app").val();
		var ipcertificates= $("#ipcertificates").val();
		var coverage= $("#coverage").val();
		var industry= $("#industry").val();
		var rholder= $("#rholder").val();
		var sales= $("#sales").val();
		var profit= $("#profit").val();
		var cyears= $("#cyears").val();
		var marketing= $("#marketing").val();
		var salaries= $("#salaries").val();
		
		$("#err_mobile_app").html('');
		$("#err_ipcertificates").html('');
		$("#err_coverage").html('');
		$("#err_industry").html('');
		$("#err_rholder").html('');
		$("#err_sales").html('');
		$("#err_profit").html('');
		$("#err_cyears").html('');
		$("#err_marketing").html('');
		$("#err_salaries").html('');
		
		var flag=1;

		if(mobile_app=="")
		{
			$("#err_mobile_app").html('Select type of art work.');
			flag=0;
		}
		if (ipcertificates=="")
		{
			$("#err_ipcertificates").html('Select type of IP certificate .');
			flag=0;
		}
		if(coverage=="")
		{
			$("#err_coverage").html('Select coverage.');
			flag=0;
		}
		if(industry=="")
		{
			$("#err_industry").html('Select industry.');
			flag=0;
		}
		if(rholder=="")
		{
			$("#err_rholder").html('Select right sholders.');
			flag=0;
		}
		if(sales=="")
		{
			$("#err_sales").html('Select total sales, monthly.');
			flag=0;
		}
		if(profit=="")
		{
			$("#err_profit").html('Select net profit, monthly.');
			flag=0;
		}
		if(cyears=="")
		{
			$("#err_cyears").html('How old is the company?.');
			flag=0;
		}
		if(marketing=="")
		{
			$("#err_marketing").html('Select marketing budget,monthly.');
			flag=0;
		}
		if(salaries=="")
		{
			$("#err_salaries").html('Select total salaries, monthly.');
			flag=0;
		}
		if(flag==1)
		{
			return true;
		}
		else
		{
			return false;
		}
		
	});
	/* validation for art work*/	
	/* validation for website domain */
$(".cls_js_website_domain").click(function(){
		
		var mobile_app = $("#mobile_app").val();
		var ipcertificates= $("#ipcertificates").val();
		var coverage= $("#coverage").val();
		var industry= $("#industry").val();
		var rholder= $("#rholder").val();
		var sales= $("#sales").val();
		var profit= $("#profit").val();
		var cyears= $("#cyears").val();
		var marketing= $("#marketing").val();
		var salaries= $("#salaries").val();
		
		$("#err_mobile_app").html('');
		$("#err_ipcertificates").html('');
		$("#err_coverage").html('');
		$("#err_industry").html('');
		$("#err_rholder").html('');
		$("#err_sales").html('');
		$("#err_profit").html('');
		$("#err_cyears").html('');
		$("#err_marketing").html('');
		$("#err_salaries").html('');
		
		var flag=1;

		if(mobile_app=="")
		{
			$("#err_mobile_app").html('Select type of website,domain.');
			flag=0;
		}
		if (ipcertificates=="")
		{
			$("#err_ipcertificates").html('Select type of IP certificate .');
			flag=0;
		}
		if(coverage=="")
		{
			$("#err_coverage").html('Select coverage.');
			flag=0;
		}
		if(industry=="")
		{
			$("#err_industry").html('Select industry.');
			flag=0;
		}
		if(rholder=="")
		{
			$("#err_rholder").html('Select right sholders.');
			flag=0;
		}
		if(sales=="")
		{
			$("#err_sales").html('Select total sales, monthly.');
			flag=0;
		}
		if(profit=="")
		{
			$("#err_profit").html('Select net profit, monthly.');
			flag=0;
		}
		if(cyears=="")
		{
			$("#err_cyears").html('How old is the company?.');
			flag=0;
		}
		if(marketing=="")
		{
			$("#err_marketing").html('Select marketing budget,monthly.');
			flag=0;
		}
		if(salaries=="")
		{
			$("#err_salaries").html('Select total salaries, monthly.');
			flag=0;
		}
		if(flag==1)
		{
			return true;
		}
		else
		{
			return false;
		}
		
	});
	/* validation for website domain*/	
	/* validation for license  */
$(".cls_js_license").click(function(){
		
		var mobile_app = $("#mobile_app").val();
		var ipcertificates= $("#ipcertificates").val();
		var coverage= $("#coverage").val();
		var industry= $("#industry").val();
		var rholder= $("#rholder").val();
		var sales= $("#sales").val();
		var profit= $("#profit").val();
		var cyears= $("#cyears").val();
		var marketing= $("#marketing").val();
		var salaries= $("#salaries").val();
		
		$("#err_mobile_app").html('');
		$("#err_ipcertificates").html('');
		$("#err_coverage").html('');
		$("#err_industry").html('');
		$("#err_rholder").html('');
		$("#err_sales").html('');
		$("#err_profit").html('');
		$("#err_cyears").html('');
		$("#err_marketing").html('');
		$("#err_salaries").html('');
		
		var flag=1;

		if(mobile_app=="")
		{
			$("#err_mobile_app").html('Select type of website,domain.');
			flag=0;
		}
		if (ipcertificates=="")
		{
			$("#err_ipcertificates").html('Select type of IP certificate .');
			flag=0;
		}
		if(coverage=="")
		{
			$("#err_coverage").html('Select coverage.');
			flag=0;
		}
		if(industry=="")
		{
			$("#err_industry").html('Select industry.');
			flag=0;
		}
		if(rholder=="")
		{
			$("#err_rholder").html('Select right sholders.');
			flag=0;
		}
		if(sales=="")
		{
			$("#err_sales").html('Select total sales, monthly.');
			flag=0;
		}
		if(profit=="")
		{
			$("#err_profit").html('Select net profit, monthly.');
			flag=0;
		}
		if(cyears=="")
		{
			$("#err_cyears").html('How old is the company?.');
			flag=0;
		}
		if(marketing=="")
		{
			$("#err_marketing").html('Select marketing budget,monthly.');
			flag=0;
		}
		if(salaries=="")
		{
			$("#err_salaries").html('Select total salaries, monthly.');
			flag=0;
		}
		if(flag==1)
		{
			return true;
		}
		else
		{
			return false;
		}
		
	});
	/* validation for forgot password*/	
	
	$('#btn_forgot').click(function(){ 
	
	var applicant_email=$("#applicant_email").val();
	var applicant_password=$("#applicant_password").val();
	var applicant_confirm_password=$("#applicant_confirm_password").val();
	var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
	$("#err_applicant_email").html('');
	$("#err_applicant_password").html('');
	
	var flag=1;

	if(applicant_email=="")
	{
		$("#err_applicant_email").html('Enter valid email address.');
		flag=0;
	}
	if (applicant_email!="" && !testEmail.test(applicant_email))
    {
		$("#err_applicant_email").html('Enter a valid applicant email.');
		flag=0;
	}
	if(applicant_password=="")
	{
		$("#err_applicant_password").html('Enter password.');
		flag=0;
	}
	if(applicant_confirm_password=="")
	{
		$("#err_applicant_confirm_password").html('Enter confirm password.');
		flag=0;
	}
	if(applicant_confirm_password!=applicant_password)
	{
		$("#err_applicant_confirm_password").html('Confirm password is not match.');
		flag=0;
	}
	if(flag==1)
	{
		return true;
	}
	else
	{
		return false;
	}
});
/* end validation for forgot password */

$('#btn_userlogin').click(function(){ 
	
	var applicant_email=$("#applicant_email").val();
	var applicant_password=$("#applicant_password").val();
	var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
	$("#err_applicant_email").html('');
	$("#err_applicant_password").html('');
	
	var flag=1;

	if(applicant_email=="")
	{
		$("#err_applicant_email").html('Enter valid email address.');
		flag=0;
	}
	if (applicant_email!="" && !testEmail.test(applicant_email))
    {
		$("#err_applicant_email").html('Enter a valid applicant email.');
		flag=0;
	}
	if(applicant_password=="")
	{
		$("#err_applicant_password").html('Enter password.');
		flag=0;
	}
	if(flag==1)
	{
		return true;
	}
	else
	{
		return false;
	}
});
/* end validation for applicant information */

	/* validation for applicant information*/

$('#btn_applicant_info').click(function(){ 
	var applicant_name=$("#applicant_name").val();
	var applicant_country=$("#applicant_country").val();
	var applicant_email=$("#applicant_email").val();
	var applicant_country_code=$("#applicant_country_code").val();
	var applicant_contact_number=$("#applicant_contact_number").val();
	
    var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
	var session_applicant_id=$("#session_applicant_id").val();
	if(session_applicant_id==0)
	{
		var is_terms=$("#is_terms").val();
		var is_privacy=$("#is_privacy").val();
		var applicant_password=$("#applicant_password").val();
		var confirm_applicant_password=$("#confirm_applicant_password").val();
	}
	$("#err_applicant_name").html('');
	$("#err_applicant_country").html('');
	$("#err_applicant_email").html('');
	$("#err_applicant_country_code").html('');
	$("#err_applicant_contact_number").html('');
	
	if(session_applicant_id==0)
	{
		$("#err_is_terms").html('');
		$("#err_is_privacy").html('');
		
		$("#err_applicant_password").html('');
		$("#err_confirm_applicant_password").html('');
	}

	var flag=1;

	if(applicant_name=="")
	{
		$("#err_applicant_name").html('Enter applicant name.');
		flag=0;
	}
	if(applicant_country=="")
	{
	$("#err_applicant_country").html('Select applicant country.');
		flag=0;
	}
	if(applicant_email=="")
	{
		$("#err_applicant_email").html('Enter applicant email.');
		flag=0;
	}
	if (applicant_email!="" && !testEmail.test(applicant_email))
    {
		$("#err_applicant_email").html('Enter a valid applicant email.');
		flag=0;
	}
	if(applicant_country_code=="")
	{
		$("#err_applicant_country_code").html('Select country code.');
		flag=0;
	}
	if(applicant_country_code!="" && applicant_contact_number=="")
	{
		$("#err_applicant_contact_number").html('Enter valid contact number.');
		flag=0;
	}
	/*if(applicant_contact_number!="" &&  applicant_contact_number.length!=10)
	{
		$("#err_applicant_contact_number").html('Enter valid contact number.');
		flag=0;
	}*/
	if(session_applicant_id==0)
	{
		 if($("input[type=checkbox][name='is_terms']:checked").length == 0)
		{
			$("#err_is_terms").html('Check terms & conditions.');
			flag=0;
		}
		if($("input[type=checkbox][name='is_privacy']:checked").length == 0)
		{
			$("#err_is_privacy").html('Check privacy policy.');
			flag=0;
		}
		if(applicant_password=="")
		{
			$("#err_applicant_password").html('Enter password.');
			flag=0;
		}
		if(confirm_applicant_password=="")
		{
			$("#err_confirm_applicant_password").html('Enter confirm password.');
			flag=0;
		}
		if(applicant_password!=confirm_applicant_password)
		{
			$("#err_confirm_applicant_password").html('Confirm password is not match!');
			flag=0;
		}
	}
	if(flag==1)
	{
		return true;
	}
	else
	{
		return false;
	}
});
/* end validation for applicant information */

/* validation for company information*/

$('#btn_applicant_info2').click(function(){ 
	var company_name=$("#company_name").val();
	var year_establish=$("#year_establish").val();
	var business_type=$("#business_type").val();
	var website_url=$("#website_url").val();
	var applicant_email2=$("#applicant_email2").val();	
	var applicant_contact_number2=$("#applicant_contact_number2").val();	
	var protected_regions=$("#protected_regions").val();
	var current_team_partners=$("#current_team_partners").val();
	var uniqueness_product=$("#uniqueness_product").val();
	
    var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
	var re = /(http(s)?:\\)?([\w-]+\.)+[\w-]+[.com|.in|.org]+(\[\?%&=]*)?/
	
	$("#err_company_name").html('');
	$("#err_year_establish").html('');
	$("#err_business_type").html('');
	$("#err_website_url").html('');
	$("#err_applicant_email2").html('');
	$("#err_applicant_contact_number2").html('');
	$("#err_protected_regions").html('');
	$("#err_current_team_partners").html('');
	$("#err_uniqueness_product").html('');

	var flag=1;

	if(company_name=="")
	{
		$("#err_company_name").html('Enter company name.');
		flag=0;
	}
	if(year_establish=="")
	{
		$("#err_year_establish").html('Select year established.');
		flag=0;
	}
	if(business_type=="")
	{
		$("#err_business_type").html('Select business type.');
		flag=0;
	}
	if($("input[type=checkbox][name='is_website']:checked").length == 0 && website_url=="")
	{
		$("#err_website_url").html('Enter website url.');
		flag=0;
	}
	if (!re.test(website_url) && website_url!="") 
	{
		$("#err_website_url").html('Enter valid website url.');
		flag=0;
	}
	if(applicant_email2=="")
	{
		$("#err_applicant_email2").html('Enter applicant email.');
		flag=0;
	}
	if (applicant_email2!="" && !testEmail.test(applicant_email2))
    {
		$("#err_applicant_email2").html('Enter a valid applicant email.');
		flag=0;
	}
	if(applicant_contact_number2=="")
	{
		$("#err_applicant_contact_number2").html('Enter contact number.');
		flag=0;
	}
	if(protected_regions=="")
	{
		$("#err_protected_regions").html('Enter protected regions.');
		flag=0;
	}
	if(current_team_partners=="")
	{
		$("#err_current_team_partners").html('Enter current team and partners.');
		flag=0;
	}
	if(uniqueness_product=="")
	{
		$("#err_uniqueness_product").html('Enter uniquness product.');
		flag=0;
	}
	$('.cls_main_product').each(function(){
		var products_idd= $(this).attr('data-id');
		$("#error_main_products_"+products_idd).html('');
		
		if($("#main_products_"+products_idd).val()=="")
		{
			$("#error_main_products_"+products_idd).html('Enter main products.');
			flag=0;
		}
	});
	$('.cls_potential_customer').each(function(){
		var customer_idd= $(this).attr('data-id');
		$("#error_potential_customer_"+customer_idd).html('');
		
		if($("#potential_customer_"+customer_idd).val()=="")
		{
			$("#error_potential_customer_"+customer_idd).html('Enter potential customer.');
			flag=0;
		}
	});
	$('.cls_potential_competitor').each(function(){
		var competitor_idd= $(this).attr('data-id');
		$("#error_potential_competitor_"+competitor_idd).html('');
		
		if($("#potential_competitor_"+competitor_idd).val()=="")
		{
			$("#error_potential_competitor_"+competitor_idd).html('Enter potential competitor.');
			flag=0;
		}
	});
	if(flag==1)
	{
		return true;
	}
	else
	{
		return false;
	}
});

$('#is_same_country').click(function(){  
  if($("input[type=checkbox][id='is_same_country']:checked").length == 0)
   {  
	$('#applicant_country2').prop('selected', false);
	$("#applicant_country2 option[value='']").prop("selected", "selected");
   }
else
{ 
	var hidden_applicant_country2=$("#hidden_applicant_country2").val();
	$("#applicant_country2 option[value="+hidden_applicant_country2+"]").prop("selected", "selected");
	$("#err_applicant_country2").html('');
}
});

$('#is_website').click(function(){ 
if($("input[type=checkbox][name='is_website']:checked").length == 1)
   {
	 $("#website_url").val('');
	 $("#err_website_url").html('');
   }
   else
   {	
	$("#err_website_url").html('Enter website url.');
   }
   
});


$('#is_same_applicantemail').click(function(){ 
if($("input[type=checkbox][name='is_same_applicantemail']:checked").length == 1)
   {
		var hidden_applicant_email2=$("#hidden_applicant_email2").val();
		$("#applicant_email2").val(hidden_applicant_email2);
		$("#err_applicant_email2").html('');
   }
   else
   {
	   $("#applicant_email2").val('');
	   $("#err_applicant_email2").html('Enter a valid applicant email.');
   }
});

$('#is_same_applicantcontact').click(function(){  
if($("input[type=checkbox][name='is_same_applicantcontact']:checked").length == 1)
   {
		$("#err_applicant_contact_number2").html('');
		var hidden_applicant_country_code2=$("#hidden_applicant_country_code2").val();
		var hidden_applicant_contact_number2=$("#hidden_applicant_contact_number2").val();

		$("#applicant_contact_number2").val(hidden_applicant_contact_number2);
		$("#applicant_country_code2 option[value="+hidden_applicant_country_code2+"]").attr("selected", "selected");
   }
 else
 {
	 $("#applicant_contact_number2").val('');
	 $("#err_applicant_contact_number2").html('Enter contact number.');
 }

});
/* end validation for company information */

/* validation for ip work information*/

$('#btn_applicant_info3').click(function(){ 
var flag=1;
	$('.cls_ip_work_title').each(function(){
		var ip_idd= $(this).attr('data-id');
		
		$("#err_ip_work_title_"+ip_idd).html('');
		$("#err_ip_work_object_"+ip_idd).html('');
		$("#err_ip_work_type_"+ip_idd).html('');
		$("#err_industry_ip_work_"+ip_idd).html('');
		$("#err_ip_work_status_"+ip_idd).html('');
		$("#err_development_date_"+ip_idd).html('');
		$("#err_registration_date_"+ip_idd).html('');
		$("#err_coverage_area_"+ip_idd).html('');
		$("#err_registration_org_"+ip_idd).html('');
		$("#err_rightsholders_"+ip_idd).html('');
		var is_industries=$("#is_industries_"+ip_idd).val(); //alert(is_industries);
		if(is_industries=="YES")
		{
			$("#err_industries_"+ip_idd).html('');
		}
		else
		{
			$("#err_nice_classification_"+ip_idd).html('');
		}
		
		if($("#ip_work_title_"+ip_idd).val()=="")
		{
			$("#err_ip_work_title_"+ip_idd).html('Enter title of IP Work.');
			flag=0;
		}
		if($("#ip_work_object_"+ip_idd).val()=="")
		{
			$("#err_ip_work_object_"+ip_idd).html('Select object of IP work.');
			flag=0;
		}
		if($("#ip_work_type_"+ip_idd).val()=="")
		{
			$("#err_ip_work_type_"+ip_idd).html('Select type of IP work.');
			flag=0;
		}
		if($("#industry_ip_work_"+ip_idd).val()=="")
		{
			$("#err_industry_ip_work_"+ip_idd).html('Select Industry of usage of IP-work.');
			flag=0;
		}
		if($("#ip_work_status_"+ip_idd).val()=="")
		{
			$("#err_ip_work_status_"+ip_idd).html('Select status of IP work.');
			flag=0;
		}
		if($("#development_date_"+ip_idd).val()=="")
		{
			$("#err_development_date_"+ip_idd).html('Select development date.');
			flag=0;
		}
		if($("#registration_date_"+ip_idd).val()=="")
		{
			$("#err_registration_date_"+ip_idd).html('Select registration date.');
			flag=0;
		}
		if($("#coverage_area_"+ip_idd).val()=="")
		{
			$("#err_coverage_area_"+ip_idd).html('Select coverage area.');
			flag=0;
		}
		if($("#registration_org_"+ip_idd).val()=="")
		{
			$("#err_registration_org_"+ip_idd).html('Enter registration organisation .');
			flag=0;
		}
		if($("#rightsholders_"+ip_idd).val()=="")
		{
			$("#err_rightsholders_"+ip_idd).html('Select rightsholders.');
			flag=0;
		}
		if(is_industries=="YES" && $("#industries_"+ip_idd).val()=="")
		{
			$("#err_industries_"+ip_idd).html('Select industries.');
			flag=0;
		}
		if(is_industries=="NO" && $("#nice_classification_"+ip_idd).val()=="")
		{
			$("#err_nice_classification_"+ip_idd).html('Select nice classification.');
			flag=0;
		}
	});
	
	if(flag==1)
	{
		return true;
	}
	else
	{
		return false;
	}
});
/* end validation for ip work information */

/* validation for additional information */
$('#btn_applicant_info4').click(function(){  
	var currency=$("#currency").val();
	var average_sales=$("#average_sales").val();
	var average_salaries=$("#average_salaries").val();
	var average_budget=$("#average_budget").val();
	var average_net_profit=$("#average_net_profit").val();
	
	$("#err_currency").html('');
	$("#err_average_sales").html('');
	$("#err_average_salaries").html('');
	$("#err_average_budget").html('');
	$("#err_average_net_profit").html('');

	var flag=1;

	if(currency=="")
	{
		$("#err_currency").html('Select currency.');
		flag=0;
	}
	if(average_sales=="")
	{
		$("#err_average_sales").html('Enter average monthly sales.');
		flag=0;
	}
	if(average_salaries=="")
	{
		$("#err_average_salaries").html('Enter average monthly salaries.');
		flag=0;
	}
	if(average_budget=="")
	{
		$("#err_average_budget").html('Enter average monthly budget.');
		flag=0;
	}
	if(average_net_profit=="")
	{
		$("#err_average_net_profit").html('Enter average monthly net profit.');
		flag=0;
	}
	if(flag==1)
	{
		return true;
	}
	else
	{
		return false;
	}
});

/* end of additional information */
});