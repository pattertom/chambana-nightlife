<?php
$this->load->helper('url');
$this->load->helper('form');

echo form_open_multipart('drink/search');
$js = 'onClick="clickIntoSearchBox()"';
echo 'Search Drinks: ' . form_input('drink', 'Drink', $js);
echo form_submit('drink_search', 'Search');
echo form_close();

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