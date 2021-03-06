<?php
	if(!defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model{

    public function __construct() {
        return parent::__construct();
	}

	public function getPannelledAstrologers()
	{
		$this->db->limit(6);
		return $this->db->order_by('rand()')->get_where('astrologer',array('status'=>2))->result();
	}

	public function getPremiumAstrologers()
	{
		$this->db->limit(6);
		return $this->db->order_by('rand()')->get_where('astrologer',array('status'=>1))->result();
	}

	public function getRashi()
	{
		return $this->db->get('rashi_list')->result();
	}

	public function getNews()
	{
		return $this->db->get('news')->result();
	}

	public function getTips()
	{
		$date = date("Y-m-d g:i:s");	
		$this->db->limit(4);
		$this->db->order_by('tips.id','DESC');
		return $this->db->select('tips.astrologers_id,tips.topic,tips.description,astrologer.name,astrologer.image,rashi_list.name as rashi_name')->from('tips')->join('astrologer','tips.astrologers_id = astrologer.id','left')->join('rashi_list','tips.rashi_id = rashi_list.id','left')->where(array('tips.purpose'=>'1','date_from<='=>$date,'date_to>='=>$date))->get()->result();
	}

	public function getTips1()
	{
		$date = date("Y-m-d g:i:s");	
		$this->db->limit(4);
		$this->db->order_by('tips.id','DESC');
		return $this->db->select('tips.astrologers_id,tips.topic,tips.description,astrologer.name,astrologer.image,rashi_list.name as rashi_name')->from('tips')->join('astrologer','tips.astrologers_id = astrologer.id','left')->join('rashi_list','tips.rashi_id = rashi_list.id','left')->where(array('tips.purpose'=>'2','date_from<='=>$date,'date_to>='=>$date))->get()->result();
	}

	public function getRelatedProducts()
    {        
        return $this->db->limit(4)->get_where('shop_product',array('type'=>1))->result();
        
    }

    public function getAcharyaDetails()
    {
    	return $this->db->get_where('acharya',array('id'=>1))->row();
    }

    public function updateStatistics()
    {
    	$date = date('Y-m-d');
    	$q = $this->db->get_where('website_traffic',array('date'=>$date))->num_rows();	
    	if($q > 0)
    	{
    		$this->db->query("UPDATE astro_website_traffic SET visitors = visitors + 1 WHERE date = '$date'");
    	}
    	else
    	{
    		$this->db->query("INSERT INTO astro_website_traffic VALUES('','$date',1)");
    	}
    }

    public function getProducts()
    {
    	$this->db->order_by('id','RANDOM');
    	$this->db->limit(1);
    	return $this->db->get("shop_product")->row();
    }
	


}
