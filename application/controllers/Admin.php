<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('Nativesessions');
		$this->load->helper('url');
		$this->load->database('default');
		$this->load->model('days_model');
		
		if(!$this->nativesessions->get('usuario')){
			redirect('login');
		}
	}
	public function index(){
		$DAY = $this->input->get('day');
		$data['user'] = $this->nativesessions->get('usuario');
		$data['days_cancel'] = $this->days_model->getDaysCancel();
		$this->load->view('home', $data);
	}
}
