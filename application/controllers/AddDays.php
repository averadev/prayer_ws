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
		if ($_FILES) {
			$archivo = $this->uploadFile($_FILES, $ruta);
			$FILE = [
				"day_date" => $_POST['fechaDia'],
				"day_type" => 1,
				"day_name" => $_POST['nombreDia'],
				"day_shortdesc" => $_POST['descripcionCorta'],
				"day_longdesc"	=> $_POST['descripcionLarga'],
				"day_status" => 1,
				"audio" => $archivo
			];
		}else{
			$archivo = true;
			$FILE = [
				"day_date" => $_POST['fechaDia'],
				"day_name" => $_POST['nombreDia'],
				"day_shortdesc" => $_POST['descripcionCorta'],
				"day_longdesc"	=> $_POST['descripcionLarga']
			];
		}
		
		if ($archivo) {
			
			if ($_POST['ID_DAY']) {
				$condicion = "id_day = " . $_POST['ID_DAY'];
				$rows = $this->days_model->updateReturnId("days", $FILE, $condicion);
				if ($rows) {
					$message = ["success" => 1, "message" => "Actulizado correctamente"];
				}else{
					$message = ["success" => 0, "message" => "Error al actualizar"];
				}
				
			}else{
				$this->days_model->insertReturnId("days", $FILE);
				$message = ["success" => 1, "message" => "Guardado correctamente"];
			}
			echo json_encode($message);
		}else{
			echo json_encode(["success" => 0, "message" => "Vuelve a intentarlo"]);
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

				$extension = explode(".",$name); 
				$nombreTimeStamp = $extension[0]."_". $fecha->getTimestamp();
				$extension = $extension[count($extension)-1]; 
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

	public function formulario(){
		$fecha = $_POST['fecha'];
		$day = $this->days_model->getDayByDate($fecha);
		if ($day) {
			$datos['id_day'] = $day[0]->id_day;
			$datos['day_name'] = $day[0]->day_name;
			$datos['day_date'] = $day[0]->day_date;
			$datos['day_shortdesc'] = $day[0]->day_shortdesc;
			$datos['day_longdesc'] = $day[0]->day_longdesc;
			$datos['day_audio'] = $day[0]->audio;
		}else{
			$datos['day_name'] = '';
			$datos['day_date'] = $fecha;
			$datos['day_shortdesc'] = '';
			$datos['day_longdesc'] = '';
			$datos['day_audio'] = '';
			$datos['id_day'] = '';
		}
		$this->load->view('formulario', $datos);
	}

	public function saveDaysCancel(){
		if($this->nativesessions->get('usuario')){
			$condicion = "id = " . $_POST['id_dayCancel'];
			$FILE = [
				"numberDays" => $_POST['days_cancel'],
			];
			$rows = $this->days_model->updateReturnId("daysCancel", $FILE, $condicion);
			if ($rows) {
				$message = ["success" => 1, "message" => "Actulizado correctamente"];
			}else{
				$message = ["success" => 0, "message" => "Error al actualizar"];
			}
		}else{
			echo json_encode(["success" => 0, "message" => "Vuelve a intentarlo"]);
		}
		echo json_encode($message);
	}

	public function deleteDay(){
		if($this->nativesessions->get('usuario')){
			$condicion = "id_day = " . $_POST['idDay'];
			$FILE = [
				"day_status" => 0,
			];
			$rows = $this->days_model->updateReturnId("days", $FILE, $condicion);
			if ($rows) {
				$message = ["success" => 1, "message" => "eliminado correctamente"];
			}else{
				$message = ["success" => 0, "message" => "Error al eliminar"];
			}
		}else{
			echo json_encode(["success" => 0, "message" => "Vuelve a intentarlo"]);
		}
		echo json_encode($message);
	}

}
