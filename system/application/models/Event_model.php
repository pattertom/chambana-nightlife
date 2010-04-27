<?php
class Event_model extends Model {
    
	function Event_model()
    {
        parent::Model();
        $this->load->database();
        $this->load->library('update_library');
    }
	
    function get_all_events()
    {
        $query = $this->db->query('SELECT * FROM event ORDER BY date');
        return $query;
    }
	
	function get_upcoming_events()
    {
        $query = $this->db->query('SELECT * FROM event WHERE date > NOW() ORDER BY date LIMIT 0,10');
        return $query;
    }
    
    function get_upcoming_events_with_tags()
    {
        $query = $this->db->query('SELECT id, name, date, tag_name, image_id
        FROM event LEFT JOIN 
            (SELECT tag.event_id, tag.tag_name
             FROM tag, event
             WHERE event_id = id) C
         ON id = C.event_id');
         return $query;
    }
	 
    function get_all_events_with_ratings()
	{
		$query = $this->db->query("
			SELECT event.id, event.name, event.address, C.average, event.image_id
			FROM event LEFT JOIN 
				(SELECT eventreview.eventID, AVG(eventreview.rating) as average
				FROM eventreview
				WHERE approvedByAdmin = 1
				GROUP BY eventreview.eventID) C
			ON event.id = C.eventID
			GROUP BY event.id
			ORDER BY C.average DESC
		");
		return $query;
	}
	
	function get_event($id)
    {
		$query = $this->db->query("SELECT * FROM event WHERE id = ".$id);
		return $query;
    }
	
    function create_event($name, $price, $type, $description, $date, $address, $tags)
	{
	    $image_type = $_FILES['image']['type'];
	    $image_data = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        list($image_width, $image_height) = getimagesize($_FILES['image']['tmp_name']);
	    $image_size = $_FILES['image']['size'];
	    $image_ctgy = 'event';
	    $image_name = $name;
	    
	    // insert image
	    $query = $this->db->query("INSERT INTO image (image_type, image, image_height, image_width, image_size, image_ctgy, image_name) VALUES
			('".$image_type."','".$image_data."','".$image_height."','".$image_width."','".$image_size."','".$image_ctgy."','".$image_name."')");
		
		$query = $this->db->query("SELECT * FROM image ORDER BY image_id DESC LIMIT 0,1");
		$row = $query->row();
		$image_id = $row->image_id;
	    
	    // insert other columns
    	$query = $this->db->query("INSERT INTO event (name, image_id, price, type, description, date, address) 
                VALUES ('".$name."', '".$image_id."', '".$price."', '".$type."', '".$description."', '".$date."'
                 , '".$address."')");
                 
    	$query = $this->db->query("SELECT * FROM event ORDER BY id DESC LIMIT 0,1");
 		$row = $query->row();
 		$event_id = $row->id;
                 
        // insert tags
 	    foreach($tags as $tag) {
 	        $query = $this->db->query("INSERT INTO tag (event_id, tag_name) 
                     VALUES ('".$event_id."', '".$tag."')");
 	    }
	}
	
	function edit_event($name, $price, $type, $description, $date, $address, $tags)
	{
        if ($_FILES['image']['tmp_name']) {
    	    $image_type = $_FILES['image']['type'];
    	    $image_data = addslashes(file_get_contents($_FILES['image']['tmp_name']));
            list($image_width, $image_height) = getimagesize($_FILES['image']['tmp_name']);
    	    $image_size = $_FILES['image']['size'];
    	    $image_ctgy = 'event';
    	    $image_name = $name;
    	    
    	    $query = $this->db->query("SELECT image_id FROM event WHERE name='".$name."'");
    	    $image_id = $query->row()->image_id;
    	    $query = $this->db->query("UPDATE image SET image_type='".$image_type."', image='".$image_data."', image_height='".$image_height."', image_width='".$image_width."', image_size='".$image_size."', image_ctgy='".$image_ctgy."' WHERE image_id='".$image_id."'");
		}
		
		if ($price)
		    $this->update_library->update_event($name, 'price', $price);
		if ($type)
		    $this->update_library->update_event($name, 'type', $type);
		if ($description)
		    $this->update_library->update_event($name, 'description', $description);
		if ($date)
		    $this->update_library->update_event($name, 'date', $date);
		if ($address)
		    $this->update_library->update_event($name, 'address', $address);
		
		if ($tags) {
		    $query = $this->db->query("SELECT * FROM event WHERE name='".$name."'");
     		$row = $query->row();
     		$event_id = $row->id;

            // insert tags
     	    foreach($tags as $tag) {
     	        $query = $this->db->query("INSERT INTO tag (event_id, tag_name) 
                         VALUES ('".$event_id."', '".$tag."')");
     	    }
		}
	}
	
	function delete_event($id)
	{
		$query = $this->db->query("DELETE FROM event WHERE id='".$id."'");
	}
	
	function search_event($name)
	{
		$query = $this->db->query("SELECT * FROM event WHERE name LIKE '%".$name."%'");
		return $query;
	}
}
?>