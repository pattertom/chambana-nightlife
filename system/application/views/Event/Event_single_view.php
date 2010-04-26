<?php

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
echo '<div class="title">'.$event->name.'</div>';

echo '<div class="paragraph">'.date("g:i a F j, Y", strtotime($event->date)).'</div><hr /><br />';

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
if(!$reviewed) 
{
	echo form_open_multipart('eventReview/create/'.$event->id);
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
}
else echo '<b>Thank you for submitting your review.  It is now awaiting admin approval!</b>';
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

	<center><?php echo $image ?></center>
	
	<h1 class="underlined">Tags</h1>
	<?php 
	$num_rows = $tags->num_rows();
	$count = 0;
	if($tags->num_rows() > 0){
    	foreach($tags->result() as $row)
        {
        	echo '<a class="white" href="'.site_url('event/view_tag/'.$row->tag_name).'">'.$row->tag_name.'</a>';
        	if ($count < $num_rows-1)
        	    echo ', ';
        	$count++;
        }
    }
    ?>
	
	<h1 class="underlined">Address</h1>
	<div class="paragraph"><?php echo $event->address?></div>
	
	<div class="map">
        <!-- ++Begin Map Search Control Wizard Generated Code++ -->
        <!--
        // Created with a Google AJAX Search Wizard
        // http://code.google.com/apis/ajaxsearch/wizards.html
        -->

        <!--
        // The Following div element will end up holding the map search control.
        // You can place this anywhere on your page
        -->
        <div id="mapsearch">
        <span style="color:#676767;font-size:11px;margin:10px;padding:4px;">Loading...</span>
        </div>

        <!-- Maps Api, Ajax Search Api and Stylesheet
        // Note: If you are already using the Maps API then do not include it again
        //       If you are already using the AJAX Search API, then do not include it
        //       or its stylesheet again
        //
        // The Key Embedded in the following script tags is designed to work with
        // the following site:
        // http://localhost/
        -->
        <script src="http://maps.google.com/maps?file=api&v=2&key=ABQIAAAARWVeFhNhrPu-BpalRmnZ8xT2yXp_ZAY8_ufC3CFXhHIE1NvwkxSYPfXl4SnjiuOj6HbyX2_IsjgutA"
        type="text/javascript"></script>
        <script src="http://www.google.com/uds/api?file=uds.js&v=1.0&source=uds-msw&key=ABQIAAAARWVeFhNhrPu-BpalRmnZ8xT2yXp_ZAY8_ufC3CFXhHIE1NvwkxSYPfXl4SnjiuOj6HbyX2_IsjgutA"
        type="text/javascript"></script>
        <style type="text/css">
        @import url("http://www.google.com/uds/css/gsearch.css");
        </style>

        <!-- Map Search Control and Stylesheet -->
        <script type="text/javascript">
        window._uds_msw_donotrepair = true;
        </script>
        <script src="http://www.google.com/uds/solutions/mapsearch/gsmapsearch.js?mode=new"
        type="text/javascript"></script>
        <style type="text/css">
        @import url("http://www.google.com/uds/solutions/mapsearch/gsmapsearch.css");
        </style>

        <style type="text/css">
        .gsmsc-mapDiv {
          height : 300px;
        }

        .gsmsc-idleMapDiv {
          height : 200px;
        }

        #mapsearch {
          width : 300px;
          margin: 10px;
          padding: 4px;
        }
        </style>
        <script type="text/javascript">
        function LoadMapSearchControl() {

          var options = {
                zoomControl : GSmapSearchControl.ZOOM_CONTROL_ENABLE_ALL,
                title : "<?php echo $event->name ?>",
                <!-- Need to specify a url for the event otherwise the title does not show up -->
                url : "",
                idleMapZoom : GSmapSearchControl.ACTIVE_MAP_ZOOM,
                activeMapZoom : GSmapSearchControl.ACTIVE_MAP_ZOOM
                }

          new GSmapSearchControl(
                document.getElementById("mapsearch"),
                "<?php echo $event->address ?>",
                options
                );

        }
        // arrange for this function to be called during body.onload
        // event processing
        GSearch.setOnLoadCallback(LoadMapSearchControl);
        </script>
        <!-- ++End Map Search Control Wizard Generated Code++ --> 
    </div>
</div>
<br class="clear" />