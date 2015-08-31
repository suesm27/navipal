<?php 
class Reservation extends CI_Model{
	function get_all_reservations()
	{
		return $this->db->query("select reservations.id, user_id, guide_id, users.name as user_name, guides.name as guide_name, reservations.date from reservations join users on reservations.user_id = users.id join guides on reservations.guide_id = guides.id")->result_array();
	}

	function get_reservation_by_id($id)
	{
		return $this->db->query("SELECT reservations.id, user_id, users.name as user_name, guide_id, guides.name as guide_name, date, guides.image as guide_image, guides.price as guide_price FROM reservations JOIN users on reservations.user_id = users.id JOIN guides on reservations.guide_id = guides.id WHERE reservations.id = ?", array($id))->row_array();
	}

	function add_reservation($user_id, $guide_id, $date)
	{
		$query = "INSERT INTO reservations (user_id, guide_id, date) VALUES (?,?,?)";
		$values = array($user_id, $guide_id, $date); 
		$this->db->query($query, $values);
		$reservation_id = $this->db->insert_id();
		return $reservation_id;

	} 
	function delete_reservation_by_id($id)
	{
		$query = "DELETE FROM reservations where id = ?";
		$values = array($id); 
		return $this->db->query($query, $values);
	} 
}
?>