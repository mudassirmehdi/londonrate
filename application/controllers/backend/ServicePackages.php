<?php
defined('BASEPATH') OR exit('No direct scrt access allowed');
class ServicePackages extends CI_Controller {
	public function __construct()
	{
		 parent::__construct();
		 $this->load->library("pagination");
		
		$this->load->model('adminModel/ServicePackages_model');		 
		 if(! $this->session->userdata('talogged_in'))
		 {
			redirect('backend/login', 'refresh');
		 }
	}
	public function manageServicePackagesExcel()
	{
		$data['page_title']='Manage Service Packages';
		
		$order_id=$package_name=$applicant_name=$country_name=$from_date=$to_date=$pay_status='Na';


		if($this->uri->segment(4)!='')
		{
			if($this->uri->segment(4)!="Na")
			{
				$order_id=$this->uri->segment(4);
			}
			else
			{
				$order_id='Na';
			}

		}
		
		if($this->uri->segment(5)!="")
		{
			if($this->uri->segment(5)!="Na")
			{
				$package_name=$this->uri->segment(5);
			}  
		}
		
		if($this->uri->segment(6)!="")
		{
			if($this->uri->segment(6)!="Na")
			{
				$applicant_name=$this->uri->segment(6);
			}  
		}

		if($this->uri->segment(7)!="")
		{
			if($this->uri->segment(7)!="Na")
			{
				$country_name=$this->uri->segment(7);
			}  
		}
		if($this->uri->segment(8)!="")
		{
			if($this->uri->segment(8)!="Na")
			{
				$from_date=$this->uri->segment(8);
			}  
		}
		if($this->uri->segment(9)!="")
		{
			if($this->uri->segment(9)!="Na")
			{
				$to_date=$this->uri->segment(9);
			}  
		}
		if($this->uri->segment(10)!="")
		{
			if($this->uri->segment(10)!="Na")
			{
				$pay_status=$this->uri->segment(10);
			}  
		}

		$output="";
		
		$usersData = $this->ServicePackages_model->getAllServicePackagesExcel($order_id,$package_name,$applicant_name,$country_name,$from_date,$to_date,$pay_status);


		$this->load->library("excel");

		  $object = new PHPExcel();

		  $object->setActiveSheetIndex(0);

		  $table_columns = array("Order ID", "Packages Name", "Applicant Name", "Country", "Added date", "Status");

		  $column = 0;

		  foreach($table_columns as $field)
		  {
		   $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
		   $column++;
		  }

		 

		  $excel_row = 2;

		  foreach($usersData as $us)
		  {
		   

		   $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, ucfirst($us['order_no']));
		   $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, ucfirst($us['package_name']));
		   $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, ucfirst($us['applicant_name']));
		   $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, ucfirst($us['country_name']));
		   $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, date('d-m-Y',strtotime($us['addeddate'])));
		   $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, ucfirst($us['payment_status']));
		   $excel_row++;
		  }

  		$object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Package_report.xls"');
        $object_writer->save('php://output');

		/*if(count($usersData)>0)
		{
			$output.="<table><thead>
										<tr>												
											<th>Sr.No</th>
											<th>Order ID</th>
											<th>Packages Name</th>
											<th>Applicant Name</th>
											<th>Country</th>

											<th>Addeddate</th>
											<th>Status</th>
											<!-- <th>Status</th> -->
											
										</tr>											
									</thead>											
									<tbody>	";
									$i=1;
			foreach($usersData as $us)
			{	
				$output.="<tr>
						<td>".$i++."</td>
						<td>".ucfirst($us['order_no'])."</td>
						<td>".ucfirst($us['package_name'])."</td>
						<td>".ucfirst($us['applicant_name'])."</td>
						<td>".ucfirst($us['country_name'])."</td>
						
						<td>".date('d-m-Y',strtotime($us['addeddate']))."</td>
						<td>".ucfirst($us['payment_status'])."</td>
						
						
					</tr>	";
			}
			$output.="</table>";

			header('Content-Type:application/xls');
			header('Content-Disposition:attachment;filename=report.xls');
			echo $output;*/
		//}
	}
	/*public function manageServicePackagesDelete()
	{
		$data['page_title']='Manage Service Packages';
		
		$check_list='Na';


		if($this->uri->segment(4)!='')
		{
			if($this->uri->segment(4)!="Na")
			{
				$check_list=$this->uri->segment(4);
			}
			else
			{
				$check_list='Na';
			}

		}
		
		
		$output="";
		
		if(!empty($check_list)) 
		{
			    foreach($check_list as $check) 
			    {		
			    		echo "<pre>";
			            print_r($check); 
			            //echoes the value set in the HTML form for each checked checkbox.
			                         //so, if I were to check 1, 3, and 5 it would echo value 1, value 3, value 5.
			                         //in your case, it would echo whatever $row['Report ID'] is equivalent to.
			    }
		}
	}*/
	public function mpServicePackageSearch()
	{
		
		//print_r($_REQUEST); exit;
		$order_id=$package_name=$applicant_name=$country_name=$from_date=$to_date=$pay_status=$check_list='Na';
		
		$session_data=$this->session->userdata('logged_in');
		
		if(isset($_POST['btn_clear']))
		{
			 redirect(base_url("backend/").'ServicePackages/manageServicePackages/');
		}
		  
		if(isset($_POST['btn_search']))
		{
		   
		    if($_POST['order_id']!="")
		   {
		   	
			   $order_id=trim($_POST['order_id']);
			  
		   }
		    if($_POST['package_name']!="")
		   {
			   $package_name=trim($_POST['package_name']);
			   $package_name = str_replace('%20', ' ', $package_name);
		   }
		     if($_POST['applicant_name']!="")
		   {
			   $applicant_name=trim($_POST['applicant_name']);
			   
			   $applicant_name = str_replace('%20', ' ', $applicant_name);
		   }  
		   if($_POST['country_name']!="")
		   {
			   $country_name=trim($_POST['country_name']);
			   
			   //$country_name = str_replace('%20 ', ' ', $country_name);
		   }  

		   if($_POST['from_date']!="")
		   {
			   $from_date=trim($_POST['from_date']);
			  
		   }  
		   if($_POST['to_date']!="")
		   {
			   $to_date=trim($_POST['to_date']);
			  
		   } 
		   if($_POST['pay_status']!="")
		   {
			   $pay_status=trim($_POST['pay_status']);
			  
		   }   
		 
			redirect(base_url("backend/").'ServicePackages/manageServicePackages/'.$order_id.'/'.$package_name.'/'.$applicant_name.'/'.$country_name.'/'.$from_date.'/'.$to_date.'/'.$pay_status);
		}	
		if(isset($_POST['btn_export']))
		{
		   
		    if($_POST['order_id']!="")
		   {
		   	
			   $order_id=trim($_POST['order_id']);
			  
		   }
		    if($_POST['package_name']!="")
		   {
			   $package_name=trim($_POST['package_name']);
			   $package_name = str_replace('%20', ' ', $package_name);
		   }
		     if($_POST['applicant_name']!="")
		   {
			   $applicant_name=trim($_POST['applicant_name']);
			   
			   $applicant_name = str_replace('%20', ' ', $applicant_name);
		   }  
		   if($_POST['country_name']!="")
		   {
			   $country_name=trim($_POST['country_name']);
			   
			   //$country_name = str_replace('%20 ', ' ', $country_name);
		   }  

		   if($_POST['from_date']!="")
		   {
			   $from_date=trim($_POST['from_date']);
			  
		   }  
		   if($_POST['to_date']!="")
		   {
			   $to_date=trim($_POST['to_date']);
			  
		   } 
		   if($_POST['pay_status']!="")
		   {
			   $pay_status=trim($_POST['pay_status']);
			  
		   }   
		 
			redirect(base_url("backend/").'ServicePackages/manageServicePackagesExcel/'.$order_id.'/'.$package_name.'/'.$applicant_name.'/'.$country_name.'/'.$from_date.'/'.$to_date.'/'.$pay_status);
		}	
		   
		  
		redirect(base_url("backend/").'ServicePackages/manageServicePackages/');		
	}
	// code for manage Transaction
	public function manageServicePackages()
	{
		$data['page_title']='Manage Service Packages';
		
		$order_id=$package_name=$applicant_name=$country_name=$from_date=$to_date=$pay_status='Na';


		if($this->uri->segment(4)!='')
		{
			if($this->uri->segment(4)!="Na")
			{
				$order_id=$this->uri->segment(4);
			}
			else
			{
				$order_id='Na';
			}

		}
		
		if($this->uri->segment(5)!="")
		{
			if($this->uri->segment(5)!="Na")
			{
				$package_name=$this->uri->segment(5);
			}  
		}
		
		if($this->uri->segment(6)!="")
		{
			if($this->uri->segment(6)!="Na")
			{
				$applicant_name=$this->uri->segment(6);
			}  
		}

		if($this->uri->segment(7)!="")
		{
			if($this->uri->segment(7)!="Na")
			{
				$country_name=$this->uri->segment(7);
			}  
		}
		if($this->uri->segment(8)!="")
		{
			if($this->uri->segment(8)!="Na")
			{
				$from_date=$this->uri->segment(8);
			}  
		}
		if($this->uri->segment(9)!="")
		{
			if($this->uri->segment(9)!="Na")
			{
				$to_date=$this->uri->segment(9);
			}  
		}
		if($this->uri->segment(10)!="")
		{
			if($this->uri->segment(10)!="Na")
			{
				$pay_status=$this->uri->segment(10);
			}  
		}

		
		$data['bannercnt']= $config["total_rows"] = $this->ServicePackages_model->ServicePackages_record_count($order_id,$package_name,$applicant_name,$country_name,$from_date,$to_date,$pay_status);

		$config = array();
		$config["base_url"] = base_url("backend/") . "ServicePackages/manageServicePackages/".$order_id."/".$package_name."/".$applicant_name."/".$country_name."/".$from_date."/".$to_date."/".$pay_status;
		$config['per_page'] = 25;
		$config["uri_segment"] = 11;
		$config['full_tag_open'] = '<ul class="pagination">'; 
		$config['full_tag_close'] = '</ul>';
		$config['first_tag_open'] = "<li class='paginate_button  page-item'>";
		$config['first_tag_close'] = "</li>"; 
		$config['prev_tag_open'] =	"<li class='paginate_button  page-item'>"; 
		$config['prev_tag_close'] = "</li>";
		$config['next_tag_open'] = "<li class='paginate_button  page-item'>";
		$config['next_tag_close'] = "</li>"; 
		$config['last_tag_open'] = "<li class='paginate_button  page-item'>"; 
		$config['last_tag_close'] = "</li>";
		$config['cur_tag_open'] = "<li class='paginate_button  page-item active'><a class='page-link active' href=''>"; 
		$config['cur_tag_close'] = "</a></li>";
		$config['num_tag_open'] = "<li class='paginate_button  page-item'>";
		$config['num_tag_close'] = "</li>"; 
		$config['attributes'] =array('class' => 'page-link');
		$config["total_rows"] =$data['bannercnt'];
		#echo "<pre>"; print_r($config); exit;
		$this->pagination->initialize($config);
				
		$page = ($this->uri->segment(11)) ? $this->uri->segment(11) : 0;
		$data["total_rows"] = $config["total_rows"]; 
		$data["links"] = $this->pagination->create_links();
		
		$data['page']=$page;
		$data['ServicePackages_master']=$this->ServicePackages_model->getAllServicePackages($order_id,$package_name,$applicant_name,$country_name,$from_date,$to_date,$pay_status,$config["per_page"],$page);
		#echo $this->db->last_query();exit;
		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/admin_right',$data);
		$this->load->view('admin/manage_ServicePackages',$data);
		$this->load->view('admin/admin_footer');
	}
	
	
	public function addServicePackages()
	{
		$data['page_title']='Add  Service Packages';
		
		$data['error_msg']='';
		if(isset($_POST['btn_addcms']))
		{
			$this->form_validation->set_rules('type_name','type Name','required');
					$this->form_validation->set_rules('nice_name','Classification Name','required');
					$this->form_validation->set_rules('sel_object','Object','required');	
						
			
			if($this->form_validation->run())
			{
				$nice_name=$this->input->post('nice_name');
				$type_name=$this->input->post('type_name');
				$sel_object=$this->input->post('sel_object');		
				$page_status=$this->input->post('page_status');	
				// check already category exists
				$category_exists=$this->ServicePackages_model->check_pageName($nice_name);
				//echo $this->db->last_query();exit;
				if($category_exists==0)
				{
						
						$input_data=array('nice'=>$nice_name,'object_id'=>$sel_object,'type_id'=>$type_name,'status'=>$page_status);
						$cms_id=$this->ServicePackages_model->add_ServicePackages($input_data);
						//echo $this->db->last_query();exit;
						if($cms_id>0)
						{
							$this->session->set_flashdata('success',' Service Packages added successfully');
							redirect(base_url("backend/").'ServicePackages/manageServicePackages');
						}
						else
						{
							$this->session->set_flashdata('success','Error while adding  Service Packages');
							redirect(base_url("backend/").'ServicePackages/addServicePackages');
						}
				}
				else
				{
						$this->session->set_flashdata('error',' Service Packages already exists.');
						redirect(base_url("backend/").'ServicePackages/addServicePackages');			
				}
			}
			else
			{
					$this->session->set_flashdata('error',$this->form_validation->error_string());
					redirect(base_url("backend/").'ServicePackages/addServicePackages');			
			}
		}
		
		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/admin_right',$data);
		$this->load->view('admin/addServicePackages',$data);
		$this->load->view('admin/admin_footer');
	}
	
	// code for update category
	public function updateServicePackages()
	{
		$data['page_title']='Update  Service Packages';
		$data['error_msg']='';
		$page_id=base64_decode($this->uri->segment(4));

		if($page_id)
		{
			$cmsInfo=$this->ServicePackages_model->getSingleServicePackagesInfo($page_id,0);
			 
			if($cmsInfo>0)
			{
				$data['ServicePackagesInfo']=$this->ServicePackages_model->getSingleServicePackagesInfo($page_id,1);
				
				if(isset($_POST['btn_updateServicePackages']))
				{
					$this->form_validation->set_rules('type_name','type Name','required');
					$this->form_validation->set_rules('nice_name','Classification Name','required');
					$this->form_validation->set_rules('sel_object','Object','required');	
						
						if($this->form_validation->run())
						{
							$nice_name=$this->input->post('nice_name');
							$type_name=$this->input->post('type_name');
							$sel_object=$this->input->post('sel_object');		
							$page_status=$this->input->post('page_status');	
						$num_category=$this->ServicePackages_model->check_typeName_upt($type_name,$page_id); 
						//echo $this->db->last_query();exit;
						
						if($num_category==0)
						{
							
							$input_data=array('nice'=>$nice_name,'object_id'=>$sel_object,'type_id'=>$type_name,'status'=>$page_status);
													
							$page_idd=$this->ServicePackages_model->upt_ServicePackages($input_data,$page_id);
							//echo $this->db->last_query();exit;
							if($page_idd)
							{	// echo '///';exit;
								$this->session->set_flashdata('success',' Service Packages updated successfully.');
								redirect(base_url("backend/").'ServicePackages/manageServicePackages');	
							}
							else
							{
								$this->session->set_flashdata('error','Error while updating  Service Packages.');
								redirect(base_url("backend/").'ServicePackages/updateServicePackages/'.base64_encode($page_id));
							}							
						}
						else
						{
								$this->session->set_flashdata('error',' Service Packages name already exists.');
								redirect(base_url("backend/").'ServicePackages/updateServicePackages/'.base64_encode($page_id));								
						}
					}
					else
					{
						$this->session->set_flashdata('error',$this->form_validation->error_string());
						redirect(base_url("admin/").'ServicePackages/updateServicePackages/'.base64_encode($page_id));
					}
				}
			}
			else
			{
				$data['error_msg']=' Service Packages is not found.';
			}
		}
		else
		{
			$this->session->set_flashdata('error',' Service Packages is not found.');
			redirect(base_url("backend/").'ServicePackages/updateServicePackages/'.base64_encode($page_id));
		}
		
		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/admin_right',$data);
		$this->load->view('admin/updateServicePackages',$data);
		$this->load->view('admin/admin_footer');
	}
	
	
	public function deleteServicePackages()
	{

		//header("Content-Length: xxx");
		$data['page_title']='Delete  Service Packages';
		$data['error_msg']='';
		$page_id=$_POST['service_id'];//base64_decode($this->uri->segment(4));

		if($page_id)
		{
			$delcat="";
			$srid=explode(',',$page_id);
			
			for($i=0;$i<count($srid);$i++)
			{
				if($srid[$i]!="")
				{

					$delcat=$this->ServicePackages_model->deleteservicepackages($srid[$i]);
					
				}
			}
			echo "Service Packages deleted successfully.";
			
				/*$this->session->set_flashdata('success',' Service Packages deleted successfully.');
				redirect(base_url("backend/").'ServicePackages/manageServicePackages');	*/
				
		}
		
	}
	
	public function viewServicePackages()
	{
		$data['title']='View Service Packages';

		$pack_id=base64_decode($this->uri->segment(4));
		
		$data['packInfo']=$ServicePackages=$this->ServicePackages_model->getSingleServicePackagesInfo($pack_id,1);
		//echo $this->db->last_query();exit;

		$data['works_informationdeatilsInfo']=$works_information=$this->ServicePackages_model->getServicePackages_works_informationInfo($pack_id);
		$data['main_productInfo']=$this->ServicePackages_model->getServicePackagesmain_productsInfo($pack_id);

		$data['potential_competitorInfo']=$this->ServicePackages_model->getServicePackagespotential_competitorInfo($pack_id);
		$data['potential_customerInfo']=$this->ServicePackages_model->getServicePackagespotential_customerInfo($pack_id);
		
		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/admin_right',$data);
		$this->load->view('admin/viewServicePackagesDetails',$data);
		$this->load->view('admin/admin_footer');
	}

}

?>