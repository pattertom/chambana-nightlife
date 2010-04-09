<?php

/**
----------------------------------------------------------
Drink_single_view.php
Assumed input data
$result is the query containing the drink
----------------------------------------------------------
*/

/**
 * Load the codeigniter helper functions
 * These are required to display forms and access the site url
 * and obtain the data from the event query
 */	
$this->load->helper('url');
$this->load->helper('form');
$drink = $result->row();

// Set up the left column and display the header
echo '<div class="contentLeftColumn">';
echo '<div class="title">'.$drink->name.'</div><hr /><br />';


// Display the description ?>
<div class="paragraph"><?php echo $drink->description?></div>
<div class="contentRightColumn">

	<center><?php echo $image ?></center>
</div>
<br class="clear" />