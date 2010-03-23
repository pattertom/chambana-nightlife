<?php

$this->load->helper('form');

echo form_open_multipart('barspecial/create');

echo 'Bar Name: ' . form_input('barName', '').'<br />';
$optionsWeekly = array('0'=> '0', '1' => '1');

echo 'Weekly Special? ' . form_dropdown('isWeekly',$optionsWeekly, '0').'<br />';
$optionsDaily = array('Sunday'=> 'Sunday', 
						'Monday'=> 'Monday', 
						'Tuesday' => 'Tuesday', 
						'Wednesday'=> 'Wednesday',
						'Thursday'=> 'Thursday',
						'Friday'=> 'Friday',
						'Saturday'=> 'Saturday',);
echo 'Day of Week (if weekly): ' . form_dropdown('weeklyDay',$optionsDaily, '0').'<br />';
echo form_textarea('description', 'Special Contents go here').'<br />';

echo 'Date of Special (Leave blank if weekly): ' . form_input('ts', '').'<br />';

echo form_submit('barspecial_submit', 'Create Bar Special!');
echo form_close();

?>


