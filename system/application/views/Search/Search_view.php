<?php
$this->load->helper('url');
$this->load->helper('form');

echo '<table><tr><th><b>Drink Name</b></th><th><b>Bar Name</b></th><th><b>Description</b></th></tr>';

foreach ($result->result() as $row)
{
	echo '<tr><td>';
	echo $row->name;
	echo '</td><td>';
	echo $row->barName;
	echo '</td><td>';
	echo $row->description;
	echo '</tr>';
}
echo '</table>';
?>