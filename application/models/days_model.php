<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class days_model extends CI_MODEL{
 
    public function __construct(){
        parent::__construct();
    }


    function getDays($day){
        $this->db->select("id_day, day_name, day_date, day_shortdesc, audio");
        $this->db->from("days");
        if ($day) {
             $this->db->where('id_day', $day);
        }
        $query = $this->db->get();
        if($query->num_rows() > 0 ){
            return $query->result();
        }
    }

    public function insertReturnId($table, $data){
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }
    public function updateReturnId($table, $data, $condicion){
        $this->db->where($condicion);
        $this->db->update($table, $data);
        return $this->db->affected_rows();
    }
    function getDayByDate($date){
        $this->db->select("id_day, day_name, day_date, day_shortdesc,day_longdesc, audio");
        $this->db->from("days");
        if ($date) {
             $this->db->where('day_date', $date);
        }
        $query = $this->db->get();
        if($query->num_rows() > 0 ){
            return $query->result();
        }
    }
 }