<?php
	if(!defined('BASEPATH')) exit('No direct script access allowed');

class Contact_model extends CI_Model{

    public function __construct() {
        return parent::__construct();
    	}
	    
    

    public function addyoga($data)
    {
        if($this->db->insert('yoga',$data))
            return TRUE;
        else
            return FALSE;
    }
    public function updateContact($id)
    {       
        if($this->db->query("UPDATE astro_contact SET status = 1 WHERE id = '$id'"))
            return TRUE;
        else
            return FALSE;
    }
    

    public function record_count()
    {           
        return $this->db->query("SELECT * FROM astro_contact")->num_rows();
    }

   

    public function getContact($lim_to,$lim_from,$s_key="")
    {         
        $this->db->limit($lim_to,$lim_from); 
        $rs = $this->db->get_where("contact");   
        //echo $this->db->last_query();exit();         
        return $rs->result();
    }

    
    

}
?>