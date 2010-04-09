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
    
    function get_drink($name)
    {
		$query = $this->db->query("SELECT * FROM drink WHERE name = '".$name."'");
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