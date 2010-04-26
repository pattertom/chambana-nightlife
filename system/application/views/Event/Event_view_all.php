<?php
$this->load->helper('url');

echo '<h1 class="underlined">Events in the Chambana area</h1>';
echo '<table class="display">';
$count = 0;
foreach ($result->result() as $row)
{
	if($count == 0) echo '<tr>';
	echo '<td><center><a href="'. site_url('event/view_event/'.$row->id).'" class="black">'.$images[$count].'</a>
		<br /><a href="'. site_url('event/view_event/'.$row->id).'" class="black">'.$row->name.'</a><br />'.date("g:i a F j, Y", strtotime($row->date));
	echo 
    // '<br />'. $row->tag_name .
	'</center></td>';
	$count++;
	if($count % 5 == 0) echo '</tr>';
}
echo '</table>';
?>
<br /><br />
<?php if ($this->session->userdata('admin') == TRUE) { ?>
<a href="<?php echo site_url('event/insert'); ?>" class="black"> Insert a new event </a>
<?php } ?>