<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Student extends MX_Controller{

	public function __construct() {
		parent::__construct();
		if(!isset($this->session->userdata('astro_admin')->id))
		{
			redirect('login/');
		}
		$this->load->library('layout');
		$this->load->model('student_model');
		$this->load->library('pagination');
		date_default_timezone_set('Asia/Kolkata');
	}
	public function index()
	{
		$this->lists($limit_from = '');
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
	    	$config["base_url"] = base_url().'student/list/';
	    	$config["uri_segment"] = 3;
	    	$config["total_rows"] = $this->student_model->record_count();
		    	
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
			//$data['rashi_list'] = $this->course_model->getRashiList();
			$data['all_data'] = $this->student_model->getStudent($config['per_page'], $start);
			$this->layout->view('list',$data,'normal');
	}

	public function delete_student($id,$image)
	{
		if($id)
		{
			$this->db->where('id',$id);
			if($this->db->delete('student'))
			{
				if(file_exists('../assets/student/'.$image))
				{
					unlink('../assets/student/'.$image);
				}
				$this->session->set_flashdata('success',"Student Deleted Successfully");
				redirect('student/');
			}
			else
			{
				$this->session->set_flashdata('error',"Please try again");
				redirect('student/');
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

				$post_data = $this->security->xss_clean($post_data);

				if($last_id = $this->student_model->updateLink($post_data,$id))
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
			$data['all_data'] = $this->student_model->getVideoList();
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

				$post_data = $this->security->xss_clean($post_data);

				if($last_id = $this->student_model->AddCategory($post_data))
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
			$data['all_data'] = $this->student_model->getCategoryList();
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

				$post_data = $this->security->xss_clean($post_data);

				if($last_id = $this->student_model->updateCategory($post_data,$id))
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
			$data['all_data'] = $this->student_model->getVideoList();
			//$data['topic_list'] = $this->rashi_model->getRashiTopicList();
			$this->layout->view('add',$data,'normal');
		}
	}

	public function email()
	{
		if($this->input->post())
		{
			$this->load->library('email');
			$this->email->from('info@astroriva.com', 'AstroRiva');
			$this->email->to($this->input->post('email')); 
			$this->email->subject($this->input->post('emsubjectail'));
			$this->email->message($this->input->post('details'));	
			$this->email->send();
			$this->session->set_flashdata('success',"Eamil Sent Successfully");
			redirect('video/category');
			redirect('student/');
		}	
		else
		{
			redirect('student/');
		}	
	}

	public function sms()
	{
		if($this->input->post())
		{
			$this->session->set_flashdata('success',"SMS sent Successfully");
			redirect('video/category');
			redirect('student/');
		}	
		else
		{
			redirect('student/');
		}	
	}

	public function passFail()
	{
		if($this->input->post())
		{
			$id = $this->input->post('id');
			$data['passed'] = $this->input->post('type');

			$data = $this->security->xss_clean($data);
			
			$this->db->where('id',$id);
			$this->db->update('student',$data);
			//echo $this->db->last_query();exit();
			$this->session->set_flashdata('success',"Status Updated Successfully");			
			redirect('student/');
		}	
		else
		{
			redirect('student/');
		}	
	}

	
	
}
