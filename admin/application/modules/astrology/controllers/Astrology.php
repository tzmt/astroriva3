<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Astrology extends MX_Controller{

	public function __construct() {
		parent::__construct();
		if(!isset($this->session->userdata('astro_admin')->id))
		{
			redirect('login/');
		}
		$this->load->library('layout');
		$this->load->model('astrology_model');
		$this->load->library('pagination');
		date_default_timezone_set('Asia/Kolkata');
		ini_set('display_errors','0');
	}
	public function index()
	{
		$data = array();
		$this->add_branch();
	}	

	public function add_branch($type ="")
	{
		
		if($this->input->post())
		{
			$this->form_validation->set_rules('name','Branch Name','required');
			$this->form_validation->set_rules('details','Branch Details','required');
			if($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('error',validation_errors());
				redirect('astrology/add_branch/');
			}
			else
			{	
				$post_data['name'] = $this->input->post('name');
				$post_data['details'] = $this->input->post('details');				
				//echo "<pre>";print_r($post_data);exit();
				$post_data = $this->security->xss_clean($post_data);

				if($last_id = $this->astrology_model->addBranch($post_data))
				{					
					$this->session->set_flashdata('success',"Branch Added Successfully");
					redirect('astrology/add_branch/');
				}
				else
				{
					$this->session->set_flashdata('error',"Please try again");
					redirect('astrology/add_branch/');
				}
			}
		}
		else
		{
			$data['astrologers_id'] = $this->astrology_model->astologersList();
			//$data['topic_list'] = $this->rashi_model->getRashiTopicList();
			$this->layout->view('add_branch',$data,'normal');
		}		
	}

	public function branch_lists($limit_from = '')
	{
		if($this->input->post())
		{	
			$id = $this->input->post('id');			
			$post_data['name'] = $this->input->post('name');
			$post_data['details'] = $this->input->post('details');	
			//echo "<pre>";print_r($post_data);exit();
			$post_data = $this->security->xss_clean($post_data);

			if($this->astrology_model->updateBranch($post_data,$id))
			{					
				$this->session->set_flashdata('success',"Branch Updated Successfully");
				redirect('astrology/branch_lists/');
			}
			else
			{
				$this->session->set_flashdata('error',"Please try again");
				redirect('astrology/branch_lists/');
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
	    	$config["base_url"] = base_url().'astrology/branch_lists/';
	    	$config["uri_segment"] = 3;
	    	$config["total_rows"] = $this->astrology_model->record_count();
		    	
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
	        $data['astrologers_id'] = $this->astrology_model->astologersList();
	        $data["links"] = $this->pagination->create_links();
			//$data['rashi_list'] = $this->course_model->getRashiList();
			$data['all_data'] = $this->astrology_model->getbranch($config['per_page'], $start);
			$this->layout->view('branch_list',$data,'normal');
		}
	}

	public function add_astrologers()
	{
		if($this->input->post())
		{
			$this->form_validation->set_rules('name','Product Name','required');
			$this->form_validation->set_rules('email','Email','required|valid_email');
			$this->form_validation->set_rules('password','Password ','required');
			$this->form_validation->set_rules('phone','Phone','required');
			$this->form_validation->set_rules('education','Education ','required');
			$this->form_validation->set_rules('specialization','Specialization ','required');
			$this->form_validation->set_rules('experience','Experience ','required');
			$this->form_validation->set_rules('details','Details ','required');
			$this->form_validation->set_rules('status','Status ','required');
			if($this->form_validation->run() == FALSE)
			{
				$this->session->Set_flashdata('error',validation_errors());
				redirect('astrology/add_astrologers/');
			}
			else
			{			
				//echo "<pre>";print_r($_FILES);exit();			
				$this->load->library('image_lib');
				$dir = '../assets/astrologer/';
				$ext = end(explode('.',$_FILES['file']['name']));
				$files = time().rand(00000,99999);
				move_uploaded_file($_FILES['file']['tmp_name'], $dir.$files.'.'.$ext);

				$config['image_library'] = 'gd2';
			    $config['source_image'] = '../assets/astrologer/'.$files.'.'.$ext;
			    $config['new_image'] = '../assets/astrologer/' .$files.'.'.$ext;
			    $config['create_thumb'] = TRUE;
			    $config['maintain_ratio'] = FALSE;
			    $config['width']     = 600;
			    $config['height']   = 600;
			    

			    $this->image_lib->clear();
			    $this->image_lib->initialize($config);
			    $this->image_lib->resize();			 

				$post_data['name'] = $this->input->post('name');
				$post_data['email'] = $this->input->post('email');
				$post_data['password'] = sha1(md5($this->input->post('password')));
				$post_data['phone'] = $this->input->post('phone');
				$post_data['education'] = $this->input->post('education');
				$post_data['specialization'] = $this->input->post('specialization');
				$post_data['experience'] = $this->input->post('experience');
				$post_data['details'] = $this->input->post('details');
				$post_data['status'] = $this->input->post('status');
				$post_data['image'] = $files.'_thumb.'.$ext;
				$post_data['email_verify'] = 1;

				$post_data = $this->security->xss_clean($post_data);
				
				if($id = $this->astrology_model->AddAstrologers($post_data))
				{
					//echo $files;exit();
					unlink('../assets/astrologer/'.$files.'.'.$ext);
					$this->session->Set_flashdata('success','Astrologers Added Successfully');
					redirect('astrology/add_astrologers/');
				}
				else
				{
					$this->session->Set_flashdata('error','Please try again');
					redirect('astrology/add_astrologers/');
				}
			}
		}
		else
		{
			$data = array();			
			$this->layout->view('add_astrologers',$data,'normal');
		}		
	}

	public function list_astrologers()
	{
		if($this->input->post())
		{	
			if($_FILES['file']['error'] != 4)
			{
				$image = $this->input->post('image');
				if(file_exists("../assets/astrologer/'.$image"))
				{
					unlink('../assets/astrologer/'.$image);
				}
				$dir = '../assets/astrologer/';
				$ext = end(explode('.',$_FILES['file']['name']));
				$files = time().rand(00000,99999).'.'.$ext;
				move_uploaded_file($_FILES['file']['tmp_name'], $dir.$files);
				unlink('../assets/astrologer/'.$image);
				$post_data['image'] = $files;
			}
			

			$post_data['name'] = $this->input->post('name');
			$post_data['email'] = $this->input->post('email');
			$post_data['phone'] = $this->input->post('phone');
			$post_data['education'] = $this->input->post('education');
			$post_data['specialization'] = $this->input->post('specialization');
			$post_data['experience'] = $this->input->post('experience');
			$post_data['details'] = $this->input->post('details');
			$post_data['status'] = $this->input->post('status');
			$id = $this->input->post('id');
			//echo "<pre>";print_r($post_data);exit();

			$post_data = $this->security->xss_clean($post_data);

			if($this->astrology_model->updateAstrologer($post_data,$id))
			{					
				$this->session->set_flashdata('success',"Astrologers Updated Successfully");
				redirect('astrology/list_astrologers/');
			}
			else
			{
				$this->session->set_flashdata('error',"Please try again");
				redirect('astrology/list_astrologers/');
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
	    	$config["base_url"] = base_url().'astrology/list_astrologers/';
	    	$config["uri_segment"] = 3;
	    	$config["total_rows"] = $this->astrology_model->record_count1();
		    	
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
	        //$data['category_list'] = $this->astrology_model->getCategoryList();
			$data['all_data'] = $this->astrology_model->getAstrologers($config['per_page'], $start);
			$this->layout->view('astrology/list_astrologers',$data,'normal');
		}
	}

	public function add_remedy()
	{
		if($this->input->post())
		{

			$this->form_validation->set_rules('problem_name','Name of Problem','required');
			$this->form_validation->set_rules('details','Details','required');
			$this->form_validation->set_rules('remedy_name','Name of Remedy ','required');
			$this->form_validation->set_rules('price','Price','required');
			if($this->form_validation->run() == FALSE)
			{
				$this->session->Set_flashdata('error',validation_errors());
				redirect('astrology/add_remedy/');
			}
			else
			{				
				$dir = '../assets/public_remedy/';
				$ext = end(explode('.',$_FILES['file']['name']));
				$files = time().rand(00000,99999).'.'.$ext;
				move_uploaded_file($_FILES['file']['tmp_name'], $dir.$files);
				$post_data['problem_name'] = $this->input->post('problem_name');
				$post_data['details'] = $this->input->post('details');
				$post_data['remedy_name'] = $this->input->post('remedy_name');
				$post_data['price'] = $this->input->post('price');
				$post_data['image'] = $files;
				
				$post_data = $this->security->xss_clean($post_data);

				if($id = $this->astrology_model->addPublicRemedy($post_data))
				{
					$this->session->Set_flashdata('success','Remedy Added Successfully');
					redirect('astrology/add_remedy/');
				}
				else
				{
					$this->session->Set_flashdata('error','Please try again');
					redirect('astrology/add_remedy/');
				}
			}
		}
		else
		{
			$data = array();			
			$this->layout->view('add_remedy',$data,'normal');
		}		
	}

	public function list_remedy()
	{
		if($this->input->post())
		{	
			$post_data['problem_name'] = $this->input->post('problem_name');
			$post_data['details'] = $this->input->post('details');
			$post_data['remedy_name'] = $this->input->post('remedy_name');
			$post_data['price'] = $this->input->post('price');
			$id = $this->input->post('id');
			$image = $this->input->post('image');
			
			if($_FILES['file']['error'] == 4)
			{
				
			}
			else
			{
				//echo "<pre>";print_r($_FILES);exit();				
				if(file_exists("../assets/public_remedy/'.$image"))
				{				
					unlink('../assets/public_remedy/'.$image);
				}				
				$dir = '../assets/public_remedy/';
				$ext = end(explode('.',$_FILES['file']['name']));
				$files = time().rand(00000,99999).'.'.$ext;
				move_uploaded_file($_FILES['file']['tmp_name'], $dir.$files);
				$post_data['image'] = $files;
			}
			

			//echo "<pre>";print_r($post_data);exit();
			
			$post_data = $this->security->xss_clean($post_data);

			if($this->astrology_model->updateRemedy($post_data,$id))
			{					
				$this->session->set_flashdata('success',"Astrologers Updated Successfully");
				redirect('astrology/list_remedy/');
			}
			else
			{
				$this->session->set_flashdata('error',"Please try again");
				redirect('astrology/list_remedy/');
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
	    	$config["base_url"] = base_url().'astrology/list_remedy/';
	    	$config["uri_segment"] = 3;
	    	$config["total_rows"] = $this->astrology_model->record_count2();
		    	
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
	        //$data['category_list'] = $this->astrology_model->getCategoryList();
			$data['all_data'] = $this->astrology_model->getRemedyList($config['per_page'], $start);
			$this->layout->view('remedy_list',$data,'normal');
		}
	}

	public function add_service()
	{
		if($this->input->post())
		{

			$this->form_validation->set_rules('name','Name','required');
			$this->form_validation->set_rules('description','Description','required');
			$this->form_validation->set_rules('service_type','Type Of Service','required');
			$this->form_validation->set_rules('amount','Amount ','required');
			$this->form_validation->set_rules('discount','Discount','required');
			if($this->form_validation->run() == FALSE)
			{
				$this->session->Set_flashdata('error',validation_errors());
				redirect('astrology/add_service/');
			}
			else
			{				
				$dir = '../assets/services/';
				$ext = end(explode('.',$_FILES['file']['name']));
				$files = time().rand(00000,99999).'.'.$ext;
				move_uploaded_file($_FILES['file']['tmp_name'], $dir.$files);

				$dir = '../assets/services/image/';
				$ext = end(explode('.',$_FILES['file1']['name']));
				$files1 = str_replace(" ","-",$_FILES['file1']['name']).rand(00000,99999).'.'.$ext;
				move_uploaded_file($_FILES['file1']['tmp_name'], $dir.$files1);



				$post_data['name'] = $this->input->post('name');
				$post_data['service_type'] = $this->input->post('service_type');
				$post_data['amount'] = $this->input->post('amount');
				$post_data['discount'] = $this->input->post('discount');
				$post_data['sample_pdf'] = $files;
				$post_data['image'] = $files1;

				$post_data['description'] = $this->input->post('description');
				
				$post_data = $this->security->xss_clean($post_data);

				if($id = $this->astrology_model->addService($post_data))
				{
					$this->session->Set_flashdata('success','Service Added Successfully');
					redirect('astrology/add_service/');
				}
				else
				{
					$this->session->Set_flashdata('error','Please try again');
					redirect('astrology/add_service/');
				}
			}
		}
		else
		{
			$data['service'] = $this->astrology_model->getService();			
			$this->layout->view('add_service',$data,'normal');
		}		
	}

	public function edit_service()
	{
		if($this->input->post())
		{
			if($_FILES['file']['error'] != 4)
			{
				$dir = '../assets/service/';
				$ext = end(explode('.',$_FILES['file']['name']));
				$files = time().rand(00000,99999).'.'.$ext;
				move_uploaded_file($_FILES['file']['tmp_name'], $dir.$files);
				$post_data['sample_pdf'] = $files;
			}
			
			$post_data['name'] = $this->input->post('name');
			$post_data['service_type'] = $this->input->post('service_type');
			$post_data['amount'] = $this->input->post('amount');
			$post_data['discount'] = $this->input->post('discount');
			$id = $this->input->post('id');

			$post_data = $this->security->xss_clean($post_data);
			
			if($id = $this->astrology_model->UpdateService($post_data,$id))
			{
				$this->session->Set_flashdata('success','Service Added Successfully');
				redirect('astrology/add_service/');
			}
			else
			{
				$this->session->Set_flashdata('error','Please try again');
				redirect('astrology/add_service/');
			}
		}
	}

	public function add_products_pictures($id = "")
	{
		
		$data = array();;
		$this->layout->view('add_products_pictures',$data,'normal');		
	}	
	
	public function other_products()
	{
		if($this->input->post())
		{	
			$post_data['name'] = $this->input->post('name');
			$post_data['category_id'] = $this->input->post('category_id');
			$post_data['sub_category_id'] = $this->input->post('sub_category_id');
			$post_data['dimension'] = $this->input->post('dimension1').'x'.$this->input->post('dimension2').'x'.$this->input->post('dimension3');
			$post_data['weight'] = $this->input->post('weight');
			$post_data['specific_gravity'] = $this->input->post('specific_gravity');
			$post_data['refractive_index'] = $this->input->post('refractive_index');
			$post_data['price'] = $this->input->post('price');
			$post_data['product_type'] = $this->input->post('product_type');
			$post_data['type'] = 2;
			$id = $this->input->post('id');
			$post_data['quantity'] = $this->input->post('quantity');
			//echo "<pre>";print_r($post_data);exit();

			$post_data = $this->security->xss_clean($post_data);
			
			if($this->astrology_model->updateProducts($post_data,$id))
			{					
				$this->session->set_flashdata('success',"Products Updated Successfully");
				redirect('shop/other_products/');
			}
			else
			{
				$this->session->set_flashdata('error',"Please try again");
				redirect('shop/other_products/');
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
	    	$config["base_url"] = base_url().'shop/other_products/';
	    	$config["uri_segment"] = 3;
	    	$config["total_rows"] = $this->astrology_model->record_count1();
		    	
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
	        $data['category_list'] = $this->astrology_model->getCategoryList();
			$data['all_data'] = $this->astrology_model->getProducts1($config['per_page'], $start);
			$this->layout->view('other_products',$data,'normal');
		}
	}

	public function edit()
	{		
		$id = $this->input->post('id');
		$post_data['name'] = $this->input->post('name');
		$this->db->where('id',$id);

		$post_data = $this->security->xss_clean($post_data);

		if($this->db->update('shop_category',$post_data))
		{					
			$this->session->set_flashdata('success',"Category Updated Successfully");
			redirect('shop/category/');
		}
		else
		{
			$this->session->set_flashdata('error',"Please try again");
			redirect('shop/category/');
		}	
	}

	
	public function delete_branch($id)
	{
		$this->db->where('id',$id);
		if($this->db->delete('branch'))
		{			
			$q = $this->db->get_where('branch_image',array('branch_id'=>$id))->result();
			foreach($q as $q1)
			{
				if(file_exists('../assets/branch/'.$q1->image))
				{
					unlink('../assets/branch/'.$q1->image);
					$this->db->where('id',$q1->id);
					$this->db->delete('branch_image');
				}
			}
			$this->session->set_flashdata('success',"Branch Deleted Successfully");		
			redirect('astrology/branch_lists/');
		}
		else
		{
			$this->session->set_flashdata('error',"Branch Not Deleted");
			redirect('astrology/branch_lists/');
		}
	}

	public function delete_astrologer($id)
	{
		$this->db->where('id',$id);
		if($this->db->delete('astrologer'))
		{			
			$this->session->set_flashdata('success',"Astrologer Deleted Successfully");		
			redirect('astrology/list_astrologers/');
		}
		else
		{
			$this->session->set_flashdata('error',"Product Not Deleted");
			redirect('astrology/list_astrologers/');
		}
	}

	public function delete_remedy($id,$image)
	{
		$this->db->where('id',$id);
		if($this->db->delete('public_remedy'))
		{		
			if(file_exists("../assets/public_remedy/'.$image"))
			{				
				unlink('../assets/public_remedy/'.$image);
			}				
			$this->session->set_flashdata('success',"Remedy Deleted Successfully");		
			redirect('astrology/list_remedy/');
		}
		else
		{
			$this->session->set_flashdata('error',"Product Not Deleted");
			redirect('astrology/list_remedy/');
		}
	}

	public function delete_service($id,$image)
	{
		$this->db->where('id',$id);
		if($this->db->delete('astrology_service'))
		{					
			if(file_exists("../assets/service/'.$image"))
			{				
				unlink('../assets/service/'.$image);
			}	
			$this->session->set_flashdata('success',"Service Deleted Successfully");		
			redirect('astrology/add_service/');
		}
		else
		{
			$this->session->set_flashdata('error',"Product Not Deleted");
			redirect('astrology/add_service/');
		}
	}
	

	public function ajaxDeleteImage()
	{
		$image = $this->input->post('image');
		$id = $this->input->post('forid');
		$this->db->where('id',$id);
		$this->db->delete('branch_image');
		$this->db->last_query();
		if(file_exists("../assets/branch/'.$image"))
		{				
			unlink('../assets/branch/'.$image);
		}			
	}

	public function upload_pictures($id = "")
	{		
		$dir = '../assets/branch/';
		$ext = end(explode('.',$_FILES['file']['name']));
		$files = time().rand(00000,99999).'.'.$ext;
		move_uploaded_file($_FILES['file']['tmp_name'], $dir.$files);
		$arr = array('branch_id'=>$id,'image'=>$files);
		$this->db->insert('branch_image',$arr);
	}

	public function getSubcategory()
	{
		$cat_id = $this->input->post('cat_id');
		$q = $this->db->get_where('shop_category',array('category_id'=>$cat_id))->result();
		$html = '<option value="">[select]</option>';
		foreach($q as $q1)
		{
			$html.= '<option value="'.$q1->id.'">'.$q1->name.'</option>';
		}
		echo $html;
	}

	public function addBranch()
	{
		if($this->input->post())
		{
			$id = $this->input->post('id');
			$arr = array(
				'branch_name'=>$this->input->post('name'),
				'place'=>$this->input->post('place'),
				'time'=>$this->input->post('time_from').":".$this->input->post('time_from_day')." to ".$this->input->post('time_to').":".$this->input->post('time_to_day'),
				'nearby_places'=>$this->input->post('nearby_places'),
				'astrologers_id'=>$id,
				'phone1'=>$this->input->post('phone1'),
                'phone2'=>$this->input->post('phone2'),
                'phone3'=>$this->input->post('phone3'),
                'phone4'=>$this->input->post('phone4'),
                'day'=>$this->input->post('day'),
			);			
			if($this->db->insert('astrologer_branch',$arr))
			{
				$this->session->set_flashdata('success',"Branch Deleted Successfully");		
				redirect('astrology/list_astrologers/');
			}
			else
			{
				$this->session->set_flashdata('error',"Please try again");
				redirect('astrology/list_astrologers/');
			}
		}
	}


	public function books()
	{
		if($this->input->post())
		{
			$this->form_validation->set_rules('name','Name','required');
			$this->form_validation->set_rules('author','Author Name','required');
			$this->form_validation->set_rules('rashi','Rashi Name ','required');
			if($this->form_validation->run() == FALSE)
			{
				$this->session->Set_flashdata('error',validation_errors());
				redirect('astrology/books/');
			}
			else
			{
				$dir = '../assets/books/image/';
				$ext = end(explode('.',$_FILES['file']['name']));
				$files = time().rand(00000,99999).'.'.$ext;
				move_uploaded_file($_FILES['file']['tmp_name'], $dir.$files);

				$dir = '../assets/books/pdf/';
				$ext = end(explode('.',$_FILES['book']['name']));
				$pdf = str_replace(" ",'-',$this->input->post('name')).'.'.$ext;
				move_uploaded_file($_FILES['book']['tmp_name'], $dir.$pdf);
				
				$post_data['name'] = $this->input->post('name');
				$post_data['author'] = $this->input->post('author');
				$post_data['image'] = $files;
				$post_data['rashi'] = $this->input->post('rashi');
				$post_data['file'] = $pdf;

				$post_data = $this->security->xss_clean($post_data);

				if($this->db->insert("books",$post_data))
				{
					$this->session->set_flashdata('success',"Books Added Successfully");
					redirect('astrology/books/');
				}
				else
				{
					$this->session->set_flashdata('error',"Please try again");
					redirect('astrology/books/');
				}
			}
		}
		else
		{
			$data['all_data'] = $this->db->get_where("books")->result();
			$this->layout->view('books',$data,'normal');	
		}
	}


	public function delete_books($id,$image,$books)
	{				
		$this->db->where('id',$id);
		$q = $this->db->delete('books');						
		unlink('../assets/books/image/'.$image);
		unlink('../assets/books/pdf/'.$image);
		if($q)
		{
			$this->session->set_flashdata('success',"Books Deleted Successfully");
			redirect('astrology/books/');
		}
		else
		{
			$this->session->set_flashdata('error',"Please try again");
			redirect('astrology/books/');
		}
	}
	
}
