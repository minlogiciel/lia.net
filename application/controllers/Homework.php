<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Homework extends CI_Controller {
	private $CLASS_NAME = array(
			"PS-B", "4",
			"PS-A", "5",
			"IS-C", "6",
			"IS-A", "7",
			"HS-D Eng", "8",
			"HS-D1", "8",
			"HS-D2", "8",
			"HS-C1", "9",
			"HS-C2", "10",
			"HS-B", "12",
			"TUTO", "12"
	);

    public function __construct()
    {
        parent::__construct();
        $this->load->model('homework_model');
        $this->load->helper('url_helper');
    }
    
    
    public function view($classname = NULL)
    {
    	$data['homework_item'] = $this->homework_model->get_homeworks($classname);
                       
        $this->load->view('templates/header');
        $this->load->view('templates/maintitle');

        $this->load->view('homework/view', $data);
        
        $this->load->view('templates/footer');
    }
    
    public function index()
    {
    	$data['hid'] = 0; 
    	$data['hindex'] = 0; 
    	$data['err'] = 0;
    	$data['programlist'] = array("MATH", "ENGLISH");
    	$data['subjects'] = "ENGLISH";
    	$data['comments'] = "ENGLISH homework";
    	$data['filename'] = "";
    	$data['homeworks'] = $this->homework_model->get_homeworks($this->CLASS_NAME, get_year(), get_semester());
    	
        $this->load->view('templates/header');
        $this->load->view('templates/maintitle');
        $this->load->view('homework/index', $data);
        $this->load->view('templates/footer');
    }
    
}
