<?php 
class Reservation extends CI_Model{
	function get_all_reservations()
	{
		return $this->db->query("select reservations.id, user_id, guide_id, users.name as user_name, guides.name as guide_name, reservations.date from reservations join users on reservations.user_id = users.id join guides on reservations.guide_id = guides.id")->result_array();
	}

	function get_reservation_by_id($id)
	{
		return $this->db->query("SELECT * FROM reservations WHERE id = ?", array($id))->row_array();
	}

	function add_reservation($user_id, $guide_id, $date)
	{
		$query = "INSERT INTO reservations (user_id, guide_id, date) VALUES (?,?,?)";
		$values = array($user_id, $guide_id, $date); 
		return $this->db->query($query, $values);
	} 
	function delete_reservation_by_id($id)
	{
		$query = "DELETE FROM reservations where id = ?";
		$values = array($id); 
		return $this->db->query($query, $values);
	} 
}
?>