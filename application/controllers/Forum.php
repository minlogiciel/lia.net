<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forum extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('forum_model');
    }
    
    
    public function view($slug = NULL)
    {
        $data['forum_item'] = $this->forum_model->get_news($slug);
        
        if (empty($data['forum_item']))
        {
            show_404();
        }
        
        $data['title'] = $data['forum_item']['utitle'];
        
        $this->load->view('templates/header');
        $this->load->view('templates/maintitle');
        $this->load->view('forum/view', $data);
        $this->load->view('templates/footer');
    }
    
    public function index()
    {
        $data['news'] = $this->forum_model->get_news();
        $data['title'] = 'News archive';
        
        $this->load->view('templates/header');
        $this->load->view('templates/maintitle');
        $this->load->view('forum/index', $data);
        $this->load->view('templates/footer');
    }
    
    public function create()
    {
        //$this->load->helper('form');
        $this->load->library('form_validation');
        
        $data['title'] = 'test';
        $data['autor'] = 'test';
        $data['text'] = 'text';
        
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('text', 'Text', 'required');
        
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header');
            $this->load->view('templates/maintitle');
            echo('<div class="content">');
                echo('<div class="left">');
                    $this->load->view('forum/create', $data);
                echo('</div>');
                echo('<div class="right">');
                    $this->load->view('pages/right');
    			echo('</div>');
			echo('</div>');
            $this->load->view('templates/footer');
            
        }
        else
        {
            $this->forum_model->set_news();
            $this->load->view('forum/success');
        }
    }
}
