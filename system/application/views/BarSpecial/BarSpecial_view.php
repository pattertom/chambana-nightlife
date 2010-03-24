<?php

	$this->load->helper('url');
	
	echo '<table><tr><th><b>Bar Special ID</b></th>
                                                <th><b>Bar Name</b></th>
                                                <th><b>isWeekly?</b></th>
												<th><b>Day of week</b></th>
                                                <th><b>Description</b></th>
                                                <th><b>Date</b></th></tr>';
	foreach ($result->result() as $row)
	{
		echo '<tr><td>';
		echo $row->id . ' <a href="' . site_url('barspecial/delete/'.$row->id) . '" class="black">[DELETE]</a>';
        echo '</td><td>';
		echo $row->barName;
        echo '</td><td>';
        if ($row->isWeekly == 1){
			echo 'Yes';
			echo '</td><td>';
			echo $row->weeklyDay;
		}
		else {
			echo 'No';
			echo '</td><td>';
			echo 'Not Weekly';
		}
        echo '</td><td>';
		echo $row->description;
        echo '</td><td>';
		echo $row->dateSpecial;
		echo '</td></tr>';
	}
	echo '</table>';
	?>
	<br /><br />
	<a href="<?php echo site_url('barspecial/insert'); ?>" class="black"> Insert a Bar Special </a>


