<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Guides extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Guide');
	}

	public function index(){
		$this->load->view('guide_login');
	}

	public function signin_action(){
		$guide = $this->Guide->get_guide($this->input->post());
		if($guide){
			$this->session->set_userdata('current_guide_id', $guide['id']);
			$this->session->set_userdata('name', $guide['name']);
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
		$this->load->view('guide_profile', array("guide" => $guide));
	}

	public function show_guides(){
		$location = $this->input->post('search');
		$guides = $this->Guide->get_all_guides();
		$this->load->view('show_guides', array("guides" => $guides,
												"location" => $location));
	}

	public function get_all_guides_locations(){
		$data['locations'] = $this->Guide->get_all_guides_locations();
		echo json_encode($data);
	}

	public function get_all_guides_names(){
		$data['guides_names'] = $this->Guide->get_all_guides_names();
		echo json_encode($data);
	}

	public function show_guide_dashboard($guide_id){
		$guide = $this->Guide->get_guide_by_id($guide_id);
		$this->load->view('guide_dashboard', array("guide" => $guide));
	}

	public function image_upload()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);

		if ( ! $this->upload->image_upload())
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

	public function logoff()
	{
		$this->session->sess_destroy();
		redirect('/guides');
	}
}