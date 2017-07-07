<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends MX_Controller{

	public function __construct() {
		parent::__construct();
		if(!isset($this->session->userdata('astro_admin')->id))
		{
			redirect('login/');
		}
		$this->load->library('layout');
		$this->load->model('settings_model');
		$this->load->library('pagination');
		date_default_timezone_set('Asia/Kolkata');
	}
	public function index()
	{
		if($this->input->post())
		{			
			$this->form_validation->set_rules('site_name','Site Name','required');	
			$this->form_validation->set_rules('description','Site Description','required');	
			$this->form_validation->set_rules('meta_keywords','Meta Keywords','required');
			$this->form_validation->set_rules('maintenance','Maintenance','required');		
			if($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('error',validation_errors());
				redirect('settings/');
			}
			else
			{					
				$post_data['site_name'] = $this->input->post('site_name');
				$post_data['description'] = $this->input->post('description');
				$post_data['meta_keywords'] = $this->input->post('meta_keywords');	
				$post_data['maintenance'] = $this->input->post('maintenance');

				if($_FILES['favicon']['error'] !=4)
				{
					$image = $this->input->post('favicon_image');
					if(file_exists("../assets/ico/'.$image"))
					{
						unlink('../assets/ico/'.$image);
					}					
					$dir = '../assets/ico/';
					$ext1 = explode('.',$_FILES['favicon']['name']);
					$ext = end($ext1);
					$files = time().rand(00000,99999);
					move_uploaded_file($_FILES['favicon']['tmp_name'], $dir.$files.'.'.$ext);
					$post_data['favicon'] = $files.'.'.$ext;
				}

				if($_FILES['logo']['error'] !=4)
				{
					$image = $this->input->post('logo_image');
					if(file_exists("../assets/logo/'.$image"))
					{
						unlink('../assets/logo/'.$image);
					}
					unlink('../assets/logo/'.$image);
					$dir = '../assets/logo/';
					$ext1 = explode('.',$_FILES['logo']['name']);
					$ext = end($ext1);
					$files = time().rand(00000,99999);
					move_uploaded_file($_FILES['logo']['tmp_name'], $dir.$files.'.'.$ext);
					$post_data['logo'] = $files.'.'.$ext;
				}

				if($_FILES['banner']['error'] !=4)
				{
					$image = $this->input->post('banner_image');
					if(file_exists("../assets/slider/'.$image"))
					{
						unlink('../assets/slider/'.$image);
					}
					unlink('../assets/slider/'.$image);
					$dir = '../assets/slider/';
					$ext1 = explode('.',$_FILES['banner']['name']);
					$ext = end($ext1);
					$files = time().rand(00000,99999);
					move_uploaded_file($_FILES['banner']['tmp_name'], $dir.$files.'.'.$ext);
					$post_data['banner_image'] = $files.'.'.$ext;
				}

				if($_FILES['parallax1']['error'] !=4)
				{
					$image = $this->input->post('parallax1_image');
					if(file_exists("../assets/parallax-bg/'.$image"))
					{
						unlink('../assets/parallax-bg/'.$image);
					}
					unlink('../assets/parallax-bg/'.$image);
					$dir = '../assets/parallax-bg/';
					$ext1 = explode('.',$_FILES['parallax1']['name']);
					$ext = end($ext1);
					$files = time().rand(00000,99999);
					move_uploaded_file($_FILES['parallax1']['tmp_name'], $dir.$files.'.'.$ext);
					$post_data['parallax1'] = $files.'.'.$ext;
				}

				if($_FILES['parallax2']['error'] !=4)
				{
					$image = $this->input->post('parallax1_image');
					if(file_exists("../assets/parallax-bg/'.$image"))
					{
						unlink('../assets/parallax-bg/'.$image);
					}
					unlink('../assets/parallax-bg/'.$image);
					$dir = '../assets/parallax-bg/';
					$ext1 = explode('.',$_FILES['parallax2']['name']);
					$ext = end($ext1);
					$files = time().rand(00000,99999);
					move_uploaded_file($_FILES['parallax2']['tmp_name'], $dir.$files.'.'.$ext);
					$post_data['parallax2'] = $files.'.'.$ext;
				}

				if($_FILES['parallax3']['error'] !=4)
				{
					$image = $this->input->post('parallax1_image');
					if(file_exists("../assets/parallax-bg/'.$image"))
					{
						unlink('../assets/parallax-bg/'.$image);
					}
					unlink('../assets/parallax-bg/'.$image);
					$dir = '../assets/parallax-bg/';
					$ext1 = explode('.',$_FILES['parallax3']['name']);
					$ext = end($ext1);
					$files = time().rand(00000,99999);
					move_uploaded_file($_FILES['parallax3']['tmp_name'], $dir.$files.'.'.$ext);
					$post_data['parallax3'] = $files.'.'.$ext;
				}
				
				if($last_id = $this->settings_model->updateSettings($post_data))
				{					
					$this->session->set_flashdata('success',"Settings Saved Successfully");
					redirect('settings/');
				}
				else
				{
					$this->session->set_flashdata('error',"Please try again");
					redirect('settings/');
				}
			}
		}
		else
		{
			$data['all_data'] = $this->settings_model->getSettings();
			//$data['topic_list'] = $this->rashi_model->getRashiTopicList();
			$this->layout->view('add',$data,'normal');
		}
	}	
	

	
	
}
