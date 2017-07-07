<?php
	if(!defined('BASEPATH')) exit('No direct script access allowed');

class Shop_model extends CI_Model{

    public function __construct() {
        return parent::__construct();
    	}
	
    public function getCategoryList()
    {
        return $this->db->get_where('shop_category',array('category_id'=>0))->result();
    }

    public function getRashiName($id)
    {
         return $this->db->get_where('rashi_list',array('id'=>$id))->row()->name;
    }
    
    

    public function addCategory($data)
    {
        if($this->db->insert('shop_category',$data))
            return $this->db->insert_id();
        else
            return FALSE;
    }

    public function addProducts($data)
    {
        if($this->db->insert('shop_product',$data))
            return $this->db->insert_id();
        else
            return FALSE;
    }    
    // public function getProducts()
    // {
    //     return $this->db->get_where('shop_products',array('type'=>1))->result();
    // }
    public function updateProducts($post_data,$id)
    {
        $this->db->where('id',$id);
        if($this->db->update('shop_product',$post_data))
            return TRUE;
        else
            return FALSE;
    }
    

    public function record_count()
    {         
        return $this->db->query("SELECT * FROM shop_product WHERE type = '1'")->num_rows();
    }

    public function record_count1()
    {
        return $this->db->query("SELECT * FROM shop_product WHERE type = '0'")->num_rows();
    }

    public function getProducts($lim_to,$lim_from,$s_key="")
    {         
        $this->db->limit($lim_to,$lim_from); 
        $rs = $this->db->get_where("shop_product",array('type'=>1));   
        //echo $this->db->last_query();exit();         
        return $rs->result();
    }

    public function getProducts1($lim_to,$lim_from,$s_key="")
    {         
        $this->db->limit($lim_to,$lim_from); 
        $rs = $this->db->get_where("shop_product",array('type'=>2));   
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