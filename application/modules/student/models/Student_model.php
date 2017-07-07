<?php
	if(!defined('BASEPATH')) exit('No direct script access allowed');

class Student_model extends CI_Model{

    public function __construct() {
        return parent::__construct();
	}

	

    public function getStudentDetails()
    {
    	return $this->db->get_where('student',array('id'=>$this->session->userdata('astro_student')->id))->row();
    }

    public function updateProfile($data)
    {
    	$this->db->where('id',$this->session->userdata('astro_student')->id);
    	return $this->db->update('student',$data);
    }

    public function getCourseList()
    {
    	return $this->db->get('course')->result();
    } 

    



    public function changePassword($data)
    {
        $oldpass = $this->db->select('password')->get_where('student',array('id'=>$this->session->userdata('astro_student')->id))->row()->password;
        $data['new_password'] = sha1(md5($data['new_password']));
        $data['old_password'] = sha1(md5($data['old_password']));
        if($oldpass == $data['old_password'])
        {
            $arr = array('password'=>$data['new_password']);
            $this->db->where('id',$this->session->userdata('astro_student')->id);
            $this->db->update('student',$arr);
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function getCategory()
    {
        return $this->db->get_where('shop_category',array('category_id'=>0))->result();
    }


    public function AddCourse($data)
    {
        $this->db->where('id',$this->session->userdata('astro_student')->id);     
        return $this->db->update('student',$data);
    }

    public function getStudentData()
    {
        return $this->db->get_where('student',array('id'=>$this->session->userdata('astro_student')->id))->row();
    }
	


}
