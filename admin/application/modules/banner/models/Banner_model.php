<?php
	if(!defined('BASEPATH')) exit('No direct script access allowed');

class Banner_model extends CI_Model{

    public function __construct() {
        return parent::__construct();
    	}
	
    public function getBannerList()
    {
        return $this->db->get('banners')->result();
    }

    public function AddBanner($data)
    {        
        return $this->db->insert('banners',$data);
    }


    

}
?>