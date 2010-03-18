<?php

$this->load->helper('form');

echo form_open_multipart('event/create');


echo 'Event Name: ' . form_input('name', '').'<br />';
echo 'Event Price: ' . form_input('price', '').'<br />';
echo 'Event Type: ' . form_input('type', '').'<br />';
echo form_textarea('description', 'Description goes here').'<br />';
echo 'Event Date: ' . form_input('date', '').'<br />';
echo form_textarea('address', 'Address goes here').'<br />';

echo form_submit('event_submit', 'Create Event!');
echo form_close();

?>