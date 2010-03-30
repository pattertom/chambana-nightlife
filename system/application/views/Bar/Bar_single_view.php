<?php
/**
----------------------------------------------------------
Bar_single_view.php
Assumed input data
$result is the query containing the bar
$specials is the query containing the bars specials
$reviews is the query containing the reviews for the bar
----------------------------------------------------------
*/

/**
 * Load the codeigniter helper functions
 * These are required to display forms and access the site url
 * and obtain the data from the bar query
 */	
$this->load->helper('url');
$this->load->helper('form');
$bar = $result->row();

// Set up the left column and display the header
echo '<div class="contentLeftColumn">';
echo '<div class="title">'.$bar->name.'</div><hr /><br />';


// Display the description and set up the specials table ?>
<div class="paragraph"><?php echo $bar->description?></div>
<h1 class="underlined">Weekly Specials</h1>
<table>
	<tr>
		<th>Sunday</th>
		<th>Monday</th>
		<th>Tuesday</th>
		<th>Wednesday</th>
		<th>Thursday</th>
		<th>Friday</th>
		<th>Saturday</th>
	</tr>
<?php
/**
* To create a clean looking specials table we go through each review
* and place its description into the corresponding days array.  Then
* we display each row one by one until no more arrays have descriptions
* that need to be displayed
*/
$sunday = $monday = $tuesday = $wednesday = $thursday = $friday = $saturday = array();
foreach ($specials->result() as $row)
{
	if($row->weeklyDay == 'Sunday') $sunday[] = $row->description;
	else if($row->weeklyDay == 'Monday') $monday[] = $row->description;
	else if($row->weeklyDay == 'Tuesday') $tuesday[] = $row->description;
	else if($row->weeklyDay == 'Wednesday') $wednesday[] = $row->description;
	else if($row->weeklyDay == 'Thursday') $thursday[] = $row->description;
	else if($row->weeklyDay == 'Friday') $friday[] = $row->description;
	else if($row->weeklyDay == 'Saturday') $saturday[] = $row->description;
}
$count = 0;
$continue = true;
while($continue)
{
	// Only continue if there is some array with content
	// that still needs to be displayed
	$continue = false;
	echo '<tr>';
	if($count < count($sunday))
	{
		echo '<td>'.$sunday[$count].'</td>';
		if($count+1<count($sunday)) $continue = true;
	}
	else echo '<td></td>';
	if($count < count($monday))
	{
		echo '<td>'.$monday[$count].'</td>';
		if($count+1<count($monday)) $continue = true;
	}
	else echo '<td></td>';
	if($count < count($tuesday))
	{
		echo '<td>'.$tuesday[$count].'</td>';
		if($count+1<count($tuesday)) $continue = true;
	}
	else echo '<td></td>';
	if($count < count($wednesday))
	{
		echo '<td>'.$wednesday[$count].'</td>';
		if($count+1<count($wednesday)) $continue = true;
	}
	else echo '<td></td>';
	if($count < count($thursday))
	{
		echo '<td>'.$thursday[$count].'</td>';
		if($count+1<count($thursday)) $continue = true;
	}
	else echo '<td></td>';
	if($count < count($friday))
	{
		echo '<td>'.$friday[$count].'</td>';
		if($count+1<count($friday)) $continue = true;
	}
	else echo '<td></td>';
	if($count < count($saturday))
	{
		echo '<td>'.$saturday[$count].'</td>';
		if($count+1<count($saturday)) $continue = true;
	}
	else echo '<td></td>';
	echo '</tr>';
	$count++;
}
echo '</table>';

/**
* Reviews section
* Display the review form first
* and then display the reviews
*/
echo '<h1 class="underlined">Reviews</h1>';
echo '<div class="paragraph">Leave a review <br />';
echo form_open_multipart('barReview/create');
echo '<input type="hidden" name="barName" value="'.$bar->name.'">';
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
	<center><img src="<?php echo base_url().'/images/thumbnail.jpg'; ?>"/></center>
	<h1 class="underlined">Address</h2>
	<div class="paragraph"><?php echo $bar->address?></div>
</div>
<br class="clear" />