<?php

$this->load->helper('form');

echo form_open_multipart('drink_review/create');

echo 'User Name: ' . form_input('user_name', '').'<br />';
echo 'Drink Name: ' . form_input('drink_name', '').'<br />';
$options_approved = array('0'=> '0', '1' => '1');

echo 'Approved By Admin? ' . form_dropdown('approved_by_admin',$options_approved, '0').'<br />';

$optionsRating = array(
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
echo "Rating: ".form_dropdown('rating', $options_rating, '0').'<br />';

echo form_textarea('review_content', 'Review Content goes here').'<br />';

echo 'Time Stamp: ' . form_input('ts', '').'<br />';

echo form_submit('drink_review_submit', 'Create Drink Review!');
echo form_close();

?>


