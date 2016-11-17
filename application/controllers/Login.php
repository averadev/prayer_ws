<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->database('default');
		$this->load->model('user_model');
	}

	public function index(){
		$data['users'] = $this->user_model->getUsers();
		$this->load->view('login', $data);
	}
}
