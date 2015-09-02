<?php 
class Reservation extends CI_Model{
	function get_all_reservations()
	{
		return $this->db->query("select reservations.id, user_id, guide_id, users.name as user_name, guides.name as guide_name, reservations.date, reservations.confirmation, reservations.created_at, reservations.updated_at from reservations join users on reservations.user_id = users.id join guides on reservations.guide_id = guides.id")->result_array();
	}

	function get_reservation_by_id($id)
	{
		return $this->db->query("SELECT reservations.id, user_id, users.name as user_name, guide_id, guides.name as guide_name, date_format(date, '%a, %M %D, %Y') as date, confirmation, reservations.created_at, guides.id as guide_id, guides.image as guide_image, guides.price as guide_price FROM reservations JOIN users on reservations.user_id = users.id JOIN guides on reservations.guide_id = guides.id WHERE reservations.id = ?", array($id))->row_array();
	}

	function add_reservation($user_id, $guide_id, $date)
	{
		$confirmation_number = rand(100000, 900000);
		$query = "INSERT INTO reservations (user_id, guide_id, date, confirmation, created_at, updated_at) VALUES (?,?,?,$confirmation_number, NOW(), NOW())";
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
	function populate_reservations_table()
	{
		for($i=0; $i<1000; $i++){
			$datestart = strtotime('2014-09-01');//you can change it to your timestamp;
			$dateend = strtotime('2015-09-31');//you can change it to your timestamp;
			$daystep = 86400;
			$datebetween = abs(($dateend - $datestart) / $daystep);
			$randomday = rand(0, $datebetween);
			$date = date("Y-m-d", $datestart + ($randomday * $daystep));
			$user_id = rand(1, 42);
			$guide_id = rand(1,10);
			$confirmation = rand(100000, 999999);
			$query = "insert into reservations (user_id, guide_id, date, confirmation, created_at, updated_at) values (?,?,?,?,NOW(), NOW())";
			$values = array($user_id, $guide_id, $date, $confirmation);
			$this->db->query($query, $values);
		}
		return true;
	}
}
?>