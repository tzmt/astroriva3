<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Banner extends MX_Controller{

	public function __construct() {
		parent::__construct();
		if(!isset($this->session->userdata('astro_admin')->id))
		{
			redirect('login/');
		}
		$this->load->library('layout');
		$this->load->model('banner_model');
		$this->load->library('pagination');
		date_default_timezone_set('Asia/Kolkata');
	}
	public function index()
	{
		if($this->input->post())
		{			
			$this->form_validation->set_rules('heading','Heading','required');	
			$this->form_validation->set_rules('description','Description','required');	
			if($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('error',validation_errors());
				redirect('banner/');
			}
			else
			{					
				$post_data['heading'] = $this->input->post('heading');
				$post_data['description'] = $this->input->post('description');

				
				if($last_id = $this->banner_model->AddBanner($post_data))
				{					
					$this->session->set_flashdata('success',"Banner Text Added Successfully");
					redirect('banner/');
				}
				else
				{
					$this->session->set_flashdata('error',"Please try again");
					redirect('banner/');
				}
			}
		}
		else
		{
			$data['all_data'] = $this->banner_model->getBannerList();
			//$data['topic_list'] = $this->rashi_model->getRashiTopicList();
			$this->layout->view('add',$data,'normal');
		}
	}

	public function delete_banner($id)
	{
		if($id)
		{
			$this->db->where('id',$id);
			if($this->db->delete('banners'))
			{
				$this->session->set_flashdata('success',"Banner Text Deleted Successfully");
				redirect('banner/');
			}
			else
			{
				$this->session->set_flashdata('error',"Please try again");
				redirect('banner/');
			}
		}
		else
		{
			redirect(current_url());
		}
	}	
	

	
	
}
