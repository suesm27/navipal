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
		return $this->db->query("SELECT id, name, description, location, image, price, date_format(dob, '%m/%d/%Y') as dob, phone, email, password, created_at, updated_at FROM guides")->result_array();
	}

	function get_guide_by_id($id)
	{
		return $this->db->query("SELECT id, name, description, location, image, price, date_format(dob, '%m/%d/%Y') as dob, phone, email, password FROM guides WHERE id = ?", array($id))->row_array();
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

	function get_guide_rating_by_id($guide_id){
		$total = $this->db->query("select sum(star) as stars from reviews WHERE guide_id = ?", array($guide_id))->row_array();
		$count = $this->db->query("select count(*) as numReviews from reviews WHERE guide_id = ?", array($guide_id))->row_array();
		if($count['numReviews'] == 0){
			return 0;
		}
		else{
			$rating = floor($total['stars']/$count['numReviews']);
			return $rating;
		}
	}

	function get_all_guides_ratings(){
		$ratings = array();
		$guides = $this->get_all_guides();
		foreach ($guides as $guide){
			$ratings[$guide['id']] = $this->get_guide_rating_by_id($guide['id']);
		}
		return $ratings;
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

	function delete_guide_by_id($guide_id){
		$this->db->query("DELETE FROM messages WHERE guide_id = ?", array($guide_id));
		$this->db->query("DELETE FROM reviews WHERE guide_id = ?", array($guide_id));
		$this->db->query("DELETE FROM reservations WHERE guide_id = ?", array($guide_id));
		return $this->db->query("DELETE FROM guides where id = ?", array($guide_id));
	}

	function message_guide($guide_id, $user_id, $message){
		$query = "INSERT INTO messages (guide_id, user_id, message, created_at) VALUES (?,?,?, NOW())";
		$values = array($guide_id, $user_id, $message);
		return $this->db->query($query, $values);
	}

	function populate_guides_table(){
		// $query = "INSERT INTO guides (name, description, location, price, dob, phone, email, password, created_at, updated_at) VALUES (?,?,?,?,?,?,?,?,?,?)";
		// $values = array($name, $description, $location, $price, $dob, $phone, $email, $password, $time, $time);
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

	function validate_message($post){
		$this->form_validation->set_rules('message', 'Message', 'trim|required|max_length[255]');
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
		$query = "UPDATE guides SET name = ?, email = ?, description = ?, location = ?, image = ?, price = ?, dob = ?, phone = ?, password = ?, updated_at = NOW() WHERE id = ?";
		$values = array($guideInfo['name'], $guideInfo['email'], $guideInfo['description'], $guideInfo['location'], $guideInfo['image'], $guideInfo['price'], $guideInfo['dob'], $guideInfo['phone'], $encrypted_password, $guideInfo['id']);
		return $this->db->query($query, $values);
	}
}
?>