<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends MX_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('layout');
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
		$data['gallery'] = $this->db->get('gallery')->result();
		$this->layout->view('gallery',$data,'normal');				
	}
}
