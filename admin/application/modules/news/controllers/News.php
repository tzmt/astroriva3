<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class News extends MX_Controller{

	public function __construct() {
		parent::__construct();
		if(!isset($this->session->userdata('astro_admin')->id))
		{
			redirect('login/');
		}
		$this->load->library('layout');
		$this->load->model('news_model');
		$this->load->library('pagination');
		date_default_timezone_set('Asia/Kolkata');
	}
	public function index()
	{
		$data = array();
		$this->category();
	}

	public function category()
	{		
		if($this->input->post())
		{
			$this->form_validation->set_rules('name','Category Name','required');			
			if($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('error',validation_errors());
				redirect('news/category');
			}
			else
			{	
				$post_data['name'] = $this->input->post('name');
				if($this->news_model->addCategory($post_data))
				{
					$this->session->set_flashdata('success',"Category Added Successfully");
					redirect('news/category');
				}
				else
				{
					$this->session->set_flashdata('error',"Please try again");
					redirect('news/category/');
				}
			}
		}
		else
		{
			$data['rashi_list'] = $this->news_model->getCategoryList();
			$this->layout->view('add',$data,'normal');
		}
	}

	public function delete_category($id)
	{
		$this->db->where('id',$id);
		if($this->db->delete('news_category'))
		{
			$this->session->set_flashdata('success',"News Category Deleted Successfully");
			redirect('news/category');
		}
		else
		{
			$this->session->set_flashdata('error',"News category Not Deleted");
			redirect('news/category/');
		}
	}

	public function add_news()
	{
		if($this->input->post())
		{
			$this->form_validation->set_rules('category_id','Rashi Name','required');	
			$this->form_validation->set_rules('date_from','Date From','required');	
			$this->form_validation->set_rules('date_to','Date To','required');
			$this->form_validation->set_rules('description','Description','required');	
			$this->form_validation->set_rules('topic','News Topic','required');			
			if($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('error',validation_errors());
				redirect('news/add_news/');
			}
			else
			{	
				$image = '';
                $config['file_name'] = time();
				$config['upload_path'] = '../assets/news/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$this->load->library('upload', $config);
				$uploaded = $this->upload->do_upload();
				$upload_data = $this->upload->data();
				
				$image = $upload_data['file_name'];
				$configs['image_library'] = 'gd2';
				$configs['source_image']	= '../assets/news/'.$image;

				if (!$uploaded AND $image == '') 
				{
					$error = array('error' => $this->upload->display_errors());
					$this->session->set_flashdata('error', $error['error']);
					redirect(base_url() . 'rashi/prediction');
				}

				$post_data['category_id'] = $this->input->post('category_id');
				$post_data['date_from'] = $this->input->post('date_from');
				$post_data['date_to'] = $this->input->post('date_to');
				$post_data['type'] = 1;
				$post_data['image'] = $image;
				$post_data['description'] = $this->input->post('description');
				$post_data['topic'] = $this->input->post('topic');
				//echo "<pre>";print_r($post_data);exit();
				if($this->news_model->addNews($post_data))
				{
					$this->session->set_flashdata('success',"News Added Successfully");
					redirect('news/add_news');
				}
				else
				{
					$this->session->set_flashdata('error',"Please try again");
					redirect('news/add_news/');
				}
			}
		}
		else
		{
			$data['category_list'] = $this->news_model->getCategoryList();
			//$data['topic_list'] = $this->rashi_model->getRashiTopicList();
			$this->layout->view('add_news',$data,'normal');
		}
	}

	public function active_news($limit_from = '')
	{
		if($this->input->post())
		{			
			if($_FILES['userfile']['name'] !="")
			{
				$image = '';
	            $config['file_name'] = time();
				$config['upload_path'] = '../assets/news/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$this->load->library('upload', $config);
				$uploaded = $this->upload->do_upload();
				$upload_data = $this->upload->data();
				
				$image = $upload_data['file_name'];
				$configs['image_library'] = 'gd2';
				$configs['source_image']	= '../assets/news/'.$image;

				if (!$uploaded AND $image == '') 
				{
					$error = array('error' => $this->upload->display_errors());
					$this->session->set_flashdata('error', $error['error']);
					redirect(base_url() . 'news/list_news');
				}
			}

			$post_data['category_id'] = $this->input->post('category_id');
			$post_data['date_from'] = $this->input->post('date_from');
			$post_data['date_to'] = $this->input->post('date_to');
			$post_data['type'] = $this->input->post('type');
			if($post_data['type'] == 2)
			{
				$post_data['astrologers_id'] = $this->input->post('astrologers_id');
			}
			$post_data['image'] = $image;
			$post_data['topic'] = $this->input->post('topic');
			$post_data['description'] = $this->input->post('description');
			$old_image = $this->input->post('old_image');
			$post_data['id'] = $this->input->post('pred_id');

			if(file_exists("../assets/news/'.$old_image"))
				{
					unlink('../assets/books/'.$old_image);		
				}
			unlink('../assets/news/'.$old_image);
			if($this->news_model->updateNews($post_data))
			{
				$this->session->set_flashdata('success',"News Updated Successfully");
				redirect('news/active_news');
			}
			else
			{
				$this->session->set_flashdata('error',"Please try again");
				redirect('news/active_news/');
			}
		}
		else
		{
			if(is_numeric($this->uri->segment(3)))
			{
				$s_key =  "";
				$limit_from = $this->uri->segment(3);
			}
			else
			{
				$s_key =  $this->uri->segment(3);
				$limit_from = $this->uri->segment(4);
			}	
			$config = array();        	
	    	$config["base_url"] = base_url().'news/active_news/';
	    	$config["uri_segment"] = 3;
	    	$config["total_rows"] = $this->news_model->record_count();
		    	
	        $config["per_page"] = 10;
	        $config['use_page_numbers'] = TRUE;

	        $config['full_tag_open'] = '<div class="panel-footer clearfix"><ul class="pagination pagination-xs m-top-none pull-right">';
	        
	        $config['first_tag_open'] = '<li class="disabled">';
	        $config['first_tag_close'] = '</li>';
	        $config['cur_tag_open'] = '<li class="active">';
	        $config['cur_tag_close'] = '</li>';
	        $config['prev_link'] = 'Previous';
	        $config['prev_tag_open'] = '<li><a href="#">';
	        $config['prev_tag_open'] = '</a></li>';
	        $config['full_tag_close'] = '</ul></div>';



	        $this->pagination->initialize($config);

	        $page = ($limit_from) ? $limit_from : 0;
	        $per_page = $config["per_page"];
	        $start = 0;
	        if ($page > 0)
	        {
	            for ($i = 1; $i < $page; $i++)
	            {
	                $start = $start + $per_page;
	            }
	        }
	        $data["links"] = $this->pagination->create_links();
			$data['category_list'] = $this->news_model->getCategoryList();
			$data['all_data'] = $this->news_model->getNews($config['per_page'], $start);
			//$data['topic_list'] = $this->rashi_model->getRashiTopicList();
			$this->layout->view('list_news',$data,'normal');
		}
	}

	public function inactive_news($limit_from = '')
	{
		if($this->input->post())
		{			
			if($_FILES['userfile']['name'] !="")
			{
				$image = '';
	            $config['file_name'] = time();
				$config['upload_path'] = '../assets/news/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$this->load->library('upload', $config);
				$uploaded = $this->upload->do_upload();
				$upload_data = $this->upload->data();
				
				$image = $upload_data['file_name'];
				$configs['image_library'] = 'gd2';
				$configs['source_image']	= '../assets/news/'.$image;

				if (!$uploaded AND $image == '') 
				{
					$error = array('error' => $this->upload->display_errors());
					$this->session->set_flashdata('error', $error['error']);
					redirect(base_url() . 'news/list_news');
				}
			}

			$post_data['category_id'] = $this->input->post('category_id');
			$post_data['date_from'] = $this->input->post('date_from');
			$post_data['date_to'] = $this->input->post('date_to');
			$post_data['type'] = $this->input->post('type');
			if($post_data['type'] == 2)
			{
				$post_data['astrologers_id'] = $this->input->post('astrologers_id');
			}
			$post_data['image'] = $image;
			$post_data['topic'] = $this->input->post('topic');
			$post_data['description'] = $this->input->post('description');
			$old_image = $this->input->post('old_image');
			$post_data['id'] = $this->input->post('pred_id');
			unlink('../assets/news/'.$old_image);
			if($this->news_model->updateNews($post_data))
			{
				$this->session->set_flashdata('success',"News Updated Successfully");
				redirect('news/active_news');
			}
			else
			{
				$this->session->set_flashdata('error',"Please try again");
				redirect('news/active_news/');
			}
		}
		else
		{
			if(is_numeric($this->uri->segment(3)))
			{
				$s_key =  "";
				$limit_from = $this->uri->segment(3);
			}
			else
			{
				$s_key =  $this->uri->segment(3);
				$limit_from = $this->uri->segment(4);
			}	
			$config = array();        	
	    	$config["base_url"] = base_url().'news/active_news/';
	    	$config["uri_segment"] = 3;
	    	$config["total_rows"] = $this->news_model->record_count1();
		    	
	        $config["per_page"] = 10;
	        $config['use_page_numbers'] = TRUE;

	        $config['full_tag_open'] = '<div class="panel-footer clearfix"><ul class="pagination pagination-xs m-top-none pull-right">';
	        
	        $config['first_tag_open'] = '<li class="disabled">';
	        $config['first_tag_close'] = '</li>';
	        $config['cur_tag_open'] = '<li class="active">';
	        $config['cur_tag_close'] = '</li>';
	        $config['prev_link'] = 'Previous';
	        $config['prev_tag_open'] = '<li><a href="#">';
	        $config['prev_tag_open'] = '</a></li>';
	        $config['full_tag_close'] = '</ul></div>';



	        $this->pagination->initialize($config);

	        $page = ($limit_from) ? $limit_from : 0;
	        $per_page = $config["per_page"];
	        $start = 0;
	        if ($page > 0)
	        {
	            for ($i = 1; $i < $page; $i++)
	            {
	                $start = $start + $per_page;
	            }
	        }
	        $data["links"] = $this->pagination->create_links();
			$data['category_list'] = $this->news_model->getCategoryList();
			$data['all_data'] = $this->news_model->getNews($config['per_page'], $start);
			//$data['topic_list'] = $this->rashi_model->getRashiTopicList();
			$this->layout->view('list_news',$data,'normal');
		}
	}

	public function delete_news($id)
	{
		$this->db->where('id',$id);
		if($this->db->delete('news'))
		{
			$this->session->set_flashdata('success',"News Deleted Successfully");
			redirect('news/active_news');
		}
		else
		{
			$this->session->set_flashdata('error',"News Not Deleted");
			redirect('news/active_news/');
		}
	}
	
}
