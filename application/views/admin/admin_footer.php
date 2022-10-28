<!-- footer start-->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 footer-copyright">
                        <p class="mb-0">Copyright <?php echo date('Y');?> © Londonrate All rights reserved.</p>
                    </div>
                    <div class="col-md-6">
                        <p class="pull-right mb-0">Hand crafted & made with<i class="fa fa-heart"></i></p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer end-->
    </div>

</div>

<!-- latest jquery-->
<script src="<?php echo base_url('templates/admin/');?>assets/js/jquery-3.3.1.min.js"></script>

<!-- Bootstrap js-->
<script src="<?php echo base_url('templates/admin/');?>assets/js/popper.min.js"></script>
<script src="<?php echo base_url('templates/admin/');?>assets/js/bootstrap.js"></script>

	<script src="<?php echo base_url('templates/admin/');?>assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

<!-- feather icon js-->
<script src="<?php echo base_url('templates/admin/');?>assets/js/icons/feather-icon/feather.min.js"></script>
<script src="<?php echo base_url('templates/admin/');?>assets/js/icons/feather-icon/feather-icon.js"></script>




<!--Timepicker jquery-->
<script src="<?php echo base_url('templates/admin/');?>assets/scss/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>

<!-- Sidebar jquery-->
<script src="<?php echo base_url('templates/admin/');?>assets/js/sidebar-menu.js"></script>

<!--chartist js-->
<script src="<?php echo base_url('templates/admin/');?>assets/js/chart/chartist/chartist.js"></script>

<!--chartjs js-->
<script src="<?php echo base_url('templates/admin/');?>assets/js/chart/chartjs/chart.min.js"></script>

<!-- lazyload js-->
<script src="<?php echo base_url('templates/admin/');?>assets/js/lazysizes.min.js"></script>

<!--copycode js-->
<script src="<?php echo base_url('templates/admin/');?>assets/js/prism/prism.min.js"></script>
<script src="<?php echo base_url('templates/admin/');?>assets/js/clipboard/clipboard.min.js"></script>
<script src="<?php echo base_url('templates/admin/');?>assets/js/custom-card/custom-card.js"></script>

<!--counter js-->
<script src="<?php echo base_url('templates/admin/');?>assets/js/counter/jquery.waypoints.min.js"></script>
<script src="<?php echo base_url('templates/admin/');?>assets/js/counter/jquery.counterup.min.js"></script>
<script src="<?php echo base_url('templates/admin/');?>assets/js/counter/counter-custom.js"></script>

<!--peity chart js-->
<script src="<?php echo base_url('templates/admin/');?>assets/js/chart/peity-chart/peity.jquery.js"></script>

<!--sparkline chart js-->
<script src="<?php echo base_url('templates/admin/');?>assets/js/chart/sparkline/sparkline.js"></script>

<!--Customizer admin-->
<script src="<?php echo base_url('templates/admin/');?>assets/js/admin-customizer.js"></script>

<!--dashboard custom js-->
<script src="<?php echo base_url('templates/admin/');?>assets/js/dashboard/default.js"></script>

<!--right sidebar js-->
<script src="<?php echo base_url('templates/admin/');?>assets/js/chat-menu.js"></script>

<!--height equal js-->
<script src="<?php echo base_url('templates/admin/');?>assets/js/height-equal.js"></script>

<!-- lazyload js-->
<script src="<?php echo base_url('templates/admin/');?>assets/js/lazysizes.min.js"></script>

<!--script admin-->
<script src="<?php echo base_url('templates/admin/');?>assets/js/admin-script.js"></script>
<script src="<?php echo base_url('templates/admin/');?>assets/js/admin_validation.js"></script>

<!-- ckeditor js-->
<script src="<?php echo base_url('templates/admin/');?>assets/js/editor/ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url('templates/admin/');?>assets/js/editor/ckeditor/styles.js"></script>
<script src="<?php echo base_url('templates/admin/');?>assets/js/editor/ckeditor/adapters/jquery.js"></script>
<script src="<?php echo base_url('templates/admin/');?>assets/js/editor/ckeditor/ckeditor.custom.js"></script>


<!-- Rating Js-->
<script src="<?php echo base_url('templates/admin/');?>assets/js/rating/jquery.barrating.js"></script>
<script src="<?php echo base_url('templates/admin/');?>assets/js/rating/rating-script.js"></script>

