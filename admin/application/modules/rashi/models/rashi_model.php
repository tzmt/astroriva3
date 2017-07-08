<?php 
	if(!defined('BASEPATH')) exit('No direct script access allowed');

class Rashi_model extends CI_Model{

    public function __construct() {
        return parent::__construct();
    	}

	public function addRashi($data)
	{    		
		if($this->db->insert('rashi_list',$data))
            return TRUE;
        else
            return FALSE;
	}

    public function getRashiList()
    {
        return $this->db->get('rashi_list')->result();
    }

    public function addRashiTopic($data)
    {           
        if($this->db->insert('rashi_topic_list',$data))
            return TRUE;
        else
            return FALSE;
    }

    public function getRashiTopicList()
    {
        return $this->db->get('rashi_topic_list')->result();
    }

    public function getRashiDetails()
    {
        return $this->db->get('rashi_topic_details')->result();
    }

    public function getRashiNameFromId($id)
    {
         return $this->db->get_where('rashi_list',array('id'=>$id))->row()->name;
    }
    
    public function getRashiTopicNameFromId($id)
    {
         return $this->db->get_where('rashi_topic_list',array('id'=>$id))->row()->name;
    }

    public function addRashiTopicDetails($data)
    {
        if($this->db->insert('rashi_topic_details',$data))
            return TRUE;
        else
            return FALSE;
    }

    public function UpdateRashiTopicDetails($post_data,$id)
    {
        $this->db->where('id',$id);
        if($this->db->update('rashi_topic_details',$post_data))
            return TRUE;
        else
            return FALSE;
    }

    public function addRashiPrediction($data)
    {
        if($this->db->insert('rashi_prediction',$data))
            return TRUE;
        else
            return FALSE;
    }
    public function updateRashiPrediction($post_data)
    {
        $this->db->where('id',$post_data['id']);
        if($this->db->update('rashi_prediction',$post_data))
            return TRUE;
        else
            return FALSE;
    }
    

    public function record_count()
    {
         return $this->db->get_where('rashi_prediction',array('type'=>1))->num_rows();
    }

    public function getAdminPrediction($lim_to,$lim_from,$s_key="")
    {         
        $this->db->limit($lim_to,$lim_from);                 
        $rs = $this->db->get_where('rashi_prediction',array('type'=>1));            
        return $rs->result();
    }

    public function getOtherAstrologerPrediction($lim_to,$lim_from,$s_key="")
    {         
        $this->db->limit($lim_to,$lim_from);                 
        $rs = $this->db->get_where('rashi_prediction',array('type'=>2));            
        return $rs->result();
    }

    public function getAstrologerNameFromId($id)
    {
        return $this->db->get_where('astrologer',array('id'=>$id))->row()->name;
    }

    public function getRemedyList()
    {
        return $this->db->get('rashi_remedy')->result();
    }

    public function addRemedy($data)
    {           
        if($this->db->insert('rashi_remedy',$data))
            return TRUE;
        else
            return FALSE;
    }

    public function updateRemedy($data)
    {           
        $this->db->where('id',$data['id']);
        if($this->db->update('rashi_remedy',$data))
            return TRUE;
        else
            return FALSE;
    }

    public function updateRashi($data,$id)
    {
        //print_r($data);exit();
        $this->db->where('id',$id);
        return $this->db->update('rashi_list',$data);
        //echo $this->db->last_query();exit();
    }
    

}
?>