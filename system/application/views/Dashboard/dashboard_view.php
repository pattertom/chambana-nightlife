<?php
echo $this->load->view('header');
$this->load->helper('url');
?>
<div class="contentLeftColumn">
	<h3>Dashboard</h3>
	<div class="title">
		<?php 
		echo 'Specials for '.date("l").'!</div>';
		echo '<table><tr>';
		foreach ($result->result() as $row)
		{
			echo '<th>';
			echo $row->barName;
			echo '</th>';
		}
		echo '</tr><tr>';
		foreach ($result->result() as $row)
		{
			echo '<td>';
			echo $row->description;
			echo '</td>';
		}
		echo '</tr></table>';?>
</div>
<div class="contentRightColumn">
	<?php
	foreach ($events->result() as $row)
	{
		echo '<div class="itemContainer">';
		echo '<div class="itemHeaderLeft"></div>';
		echo '<div class="itemHeaderMiddle">'.$row->name.'</div>';
		echo '<div class="itemHeaderRight"></div>';
		echo '<br class="clear">';
		echo '<div class="paragraph" style="padding-top: 5px;">';
		echo $row->description;
		echo '</div></div><br />';
	}
	?>
</div>
<br class="clear" />
<?php
echo $this->load->view('footer');
?>