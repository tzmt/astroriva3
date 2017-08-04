<?php
	if(!defined('BASEPATH')) exit('No direct script access allowed');

class Shop_model extends CI_Model{

    public function __construct() {
        return parent::__construct();
	}

    public function getCategory()
    {
        return $this->db->get_where('shop_category',array('category_id'=>0))->result();
    }

    public function getProducts($lim_to,$lim_from,$cat="")
    {
        if($cat == "")
        {            
            $this->db->limit($lim_to,$lim_from); 
            return $q = $this->db->get_where('shop_product',array('type'=>1))->result();
        }
        else
        {              
            $id = $this->db->get_where('shop_category',array('name'=>$cat))->row()->id;

            $this->db->limit($lim_to,$lim_from); 
            return $q = $this->db->get_where('shop_product',array('sub_category_id'=>$cat,'type'=>'1'))->result();
        }
    }

    public function getProductsSearch($search="")
    {        
        $this->db->like('name',$search);
        return $q = $this->db->get_where('shop_product',array('type'=>'1'))->result();        
    }

    public function getProductDetails($id)
    {               
            $this->db->where('shop_product.id',$id);
            return $q = $this->db->select('shop_product.name,shop_product.price,shop_product.quantity,product_images.image,shop_product.dimension,shop_product.weight,shop_product.refractive_index,shop_product.specific_gravity,shop_product.product_type,shop_product.id')->from('shop_product')->join('product_images','product_images.product_id = shop_product.id')->get()->row();
    }

    public function getProductReviews($id)
    {        
        return $q = $this->db->get_where('product_reviews',array('product_id'=>$id,'status'=>'1'))->result();
    }

    public function getProductReviewsCount($id)
    {        
        return $this->db->get_where('product_reviews',array('product_id'=>$id,'status'=>'1'))->num_rows();
    }

    public function getRelatedProducts($id)
    {        
        return $this->db->limit(3)->get_where('shop_product',array('id!='=>$id))->result();
        
    }

    public function getCountries()
    {
        return $this->db->select('id,name')->get('countries')->result();
    }

    public function getStates($id)
    {
        return $this->db->select('id,name')->get_where('states',array('country_id'=>$id))->result();
    }

    public function getCities($id)
    {
        return $this->db->select('id,name')->get_where('cities',array('state_id'=>$id))->result();
    }

    public function register($post_data,$post_data1)
    {
        $arr = array(
            'name'=>$post_data['name'],
            'email'=>$post_data['email'],
            'password'=>sha1(md5($post_data['password'])),
            'phone'=>$post_data1['phone'],
            'address'=>$post_data1['address'],
            'country'=>$post_data1['country'],
            'state'=>$post_data1['state'],
            'city'=>$post_data1['city'],
        );
        $this->db->insert('user',$arr);
        $last_id = $this->db->insert_id();
        $arr1 = array(
            'fname'=>$post_data1['fname'],
            'lname'=>$post_data1['lname'],
            'order_email'=>$post_data1['order_email'],
            'address'=>$post_data1['address'],
            'pincode'=>$post_data1['pincode'],
            'country'=>$post_data1['country'],
            'state'=>$post_data1['state'],
            'city'=>$post_data1['city'],
            'phone'=>$post_data1['phone'],
            'products'=>$post_data1['products'],
            'price'=>$post_data1['price'],
            'user_id'=>$last_id
        );
        return $this->db->insert('orders',$arr1);
    }

    public function guestRegister($post_data1)
    {
        $arr1 = array(
            'fname'=>$post_data1['fname'],
            'lname'=>$post_data1['lname'],
            'order_email'=>$post_data1['order_email'],
            'address'=>$post_data1['address'],
            'pincode'=>$post_data1['pincode'],
            'country'=>$post_data1['country'],
            'state'=>$post_data1['state'],
            'city'=>$post_data1['city'],
            'phone'=>$post_data1['phone'],
            'products'=>$post_data1['products'],
            'price'=>$post_data1['price'],
            'user_id'=>0
        );
        return $this->db->insert('orders',$arr1);
    }
	
    


    

}
?>