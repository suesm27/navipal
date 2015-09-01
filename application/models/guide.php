<?php 
class Guide extends CI_Model{
	function get_guide($post)
	{
		$email = $post['email'];
		$password = $post['password'];
		$time = $this->db->query("SELECT created_at FROM guides WHERE email = ?", array($email))->row_array();
		if($time == null){
			return null;
		}
		else{
			$encrypted_password = md5($time['created_at'].$password);
			return $this->db->query("SELECT * FROM guides WHERE email = ? and password = ?", array($email, $encrypted_password))->row_array();	
		}
	}

	function get_all_guides(){
		return $this->db->query("SELECT id, name, description, rating, location, image, price, date_format(dob, '%m/%d/%Y') as dob, phone, email, password FROM guides")->result_array();
	}

	function get_guide_by_id($id)
	{
		return $this->db->query("SELECT id, name, description, rating, location, image, price, date_format(dob, '%m/%d/%Y') as dob, phone, email, password FROM guides WHERE id = ?", array($id))->row_array();
	}

	function get_phone_number_by_id($guide_id){
		return $this->db->query("SELECT phone FROM guides WHERE id = ?", array($guide_id))->row_array();
	}

	function get_all_guides_locations(){
		return $this->db->query("SELECT location FROM guides")->result_array();
	}

	function get_all_guides_names(){
		return $this->db->query("SELECT name FROM guides")->result_array();
	}

	function add_guide($guide)
	{
		date_default_timezone_set("America/Los_Angeles");
		$t = time();
		$now = date("Y-m-d H:i:s",$t);
		$encrypted_password = md5($now.$guide['password']);
		$query = "INSERT INTO guides (name, email, password, created_at, dob) VALUES (?,?,?,?,?)";
		$values = array($guide['name'], $guide['email'], $encrypted_password, $now, $guide['dob']); 
		return $this->db->query($query, $values);
	} 

	function validate($post){
		$this->form_validation->set_rules('name', 'Name', 'trim|max_length[45]|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[255]|is_unique[guides.email]');
		$this->form_validation->set_message('email', 'The email has been registered by another guide!');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|max_length[45]|matches[passwordconf]');
		$this->form_validation->set_rules('passwordconf', 'Password Confirmation', 'trim|required');
		$this->form_validation->set_rules('dob', 'Date of Birth', 'required');
		if($this->form_validation->run()) {
			return "valid";
		} else {
			return array(validation_errors());
		}
	}

	function validate_basic($post){
		$this->form_validation->set_rules('name', 'Name', 'trim|max_length[45]|required');
		$this->form_validation->set_rules('location', 'Location', 'trim|max_length[255]|required');
		$this->form_validation->set_rules('price', 'Price', 'trim|is_natural|required');
		$this->form_validation->set_rules('dob', 'Date of Birth', 'trim|max_length[10]|required');
		$this->form_validation->set_rules('phone', 'Phone Number', 'trim|max_length[11]|numeric|required');
		$this->form_validation->set_rules('description', 'Description', 'trim|max_length[255]|required');
		if($this->form_validation->run()) {
			return "valid";
		} else {
			return array(validation_errors());
		}
	}

	function validate_password($post){
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|max_length[45]|matches[passwordconf]');
		$this->form_validation->set_rules('passwordconf', 'Password Confirmation', 'trim|required');
		if($this->form_validation->run()) {
			return "valid";
		} else {
			return array(validation_errors());
		}
	}

	function update_guide($guide_id, $info)
	{
		$guideInfo = $this->get_guide_by_id($guide_id);
		foreach($info as $key => $value){
			$guideInfo[$key] = $info[$key];
		}
		$time = $this->db->query("SELECT created_at FROM guides WHERE id = ?", array($guide_id))->row_array();
		if(array_key_exists('password', $info)){
			$encrypted_password = md5($time['created_at'].$guideInfo['password']);
		}
		else{
			$encrypted_password = $guideInfo['password'];
		}
		$query = "UPDATE guides SET name = ?, email = ?, description = ?, rating = ?, location = ?, image = ?, price = ?, dob = ?, phone = ?, password = ?, updated_at = NOW() WHERE id = ?";
		$values = array($guideInfo['name'], $guideInfo['email'], $guideInfo['description'], $guideInfo['rating'], $guideInfo['location'], $guideInfo['image'], $guideInfo['price'], $guideInfo['dob'], $guideInfo['phone'], $encrypted_password, $guideInfo['id']);
		return $this->db->query($query, $values);
	}
}
?>