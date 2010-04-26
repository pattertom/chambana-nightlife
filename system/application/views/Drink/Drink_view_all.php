<?php
$this->load->helper('url');

echo '<h1 class="underlined">Drinks in the Chambana area</h1>';
echo '<table class="display">';
$count = 0;
foreach ($result->result() as $row)
{
	if($count == 0) echo '<tr>';
	echo '<td><center><a href="'. site_url('drink/viewDrink/'.$row->name).'" class="black">'.$images[$count].'</a>
		<br /><a href="'. site_url('drink/viewDrink/'.$row->name).'" class="black">'.$row->name.'</a> <br /> User rating: ';
	if($row->average != NULL) echo '<b>'.round((float)$row->average, 1).'</b>';
	else echo 'NOT REVIEWED YET!';
	echo '</center></td>';
	$count++;
	if($count % 5 == 0) echo '</tr>';
}
echo '</table>';
?>
<br /><br />
<?php if ($this->session->userdata('admin') == TRUE) { ?>
<a href="<?php echo site_url('drink/insert'); ?>" class="black"> Insert a new drink </a>
<?php } ?>