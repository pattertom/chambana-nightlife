<?php
include 'common.php';

/**
----------------------------------------------------------
Event_single_view.php
Assumed input data
$result is the query containing the event
$reviews is the query containing the reviews for the event
----------------------------------------------------------
*/

/**
 * Load the codeigniter helper functions
 * These are required to display forms and access the site url
 * and obtain the data from the event query
 */	
$this->load->helper('url');
$this->load->helper('form');
$event = $result->row();

// Set up the left column and display the header
echo '<div class="contentLeftColumn">';
echo '<div class="title">'.$event->name.'</div><hr /><br />';


// Display the description ?>
<div class="paragraph"><?php echo $event->description?></div>

<?php

/**
* Reviews section
* Display the review form first
* and then display the reviews
*/
echo '<h1 class="underlined">Reviews</h1>';
echo '<div class="paragraph">Leave a review <br />';
echo form_open_multipart('eventReview/create');
echo '<input type="hidden" name="event_id" value="'.$event->id.'">';
echo '<input type="text" tabindex="1" size="30" value="" name="userName" class="textInput"> <b>Name</b> (required) ';
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
echo '<textarea tabindex="4" cols="80" rows="6" name="reviewContent" class="areaStyled">Write your review here!</textarea><br />';
echo '<input type="submit" class="submitButton" value="Post your review" name="submitReview">';
echo form_close();

foreach($reviews->result() as $row)
{
	echo '<div class="commentHeader"> Review by <font color="white">'.$row->userName.'</font> <div class="time">on ' . date("g:i a F j, Y", strtotime($row->ts)).'</div></div>';
	echo $row->reviewContent . '<br />';
}

/**
* Start the right column
*/
?>
</div>
</div>
<div class="contentRightColumn">
    <?php
    $query = $this->db->query("SELECT * FROM image WHERE image_id=".$event->image_id);
    $row = $query->row();
    $image_id = $row->image_id;
    list($height, $width, $scale) = get_new_dimensions($row->image_height, $row->image_width, 200, "height");
    ?>
	<center><img src="/image.php?id=<?php echo $image_id . '" height="'.$height.'" width="'.$width.'"'; ?>" /></center>
	<h1 class="underlined">Address</h2>
	<div class="paragraph"><?php echo $event->address?></div>
</div>
<br class="clear" />