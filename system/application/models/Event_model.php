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
	
    function create_event($name, $price, $type, $description, $date, $address)
	{
	   		$query = $this->db->query("INSERT INTO event (name, price, type, description, date, address) 
                        VALUES ('".$name."', '".$price."', '".$type."', '".$description."', '".$date."'
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