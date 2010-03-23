<?php

	$this->load->helper('url');
	
	echo '<table border="1"><tr><td><b>Bar Special ID</b></td>
                                                <td><b>Bar Name</b></td>
                                                <td><b>isWeekly?</b></td>
												<td><b>Day of week</b></td>
                                                <td><b>Description</b></td>
                                                <td><b>Date</b></td></tr>';
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


