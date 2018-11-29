<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homework_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    
    public function get_class_homeworks($classname, $annee=FALSE, $semestre=FALSE)
    {  			
    	$query = $this->db->get_where('hw_table', array('CLASSES' => $classname, 'ANNEE' => $annee, 'SEMESTER' => $semestre));
    	return $query->result_array();
    }
    
    public function get_homeworks($classlist = FALSE, $annee = FALSE, $semestre = FALSE)
    {
    	if ($classlist=== FALSE) {
    		$query = $this->db->get('hw_table');
    		$homeworks = $query->result_array();
    		
    	}
    	else {
    		$homeworks = array();
    		for ($n = 0; $n < count($classlist)-2; $n+=2) {
    			$classname = $classlist[$n];
    			$homeworks[$classname]= $this->get_class_homeworks($classname, $annee, $semestre);
     		}
    	}
    	return $homeworks;
    }
    
    public function add_homework()
    {        
        $data = array(
        		'TITLE' => $this->input->post('TITLE'),
        		'SUBJECTS' => $this->input->post('SUBJECTS'),
        		'CLASSES' => $this->input->post('CLASSES'),
        		'ANNEE' => $this->input->post('ANNEE'),
        		'SEMESTER' => $this->input->post('SEMESTER'),
        		'DATES' => $this->input->post('DATES'),
        		'FILES' => $this->input->post('FILES'),
        		'COMMENTS' => $this->input->post('COMMENTS')
        );
        
        return $this->db->insert('hw_table', $data);
    }
}
