<?php
class Drink_model extends Model {

    function Drink_model()
    {
        parent::Model();
		$this->load->database();
        $this->load->library('update_library');
    }
	
	function get_all_drinks()
    {
        $query = $this->db->get('drink');
        return $query;
    }
    
    function get_drink($name)
    {
		$query = $this->db->query("SELECT * FROM drink WHERE name = '".$name."'");
		return $query;
    }
    
    function get_all_drinks_with_ratings()
	{
		$query = $this->db->query("
			SELECT drink.name, C.average, drink.image_id
			FROM drink LEFT JOIN 
				(SELECT drink_review.drink_name, AVG(drink_review.rating) as average
				FROM drink_review
				WHERE approved_by_admin = 1
				GROUP BY drink_review.drink_name) C
			ON drink.name = C.drink_name
			GROUP BY drink.name
			ORDER BY C.average DESC
		");
		return $query;
	}
	
	function get_drinks_also_liked($name)
	{
		$query = $this->db->query("
			SELECT T2.drink_name, COUNT(T2.drink_name) as count
			FROM drink_review T1, drink_review T2
			WHERE T1.rating >= 7 AND T2.rating >= 7 AND T1.user_name = T2.user_name AND T1.drink_name = '".$name."' AND T2.drink_name != '".$name."'
			GROUP BY T2.drink_name
			ORDER BY count DESC LIMIT 0,5;
		");
		return $query;
	}
	
	function create_drink($name, $description)
	{
	    $image_type = $_FILES['image']['type'];
	    $image_data = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        list($image_width, $image_height) = getimagesize($_FILES['image']['tmp_name']);
	    $image_size = $_FILES['image']['size'];
	    $image_ctgy = 'drink';
	    $image_name = $name;
	    
		$query = $this->db->query("INSERT INTO image (image_type, image, image_height, image_width, image_size, image_ctgy, image_name) VALUES
			('".$image_type."','".$image_data."','".$image_height."','".$image_width."','".$image_size."','".$image_ctgy."','".$image_name."')");
		
		$query = $this->db->query("SELECT * FROM image ORDER BY image_id DESC LIMIT 0,1");
		$row = $query->row();
		$image_id = $row->image_id;
	    
	    if($name && $description) {
		    $query = $this->db->query("INSERT INTO drink (name, image_id, description) VALUES
			    ('".$name."', '".$image_id."', '".$description."')");
		}
	}
	
	function edit_drink($name, $description)
	{
        if ($_FILES['image']['tmp_name']) {
    	    $image_type = $_FILES['image']['type'];
    	    $image_data = addslashes(file_get_contents($_FILES['image']['tmp_name']));
            list($image_width, $image_height) = getimagesize($_FILES['image']['tmp_name']);
    	    $image_size = $_FILES['image']['size'];
    	    $image_ctgy = 'drink';
    	    $image_name = $name;
            
    	    $query = $this->db->query("SELECT image_id FROM drink WHERE name='".$name."'");
    	    $image_id = $query->row()->image_id;
    	    $query = $this->db->query("UPDATE image SET image_type='".$image_type."', image='".$image_data."', image_height='".$image_height."', image_width='".$image_width."', image_size='".$image_size."', image_ctgy='".$image_ctgy."' WHERE image_id='".$image_id."'");
		}
		
	    if ($description)
		    $this->update_library->update_drink($name, 'description', $description);
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