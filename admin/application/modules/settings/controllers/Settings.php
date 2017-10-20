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
				$post_data['address'] = $this->input->post('address');

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

				if($_FILES['form']['error'] !=4)
				{
					$image = $this->input->post('form');
					if(file_exists("../assets/siksha/form/'.$image"))
					{
						unlink('../assets/siksha/form/'.$image);
					}
					unlink('../assets/siksha/form/'.$image);
					$dir = '../assets/siksha/form/';
					$ext1 = explode('.',$_FILES['form']['name']);
					$ext = end($ext1);
					$files = time().rand(00000,99999);
					move_uploaded_file($_FILES['form']['tmp_name'], $dir.$files.'.'.$ext);
					$post_data['form'] = $files.'.'.$ext;
				}

				if($_FILES['brochure']['error'] !=4)
				{
					$image = $this->input->post('brochure');
					if(file_exists("../assets/siksha/brochure/'.$image"))
					{
						unlink('../assets/siksha/brochure/'.$image);
					}
					unlink('../assets/siksha/brochure/'.$image);
					$dir = '../assets/siksha/brochure/';
					$ext1 = explode('.',$_FILES['brochure']['name']);
					$ext = end($ext1);
					$files = time().rand(00000,99999);
					move_uploaded_file($_FILES['brochure']['tmp_name'], $dir.$files.'.'.$ext);
					$post_data['brochure'] = $files.'.'.$ext;
				}
				$post_data['facebook_url'] = $this->input->post('facebook_url');
				$post_data['twitter_url'] = $this->input->post('twitter_url');
				$post_data['youtube_url'] = $this->input->post('youtube_url');

				$post_data = $this->security->xss_clean($post_data);

				//print_r($post_data);exit();
				
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
