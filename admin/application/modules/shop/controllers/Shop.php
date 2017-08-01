<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Shop extends MX_Controller{

	public function __construct() {
		parent::__construct();
		if(!isset($this->session->userdata('astro_admin')->id))
		{
			redirect('login/');
		}
		$this->load->library('layout');
		$this->load->model('shop_model');
		$this->load->library('pagination');
		date_default_timezone_set('Asia/Kolkata');
	}
	public function index()
	{
		$data = array();
		$this->category();
	}	

	public function category($type ="")
	{
		if($type != "sub")
		{
			if($this->input->post())
			{
				$this->form_validation->set_rules('name','Category Name','required');	
				if($this->form_validation->run() == FALSE)
				{
					$this->session->set_flashdata('error',validation_errors());
					redirect('shop/category/');
				}
				else
				{	
					
					$post_data['name'] = $this->input->post('name');	

					$post_data = $this->security->xss_clean($post_data);			
					//echo "<pre>";print_r($post_data);exit();
					if($last_id = $this->shop_model->addCategory($post_data))
					{					
						$this->session->set_flashdata('success',"Category Added Successfully");
						redirect('shop/category/');
					}
					else
					{
						$this->session->set_flashdata('error',"Please try again");
						redirect('shop/category/');
					}
				}
			}
			else
			{
				$data['category_list'] = $this->shop_model->getCategoryList();
				//$data['topic_list'] = $this->rashi_model->getRashiTopicList();
				$this->layout->view('add_category',$data,'normal');
			}
		}
		else
		{
			if($this->input->post())
			{
				$this->form_validation->set_rules('category_id','Category','required');	
				$this->form_validation->set_rules('name','Sub Category Name','required');	
				if($this->form_validation->run() == FALSE)
				{
					$this->session->set_flashdata('error',validation_errors());
					redirect('shop/category/');
				}
				else
				{	
					$post_data['category_id'] = $this->input->post('category_id');
					$post_data['name'] = $this->input->post('name');

					$post_data = $this->security->xss_clean($post_data);

					//echo "<pre>";print_r($post_data);exit();
					if($last_id = $this->shop_model->addCategory($post_data))
					{					
						$this->session->set_flashdata('success',"Sub Category Added Successfully");
						redirect('shop/category/');
					}
					else
					{
						$this->session->set_flashdata('error',"Please try again");
						redirect('shop/category/');
					}
				}
			}
			else
			{
				$data['category_list'] = $this->shop_model->getCategoryList();
				//$data['topic_list'] = $this->rashi_model->getRashiTopicList();
				$this->layout->view('add_category',$data,'normal');
			}
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
			
			if($this->shop_model->updateClass($post_data,$id))
			{					
				$this->session->set_flashdata('success',"Products Updated Successfully");
				redirect('shop/my_products/');
			}
			else
			{
				$this->session->set_flashdata('error',"Please try again");
				redirect('shop/my_products/');
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
	    	$config["base_url"] = base_url().'shop/my_products/';
	    	$config["uri_segment"] = 3;
	    	$config["total_rows"] = $this->shop_model->record_count();
		    	
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
	        $data['course_list'] = $this->shop_model->getCourseList();
	        $data["links"] = $this->pagination->create_links();
			//$data['rashi_list'] = $this->course_model->getRashiList();
			$data['all_data'] = $this->shop_model->getClass($config['per_page'], $start);
			$this->layout->view('list_classes',$data,'normal');
		}
	}

	public function add_products()
	{
		if($this->input->post())
		{
			$this->form_validation->set_rules('name','Product Name','required');
			$this->form_validation->set_rules('category_id','Category','required');
			$this->form_validation->set_rules('sub_category_id','Sub Category','required');
			if($this->form_validation->run() == FALSE)
			{
				$this->session->Set_flashdata('error',validation_errors());
				redirect('shop/add_products/');
			}
			else
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
				$post_data['type'] = 1;
				$post_data['quantity'] = $this->input->post('quantity');

				$post_data = $this->security->xss_clean($post_data);

				if($id = $this->shop_model->addProducts($post_data))
				{
					$this->session->Set_flashdata('success','Product Added Successfully');
					redirect('shop/add_products_pictures/'.$post_data['name']."/".$id);
				}
				else
				{
					$this->session->Set_flashdata('error','Please try again');
					redirect('shop/add_products/');
				}
			}
		}
		else
		{
			$data['category_list'] = $this->shop_model->getCategoryList();
			$this->layout->view('add_products',$data,'normal');
		}		
	}

	public function add_products_pictures($id = "")
	{
		
		$data = array();;
		$this->layout->view('add_products_pictures',$data,'normal');		
	}

	public function my_products()
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
			$post_data['type'] = 1;
			$id = $this->input->post('id');
			$post_data['quantity'] = $this->input->post('quantity');
			//echo "<pre>";print_r($post_data);exit();

			$post_data = $this->security->xss_clean($post_data);
			
			if($this->shop_model->updateProducts($post_data,$id))
			{					
				$this->session->set_flashdata('success',"Products Updated Successfully");
				redirect('shop/my_products/');
			}
			else
			{
				$this->session->set_flashdata('error',"Please try again");
				redirect('shop/my_products/');
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
	    	$config["base_url"] = base_url().'shop/my_products/';
	    	$config["uri_segment"] = 3;
	    	$config["total_rows"] = $this->shop_model->record_count();
		    	
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
	        $data['category_list'] = $this->shop_model->getCategoryList();
			$data['all_data'] = $this->shop_model->getProducts($config['per_page'], $start);
			$this->layout->view('my_products',$data,'normal');
		}
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
			
			if($this->shop_model->updateProducts($post_data,$id))
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
	    	$config["total_rows"] = $this->shop_model->record_count1();
		    	
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
	        $data['category_list'] = $this->shop_model->getCategoryList();
			$data['all_data'] = $this->shop_model->getProducts1($config['per_page'], $start);
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

	
	public function delete_product($id)
	{
		$this->db->where('id',$id);
		if($this->db->delete('shop_product'))
		{
			$q = $this->db->get_where('product_images',array('product_id'=>$id))->result();
			foreach($q as $q1)
			{
				unlink('../assets/products/'.$q1->image);
			}
			$this->db->where('product_id',$id);
			$this->db->delete('product_images');	
			$this->session->set_flashdata('success',"Product Deleted Successfully");		
			redirect('shop/my_products/');
		}
		else
		{
			$this->session->set_flashdata('error',"Product Not Deleted");
			redirect('shop/my_products/');
		}
	}

	public function delete_category($id)
	{
		$this->db->where('category_id',$id);
		if($this->db->delete('shop_category'))
		{			
			$this->db->where('id',$id);
			$this->db->delete('shop_category');	
			$this->session->set_flashdata('success',"Category Deleted Successfully");		
			redirect('shop/category/');
		}
		else
		{
			$this->session->set_flashdata('error',"Category Not Deleted");
			redirect('shop/category/');
		}
	}

	public function ajaxDeleteImage()
	{
		$image = $this->input->post('image');
		$id = $this->input->post('forid');
		$this->db->where('id',$id);
		$this->db->delete('product_images');
		unlink('../assets/products/'.$image);
	}

	public function upload_pictures($id = "")
	{		
		$dir = '../assets/products/';
		$ext = end(explode('.',$_FILES['file']['name']));
		$files = time().rand(00000,99999).'.'.$ext;
		move_uploaded_file($_FILES['file']['tmp_name'], $dir.$files);
		$arr = array('product_id'=>$id,'image'=>$files);
		$this->db->insert('product_images',$arr);
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
	
}
