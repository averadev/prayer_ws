<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class api_db extends CI_MODEL
{
 
    public function __construct(){
        parent::__construct();
    }
	
	/************** Pantalla LOGIN ******************/
	
	/**
	 * valida si existe el usuario
	 */
	public function getAudio($id_device){
		$this->db->distinct();
		$this->db->select("d.id_day, d.day_date, d.day_type, d.day_name, d.day_shortdesc, d.day_longdesc, d.day_status, d.audio, f.ID as fav, dw.ID as downloaded");
		$this->db->from("days d");
		$this->db->join("favoritos f", "f.id_day = d.id_day and f.id_device = '". $id_device."'" , "left");
        $this->db->join("downloads dw", "dw.id_day = dw.id_day and dw.id_device = '". $id_device."'" , "left");
		$this->db->where("d.day_status = 1");
		$this->db->order_by("d.day_date", "ASC");
        return $this->db->get()->result();
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
	public function deleteReturnId($table, $condicion){
        //$this->db->where($condicion);
        $this->db->delete($table, $condicion);
        return $this->db->affected_rows();
    }
	public function countFav($table, $condicion){
        $this->db->select('ID');
        $this->db->from($table);
        $this->db->where($condicion);
        $query = $this->db->get();
        if($query->num_rows() > 0 ){
            return true;
        }else{
        	return false;
        }
    }
}




