<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Astrologer_details extends MX_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('layout');
		$this->load->model('astrologer_model');
		date_default_timezone_set('Asia/Kolkata');
		$query = $this->db->get_where('settings',array('id'=>1))->row();
		define('LOGO',$query->logo);
		define('FAVICON',$query->favicon);
	}

	public function index()
	{
		$data['all_data'] = $this->astrologer_model->getAstrologerDetails($this->uri->segment(2));
		$data['astrologers'] = $this->astrologer_model->getAstrologers($this->uri->segment(2));	
		$data['products'] = $this->astrologer_model->getRelatedProducts();

		$data['title'] = $data['all_data']->name." - Astrologers - Astroriva.com";
		$data['description'] = $data['all_data']->details;

		$this->layout->view('astrologer_details',$data,'normal');
	}

	public function show_products($name)
	{
		$id = $this->uri->segment(2);
		$data['pannelled_astrologers'] = $this->astrologer_model->getPannelledAstrologers();	
		$data['premium_astrologers'] = $this->astrologer_model->getPremiumAstrologers();	
		$data['products'] = $this->db->get_where('shop_product',array('astrologers_id'=>$id))->result();

		$data['title'] = "Products - Astrologers - Astroriva.com";
		$data['description'] = "Below are the products from our different astrologers of astroriva.com";


		$this->layout->view('products',$data,'normal');
	}

	public function appointment($name)
	{
		if($this->input->post())
		{				
			$this->form_validation->set_rules('name1','Name','required');
			$this->form_validation->set_rules('dob1','Date of Birth','required');
			$this->form_validation->set_rules('pob1','Place of Birth','required');
			$this->form_validation->set_rules('tob1','Time of Birth','required');
			$this->form_validation->set_rules('city1','City','required');
			$this->form_validation->set_rules('phone1','Phone Number','required');
			$this->form_validation->set_rules('email','Email','required|valid_email');
			$this->form_validation->set_rules('comments','Comments','');
			$this->form_validation->set_rules('date','Date','required');
			if($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('error',validation_errors());
				redirect('astrologer-details/appointment/santanu-sashtri/');
			}
			else
			{
				$post_data = $this->security->xss_clean($this->input->post());

				if($this->astrologer_model->addHoroscope($post_data))
				{
					$this->session->set_flashdata('success','Horoscope Request Submitted Successfully');
					redirect('astrologer-details/appointment/santanu-sashtri/');
				}
				else
				{
					$this->session->set_flashdata('error','Please try again');
					redirect('astrologer-details/appointment/santanu-sashtri/');
				}
			}
		}
		else
		{	
			$data['pannelled_astrologers'] = $this->astrologer_model->getPannelledAstrologers();	
			$data['premium_astrologers'] = $this->astrologer_model->getPremiumAstrologers();	
			$data['products'] = $this->astrologer_model->getRelatedProducts();

			$data['title'] = "Santanu Shastri - The Acharya - Astroriva.com";
			$data['description'] = "Book appointment of Santanu Shastri online.";

			$this->layout->view('appointment',$data,'normal');
		}		
	}

	public function appointment1()
	{
		if($this->input->post())
		{			
			$this->form_validation->set_rules('name1','Name','required');
			$this->form_validation->set_rules('dob1','Date of Birth','required');
			$this->form_validation->set_rules('pob1','Place of Birth','required');
			$this->form_validation->set_rules('tob1','Time of Birth','required');
			$this->form_validation->set_rules('city1','City','required');
			$this->form_validation->set_rules('name2','Name','required');
			$this->form_validation->set_rules('dob2','Date of Birth','required');
			$this->form_validation->set_rules('pob2','Place of Birth','required');
			$this->form_validation->set_rules('tob2','Time of Birth','required');
			$this->form_validation->set_rules('city2','City','required');
			$this->form_validation->set_rules('phone1','Phone Number','required');
			$this->form_validation->set_rules('email','Email','required|valid_email');
			$this->form_validation->set_rules('comments','Comments','');
			$this->form_validation->set_rules('date','Date','required');
			if($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('error',validation_errors());
				redirect('astrologer-details/appointment/santanu-sashtri/');
			}
			else
			{
				$post_data = $this->security->xss_clean($this->input->post());

				if($this->astrologer_model->addMatchmaking($post_data))
				{
					$this->session->set_flashdata('success','Match Making Request Submitted Successfully');
					redirect('astrologer-details/appointment/santanu-sashtri/');
				}
				else
				{
					$this->session->set_flashdata('error','Please try again');
					redirect('astrologer-details/appointment/santanu-sashtri/');
				}
			}			
		}
		else
		{
			$data['title'] = " Santanu Shastri - The Acharya - Astroriva.com";
			$data['description'] = "Book appointment of Santanu Shastri online.";

			$data['dates'] = $this->astrologer_model->getAppointmentDates();		
			$data['astrologers'] = $this->astrologer_model->getAstrologers($this->uri->segment(2));	
			$data['products'] = $this->astrologer_model->getRelatedProducts();
			$this->layout->view('appointment',$data,'normal');
		}
	}

	public function product_details()
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
				redirect(current_url());
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
				$post_data1['products'] = "(".$this->input->post('id').",1)";
				$post_data1['price'] = $this->input->post('price');		
				$post_data1['astrologers_id'] = $this->uri->segment(2);		

				$post_data1 = $this->security->xss_clean($post_data1);

				if($this->astrologer_model->guestRegister($post_data1))
				{
					$this->session->set_flashdata('success','Thank your. Your order has been successfully received by us.');
					redirect(current_url());
				}
				else
				{
					$this->session->set_flashdata('error','Please try again.');
					redirect(current_url());
				}				
			}
		}
		else
		{
			$id = $this->uri->segment(5);
			$data['all_data'] = $this->db->get_where('shop_product',array('id'=>$id))->row();
			$data['countries'] = $this->astrologer_model->getCountries();

			$data['title'] = $data['all_data']->name." - Products - Astroriva.com";
			$data['description'] = $data['all_data']->description;


			$this->layout->view('product_details',$data,'normal');
		}
		
	}

	public function getStates()
	{
		$id = $this->input->post('id');

		$id = $this->security->xss_clean($id);

		$states = $this->astrologer_model->getStates($id);
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

		$id = $this->security->xss_clean($id);

		$states = $this->astrologer_model->getCities($id);
		$html = '<option value="">-- City --</option>';
		foreach($states as $st)
		{
			$html .= '<option value="'.$st->id.'">'.$st->name.'</option>';
		}
		echo $html;
	}

	public function getDates()
	{
		if($this->input->post())
		{
			$place = $this->input->post('place');

			$place = $this->security->xss_clean($place);

			$query = $this->db->query("SELECT day FROM astro_acharya_branch WHERE place = '$place' AND status = '0'")->result();
	    	$data = '[';
	    	foreach($query as $q)
	    	{
	    		$data .= '"'.$q->day.'",';
	    	}
	    	echo rtrim($data,",").']';
		}
		
	}
}
