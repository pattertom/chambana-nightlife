<?php
class Search_model extends Model {

    function Search_model()
    {
        parent::Model();
		$this->load->database();
    }
	
	function get_all_results()
    {
        $query = $this->db->get('');
        return $query;
    }
	
	function search_all($name)
	{
		$query = $this->db->query("SELECT event.id, event.name, event.description, barspecial.id, barspecial.barName, barspecial.description description2 FROM event, barspecial WHERE event.name LIKE '%".$name."%' or barspecial.description LIKE '%".$name."%'");
		return $query;
	}
}
?>