<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddDays extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('nativesessions');
		$this->load->helper('url');
		$this->load->database('default');
		//$this->load->model('days_model');
		
		if(!$this->nativesessions->get('usuario')){
			redirect('login');
		}
	}
	public function index(){
		//$DAY = $this->input->get('day');
		$data['user'] = $this->nativesessions->get('usuario');
		$this->load->view('AddDays', $data);
	}
	public function saveAudios(){
		$ruta = "assets/audios/";
		$this->uploadFile($_FILES, $ruta);
	}

	private function uploadFile($files, $route){
		
		foreach ($files as $key) {
    		if($key['error'] == UPLOAD_ERR_OK ){//Verificamos si se subio correctamente
      			$name = $key['name'];//Obtenemos el nombre del archivo
      			$temporal = $key['tmp_name']; //Obtenemos el nombre del archivo temporal
      			$size= ($key['size'] / 1000)."Kb"; //Obtenemos el tamaño en KB
				$tipo = $key['type']; //obtenemos el tipo de imagen
				
				$fecha = new DateTime();
				
				$nombreTimeStamp = "audio_". $fecha->getTimestamp();
				
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
