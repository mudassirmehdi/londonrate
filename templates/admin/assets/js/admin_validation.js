
// function for loading ip certificate
function get_type_certificate(typeid)
{
	var typeid=typeid;
	//$("#store_category").html('');
	if(typeid!='')
	{
	$.ajax({
			type: "POST",
			url: BASEPATH+"industries/ajaxgettypecertificate",
			data:'typeid='+typeid,
			dataType: 'json',
			success: function(response)
			{
				$("#cert_id").html(response.resstr);
			}
			});
	}
}


// code for all manage pages



function chk_isDeleteComnfirm()



{



	if(confirm("Are you really want to delete record?"))



		return true;



	else



		return false;



}


