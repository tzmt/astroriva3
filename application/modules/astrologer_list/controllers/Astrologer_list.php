<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Astrologer_list extends MX_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('layout');
		$this->load->model('astrologer_list_model');
		$query = $this->db->get_where('settings',array('id'=>1))->row();
		define('LOGO',$query->logo);
		define('FAVICON',$query->favicon);		
	}

	public function index()
	{
		$data['all_data'] = $this->astrologer_list_model->getAstrologerDetails($this->uri->segment(2));
		$data['astrologers'] = $this->astrologer_list_model->getAstrologers($this->uri->segment(2));	
		$data['products'] = $this->astrologer_list_model->getRelatedProducts();
		$this->layout->view('astrologer_details',$data,'normal');
	}

	public function list_astrologer($type)
	{
		if($type == 'premium')
		{			
			$data['astrologers'] = $this->astrologer_list_model->getAstrologersList(1);	
			//$data['products'] = $this->astrologer_model->getRelatedProducts();

			$data['title'] = "Premium Astrologers - Astroriva.com";
			$data['description'] = "Below are the list of premium astrologers of astroriva.com";

			$this->layout->view('astrologer_list',$data,'normal');
		}
		else if($type == 'pannelled')
		{
			$data['astrologers'] = $this->astrologer_list_model->getAstrologersList(2);	
			//$data['products'] = $this->astrologer_model->getRelatedProducts();

			$data['title'] = "Panelled Astrologers - Astroriva.com";
			$data['description'] = "Below are the list of panelled astrologers of astroriva.com";

			$this->layout->view('astrologer_list',$data,'normal');
		}
		else if($type == 'normal')
		{
			$data['astrologers'] = $this->astrologer_list_model->getAstrologersList(0);	
			//$data['products'] = $this->astrologer_model->getRelatedProducts();

			$data['title'] = "Normal Astrologers - Astroriva.com";
			$data['description'] = "Below are the list of normal astrologers of astroriva.com";


			$this->layout->view('astrologer_list',$data,'normal');
		}
		else
		{
			redirect('home/');
		}
	}

	public function search()
	{
		$search = $_GET['search'];
		$data['astrologers'] = $this->astrologer_list_model->getAstrologerSearch($search);
		$this->layout->view('astrologer_list',$data,'normal');
	}

	public function getajaxastrologer()
	{
		$astro = $this->security->xss_clean($this->input->post('slug'));
		if(strlen($astro) > 0)
		{
			$html = '<div class="row">';
			$i = 1;
						
			$this->db->like('name',$astro,'after');
			$q = $this->db->get('astrologer')->result();
			foreach($q as $ast)
			{
				$html .= '<div class="col-md-2" style="margin-bottom: 10px;">
					<div class="team-member">
						<div class="col-md-12" style="margin-bottom: 15px;">;
							<img src="'.ASSETS.'astrologer/'.$ast->image.'" alt="'.$ast->name.'" width="100%" style="padding: 5px;background: #eee; height: 100%"/>	
						</div>
						<div class="member-text">			
							<h5>'.$ast->name.'</h5>
							<h6>
							<a href="'.base_url().'astrologer-details/'.$ast->id.'/'.strtolower(str_replace(" ","-",$ast->name)).'">View</a> 
							| 
							<a href="'.base_url().'astrologer-details/'.$ast->id.'/'.strtolower(str_replace(" ","-",$ast->name)).'/products/">Products</a></h6>																
						</div>						
					</div>
				</div>';

				if($i%6 == 0){ echo '</div><div class="row">';}

				$i++;
			}

			echo $html;
		}

	}

	public function getajaxastrologer1()
	{
		$astro = $this->security->xss_clean($this->input->post('slug'));
		if(strlen($astro) > 0)
		{
			$html = '<div class="row">';
			$i = 1;
						
			$this->db->limit(15);
			 $q = $this->db->select('astrologer.name,astrologer.id,astrologer.image')->from('astrologer')->join('astrologer_branch','astrologer.id = astrologer_branch.astrologers_id')->like('astrologer_branch.place',$astro)->get()->result();
			
			foreach($q as $ast)
			{
				$html .= '<div class="col-md-2" style="margin-bottom: 10px;">
					<div class="team-member">
						<div class="col-md-12" style="margin-bottom: 15px;">;
							<img src="'.ASSETS.'astrologer/'.$ast->image.'" alt="'.$ast->name.'" width="100%" style="padding: 5px;background: #eee; height: 100%"/>	
						</div>
						<div class="member-text">			
							<h5>'.$ast->name.'</h5>
							<h6>
							<a href="'.base_url().'astrologer-details/'.$ast->id.'/'.strtolower(str_replace(" ","-",$ast->name)).'">View</a> 
							| 
							<a href="'.base_url().'astrologer-details/'.$ast->id.'/'.strtolower(str_replace(" ","-",$ast->name)).'/products/">Products</a></h6>																
						</div>						
					</div>
				</div>';

				if($i%6 == 0){ echo '</div><div class="row">';}

				$i++;
			}

			echo $html;
		}

	}
}
