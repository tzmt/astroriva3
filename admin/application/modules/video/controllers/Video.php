<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Video extends MX_Controller{

	public function __construct() {
		parent::__construct();
		if(!isset($this->session->userdata('astro_admin')->id))
		{
			redirect('login/');
		}
		$this->load->library('layout');
		$this->load->model('video_model');
		$this->load->library('pagination');
		date_default_timezone_set('Asia/Kolkata');
	}
	public function index()
	{
		if($this->input->post())
		{			
			$this->form_validation->set_rules('title','Video Title','required');
			$this->form_validation->set_rules('cat_id','Category','required');	
			$this->form_validation->set_rules('link','Video Link','required');	
			if($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('error',validation_errors());
				redirect('video/');
			}
			else
			{	$files = '';
				$dir = '../assets/video/';
				$ext = end(explode('.',$_FILES['file']['name']));
				$files = time().rand(00000,99999).'.'.$ext;
				move_uploaded_file($_FILES['file']['tmp_name'], $dir.$files);
				$post_data['image'] = $files;				

				$post_data['title'] = $this->input->post('title');
				$post_data['cat_id'] = $this->input->post('cat_id');
				$post_data['link'] = $this->input->post('link');

				
				if($last_id = $this->video_model->AddBanner($post_data))
				{					
					$this->session->set_flashdata('success',"video Added Successfully");
					redirect('video/');
				}
				else
				{
					$this->session->set_flashdata('error',"Please try again");
					redirect('video/');
				}
			}
		}
		else
		{
			$data['all_data'] = $this->video_model->getVideoList();
			$data['cat_list'] = $this->video_model->getCategoryList();
			//$data['topic_list'] = $this->rashi_model->getRashiTopicList();
			$this->layout->view('add',$data,'normal');
		}
	}

	public function delete_video($id,$image)
	{
		if($id)
		{
			$this->db->where('id',$id);
			if($this->db->delete('video'))
			{
				if(file_exists('../assets/video/'.$image))
				{
					unlink('../assets/video/'.$image);
				}
				$this->session->set_flashdata('success',"Video Link Deleted Successfully");
				redirect('video/');
			}
			else
			{
				$this->session->set_flashdata('error',"Please try again");
				redirect('video/');
			}
		}
		else
		{
			redirect(current_url());
		}
	}	

	public function update()
	{
		if($this->input->post())
		{			
			$this->form_validation->set_rules('title','Video Title','required');
			$this->form_validation->set_rules('cat_id','Category','required');	
			$this->form_validation->set_rules('link','Video Link','required');	
			if($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('error',validation_errors());
				redirect('video/');
			}
			else
			{	
				if($_FILES['file']['error'] != 4)
				{
					$files = '';
					$dir = '../assets/video/';
					$ext = end(explode('.',$_FILES['file']['name']));
					$files = time().rand(00000,99999).'.'.$ext;
					move_uploaded_file($_FILES['file']['tmp_name'], $dir.$files);
					$post_data['image'] = $files;	
					$image = $this->input->post('image');
					if(file_exists('../assets/video/'.$image))
					{
						unlink('../assets/video/'.$image);
					}
				}		
				$id = $this->input->post('id');
				$post_data['title'] = $this->input->post('title');
				$post_data['cat_id'] = $this->input->post('cat_id');
				$post_data['link'] = $this->input->post('link');

				
				if($last_id = $this->video_model->updateLink($post_data,$id))
				{					
					$this->session->set_flashdata('success',"video Updated Successfully");
					redirect('video/');
				}
				else
				{
					$this->session->set_flashdata('error',"Please try again");
					redirect('video/');
				}
			}
		}
		else
		{
			$data['all_data'] = $this->video_model->getVideoList();
			//$data['topic_list'] = $this->rashi_model->getRashiTopicList();
			$this->layout->view('add',$data,'normal');
		}
	}

	public function category()
	{
		if($this->input->post())
		{			
			$this->form_validation->set_rules('name','Category Name','required');	
			if($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('error',validation_errors());
				redirect('video/category');
			}
			else
			{	
				$post_data['name'] = $this->input->post('name');				
				if($last_id = $this->video_model->AddCategory($post_data))
				{					
					$this->session->set_flashdata('success',"Category Added Successfully");
					redirect('video/category');
				}
				else
				{
					$this->session->set_flashdata('error',"Please try again");
					redirect('video/category');
				}
			}
		}
		else
		{
			$data['all_data'] = $this->video_model->getCategoryList();
			//$data['topic_list'] = $this->rashi_model->getRashiTopicList();
			$this->layout->view('category',$data,'normal');
		}
	}


	public function delete_category($id)
	{
		if($id)
		{
			$this->db->where('id',$id);
			if($this->db->delete('video_category'))
			{				
				$this->session->set_flashdata('success',"Category Deleted Successfully");
				redirect('video/category');
			}
			else
			{
				$this->session->set_flashdata('error',"Please try again");
				redirect('video/category');
			}
		}
		else
		{
			redirect(current_url());
		}
	}

	public function category_update()
	{
		if($this->input->post())
		{			
			$this->form_validation->set_rules('name','Category Name','required');	
			if($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('error',validation_errors());
				redirect('video/category');
			}
			else			{	
				
				$id = $this->input->post('id');
				$post_data['name'] = $this->input->post('name');				
				if($last_id = $this->video_model->updateCategory($post_data,$id))
				{					
					$this->session->set_flashdata('success',"Category Updated Successfully");
					redirect('video/category');
				}
				else
				{
					$this->session->set_flashdata('error',"Please try again");
					redirect('video/category');
				}
			}
		}
		else
		{
			$data['all_data'] = $this->video_model->getVideoList();
			//$data['topic_list'] = $this->rashi_model->getRashiTopicList();
			$this->layout->view('add',$data,'normal');
		}
	}

	
	
}
