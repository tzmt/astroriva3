<?php
	if(!defined('BASEPATH')) exit('No direct script access allowed');

class Astrology_model extends CI_Model{

    public function __construct() {
        return parent::__construct();
	}

	public function addServiceRequest($data)
	{
		$arr = array(
			'purpose'=>1,
			'name1'=>$data['name1'],
			'dob1'=>$data['year']."-".$data['month']."-".$data['day'],
			'tob1'=>$data['hour'].":".$data['minute']." ".$data['format'],
			'pob1'=>$data['pob1'],
			'city1'=>$data['city1'],
			'phone1'=>$data['phone1'],
			'email'=>$data['email']
		);
		if($this->db->insert('request_service',$arr))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	public function getPannelledAstrologers()
	{
		$this->db->limit(8);
		return $this->db->order_by('rand()')->get_where('astrologer',array('status'=>2))->result();
	}

	public function getPremiumAstrologers()
	{
		$this->db->limit(8);
		return $this->db->order_by('rand()')->get_where('astrologer',array('status'=>1))->result();
	}

	public function getNews()
	{
		return $this->db->get('news')->result();
	}

	public function getRashiDetails($rashi)
	{
		$id = $this->db->get_where('rashi_list',array('name'=>$rashi))->row()->id;
		$this->db->order_by('id','ASC');
		$this->db->limit(1);
		return $q = $this->db->get_where('rashi_topic_details',array('rashi_id'=>$id))->result();
		// echo $this->db->last_query();
		// print_r($q);exit();
	}

	public function getRashiPrediction($rashi)
	{
		$id = $this->db->get_where('rashi_list',array('name'=>$rashi))->row()->id;
		$date = date("Y-m-d");
		return $q = $this->db->query("SELECT * FROM astro_rashi_prediction WHERE date_from >= '$date' AND date_to <= '$date' AND rashi_id = '$id'")->result();
		 //echo $this->db->last_query();
		 //echo "<pre>";print_r($q);exit();
	}

	public function getRashiTips($rashi)
	{
		$id = $this->db->get_where('rashi_list',array('name'=>$rashi))->row()->id;
		$date = date("Y-m-d").' 00:00:00';
		return $q = $this->db->query("SELECT * FROM astro_tips WHERE '$date' BETWEEN date_to AND date_from AND rashi_id = '$id' AND purpose = '1'")->result();
		 // echo $this->db->last_query();
		 //echo "<pre>";print_r($q);exit();
	}

	public function getRashiPredictionByAstrologers($rashi)
	{
		$id = $this->db->get_where('rashi_list',array('name'=>$rashi))->row()->id;		
		$this->db->limit(20);
		return $this->db->select('rashi_prediction.astrologer_id,rashi_prediction.description,astrologer.name,astrologer.image')->from('rashi_prediction')->join('astrologer','rashi_prediction.astrologer_id = astrologer.id','left')->where(array('rashi_id'=>$id))->get()->result();
	}

	public function getRashiTipsByAstrologers($rashi)
	{
		$id = $this->db->get_where('rashi_list',array('name'=>$rashi))->row()->id;	
		$date = date("Y-m-d g:i:s");	
		return $this->db->get_where('tips',array('rashi_id'=>$id,'type'=>1,'date_from<='=>$date,'date_to>='=>$date))->result();
	}
	
	public function getRashiMarketByAstrologers($rashi)
	{
		$id = $this->db->get_where('rashi_list',array('name'=>$rashi))->row()->id;	
		$date = date("Y-m-d g:i:s");	
		return $this->db->get_where('tips',array('rashi_id'=>$id,'type'=>2,'date_from<='=>$date,'date_to>='=>$date))->result();
	}

	public function getBranchList()
	{
		return $this->db->get_where('branch')->result();
	}

	public function getBranchDetails($branch)
    {
       return $this->db->get_where('branch',array('name'=>$branch))->row();        
    }

    public function getAyurvedDetails($id)
    {    	
    	$q = $this->db->get_where('ayurved',array('id'=>$id));
    	if($q->num_rows() > 0)
    	{
    		return $q->row();
    	}
    	else
    	{
    		return FALSE;
    	}
    }

    public function getYogaDetails($id)
    {    	
    	$q = $this->db->get_where('yoga',array('id'=>$id));
    	if($q->num_rows() > 0)
    	{
    		return $q->row();
    	}
    	else
    	{
    		return FALSE;
    	}
    }

    public function getTips()
	{
		$this->db->limit(5);
		return $this->db->select('tips.astrologers_id,tips.topic,tips.description,astrologer.name,astrologer.image')->from('tips')->join('astrologer','tips.astrologers_id = astrologer.id','left')->where('tips.purpose','1')->get()->result();
	}
}
