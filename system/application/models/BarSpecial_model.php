<?php

class BarSpecial_model extends Model {
    
	function BarSpecial_model()
    {
        parent::Model();
        $this->load->database();
    }
	
    function get_all_barspecials()
    {
        $query = $this->db->get('barspecial');
        return $query;
    }
	
	function get_todays_specials()
	{
		$query = $this->db->query("SELECT * FROM barspecial WHERE isWeekly = 1 AND weeklyDay LIKE  '%".date("l")."%'");
		return $query;
	}
	
    function create_barspecial($barName, $isWeekly, $weeklyDay, $description, $dateSpecial)
	{
		if($dateSpecial != ""){
	   		$query = $this->db->query("INSERT INTO barspecial (barName, isWeekly,
                                        weeklyDay, description, dateSpecial) 
                        VALUES
			             ('".$barName."','".$isWeekly."','".$weeklyDay."',
                         '".$description."','".$dateSpecial."')");
		}
		else {
	   		$query = $this->db->query("INSERT INTO barspecial (barName, isWeekly, 
                                        weeklyDay, description) 
                        VALUES
			             ('".$barName."','".$isWeekly."','".$weeklyDay."',
                         '".$description."')");
		}
	}
	
	function delete_barspecial($id)
	{
	   		$query = $this->db->query("DELETE FROM barspecial WHERE id='".$id."'");
	}
	
	function search_barspecial_byName($name)
	{
		$query = $this->db->query("SELECT * FROM barspecial WHERE barName LIKE '%".$name."%'");
		return $query;
	}

    
}



?>