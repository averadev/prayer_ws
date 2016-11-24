<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddDays extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('nativesessions');
		$this->load->helper('url');
		$this->load->database('default');
		$this->load->model('days_model');
		
		if(!$this->nativesessions->get('usuario')){
			redirect('login');
		}
	}
	public function index(){
		$data['user'] = $this->nativesessions->get('usuario');
		$this->load->view('AddDays', $data);
	}

	public function saveAudios(){
		$ruta = "assets/audios/";
		$archivo = $this->uploadFile($_FILES, $ruta);
		if ($archivo) {
			$FILE = [
				"day_date" => $_POST['fechaDia'],
				"day_type" => 1,
				"day_name" => $_POST['nombreDia'],
				"day_shortdesc" => $_POST['descripcionCorta'],
				"day_longdesc"	=> $_POST['descripcionLarga'],
				"day_status" => 1,
				"audio" => $archivo
			];
			$this->days_model->insertReturnId("days", $FILE);
			echo json_encode(["success" => 1, "message" => "Guardado correctamente"]);
		}
		
	}

	private function uploadFile($files, $route){
		
		foreach ($files as $key) {
    		if($key['error'] == UPLOAD_ERR_OK ){//Verificamos si se subio correctamente
      			$name = $key['name'];//Obtenemos el nombre del archivo
      			$temporal = $key['tmp_name']; //Obtenemos el nombre del archivo temporal
      			$size= ($key['size'] / 1000)."Kb"; //Obtenemos el tamaño en KB
				$tipo = $key['type']; //obtenemos el tipo de imagen
				
				$fecha = new DateTime();
				
				$nombreTimeStamp = $name."_". $fecha->getTimestamp();
				
				$extension=explode(".",$name); 
				$extension=$extension[count($extension)-1]; 
        		$nombreTimeStamp = $nombreTimeStamp . "." . $extension;
				
				if(move_uploaded_file($temporal, $route . $nombreTimeStamp)){
					return $nombreTimeStamp;
				}else{
					return false;
				}
				
    		}else{
				return false;
    		}
		}
		return false;
	}
}
