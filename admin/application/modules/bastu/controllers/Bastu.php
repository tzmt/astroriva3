<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Bastu extends MX_Controller{

	public function __construct() {
		parent::__construct();
		if(!isset($this->session->userdata('astro_admin')->id))
		{
			redirect('login/');
		}
		$this->load->library('layout');
		$this->load->model('bastu_model');
		$this->load->library('pagination');
		date_default_timezone_set('Asia/Kolkata');
	}
	public function index()
	{
		$data = array();
		$this->add_bastu();
	}

	public function add_bastu()
	{
		if($this->input->post())
		{			
			$this->form_validation->set_rules('description','Description','required');	
			$this->form_validation->set_rules('title','Bastu Topic','required');			
			if($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('error',validation_errors());
				redirect('bastu/add_bastu/');
			}
			else
			{	
				$image = '';
                $config['file_name'] = time();
				$config['upload_path'] = '../assets/bastu/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$this->load->library('upload', $config);
				$uploaded = $this->upload->do_upload();
				$upload_data = $this->upload->data();
				
				$image = $upload_data['file_name'];
				$configs['image_library'] = 'gd2';
				$configs['source_image']	= '../assets/bastu/'.$image;

				if (!$uploaded AND $image == '') 
				{
					$error = array('error' => $this->upload->display_errors());
					$this->session->set_flashdata('error', $error['error']);
					redirect(base_url() . 'bastu/add_bastu');
				}
			
				
				$post_data['image'] = $image;
				$post_data['description'] = $this->input->post('description');
				$post_data['title'] = $this->input->post('title');
				//echo "<pre>";print_r($post_data);exit();
				if($this->bastu_model->addbastu($post_data))
				{
					$this->session->set_flashdata('success',"bastu Added Successfully");
					redirect('bastu/add_bastu');
				}
				else
				{
					$this->session->set_flashdata('error',"Please try again");
					redirect('bastu/add_bastu/');
				}
			}
		}
		else
		{			
			$data = array();
			$this->layout->view('add_bastu',$data,'normal');
		}
	}

	// public function list_bastu()
	// {
	// 	$data['all_data'] = $this->db->get('bastu')->result();
	// 	$data["links"] = $this->pagination->create_links();
	// 	$this->layout->view('list_bastu',$data,'normal');
	// }

	public function list_bastu($limit_from = '')
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
    	$config["base_url"] = base_url().'bastu/list_bastu/';
    	$config["uri_segment"] = 3;
    	$config["total_rows"] = $this->bastu_model->record_count();
	    	
        $config["per_page"] = 10;
        $config['use_page_numbers'] = TRUE;

        $config['full_tag_open'] = '<div class="panel-footer clearfix"><ul class="pagination pagination-xs m-top-none pull-right">';
        
        $config['first_tag_open'] = '<li class="disabled">';
        $config['first_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';

        $config['prev_tag_open'] = '<li>';
        $config['prev_link'] = 'Previous';
        $config['prev_tag_close'] = '</li>';

        $config['next_tag_open'] = '<li>';
        $config['next_link'] = 'Next';
        $config['next_tag_close'] = '</li>';

        // $config['prev_tag_open'] = '<li><a href="#">';
        // $config['prev_tag_open'] = '</a></li>';
        $config['full_tag_close'] = '</ul></div>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        // $config['prev_link'] = '<li><a>&lt; Prev</a></li>';
        $config['next_tag_open'] = '<li>';
        $config['last_link'] = 'Last';
        $config['next_tag_close'] = '<li>';



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
		$data['all_data'] = $this->bastu_model->getbastu($config['per_page'], $start);
		$this->layout->view('list_bastu',$data,'normal');
		
	}

	

	public function delete_bastu($id,$image)
	{
		$this->db->where('id',$id);
		if($this->db->delete('bastu'))
		{
			$this->session->set_flashdata('success',"Bastu Deleted Successfully");
			unlink('../assets/bastu/'.$image);
			redirect('bastu/list_bastu');
		}
		else
		{
			$this->session->set_flashdata('error',"Bastu Not Deleted");
			redirect('bastu/list_bastu/');
		}
	}
	
}
