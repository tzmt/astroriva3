<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Course extends MX_Controller{

	public function __construct() {
		parent::__construct();
		if(!isset($this->session->userdata('astro_admin')->id))
		{
			redirect('login/');
		}
		$this->load->library('layout');
		$this->load->model('course_model');
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
			//echo "<pre>";print_r($_FILES);exit();
			$this->form_validation->set_rules('name','Course Name','required');	
			$this->form_validation->set_rules('duration','Course Duration','required');	
			$this->form_validation->set_rules('details','Details','required');
			$this->form_validation->set_rules('fee','Fee','required');	
			$this->form_validation->set_rules('total_class','Total Class','required');		
			if($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('error',validation_errors());
				redirect('course/add/');
			}
			else
			{	
				$image = '';                
				$dir = '../assets/syllabus/';
				$ext = end(explode('.',$_FILES['syllabus']['name']));				
				$file_name = time().rand(0000,9999);
				move_uploaded_file($_FILES['syllabus']['tmp_name'], $dir.$file_name.'.'.$ext);
				$post_data['name'] = $this->input->post('name');
				$post_data['duration'] = $this->input->post('duration');
				$post_data['details'] = $this->input->post('details');				
				$post_data['syllabus'] = $file_name.'.'.$ext;
				$post_data['fee'] = $this->input->post('fee');
				$post_data['total_class'] = $this->input->post('total_class');
				//echo "<pre>";print_r($post_data);exit();
				if($last_id = $this->course_model->addCourse($post_data))
				{
					$total_books = count($_FILES['book']['name']);
					$total_assign = count($_FILES['assignment']['name']);
					for($i = 0; $i < $total_books; $i++)
					{
						$dir = '../assets/books/';
						$ext = end(explode('.',$_FILES['book']['name'][$i]));		
						$file_name = time().rand(0000,9999).'.'.$ext;
						move_uploaded_file($_FILES['book']['tmp_name'][$i], $dir.$file_name);
						$arr = array('course_id'=>$last_id,'books'=>$file_name);
						$this->db->insert('course_books',$arr);
					}

					for($i = 0; $i < $total_assign; $i++)
					{
						$dir = '../assets/assignments/';
						$ext = end(explode('.',$_FILES['assignment']['name'][$i]));		
						$file_name = time().rand(0000,9999).'.'.$ext;
						move_uploaded_file($_FILES['assignment']['tmp_name'][$i], $dir.$file_name);
						$arr = array('course_id'=>$last_id,'assignments'=>$file_name);
						$this->db->insert('course_assignments',$arr);
					}
					$this->session->set_flashdata('success',"Course Added Successfully");
					redirect('course/add/');
				}
				else
				{
					$this->session->set_flashdata('error',"Please try again");
					redirect('course/add/');
				}
			}
		}
		else
		{
			$data['rashi_list'] = $this->course_model->getRashiList();
			//$data['topic_list'] = $this->rashi_model->getRashiTopicList();
			$this->layout->view('add_course',$data,'normal');
		}
	}

	public function lists($limit_from = '')
	{
		if($this->input->post())
		{		
			$post_data['course_id'] = $this->input->post('course_id');
			$image = '';  
			$total_books = count($_FILES['book']['name']);
			$total_assign = count($_FILES['assignment']['name']);              
			if($_FILES['syllabus']['name'] !="")
			{
				$dir = '../assets/syllabus/';
				$ext = end(explode('.',$_FILES['syllabus']['name']));				
				$file_name = time().rand(0000,9999).'.'.$ext;
				$post_data['syllabus'] = $file_name;
				move_uploaded_file($_FILES['syllabus']['tmp_name'], $dir.$file_name);
			}

			if($_FILES['books']['name'] !="")
			{
				$q = $this->db->get_where('course_books',array('course_id'=>$id))->result();
				foreach($q as $q1)
				{
					if(file_exists("../assets/books/'.$q1->books"))
					{
						unlink('../assets/books/'.$q1->books);		
					}
					
				}
				$this->db->where('course_id',$post_data['course_id']);
				$this->db->delete('course_books');

				for($i = 0; $i < $total_books; $i++)
				{
					$dir = '../assets/syllabus/';
					$ext = end(explode('.',$_FILES['syllabus']['name']));				
					$file_name = time().rand(0000,9999).'.'.$ext;
					$post_data['syllabus'] = $file_name;
					move_uploaded_file($_FILES['syllabus']['tmp_name'], $dir.$file_name);
					$arr = array('course_id'=>$last_id,'books'=>$file_name);
					$this->db->insert('course_books',$arr);
				}
			}

			if($_FILES['assignments']['name'] !="")
			{
				$qq = $this->db->get_where('course_assignments',array('course_id'=>$id))->result();
				foreach($qq as $qq1)
				{
					if(file_exists("../assets/assignments/'.$qq1->assignments"))
					{
						unlink('../assets/assignments/'.$qq1->assignments);		
					}
				}

				$this->db->where('course_id',$id);
				$this->db->delete('course_assignments');

				for($i = 0; $i < $total_assign; $i++)
				{
					$dir = '../assets/assignments/';
					$ext = end(explode('.',$_FILES['assignment']['name'][$i]));		
					$file_name = time().rand(0000,9999).'.'.$ext;
					move_uploaded_file($_FILES['assignment']['tmp_name'][$i], $dir.$file_name);
					$arr = array('course_id'=>$last_id,'assignments'=>$file_name);
					$this->db->insert('course_assignments',$arr);
				}
			}
			
			$post_data['name'] = $this->input->post('name');
			$post_data['duration'] = $this->input->post('duration');
			$post_data['details'] = $this->input->post('details');				
			$post_data['syllabus'] = $file_name.'.'.$ext;
			$post_data['fee'] = $this->input->post('fee');
			$post_data['total_class'] = $this->input->post('total_class');
			//echo "<pre>";print_r($post_data);exit();
			
			if($this->course_model->updateCourse($post_data))
			{					
				$this->session->set_flashdata('success',"Course Updated Successfully");
				redirect('course/lists/');
			}
			else
			{
				$this->session->set_flashdata('error',"Please try again");
				redirect('course/lists/');
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
	    	$config["base_url"] = base_url().'course/lists/';
	    	$config["uri_segment"] = 3;
	    	$config["total_rows"] = $this->course_model->record_count();
		    	
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
			$data['all_data'] = $this->course_model->getCourse($config['per_page'], $start);
			$this->layout->view('list_course',$data,'normal');
		}
	}

	
	public function delete_course($id)
	{
		$this->db->where('id',$id);
		if($this->db->delete('course'))
		{
			$q = $this->db->get_where('course_books',array('course_id'=>$id))->result();
			foreach($q as $q1)
			{
				if(file_exists("../assets/books/'.$q1->books"))
				{
					unlink('../assets/books/'.$q1->books);		
				}				
			}
			$this->db->where('course_id',$id);
			$this->db->delete('course_books');

			$qq = $this->db->get_where('course_assignments',array('course_id'=>$id))->result();
			foreach($qq as $qq1)
			{
				if(file_exists("../assets/assignments/'.$qq1->assignments"))
				{
					unlink('../assets/assignments/'.$qq1->assignments);		
				}				
			}

			$this->db->where('course_id',$id);
			$this->db->delete('course_assignments');

			$this->session->set_flashdata('success',"Course Deleted Successfully");
			redirect('course/lists');
		}
		else
		{
			$this->session->set_flashdata('error',"delete_course Not Deleted");
			redirect('course/lists/');
		}
	}
	
}
