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
	}

	public function days_get(){
		$Dia = $this->get('day');
		$daysCancel = $this->days_model->getDaysCancel();
		$days = $this->days_model->getDays($Dia, $daysCancel);
		$message = array('success' => true, 'items' => $days);
		$this->response($message, 200);
	}

}