<!-- Owlcarousel js-->
<script src="<?php echo base_url('templates/admin/');?>assets/js/owlcarousel/owl.carousel.js"></script>
<script src="<?php echo base_url('templates/admin/');?>assets/js/dashboard/product-carousel.js"></script>
<!--Customizer admin-->
<script src="<?php echo base_url('templates/admin/');?>assets/js/admin-customizer.js"></script>

<!-- lazyload js-->
<script src="<?php echo base_url('templates/admin/');?>assets/js/lazysizes.min.js"></script>
<script src="<?php echo base_url('templates/admin/');?>assets/js/admin_validation.js"></script>
<script src="<?php echo base_url('templates/admin/');?>assets/js/backend.js"></script>

<!--Datepicker jquery-->
<script src="<?php echo base_url('templates/admin/');?>assets/js/datepicker/datepicker.js"></script>
<script src="<?php echo base_url('templates/admin/');?>assets/js/datepicker/datepicker.en.js"></script>
<script src="<?php echo base_url('templates/admin/');?>assets/js/datepicker/datepicker.custom.js"></script>

</body>
<script type="text/javascript">
    $(function() {
    $(".checkbox1").click(function(){
        $('#btn_delete').prop('disabled',$('#check_list:checked').length == 0);
        //jQuery('#btn_delete').css('opacity', '1');
    });
});
</script>
<script type="text/javascript">
function chk_isDeleteComnfirmPackage()
{
    if(confirm("Are you really want to delete record?"))
    {
        var final = '';
        $('#check_list:checked').each(function(){        
            var values = $(this).val();
            final += values+",";
        });
        

         $.ajax({
            type:"POST",
            url:"<?php echo base_url();?>backend/ServicePackages/deleteServicePackages",
             data:{
                     service_id:final,
                     
               }              
            }).done(function(message){
                alert(message);

                //alert("Package Delete Successfully");
                //window.location.reload();
               window.location = "<?php print base_url("backend/"); ?>ServicePackages/manageServicePackages";
             });


            /*$.ajax({
                      type: "POST",
                      url: "<?php //echo base_url();?>backend/ServicePackages/deleteServicePackages",
                      data:'service_id='+final,
                      dataType: 'json',
                  success: function(response)
                  {
                    //alert(response);
                     window.location.reload();
                    //$("#virtualstore_id").html(response.str);
                  }
                  });
      */
         
    }
     
}

function getTypeByObject()
{
      var sel_object=document.getElementById('sel_object').value;
      
      $.ajax({
            type:"POST",
            url:"<?php echo base_url();?>backend/NiceClassification/getTypeByObjectId",
             data:{
                     sel_object:sel_object,
                     
               }              
            }).done(function(message){
            
            //alert(message);
                
                  $('#type_name').empty();
                  $('#type_name').append(message);
                  
               
                
             });
}

function getNiceByType()
{
      var sel_object=document.getElementById('sel_object').value;
      var type_name=document.getElementById('type_name').value;
      
      $.ajax({
            type:"POST",
            url:"<?php echo base_url();?>backend/NiceClassification/getNiceByTypeId",
             data:{
                     sel_object:sel_object,
                     type_name:type_name
                     
               }              
            }).done(function(message){
            
            //alert(message);
                
                  $('#classification_name').empty();
                  $('#classification_name').append(message);
                  
               
                
             });
}
/*function getTypeByObjectSearch()
{
      var sel_object=document.getElementById('sel_object').value;
      
      $.ajax({
            type:"POST",
            url:"<?php //echo base_url();?>backend/NiceClassification/getTypeByObjectId",
             data:{
                     sel_object:sel_object,
                     
               }              
            }).done(function(message){
            
            //alert(message);
                
                  $('#type_name').empty();
                  $('#type_name').append(message);
                  
               
                
             });
}*/
</script>
<script src="https://cdn.jsdelivr.net/gh/linways/table-to-excel@v1.0.4/dist/tableToExcel.js"></script>
<script type="text/javascript">
    

$(document).ready(function () {
      $("#exportBtn1").click(function(){
        TableToExcel.convert(document.getElementById("datatable-default"), {
            name: "Traceability.xlsx",
            sheet: {
            name: "Sheet1"
            }
          });
        });
  });
</script>
</html>