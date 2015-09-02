<?php 
class Availability extends CI_Model{
	function populate_availability_table()
	{
		for($i=0; $i<1000; $i++){
			$datestart = strtotime('2015-09-10');//you can change it to your timestamp;
			$dateend = strtotime('2016-12-31');//you can change it to your timestamp;
			$daystep = 86400;
			$datebetween = abs(($dateend - $datestart) / $daystep);
			$randomday = rand(0, $datebetween);

			$date = date("Y-m-d", $datestart + ($randomday * $daystep));
			$guide_id = rand(1,10);
			$query = "insert into availability (guide_id, date) values (?,?)";
			$values = array($guide_id, $date);
			$this->db->query($query, $values);
		}
		return true;
	}
}
?>