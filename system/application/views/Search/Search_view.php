<?php
$this->load->helper('url');
$this->load->helper('form');

foreach ($result->result() as $row)
{
	echo '<tr><td>';
	if($row->name)
		echo $row->name;
	else 
		echo $row->barName;
	echo '</td><td>';
	echo $row->description;
	echo '</tr>';
}
?>