<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends MX_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('layout');
		// echo "<pre>";print_r($this->session->all_userdata());exit();
		if($this->session->userdata('user_type') != 2 && $this->session->userdata('user')->id == "")
		{
			redirect('home/');
		}
		$this->load->model('student_model');
		$query = $this->db->get_where('settings',array('id'=>1))->row();
		define('LOGO',$query->logo);
		define('FAVICON',$query->favicon);
		define('BANNER',$query->banner_image);
		define('PARALLAX1',$query->parallax1);
		define('PARALLAX2',$query->parallax2);
		define('PARALLAX3',$query->parallax3);
	}

	public function index()
	{		
		$this->dashboard();
	}

	public function dashboard()
	{
		// $data['total_comments'] = $this->db->count_all('acharya_comments');
		//print_r($data['tips']);			
		$data['all_data'] = $this->student_model->getStudentDetails();			
		$this->layout->view('dashboard',$data,'student');
	}


	public function profile()
	{
		if($this->input->post())
		{
			$this->form_validation->set_rules('name','Name','required');
			$this->form_validation->set_rules('email','Email','required|valid_email');
			$this->form_validation->set_rules('phone','Phone','required|numeric');
			$this->form_validation->set_rules('tob','Time of Birth','required');
			$this->form_validation->set_rules('pob','Place of Birth','required');
			$this->form_validation->set_rules('dob','Date of Birth','required');

			if($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('error',validation_errors());
				redirect('student/profile');
			}
			else
			{
				if($this->student_model->updateProfile($this->input->post()))
				{
					$this->session->set_flashdata('success','Profile Updated Successfully');
					redirect('student/profile');
				}
				else
				{
					$this->session->set_flashdata('error','Please try again');
					redirect('student/profile');
				}
			}
		}
		else
		{
			$data['astrologers'] = $this->student_model->getAstrologers();
			$data['all_data'] = $this->student_model->getStudentData();	
			$this->layout->view('edit_profile',$data,'student');
		}		
	}

	public function changePhoto()
	{
		$config['upload_path'] = './assets/student/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '200';		
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{						
			$this->session->set_flashdata('error',$this->upload->display_errors());
			redirect('student/profile');
		}
		else
		{
			$data = $this->upload->data();
			$this->db->where('id',$this->session->userdata('astro_student')->id);
			$arr = array('image'=>$data['file_name']);
			$this->db->update('student',$arr);
			$this->session->set_flashdata('success','Profile Picture Updated Successfully');
			redirect('student/profile');
		}
	}

	public function add_tips()
	{
		if($this->input->post())
		{
			$this->form_validation->set_rules('rashi_id','Rashi','required');
			$this->form_validation->set_rules('date_from','Date From','required');
			$this->form_validation->set_rules('date_to','Date To','required');
			$this->form_validation->set_rules('topic','Topic','required');
			$this->form_validation->set_rules('description','Description','required');

			if($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('error',validation_errors());
				redirect('astrologer/add_tips');
			}
			else
			{
				if($this->student_model->AddTips($this->input->post()))
				{
					$this->session->set_flashdata('success','Tips Added Successfully');
					redirect('astrologer/add_tips');
				}
				else
				{
					$this->session->set_flashdata('error','Please try again');
					redirect('astrologer/add_tips');
				}
			}
		}
		else
		{
			$data['astrologers'] = $this->student_model->getAstrologers();
			$data['rashi_list'] = $this->student_model->getRashi();
			$data['all_data'] = $this->student_model->getAstrologerData();
			$data['tips'] = $this->student_model->getTips();	
			$this->layout->view('tips',$data,'astrologer');
		}		
	}

	public function add_prediction()
	{
		if($this->input->post())
		{
			$this->form_validation->set_rules('rashi_id','Rashi','required');
			$this->form_validation->set_rules('date_from','Date From','required');
			$this->form_validation->set_rules('date_to','Date To','required');
			$this->form_validation->set_rules('description','Description','required');

			if($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('error',validation_errors());
				redirect('astrologer/add_prediction');
			}
			else
			{
				if($this->student_model->AddPrediction($this->input->post()))
				{
					$this->session->set_flashdata('success','Prediction Added Successfully');
					redirect('astrologer/add_prediction');
				}
				else
				{
					$this->session->set_flashdata('error','Please try again');
					redirect('astrologer/add_prediction');
				}
			}
		}
		else
		{			
			$data['rashi_list'] = $this->student_model->getRashi();
			$data['all_data'] = $this->student_model->getAstrologerData();
			$data['prediction'] = $this->student_model->getPrediction();	
			$this->layout->view('prediction',$data,'astrologer');
		}		
	}

	public function add_market_prediction()
	{
		if($this->input->post())
		{
			$this->form_validation->set_rules('rashi_id','Rashi','required');
			$this->form_validation->set_rules('date_from','Date From','required');
			$this->form_validation->set_rules('date_to','Date To','required');
			$this->form_validation->set_rules('topic','Topic','required');
			$this->form_validation->set_rules('description','Description','required');

			if($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('error',validation_errors());
				redirect('astrologer/add_market_prediction');
			}
			else
			{
				if($this->student_model->AddMarket($this->input->post()))
				{
					$this->session->set_flashdata('success','Tips Added Successfully');
					redirect('astrologer/add_market_prediction');
				}
				else
				{
					$this->session->set_flashdata('error','Please try again');
					redirect('astrologer/add_market_prediction');
				}
			}
		}
		else
		{
			$data['astrologers'] = $this->student_model->getAstrologers();
			$data['rashi_list'] = $this->student_model->getRashi();
			$data['all_data'] = $this->student_model->getAstrologerData();
			$data['tips'] = $this->student_model->getMarket();	
			$this->layout->view('market_prediction',$data,'astrologer');
		}			
	}



	public function delete_tips($id,$image)
	{
		if($id)
		{
			if(file_exists("../assets/tips/'.$image"))
			{
				unlink('../assets/tips/'.$image);				
			}
			
			$this->db->where('id',$id);
			if($this->db->delete('tips'))
			{
				$this->session->set_flashdata('success','Tips Deleted Successfully');
				redirect('astrologer/add_tips');
			}
			else
			{
				$this->session->set_flashdata('error','Please try again');
				redirect('astrologer/add_tips');
			}
		}
		else
		{
			redirect('astrologer/add_tips/');
		}
	}

	public function delete_prediction($id,$image)
	{
		if($id)
		{
			if(file_exists("../assets/rashi_prediction/'.$image"))
			{
				unlink('../assets/rashi_prediction/'.$image);				
			}
			$this->db->where('id',$id);
			if($this->db->delete('rashi_prediction'))
			{
				$this->session->set_flashdata('success','Prediction Deleted Successfully');
				redirect('astrologer/add_prediction');
			}
			else
			{
				$this->session->set_flashdata('error','Please try again');
				redirect('astrologer/add_prediction');
			}
		}
		else
		{
			redirect('astrologer/add_prediction/');
		}
	}
	
	

	public function delete_branch($id)
	{
		if($id)
		{			
			$this->db->where('id',$id);
			if($this->db->delete('astrologer_branch'))
			{
				$this->session->set_flashdata('success','Branch Deleted Successfully');
				redirect('astrologer/add_branch');
			}
			else
			{
				$this->session->set_flashdata('error','Please try again');
				redirect('astrologer/add_branch');
			}
		}
		else
		{
			redirect('astrologer/add_branch/');
		}
	}

	public function delete_products($id)
	{
		if($id)
		{			
			$q = $this->db->get_where('product_images',array('product_id'=>$id))->result();
			foreach($q as $q1)
			{
				if(file_exists("../assets/products/'.$q1->image"))
				{
					unlink('../assets/products/'.$q1->image);				
				}								
			}
			$this->db->where('product_id',$id);
			$this->db->delete('product_images');

			$this->db->where('id',$id);
			if($this->db->delete('shop_product'))
			{
				$this->session->set_flashdata('success','Products Deleted Successfully');
				redirect('astrologer/list_products');
			}
			else
			{
				$this->session->set_flashdata('error','Please try again');
				redirect('astrologer/list_products');
			}
		}
		else
		{
			redirect('astrologer/list_products/');
		}
	}


	public function change_password()
	{
		if($this->input->post())
		{
			$this->form_validation->set_rules('old_password','Old Password','required');
			$this->form_validation->set_rules('new_password','New Password','required|matches[conf_password]');
			$this->form_validation->set_rules('conf_password','Confirm Password','required');
			if($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('error',validation_errors());
				redirect('student/change_password');
			}
			else
			{
				if($this->student_model->changePassword($this->input->post()))
				{
					$this->session->set_flashdata('success','Password Changed Successfully');
					redirect('student/change_password');
				}
				else
				{
					$this->session->set_flashdata('error','Please enter the old password correctly');
					redirect('student/change_password');
				}
			}
		}
		else
		{
			
			$data['all_data'] = $this->student_model->getStudentData();			
			$this->layout->view('change_password',$data,'student');
		}		
	}

	public function upload_products()
	{
		if($this->input->post())
		{
			$this->form_validation->set_rules('name','Product Name','required');
			$this->form_validation->set_rules('category_id','Category Id','required');
			$this->form_validation->set_rules('sub_category_id','Sub Category','required');			
			$this->form_validation->set_rules('price','Price','required');
			$this->form_validation->set_rules('quantity','Quantity','required');
			$this->form_validation->set_rules('details','Product Details','required');

			if($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('error',validation_errors());
				redirect('astrologer/upload_products');
			}
			else
			{				
				$count = count($_FILES['file']['name']);
				
				if($id = $this->student_model->AddProducts($this->input->post()))
				{
					for($i = 0; $i < $count; $i++)
					{						
						$_FILES['file']['name'][$i]."<br/>";
						$dir = './assets/products/';
						$ext1 = explode('.',$_FILES['file']['name'][$i]);
						$ext = end($ext1);
						$files = time().rand(00000,99999);
						move_uploaded_file($_FILES['file']['tmp_name'][$i], $dir.$files.'.'.$ext);
						$file_name = $files.'.'.$ext;
						$this->student_model->addProductImages($id,$file_name);
						
					}
					//exit();
					$this->session->set_flashdata('success','Product Added Successfully');
					redirect('astrologer/upload_products');
				}
				else
				{
					$this->session->set_flashdata('error','Please try again');
					redirect('astrologer/upload_products');
				}
			}
		}
		else
		{			
			$data['category'] = $this->student_model->getCategory();	
			$this->layout->view('add_products',$data,'astrologer');
		}	
	}

	public function getSubCategory()
	{
		$id = $this->input->post('id');
		$sub = $this->db->get_where('shop_category',array('category_id'=>$id))->result();
		$html = '';
		foreach($sub as $sub1)
		{
			$html .= '<option value="'.$sub1->id.'">'.$sub1->name.'</option>';
		}
		echo $html;
	}

	public function list_products()
	{
		if($this->input->post())
		{
			$this->form_validation->set_rules('name','Product Name','required');
			$this->form_validation->set_rules('category_id','Category Id','required');
			$this->form_validation->set_rules('sub_category_id','Sub Category','required');			
			$this->form_validation->set_rules('price','Price','required');
			$this->form_validation->set_rules('quantity','Quantity','required');
			$id = $this->input->post('id');
			if($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('error',validation_errors());
				redirect('astrologer/list_products');
			}
			else
			{			
				if($id = $this->student_model->updateProducts($this->input->post(),$id))
				{
					if($_FILES['file']['name'][0] != "")
					{
						$count = count($_FILES['file']['name']);
						if($count > 0)
						{
							$q = $this->db->get_where('product_images',array('product_id'=>$id))->result();
							foreach($q as $q1)
							{
								if(file_exists("../assets/products/'.$q1->image"))
								{
									unlink('../assets/products/'.$q1->image);				
								}											
							}
							$this->db->where('product_id',$id);
							$this->db->delete('product_images');

							for($i = 0; $i < $count; $i++)
							{		

								$_FILES['file']['name'][$i]."<br/>";
								$dir = './assets/products/';
								$ext1 = explode('.',$_FILES['file']['name'][$i]);
								$ext = end($ext1);
								$files = time().rand(00000,99999);
								move_uploaded_file($_FILES['file']['tmp_name'][$i], $dir.$files.'.'.$ext);
								$file_name = $files.'.'.$ext;
								$this->student_model->addProductImages($id,$file_name);							
							}	
						}	
					}
					$this->session->set_flashdata('success','Product Updated Successfully');
					redirect('astrologer/list_products');
				}
				else
				{
					$this->session->set_flashdata('error','Please try again');
					redirect('astrologer/list_products');
				}
			}
		}
		else
		{
			$data['products'] = $this->student_model->getUserProduct();
			$data['category'] = $this->student_model->getCategory();	
			$this->layout->view('list_products',$data,'astrologer');
		}		
	}

	public function apply()
	{
		if($this->input->post())
		{			
			$this->form_validation->set_rules('course_id','Course','required');	
			if($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('error',validation_errors());
				redirect('student/apply');
			}
			else
			{
				if($this->student_model->AddCourse($this->input->post()))
				{
					$this->session->set_flashdata('success','Course Added Successfully');
					redirect('student/apply');
				}
				else
				{
					$this->session->set_flashdata('error','Please try again');
					redirect('student/apply');
				}
			}
		}
		else
		{			
			
			$data['course_list'] = $this->student_model->getCourseList();
			$this->layout->view('apply',$data,'student');
		}		
	}

	public function orders()
	{
		$data['order_list'] = $this->db->order_by('id','DESC')->get_where('orders',array('astrologers_id'=>$this->session->userdata('user')->id))->result();
		$this->layout->view('orders',$data,'astrologer');
	}

	public function delete_order($id)
	{
		if($id)
		{		
			$this->db->where('id',$id);
			if($this->db->delete('orders'))
			{
				$this->session->set_flashdata('success','Order Deleted Successfully');
				redirect('astrologer/orders');
			}
			else
			{
				$this->session->set_flashdata('error','Please try again');
				redirect('astrologer/orders');
			}
		}
		else
		{
			redirect('astrologer/orders/');
		}
	}
}
