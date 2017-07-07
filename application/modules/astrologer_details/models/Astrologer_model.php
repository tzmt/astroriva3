<?php
	if(!defined('BASEPATH')) exit('No direct script access allowed');

class Astrologer_model extends CI_Model{

    public function __construct() {
        return parent::__construct();
	}

	public function getAstrologerDetails($name)
	{
		$name = str_replace('-',' ',$name);
		return $this->db->get_where('astrologer',array('name'=>$name))->row();
	}

	public function getAstrologers($name)
	{
		$name = str_replace("-", ' ', $name);
		return $this->db->limit(4)->get_where('astrologer',array('name!='=>$name))->result();
		//echo $this->db->last_query();exit();
	}

	public function getRelatedProducts()
    {        
        return $this->db->limit(4)->get('shop_product')->result();        
    }

    public function getAppointmentDates()
    {
    	$date = date("Y-m");
    	$query = $this->db->query("SELECT day FROM acharya_branch WHERE day LIKE '%$date%' AND status = '0'")->result();
    	$data = '';
    	foreach($query as $q)
    	{
    		$data .= '"'.$q->day.'",';
    	}
    	return rtrim($data,",");
    }

    public function addHoroscope($data)
    {
    	//echo "<pre>";print_r($data);exit();
    	$this->db->insert('request_service',$data);
    	$id = $this->db->insert_id();
    	$q = $this->db->get_where('acharya_branch',array('day'=>$data['date']));
    	if($q->num_rows() > 0)
    	{
    		$q1 = $q->row();
    		$service_id = $q1->request_service_id.','.$id;
    		if($q1->full == $q1->person - 1)
    		{
    			$this->db->query("UPDATE acharya_branch SET request_service_id = '$service_id', purpose = '1',full = full + '1', status = '1' WHERE day = '{$data['date']}'");
    		}
    		else
    		{
    			$this->db->query("UPDATE acharya_branch SET request_service_id = '$service_id', purpose = '1',full = full + '1' WHERE day = '{$data['date']}'");
    		}  
    		return TRUE;  		
    	}
    	else
    	{
    		return FALSE;
    	}
    }

    public function addMatchmaking($data)
    {
    	$this->db->insert('request_service',$data);
    	$id = $this->db->insert_id();
    	$q = $this->db->get_where('acharya_branch',array('day'=>$data['date']));
    	if($q->num_rows() > 0)
    	{
    		$q1 = $q->row();
    		$service_id = $q1->request_service_id.','.$id;
    		if($q1->full == $q1->person - 1)
    		{
    			$this->db->query("UPDATE acharya_branch SET request_service_id = '$service_id', purpose = '1',full = full + '1', status = '1' WHERE day = '{$data['date']}'");
    		}
    		else
    		{
    			$this->db->query("UPDATE acharya_branch SET request_service_id = '$service_id', purpose = '1',full = full + '1' WHERE day = '{$data['date']}'");
    		}  
    		return TRUE;  		
    	}
    	else
    	{
    		return FALSE;
    	}
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
            'user_id'=>0,
            'astrologers_id'=>$post_data1['astrologers_id']
        );
        return $this->db->insert('orders',$arr1);
    }

    public function getPannelledAstrologers()
    {
        return $this->db->limit(4)->get_where('astrologer',array('status'=>2))->result();
    }

    public function getPremiumAstrologers()
    {
        return $this->db->limit(4)->get_where('astrologer',array('status'=>1))->result();
    }

    

	

	

	


}
