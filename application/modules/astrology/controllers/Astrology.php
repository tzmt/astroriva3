<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Astrology extends MX_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('layout');
		$this->load->model('astrology_model');
		date_default_timezone_set('Asia/Kolkata');
		$query = $this->db->get_where('settings',array('id'=>1))->row();
		define('LOGO',$query->logo);
		define('FAVICON',$query->favicon);	
	}

	public function index()
	{
		$data = array();
		$rashi = $this->uri->Segment(2);
		$type = $this->uri->Segment(3);
		if($type == 'get-your-prediction')
		{
			$this->get_your_prediction();
		}
		else if($type == 'prediction')
		{			
			$data['pannelled_astrologers'] = $this->astrology_model->getPannelledAstrologers();	
			$data['premium_astrologers'] = $this->astrology_model->getPremiumAstrologers();	
			//$data['news'] = $this->astrology_model->getNews();
			//$data['all_data'] = $this->astrology_model->getRashiPrediction($rashi);
			$data['prediction'] = $this->astrology_model->getRashiPredictionByAstrologers($rashi);
			//echo "<pre>";print_r($data['prediction']);exit();
			$this->layout->view('prediction',$data,'normal');						
		}
		else if($type == 'tips-and-remedy')
		{
			$this->tips_and_remedy($rashi);
		}
		else if($type == 'market-prediction')
		{
			$this->market_prediction($rashi);
		}
		else if($rashi == 'getDetailsAboutYou')
		{
			$this->getDetailsAboutYou();
		}
		else
		{
			$data['pannelled_astrologers'] = $this->astrology_model->getPannelledAstrologers();	
			$data['premium_astrologers'] = $this->astrology_model->getPremiumAstrologers();				
			$data['news'] = $this->astrology_model->getNews();
			$data['all_data'] = $this->astrology_model->getRashiDetails($rashi);
			$this->layout->view('details',$data,'normal');
		}
	}

	public function get_your_prediction()
	{		
		$data['pannelled_astrologers'] = $this->astrology_model->getPannelledAstrologers();	
		$data['premium_astrologers'] = $this->astrology_model->getPremiumAstrologers();	
		$data['news'] = $this->astrology_model->getNews();	
		$this->layout->view('my_prediction',$data,'normal');
				
	}

	public function tips_and_remedy($rashi)
	{		
		$data['pannelled_astrologers'] = $this->astrology_model->getPannelledAstrologers();	
		$data['premium_astrologers'] = $this->astrology_model->getPremiumAstrologers();	
		//$data['news'] = $this->astrology_model->getNews();
		//$data['all_data'] = $this->astrology_model->getRashiTips($rashi);

		$data['prediction'] = $this->astrology_model->getRashiTipsByAstrologers($rashi);
		//echo "<pre>";print_r($data['prediction']);exit();
		$this->layout->view('tips',$data,'normal');			
	}

	public function market_prediction($rashi)
	{		
		$data['pannelled_astrologers'] = $this->astrology_model->getPannelledAstrologers();	
		$data['premium_astrologers'] = $this->astrology_model->getPremiumAstrologers();	
		//$data['news'] = $this->astrology_model->getNews();
		//$data['all_data'] = $this->astrology_model->getRashiTips($rashi);

		$data['prediction'] = $this->astrology_model->getRashiMarketByAstrologers($rashi);
		//echo "<pre>";print_r($data['prediction']);exit();
		$this->layout->view('tips',$data,'normal');			
	}

	public function video_class()
	{
		$data['video_category'] = $this->db->get('video_category')->result();
		$data['video_list'] = $this->db->get('video')->result();
		$this->layout->view('video_class',$data,'home1');
	}

	public function branches()
	{
		$data['branch_list'] = $this->astrology_model->getBranchList();
		$data['pannelled_astrologers'] = $this->astrology_model->getPannelledAstrologers();	
		$data['premium_astrologers'] = $this->astrology_model->getPremiumAstrologers();	
		$data['news'] = $this->astrology_model->getNews();		
		$this->layout->view('branch',$data,'home1');
	}

	public function branches_details()
	{
		$data['all_data'] = $this->astrology_model->getBranchDetails($this->uri->segment(3));
		$data['tips'] = $this->astrology_model->getTips();			
		$this->layout->view('branch_details',$data,'home1');
	}

	public function ayurved()
	{
		$data['all_data'] = $this->db->order_by('id','DESC')->get('ayurved')->result();
		$data['news'] = $this->astrology_model->getNews();	
		$this->layout->view('ayurved',$data,'home1');
	}

	public function ayurved_details($id = "",$slug ="")
	{
		if(!$id)
		{
			redirect('ayurved/');
		}
		else
		{
			if($data['all_data'] = $this->astrology_model->getAyurvedDetails($id))
			{
				$data['news'] = $this->astrology_model->getNews();	
				$data['tips'] = $this->astrology_model->getTips();
				$this->layout->view('ayurved_details',$data,'home1');
			}
			else
			{
				redirect('ayurved/');
			}
		}
	}

	public function yoga()
	{
		$data['all_data'] = $this->db->order_by('id','DESC')->get('yoga')->result();
		$data['news'] = $this->astrology_model->getNews();	
		$this->layout->view('yoga',$data,'home1');
	}

	public function yoga_details($id = "", $slug ="")
	{
		if(!$id)
		{
			redirect('ayurved/');
		}
		else
		{
			if($data['all_data'] = $this->astrology_model->getYogaDetails($id))
			{
				$data['news'] = $this->astrology_model->getNews();	
				$data['tips'] = $this->astrology_model->getTips();	
				$this->layout->view('yoga_details',$data,'home1');
			}
			else
			{
				redirect('ayurved/');
			}
		}
	}
	public function shiksha()
	{
		$data['course_list'] = $this->db->get('course')->result();		
		$this->layout->view('shiksha',$data,'home1');
	}

	public function getDetailsAboutYou()
	{		
		if($this->input->post())
		{				
			$this->form_validation->set_rules('name1','Name','required');
			$this->form_validation->set_rules('day','Day','required');
			$this->form_validation->set_rules('month','Month','required');
			$this->form_validation->set_rules('year','Year','required');
			$this->form_validation->set_rules('hour','Hour','required');
			$this->form_validation->set_rules('minute','Minute','required');
			$this->form_validation->set_rules('format','Format','required');
			$this->form_validation->set_rules('pob1','Place of Birth','required');
			$this->form_validation->set_rules('city1','City','required');
			$this->form_validation->set_rules('phone1','Phone Number','required');
			$this->form_validation->set_rules('email','Email','required');

			if($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('error',validation_errors());					
				redirect(current_url());
			}
			else
			{
				$post_data = $this->security->xss_clean($this->input->post());

				if($this->astrology_model->addServiceRequest($post_data))
				{
					$this->session->set_flashdata('success','Prediction Request Received Successfully');
					redirect(current_url());
				}
				else
				{
					$this->session->set_flashdata('error','Please Try Again');
					redirect(current_url());
				}				
			}
		}
		else
		{				
			redirect($this->input->post('current_url'));
		}
	}

	public function services()
	{
		$data['all_data'] = $this->db->get('astrology_service')->result();		
		$this->layout->view('services',$data,'home1');
	}

	public function services_details($id,$name)
	{
		$data['service_name'] = ucwords(str_replace("-"," ", $name));
		$data['all_data'] = $this->db->get_where('astrology_service',array('id'=>$id))->row();
		$data['news'] = $this->astrology_model->getNews();	
		$data['tips'] = $this->astrology_model->getTips();	
		$this->layout->view('service_details',$data,'home1');
	}

	public function getajaxrashi()
	{
		$rashi_id = $this->input->post('rashi');
		$slug = $this->input->post('slug');
		$q = $this->db->select('rashi_topic_details.description')->from('astro_rashi_topic_details')->join('astro_rashi_topic_list','astro_rashi_topic_list.id = rashi_topic_details.topic_id','left')->where(array('astro_rashi_topic_details.rashi_id'=>$rashi_id,'astro_rashi_topic_list.name'=>$slug))->get()->row();
		echo '<div class="row" style="margin-top: -10px !important;">
            <h1 style="margin-left: 18px;">'.$slug.'</h1>
            <div class="col-xs-12" style="margin-top: -25px;">
                <p class="elements_desc" style="text-align: justify;">'.$q->description.'</p>
            </div>
        </div>';
	}

	public function branches1()
	{
		$data['course_list'] = $this->db->get('astrology_branches')->result();		
		$this->layout->view('astro_branches',$data,'home1');
	}
}
