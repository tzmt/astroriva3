<?php
	if(!defined('BASEPATH')) exit('No direct script access allowed');

class Astrologer_list_model extends CI_Model{

    public function __construct() {
        return parent::__construct();
	}

	public function getAstrologerDetails($name)
	{
		$name = str_replace('-',' ',$name);
		return $this->db->get_where('astrologer',array('name'=>$name))->row();
	}

	public function getAstrologers($name)
	{
		$name = str_replace("-", ' ', $name);
		return $this->db->limit(6)->get_where('astrologer',array('name!='=>$name))->result();
		//echo $this->db->last_query();exit();
	}

	public function getAstrologerSearch($search)
	{
		$this->db->like('name',$search);
		return $this->db->get('astrologer')->result();
	}

	public function getRelatedProducts()
    {        
        return $this->db->limit(6)->get_where('shop_product',array('type'=>1))->result();        
    }

    public function getAstrologersList($type)
    {
    	return $this->db->get_where('astrologer',array('status'=>$type))->result();
    }
	

	

	

	


}
