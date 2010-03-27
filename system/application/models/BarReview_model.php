<?php

class BarReview_model extends Model {
    
	function BarReview_model()
    {
        parent::Model();
        $this->load->database();
    }
	
    function get_all_barreviews()
    {
        $query = $this->db->get('barreview');
        return $query;
    }
	
    function create_barreview($userName, $barName, $approvedByAdmin, $rating, $reviewContent, $ts)
	{
	   		$query = $this->db->query("INSERT INTO barreview (userName, barName, approvedByAdmin
                                                            , rating, reviewContent, ts) 
                        VALUES
			             ('".$userName."','".$barName."','".$approvedByAdmin."',
                         '".$rating."','".$reviewContent."'
                         ,'".$ts."')");
	}
	
	function create_barreview_simple($userName, $barName, $rating, $reviewContent)
	{
	   		$query = $this->db->query("INSERT INTO barreview (userName, barName, rating, reviewContent) 
                        VALUES ('".$userName."','".$barName."','".$rating."','".$reviewContent."')");
	}
	
	function delete_barreview($id)
	{
	   		$query = $this->db->query("DELETE FROM barreview WHERE id='".$id."'");
	}
	
	function approve_barreview($id)
	{
	   		$query = $this->db->query("UPDATE barreview SET approvedByAdmin = 1 WHERE id='".$id."'");
	}
	
	function search_barreview($name)
	{
		$query = $this->db->query("SELECT * FROM barreview WHERE name LIKE '%".$name."%'");
		return $query;
	}   

	function get_reviews_for_bar($name)
	{
		$query = $this->db->query("SELECT * FROM barreview WHERE barName = '".$name."' AND approvedByAdmin = 1 ORDER BY ts DESC LIMIT 0,10");
		return $query;
	}	
}
?>