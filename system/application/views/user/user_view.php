<?php
$this->load->helper('url');
$this->load->helper('form');
$admin = $this->session->userdata('admin');

echo form_open_multipart('user/search');
$js = 'onClick="clickIntoSearchBox()"';
echo 'Search Users: ' . form_input('username', 'Username', $js);
echo form_submit('user_search', 'Search');
echo form_close();

echo $this->session->flashdata('message');

echo '<table border="1"><tr><td><b>Username</b></td><td><b>Email</b></td></tr>';
foreach ($result->result() as $row)
{
	echo '<tr><td>';
	if ($admin)
    	echo $row->username . ' <a href="' . site_url('user/delete/'.$row->username) . '" class="black">[DELETE]</a> '.
    	'<a href="' . site_url('user/promote/'.$row->username) . '" class="black">[PROMOTE]</a>';
    else
        echo $row->username;
	echo '</td><td>';
	echo $row->email;
	echo '</tr>';
}
echo '</table>';
?>
<br /><br />
<a href="<?php echo site_url('user/insert'); ?>" class="black"> Signup </a>
