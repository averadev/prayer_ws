<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class days_model extends CI_MODEL{
 
    public function __construct(){
        parent::__construct();
    }


    function getDays($day){
        $this->db->select("id_day, day_name,day_date, day_shortdesc, day_status");
        $this->db->from("days");
        if ($day) {
             $this->db->where('id_day', $day);
        }
        $query = $this->db->get();
        if($query->num_rows() > 0 ){
            return $query->result();
        }
    }
 }