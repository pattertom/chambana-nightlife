<?php
class EventReview_model extends Model {

    function EventReview_model()
    {
        parent::Model();
		$this->load->database();
    }

	function get_all_event_reviews()
    {
        if ($this->session->userdata('admin') == 1)
            $query = $this->db->query("SELECT * FROM eventreview");
        else
            $query = $this->db->query("SELECT * FROM eventreview WHERE approvedByAdmin=1");
            
        return $query;
    }
	
	function create_event_review($username, $event_id, $rating, $reviewContent)
	{
		$username = $username;
		
		$query = $this->db->query("INSERT INTO eventreview 
		(userName, eventID, approvedByAdmin, rating, reviewContent, ts) 
		VALUES ('".$username."', '".$event_id."', 0, '".$rating."', '".$reviewContent."', NOW())");
	}
	
	function delete_event_reviews($id)
	{
		$query = $this->db->query("DELETE FROM EventReview WHERE id=".$id);
	}
	
	function approve_event_review($id)
	{
	   		$query = $this->db->query("UPDATE eventreview SET approvedByAdmin = 1 WHERE id='".$id."'");
	}
	
	function search_event_reviews($id)
	{
		$query = $this->db->query("SELECT * FROM eventreview WHERE id=".$id);
		return $query;
	}
	
	function get_reviews_for_event($id)
	{
		$query = $this->db->query("SELECT * FROM eventreview WHERE eventID = ".$id." AND approvedByAdmin = 1 ORDER BY ts DESC LIMIT 0,10");
		return $query;
	}
}
?>