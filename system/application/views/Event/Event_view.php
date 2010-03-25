<?php

	$this->load->helper('url');
	
	echo '<table><tr><th><b>Event ID</b></th><th><b>Name</b></th>
                                                <th><b>Price</b></th>
                                                <th><b>Type</b></th>
                                                <th><b>Description</b></th>
                                                <th><b>Date</b></th>
                                                <th><b>Address</b></th></tr>';
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


