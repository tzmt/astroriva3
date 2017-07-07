<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends MX_Controller{

	public function __construct() {
		parent::__construct();
		if(!isset($this->session->userdata('astro_admin')->id))
		{
			redirect('login/');
		}
		$this->load->library('layout');
		$this->load->model('contact_model');
		$this->load->library('pagination');
		date_default_timezone_set('Asia/Kolkata');
	}
	public function index()
	{
		$data = array();
		$this->lists();
	}	
	

	public function lists($limit_from = '')
	{
		if($this->input->post())
		{			
			$this->load->library('email');
			$this->email->from('info@astroriva.com', 'AstroRiva');
			$this->email->to($this->input->post('email')); 
			$this->email->subject($this->input->post('subject'));
							
			$this->email->message($this->input->post('message'));	

			$this->email->send();
			$id = $this->input->post('id');		
			
			if($this->contact_model->updateContact($id))
			{
				$this->session->set_flashdata('success',"Email Sent Successfully");
				redirect('contact/lists');
			}
			else
			{
				$this->session->set_flashdata('error',"Please try again");
				redirect('contact/lists/');
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
	    	$config["base_url"] = base_url().'contact/lists/';
	    	$config["uri_segment"] = 3;
	    	$config["total_rows"] = $this->contact_model->record_count();
		    	
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
			$data['all_data'] = $this->contact_model->getContact($config['per_page'], $start);
			//echo "<pre>";print_r($data);exit();
			$this->layout->view('list',$data,'normal');
		}
	}

	
	public function delete_contact($id,$image)
	{
		$this->db->where('id',$id);
		if($this->db->delete('contact'))
		{			
			$this->session->set_flashdata('success',"Contact Deleted Successfully");
			redirect('contact/lists');
		}
		else
		{
			$this->session->set_flashdata('error',"Contact Not Deleted");
			redirect('contact/lists/');
		}
	}
	
}
