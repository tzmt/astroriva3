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
		$data['title'] = "Dashboard - Astroriva.com";
		$data['description'] = "";
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
				$post_data = $this->security->xss_clean($this->input->post());
				if($this->student_model->updateProfile($post_data))
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
			//$data['astrologers'] = $this->student_model->getAstrologers();
			$data['all_data'] = $this->student_model->getStudentData();	

			$data['title'] = "Edit Profile - Astroriva.com";
			$data['description'] = "";


			$this->layout->view('edit_profile',$data,'student');
		}		
	}

	public function changePhoto()
	{
		$q = $this->db->select('image')->get_where('student',array('id'=>$this->session->userdata('astro_student')->id))->row()->image;
		@unlink('./assets/student/'.$q);

		$image = $this->input->post('image');

		$data = $image;

		list($type, $data) = explode(';', $data);
		list(, $data)      = explode(',', $data);
		$data = base64_decode($data);
		$name = $this->session->userdata('astro_student')->id.'.png';

		file_put_contents('./assets/student/'.$name, $data);

		$this->db->where('id',$this->session->userdata('astro_student')->id);
		$this->db->update('student',array('image'=>$name));
	}

	public function changePhoto1()
	{
		$post = isset($_POST) ? $_POST: array();
		switch($post['action']) {
			case 'save' :
			//$this->saveProfilePic();
			$this->saveProfilePicTmp();
			break;
			default:
			$this->changeProfilePic();
		}
	}

	function saveProfilePic()
	{		
		$post = isset($_POST) ? $_POST: array();		
		if($post['id'])
		{
			$sql_query = "SELECT * FROM users WHERE uid = '".mysqli_escape_string($conn, $post['id'])."'";
			$resultset = mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
			if(mysqli_num_rows($resultset))
			{
				$sql_update = "UPDATE users set profile_photo='".mysqli_escape_string($conn,$post['image_name'])."' WHERE uid = '".mysqli_escape_string($conn, $post['id'])."'";
				mysqli_query($conn, $sql_update) or die("database error:". mysqli_error($conn));
			}
		}
	}

	public function changeProfilePic()
	{
		$post = isset($_POST) ? $_POST: array();
		$max_width = "500";
		$userId = isset($post['hdn-profile-id']) ? intval($post['hdn-profile-id']) : 0;
		$path = './assets/tmp';
		$valid_formats = array("jpg", "png", "gif", "jpeg");
		$name = $_FILES['profile-pic']['name'];
		$size = $_FILES['profile-pic']['size'];
		if(strlen($name)) {
		list($txt, $ext) = explode(".", $name);
		if(in_array($ext,$valid_formats))
		{
			if($size < (1024*1024)) { $actual_image_name = 'avatar' .'_'.$userId .'.'.$ext; $filePath = $path .'/'.$actual_image_name; $tmp = $_FILES['profile-pic']['tmp_name']; if(move_uploaded_file($tmp, $filePath)) 
			{
				 $width = $this->getWidth($filePath); $height = $this->getHeight($filePath); //Scale the image if it is greater than the width set above if ($width > $max_width){
				$scale = $max_width/$width;
				$uploaded = $this->resizeImage($filePath,$width,$height,$scale, $ext);
			} else
			{
				$scale = 1;
				$uploaded = $this->resizeImage($filePath,$width,$height,$scale, $ext);
			}
			echo "<img id='photo' file-name='".$actual_image_name."' class='' src='".$filePath.'?'.time()."' class='preview'/>";
			}
			else
			echo "failed";
		}
		else
		echo "Image file size max 1 MB";
		}
		else
		echo "Invalid file format..";
	}

	public function saveProfilePicTmp()
	{		
		$post = isset($_POST) ? $_POST: array();
		$userId = isset($post['id']) ? intval($post['id']) : 0;
		$path ='.\images\tmp';
		$t_width = 300; // Maximum thumbnail width
		$t_height = 300; // Maximum thumbnail height
		if(isset($_POST['t']) and $_POST['t'] == "ajax")
		{
			extract($_POST);
			$imagePath = 'assets/student/'.$_POST['image_name'];
			$ratio = ($t_width/$w1);
			$nw = ceil($w1 * $ratio);
			$nh = ceil($h1 * $ratio);
			$nimg = imagecreatetruecolor($nw,$nh);
			$exp1 = explode(".",$_POST['image_name']);
			$exp = end($exp1);
			if($exp == 'jpg' || $exp == 'jpeg')
			{
				$im_src = imagecreatefromjpeg($imagePath);
			}
			if($exp == 'png')
			{
				$im_src = imagecreatefrompng($imagePath);
			}
			imagecopyresampled($nimg,$im_src,0,0,$x1,$y1,$nw,$nh,$w1,$h1);
			imagejpeg($nimg,$imagePath,90);
		}

		$q = $this->db->select('image')->get_where('student',array('id'=>$this->session->userdata('astro_student')->id))->row()->image;
		@unlink('./assets/student/'.$q);

		$this->db->where('id',$this->session->userdata('astro_student')->id);
		$arr = array('image'=>$_POST['image_name']);
		$this->db->update('student',$arr);

		echo base_url().$imagePath.'?'.time();


		exit(0);
	}

	public function resizeImage($image,$width,$height,$scale)
	{
		$newImageWidth = ceil($width * $scale);
		$newImageHeight = ceil($height * $scale);
		$newImage = imagecreatetruecolor($newImageWidth,$newImageHeight);
		switch ($ext)
		{
			case 'jpg':
			case 'jpeg':
				$source = imagecreatefromjpeg($image);
				break;
			case 'gif':
				$source = imagecreatefromgif($image);
				break;
			case 'png':
				$source = imagecreatefrompng($image);
				break;
			default:

			$source = false;
			break;
		}
		imagecopyresampled($newImage,$source,0,0,0,0,$newImageWidth,$newImageHeight,$width,$height);
		imagejpeg($newImage,$image,90);
		chmod($image, 0777);
		return $image;
	}

	public function getHeight($image)
	{
		$sizes = getimagesize($image);
		$height = $sizes[1];
		return $height;
	}

	public function getWidth($image)
	{
		$sizes = getimagesize($image);
		$width = $sizes[0];
		return $width;
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
				$post_data = $this->security->xss_clean($this->input->post());

				if($this->student_model->AddTips($post_data))
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

			$data['title'] = "Add Tips - Astroriva.com";
			$data['description'] = "";

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
				$post_data = $this->security->xss_clean($this->input->post());

				if($this->student_model->AddPrediction($post_data))
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

			$data['title'] = "Add Prediction - Astroriva.com";
			$data['description'] = "";

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
				$post_data = $this->security->xss_clean($this->input->post());

				if($this->student_model->AddMarket($post_data))
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

			$data['title'] = "Market Prediction - Astroriva.com";
			$data['description'] = "";

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
				$post_data = $this->security->xss_clean($this->input->post());
				if($this->student_model->changePassword($post_data))
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

			$data['title'] = "Change Password - Astroriva.com";
			$data['description'] = "";

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

						$post_data = $this->security->xss_clean($post_data);

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

			$data['title'] = "Add Products - Astroriva.com";
			$data['description'] = "";

			$this->layout->view('add_products',$data,'astrologer');
		}	
	}

	public function getSubCategory()
	{
		$id = $this->input->post('id');
		$id = $this->security->xss_clean($id);
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
				$post_data = $this->security->xss_clean($this->input->post());
				if($id = $this->student_model->updateProducts($post_data,$id))
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

			$data['title'] = "List Products - Astroriva.com";
			$data['description'] = "";

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
				$post_data = $this->security->xss_clean($this->input->post());
				if($this->student_model->AddCourse($post_data))
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
			$data['title'] = "Apply For Course - Astroriva.com";
			$data['description'] = "";

			$data['course_list'] = $this->student_model->getCourseList();
			$this->layout->view('apply',$data,'student');
		}		
	}

	public function orders()
	{
		$data['order_list'] = $this->db->order_by('id','DESC')->get_where('orders',array('astrologers_id'=>$this->session->userdata('user')->id))->result();

		$data['title'] = "Order List - Astroriva.com";
		$data['description'] = "";
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
