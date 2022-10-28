<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Paymentmodel extends CI_Model {
	
		public function __construct()
		{
			parent::__construct();
			$this->load->database();
			date_default_timezone_set('Asia/Kolkata');
		}
		public function updatePayStatus($arrUpdateStatus)
		{
			if($arrUpdateStatus['order_id'] != "") 
			{
				if($arrUpdateStatus['order_id'] != "")
					$this->db->set('stripe_pay_id',$arrUpdateStatus['stripe_pay_id']);
		  		
				$this->db->set('payment_status',$arrUpdateStatus['payment_status']);
		  		$this->db->set('payment_response',$arrUpdateStatus['payment_response']);
		  		$this->db->set('dateupdated',$arrUpdateStatus['dateupdated']);
		  		$this->db->where('order_id',$arrUpdateStatus['order_id']);
		  		$this->db->where('transaction_id',$arrUpdateStatus['transaction_id']);
			  	$this->db->update(TBPREFIX.'package_order_transaction'); 
				#echo $this->db->last_query(); exit; 
		  	}
		 
		}	
		
		public function updateOrder($arrPostData,$order_id)
		{
			$this->db->where('pack_id',$order_id);
			$this->db->update(TBPREFIX.'servicepackages',$arrPostData);
			return true;
		}
		
		public function getapllicantinfo($order_id)
		{
			$this->db->select(TBPREFIX.'package_applicants.applicant_name,applicant_email,package_name,order_no,package_amount,package_pdf');
			$this->db->where(TBPREFIX.'servicepackages.pack_id',$order_id);
			$this->db->join(TBPREFIX.'package_applicants',TBPREFIX.'package_applicants.applicant_id='.TBPREFIX.'servicepackages.applicant_id','left');
			$res=$this->db->get(TBPREFIX.'servicepackages');
			return $res->result_array();
		}
	}