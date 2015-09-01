<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User');
	}

	public function index(){
		$this->load->view('user_login');
	}

	public function signin_action(){
		if($this->session->userdata('guide_login')){
			$this->session->set_userdata('guide_login', false);
			$this->session->set_userdata('current_guide_id', null);
			$this->session->set_userdata('name', null);
		}
		$user = $this->User->get_user($this->input->post());
		if($user){
			$this->session->set_userdata('current_user_id', $user['id']);
			$this->session->set_userdata('name', $user['name']);
			$this->session->set_userdata('user_login', true);
			$success[] = 'Login successful!';
			$this->session->set_flashdata('success', $success);
			redirect('/main/show_home');
		}
		else{
			$error[] = 'No matching record found!';
			$this->session->set_flashdata('errors', $error);
			redirect('/users');
		}
	}

	public function signin_action_other($guide_id){
		if($this->session->userdata('guide_login')){
			$this->session->set_userdata('guide_login', false);
			$this->session->set_userdata('current_guide_id', null);
			$this->session->set_userdata('name', null);
		}
		$user = $this->User->get_user($this->input->post());
		if($user){
			$this->session->set_userdata('current_user_id', $user['id']);
			$this->session->set_userdata('name', $user['name']);
			$this->session->set_userdata('user_login', true);
			$success[] = 'Login successful!';
			$this->session->set_flashdata('success', $success);
			redirect("/guides/view_profile/$guide_id");
		}
		else{
			$error[] = 'No matching record found!';
			$this->session->set_flashdata('errors', $error);
			redirect("/guides/view_profile/$guide_id");
		}
	}

	public function register_action()
	{
		$result = $this->User->validate($this->input->post());
		if($result == "valid") {
			$success[] = 'Registration successful!';
			$this->session->set_flashdata('success', $success);
			$this->User->add_user($this->input->post());
			redirect('/main/show_home');
		} 
		else {
			$errors = array(validation_errors());
			$this->session->set_flashdata('errors', $errors);
			redirect('/users');
			$this->index();
		}
	}

	public function remove_user_action($user_id){
		$this->User->delete_user_by_id($user_id);
		redirect("/main/admin_dashboard");
	}

	public function show_users(){
		$users = $this->User->get_all_users();
		$this->load->view('show_users', array("users" => $users));
	}

	public function view_profile($user_id)
	{
		$user = $this->User->get_user_by_id($user_id);
		$this->load->view('user_profile', array("user" => $user));
	}

	public function get_all_users()
	{
		return $this->User->get_all_users();
	}

	public function logoff()
	{
		$this->session->sess_destroy();
		redirect('/main/show_home');
	}
}