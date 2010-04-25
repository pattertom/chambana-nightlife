<?php
$this->load->helper('form');
echo form_open_multipart('bar/create');
echo 'Bar Name: ' . form_input('name', '').'<br />';
echo 'Bar Picture: ' . form_upload('image', '').'<br />';
echo form_textarea('specials', 'Specials go here').'<br />';
echo form_textarea('description', 'Description goes here').'<br />';
echo form_textarea('address', 'Address goes here').'<br />';
echo form_textarea('weburl', 'Web address goes here, Enter like http://www.yoursitehere.com').'<br />';
echo form_submit('bar_submit', 'Create Bar!');
echo form_close();
?>