<?php

$this->load->helper('form');

echo form_open_multipart('admin/edit_event');
echo 'Event Name: ' . form_input('name', '').'<br />';
echo 'Event Picture: ' . form_upload('image', '').'<br />';
echo 'Event Price: ' . form_input('price', '').'<br />';
echo 'Event Type: ' . form_input('type', '').'<br />';
echo 'Event Tags:' . form_input('tags', '').'<br />(separated by comma)<br /><br />';
echo form_textarea('description', 'Description goes here').'<br />';
echo 'Event Date: ' . form_input('date', '').'<br /><br />';
echo form_textarea('address', 'Address goes here').'<br />';
echo form_submit('event_submit', 'Edit Event!');
echo form_close();


echo "<hr>";
// Drink

$this->load->helper('form');
echo form_open_multipart('admin/edit_drink');
echo 'Drink Name ' . form_input('name', '').'<br />';
echo 'Drink Picture: ' . form_upload('image', '').'<br />';
echo form_textarea('description', 'Description goes here').'<br />';
echo form_submit('drink_submit', 'Edit Drink!');
echo form_close();

echo "<hr>";
// Bar

$this->load->helper('form');
echo form_open_multipart('admin/edit_bar');
echo 'Bar Name: ' . form_input('name', '').'<br />';
echo 'Bar Picture: ' . form_upload('image', '').'<br />';
echo form_textarea('description', 'Description goes here').'<br />';
echo form_textarea('address', 'Address goes here').'<br />';
echo form_textarea('weburl', 'Web address goes here, Enter like http://www.yoursitehere.com').'<br />';
echo form_submit('bar_submit', 'Edit Bar!');
echo form_close();


?>