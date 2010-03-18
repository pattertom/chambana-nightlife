<?php
class Bar_model extends Model {

    function Bar_model()
    {
        parent::Model();
		$this->load->database();
    }
	
	function get_all_bars()
    {
        $query = $this->db->get('bar');
        return $query;
    }
	
	function create_bar($name,$rating, $description, $specials, $address)
	{
		$query = $this->db->query("INSERT INTO bar (name, rating, description, specials, address) VALUES
			('".$name."','".$rating."','".$description."','".$specials."','".$address."')");
	}
	
	function delete_bar($name)
	{
		$query = $this->db->query("DELETE FROM bar WHERE name='".$name."'");
	}
	
	function search_bar($name)
	{
		$query = $this->db->query("SELECT * FROM bar WHERE name LIKE '%".$name."%'");
		return $query;
	}
}
?>