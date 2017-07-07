<?php
	if(!defined('BASEPATH')) exit('No direct script access allowed');

class Video_model extends CI_Model{

    public function __construct() {
        return parent::__construct();
    	}
	
    public function getVideoList()
    {
        return $this->db->get('video')->result();
    }

    public function getCategoryList()
    {
        return $this->db->get('video_category')->result();
    }

    public function AddBanner($data)
    {        
        return $this->db->insert('video',$data);
    }

    public function updateLink($post_data,$id)
    {
        $this->db->where('id',$id);
        return $this->db->update('video',$post_data);
    }

    public function updateCategory($post_data,$id)
    {
        $this->db->where('id',$id);
        return $this->db->update('video_category',$post_data);
    }

    public function AddCategory($data)
    {
        return $this->db->insert('video_category',$data);
    }


    

}
?>