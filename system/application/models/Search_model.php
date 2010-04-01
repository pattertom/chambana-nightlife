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
		$query = $this->db->query("SELECT * FROM sells JOIN drink ON sells.drinkName = drink.name WHERE sells.drinkName LIKE '%".$name."%'");
		return $query;
	}
}
?>