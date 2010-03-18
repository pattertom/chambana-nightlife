<?php
$this->load->helper('form');
echo form_open_multipart('bar/create');
echo 'Bar Name: ' . form_input('name', '').'<br />';
$options = array(
           '0' => '0',
           '1' => '1',
           '2' => '2',
           '3' => '3',
           '4' => '4',
           '5' => '5',
           '6' => '6',
           '7' => '7',
           '8' => '8',
           '9' => '9',
           '10' => '10'
           );
echo "Rating: ".form_dropdown('rating', $options, '5').'<br />';
echo form_textarea('specials', 'Specials go here').'<br />';
echo form_textarea('description', 'Description goes here').'<br />';
echo form_textarea('address', 'Address goes here').'<br />';
echo form_submit('bar_submit', 'Create Bar!');
echo form_close();
?>