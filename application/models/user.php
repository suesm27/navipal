<?php 
class User extends CI_Model{
	function get_user($post)
	{
		$email = $post['email'];
		$password = $post['password'];
		$time = $this->db->query("SELECT created_at FROM users WHERE email = ?", array($email))->row_array();
		if($time == null){
			return null;
		}
		else{
			$encrypted_password = md5($time['created_at'].$password);
			return $this->db->query("SELECT * FROM users WHERE email = ? and password = ?", array($email, $encrypted_password))->row_array();	
		}
	}

	function get_all_users(){
		return $this->db->query("SELECT * FROM users")->result_array();
	}

	function get_user_by_id($id)
	{
		return $this->db->query("SELECT * FROM users WHERE id = ?", array($id))->row_array();
	}

	function get_phone_number_by_id($user_id){
		return $this->db->query("SELECT phone FROM users WHERE id = ?", array($user_id))->row_array();
	}

	function add_user($user)
	{
		date_default_timezone_set("America/Los_Angeles");
		$t = time();
		$now = date("Y-m-d H:i:s",$t);
		$encrypted_password = md5($now.$user['password']);
		$query = "INSERT INTO users (name, email, password, created_at, updated_at, dob, phone) VALUES (?,?,?,?,?,?,?)";
		$values = array($user['name'], $user['email'], $encrypted_password, $now, $now, $user['dob'], $user['phone']); 
		return $this->db->query($query, $values);
	} 

	function validate($post){
		$this->form_validation->set_rules('name', 'Name', 'trim|max_length[45]|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[255]|is_unique[users.email]');
		$this->form_validation->set_message('email', 'The email has been registered by another user!');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|max_length[45]|matches[passwordconf]');
		$this->form_validation->set_rules('passwordconf', 'Password Confirmation', 'trim|required');
		$this->form_validation->set_rules('dob', 'Date of Birth', 'required');
		if($this->form_validation->run()) {
			return "valid";
		} else {
			return array(validation_errors());
		}
	}
}
?>