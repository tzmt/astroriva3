<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends MX_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('layout');
		$query = $this->db->get_where('settings',array('id'=>1))->row();
		define('LOGO',$query->logo);
		define('FAVICON',$query->favicon);		
	}

	public function index()
	{
		if($this->input->post())
		{
			$this->form_validation->set_rules('name','Name','required');
			$this->form_validation->set_rules('email','Email','required|valid_email');
			$this->form_validation->set_rules('subject','Subject','required');
			$this->form_validation->set_rules('message','Message','required');
			if($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('error',validation_errors());
				redirect('contact');
			}
			else
			{				
				$post_data = $this->security->xss_clean($this->input->post());				//
				if($this->db->insert('contact',$post_data))
				{
					$this->session->set_flashdata('success',"Thank you for contacting us. You will be replied soon.");
					redirect('contact');
				}
				else
				{
					$this->session->set_flashdata('error','Please try again');
					redirect('contact');
				}
			}
		}
		else
		{
			$data = array();
			$data['title'] = "Contact Us - Astroriva.com";
			$data['description'] = "If you ever have any problem related to any thing, don't hesitate to contact us. We will reply within 1 business days.";

			$this->layout->view('contact',$data,'normal');
		}		
	}
}
