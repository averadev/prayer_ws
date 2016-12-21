<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->database('default');
		$this->load->model('Admins_model');
	}

	public function index(){
		$this->load->view('login');
	}

	public function checkLogin(){
		if($this->input->is_ajax_request()){
			$user = $_POST['username'];
			$pass = md5($_POST['password']);
			$Valido = $this->Admins_model->getUser($user, $pass);
			if ($Valido) {
				$this->nativesessions->set("usuario", $user);
				echo json_encode(["success" => true]);
			}else{
				echo json_encode(["success" => false]);
			}
		}
	}

	public function logout(){
		$this->nativesessions->deleteAll();
		header('Location: ../login');
	}
}
