<?php
class Event_model extends Model {
    
	function Event_model()
    {
        parent::Model();
        $this->load->database();
    }
	
    function get_all_events()
    {
        $query = $this->db->get('event');
        return $query;
    }
	
	function get_event($id)
    {
		$query = $this->db->query("SELECT * FROM event WHERE id = ".$id);
		return $query;
    }
	
    function create_event($name, $price, $type, $description, $date, $address)
	{
	    $image_type = $_FILES['image']['type'];
	    $image_data = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        list($image_width, $image_height) = getimagesize($_FILES['image']['tmp_name']);
	    $image_size = $_FILES['image']['size'];
	    $image_ctgy = 'event';
	    $image_name = $name;
	    
	    $query = $this->db->query("INSERT INTO image (image_type, image, image_height, image_width, image_size, image_ctgy, image_name) VALUES
			('".$image_type."','".$image_data."','".$image_height."','".$image_width."','".$image_size."','".$image_ctgy."','".$image_name."')");
		
		$query = $this->db->query("SELECT * FROM image ORDER BY image_id DESC LIMIT 0,1");
		$row = $query->row();
		$image_id = $row->image_id;
	    
    	$query = $this->db->query("INSERT INTO event (name, image_id, price, type, description, date, address) 
                VALUES ('".$name."', '".$image_id."', '".$price."', '".$type."', '".$description."', '".$date."'
                 , '".$address."')");
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