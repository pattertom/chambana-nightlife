<?php

	$this->load->helper('url');
	
	echo '<table border="1"><tr><td><b>Event ID</b></td><td><b>Name</b></td>
                                                <td><b>Price</b></td>
                                                <td><b>Type</b></td>
                                                <td><b>Description</b></td>
                                                <td><b>Date</b></td>
                                                <td><b>Address</b></td></tr>';
	foreach ($result->result() as $row)
	{
		echo '<tr><td>';
		echo $row->id . ' <a href="' . site_url('event/delete/'.$row->id) . '" class="black">[DELETE]</a>';
		echo '</td><td>';
		echo $row->name;
        echo '</td><td>';
		echo $row->price;
        echo '</td><td>';
        echo $row->type;
        echo '</td><td>';
		echo $row->description;
        echo '</td><td>';
		echo $row->date;
        echo '</td><td>';
		echo $row->address;
		echo '</tr>';
	}
	echo '</table>';
	?>
	<br /><br />
	<a href="<?php echo site_url('event/insert'); ?>" class="black"> Insert a new event </a>


