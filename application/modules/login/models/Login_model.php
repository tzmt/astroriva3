<?php 

if (!defined('BASEPATH'))

    exit('No direct script access allowed');



class Login_model extends CI_MODEL {



    public function __construct() {

        return parent::__construct();

    }



    public function login_check($data)

    {

    	$data['password'] = sha1(md5($data['password']));

    	if($data['type'] == 1)
    	{
            if(is_numeric($data['email']))
            {
                $q = $this->db->get_where('astrologer',array('phone'=>$data['email'],'password'=>$data['password'],'email_verify'=>1));
            }
            else
            {
                $q = $this->db->get_where('astrologer',array('email'=>$data['email'],'password'=>$data['password'],'email_verify'=>1));
            }

            //echo $this->db->last_query();exit();

    	}



    	if($data['type'] == 2)

    	{
    		
            if(is_numeric($data['email']))
            {
                $q = $this->db->get_where('student',array('phone'=>$data['email'],'password'=>$data['password'],'email_verify'=>1));
            }
            else
            {
                $q = $this->db->get_where('student',array('email'=>$data['email'],'password'=>$data['password'],'email_verify'=>1));
            }

    	}



    	if($data['type'] == 3)

    	{    		
            if(is_numeric($data['email']))
            {
                $q = $this->db->get_where('user',array('phone'=>$data['email'],'password'=>$data['password'],'email_verify'=>1));
            }
            else
            {
               $q = $this->db->get_where('user',array('email'=>$data['email'],'password'=>$data['password'],'email_verify'=>1));
            }

    	}



    	if($q->num_rows() > 0)

    	{

    		$q1 = $q->row();
            if($data['type'] == 2)
            {
                $this->session->set_userdata('astro_student',$q1);
            }  
            if($data['type'] == 1)
            {
                $this->session->set_userdata('user',$q1);
            }  
            if($data['type'] == 2)
            {
                $this->session->set_userdata('astro_client',$q1);
            }    		
            $this->session->set_userdata(array('user_type'=>$data['type']));
    		return TRUE;

    	}

    	else

    	{

    		return FALSE;

    	}

    }

    public function register($data)
    {
        if($data['type'] == 1)
        {            
            $q = $this->db->query("SELECT * FROM astrologer WHERE email = '{$data['email']}' OR phone = '{$data['phone']}'")->num_rows();
            
            if($q > 0)
            {
                return FALSE;
            }
            else
            {
                $arr = array(
                    'name'=>$data['name'],
                    'email'=>$data['email'],
                    'phone'=>$data['phone'],
                    'password'=>sha1(md5($data['password'])),
                    'image'=>'user.png'
                );
                //print_r($arr);exit();
                return $this->db->insert('astrologer',$arr);
            }  
        }

        if($data['type'] == 2)
        {
            $q = $this->db->query("SELECT * FROM user WHERE email = '{$data['email']}' OR phone = '{$data['phone']}'")->num_rows();
            
            if($q > 0)
            {
                return FALSE;
            }
            else
            {
                $arr = array(
                    'name'=>$data['name'],
                    'email'=>$data['email'],
                    'phone'=>$data['phone'],
                    'password'=>sha1(md5($data['password'])),
                    'image'=>'user.png'
                );
                return $this->db->insert('user',$arr);
            }            
        }


        if($data['type'] == 3)
        {
            $q = $this->db->query("SELECT * FROM student WHERE email = '{$data['email']}' OR phone = '{$data['phone']}'")->num_rows();
            
            if($q > 0)
            {
                return FALSE;
            }
            else
            {
                $arr = array(
                    'name'=>$data['name'],
                    'email'=>$data['email'],
                    'phone'=>$data['phone'],
                    'password'=>sha1(md5($data['password'])),
                    'image'=>'user.png'
                );
                return $this->db->insert('student',$arr);
            }
        }
    }

    public function forgot($data)
    {
        if($data['type'] == 1)
        {
            if($this->db->get_where('astrologer',array('email'=>$data['email']))->num_rows() > 0)
            {
                $arr = array(                
                    'password'=>$data['password']
                );
                $this->db->where('email',$data['email']);
                return $this->db->update('astrologer',$arr);
            }
            else
            {
                return FALSE;
            }
        }

        if($data['type'] == 2)
        {
            if($this->db->get_where('user',array('email'=>$data['email']))->num_rows() > 0)
            {
                $arr = array(                
                    'password'=>$data['password']
                );
                $this->db->where('email',$data['email']);
                return $this->db->update('user',$arr);
            }
            else
            {
                return FALSE;
            }
        }

        if($data['type'] == 3)
        {
            if($this->db->get_where('student',array('email'=>$data['email']))->num_rows() > 0)
            {
                $arr = array(                
                    'password'=>$data['password']
                );
                $this->db->where('email',$data['email']);
                return $this->db->update('student',$arr);
            }
             else
            {
                return FALSE;
            }
        }
    }



}	