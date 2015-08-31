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

	public function show_confirmation($user_id, $guide_id, $date){
		$reservation_id = $this->add_reservation($user_id, $guide_id, $date);
		$reservation = $this->get_reservation_by_id($reservation_id);
		$this->load->view('confirmation', array('reservation' => $reservation));
	}

	public function get_all_reservations(){
		$reservations = $this->Reservation->get_all_reservations();
		return $reservations;
	}

	public function get_reservation_by_id($id){
		$reservation = $this->Reservation->get_reservation_by_id($id);
		return $reservation;
	}

	public function add_reservation($user_id, $guide_id, $date){
		return $this->Reservation->add_reservation($user_id, $guide_id, $date);
	}

	public function delete_reservation_by_id($id){
		return $this->Reservation->delete_reservation_by_id($id);
	}
}