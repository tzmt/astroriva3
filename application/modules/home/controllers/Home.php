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
		define('BANNER',$query->banner_image);
		define('PARALLAX1',$query->parallax1);
		define('PARALLAX2',$query->parallax2);
		define('PARALLAX3',$query->parallax3);
	}

	public function index()
	{
		$data['pannelled_astrologers'] = $this->home_model->getPannelledAstrologers();	
		$data['premium_astrologers'] = $this->home_model->getPremiumAstrologers();	
		$data['rashi'] = $this->home_model->getRashi();	
		$data['news'] = $this->home_model->getNews();
		$data['tips'] = $this->home_model->getTips();
		$data['total_students'] = $this->db->count_all('student');	
		$data['total_astrologers'] = $this->db->count_all('astrologer');
		$data['total_clients'] = $this->db->count_all('user');
		$data['products'] = $this->home_model->getRelatedProducts();
		$data['acharya'] = $this->home_model->getAcharyaDetails();
		$data['total_comments'] = $this->db->count_all('acharya_comments');		
		$data['banner'] = $this->db->get('banners')->result();
		$this->home_model->updateStatistics();
		$data['title'] = "Rrishibani Institute for Vedic Astrology - The Ultimate Way of Traditional Astrological Research";
		$data['description'] = 'Know about your Rashi Retails, General Characters, Positive and Negative aspects, The predictions made by our Astrologers for you, And exclusive Remedies and Tips for your Rashi.';
		//$data['image'] ="/assets/slider/".$this->db->limit(1)->get_where('settings',array('id'=>1))->row()->banner_image;
		$data['image'] = base_url()."assets/slider/".$this->db->limit(1)->get_where('settings',array('id'=>1))->row()->banner_image;
		$data['url'] = current_url();
		$data['keywords'] = "free horoscope prediction, free match making prediction, horoscope, today's horoscope, free rashi prediction, get my rashi prediction, astrologers prediction, get astrologer prediction, astrology for business, astrology for career, astrology for education, astrology for wealth, learn astrology, learn astrology in bengali, bengali astrology class, Rrishibani astrology";
		//print_r($data['tips']);	
		$this->layout->view('home',$data,'home');
	}
}