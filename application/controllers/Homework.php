<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homework extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('homework_model');
        $this->load->helper('url_helper');
    }
    
    
    public function view($slug = NULL)
    {
        $data['homework_item'] = $this->homework_model->get_homeworks($slug);
                       
        $this->load->view('templates/header');
        $this->load->view('templates/maintitle');

        $this->load->view('homework/view', $data);
        
        $this->load->view('templates/footer');
    }
    
    public function index()
    {
        $data['homeworks'] = $this->homework_model->get_homeworks();
       
        $this->load->view('templates/header');
        $this->load->view('templates/maintitle');
        $this->load->view('homework/index', $data);
        $this->load->view('templates/footer');
    }
    
}
