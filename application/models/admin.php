<?php 
class Admin extends CI_Model{
	function get_admin($post)
	{
		$email = $post['email'];
		$password = $post['password'];
		$time = $this->db->query("SELECT created_at FROM admins WHERE email = ?", array($email))->row_array();
		if($time == null){
			return null;
		}
		else{
			$encrypted_password = md5($time['created_at'].$password);
			return $this->db->query("SELECT * FROM admins WHERE email = ? and password = ?", array($email, $encrypted_password))->row_array();	
		}
	}
	function get_all_admins(){
		return $this->db->query("SELECT id, email, password, created_at, updated_at FROM admins")->result_array();
	}
}