<!-- Page Sidebar Start-->
<?php 
$sessiondata=$this->session->userdata('talogged_in');
//print_r($sessiondata);exit;
$session_admin_id=$sessiondata['admin_id']; 
$session_admin_name=$sessiondata['admin_name'];
$session_user_type=$sessiondata['user_type'];
?>
<?php if($session_user_type=='BusinessOwner')
	{ ?>
        <div class="page-sidebar" style="width:270px;">
            <div class="main-header-left d-none d-lg-block">
                <div class="logo-wrapper"><a href="<?php echo base_url();?>backend/dashboard"><img class="blur-up lazyloaded" src="<?php echo base_url();?>templates/admin/assets/images/logo.svg" alt="" style="width:179px;height:79px;"></a></div>
            </div>
            <div class="sidebar custom-scrollbar">
               
                <ul class="sidebar-menu">
                    <li><a class="sidebar-header" href="<?php echo base_url('backend');?>/dashboard"><i data-feather="home"></i><span>DASHBOARD</span></a></li>
                    <li><a class="sidebar-header" href="<?php echo base_url('backend');?>/Customer/manageCustomer"><i data-feather="home"></i><span>Manage Customer</span></a></li>
					<li><a class="sidebar-header" href="<?php echo base_url('backend');?>/IPtypeindustries"><i data-feather="home"></i><span>IP Type Industries</span></a></li>
					
                    <li><a class="sidebar-header" href="<?php echo base_url('backend');?>/ipcertificate"><i data-feather="home"></i><span>IP Certificate Management</span></a></li>
                    <li><a class="sidebar-header" href="<?php echo base_url('backend');?>/IP_work_object/manageWorkObject"><i data-feather="home"></i><span>IP Work Object</span></a></li>
                    <li><a class="sidebar-header" href="<?php echo base_url('backend');?>/IP_work_type/manageWorkType"><i data-feather="home"></i><span>IP Work Type</span></a></li>
                    <li><a class="sidebar-header" href="<?php echo base_url('backend');?>/NiceClassification/manageNiceClassification"><i data-feather="home"></i><span>Nice Classification</span></a></li>
                    <li><a class="sidebar-header" href="<?php echo base_url('backend');?>/PackageManagement/managePackageManagement"><i data-feather="home"></i><span>Package Management</span></a></li>
                    <li><a class="sidebar-header" href="<?php echo base_url('backend');?>/ServicePackages/manageServicePackages"><i data-feather="home"></i><span>Service Packages</span></a></li>
                    <li><a class="sidebar-header" href="<?php echo base_url('backend');?>/coverage"><i data-feather="home"></i><span>Coverage Management</span></a></li>
                    <li><a class="sidebar-header" href="<?php echo base_url('backend');?>/industries"><i data-feather="home"></i><span>Protected Industries</span></a></li>
                    <li><a class="sidebar-header" href="<?php echo base_url('backend');?>/cms/managecms"><i data-feather="home"></i><span>Manage CMS</span></a></li>
                    <li><a class="sidebar-header" href="<?php echo base_url('backend');?>/Testimonials/manageTestimonials"><i data-feather="home"></i><span>Manage Testimonials</span></a></li>
                    
					<li><a class="sidebar-header" href="javascript:void(0);"><i data-feather="settings"></i> <span>SETTINGS</span></a></li>
					
                </ul>
            </div>
        </div>
<?php }  ?>		
<!-- Page Sidebar Ends-->