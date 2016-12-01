<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Config extends CI_Controller {

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
		$data['user'] = $this->nativesessions->get('usuario');
		$this->load->view('config', $data);
	}
}
