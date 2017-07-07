<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Ayurved extends MX_Controller{

	public function __construct() {
		parent::__construct();
		if(!isset($this->session->userdata('astro_admin')->id))
		{
			redirect('login/');
		}
		$this->load->library('layout');
		$this->load->model('ayurved_model');
		$this->load->library('pagination');
		date_default_timezone_set('Asia/Kolkata');
	}
	public function index()
	{
		$data = array();
		$this->add();
	}

	// public function category()
	// {		
	// 	if($this->input->post())
	// 	{
	// 		$this->form_validation->set_rules('name','Category Name','required');			
	// 		if($this->form_validation->run() == FALSE)
	// 		{
	// 			$this->session->set_flashdata('error',validation_errors());
	// 			redirect('news/category');
	// 		}
	// 		else
	// 		{	
	// 			$post_data['name'] = $this->input->post('name');
	// 			if($this->news_model->addCategory($post_data))
	// 			{
	// 				$this->session->set_flashdata('success',"Category Added Successfully");
	// 				redirect('news/category');
	// 			}
	// 			else
	// 			{
	// 				$this->session->set_flashdata('error',"Please try again");
	// 				redirect('news/category/');
	// 			}
	// 		}
	// 	}
	// 	else
	// 	{
	// 		$data['rashi_list'] = $this->news_model->getCategoryList();
	// 		$this->layout->view('add',$data,'normal');
	// 	}
	// }

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

	public function add()
	{
		if($this->input->post())
		{			
			$this->form_validation->set_rules('details','Description','required');	
			$this->form_validation->set_rules('topic','News Topic','required');			
			if($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('error',validation_errors());
				redirect('ayurved/add/');
			}
			else
			{	
				$image = '';
                $config['file_name'] = time();
				$config['upload_path'] = '../assets/ayurved/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$this->load->library('upload', $config);
				$uploaded = $this->upload->do_upload();
				$upload_data = $this->upload->data();
				
				$image = $upload_data['file_name'];
				$configs['image_library'] = 'gd2';
				$configs['source_image']	= '../assets/ayurved/'.$image;

				if (!$uploaded AND $image == '') 
				{
					$error = array('error' => $this->upload->display_errors());
					$this->session->set_flashdata('error', $error['error']);
					redirect(base_url() . 'ayurved/add');
				}

				$post_data['details'] = $this->input->post('details');
				$post_data['topic'] = $this->input->post('topic');				
				$post_data['image'] = $image;				
				//echo "<pre>";print_r($post_data);exit();
				if($this->ayurved_model->addAyurved($post_data))
				{
					$this->session->set_flashdata('success',"Ayurved Added Successfully");
					redirect('ayurved/add');
				}
				else
				{
					$this->session->set_flashdata('error',"Please try again");
					redirect('ayurved/add/');
				}
			}
		}
		else
		{
			$data['rashi_list'] = $this->ayurved_model->getRashiList();
			//$data['topic_list'] = $this->rashi_model->getRashiTopicList();
			$this->layout->view('add_ayurved',$data,'normal');
		}
	}

	public function lists($limit_from = '')
	{
		if($this->input->post())
		{		
			if($_FILES['userfile']['error'] != 4)
			{
				$image = '';
	            $config['file_name'] = time();
				$config['upload_path'] = '../assets/ayurved/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$this->load->library('upload', $config);
				$uploaded = $this->upload->do_upload();
				$upload_data = $this->upload->data();
				
				$image = $upload_data['file_name'];
				$configs['image_library'] = 'gd2';
				$configs['source_image']	= '../assets/ayurved/'.$image;			
				if (!$uploaded AND $image == '') 
				{
					$error = array('error' => $this->upload->display_errors());
					$this->session->set_flashdata('error', $error['error']);
					redirect(base_url() . 'ayurved/lists');
				}
				$post_data['image'] = $image;	
				$old_image = $this->input->post('old_image');
				if(file_exists('../assets/ayurved/'.$old_image))
				{
					unlink('../assets/ayurved/'.$old_image);
				}
			}
			

			$post_data['details'] = $this->input->post('details');
			$post_data['topic'] = $this->input->post('topic');	
			
			
			$post_data['id'] = $this->input->post('id');
			//echo "<pre>";print_r($post_data);exit();
			
			if($this->ayurved_model->updateTips($post_data))
			{
				$this->session->set_flashdata('success',"Ayurved Updated Successfully");
				redirect('ayurved/lists');
			}
			else
			{
				$this->session->set_flashdata('error',"Please try again");
				redirect('ayurved/lists/');
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
	    	$config["base_url"] = base_url().'ayurved/lists/';
	    	$config["uri_segment"] = 3;
	    	$config["total_rows"] = $this->ayurved_model->record_count();
		    	
	        $config["per_page"] = 10;
	        $config['use_page_numbers'] = TRUE;

	        $config['full_tag_open'] = '<div class="panel-footer clearfix"><ul class="pagination pagination-xs m-top-none pull-right">';
	        
	        $config['first_tag_open'] = '<li class="disabled">';
	        $config['first_tag_close'] = '</li>';
	        $config['cur_tag_open'] = '<li class="active">';
	        $config['cur_tag_close'] = '</li>';
	        $config['prev_link'] = '<<Previous ';
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
			$data['all_data'] = $this->ayurved_model->getAyurved($config['per_page'], $start);
			$this->layout->view('list',$data,'normal');
		}
	}

	
	public function delete_ayurved($id,$image)
	{
		$this->db->where('id',$id);
		if($this->db->delete('ayurved'))
		{
			if(file_exists('../assets/ayurved/'.$image))
			{
				unlink('../assets/ayurved/'.$image);
			}
			$this->session->set_flashdata('success',"Ayurved Deleted Successfully");
			redirect('ayurved/lists');
		}
		else
		{
			$this->session->set_flashdata('error',"Ayurved Not Deleted");
			redirect('ayurved/lists/');
		}
	}
	
}
