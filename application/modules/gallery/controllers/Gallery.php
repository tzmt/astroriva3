<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends MX_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('layout');
		$query = $this->db->get_where('settings',array('id'=>1))->row();
		define('LOGO',$query->logo);
		define('FAVICON',$query->favicon);		
	}

	public function index()
	{
		$data['gallery'] = $this->db->get('gallery')->result();

		$data['title'] = "Gallery - Astroriva.com";
		$data['description'] = "Here contains some of the precious moments captured in our photo.";
		$this->layout->view('gallery',$data,'normal');				
	}
}
