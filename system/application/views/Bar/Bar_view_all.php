
<?php
$this->load->helper('url');
?>
   	<div>
        <label for="function_name">Search by function name </label>
        <input type="text" name="function_name" id="function_name" />
		      <input type="submit" value="search" id="search_button" />
		      <div id="autocomplete_choices" class="autocomplete" style = "display: block;"></div>
              
    </div> 
   
<?php
echo '<h1 class="underlined">Bars in the Chambana area</h2>';
echo '<table class="display">';
$count = 0;
foreach ($result->result() as $row)
{
	if($count == 0) echo '<tr>';
	echo '<td><center><a href="'. site_url('bar/viewBar/'.$row->name).'" class="black">'.$images[$count].'</a>
		<br /><a href="'. site_url('bar/viewBar/'.$row->name).'" class="black">'.$row->name.'</a> <br /> User rating: ';
	if($row->average != NULL) echo '<b>'.$row->average .'</b>';
	else echo 'NOT REVIEWED YET!';
	echo '</center></td>';
	$count++;
	if($count % 3 == 0) echo '</tr>';
}
echo '</table>';
?>

<br /><br />
<a href="<?php echo site_url('bar/insert'); ?>" class="black"> Insert a new bar </a>