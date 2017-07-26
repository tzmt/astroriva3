<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Astrologer_list extends MX_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('layout');
		$this->load->model('astrologer_list_model');
		$query = $this->db->get_where('settings',array('id'=>1))->row();
		define('LOGO',$query->logo);
		define('FAVICON',$query->favicon);
		define('BANNER',$query->banner_image);
		define('PARALLAX1',$query->parallax1);
		define('PARALLAX2',$query->parallax2);
		define('PARALLAX3',$query->parallax3);
	}

	public function index()
	{
		$data['all_data'] = $this->astrologer_list_model->getAstrologerDetails($this->uri->segment(2));
		$data['astrologers'] = $this->astrologer_list_model->getAstrologers($this->uri->segment(2));	
		$data['products'] = $this->astrologer_list_model->getRelatedProducts();
		$this->layout->view('astrologer_details',$data,'normal');
	}

	public function list_astrologer($type)
	{
		if($type == 'premium')
		{			
			$data['astrologers'] = $this->astrologer_list_model->getAstrologersList(1);	
			//$data['products'] = $this->astrologer_model->getRelatedProducts();
			$this->layout->view('astrologer_list',$data,'normal');
		}
		else if($type == 'pannelled')
		{
			$data['astrologers'] = $this->astrologer_list_model->getAstrologersList(2);	
			//$data['products'] = $this->astrologer_model->getRelatedProducts();
			$this->layout->view('astrologer_list',$data,'normal');
		}
		else if($type == 'normal')
		{
			$data['astrologers'] = $this->astrologer_list_model->getAstrologersList(0);	
			//$data['products'] = $this->astrologer_model->getRelatedProducts();
			$this->layout->view('astrologer_list',$data,'normal');
		}
		else
		{
			redirect('home/');
		}
	}

	public function search()
	{
		$search = $_GET['search'];
		$data['astrologers'] = $this->astrologer_list_model->getAstrologerSearch($search);
		$this->layout->view('astrologer_list',$data,'normal');
	}
}
