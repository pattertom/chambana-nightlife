<?php
$this->load->helper('form');
echo form_open_multipart('user/create');
echo 'Username ' . form_input('username', '').'<br />';
echo 'Password ' . form_password('password', '').'<br />';
echo 'Confirm Password ' . form_password('password_confirm', '').'<br />';
echo 'Email ' . form_input('email', '').'<br />';
echo form_submit('user_submit', 'Signup!');
echo form_close();
?>