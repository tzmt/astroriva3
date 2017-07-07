<?php
	if(!defined('BASEPATH')) exit('No direct script access allowed');

class Settings_model extends CI_Model{

    public function __construct() {
        return parent::__construct();
    	}
	
    public function getSettings()
    {
        return $this->db->get_where('settings',array('id'=>1))->row();
    }

    public function updateSettings($data)
    {
        //echo "<pre>";print_r($data);exit();
        $this->db->where('id',1);
        return $this->db->update('settings',$data);
    }


    

}
?>