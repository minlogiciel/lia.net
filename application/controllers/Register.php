<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }
    
    
    public function index() {
    	
    	$data['err'] = "";
    	$this->load->view('templates/header');
    	$this->load->view('templates/maintitle');
    	$this->load->view('register/index', $data);
    	$this->load->view('templates/footer');
    	
    }
    
}

?>