<?php
setlocale(LC_ALL,"es_ES@euro","es_ES","esp");

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';


/**
 * Gluglis
 * Author: Alfredo Zum
 * Gluglis 2015
 *
 */
class Api extends REST_Controller {

	public function __construct() {
        parent::__construct();
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
        $this->load->database('default');
        $this->load->model('api_db');
		date_default_timezone_set('Etc/GMT0');
    }

	public function index_get(){
		echo "hola";
		/*$hoy = getdate();
		$strHoy = $hoy["year"]."-".$hoy["mon"]."-".$hoy["mday"] . " " . $hoy["hours"] . ":" . $hoy["minutes"] . ":" . $hoy["seconds"];
		echo $strHoy . "</br>";*/
		
    }
	
	/************** Pantalla Card ******************/
	
	/**
     * Obtiene los audios disponibles
     */
	public function getAudio_get($source){
		$message = $this->verifyIsSet(array('idApp'));
		if ($message == null) {
			$data = $this->api_db->getAudio();
			
			$day = array( "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" );
			$months = array('', 'Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
			
			foreach( $data as $item ){
				$timestamp = strtotime($item->day_date);
				$item->weekday = $day[date('w', ($timestamp))];
				$item->month = $months[date('n', ($timestamp))];
				$item->day = date('d', ($timestamp));
			}
			$message = array( 'success' => true, 'message' => "Audios", 'items' => $data );
        }
        $this->response($message, 200);
	}
	
	
	/************** metodo generico ******************/
	
	/**
     * Verificamos si las variables obligatorias fueron enviadas
     */
    private function verifyIsSet($params){
    	foreach ($params as &$value) {
		    if ($this->get($value) ==  '')
		    	return array('success' => false, 'message' => 'El parametro '.$value.' es obligatorio');
		}
		return null;
    }
	
}