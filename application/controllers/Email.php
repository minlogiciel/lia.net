<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //$this->load->library('session');
    }
    
    
    public function index() {
    	
    	$data['title'] = ucfirst("Send Email To student's Parents");
    	$data['messages'] = "";
    	$data['msgtitle'] = "";
    	$data['sendby'] = 0;
    	$data['reportcard'] = 0; 
    	$data['classlists'] = array(""); 
    	$data['err'] = "";
    	$this->load->view('templates/header');
    	$this->load->view('templates/maintitle');
    	$this->load->view('email/index', $data);
    	$this->load->view('templates/footer');
    	
    }
    
    public function send() {
    	$data['title'] = ucfirst("Email");
    	$msg= $this->input->post('messages');
    	$msgtitle = $this->input->post('msgtitle');
    	$data['sendby'] = $this->input->post('sendby');
    	$data['reportcard'] = $this->input->post('reportcard');
    	$data['classlists'] = array("PS-A");
    	
    	$err = "";
    	if (!$msg) {
    		$err .= "Should input message<br>";
    	}
    	
    	if (!$msgtitle) {
    		$err = "Should input message title";
    	}
    	$data['err'] = $err;
    	$data['messages'] = $msg;
    	$data['msgtitle'] = $msgtitle;
    	
    	
    	$classlist = array();
    	$nb = $this->input->post("classnumber");
    	for ($i = 0; $i < $nb; $i++) {
    		if ($this->input->post("selectclass_".$i)) {
    			$classlist[] = $this->input->post("classname_".$i);
    		}
    	}
    	
    	$data['classlists']= $classlist;
    	
    	if (!$err) {
    		//Load email library
    		$this->load->library('email');
    		$this->email->subject($msgtitle);
    		$this->email->message($msg);
    	
    		//Send mail
    		/*
    		if($this->email->send())
    			$this->session->set_flashdata("email_sent","Email sent successfully.");
    		else
    			$this->session->set_flashdata("email_sent","Error in sending Email.");
    		*/
    	}
    	$this->load->view('templates/header');
    	$this->load->view('templates/maintitle');
    	$this->load->view('email/index', $data);
    	$this->load->view('templates/footer');
    } 
}

?>