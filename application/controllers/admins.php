<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admins extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin');
		$this->load->model('User');
		$this->load->model('Guide');
		$this->load->model('Reservation');
	}

	public function index(){
		$this->load->view('admins/admin_login');
	}

	public function signin_action(){
		if($this->session->userdata('user_login')){
			$this->session->set_userdata('user_login', false);
			$this->session->set_userdata('current_user_id', null);
			$this->session->set_userdata('name', null);
		}
		if($this->session->userdata('guide_login')){
			$this->session->set_userdata('guide_login', false);
			$this->session->set_userdata('current_guide_id', null);
			$this->session->set_userdata('name', null);
		}
		$admin = $this->Admin->get_admin($this->input->post());
		if($admin){
			$this->session->set_userdata('current_admin_id', $admin['id']);
			$this->session->set_userdata('admin_login', true);
			$success[] = 'Login successful!';
			$this->session->set_flashdata('success', $success);
			redirect("/admins/show_admin_dashboard");
		}
		else{
			$error[] = 'No matching record found!';
			$this->session->set_flashdata('errors', $error);
			redirect('/admins');
		}
	}

	public function show_admin_dashboard(){
		$users = $this->User->get_all_users();
		$guides = $this->Guide->get_all_guides();
		$reservations = $this->Reservation->get_all_reservations();
		$this->load->view('admins/admin_dashboard', array('users' => $users,
													'guides' => $guides,
													'reservations' => $reservations));
	}
}