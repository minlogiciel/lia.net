<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homework_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    
    public function get_homeworks($slug = FALSE)
    {
        if ($slug === FALSE)
        {
            $query = $this->db->get('hw_table');
            return $query->result_array();
        }
        
        $query = $this->db->get_where('HW_TABLE', array('slug' => $slug));
        return $query->row_array();
    }
    
    public function add_homework()
    {
        $this->load->helper('url');
        
        $slug = url_title($this->input->post('title'), 'dash', TRUE);
        
        $data = array(
            'UTITLE' => $this->input->post('title'),
 
            'UTEXT' => $this->input->post('text')
        );
        
        return $this->db->insert('hw_table', $data);
    }
}
