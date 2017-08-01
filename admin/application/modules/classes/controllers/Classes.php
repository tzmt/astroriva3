<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Classes extends MX_Controller{

	public function __construct() {
		parent::__construct();
		if(!isset($this->session->userdata('astro_admin')->id))
		{
			redirect('login/');
		}
		$this->load->library('layout');
		$this->load->model('classes_model');
		$this->load->library('pagination');
		date_default_timezone_set('Asia/Kolkata');
	}
	public function index()
	{
		$data = array();
		$this->add();
	}	

	public function add()
	{
		if($this->input->post())
		{
			$this->form_validation->set_rules('name','Class Name','required');	
			$this->form_validation->set_rules('duration','Class Duration','required');	
			$this->form_validation->set_rules('course_id','Course Name','required');
			$this->form_validation->set_rules('date','Date','required');	
			$this->form_validation->set_rules('type','Type Of Class','required');		
			$this->form_validation->set_rules('time','Time Of Class','required');		
			if($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('error',validation_errors());
				redirect('classes/add/');
			}
			else
			{	
				
				$post_data['name'] = $this->input->post('name');
				$post_data['duration'] = $this->input->post('duration');
				$post_data['course_id'] = $this->input->post('course_id');	
				$post_data['type'] = $this->input->post('type');
				$post_data['date'] = $this->input->post('date');
				$post_data['place'] = $this->input->post('place');
				$post_data['time'] = strtotime($this->input->post('time'));
				//echo "<pre>";print_r($post_data);exit();

				$post_data = $this->security->xss_clean($post_data);

				if($last_id = $this->classes_model->addClass($post_data))
				{					
					$this->session->set_flashdata('success',"Class Added Successfully");
					redirect('classes/add/');
				}
				else
				{
					$this->session->set_flashdata('error',"Please try again");
					redirect('classes/add/');
				}
			}
		}
		else
		{
			$data['course_list'] = $this->classes_model->getCourseList();
			//$data['topic_list'] = $this->rashi_model->getRashiTopicList();
			$this->layout->view('add_class',$data,'normal');
		}
	}

	public function lists($limit_from = '')
	{
		if($this->input->post())
		{	
			$id = $this->input->post('id');
			$post_data['name'] = $this->input->post('name');
			$post_data['duration'] = $this->input->post('duration');
			$post_data['course_id'] = $this->input->post('course_id');	
			$post_data['type'] = $this->input->post('type');
			$post_data['date'] = $this->input->post('date');
			$post_data['place'] = $this->input->post('place');
			$post_data['time'] = strtotime($this->input->post('time'));
			//echo "<pre>";print_r($post_data);exit();
			
			$post_data = $this->security->xss_clean($post_data);
			
			if($this->classes_model->updateClass($post_data,$id))
			{					
				$this->session->set_flashdata('success',"Class Updated Successfully");
				redirect('classes/lists/');
			}
			else
			{
				$this->session->set_flashdata('error',"Please try again");
				redirect('classes/lists/');
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
	    	$config["base_url"] = base_url().'classes/lists/';
	    	$config["uri_segment"] = 3;
	    	$config["total_rows"] = $this->classes_model->record_count();
		    	
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
	        $data['course_list'] = $this->classes_model->getCourseList();
	        $data["links"] = $this->pagination->create_links();
			//$data['rashi_list'] = $this->course_model->getRashiList();
			$data['all_data'] = $this->classes_model->getClass($config['per_page'], $start);
			$this->layout->view('list_classes',$data,'normal');
		}
	}

	
	public function delete_class($id)
	{
		$this->db->where('id',$id);
		if($this->db->delete('astrology_class'))
		{
		$this->session->set_flashdata('success',"Class Deleted Successfully");		
			redirect('classes/lists');
		}
		else
		{
			$this->session->set_flashdata('error',"Class Not Deleted");
			redirect('classes/lists/');
		}
	}
	
}
