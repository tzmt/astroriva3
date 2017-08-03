<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Acharya extends MX_Controller{

	public function __construct() {
		parent::__construct();
		if(!isset($this->session->userdata('astro_admin')->id))
		{
			redirect('login/');
		}
		$this->load->library('layout');
		$this->load->model('acharya_model');
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
			$this->form_validation->set_rules('name','Category Name','required');
			$this->form_validation->set_rules('phone','Phone Number','required');	
			$this->form_validation->set_rules('details1','Details 1','required');	
			$this->form_validation->set_rules('details2','Details 2','required');	
			$this->form_validation->set_rules('details3','Details 3','required');			
			if($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('error',validation_errors());
				redirect('acharya/add');
			}
			else
			{	
				if($_FILES['file']['error'] != 4)
				{
					$files = '';
					$dir = '../assets/acharya/';
					$ext = end(explode('.',$_FILES['file']['name']));
					$files = time().rand(00000,99999).'.'.$ext;
					move_uploaded_file($_FILES['file']['tmp_name'], $dir.$files);
					$post_data['image'] = $files;
					$image = $this->input->post('image');
					unlink('assets/acharya/'.$image);
				}
				$post_data['name'] = $this->input->post('name');
				$post_data['phone'] = $this->input->post('phone');
				$post_data['details1'] = $this->input->post('details1');
				$post_data['details2'] = $this->input->post('details2');
				$post_data['details3'] = $this->input->post('details3');
				$post_data['details4'] = $this->input->post('details4');
				$post_data['details5'] = $this->input->post('details5');

				$post_data = $this->security->xss_clean($post_data);

				if($this->acharya_model->UpdateDetails($post_data))
				{
					$this->session->set_flashdata('success',"Updated Successfully");
					redirect('acharya/add');
				}
				else
				{
					$this->session->set_flashdata('error',"Please try again");
					redirect('acharya/add/');
				}
			}
		}
		else
		{
			$data['all_data'] = $this->db->get_where('acharya',array('id'=>1))->row();
			$data['comments_list'] = $this->acharya_model->getComments();
			$this->layout->view('add',$data,'normal');
		}
	}

	public function branch()
	{		
		if($this->input->post())
		{
			$this->form_validation->set_rules('branch_name','Branch Name','required');
			$this->form_validation->set_rules('place','Place','required');
			$this->form_validation->set_rules('time_from','Time From','required');
			$this->form_validation->set_rules('time_from_day','Time From Am/PM','required');
			$this->form_validation->set_rules('time_to','Time To','required');
			$this->form_validation->set_rules('time_to_day','Time To Am/PM','required');
			$this->form_validation->set_rules('day','Day','required');
			$this->form_validation->set_rules('nearby_places','Nearby Places','required');
			$this->form_validation->set_rules('phone1','Phone Number','required');	
			$this->form_validation->set_rules('person','Number of Person','required');		
			if($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('error',validation_errors());
				redirect('acharya/branch');
			}
			else
			{		
				if($this->acharya_model->AddBranch($this->security->xss_clean($this->input->post())))
				{
					$this->session->set_flashdata('success','Branch Added Successfully');
					redirect('acharya/branch');
				}
				else
				{
					$this->session->set_flashdata('error',"Please try again");
					redirect('acharya/branch/');
				}
			}
		}
		else
		{
			$data['all_data'] = $this->db->get_where('acharya',array('id'=>1))->row();
			$data['branch_list'] = $this->acharya_model->getBranch();
			$this->layout->view('branch',$data,'normal');
		}
	}

	public function delete_comments($id)
	{
		$this->db->where('id',$id);
		if($this->db->delete('acharya_comments'))
		{
			$this->session->set_flashdata('success',"Comments Deleted Successfully");
			redirect('acharya/add');
		}
		else
		{
			$this->session->set_flashdata('error',"Comments Not Deleted");
			redirect('acharya/add/');
		}
	}

	public function delete_branch($id)
	{
		$this->db->where('id',$id);
		if($this->db->delete('acharya_branch'))
		{
			$this->session->set_flashdata('success',"Branch Deleted Successfully");
			redirect('acharya/branch');
		}
		else
		{
			$this->session->set_flashdata('error',"Branch Not Deleted");
			redirect('acharya/branch/');
		}
	}

	public function delete_request($id)
	{
		$this->db->where('id',$id);
		if($this->db->delete('request_service'))
		{
			$this->session->set_flashdata('success',"Service Deleted Successfully");
			redirect('acharya/appointment');
		}
		else
		{
			$this->session->set_flashdata('error',"Service Not Deleted");
			redirect('acharya/appointment/');
		}
	}

	public function appointment()
	{
		if($this->input->post())
		{
			$this->form_validation->set_rules('email','Email','required|valid_email');
			$this->form_validation->set_rules('answers','Answers','required');	
			if($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('error',validation_errors());
				redirect('acharya/appointment');
			}
			else
			{	
				$id = $this->input->post('id');
				$arr['answers'] = $this->input->post('answers');
				$arr['status'] = 1;
				$this->db->where('id',$id);
				$arr = $this->security->xss_clean($arr);
				if($this->db->update('request_service',$arr))
				{
					$this->load->library('email');
					$this->email->from('info@astroriva.com', 'AstroRiva');
					$this->email->to($this->input->post('email')); 
					if($this->input->post('purpose') == 1)
					{
						$this->email->subject('Your prediction for Horoscopre at AstroRiva.');
					}
					else
					{
						$this->email->subject('Your prediction for Match Making at AstroRiva');
					}					
					$this->email->message($this->input->post('answers'));	

					$this->email->send();
					$this->session->set_flashdata('success',"Prediction has been sent to their email address.");
					redirect('acharya/appointment');
				}
				else
				{
					$this->session->set_flashdata('error',"Plz try again");
					redirect('acharya/appointment');
				}
			}
		}
		else
		{
			$data['horoscopre'] = $this->acharya_model->getHosroscopeAppointment();
			$data['matchmaking'] = $this->acharya_model->getMatchMakingAppointment();
			//echo "<pre>";print_r($data);exit();
			$this->layout->view('appointment',$data,'normal');
		}		
	}	
}
