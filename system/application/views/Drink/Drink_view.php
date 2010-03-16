
	<?php
	$this->load->helper('url');
	
	echo '<table border="1"><tr><td><b>Drink Name</b></td><td><b>Description</b></td></tr>';
	foreach ($result->result() as $row)
	{
		echo '<tr><td>';
		echo $row->name . ' <a href="' . site_url('drink/delete/'.$row->name) . '" class="black">[DELETE]</a>';
		echo '</td><td>';
		echo $row->description;
		echo '</tr>';
	}
	echo '</table>';
	?>
	<br /><br />
	<a href="<?php echo site_url('drink/insert'); ?>" class="black"> Insert a new drink </a>
