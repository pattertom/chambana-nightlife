<?php
class User_model extends Model {

    function user_model()
    {
        parent::Model();
		$this->load->database();
        $this->load->helper('security');
    }
	
	function get_all_users()
    {
        $query = $this->db->get('user');
        return $query;
    }
	
	function create_drink($username, $password, $password_confirm, $email)
	{
	    if ($username && $password && $password == $password_confirm && $email) {
	        $salt = substr(str_pad(dechex(mt_rand()), 8, '0', STR_PAD_LEFT), -8);
            $hash = $salt.dohash($password, 'md5');
	        
		    $query = $this->db->query("INSERT INTO user (username, hash, email) VALUES
			    ('".$username."', '".$hash."', '".$email."')");
		}
	}
	
	function promote_user($username)
	{
	    if ($this->session->userdata('admin'))
        	$query = $this->db->query("UPDATE user SET level=1 WHERE username='".$username."'");
        else {
            $this->session->set_flashdata('message', '<div id="message">You must be an admin to do this.</div>');
            redirect('user/index');
        }
	}
	
	function delete_user($username)
	{
	    if ($this->session->userdata('admin'))
    		$query = $this->db->query("DELETE FROM user WHERE username='".$username."'");
        else {
            $this->session->set_flashdata('message', '<div id="message">You must be an admin to do this.</div>');
            redirect('user/index');
        }
	}
	
	function search_user($username)
	{
		$query = $this->db->query("SELECT * FROM user WHERE username LIKE '%".$username."%'");
		return $query;
	}
}
?>