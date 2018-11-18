<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('students_model');
        $this->load->model('scores_model');
        $this->load->helper('url_helper');
    }
    
    
    public function view($ids)
    {
        $data['student_item'] = $this->students_model->get_students($ids);
        $data['scores_items'] = $this->scores_model->get_scores($ids);
        
        $this->load->view('templates/header');
        $this->load->view('templates/maintitle');

        $this->load->view('students/view', $data);
        
        $this->load->view('templates/footer');
    }
    
    public function index()
    {
        $data['students'] = $this->students_model->get_students();
       
        $this->load->view('templates/header');
        $this->load->view('templates/maintitle');
        $this->load->view('students/index', $data);
        $this->load->view('templates/footer');
    }
    
}
