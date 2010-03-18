
	<?php
	$this->load->helper('url');
	
	echo '<table border="1"><tr><td><b>Bar Name</b></td><td><b>Rating</b></td>
                                                <td><b>Description</b></td>
                                                <td><b>Specials</b></td>
                                                <td><b>Address</b></td></tr>';
	foreach ($result->result() as $row)
	{
		echo '<tr><td>';
		echo $row->name . ' <a href="' . site_url('bar/delete/'.$row->name) . '" class="black">[DELETE]</a>';
		echo '</td><td>';
		echo $row->rating;
        echo '</td><td>';
		echo $row->description;
        echo '</td><td>';
		echo $row->specials;
        echo '</td><td>';
		echo $row->address;
		echo '</tr>';
	}
	echo '</table>';
	?>
	<br /><br />
	<a href="<?php echo site_url('bar/insert'); ?>" class="black"> Insert a new bar </a>
