<?php
	if(!defined('BASEPATH')) exit('No direct script access allowed');

class Classes_model extends CI_Model{

    public function __construct() {
        return parent::__construct();
    	}
	
    public function getCourseList()
    {
        return $this->db->get('course')->result();
    }

    public function getRashiName($id)
    {
         return $this->db->get_where('rashi_list',array('id'=>$id))->row()->name;
    }
    
    

    public function addClass($data)
    {
        if($this->db->insert('astrology_class',$data))
            return $this->db->insert_id();
        else
            return FALSE;
    }
    public function updateClass($post_data,$id)
    {
        $this->db->where('id',$id);
        if($this->db->update('astrology_class',$post_data))
            return TRUE;
        else
            return FALSE;
    }
    

    public function record_count()
    {
        $today = date("Y-m-d");      
        return $this->db->query("SELECT * FROM astro_course")->num_rows();
    }

    public function record_count1()
    {
        $today = date("Y-m-d");      
        return $this->db->query("SELECT * FROM astro_course WHERE date_from <= '$today' AND date_to <= '$today'")->num_rows();
    }

    public function getClass($lim_to,$lim_from,$s_key="")
    {         
        $this->db->limit($lim_to,$lim_from); 
        $rs = $this->db->get_where("astrology_class");   
        //echo $this->db->last_query();exit();         
        return $rs->result();
    }

    

    public function getCourseNameById($id)
    {
        return $this->db->get_where('course',array('id'=>$id))->row()->name;
    }


    

}
?>