<?php
echo $this->load->view('header');
$this->load->helper('url');
?>
<div class="contentLeftColumn">
	<h3>Dashboard</h3>
	<?php 
	if($this->session->userdata('admin')){
		echo '<div class="adminToolBox">';
		echo '<div class="descriptionTitle">Admin Toolbox</div>';
		echo '<a href="'. site_url('/dashboard/adminApprovals').'" class="white">See awaiting bar reviews</a><br />';
		echo '<a href="'. site_url('/dashboard/adminApprovals').'" class="white">See awaiting event reviews</a><br /><br /></div><br />';
	}
	?>
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