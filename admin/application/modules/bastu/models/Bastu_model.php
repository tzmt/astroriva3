<?php
	if(!defined('BASEPATH')) exit('No direct script access allowed');

class Bastu_model extends CI_Model{

    public function __construct() {
        return parent::__construct();
    	}

	public function addCategory($data)
	{    		
		if($this->db->insert('Bastu_category',$data))
            return TRUE;
        else
            return FALSE;
	}

    public function getCategoryList()
    {
        return $this->db->get('bastu_category')->result();
    }

    public function getCategoryName($id)
    {
         return $this->db->get_where('bastu_category',array('id'=>$id))->row()->name;
    }
    
    

    public function addBastu($data)
    {
        if($this->db->insert('bastu',$data))
            return TRUE;
        else
            return FALSE;
    }
    public function updateBastu($post_data)
    {
        $this->db->where('id',$post_data['id']);
        if($this->db->update('bastu',$post_data))
            return TRUE;
        else
            return FALSE;
    }
    

    public function record_count()
    {
        return $this->db->query("SELECT * FROM astro_bastu")->num_rows();
    }    

    public function getBastu($lim_to,$lim_from,$s_key="")
    {         
        $this->db->limit($lim_to,$lim_from);  
        $rs = $this->db->get("astro_bastu");          
        return $rs->result();
    }

    

    public function getAstrologerNameFromId($id)
    {
        return $this->db->get_where('astro_astrologer',array('id'=>$id))->row()->name;
    }


    

}
?>