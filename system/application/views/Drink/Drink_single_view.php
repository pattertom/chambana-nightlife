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
$average_rating = $rating->row();

// Set up the left column and display the header
echo '<div class="contentLeftColumn">';
echo '<div class="title">'.$drink->name.'</div><hr /><br />';


// Display the description ?>
<div class="paragraph"><?php echo $drink->description?></div>

<?php
/**
* Reviews section
* Display the review form first if not already reviewed by user
* and then display the reviews
*/
echo '<h1 class="underlined">Reviews</h1>';
echo '<div class="paragraph">Leave a review <br />';
if(!$reviewed)
{
	echo form_open_multipart('drink_review/create/'.$drink->name);
	echo '<input type="hidden" name="drink_name" value="'.$drink->name.'">';
	echo '<input type="text" tabindex="1" size="30" value="" name="user_name" class="textInput"> <b>Name</b> (required) ';
	echo '<select name="rating" tabindex="2" class="selectStyled">
			<option value="0">0</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			<option value="7">7</option>
			<option selected="selected" value="8">8</option>
			<option value="9">9</option>
			<option value="10">10</option>
			</select> <b>Rating</b><br />';
	echo '<input type="text" tabindex="3" size="30" value="" name="mail" class="textInput"> <b>Mail</b> (will not be published) (required)<br />';
	echo '<textarea tabindex="4" cols="80" rows="6" name="review_content" class="areaStyled">Write your review here!</textarea><br />';
	echo '<input type="submit" class="submitButton" value="Post your review" name="submitReview">';
	echo form_close();
}
else echo '<b>Thank you for submitting your review.  It is now awaiting admin approval!</b>';
foreach($reviews->result() as $row)
{
	echo '<div class="commentHeader"> Review by <font color="white">'.$row->user_name.'</font> - Rating: '.$row->rating.'<div class="time">on ' . date("g:i a F j, Y", strtotime($row->ts)).'</div></div>';
	echo $row->review_content . '<br />';
}
?>
</div>
</div>

<div class="contentRightColumn">

	<center><?php echo $image ?></center>
	
	<h1 class="underlined">User Rating</h2>
    <div class="paragraph"><?php echo $drink->name; ?> has an average user rating of <b><?php echo round((float)$average_rating->average, 1); ?></b></div>
	
	<?php
	echo '<br /><h1 class="underlined">Users who liked '. $drink->name .' also like:</h1>';
	$no_drinks = TRUE;
	foreach($other_drinks->result() as $row)
	{
		$no_drinks = FALSE;
		echo '<a href="'.site_url('Drink/viewDrink/' . $row->drink_name).'" class="white">' . $row->drink_name . '</a><br /><br />';
	}
	if($no_drinks) echo 'No other drinks';
	?>
	
</div>
<br class="clear" />