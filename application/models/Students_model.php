<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students_model extends CI_Model {


    public $TABLE_NAME    	= "students";
    public $IDS_NAME    	= "ids";
    public $CLASS_NAME    	= "classes";
    public $PASS_NAME    	= "classes";
    
    
    protected  $MIN_PASS_LEN 	= 4;
    protected  $MAX_PASS_LEN 	= 10;
    
    protected  $TABLE  = array(
        "IDS",
        "PSEUDO",
        "EMAIL",
        "PASSWD",
        "CIVIL",
        "LASTNAME",
        "FIRSTNAME",
        "STREET1",
        "STREET2",
        "CITY",
        "POSTCODE",
        "DEPARTEMENT",
        "COUNTRY",
        "PHONE",
        "MOBILE",
        "BIRTHDAY",
        "CLASSES",
        "RM",
        "GRADE",
        "CURRGRADE",
        //"CURRGRADE",
        "REGISTDATE",
        "LASTLOGIN",
        "LASTMODIFY",
        "COMMENTS",
        "ISDELETED",
    );
    
    protected  $_id         		= 0;
    protected  $_pseudo         	= "";
    protected  $_email        		= "";
    protected  $_passwd         	= "";
    
    protected  $_civil        		= "M";
    protected  $_lastname     		= "";
    protected  $_firstname    		= "";
    protected  $_street1      		= "";
    protected  $_street2       	= "";
    protected  $_postcode     		= "";
    protected  $_city         		= "";
    protected  $_provence 			= "";
    protected  $_country      		= "";
    protected  $_phone    			= "";
    protected  $_mobile   			= "";
    
    protected  $_birthday     		= "";
    protected  $_classes     		= "";
    protected  $_rm     			= "";
    protected  $_grade     		= 1;
    protected  $_currgrade    		= 1;
    
    protected  $_registerdate 		= "";
    protected  $_lastlogin 		= "";
    protected  $_lastmodify		= "";
    protected  $_comments			= "";
    protected  $_deleted			= 0;
    
    protected  $_trace 			= "";
    
    public function __construct()
    {
        $this->load->database();
    }
    
    public function get_students($ids = FALSE)
    {
        if ($ids === FALSE)
        {
            $query = $this->db->get($this->TABLE_NAME);
            return $query->result_array();
        }
        else {
            $query = $this->db->get_where($this->TABLE_NAME, array($this->IDS_NAME => $ids));
            return $query->row_array();
        }
    }
    
    
    private function get_post($name) {
        $p = $this->input->post($name);
        if (!$p)
            $p = "";
        return $p;
    }
    
    private function init_pseud_password() {
        
        $pseudo = $this->_firstname[0] . $this->_lastname[0];
        if ($this->_grade < 10) {
            $pseudo .= "0";
        }
        $pseudo .= $this->_grade.$this->id;
        $pseudo = strtoupper($pseudo);
        $this->_pseudo = $pseudo;
        $this->_passwd = $pseudo;
    }
    
    public function update_classes_name($ids, $classname) {
        $oldname =  $this->_classes;
        if ($this->_classes != $classname) {
            $this->_classes = $classname;
            $data = array(
                $this->CLASSES_NAME => $$classname
            );

            $this->db->update_element($this->TABLE_NAME, $data, array($this->IDS_NAME => $ids));
        }
    }
    
    public function is_password_valide($p1, $p2) {
        if ($p1 && $p2 && ($p1 == $p2) && (strlen($p1) > 3)) {
            return 1;
        }
        else {
            return 0;
        }
    }
    
    public function update_password($ids, $p1, $p2) {
        $ret = 0;
        if ($this->is_password_valide($p1, $p2)) {
            $this->_passwd = $p1;
            $data = array(
                $this->PASS_NAME => $this->_passwd
            );
            $this->db->update_all_elements($this->TABLE_NAME, $data, array($this->IDS_NAME => $ids));
            $ret = 1;
        }
        return $ret;
    }
    
    public function delete_student($ids, $del=1) {

        $data = array(
            "ISDELETED" => $del
        );
        $this->db->where($this->IDS_NAME, $ids);
        $this->db->update($this->TABLE_NAME, $data);
    }
    
    public function update_student($ids)
    {
        $this->_grade = $this->get_post('grade');
        $this->_currgrade = $this->_grade;       
        $this->_email = $this->get_post('email');
        $this->_street1 = $this->get_post('street1');
        $this->_street2 = $this->get_post('street2');
        $this->_postcode = $this->get_post('postcode');
        $this->_city = $this->get_post('city');
        $this->_provence = $this->get_post('provence');
        $this->_country = $this->get_post('country');
        $this->_birthday = $this->get_post('birthday');
        $this->_classes = $this->get_post('classes');
        $this->_mobile = $this->get_post('mobile');
        $this->_comments = $this->get_post('comments');
        $this->_lastmodify = current_date();
        
        $data = array(
            'EMAIL' => $this->_email,
            "STREET1" => $this->_street1,
            "STREET2" => $this->_street2,
            "CITY" => $this->_city,
            "POSTCODE" => $this->_postcode,
            "DEPARTEMENT" => $this->_provence,
            "COUNTRY" => $this->_country,
            "PHONE" => $this->_phone,
            "MOBILE" => $this->_mobile,
            "BIRTHDAY" => $this->_birthday,
            "CLASSES" => $this->_classes,
            "RM" => $this->_rm,
            "GRADE" => $this->_grade,
            "CURRGRADE" => $this->_currgrade,
            "LASTMODIFY" => $this->_lastmodify,
            "COMMENTS" => $this->_comments
        );

        $this->db->update($this->TABLE_NAME, $data, array($this->IDS_NAME => $ids));
    }
    
    public function add_student()
    {
        $this->_id = $this->db->select_max($this->TABLE_NAME, $this->IDS_NAME);
        
        $this->_firstname = $this->get_post('firstname');
        $this->_lastname = $this->get_post('lastname');
        $this->_grade = $this->get_post('grade');
        $this->_currgrade = $this->_grade;
        $this->init_pseud_password();
        
        $this->_email = $this->get_post('email');
        $this->_street1 = $this->get_post('street1');
        $this->_street2 = $this->get_post('street2');
        $this->_postcode = $this->get_post('postcode');
        $this->_city = $this->get_post('city');
        $this->_provence = $this->get_post('provence');
        $this->_country = $this->get_post('country');
        $this->_birthday = $this->get_post('birthday');
        $this->_classes = $this->get_post('classes');
        $this->_mobile = $this->get_post('mobile');
        $this->_comments = $this->get_post('comments');
        
        $curr_date = current_date();
        $this->_registerdate = $curr_date;
        $this->_lastlogin = $curr_date;
        $this->_lastmodify = $curr_date;
        
        $data = array(
            'IDS' => $this->_ids,
            'PSEUDO' => $this->_pseudo,
            'EMAIL' => $this->_email,
            'PASSWD' => $this->_passwd,
            "CIVIL" => $this->_civil,
            "LASTNAME" => $this->_firstname,
            "FIRSTNAME" => $this->_lastname,
            "STREET1" => $this->_street1,
            "STREET2" => $this->_street2,
            "CITY" => $this->_city,
            "POSTCODE" => $this->_postcode,
            "DEPARTEMENT" => $this->_provence,
            "COUNTRY" => $this->_country,
            "PHONE" => $this->_phone,
            "MOBILE" => $this->_mobile,
            "BIRTHDAY" => $this->_birthday,
            "CLASSES" => $this->_classes,
            "RM" => $this->_rm,
            "GRADE" => $this->_grade,
            "CURRGRADE" => $this->_currgrade,
            "REGISTDATE" => $this->_registerdate,
            "LASTLOGIN" => $this->_lastlogin,
            "LASTMODIFY" => $this->_lastmodify,
            "COMMENTS" => $this->_comments,
            "ISDELETED" => 0
        );
        
        return $this->db->insert($this->TABLE_NAME, $data);
    }
}
