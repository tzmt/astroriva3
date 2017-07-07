<?php
	if(!defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model{

    public function __construct() {
        return parent::__construct();
    	}

    	public function loginCheck($data)
    	{    		
    		$data['password'] = sha1(md5($data['password']));
    		$q = $this->db->get_where('admin',array('username'=>$data['username'],'password'=>$data['password']));
    		if($q->num_rows() > 0)
    		{
    			$q1 = $q->row();
    			$this->session->set_userdata('astro_admin',$q1);
    			return TRUE;
    		}
    		else
    		{
    			return FALSE;
    		}
    	}
}
?>