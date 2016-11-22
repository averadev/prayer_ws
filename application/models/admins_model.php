<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Admins_model extends CI_MODEL{
 
    public function __construct(){
        parent::__construct();
    }


    function getUser($name, $password){
        $this->db->select("count(id_admin) as n");
        $this->db->from("admins");
        $this->db->where('name_admin', $name);
        $this->db->where('password_admin', $password);
        $query = $this->db->get();
        if($query->num_rows() > 0 ){
            $row = $query->row();
            return $row->n;
        }
    }
 }