<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MX_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('layout');
		$this->load->model('login_model');
		date_default_timezone_set('Asia/Kolkata');
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
		if($this->input->post())
		{
			$this->form_validation->set_rules('email','Email','required');
			$this->form_validation->set_rules('password','Password','required');
			$this->form_validation->set_rules('type','Type Of Member','required');

			if($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('error',validation_errors());		
				redirect('login');	
			}
			else
			{
				$post_data['email'] = $this->input->post('email');
				$post_data['password'] = $this->input->post('password');
				$post_data['type'] = $this->input->post('type');
				if($this->login_model->login_check($post_data))
				{	
					if($post_data['type'] == 1)
					{
						redirect('astrologer/dashboard/');	
					}

					if($post_data['type'] == 2)
					{
						redirect('student/dashboard/');	
					}

					if($post_data['type'] == 1)
					{

					}

						
				}
				else
				{					
					$this->session->set_flashdata('error',"Invalid login details / Or you may have not verified your email");	
					redirect('login');					
				}
			}
		}
		else
		{
			$data = array();
			$this->layout->view('home',$data,'home1');			
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('home/');
	}

	public function register()
	{
		if($this->input->post())
		{
			$this->form_validation->set_rules('name','Name','required');
			$this->form_validation->set_rules('email','Email','required|valid_email');
			$this->form_validation->set_rules('password','Password','required');
			$this->form_validation->set_rules('phone','Phone Number','required');
			$this->form_validation->set_rules('type','Type of Member','required');

			if($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('error',validation_errors());		
				redirect('login');		
			}
			else
			{
				$post_data['name'] = $this->input->post('name');
				$post_data['email'] = $this->input->post('email');
				$post_data['password'] = $this->input->post('password');
				$post_data['phone'] = $this->input->post('phone');
				$post_data['type'] = $this->input->post('type');
				$post_data['image'] = "user.png";
				$q = $this->login_model->register($post_data);
				if($q)
				{
					$this->load->library('email');
					$this->email->from('info@astroriva.com', 'AstroRiva');
					$this->email->to($this->input->post('email')); 
					$this->email->subject('Thank your for joining at Astroriva.');

					$msg = "Thank you ".$this->input->post('name')." for joing our site.\n\n Please verify your email by clicking on the link below.\n\n";
					$msg .= base_url()."login/verify/".base64_encode($this->input->post('email'))."/".base64_encode($this->input->post('type'))."\n\n Thank you\nAstroRiva Team"; 

					$this->email->message($msg);	

					$this->email->send();
					
					$this->session->set_flashdata('success',"A verification email has been sent to your email. Please verify it.");
					redirect("login/");	
					
				}
				else
				{					
					$this->session->set_flashdata('error',"Email id or phone number already exist.");
					redirect("login/");										
				}
			}
		}
		else
		{
			redirect(current_url());
		}
	}

	public function forgot()
	{
		if($this->input->post())
		{			
			$this->form_validation->set_rules('email','Email','required|valid_email');			
			$this->form_validation->set_rules('type','Type of Member','required');

			if($this->form_validation->run() == FALSE)
			{	
				$this->session->set_flashdata('error',validation_errors());
				redirect("login/");				
			}
			else
			{				
				$post_data['email'] = $this->input->post('email');
				$password = rand(00000000,99999999);
				$post_data['password'] = sha1(md5($this->input->post('password')));				
				$post_data['type'] = $this->input->post('type');
				if($this->login_model->forgot($post_data))
				{
					$this->email->from('info@astroriva.com', 'AstroRiva');
					$this->email->to($this->input->post('email')); 
					$this->email->subject('Password recovery from AstroRIva.');
					
					$msg = "A password recovery request have been received from your account.\n\nPlease use this '".$password."' as your password.\n\n Please change your password after login.";
					$msg .= "\n\n Thank you\nAstroRiva Team"; 
					
					$this->email->message($msg);	

					if($this->email->send())
					{
						$this->session->set_flashdata('success',"A recovery mail has been sent to your email. Please check it.");
						redirect("login/");	
					}
					else
					{
						$this->session->set_flashdata('error',"Please try again");
						redirect("login/");	
					}														
				}
				else
				{
					$this->session->set_flashdata('error',"No Email id found");
					redirect("login/");	
				}
			}
		}
		else
		{
			redirect(current_url());
		}
	}

	public function verify($hash,$type)
	{
		$hash = base64_decode($hash);
		$type = base64_decode($type);
		if($type == 1)
		{
			$arr = array('email_verify'=>1);
			$this->db->where('email',$hash);
			$this->db->update('astrologer',$arr);
		}

		if($type == 2)
		{
			$arr = array('email_verify'=>1);
			$this->db->where('email',$hash);
			$this->db->update('student',$arr);
		}

		if($type == 3)
		{
			$arr = array('email_verify'=>1);
			$this->db->where('email',$hash);
			$this->db->update('user',$arr);
		}
		
		redirect('home/');
	}
}
