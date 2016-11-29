<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';

class RestPrayer extends REST_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->database('default');
		$this->load->model('days_model');
	}
	public function index_get(){
		// $days = $this->days_model->getDays();
		// $message = array('success' => true, 'items' => $days);
		// $this->response($message, 200);
	}

	public function days_get(){
		$Dia = $this->get('day');
		//$days = $this->days_model->getDays($Dia);
		$days = $this->days_model->getDaysProcedure($Dia);
		$message = array('success' => true, 'items' => $days);
		$this->response($message, 200);
	}

}
