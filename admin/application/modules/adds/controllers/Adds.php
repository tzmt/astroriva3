<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Adds extends MX_Controller{

	public function __construct() {
		parent::__construct();
		if(!isset($this->session->userdata('astro_admin')->id))
		{
			redirect('login/');
		}
		$this->load->library('layout');
		$this->load->model('adds_model');
		$this->load->library('pagination');
		date_default_timezone_set('Asia/Kolkata');
	}
	public function index()
	{
		if($this->input->post())
		{								
			$this->form_validation->set_rules('title','Title','required');	
			$this->form_validation->set_rules('url','Url','required');
			$this->form_validation->set_rules('point','Position','required');		
			if($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('error',validation_errors());
				redirect('adds/');
			}
			else
			{					
				if($_FILES['userfile']['name'] != "")
				{
					$dir = '../assets/ads/';
					$file_name = $_FILES['userfile']['name'];
					$ext = end(explode('.',$file_name));
					$files = time().rand(00000,99999).'.'.$ext;
					move_uploaded_file($_FILES['userfile']['tmp_name'], $dir.$files);
				}
				else
				{
					$this->session->set_flashdata('error',"Please Select an image");
					redirect('adds/');
				}

				
				$image = $files;		

				$post_data['title'] = $this->input->post('title');
				$post_data['url'] = $this->input->post('url');
				$post_data['image'] = $files;	
				$post_data['point'] = $this->input->post('point');
				

				
				if($last_id = $this->adds_model->AddBanner($post_data))
				{					
					$this->session->set_flashdata('success',"Ads Added Successfully");
					redirect('adds/');
				}
				else
				{
					$this->session->set_flashdata('error',"Please try again");
					redirect('adds/');
				}
			}
		}
		else
		{
			$data['all_data'] = $this->adds_model->getBannerList();			
			$this->layout->view('add',$data,'normal');
		}
	}

	public function delete_banner($id,$image)
	{
		if($id)
		{
			$this->db->where('id',$id);
			if($this->db->delete('ads'))
			{
				@unlink('../assets/ads/'.$image);
				$this->session->set_flashdata('success',"Ads Deleted Successfully");
				redirect('adds/');
			}
			else
			{
				$this->session->set_flashdata('error',"Please try again");
				redirect('adds/');
			}
		}
		else
		{
			redirect(current_url());
		}
	}	
	

	
	
}
