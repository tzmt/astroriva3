<?php
	if(!defined('BASEPATH')) exit('No direct script access allowed');

class Astrologer_model extends CI_Model{

    public function __construct() {
        return parent::__construct();
	}

	public function getAstrologers()
	{
		return $this->db->limit(3)->get('astrologer')->result();
	}

	

	public function getRelatedProducts()
    {        
        return $this->db->limit(4)->get('shop_product')->result();
        
    }

    public function getAstrologerData()
    {
    	return $this->db->get_where('astrologer',array('id'=>$this->session->userdata('astro_astrologer')->id))->row();
    }

    public function updateProfile($data)
    {
    	$this->db->where('id',$this->session->userdata('astro_astrologer')->id);
    	return $this->db->update('astrologer',$data);
    }

    public function getRashi()
    {
    	return $this->db->get('rashi_list')->result();
    }

    public function AddTips($data)
    {
    	$data['type'] = 2;  
        $data['purpose'] = 1;  	
    	$data['astrologers_id'] = $this->session->userdata('astro_astrologer')->id;
    	return $this->db->insert('tips',$data);
    }

    public function AddMarket($data)
    {
        $data['type'] = 2;   
        $data['purpose'] = 2;    
        $data['astrologers_id'] = $this->session->userdata('astro_astrologer')->id;
        return $this->db->insert('tips',$data);
    }

    public function getTips()
    {
        return $this->db->get_where('tips',array('astrologers_id'=>$this->session->userdata('astro_astrologer')->id,'purpose'=>1))->result();
    }

    public function getMarket()
    {
        return $this->db->get_where('tips',array('astrologers_id'=>$this->session->userdata('astro_astrologer')->id,'purpose'=>2))->result();
    }

    


    public function getPrediction()
    {
        return $this->db->get_where('rashi_prediction',array('astrologer_id'=>$this->session->userdata('astro_astrologer')->id))->result();
    }

    public function changePassword($data)
    {
        $oldpass = $this->db->select('password')->get_where('astrologer',array('id'=>$this->session->userdata('astro_astrologer')->id))->row()->password;
        $data['new_password'] = sha1(md5($data['new_password']));
        $data['old_password'] = sha1(md5($data['old_password']));
        if($oldpass == $data['old_password'])
        {
            $arr = array('password'=>$data['new_password']);
            $this->db->where('id',$this->session->userdata('astro_astrologer')->id);
            $this->db->update('astrologer',$arr);
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

    public function AddProducts($data)
    {
        $arr = array(
                'name'=>$data['name'],
                'category_id'=>$data['category_id'],
                'sub_category_id'=>$data['sub_category_id'],
                'dimension'=>$data['dimension1'].'x'.$data['dimension2'].'x'.$data['dimension3'],
                'weight'=>$data['weight'],
                'specific_gravity'=>$data['specific_gravity'],
                'refractive_index'=>$data['refractive_index'],
                'price'=>$data['price'],
                'quantity'=>$data['quantity'],
                'type'=>2,
                'astrologers_id'=>$this->session->userdata('astro_astrologer')->id,
                'details'=>$data['details']
            );
        $this->db->insert('shop_product',$arr);
        return $this->db->insert_id();
    }

    public function AddPrediction($data)
    {
        $data['type'] = 2;             
        $data['astrologer_id'] = $this->session->userdata('astro_astrologer')->id;
        return $this->db->insert('rashi_prediction',$data);    
    }
    


    public function addProductImages($id,$image)
    {
        $arr = array(
                'product_id'=>$id,
                'image'=>$image
            );
        $this->db->insert('product_images',$arr);
    }

    public function getUserProduct()
    {
        return $this->db->get_where('shop_product',array('astrologers_id'=>$this->session->userdata('astro_astrologer')->id))->result();
    }

    public function AddBranch($data)
    {
        $arr = array(
                'astrologers_id'=>$this->session->userdata('astro_astrologer')->id,
                'branch_name'=>$data['branch_name'],
                'place'=>$data['place'],
                'time'=>$data['time_from'].":".$data['time_from_day']." to ".$data['time_to'].":".$data['time_to_day'],
                'phone1'=>$data['phone1'],
                'phone2'=>isset($data['phone2'])?$data['phone2']:"",
                'phone3'=>isset($data['phone3'])?$data['phone3']:"",
                'phone4'=>isset($data['phone4'])?$data['phone4']:"",
                'nearby_places'=>$data['nearby_places'],
                'day'=>$data['day']

            );       
        return $this->db->insert('astrologer_branch',$arr);
    }

    public function getBranchList()
    {
        return $this->db->get_where('astrologer_branch',array('astrologers_id'=>$this->session->userdata('astro_astrologer')->id))->result();
    }

    public function updateProducts($data,$id)
    {        
        $arr = array(
                'name'=>$data['name'],
                'category_id'=>$data['category_id'],
                'sub_category_id'=>$data['sub_category_id'],
                'dimension'=>$data['dimension1'].'x'.$data['dimension2'].'x'.$data['dimension3'],
                'weight'=>$data['weight'],
                'specific_gravity'=>$data['specific_gravity'],
                'refractive_index'=>$data['refractive_index'],
                'price'=>$data['price'],
                'quantity'=>$data['quantity'],
                'type'=>2,
                'astrologers_id'=>$this->session->userdata('astro_astrologer')->id
            );
        $this->db->where('id',$id);
        return $this->db->update('shop_product',$arr);
    }

    public function getAstrologerDetails()
    {
        return $this->db->get_where('astrologer',array('id'=>$this->session->userdata('astro_astrologer')->id))->row();
    }
	


}
