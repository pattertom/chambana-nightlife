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
	
	function get_bar($name)
    {
		$query = $this->db->query("SELECT * FROM bar WHERE name = '".$name."'");
		return $query;
    }
	
	function create_bar($name,$rating, $description, $specials, $address)
	{
	    $image_type = $_FILES['image']['type'];
	    $image_data = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        list($image_width, $image_height) = getimagesize($_FILES['image']['tmp_name']);
	    $image_size = $_FILES['image']['size'];
	    $image_ctgy = 'bar';
	    $image_name = $name;
	    
		$query = $this->db->query("INSERT INTO image (image_type, image, image_height, image_width, image_size, image_ctgy, image_name) VALUES
			('".$image_type."','".$image_data."','".$image_height."','".$image_width."','".$image_size."','".$image_ctgy."','".$image_name."')");
		
		$query = $this->db->query("SELECT * FROM image ORDER BY image_id DESC LIMIT 0,1");
		$row = $query->row();
		$image_id = $row->image_id;

		$query = $this->db->query("INSERT INTO bar (name, image_id, rating, description, address) VALUES
			('".$name."','".$image_id."','".$rating."','".$description."','".$address."')");
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