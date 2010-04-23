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

	function get_scale_image_string($id,$mw,$mh) { // path max_width max_height
		$query = $this->db->query("SELECT image_width, image_height FROM image WHERE image_id=".$id);
		$sizes = $query->row();
		$w = $sizes->image_width;
		$h = $sizes->image_height;
		
		foreach(array('w','h') as $v) { $m = "m{$v}";
			if(${$v} > ${$m} && ${$m}) { $o = ($v == 'w') ? 'h' : 'w';
			$r = ${$m} / ${$v}; ${$v} = ${$m}; ${$o} = ceil(${$o} * $r); } }
		return '<img src="'.site_url('/image/display/'. $id) . '" height="'.$h.'" width="'.$w.'" />';
	}
}
?>