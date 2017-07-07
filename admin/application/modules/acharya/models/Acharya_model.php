<?php
	if(!defined('BASEPATH')) exit('No direct script access allowed');

class Acharya_model extends CI_Model{

    public function __construct() {
        return parent::__construct();
    	}

	public function UpdateDetails($data)
	{    		
        $this->db->where('id',1);
		if($this->db->update('acharya',$data))
            return TRUE;
        else
            return FALSE;
	}

    public function getComments()
    {
        return $this->db->get('acharya_comments')->result();
    }

    public function getBranch()
    {
        return $this->db->get('acharya_branch')->result();
    }

    public function AddBranch($data)
    {
        $arr = array(                
                'branch_name'=>$data['branch_name'],
                'place'=>$data['place'],
                'time'=>$data['time_from'].":".$data['time_from_day']." to ".$data['time_to'].":".$data['time_to_day'],
                'phone1'=>$data['phone1'],
                'phone2'=>isset($data['phone2'])?$data['phone2']:"",
                'phone3'=>isset($data['phone3'])?$data['phone3']:"",
                'phone4'=>isset($data['phone4'])?$data['phone4']:"",
                'nearby_places'=>$data['nearby_places'],
                'day'=>date("Y-m-d",strtotime($data['day'])),
                'person'=>$data['person']

            );       
        return $this->db->insert('acharya_branch',$arr);
    }

    public function getHosroscopeAppointment()
    {
        return $this->db->order_by('id','DESC')->get_where('request_service',array('purpose'=>1))->result();
    }

    public function getMatchMakingAppointment()
    {
        return $this->db->order_by('id','DESC')->get_where('request_service',array('purpose'=>2))->result();
    }

    


    

}
?>