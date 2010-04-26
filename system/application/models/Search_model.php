<?php
class Search_model extends Model {

    function Search_model()
    {
        parent::Model();
		$this->load->database();
    }

	function search_bars($search_term)
	{
		$query = $this->db->query("SELECT * FROM bar WHERE name LIKE '%".$search_term."%' OR description LIKE '%".$search_term."%'");
		return $query;
	}
	
	function search_events($search_term)
	{
		$query = $this->db->query("SELECT * FROM event WHERE name LIKE '%".$search_term."%' OR description LIKE '%".$search_term."%'");
		return $query;
	}
	
	function search_drinks($search_term)
	{
		$query = $this->db->query("SELECT * FROM drink WHERE name LIKE '%".$search_term."%' OR description LIKE '%".$search_term."%'");
		return $query;
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
	
	function getSearchResults ($name)
	{
	    $this->load->database();
        $queryBar = $this->db->query("SELECT bar.name FROM bar WHERE name LIKE '%".$name."%'");
		$queryEvent = $this->db->query("SELECT event.name FROM event WHERE name LIKE '%".$name."%'");
		$queryDrink = $this->db->query("SELECT drink.name FROM drink WHERE name LIKE '%".$name."%'");

        $output = '<ul>';
		foreach ($queryBar->result() as $function_info) 
        {
		    $output .= '<li>' . $function_info->name . '</li>';
		}
		foreach ($queryEvent->result() as $function_info) 
		{
		    $output .= '<li>' . $function_info->name . '</li>';
		}
		foreach ($queryDrink->result() as $function_info) 
        {
		    $output .= '<li>' . $function_info->name . '</li>';
		}
		
		$output .= '</ul>';
		return $output;    
	}
}
?>