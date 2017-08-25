<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('layout');
		$this->load->model('home_model');
		date_default_timezone_set('Asia/Kolkata');
		$query = $this->db->get_where('settings',array('id'=>1))->row();
		define('LOGO',$query->logo);
		define('FAVICON',$query->favicon);	
	}

	public function index()
	{
		$data['pannelled_astrologers'] = $this->home_model->getPannelledAstrologers();	
		$data['premium_astrologers'] = $this->home_model->getPremiumAstrologers();	
		$data['rashi'] = $this->home_model->getRashi();	
		//echo "<pre>";print_r($data['rashi']);exit();
		$data['news'] = $this->home_model->getNews();
		$data['tips'] = $this->home_model->getTips();
		$data['tips1'] = $this->home_model->getTips1();			
		$data['total_students'] = $this->db->count_all('student');	
		$data['total_astrologers'] = $this->db->count_all('astrologer');
		$data['total_clients'] = $this->db->count_all('user');
		$data['products'] = $this->home_model->getRelatedProducts();
		$data['acharya'] = $this->home_model->getAcharyaDetails();
		$data['total_comments'] = $this->db->count_all('acharya_comments');		
		$data['banner'] = $this->db->get('banners')->result();
		$data['shop'] = $this->home_model->getProducts();	
		$data['service'] = $this->db->get('astrology_service')->result();	
		$this->home_model->updateStatistics();		
		$data['title'] = "Rrishibani Institute for Vedic Astrology - The Ultimate Way of Traditional Astrological Research";
		$data['description'] = 'Know about your Rashi Retails, General Characters, Positive and Negative aspects, The predictions made by our Astrologers for you, And exclusive Remedies and Tips for your Rashi.';
		$data['image'] = base_url()."assets/images/12633668_1049640938389380_6721966995694747480_o.jpg";		
		$data['url'] = current_url();
		$data['keywords'] = "free horoscope prediction, free match making prediction, horoscope, today's horoscope, free rashi prediction, get my rashi prediction, astrologers prediction, get astrologer prediction, astrology for business, astrology for career, astrology for education, astrology for wealth, learn astrology, learn astrology in bengali, bengali astrology class, Rrishibani astrology";
		//print_r($data['tips']);	
		$this->layout->view('home',$data,'home');
	}
}
