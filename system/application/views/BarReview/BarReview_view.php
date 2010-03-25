<?php

	$this->load->helper('url');
	
	echo '<table><tr><th><b>Bar Review ID</b></th><th><b>User Name</b></th>
                                                <th><b>Bar Name</b></th>
                                                <th><b>Approved?</b></th>
                                                <th><b>Rating</b></th>
                                                <th><b>Review Content</b></th>
                                                <th><b>TS</b></td></th>';
	foreach ($result->result() as $row)
	{
		echo '<tr><td>';
		echo $row->id . ' <a href="' . site_url('barreview/delete/'.$row->id) . '" class="black">[DELETE]</a>';
		echo '</td><td>';
		echo $row->userName;
        echo '</td><td>';
		echo $row->barName;
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
	<a href="<?php echo site_url('barreview/insert'); ?>" class="black"> Insert a Bar Review </a>


