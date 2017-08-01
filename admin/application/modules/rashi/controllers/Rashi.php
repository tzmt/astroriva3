<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Rashi extends MX_Controller{

	public function __construct() {
		parent::__construct();
		if(!isset($this->session->userdata('astro_admin')->id))
		{
			redirect('login/');
		}
		$this->load->library('layout');
		$this->load->model('rashi_model');
		$this->load->library('pagination');
		date_default_timezone_set('Asia/Kolkata');
	}
	public function index()
	{
		$data = array();
		$this->layout->view('add',$data,'normal');
	}

	public function add()
	{		
		if($this->input->post())
		{
			$this->form_validation->set_rules('name','Rashi Name','required');			
			if($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('error',validation_errors());
				redirect('rashi/add');
			}
			else
			{	
				$post_data['name'] = $this->input->post('name');
				$dir = '../assets/rashi_image/';
				$ext = end(explode('.',$_FILES['file']['name']));
				$files = time().rand(00000,99999).'.'.$ext;
				move_uploaded_file($_FILES['file']['tmp_name'], $dir.$files);
				$post_data['image'] = $files;

				$post_data = $this->security->xss_clean($post_data);

				if($this->rashi_model->addRashi($post_data))
				{
					$this->session->set_flashdata('success',"Rashi Added Successfully");
					redirect('rashi/add');
				}
				else
				{
					$this->session->set_flashdata('error',"Please try again");
					redirect('rashi/add/');
				}
			}
		}
		else
		{
			$data['rashi_list'] = $this->rashi_model->getRashiList();
			$this->layout->view('add',$data,'normal');
		}
	}

	public function delete_rashi($id)
	{
		$this->db->where('id',$id);
		if($this->db->delete('rashi_list'))
		{
			$this->session->set_flashdata('success',"Rashi Deleted Successfully");
			redirect('rashi/add');
		}
		else
		{
			$this->session->set_flashdata('error',"Rashi Not Deleted");
			redirect('rashi/add/');
		}
	}

	public function topic()
	{
		if($this->input->post())
		{
			$this->form_validation->set_rules('name','Rashi Name','required');			
			if($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('error',validation_errors());
				redirect('rashi/topic');
			}
			else
			{	
				$post_data['name'] = $this->input->post('name');

				$post_data = $this->security->xss_clean($post_data);

				if($this->rashi_model->addRashiTopic($post_data))
				{
					$this->session->set_flashdata('success',"Topic Added Successfully");
					redirect('rashi/topic');
				}
				else
				{
					$this->session->set_flashdata('error',"Please try again");
					redirect('rashi/topic/');
				}
			}
		}
		else
		{
			$data['topic_list'] = $this->rashi_model->getRashiTopicList();
			$this->layout->view('topic',$data,'normal');
		}
	}

	public function delete_topic($id)
	{
		$this->db->where('id',$id);
		if($this->db->delete('rashi_topic_list'))
		{
			$this->session->set_flashdata('success',"Topic Deleted Successfully");
			redirect('rashi/topic');
		}
		else
		{
			$this->session->set_flashdata('error',"Topic Not Deleted");
			redirect('rashi/topic/');
		}
	}

	public function details()
	{
		if($this->input->post())
		{
			$this->form_validation->set_rules('rashi_id','Rashi Name','required');	
			$this->form_validation->set_rules('topic_id','Rashi Name','required');	
			$this->form_validation->set_rules('description','Description','required');			
			if($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('error',validation_errors());
				redirect('rashi/details/');
			}
			else
			{	
				$image = '';
                $config['file_name'] = time();
				$config['upload_path'] = '../assets/rashi_details/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$this->load->library('upload', $config);
				$uploaded = $this->upload->do_upload();
				$upload_data = $this->upload->data();
				
				$image = $upload_data['file_name'];
				$configs['image_library'] = 'gd2';
				$configs['source_image']	= '../assets/rashi_details/'.$image;

				if (!$uploaded AND $image == '') 
				{
					$error = array('error' => $this->upload->display_errors());
					$this->session->set_flashdata('error_msg', $error['error']);
					redirect(base_url() . 'rashi/details');
				}

				$post_data['rashi_id'] = $this->input->post('rashi_id');
				$post_data['topic_id'] = $this->input->post('topic_id');
				$post_data['image'] = $image;
				$post_data['description'] = $this->input->post('description');

				$post_data = $this->security->xss_clean($post_data);


				if($this->rashi_model->addRashiTopicDetails($post_data))
				{
					$this->session->set_flashdata('success',"Rashi Details Added Successfully");
					redirect('rashi/details');
				}
				else
				{
					$this->session->set_flashdata('error',"Please try again");
					redirect('rashi/details/');
				}
			}
		}
		else
		{
			$data['rashi_list'] = $this->rashi_model->getRashiList();
			$data['topic_list'] = $this->rashi_model->getRashiTopicList();
			$this->layout->view('details',$data,'normal');
		}
	}

	public function delete_rashi_details($id)
	{
		$this->db->where('id',$id);
		if($this->db->delete('rashi_topic_details'))
		{
			$this->session->set_flashdata('success',"Rashi Details Deleted Successfully");
			redirect('rashi/details');
		}
		else
		{
			$this->session->set_flashdata('error',"Rashi Details Not Deleted");
			redirect('rashi/details/');
		}
	}

	public function edit_details($id)
	{
		if($this->input->post())
		{
			$this->form_validation->set_rules('rashi_id','Rashi Name','required');	
			$this->form_validation->set_rules('topic_id','Rashi Name','required');	
			$this->form_validation->set_rules('description','Description','required');			
			if($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('error',validation_errors());
				redirect('rashi/edit_details/'.$id);
			}
			else
			{	
				$image = '';
                $config['file_name'] = time();
				$config['upload_path'] = '../assets/rashi_details/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$this->load->library('upload', $config);
				$uploaded = $this->upload->do_upload();
				$upload_data = $this->upload->data();
				
				$image = $upload_data['file_name'];
				$configs['image_library'] = 'gd2';
				$configs['source_image']	= '../assets/rashi_details/'.$image;

				if (!$uploaded AND $image == '') 
				{
					$error = array('error' => $this->upload->display_errors());
					$this->session->set_flashdata('error_msg', $error['error']);
					redirect(base_url() . 'rashi/details');
				}

				$post_data['rashi_id'] = $this->input->post('rashi_id');
				$post_data['topic_id'] = $this->input->post('topic_id');
				$post_data['image'] = $image;
				$post_data['description'] = $this->input->post('description');
				$old_image = $this->input->post('image');

				unlink('../assets/rashi_details/'.$old_image);

				$post_data = $this->security->xss_clean($post_data);

				if($this->rashi_model->UpdateRashiTopicDetails($post_data,$id))
				{
					$this->session->set_flashdata('success',"Rashi Details Updated Successfully");
					redirect('rashi/edit_details/'.$id);
				}
				else
				{
					$this->session->set_flashdata('error',"Please try again");
					redirect('rashi/edit_details/'.$id);
				}
			}
		}
		else
		{
			$data['edit'] = $this->db->get_where('rashi_topic_details',array('id'=>$id))->row();
			$data['topic_list'] = $this->rashi_model->getRashiTopicList();
			$data['rashi_list'] = $this->rashi_model->getRashiList();
			$this->layout->view('details_edit',$data,'normal');
		}		
	}

	public function prediction()
	{
		if($this->input->post())
		{
			$this->form_validation->set_rules('rashi_id','Rashi Name','required');	
			$this->form_validation->set_rules('date_from','Date From','required');	
			$this->form_validation->set_rules('date_to','Date To','required');
			$this->form_validation->set_rules('description','Description','required');			
			if($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('error',validation_errors());
				redirect('rashi/prediction/');
			}
			else
			{	
				$image = '';
                $config['file_name'] = time();
				$config['upload_path'] = '../assets/rashi_prediction/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$this->load->library('upload', $config);
				$uploaded = $this->upload->do_upload();
				$upload_data = $this->upload->data();
				
				$image = $upload_data['file_name'];
				$configs['image_library'] = 'gd2';
				$configs['source_image']	= '../assets/rashi_prediction/'.$image;

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

				$post_data = $this->security->xss_clean($post_data);

				if($this->rashi_model->addRashiPrediction($post_data))
				{
					$this->session->set_flashdata('success',"Rashi Prediction Added Successfully");
					redirect('rashi/prediction');
				}
				else
				{
					$this->session->set_flashdata('error',"Please try again");
					redirect('rashi/prediction/');
				}
			}
		}
		else
		{
			$data['rashi_list'] = $this->rashi_model->getRashiList();
			//$data['topic_list'] = $this->rashi_model->getRashiTopicList();
			$this->layout->view('prediction',$data,'normal');
		}
	}

	public function my_prediction($limit_from = '')
	{
		if($this->input->post())
		{
			$image = '';
            $config['file_name'] = time();
			$config['upload_path'] = '../assets/rashi_prediction/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$uploaded = $this->upload->do_upload();
			$upload_data = $this->upload->data();
			
			$image = $upload_data['file_name'];
			$configs['image_library'] = 'gd2';
			$configs['source_image']	= '../assets/rashi_prediction/'.$image;

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
			$old_image = $this->input->post('old_image');
			$post_data['id'] = $this->input->post('pred_id');
			unlink('../assets/rashi_prediction/'.$old_image);

			$post_data = $this->security->xss_clean($post_data);

			if($this->rashi_model->updateRashiPrediction($post_data))
			{
				$this->session->set_flashdata('success',"Rashi Prediction Updated Successfully");
				redirect('rashi/my_prediction');
			}
			else
			{
				$this->session->set_flashdata('error',"Please try again");
				redirect('rashi/my_prediction/');
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
	    	$config["base_url"] = base_url().'rashi/my_prediction/';
	    	$config["uri_segment"] = 3;
	    	$config["total_rows"] = $this->rashi_model->record_count();
		    	
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
			$data['rashi_list'] = $this->rashi_model->getRashiList();
			$data['all_data'] = $this->rashi_model->getAdminPrediction($config['per_page'], $start);
			//$data['topic_list'] = $this->rashi_model->getRashiTopicList();
			$this->layout->view('my_prediction',$data,'normal');
		}
	}
	public function other_prediction($limit_from = '')
	{
		if($this->input->post())
		{
			$image = '';
            $config['file_name'] = time();
			$config['upload_path'] = '../assets/rashi_prediction/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$uploaded = $this->upload->do_upload();
			$upload_data = $this->upload->data();
			
			$image = $upload_data['file_name'];
			$configs['image_library'] = 'gd2';
			$configs['source_image']	= '../assets/rashi_prediction/'.$image;

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
			$old_image = $this->input->post('old_image');
			$post_data['id'] = $this->input->post('pred_id');
			unlink('../assets/rashi_prediction/'.$old_image);

			$post_data = $this->security->xss_clean($post_data);

			if($this->rashi_model->updateRashiPrediction($post_data))
			{
				$this->session->set_flashdata('success',"Rashi Prediction Updated Successfully");
				redirect('rashi/other_prediction');
			}
			else
			{
				$this->session->set_flashdata('error',"Please try again");
				redirect('rashi/other_prediction/');
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
	    	$config["base_url"] = base_url().'rashi/my_prediction/';
	    	$config["uri_segment"] = 3;
	    	$config["total_rows"] = $this->rashi_model->record_count();
		    	
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
			$data['rashi_list'] = $this->rashi_model->getRashiList();
			$data['all_data'] = $this->rashi_model->getOtherAstrologerPrediction($config['per_page'], $start);
			//$data['topic_list'] = $this->rashi_model->getRashiTopicList();
			$this->layout->view('other_prediction',$data,'normal');
		}
	}

	public function delete_rashi_prediction($id)
	{
		$this->db->where('id',$id);
		if($this->db->delete('rashi_prediction'))
		{
			$this->session->set_flashdata('success',"Rashi Prediction Deleted Successfully");
			redirect('rashi/my_prediction');
		}
		else
		{
			$this->session->set_flashdata('error',"Rashi Prediction Not Deleted");
			redirect('rashi/my_prediction/');
		}
	}

	public function remedy()
	{
		if($this->input->post())
		{
			$this->form_validation->set_rules('rashi_id','Rashi Name','required');	
			$this->form_validation->set_rules('remedy_type','Remedy','required');
			$this->form_validation->set_rules('specification','Specification','required');
			$this->form_validation->set_rules('price','Price','required');

			if($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('error',validation_errors());
				redirect('rashi/remedy');
			}
			else
			{	
				$post_data['rashi_id'] = $this->input->post('rashi_id');
				$post_data['remedy_type'] = $this->input->post('remedy_type');
				$post_data['specification'] = $this->input->post('specification');
				$post_data['price'] = $this->input->post('price');

				$post_data = $this->security->xss_clean($post_data);

				if($this->rashi_model->addRemedy($post_data))
				{
					$this->session->set_flashdata('success',"Remedy Added Successfully");
					redirect('rashi/remedy');
				}
				else
				{
					$this->session->set_flashdata('error',"Please try again");
					redirect('rashi/remedy/');
				}
			}
		}
		else
		{
			$data['rashi_list'] = $this->rashi_model->getRashiList();
			$data['remedy_list'] = $this->rashi_model->getRemedyList();
			$this->layout->view('remedy',$data,'normal');
		}	
	}

	public function edit_remedy()
	{
		if($this->input->post())
		{
			$this->form_validation->set_rules('rashi_id','Rashi Name','required');	
			$this->form_validation->set_rules('remedy_type','Remedy','required');
			$this->form_validation->set_rules('specification','Specification','required');
			$this->form_validation->set_rules('price','Price','required');

			if($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('error',validation_errors());
				redirect('rashi/remedy');
			}
			else
			{	
				$post_data['rashi_id'] = $this->input->post('rashi_id');
				$post_data['remedy_type'] = $this->input->post('remedy_type');
				$post_data['specification'] = $this->input->post('specification');
				$post_data['price'] = $this->input->post('price');
				$post_data['id'] = $this->input->post('id');

				$post_data = $this->security->xss_clean($post_data);

				if($this->rashi_model->updateRemedy($post_data))
				{
					$this->session->set_flashdata('success',"Remedy Updated Successfully");
					redirect('rashi/remedy');
				}
				else
				{
					$this->session->set_flashdata('error',"Please try again");
					redirect('rashi/remedy/');
				}
			}
		}
		else
		{
			$data['rashi_list'] = $this->rashi_model->getRashiList();
			$data['remedy_list'] = $this->rashi_model->getRemedyList();
			$this->layout->view('remedy',$data,'normal');
		}	
	}

	public function delete_remedy($id)
	{
		$this->db->where('id',$id);
		if($this->db->delete('rashi_remedy'))
		{
			$this->session->set_flashdata('success',"Rashi Remedy Deleted Successfully");
			redirect('rashi/remedy');
		}
		else
		{
			$this->session->set_flashdata('error',"Rashi Remedy Not Deleted");
			redirect('rashi/remedy/');
		}
	}

	function edit_rashi()
	{
		if($this->input->post())
		{
			$this->form_validation->set_rules('name','Rashi Name','required');	

			if($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('error',validation_errors());
				redirect('rashi/add');
			}
			else
			{	
				$post_data['name'] = $this->input->post('name');
				$id = $this->input->post('id');
				if($_FILES['userfile']['error'] != 4)
				{	
					$image = $this->input->post('image');				
					unlink('../assets/rashi_image/'.$image);
					$dir = '../assets/rashi_image/';
					$ext1 = explode('.',$_FILES['userfile']['name']);
					$ext = end($ext1);
					$files = time().rand(00000,99999);
					move_uploaded_file($_FILES['userfile']['tmp_name'], $dir.$files.'.'.$ext);
					$file_name = $files.'.'.$ext;
					$post_data['image'] = $file_name;

					$post_data = $this->security->xss_clean($post_data);
				}
				if($this->rashi_model->updateRashi($post_data,$id))
				{
					$this->session->set_flashdata('success',"Rashi Updated Successfully");
					redirect('rashi/add');
				}
				else
				{
					$this->session->set_flashdata('error',"Please try again");
					redirect('rashi/add/');
				}
			}
		}
	}
}
