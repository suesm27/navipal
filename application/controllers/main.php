<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('User');
		$this->load->model('Guide');
		$this->load->model('Reservation');
	}
	public function index(){

		$this->load->view('user_login');

	}
	public function show_home(){
		$this->load->view('front-page/index');
	}
	public function datepicker()
	{
		$this->load->view('datepicker-testting/datepicker'); // datepicker testing view
	}
	public function admin_dashboard(){
		$users = $this->User->get_all_users();
		$guides = $this->Guide->get_all_guides();
		$reservations = $this->Reservation->get_all_reservations();
		$this->load->view('admin_dashboard', array('users' => $users,
													'guides' => $guides,
													'reservations' => $reservations));
	}
}