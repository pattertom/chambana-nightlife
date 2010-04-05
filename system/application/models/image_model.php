<?php
class Image_model extends Model {

    function image_model()
    {
        parent::Model();
		$this->load->database();
    }
	
	function get_image($id)
    {
		$query = $this->db->query("SELECT * FROM image WHERE image_id=".$id);
		return $query;
    }

}
?>