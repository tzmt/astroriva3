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
            $this->CI->load->view('includes/header', $this->data);
            $this->CI->load->view('includes/sidebar', $this->data);
            $this->CI->load->view($view_name, $params);
            $this->CI->load->view('includes/footer', $this->data);
        }
        if ($default == 'normal1') {
            $this->CI->load->view('inc/scriptheader', $this->data);
            $this->CI->load->view('inc/header', $this->data);
            $this->CI->load->view($view_name, $params);
            $this->CI->load->view('inc/footer', $this->data);
        }
        if ($default == 'normal2') {
            $this->CI->load->view('inc/scriptheader', $this->data);
            $this->CI->load->view('inc/header', $this->data);
            $this->CI->load->view('inc/user_menu', $this->data);
            $this->CI->load->view($view_name, $params);
            $this->CI->load->view('inc/footer', $this->data);
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