<?php
class Drink_model extends Model {

    function Drink_model()
    {
        parent::Model();
		$this->load->database();
    }
	
	function get_all_drinks()
    {
        $query = $this->db->get('drink');
        return $query;
    }
	
	function create_drink($name, $description)
	{
	    if($name && $description) {
		    $query = $this->db->query("INSERT INTO drink (name, description) VALUES
			    ('".$name."', '".$description."')");
		}
	}
	
	function delete_drink($name)
	{
		$query = $this->db->query("DELETE FROM drink WHERE name='".$name."'");
	}
	
	function search_drink($name)
	{
		$query = $this->db->query("SELECT * FROM drink WHERE name LIKE '%".$name."%'");
		return $query;
	}
}
?>