<?php

Class Dashboard_model extends CI_Model {

	function __construct()

	{

		// Call the Model constructor

		parent::__construct();

	}

	public function getTotalUsers()
	{
		$this->db->select(TBPREFIX.'customers.customer_id');
		$this->db->where('customer_status','Active');
		$res=$this->db->get(TBPREFIX.'customers');
		return $res->num_rows();
	}
	
public function getTotalStores()
	{
		$this->db->select(TBPREFIX.'stores.store_id');
		$this->db->where('store_status','Active');
		$res=$this->db->get(TBPREFIX.'stores');
		return $res->num_rows();
	}
	
public function getTotalOrders($orderfrm)
	{
		$this->db->select(TBPREFIX.'product_orders.order_id');
		if($orderfrm=="talad")
		{
			$this->db->where('store_id','0');
		}
		else
		{
			$this->db->where('store_id >','0');
		}
		$res=$this->db->get(TBPREFIX.'product_orders');
		return $res->num_rows();
	}
	
	public function getTotalItems()
	{
		$this->db->select(TBPREFIX.'products.product_id');
		$this->db->where('store_id','0');
		$res=$this->db->get(TBPREFIX.'products');
		return $res->num_rows();
	}
	public function itmeordercount($product_id)
	{
		$this->db->select(TBPREFIX.'product_order_details.product_id');
		$this->db->where('product_id',$product_id);
		$res=$this->db->get(TBPREFIX.'product_order_details');
		return $res->num_rows();
	}
	
	public function getTrendingItemLits()
	{
		$this->db->select(TBPREFIX.'products.*');
		$this->db->where('is_trending','Yes');
		$this->db->limit(5);
		$this->db->order_by('product_id','DESC');
		$res=$this->db->get(TBPREFIX.'products');
		return $res->result_array();
	}
	
	
	public function getProductImages($product_id)
	{
		$this->db->where('product_id',$product_id);	  
		$this->db->select('image_name');
		$this->db->order_by('image_id','ASC');
		$this->db->limit(1);
		$res=$this->db->get(TBPREFIX.'products_images');
		return $tsr=$res->result_array();
	}
	
	public function getTopStores()
	{
	 	 $sql="SELECT COUNT(".TBPREFIX."product_orders.store_id) AS CNT_STORES ,".TBPREFIX."product_orders.store_id,".TBPREFIX."stores.store_name,".TBPREFIX."stores.store_contact_number,".TBPREFIX."stores.store_owner_email FROM ".TBPREFIX."product_orders join ".TBPREFIX."stores on ".TBPREFIX."product_orders.store_id=".TBPREFIX."stores.store_id  GROUP BY ".TBPREFIX."product_orders.store_id HAVING COUNT(".TBPREFIX."product_orders.store_id) >= 1 order by COUNT(".TBPREFIX."product_orders.store_id) desc limit 5";
	
		$query=$this->db->query($sql);
		return $query->result_array();
	}
	
	public function getLoyalCustomers()
	{
	 	 $sql="SELECT COUNT(".TBPREFIX."product_orders.customer_id) AS CNT_CUSTOMERS ,".TBPREFIX."product_orders.customer_id,".TBPREFIX."customers.first_name,".TBPREFIX."customers.last_name ,customer_photo,mobile_number,country_code FROM ".TBPREFIX."product_orders join ".TBPREFIX."customers on ".TBPREFIX."product_orders.customer_id=".TBPREFIX."customers.customer_id GROUP BY ".TBPREFIX."product_orders.customer_id HAVING COUNT(".TBPREFIX."product_orders.customer_id) >= 1 order by COUNT(".TBPREFIX."product_orders.customer_id) desc limit 0,5";
	
		$query=$this->db->query($sql);
		return $query->result_array();
	}
	
	
	public function getTotalStoreCommission()
	{
		$this->db->select('SUM(store_commission_amount) AS all_store_commission');
		$res=$this->db->get(TBPREFIX.'stores');
		return $res->result_array();
	}
	
	public function getAllOrdersTotal()
	{
		$this->db->select('SUM(order_amount) AS all_order_amount');
		$this->db->where('order_status','order_delivered');
		$res=$this->db->get(TBPREFIX.'product_orders');
		return $res->result_array();
	}
	
	public function mostordersupplier()
	{
	 	 $sql="SELECT COUNT(".TBPREFIX."products.supplier_name) AS CNT_SUPPLIERS ,supplier_photo,".TBPREFIX."products.supplier_name,".TBPREFIX."supplier.full_name FROM ".TBPREFIX."products join ".TBPREFIX."supplier on ".TBPREFIX."products.supplier_name=".TBPREFIX."supplier.supplier_id GROUP BY ".TBPREFIX."products.supplier_name HAVING COUNT(".TBPREFIX."products.supplier_name) >= 1 order by COUNT(".TBPREFIX."products.supplier_name) desc limit 0,5";
	
		$query=$this->db->query($sql);
		return $query->result_array();
	}
	
	public function displaylast5orders($order_report_start,$order_report_end)
	{
		if($order_report_start!="" && $order_report_end=="")
		{
			$this->db->where('DATE('.TBPREFIX.'product_orders.order_date)',$order_report_start);	   
		}
		if($order_report_start!="" && $order_report_end!="")
		{
			$this->db->where('DATE('.TBPREFIX.'product_orders.order_date) >=',$order_report_start);	 
$this->db->where('DATE('.TBPREFIX.'product_orders.order_date) <=',$order_report_end);	 			
		}
		$this->db->select(TBPREFIX.'product_orders.*,first_name,last_name');
		$this->db->where('store_id',0);
		$this->db->join(TBPREFIX.'customers',TBPREFIX.'customers.customer_id='.TBPREFIX.'product_orders.customer_id','left');
		$this->db->order_by(TBPREFIX.'product_orders.order_id','DESC');
		$this->db->limit(5);
		$res=$this->db->get(TBPREFIX.'product_orders');
		return $res->result_array();
	}
	
	public function getProducthistory($order_id)
	{
		$this->db->select(TBPREFIX.'products.product_id,product_name,discount_price');
		$this->db->where(TBPREFIX.'product_order_details.order_id',$order_id);
		$this->db->join(TBPREFIX.'products',TBPREFIX.'product_order_details.product_id='.TBPREFIX.'products.product_id','left');
		$query=$this->db->get(TBPREFIX.'product_order_details');
		return $query->result_array();		
	}
	
	public function getCustomerName($customer_id)
	{
		$this->db->select('first_name,last_name');
		$this->db->where(TBPREFIX.'customers.customer_id',$customer_id);
		$query=$this->db->get(TBPREFIX.'customers');
		return $query->result_array();		
	}
	
	public function displaylast5revenue($type,$order_report_start,$order_report_end)
	{
		if($order_report_start!="" && $order_report_end=="")
		{
			$this->db->where('DATE('.TBPREFIX.'product_orders.order_date)',$order_report_start);	   
		}
		if($order_report_start!="" && $order_report_end!="")
		{
			$this->db->where('DATE('.TBPREFIX.'product_orders.order_date) >=',$order_report_start);	 
$this->db->where('DATE('.TBPREFIX.'product_orders.order_date) <=',$order_report_end);	 			
		}
		$this->db->select(TBPREFIX.'product_orders.*,first_name,last_name,mobile_number,country_code');
		$this->db->where(TBPREFIX.'product_orders.store_id',0);
		if($type=="Cash")
		{
			$this->db->where(TBPREFIX.'product_order_transaction.payment_type','cod');
			$this->db->where(TBPREFIX.'product_order_transaction.payment_status','Successful');
		}
		else 
		{
			$this->db->where(TBPREFIX.'product_order_transaction.payment_type !=','cod');
			$this->db->where(TBPREFIX.'product_order_transaction.payment_status','Successful');
		}
		
		
		$this->db->join(TBPREFIX.'customers',TBPREFIX.'customers.customer_id='.TBPREFIX.'product_orders.customer_id','left');
		$this->db->join(TBPREFIX.'product_order_transaction',TBPREFIX.'product_order_transaction.order_id='.TBPREFIX.'product_orders.order_id','left');
		$this->db->order_by(TBPREFIX.'product_orders.order_id','DESC');
		$this->db->limit(5);
		$res=$this->db->get(TBPREFIX.'product_orders');
		return $res->result_array();
	}

public function getLatestCustomers()
	{
		$this->db->select(TBPREFIX.'customers.customer_id,first_name,last_name,customer_photo,mobile_number,country_code');
		$this->db->where('customer_status','Active');
		$this->db->limit(5);
		$this->db->order_by(TBPREFIX.'customers.customer_id','DESC');
		$res=$this->db->get(TBPREFIX.'customers');
		return $res->result_array();
	}	
}