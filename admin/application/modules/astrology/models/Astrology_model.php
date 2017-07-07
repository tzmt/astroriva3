<?php
	if(!defined('BASEPATH')) exit('No direct script access allowed');

class Astrology_model extends CI_Model{

    public function __construct() {
        return parent::__construct();
    	}
	
    public function astologersList()
    {
        return $this->db->get_where('astrologer')->result();
    }

    public function getRashiName($id)
    {
         return $this->db->get_where('rashi_list',array('id'=>$id))->row()->name;
    }

    public function getService()
    {
         return $this->db->get('astrology_service')->result();
    }
    
    

    public function addBranch($data)
    {
        if($this->db->insert('branch',$data))
            return $this->db->insert_id();
        else
            return FALSE;
    }

    public function AddAstrologers($data)
    {
        if($this->db->insert('astrologer',$data))
            return $this->db->insert_id();
        else
            return FALSE;
    } 
    public function addPublicRemedy($data)
    {
        if($this->db->insert('public_remedy',$data))
            return $this->db->insert_id();
        else
            return FALSE;
    } 

    public function addService($data)
    {
        if($this->db->insert('astrology_service',$data))
            return $this->db->insert_id();
        else
            return FALSE;
    }    
     
    // public function getProducts()
    // {
    //     return $this->db->get_where('shop_products',array('type'=>1))->result();
    // }

    public function updateBranch($post_data,$id)
    {
        $this->db->where('id',$id);
        if($this->db->update('branch',$post_data))
            return TRUE;
        else
            return FALSE;
    }

    public function UpdateService($post_data,$id)
    {
        $this->db->where('id',$id);
        if($this->db->update('astrology_service',$post_data))
            return TRUE;
        else
            return FALSE;
    }

    public function updateAstrologer($post_data,$id)
    {
        $this->db->where('id',$id);
        if($this->db->update('astrologer',$post_data))
            return TRUE;
        else
            return FALSE;
    }

    public function updateRemedy($post_data,$id)
    {
        $this->db->where('id',$id);
        if($this->db->update('public_remedy',$post_data))
            return TRUE;
        else
            return FALSE;
    }
    

    public function record_count()
    {         
        return $this->db->query("SELECT * FROM astro_branch")->num_rows();
    }

    public function record_count1()
    {         
        return $this->db->query("SELECT * FROM astro_astrologer")->num_rows();
    }

    public function record_count2()
    {         
        return $this->db->query("SELECT * FROM astro_public_remedy")->num_rows();
    }

    public function record_count3   ()
    {
        return $this->db->query("SELECT * FROM astro_shop_product WHERE type = '0'")->num_rows();
    }

    public function getbranch($lim_to,$lim_from,$s_key="")
    {         
        $this->db->limit($lim_to,$lim_from); 
        $rs = $this->db->get("branch");   
        //echo $this->db->last_query();exit();         
        return $rs->result();
    }

    public function getAstrologers($lim_to,$lim_from,$s_key="")
    {         
        $this->db->limit($lim_to,$lim_from); 
        $rs = $this->db->get("astrologer");   
        //echo $this->db->last_query();exit();         
        return $rs->result();
    }

    public function getRemedyList($lim_to,$lim_from,$s_key="")
    {         
        $this->db->limit($lim_to,$lim_from); 
        $rs = $this->db->get("public_remedy");   
        //echo $this->db->last_query();exit();         
        return $rs->result();
    }

    

    public function getCategoryNameById($id)
    {
        return $this->db->get_where('shop_category',array('id'=>$id))->row()->name;
    }

    public function getAstrologerNameById($id)
    {
        return $this->db->get_where('astrologer',array('id'=>$id))->row()->name;
    }


    

}
?>