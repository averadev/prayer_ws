<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class user_model extends CI_MODEL{
 
    public function __construct(){
        parent::__construct();
    }


    function getUsers(){
        $this->db->select("id_user, create_date");
        $this->db->from("users");
        $query = $this->db->get();
        if($query->num_rows() > 0 ){
            return $query->result();
        }
    }
 }