<?php
$this->load->helper('url');
$this->load->helper('form');

echo form_open_multipart('drink/search');
$js = 'onClick="clickIntoSearchBox()"';
echo 'Search Drinks: ' . form_input('drink', 'Drink', $js);
echo form_submit('drink_search', 'Search');
echo form_close();

echo '<table><tr><th><b>Drink Name</b></th><th><b>Description</b></th></tr>';
foreach ($result->result() as $row)
{
	echo '<tr><td>';
	echo '<a href="'.site_url('drink/viewDrink/'.$row->name).'">'.$row->name . '</a> <a href="' . site_url('drink/delete/'.$row->name) . '" class="black">[DELETE]</a>';
	echo '</td><td>';
	echo $row->description;
	echo '</tr>';
}
echo '</table>';
?>
<br /><br />
<a href="<?php echo site_url('drink/insert'); ?>" class="black"> Insert a new drink </a>