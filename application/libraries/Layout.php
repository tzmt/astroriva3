<?php

class Layout {

    private $CI;
    private $data;

    public function __construct() {
        $this->CI = & get_instance();
    }

    public function set_assest($params) {
        $this->data = $params;
    }

    public function view($view_name, $params = array(), $default = '') {       

        if ($default == 'normal') {
            $this->CI->load->view('includes/header', $params);
            $this->CI->load->view('includes/menu', $this->data);
            $this->CI->load->view($view_name, $params);
            $this->CI->load->view('includes/footer', $this->data);
        }
        if ($default == 'home') {
            $this->CI->load->view('includes/header', $params);
            $this->CI->load->view('includes/menu', $this->data);
            $this->CI->load->view($view_name, $params);
            $this->CI->load->view('includes/main_side', $this->data);
            $this->CI->load->view('includes/footer', $this->data);
        }
        if ($default == 'home1') {
            $this->CI->load->view('includes/header', $params);
            $this->CI->load->view('includes/menu', $this->data);
            $this->CI->load->view($view_name, $params);
            // $this->CI->load->view('includes/main_side', $this->data);
            $this->CI->load->view('includes/footer', $this->data);
        }
        if ($default == 'normal1') {
            $this->CI->load->view('includes/header', $params);
            $this->CI->load->view('includes/menu', $this->data);
            $this->CI->load->view($view_name, $params);
            $this->CI->load->view('includes/main_content', $this->data);
            $this->CI->load->view('includes/main_side', $this->data);
            $this->CI->load->view('includes/footer', $this->data);
        }
        if ($default == 'astrologer') {
            $this->CI->load->view('includes/header', $params);
            $this->CI->load->view('includes/menu', $this->data);
            $this->CI->load->view('includes/astrologer_sidebar', $this->data);
            $this->CI->load->view($view_name, $params);            
            $this->CI->load->view('includes/footer', $this->data);
        }
        if ($default == 'student') {
            $this->CI->load->view('includes/header', $params);
            $this->CI->load->view('includes/menu', $this->data);
            $this->CI->load->view('includes/student_sidebar', $this->data);
            $this->CI->load->view($view_name, $params);            
            $this->CI->load->view('includes/footer', $this->data);
        }
        if ($default == 'shop') {
            $this->CI->load->view('includes/shop/header', $params);
            $this->CI->load->view('includes/shop/menu', $this->data);
            $this->CI->load->view($view_name, $params);
            $this->CI->load->view('includes/shop/footer', $this->data);
        }
    if ($default == 'popup') {
            $this->CI->load->view('inc/scriptheader', $this->data);
            $this->CI->load->view($view_name, $params);
      $this->CI->load->view('inc/scriptfooter', $this->data);
        }
         elseif ($default == 'include') {
            $this->CI->load->view($view_name, $params);
        }
    }

}

?>