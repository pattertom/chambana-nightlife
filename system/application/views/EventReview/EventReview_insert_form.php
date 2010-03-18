<?php
 
$this->load->helper('form');
 
echo form_open_multipart('eventreview/create');
 
echo 'User Name: ' . form_input('userName', '').'<br />';
echo 'Event Name: ' . form_input('eventName', '').'<br />';
$optionsApproved = array('0'=> '0', '1' => '1');
 
echo 'Approved By Admin? ' . form_dropdown('approvedByAdmin',$optionsApproved, '0').'<br />';
 
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
echo "Rating: ".form_dropdown('rating', $optionsRating, '0').'<br />';
 
echo form_textarea('reviewContent', 'Review Content goes here').'<br />';
 
echo 'Time Stamp: ' . form_input('ts', '').'<br />';
 
echo form_submit('eventreview_submit', 'Create Event Review!');
echo form_close();
 
?>