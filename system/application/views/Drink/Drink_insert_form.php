<?php
$this->load->helper('form');
echo form_open_multipart('drink/create');
echo 'Drink Name ' . form_input('name', '').'<br />';
echo 'Drink Picture: ' . form_upload('image', '').'<br />';
echo form_textarea('description', 'Description goes here').'<br />';
echo form_submit('drink_submit', 'Create Drink!');
echo form_close();
?>