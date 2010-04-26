<?php
class Drink_review_model extends Model {
    
	function drink_review_model()
    {
        parent::Model();
        $this->load->database();
    }
	
    function get_all_drink_reviews()
    {
        $query = $this->db->get('drink_review');
        return $query;
    }
	
    function create_drink_review($user_name, $drink_name, $approved_by_admin, $rating, $review_content, $ts)
	{
	   		$query = $this->db->query("INSERT INTO drink_review (user_name, drink_name, approved_by_admin
                                                            , rating, review_content, ts) 
                        VALUES
			             ('".$user_name."','".$drink_name."','".$approved_by_admin."',
                         '".$rating."','".$review_content."'
                         ,'".$ts."')");
	}
	
	function create_drink_review_simple($user_name, $drink_name, $rating, $review_content)
	{
	   		$query = $this->db->query("INSERT INTO drink_review (user_name, drink_name, rating, review_content) 
                        VALUES ('".$user_name."','".$drink_name."','".$rating."','".$review_content."')");
	}
	
	function delete_drink_review($id)
	{
	   		$query = $this->db->query("DELETE FROM drink_review WHERE id='".$id."'");
	}
	
	function approve_drink_review($id)
	{
	   		$query = $this->db->query("UPDATE drink_review SET approved_by_admin = 1 WHERE id='".$id."'");
	}
	
	function search_drink_review($name)
	{
		$query = $this->db->query("SELECT * FROM drink_review WHERE name LIKE '%".$name."%'");
		return $query;
	}   
	
	function get_non_approved_reviews()
	{
		$query = $this->db->query("SELECT * FROM drink_review WHERE approved_by_admin = 0");
		return $query;
	} 

	function get_reviews_for_drink($name)
	{
		$query = $this->db->query("SELECT * FROM drink_review WHERE drink_name = '".$name."' AND approved_by_admin = 1 ORDER BY ts DESC LIMIT 0,10");
		return $query;
	}
	
	function get_average_for_drink($name)
	{
		$query = $this->db->query("SELECT AVG(rating) AS average FROM drink_review WHERE drink_name = '".$name."' AND approved_by_admin = 1");
		return $query;
	}
	
	function get_average_for_all_drinks()
	{
		$query = $this->db->query("
			SELECT drink_name, AVG(rating) AS average, FROM drink_review WHERE approved_by_admin = 1");
		return $query;
	}
	
	function get_average_drink_pairs()
	{
		$query = $this->db->query("
			SELECT drink_name, AVG(rating)
			FROM drink_review
			WHERE approved_by_admin = 1
			GROUP BY drink_name");
		return $query;
	}
}
?>