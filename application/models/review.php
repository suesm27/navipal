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

	function populate_reviews_table()
	{
		for($i=0; $i<100; $i++){
			$datestart = strtotime('2014-01-10');//you can change it to your timestamp;
			$dateend = strtotime('2015-09-03');//you can change it to your timestamp;
			$daystep = 86400;
			$datebetween = abs(($dateend - $datestart) / $daystep);
			$randomday = rand(0, $datebetween);

			$date = date("Y-m-d", $datestart + ($randomday * $daystep));
			$user_id = rand(22, 42);
			$guide_id = rand(1,10);
			$star = rand(1,5);
			$numWords = rand(10, 20);
			$reviews = array('You did a great job showing my family around, thanks!', 'I think your accent is very thick and hard to follow...', 'You are awesome! Thanks again!', 'You know nothing Jon Snow...', 'Where did you get your jacket from? It looks nice', 'Please don’t bring your kids with you on your tour next time.', 'Dude you need a haircut', 'Loved the energy! Great work, will definitely reach out to you again!', 'Your driving made me throw up..', 'I think you can afford to do some more research ahead of time instead of trying to Google from your phone on the fly.', 'Where did you buy your shoes by the way?? I forgot to ask', 'Hey…call me sometime?', 'It’s cool that you still live in your parent’s basement and have time to show people around, how do you manage that?', 'Wanna grab a drink sometime?', 'Yeah...if you could just wear pants next time..that would be great...', 'I forgot to tip you, where do you live?', 'What\'s the deal with you and that guy?', 'You have nice boobs. That is all.', 'You\'re my hero.');
			$review_key = array_rand($reviews, 1);
			$query = "insert into reviews (user_id, guide_id, review, created_at, star) values (?,?,?,?,?)";
			$values = array($user_id, $guide_id, $reviews[$review_key], $date, $star);
			$this->db->query($query, $values);
		}
		return true;
	}
	function getrandomstring($length) {
       global $template;
       settype($template, "string");
       $template = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
       settype($length, "integer");
       settype($rndstring, "string");
       settype($a, "integer");
       settype($b, "integer");
       for ($a = 0; $a <= $length; $a++) {
               $b = rand(0, strlen($template) - 1);
               $rndstring .= $template[$b];
       }
       return $rndstring; 
	}
}
?>