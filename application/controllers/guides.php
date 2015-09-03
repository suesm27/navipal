<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Guides extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Guide');
		$this->load->model('Review');
		$this->load->model('Availability');
		$this->load->model('Reservation');
	}

	public function index(){
		$this->load->view('guides/guide_login');
	}

	public function signin_action(){
		if($this->session->userdata('user_login')){
			$this->session->set_userdata('user_login', false);
			$this->session->set_userdata('current_user_id', null);
			$this->session->set_userdata('name', null);
		}
		$guide = $this->Guide->get_guide($this->input->post());
		if($guide){
			$this->session->set_userdata('current_guide_id', $guide['id']);
			$this->session->set_userdata('name', $guide['name']);
			$this->session->set_userdata('guide_login', true);
			$success[] = 'Login successful!';
			$this->session->set_flashdata('success', $success);
			redirect("/guides/show_guide_dashboard/{$guide['id']}");
		}
		else{
			$error[] = 'No matching record found!';
			$this->session->set_flashdata('errors', $error);
			redirect('/guides');
		}
	}

	public function register_action()
	{
		$result = $this->Guide->validate($this->input->post());
		if($result == "valid") {
			$success[] = 'Registration successful!';
			$this->session->set_flashdata('success', $success);
			$this->Guide->add_guide($this->input->post());
			redirect('/guides');
		} 
		else {
			$errors = array(validation_errors());
			$this->session->set_flashdata('errors', $errors);
			redirect('/guides');
			$this->index();
		}
	}

	public function view_profile($guide_id)
	{
		$guide = $this->Guide->get_guide_by_id($guide_id);
		$reviews = $this->Review->get_reviews_by_guide_id($guide_id);
		$rating = $this->Guide->get_guide_rating_by_id($guide_id);
		$this->load->view('guides/guide_profile', array("guide" => $guide,
												"reviews" => $reviews,
												"rating" => $rating));
	}

	public function show_guides(){
		$location = $this->input->post('search');
		$guides = $this->Guide->get_all_guides();
		$ratings = $this->Guide->get_all_guides_ratings();
		$this->load->view('guides/show_guides', array("guides" => $guides,
												"location" => $location,
												"ratings" => $ratings));
	}

	public function remove_guide_action($guide_id){
		$this->Guide->delete_guide_by_id($guide_id);
		redirect("/main/admin_dashboard");
	}

	public function get_all_guides(){
		return $this->Guide->get_all_guides();
	}

	public function get_all_guides_locations(){
		$data['locations'] = $this->Guide->get_all_guides_locations();
		echo json_encode($data);
	}

	public function get_all_guides_names(){
		$data['guides_names'] = $this->Guide->get_all_guides_names();
		echo json_encode($data);
	}

	public function get_all_guides_reservations(){
		$data['reservations'] = $this->Guide->get_all_guides_reservations();
		echo json_encode($data);
	}

	public function get_all_messages_by_guide_id($guide_id){
		$data['messages'] = $this->Guide->get_all_messages_by_guide_id($guide_id);
		echo json_encode($data);
	}

	public function get_guide_availability_by_guide_id($guide_id){
		$data['availability'] = $this->Availability->get_guide_availability_by_guide_id($guide_id);
		echo json_encode($data);
	}

	public function get_month_by_month_earnings_by_guide_id($guide_id){
		$data['month_by_month_earnings'] = $this->Guide->get_month_by_month_earnings_by_guide_id($guide_id);
		echo json_encode($data);
	}

	public function show_guide_dashboard($guide_id){
		$guide = $this->Guide->get_guide_by_id($guide_id);
		$ratings = $this->Guide->get_all_guides_ratings();
		$earnings_this_month = $this->Guide->get_monthly_earning_by_guide_id($guide_id);
		$earnings_ytd = $this->Guide->get_ytd_earning_by_guide_id($guide_id);
		$reservations = $this->Reservation->get_reservations_by_guide_id($guide_id);
		$month_by_month_earnings = $this->Guide->get_month_by_month_earnings_by_guide_id($guide_id);
		$this->load->view('guides/guide_dashboard', array("guide" => $guide,
														  "ratings" => $ratings,
														  "earnings_this_month" => $earnings_this_month,
														  "earnings_ytd" => $earnings_ytd,
														  "reservations" => $reservations
														  ));
	}

	public function edit_guide($guide_id){
		$guide = $this->Guide->get_guide_by_id($guide_id);
		$this->load->view('/guides/edit_guide_profile', array("guide" => $guide));
	}

	public function edit_guide_action($guide_id){
		$action = $this->input->post('action');
		if($action == 'basic'){
			$result = $this->Guide->validate_basic($this->input->post());
		}
		if($action == 'password'){
			$result = $this->Guide->validate_password($this->input->post());
		}
		if($result == "valid") {
			$success[] = 'Changes saved!';
			$this->session->set_flashdata('success', $success);
			$this->Guide->update_guide($guide_id, $this->input->post());
			redirect("/guides/show_guide_dashboard/$guide_id");
		} else {
			$errors = array(validation_errors());
			$this->session->set_flashdata('errors', $errors);
			redirect("/guides/edit_guide/$guide_id");
		}
	}

	public function message_guide($guide_id, $user_id){
		$result = $this->Guide->validate_message($this->input->post());
		if($result == "valid") {
			$success[] = 'Message sent!';
			$this->session->set_flashdata('success', $success);
			$message = $this->input->post('message');
			$guide = $this->Guide->get_guide_by_id($guide_id);
			$this->Guide->message_guide($guide_id, $user_id, $message);
			$this->load->view('guides/message_sent', array("message" => $message,
													"guide" => $guide));
		} 
		else {
			$errors = array(validation_errors());
			$this->session->set_flashdata('errors', $errors);
			redirect("/guides/view_profile/$guide_id");
		}
	}

	public function logoff()
	{
		$this->session->sess_destroy();
		redirect('/main/show_home');
	}
}