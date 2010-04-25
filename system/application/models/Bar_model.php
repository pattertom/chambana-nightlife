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
	
	function get_all_bars_with_ratings()
	{
		$query = $this->db->query("
			SELECT bar.name, bar.address, C.average, bar.image_id
			FROM bar LEFT JOIN 
				(SELECT barreview.barName, AVG(barreview.rating) as average
				FROM barreview
				WHERE approvedByAdmin = 1
				GROUP BY barreview.barName) C
			ON bar.name = C.barName
			GROUP BY bar.name
			ORDER BY C.average DESC
		");
		return $query;
	}
	
	/**
	 * Gets the bars that are also liked by users who liked the specified bar
	 *
	 * Returns an the query result
	 *
	 * @param string name
	 * name of the bar to query
	 */	
	function get_bars_also_liked($name)
	{
		$query = $this->db->query("
			SELECT T2.barName, COUNT(T2.barName) as count
			FROM barreview T1, barreview T2
			WHERE T1.rating >= 7 AND T2.rating >= 7 AND T1.userName = T2.userName AND T1.barName = '".$name."' AND T2.barName != '".$name."'
			GROUP BY T2.barName
			ORDER BY count DESC LIMIT 0,5;
		");
		return $query;
	}
	
	function get_bar($name)
    {
        
		$query = $this->db->query("SELECT * FROM bar WHERE name = '".$name."'");
		return $query;
    }
	
	function getSearchResults ($name)
	{
	   
	    $this->load->database();
        $query = $this->db->query("SELECT name FROM bar WHERE name LIKE '%".$name."%'");
        
        //if($query->numRows()>0)
        //{
            	$output = '<ul>';
			    foreach ($query->result() as $function_info) 
                {
		          $output .= '<li>' . $function_info->name . '</li>';
				}
		
			$output .= '</ul>';
			return $output;
        //}
        			//else {
        			 //return '<p>Sorry, no results returned.</p>';
                //}
        
		
	}
    
	function create_bar($name, $description, $specials, $address, $weburl)
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

		$query = $this->db->query("INSERT INTO bar (name, image_id, description, address, weburl) VALUES
			('".$name."','".$image_id."','".$description."','".$address."','".$weburl."')");
	}
	
	function edit_bar($name, $description, $specials, $address, $weburl)
	{
	    $image_type = $_FILES['image']['type'];
	    $image_data = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        list($image_width, $image_height) = getimagesize($_FILES['image']['tmp_name']);
	    $image_size = $_FILES['image']['size'];
	    $image_ctgy = 'bar';
	    $image_name = $name;
	    
	    $query = $this->db->query("UPDATE image SET image_type='".$image_type."', image='".$image_data."', image_height='".$image_height."', image_width='".$image_width."', image_size='".$image_size."', image_ctgy='".$image_ctgy."' WHERE image_name='".$image_name."'");
		
		$query = $this->db->query("SELECT * FROM image ORDER BY image_id DESC LIMIT 0,1");
		$row = $query->row();
		$image_id = $row->image_id;
	    
    	$query = $this->db->query("UPDATE bar SET image_id='".$image_id."', description='".$description."', address='".$address."', weburl='".$weburl."' WHERE name='".$name."'"); 
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