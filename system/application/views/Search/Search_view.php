<?php
$this->load->helper('url');
$this->load->helper('form');

echo '<table><tr><th><b>Name</b></th><th><b>Description</b></th>';
foreach ($result->result() as $row)
{
	echo '<tr><td>';
	echo '<a href="'. site_url('event/view_event/'.$row->id).'">'.$row->name.'</a>';
	echo '</td><td>';
	echo $row->description;
	echo '</td></tr><tr><td>';
	echo '<a href="'. site_url('/barspecial').'">'.$row->barName.'</a>';
	echo '</td><td>';
	echo $row->description2;
	echo '</td></tr>';
}
	echo '</table>';
?>