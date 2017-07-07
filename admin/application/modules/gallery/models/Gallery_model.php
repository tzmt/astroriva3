<?php
	if(!defined('BASEPATH')) exit('No direct script access allowed');

class Gallery_model extends CI_Model{

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
    
    

    public function addAyurved($data)
    {
        if($this->db->insert('ayurved',$data))
            return TRUE;
        else
            return FALSE;
    }
    public function updateTips($post_data)
    {
        $this->db->where('id',$post_data['id']);
        if($this->db->update('ayurved',$post_data))
            return TRUE;
        else
            return FALSE;
    }
    

    public function record_count()
    {           
        return $this->db->query("SELECT * FROM astro_gallery")->num_rows();
    }

    public function record_count1()
    {
        $today = date("Y-m-d");      
        return $this->db->query("SELECT * FROM astro_gallery WHERE date_from <= '$today' AND date_to <= '$today'")->num_rows();
    }

    public function getGallery($lim_to,$lim_from,$s_key="")
    {         
        $this->db->limit($lim_to,$lim_from); 
        $rs = $this->db->get_where("gallery");   
        //echo $this->db->last_query();exit();         
        return $rs->result();
    }

    

    public function getAstrologerNameFromId($id)
    {
        return $this->db->get_where('astrologer',array('id'=>$id))->row()->name;
    }


    

}
?>