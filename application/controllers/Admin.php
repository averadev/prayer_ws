<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->database('default');
		$this->load->model('days_model');
	}
	public function index(){
		$DAY = $this->input->get('day');
		//$data['days'] = $this->days_model->getDays($DAY);
		//$this->load->view('home', $data);
		$this->load->view('home');
	}
}
