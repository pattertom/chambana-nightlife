<?php
class Tag_model extends Model {

    function tag_model()
    {
        parent::Model();
		$this->load->database();
    }
    
    function get_all_events_with($tag) {
        $query = $this->db->query("SELECT * FROM tag, event WHERE tag.event_id = event.id AND tag.tag_name = '".$tag."' AND date >= NOW() GROUP BY name");
        return $query;
    }
    
    function get_all_tags_from($event) {
        $query = $this->db->query("SELECT * FROM tag WHERE event_id = ".$event);
        return $query;
    }
}
?>