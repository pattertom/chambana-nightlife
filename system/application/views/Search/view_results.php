<?php
$this->load->helper('url');
$this->load->helper('form');

$noResults = TRUE;
$count = 0;
echo '<h1 class="underlined">Search Results</h1>';
echo '<div style="border:1px solid #000000; width:50%;">';
if($bar->num_rows() > 0)
{
	$noResults = FALSE;
	foreach ($bar->result() as $row)
	{	
		if($count % 2 == 0) echo '<div class="search_result_even">';
		else echo '<div class="search_result_odd">';
		echo 'Bar: <a href="'. site_url('bar/viewBar/'.$row->name).'" class="black">'.$row->name.'</a> <br />';
		echo '</div>';
		$count++;
	}
}

if($event->num_rows() > 0)
{
	$noResults = FALSE;
	foreach ($event->result() as $row)
	{
		if($count % 2 == 0) echo '<div class="search_result_even">';
		else echo '<div class="search_result_odd">';
		echo 'Event: <a href="'. site_url('event/view_event/'.$row->id).'" class="black">'.$row->name.'</a> <br />';
		echo '</div>';
		$count++;
	}
}

if($drink->num_rows() > 0)
{
	$noResults = FALSE;
	foreach ($drink->result() as $row)
	{
		if($count % 2 == 0) echo '<div class="search_result_even">';
		else echo '<div class="search_result_odd">';
		echo 'Drink: <a href="'. site_url('drink/viewDrink/'.$row->name).'" class="black">'.$row->name.'</a> <br />';
		echo '</div>';
		$count++;
	}
}

if($noResults) echo 'Sorry, couldnt find nuthin\'';
echo '</div>';
echo '<br /><br /><a href="'.site_url().'" class="white">Back to index</a>';
?>