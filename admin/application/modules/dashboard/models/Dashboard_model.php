<?php
	if(!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_model extends CI_Model{

    public function __construct() {
        return parent::__construct();
	}

	public function getVisitors()
	{
		$date = date("Y-m");
		$q = $this->db->query("SELECT * FROM astro_website_traffic WHERE date LIKE '%$date%'")->result();
		$arr = array();
		foreach($q as $q1)
		{
			$explode = explode('-',$q1->date);
			$arr[$explode[2]] = $q1->visitors;
		}
		ksort($arr);
		return $arr;
	}

	public function getTotalSales()
	{
		return $this->db->query('SELECT SUM(price) AS total FROM astro_orders')->row()->total;
	}
}
