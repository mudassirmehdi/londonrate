<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller {

	public function __construct()
	{
		 parent::__construct();
		 $this->load->model('adminModel/Dashboard_model');
		 if(! $this->session->userdata('talogged_in'))
		 {
			redirect('backend/login', 'refresh');
		 }
	}
	public function index()
	{		
		$data['page_title']='Dashboard';
		/*
		$data['getTotalUsers']=$this->Dashboard_model->getTotalUsers();
		$data['getTotalstores']=$this->Dashboard_model->getTotalStores();
		
		
		$data['getTotalitems']=$this->Dashboard_model->getTotalItems();
		$data['getTotalTaladorders']=$this->Dashboard_model->getTotalOrders('talad');
		$data['getTotalVirtaulorders']=$this->Dashboard_model->getTotalOrders('virtual');
		
		$data['getTotalTrendingItems']=$this->Dashboard_model->getTrendingItemLits();
		$data['getTopStores']=$this->Dashboard_model->getTopStores();
		
		$data['getLatestCustomers']=$this->Dashboard_model->getLatestCustomers();
		
		$data['getLoyalCustomers']=$this->Dashboard_model->getLoyalCustomers();
		
		
		$alltotalstorecommission=$this->Dashboard_model->getTotalStoreCommission();
		$all_store_commission=$alltotalstorecommission[0]['all_store_commission'];
		
		$getAllOrdersTotal=$this->Dashboard_model->getAllOrdersTotal();
		$data['all_order_amount']=$getAllOrdersTotal[0]['all_order_amount'];
			
		//$data['total_revenue']=$all_order_amount-$all_store_commission;
		
		
		$data['getAllSuppliers']=$this->Dashboard_model->mostordersupplier();
		$today=date('Y-m-d');
		//$today="2021-07-07";
		
		//echo $this->db->last_query();exit;
		*/
		
		$this->load->view('admin/admin_header',$data);			
		$this->load->view('admin/admin_right',$data);			
		$this->load->view('admin/dashboardtemp',$data);
		$this->load->view('admin/admin_footer',$data);
	}
	
	function week_start_end_by_date($date, $format = 'Ymd') 
	{
   
		//Is $date timestamp or date?
		if (is_numeric($date) AND strlen($date) == 10) 
		{
			$time = $date;
		}
		else
		{
			$time = strtotime($date);
		}
	   
		$week['week'] = date('W', $time);
		$week['year'] = date('o', $time);
		$week['year_week']           = date('oW', $time);
		$first_day_of_week_timestamp = strtotime($week['year']."W".str_pad($week['week'],2,"0",STR_PAD_LEFT));
		$week['first_day_of_week']   = date($format, $first_day_of_week_timestamp);
		$week['first_day_of_week_timestamp'] = $first_day_of_week_timestamp;
		$last_day_of_week_timestamp = strtotime($week['first_day_of_week']. " +6 days");
		$week['last_day_of_week']   = date($format, $last_day_of_week_timestamp);
		$week['last_day_of_week_timestamp']  = $last_day_of_week_timestamp;
	   
		return $week;
	}
}

