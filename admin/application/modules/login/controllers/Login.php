<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MX_Controller{

	public function __construct() {
		parent::__construct();
		$this->load->model('login_model');
	}
	public function index()
	{
		if($this->input->post())
		{
			$this->form_validation->set_rules('username','Username','required');
			$this->form_validation->set_rules('password','Password','required');
			if($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('error',validation_errors());
				redirect('login/');
			}
			else
			{	
				$post_data['username'] = $this->input->post('username');
				$post_data['password'] = $this->input->post('password');
				if($this->login_model->loginCheck($post_data))
				{
					redirect('dashboard/');
				}
				else
				{
					$this->session->set_flashdata('error',"Invalid Login Details");
					redirect('login/');
				}
			}
		}
		else
		{
			$this->load->view('login');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}