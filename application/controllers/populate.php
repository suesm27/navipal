<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Populate extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Reservation');
		$this->load->model('Review');
		$this->load->model('Availability');
	}
	public function index(){
		
	}
	public function populate_availability_table(){
		$this->Availability->populate_availability_table();
	}
	public function populate_reviews_table(){
		$this->Review->populate_reviews_table();
	}
}