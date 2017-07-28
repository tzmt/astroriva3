<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends MX_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('layout');
		$this->load->model('shop_model');
		date_default_timezone_set('Asia/Kolkata');
		$query = $this->db->get_where('settings',array('id'=>1))->row();
		define('LOGO',$query->logo);
		define('FAVICON',$query->favicon);	
	}

	public function index($id = "")
	{	
		$data['category'] = $this->shop_model->getCategory();

		$this->load->library('pagination');

		$config['base_url'] = base_url().'shop/';
		$config['total_rows'] = $this->db->get_where('shop_product',array('type'=>1))->num_rows();
		$config['per_page'] = 15;
		$config['uri_segment'] = 2;
		$config['num_links'] = 2;
		$config['use_page_numbers'] = TRUE;

		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';

		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';

		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';

		$config['next_link'] = '&gt;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = '&lt;';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="active"><a href="">';
		$config['cur_tag_close'] = '</a></li>';

		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		$limit_from = $this->uri->segment(2);
	

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
		$data['products'] = $this->shop_model->getProducts($config['per_page'], $start);
		$this->load->library('pagination');		
		$this->pagination->initialize($config);
		$data['links'] = $this->pagination->create_links();
		$this->layout->view('shop',$data,'home1');
	}

	public function category()
	{		

		$cat = $this->uri->Segment(3);
		$slug = $this->uri->Segment(4);

		$this->load->library('pagination');

		$id = $this->db->get_where('shop_category',array('name'=>$cat))->row()->id;

		$config['base_url'] = base_url().'shop/category/'.$cat."/".$slug."/";
		$config['total_rows'] = $this->db->get_where('shop_product',array('type'=>1,'category_id'=>$id))->num_rows();
		$config['per_page'] = 1;
		$config['uri_segment'] = 5;
		$config['num_links'] = 2;
		$config['use_page_numbers'] = TRUE;

		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';

		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';

		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';

		$config['next_link'] = '&gt;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = '&lt;';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="active"><a href="">';
		$config['cur_tag_close'] = '</a></li>';

		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		$limit_from = $this->uri->segment(5);
	

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

		$data['category'] = $this->shop_model->getCategory();	
		$this->load->library('pagination');		
		$this->pagination->initialize($config);
		$data['links'] = $this->pagination->create_links();	
		$data['products'] = $this->shop_model->getProducts($config['per_page'], $start,$cat);
		$this->layout->view('shop',$data,'home1');
	}

	public function details($product_name)
	{
		$data['category'] = $this->shop_model->getCategory();		
		$data['product_details'] = $this->shop_model->getProductDetails($product_name);
		$data['product_reviews'] = $this->shop_model->getProductReviews($product_name);
		$data['related_products'] = $this->shop_model->getRelatedProducts($product_name);
		//echo "<pre>";print_r($data['related_products']);exit();
		$this->layout->view('details',$data,'home1');
	}


	public function search()
	{
		$search = $_GET['search'];

        $data['category'] = $this->shop_model->getCategory(); 
        $data['links'] = "";     
		$data['products'] = $this->shop_model->getProductsSearch($search);
		$this->layout->view('shop',$data,'home1');
	}

	public function addReview($id,$product)
	{
		if($this->input->post())
		{
			$data['product_id'] = $id;
			$data['name'] = $this->input->post('name1');
			$data['email'] = $this->input->post('email1');
			$data['subject'] = $this->input->post('subject1');
			$data['comments'] = $this->input->post('comments1');
			$data['datetime'] = time();
			$this->db->insert('product_reviews',$data);
			$this->session->set_flashdata('success1','Reviews Added Successfully');
			redirect('shop/details/'.$product);
		}
		else
		{
			redirect('shop/details/'.$product);
		}	
		
	}

	public function add()
	{
		if($this->input->post())
		{
			$arr = array(
					'id'=>$this->input->post('id'),
					'name'=>$this->input->post('name'),
					'qty'=>$this->input->post('quantity'),
					'price'=>$this->input->post('price'),
					'options'=>array(
							'specific_gravity'=>$this->input->post('specific_gravity'),
							'dimension'=>$this->input->post('dimension'),
							'refractive_index'=>$this->input->post('refractive_index'),
							'weight'=>$this->input->post('weight'),
							'image'=>$this->input->post('image'),
							'quantity'=>$this->input->post('quantity1')
						)
				);
			$this->cart->insert($arr);
			//echo "<pre>";print_r($this->cart->contents());exit();
			$this->session->set_flashdata('success','Product added successfully');	
			//$this->cart->destroy();		
			redirect('shop/details/'.str_replace(' ','-',$this->input->post('name')));
		}
	}

	public function cart()
	{
		$data = array();
		$this->layout->view('cart',$data,'home1');
	}

	public function checkout()
	{		
		if($this->input->post())
		{
			$this->form_validation->set_rules('fname','First Name','required');
			$this->form_validation->set_rules('lname','Last Name','required');
			$this->form_validation->set_rules('order_email','Invoice Email','required');
			$this->form_validation->set_rules('address','Address','required');
			$this->form_validation->set_rules('pincode','Pin Code','required');
			$this->form_validation->set_rules('country','Country','required');
			$this->form_validation->set_rules('state','State','required');
			$this->form_validation->set_rules('city','City','required');
			$this->form_validation->set_rules('phone','Phone Number','required');
			if($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('error',validation_errors());
				redirect('shop/checkout/');
			}
			else
			{
				$post_data1['fname'] = $this->input->post('fname');
				$post_data1['lname'] = $this->input->post('lname');
				$post_data1['order_email'] = $this->input->post('order_email');
				$post_data1['address'] = $this->input->post('address');
				$post_data1['pincode'] = $this->input->post('pincode');
				$post_data1['country'] = $this->input->post('country');
				$post_data1['state'] = $this->input->post('state');
				$post_data1['city'] = $this->input->post('city');
				$post_data1['phone'] = $this->input->post('phone');
				if($this->input->post('checkout') == 1)
				{
					$post_data['name'] = $this->input->post('name');
					$post_data['email'] = $this->input->post('email');
					$post_data['password'] = $this->input->post('password');
					$post_data['cpassword'] = $this->input->post('cpassword');
					$products_id = "";
					foreach($this->cart->contents() as $cont)
					{
						$products_id .= '('.$cont["id"].','.$cont["qty"] .'),'; 
					}
					$post_data1['products'] = $products_id;
					$post_data1['price'] = $this->cart->total();
					if($post_data['password'] == $post_data['cpassword'])
					{
						if($this->shop_model->register($post_data,$post_data1))
						{
							foreach($this->cart->contents() as $cont)
							{
								$this->cart->remove($cont['rowid']); 
							}

							$this->session->set_flashdata('success','Thank your. Your order has been successfully received by us.');
							redirect('shop/checkout/');
						}
						else
						{
							$this->session->set_flashdata('error','Please try again.');
							redirect('shop/checkout/');
						}
					}
					else
					{
						$this->session->set_flashdata('error','Password Does Not Match.');
						redirect('shop/checkout/');
					}
				}
				else
				{
					if($this->shop_model->guestRegister($post_data1))
					{
						foreach($this->cart->contents() as $cont)
						{
							$this->cart->remove($cont['rowid']); 
						}

						$this->session->set_flashdata('success','Thank your. Your order has been successfully received by us.');
						redirect('shop/checkout/');
					}
					else
					{
						$this->session->set_flashdata('error','Please try again.');
						redirect('shop/checkout/');
					}
				}
			}
		}
		else
		{
			$data['countries'] = $this->shop_model->getCountries();
			$this->layout->view('checkout',$data,'home1');
		}
		
	}

	public function updateProducts()
	{
		$qty = $this->input->post('qty');
		$rowid = $this->input->post('rowid');
		$data = array(
               'rowid' => $rowid,
               'qty'   => $qty
            );
		$this->cart->update($data); 

	}
	public function remove($rowid)
	{
		$data = array(
               'rowid' => $rowid,
               'qty'   => 0
            );
		$this->cart->update($data); 
		redirect('shop/cart/');
	}

	public function getStates()
	{
		$id = $this->input->post('id');
		$states = $this->shop_model->getStates($id);
		$html = '<option value="">-- State / Province / Region --</option>';
		foreach($states as $st)
		{
			$html .= '<option value="'.$st->id.'">'.$st->name.'</option>';
		}
		echo $html;
	}

	public function getCities()
	{
		$id = $this->input->post('id');
		$states = $this->shop_model->getCities($id);
		$html = '<option value="">-- City --</option>';
		foreach($states as $st)
		{
			$html .= '<option value="'.$st->id.'">'.$st->name.'</option>';
		}
		echo $html;
	}
}
