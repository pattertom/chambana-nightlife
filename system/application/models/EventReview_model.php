<?php
class EventReview_model extends Model {

    function EventReview_model()
    {
        parent::Model();
		$this->load->database();
    }
	
	function create_event_review($name, $review, $rating)
	{
		$username = $this->session->userdata('username');
		
		$query = $this->db->query("SELECT id FROM event WHERE name='".$name."'");
		$eventid = $query->result('id');
		
		$query = $this->db->query("INSERT INTO eventreview 
		(userName, eventID, approvedByAdmin, rating, reviewContent, ts) 
		VALUES ('".$username."', '".$eventid."', 0, '".$rating."', '".$review."', NOW())");
	}
	
	function get_all_event_reviews()
    {
        $query = $this->db->query("SELECT * FROM eventreview WHERE approvedByAdmin=1");
        return $query;
    }
	
	function delete_event_reviews($name)
	{
		$query = $this->db->query("DELETE review FROM eventreview WHERE name='".$name."'");
	}
	
	function search_event_reviews($name)
	{
		$query = $this->db->query("SELECT * FROM eventreview WHERE name LIKE '%".$name."%'");
		return $query;
	}
}
?>