<?php

	$this->load->helper('url');
	
	echo '<table border="1"><tr><td><b>Bar Review ID</b></td><td><b>User Name</b></td>
                                                <td><b>Bar Name</b></td>
                                                <td><b>Approved?</b></td>
                                                <td><b>Rating</b></td>
                                                <td><b>Review Content</b></td>
                                                <td><b>TS</b></td></tr>';
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


