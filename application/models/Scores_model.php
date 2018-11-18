<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Scores_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    
    public function get_scores($ids)
    {
        $ref = array(
            'STUDENTID' => $ids
        );
        //$query = $this->db->get_where('sscores', $ref);
        
        
        $sql = "SELECT * FROM sscores WHERE STUDENTID = ?";
        $query = $this->db->query($sql, array($ids));
   
        return $query->result_array();
    }
    
    public function add_scores($ids)
    {
        $this->load->helper('url');
        
        $slug = url_title($this->input->post('title'), 'dash', TRUE);
        
        $data = array(
            'UTITLE' => $this->input->post('title'),
 
            'UTEXT' => $this->input->post('text')
        );
        
        return $this->db->insert('students', $data);
    }
}
