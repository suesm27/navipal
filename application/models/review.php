<?php 
class Review extends CI_Model{
	function get_all_review()
	{
		return $this->db->query("select reviews.id, user_id, guide_id, users.name as user_name, guides.name as guide_name, reviews.review, reviews.created_at from reviews join users on reviews.user_id = users.id join guides on reviews.guide_id = guides.id")->result_array();
	}

	function get_review_by_id($id)
	{
		return $this->db->query("SELECT reviews.id, user_id, users.name as user_name, guide_id, guides.name as guide_name, reviews.review, reviews.created_at, reviews.star FROM reviews JOIN users on reviews.user_id = users.id JOIN guides on reviews.guide_id = guides.id WHERE reviews.id = ?", array($id))->row_array();
	}

	function get_reviews_by_guide_id($id)
	{
		return $this->db->query("SELECT reviews.id, user_id, users.name as user_name, guide_id, guides.name as guide_name, reviews.review, reviews.created_at, reviews.star FROM reviews JOIN users on reviews.user_id = users.id JOIN guides on reviews.guide_id = guides.id WHERE guide_id = ?", array($id))->result_array();
	}

	function add_review($user_id, $guide_id, $review, $star)
	{
		$query = "INSERT INTO reviews (user_id, guide_id, review, star, created_at) VALUES (?,?,?,?, NOW())";
		$values = array($user_id, $guide_id, $review, $star); 
		$this->db->query($query, $values);
		$review_id = $this->db->insert_id();
		return $review_id;

	} 
	function delete_review_by_id($id)
	{
		$query = "DELETE FROM reviews where id = ?";
		$values = array($id); 
		return $this->db->query($query, $values);
	} 
}
?>