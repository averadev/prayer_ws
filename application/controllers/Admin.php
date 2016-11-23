<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
		$DAY = $this->input->get('day');
		//$data['days'] = $this->days_model->getDays($DAY);
		//$this->load->view('home', $data);
		$data['user'] = $this->nativesessions->get('usuario');
		$this->load->view('home', $data);
	}
}
