<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reservations extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Reservation');
	}

	public function index(){
		$reservations = $this->get_all_reservations();
		$this->load->view('show_reservations', array('reservations' => $reservations));
	}

	public function get_all_reservations(){
		$reservations = $this->Reservation->get_all_reservations();
		return $reservations;
	}

	public function get_reservation_by_id($id){
		$reservation = $this->Reservation->get_reservation_by_id($id);
		return $reservation;
	}

	public function add_reservation(){
		$user_id = $this->input->post('user_id');
		$guide_id = $this->input->post('guide_id');
		$date = $this->input->post('date');
		return $this->Reservation->add_reservation($user_id, $guide_id, $date);
	}

	public function delete_reservation_by_id($id){
		return $this->Reservation->delete_reservation_by_id($id);
	}
}