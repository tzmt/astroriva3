<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Tips extends MX_Controller{

	public function __construct() {
		parent::__construct();
		if(!isset($this->session->userdata('astro_admin')->id))
		{
			redirect('login/');
		}
		$this->load->library('layout');
		$this->load->model('tips_model');
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

				$post_data = $this->security->xss_clean($post_data);

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

	public function add()
	{
		if($this->input->post())
		{
			$this->form_validation->set_rules('rashi_id','Rashi Name','required');	
			$this->form_validation->set_rules('date_from','Date From','required');	
			$this->form_validation->set_rules('date_to','Date To','required');
			$this->form_validation->set_rules('description','Description','required');	
			$this->form_validation->set_rules('topic','News Topic','required');		
			$this->form_validation->set_rules('type','Whether Tips or Market Prediction','required');		
			if($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('error',validation_errors());
				redirect('tips/add/');
			}
			else
			{	
				$image = '';
                $config['file_name'] = time();
				$config['upload_path'] = '../assets/tips/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$this->load->library('upload', $config);
				$uploaded = $this->upload->do_upload();
				$upload_data = $this->upload->data();
				
				$image = $upload_data['file_name'];
				$configs['image_library'] = 'gd2';
				$configs['source_image']	= '../assets/tips/'.$image;

				if (!$uploaded AND $image == '') 
				{
					$error = array('error' => $this->upload->display_errors());
					$this->session->set_flashdata('error', $error['error']);
					redirect(base_url() . 'rashi/prediction');
				}

				$post_data['rashi_id'] = $this->input->post('rashi_id');
				$post_data['date_from'] = $this->input->post('date_from');
				$post_data['date_to'] = $this->input->post('date_to');
				$post_data['type'] = 1;
				$post_data['image'] = $image;
				$post_data['description'] = $this->input->post('description');
				$post_data['topic'] = $this->input->post('topic');
				$post_data['type'] = $this->input->post('type');
				//echo "<pre>";print_r($post_data);exit();

				$post_data = $this->security->xss_clean($post_data);

				if($this->tips_model->addTips($post_data))
				{
					$this->session->set_flashdata('success',"Tips Added Successfully");
					redirect('tips/add');
				}
				else
				{
					$this->session->set_flashdata('error',"Please try again");
					redirect('tips/add/');
				}
			}
		}
		else
		{
			$data['rashi_list'] = $this->tips_model->getRashiList();
			//$data['topic_list'] = $this->rashi_model->getRashiTopicList();
			$this->layout->view('add_tips',$data,'normal');
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
				$config['upload_path'] = '../assets/tips/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$this->load->library('upload', $config);
				$uploaded = $this->upload->do_upload();
				$upload_data = $this->upload->data();
				
				$image = $upload_data['file_name'];
				$configs['image_library'] = 'gd2';
				$configs['source_image']	= '../assets/tips/'.$image;				
				if (!$uploaded AND $image == '') 
				{
					$error = array('error' => $this->upload->display_errors());
					$this->session->set_flashdata('error', $error['error']);
					redirect(base_url() . 'tips/list');
				}
				$post_data['image'] = $image;
			}
			

			$post_data['rashi_id'] = $this->input->post('rashi_id');
			$post_data['date_from'] = $this->input->post('date_from');
			$post_data['date_to'] = $this->input->post('date_to');
			$post_data['type'] = $this->input->post('type');
			if($post_data['type'] == 2)
			{
				$post_data['astrologers_id'] = $this->input->post('astrologers_id');
			}			
			$post_data['topic'] = $this->input->post('topic');
			$post_data['description'] = $this->input->post('description');
			$old_image = $this->input->post('old_image');
			$post_data['id'] = $this->input->post('pred_id');
			//echo "<pre>";print_r($post_data);exit();

			$post_data = $this->security->xss_clean($post_data);
			
			@unlink('../assets/tips/'.$old_image);
			if($this->tips_model->updateTips($post_data))
			{
				$this->session->set_flashdata('success',"Tips Updated Successfully");
				redirect('tips/lists');
			}
			else
			{
				$this->session->set_flashdata('error',"Please try again");
				redirect('tips/lists/');
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
	    	$config["base_url"] = base_url().'tips/lists/';
	    	$config["uri_segment"] = 3;
	    	$config["total_rows"] = $this->tips_model->record_count();
		    	
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
			$data['rashi_list'] = $this->tips_model->getRashiList();
			$data['all_data'] = $this->tips_model->getTips($config['per_page'], $start);
			$this->layout->view('list_tips',$data,'normal');
		}
	}

	
	public function delete_tips($id)
	{
		$this->db->where('id',$id);
		if($this->db->delete('tips'))
		{
			$this->session->set_flashdata('success',"Tips Deleted Successfully");
			redirect('tips/lists');
		}
		else
		{
			$this->session->set_flashdata('error',"Tips Not Deleted");
			redirect('tips/lists/');
		}
	}
	
}
