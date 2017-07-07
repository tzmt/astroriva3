<?php
	if(!defined('BASEPATH')) exit('No direct script access allowed');

class Tips_model extends CI_Model{

    public function __construct() {
        return parent::__construct();
    	}
	
    public function getRashiList()
    {
        return $this->db->get('rashi_list')->result();
    }

    public function getRashiName($id)
    {
         return $this->db->get_where('rashi_list',array('id'=>$id))->row()->name;
    }
    
    

    public function addTips($data)
    {
        if($this->db->insert('tips',$data))
            return TRUE;
        else
            return FALSE;
    }
    public function updateTips($post_data)
    {
        $this->db->where('id',$post_data['id']);
        if($this->db->update('tips',$post_data))
            return TRUE;
        else
            return FALSE;
    }
    

    public function record_count()
    {
        $today = date("Y-m-d");      
        return $this->db->query("SELECT * FROM astro_tips")->num_rows();
    }

    public function record_count1()
    {
        $today = date("Y-m-d");      
        return $this->db->query("SELECT * FROM astro_tips WHERE date_from <= '$today' AND date_to <= '$today'")->num_rows();
    }

    public function getTips($lim_to,$lim_from,$s_key="")
    {         
        $this->db->limit($lim_to,$lim_from);     
        $today = date("Y-m-d");            
        $rs = $this->db->get_where("tips");   
        //echo $this->db->last_query();exit();         
        return $rs->result();
    }

    

    public function getAstrologerNameFromId($id)
    {
        return $this->db->get_where('astrologer',array('id'=>$id))->row()->name;
    }


    

}
?>