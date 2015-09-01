<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reservations extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Reservation');
		$this->load->model('User');
		$this->load->model('Guide');
	}

	public function index(){
		$reservations = $this->get_all_reservations();
		$this->load->view('show_reservations', array('reservations' => $reservations));
	}

	public function show_confirmation($user_id, $guide_id, $date){
		$post = $this->input->post();
		$user_phone = $this->User->get_phone_number_by_id($user_id);
		$guide_phone = $this->Guide->get_phone_number_by_id($guide_id);
		$reservation_id = $this->add_reservation($user_id, $guide_id, $date);
		$reservation = $this->get_reservation_by_id($reservation_id);
		$this->load->view('confirmation', array('reservation' => $reservation,
												'post_info' => $post,
												'user_phone' => $user_phone,
												'guide_phone' => $guide_phone));
	}

	public function remove_reservation_action($reservation_id){
		$this->Reservation->delete_reservation_by_id($reservation_id);
		redirect("/main/admin_dashboard");
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