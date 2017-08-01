<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Gallery extends MX_Controller{

	public function __construct() {
		parent::__construct();
		if(!isset($this->session->userdata('astro_admin')->id))
		{
			redirect('login/');
		}
		$this->load->library('layout');
		$this->load->model('gallery_model');
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
		$data = array();
		$this->layout->view('add',$data,'normal');	
	}

	public function upload_pictures($id = "")
	{		
		$dir = '../assets/gallery/';
		$ext1 = explode('.',$_FILES['file']['name']);
		$ext = end($ext1);
		$files = time().rand(00000,99999).'.'.$ext;
		move_uploaded_file($_FILES['file']['tmp_name'], $dir.$files);
		$arr = array('image'=>$id,'image'=>$files);

		$arr = $this->security->xss_clean($arr);
		
		$this->db->insert('gallery',$arr);
	}

	public function lists($limit_from = '')
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
    	$config["base_url"] = base_url().'gallery/lists/';
    	$config["uri_segment"] = 3;
    	$config["total_rows"] = $this->gallery_model->record_count();
	    	
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
		$data['all_data'] = $this->gallery_model->getGallery($config['per_page'], $start);
		$this->layout->view('list',$data,'normal');
		
	}

	
	public function delete($id,$image)
	{
		$this->db->where('id',$id);
		if($this->db->delete('gallery'))
		{
			if(file_exists('../assets/gallery/'.$image))
			{
				unlink('../assets/gallery/'.$image);
			}
			$this->session->set_flashdata('success',"Image Deleted Successfully");
			redirect('gallery/lists');
		}
		else
		{
			$this->session->set_flashdata('error',"Image Not Deleted");
			redirect('gallery/lists/');
		}
	}
	
}
