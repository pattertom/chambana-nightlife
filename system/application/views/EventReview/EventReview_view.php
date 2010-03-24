<?php
 
	$this->load->helper('url');
	echo form_open_multipart('eventreview/search');
	$js = 'onClick="clickIntoSearchBox()"';
	echo 'Search Event Reviews: ' . form_input('event', 'Event', $js);
	echo form_submit('event_review_search', 'Search');
	echo form_close();
 
	echo '<table border="1"><tr><th><b>Bar Review ID</b></th><th><b>User Name</b></th>
                                                <th><b>Event Name</b></th>
                                                <th><b>Approved?</b></th>
                                                <th><b>Rating</b></th>
                                                <th><b>Review Content</b></th>
                                                <th><b>TS</b></td></th>';
	foreach ($result->result() as $row)
	{
		echo '<tr><td>';
		echo $row->id . ' <a href="' . site_url('eventreview/delete/'.$row->id) . '" class="black">[DELETE]</a>';
		echo '</td><td>';
		echo $row->userName;
        echo '</td><td>';
		echo $row->eventName;
        echo '</td><td>';
        echo $row->approvedByAdmin;
        echo '</td><td>';
		echo $row->rating;
        echo '</td><td>';
		echo $row->reviewContent;
        echo '</td><td>';
		echo $row->ts;
		echo '</tr>';
	}
	echo '</table>';
	?>
	<br /><br />
	<a href="<?php echo site_url('eventreview/insert'); ?>" class="black"> Insert an Event Review </a>