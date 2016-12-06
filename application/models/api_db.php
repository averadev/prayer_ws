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
	public function getAudio(){
		$this->db->select('d.id_day, d.day_date, d.day_type, d.day_name, d.day_shortdesc, d.day_longdesc, d.day_status, d.audio');
		$this->db->from('days d');
		$this->db->where('d.day_status = 1');
        return $this->db->get()->result();
	}
    
	
	
}
//end model



