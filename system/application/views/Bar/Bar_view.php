
	<?php
	$this->load->helper('url');
	
	echo '<table><tr><th><b>Bar Name</b></th><th><b>Rating</b></th>
                                             <th><b>Description</b></th>
                                             <th><b>Specials</b></th>
                                             <th><b>Address</b></th></tr>';
	foreach ($result->result() as $row)
	{
		echo '<tr><td>';
		echo '<a href="'. site_url('bar/viewBar/'.$row->name).'">'.$row->name.'</a> <a href="' . site_url('bar/delete/'.$row->name) . '" class="black">[DELETE]</a>';
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