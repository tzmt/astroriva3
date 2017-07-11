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
		return $q = $this->db->get_where('rashi_topic_details',array('rashi_id'=>$id))->result();
		// echo $this->db->last_query();
		// print_r($q);exit();
	}

	public function getRashiPrediction($rashi)
	{
		$id = $this->db->get_where('rashi_list',array('name'=>$rashi))->row()->id;
		$date = date("Y-m-d").' 00:00:00';
		return $q = $this->db->query("SELECT * FROM rashi_prediction WHERE '$date' BETWEEN date_to AND date_from AND rashi_id = '$id'")->result();
		 // echo $this->db->last_query();
		 //echo "<pre>";print_r($q);exit();
	}

	public function getRashiTips($rashi)
	{
		$id = $this->db->get_where('rashi_list',array('name'=>$rashi))->row()->id;
		$date = date("Y-m-d").' 00:00:00';
		return $q = $this->db->query("SELECT * FROM tips WHERE '$date' BETWEEN date_to AND date_from AND rashi_id = '$id'")->result();
		 // echo $this->db->last_query();
		 //echo "<pre>";print_r($q);exit();
	}

	public function getRashiPredictionByAstrologers($rashi)
	{
		$id = $this->db->get_where('rashi_list',array('name'=>$rashi))->row()->id;		
		return $this->db->get_where('rashi_prediction',array('rashi_id'=>$id,'type'=>2))->result();
	}

	public function getRashiTipsByAstrologers($rashi)
	{
		$id = $this->db->get_where('rashi_list',array('name'=>$rashi))->row()->id;		
		return $this->db->get_where('tips',array('rashi_id'=>$id,'type'=>2))->result();
	}

	public function getBranchList()
	{
		return $this->db->get_where('branch')->result();
	}

	public function getBranchDetails($branch)
    {
       return $this->db->get_where('branch',array('name'=>$branch))->row();        
    }

    public function getAyurvedDetails($slug)
    {
    	$slug = str_replace('-',' ',$slug);
    	$q = $this->db->get_where('ayurved',array('topic'=>$slug));
    	if($q->num_rows() > 0)
    	{
    		return $q->row();
    	}
    	else
    	{
    		return FALSE;
    	}
    }

    public function getYogaDetails($slug)
    {
    	$slug = str_replace('-',' ',$slug);
    	$q = $this->db->get_where('yoga',array('topic'=>$slug));
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
		return $this->db->get('tips')->result();
	}
}
