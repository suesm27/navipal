<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('User');
		$this->load->model('Guide');
		$this->load->model('Reservation');
		$this->load->helper(array('form', 'url'));
	}
	public function index(){
		$this->load->view('users/user_login');
	}
	public function show_home(){
		$this->load->view('front-page/index');
	}

	public function show_about(){
		$this->load->view('about/index');
	}
	public function datepicker()
	{
		$this->load->view('datepicker-testting/datepicker'); // datepicker testing view
	}
	public function admin_dashboard(){
		$users = $this->User->get_all_users();
		$guides = $this->Guide->get_all_guides();
		$reservations = $this->Reservation->get_all_reservations();
		$this->load->view('admins/admin_dashboard', array('users' => $users,
													'guides' => $guides,
													'reservations' => $reservations));
	}
	function show_upload_page()
	{
		$this->load->view('upload_form', array('error' => ' ' ));
	}

	function do_upload()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$guide_id = $this->session->userdata['current_guide_id'];
		$config['file_name'] = "$guide_id";
		$config['overwrite'] = true;
		// $config['max_size']	= '1000';
		// $config['max_width']  = '1024';
		// $config['max_height']  = '1024';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('upload_form', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$this->load->view('upload_success', $data);
		}
	}

	function show_facebook_login(){
		$this->load->view('facebook_login');
	}
}