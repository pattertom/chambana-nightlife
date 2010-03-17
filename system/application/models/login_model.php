<?php
class Login_model extends Model {

    function login_model()
    {
        parent::Model();
		$this->load->database();
        $this->load->helper('security');
    }
	
	function validate_login($username, $password)
	{
        $result = $this->db->query("SELECT * FROM user WHERE username='$username'");
        
        if (!$result->row()) {
	        $this->session->set_flashdata('message', '<div id="message">The username that you entered does not exist in our database.</div>');
	        redirect('login/index');
	    }
        $row = $result->row();
        $admin = $row->level;
        
        $salt = substr($row->hash, 0, 8);
        $hash = dohash($password, 'md5');
        
	    if ($row->hash==($salt.$hash))
	    {
	        $data = array(
                   'username'  => $username,
                   'logged_in'  => TRUE,
                   'admin'  => $admin
                );

                $this->session->set_userdata($data);

                redirect('dashboard/index');
	    }
	    else {
	        $this->session->set_flashdata('message', '<div id="message">Your password is incorrect, please try again.</div>');
	        redirect('login/index');
	    }
	}
}
?>