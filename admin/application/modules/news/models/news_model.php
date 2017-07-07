<?php
	if(!defined('BASEPATH')) exit('No direct script access allowed');

class News_model extends CI_Model{

    public function __construct() {
        return parent::__construct();
    	}

	public function addCategory($data)
	{    		
		if($this->db->insert('news_category',$data))
            return TRUE;
        else
            return FALSE;
	}

    public function getCategoryList()
    {
        return $this->db->get('news_category')->result();
    }

    public function getCategoryName($id)
    {
         return $this->db->get_where('news_category',array('id'=>$id))->row()->name;
    }
    
    

    public function addNews($data)
    {
        if($this->db->insert('news',$data))
            return TRUE;
        else
            return FALSE;
    }
    public function updateNews($post_data)
    {
        $this->db->where('id',$post_data['id']);
        if($this->db->update('news',$post_data))
            return TRUE;
        else
            return FALSE;
    }
    

    public function record_count()
    {
        $today = date("Y-m-d");      
        return $this->db->query("SELECT * FROM astro_news WHERE date_from <= '$today' AND date_to >= '$today'")->num_rows();
    }

    public function record_count1()
    {
        $today = date("Y-m-d");      
        return $this->db->query("SELECT * FROM astro_news WHERE date_from <= '$today' AND date_to <= '$today'")->num_rows();
    }

    public function getNews($lim_to,$lim_from,$s_key="")
    {         
        $this->db->limit($lim_to,$lim_from);     
        $today = date("Y-m-d");            
        $rs = $this->db->get_where("news",array('date_from<='=>$today,'date_to>='=>$today));   
        //echo $this->db->last_query();exit();         
        return $rs->result();
    }

    

    public function getAstrologerNameFromId($id)
    {
        return $this->db->get_where('astrologer',array('id'=>$id))->row()->name;
    }


    

}
?>