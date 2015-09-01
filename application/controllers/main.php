<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
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
}