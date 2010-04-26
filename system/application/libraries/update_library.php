<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Update_library {
    
    function update_event($name, $column, $data) {
        $CI =& get_instance();
        $CI->load->database();
    	$query = $CI->db->query("UPDATE event SET $column='".$data."' WHERE name='".$name."'");
    }
    
    function update_drink($name, $column, $data) {
        $CI =& get_instance();
        $CI->load->database();
    	$query = $CI->db->query("UPDATE drink SET $column='".$data."' WHERE name='".$name."'");
    }
    
    function update_bar($name, $column, $data) {
        $CI =& get_instance();
        $CI->load->database();
    	$query = $CI->db->query("UPDATE bar SET $column='".$data."' WHERE name='".$name."'");
    }
}
?>