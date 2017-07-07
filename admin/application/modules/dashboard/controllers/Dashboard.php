<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MX_Controller{

	public function __construct() {
		parent::__construct();
		$this->load->library('layout');
		$this->load->model('dashboard_model');
		date_default_timezone_set('Asia/Kolkata');
	}
	public function index()
	{
		$data = array();
		$data['visitors'] = $this->dashboard_model->getVisitors();
		$data['total_sales'] = $this->dashboard_model->getTotalSales();
		$data['total_astrologers'] = $this->db->count_all('astrologer');
		$data['total_student'] = $this->db->count_all('student');
		$data['total_orders'] = $this->db->count_all('orders');
		$data['total_buyers'] = $this->db->count_all('user');
		$data['total_contacts'] = $this->db->count_all('contact');
		$data['my_products'] = $this->db->get_where('shop_product',array('type'=>1))->num_rows();
		$data['other_products'] = $this->db->get_where('shop_product',array('type'=>2))->num_rows();
		
		
		$this->layout->view('dashboard',$data,'normal');
	}
	public function random()
	{
		$date = array(1,2,3,4,5,6,7,8,9,10,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31);
		$date1 = "2016-07-".$date[array_rand($date)];
		$vis = rand(000,999);
		if($this->db->get_where('website_traffic',array('date'=>$date1))->num_rows() > 0)
		{
			$this->db->query("UPDATE website_traffic SET visitors = visitors + '$vis' WHERE date = '$date1'");
		}
		else
		{
			$this->db->query("INSERT INTO website_traffic VALUES('','$date1','$vis')");
		}
	}
}