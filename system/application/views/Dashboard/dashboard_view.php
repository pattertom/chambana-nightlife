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
		echo '<a href="'. site_url('/dashboard/adminApprovals').'" class="white">See awaiting drink reviews</a><br />';
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
		echo '</tr></table>';
		
		//Begin simple xml for weather
		$xml = simplexml_load_file("http://feeds.weatherbug.com/rss.aspx?zipcode=61801&feed=currtxt&zcode=z4641");
		echo "<br />Going to the bars?  Here's the weather right now:<br /><br />";
		echo $xml->channel->item[0]->description;
		// End weather
		?> 
</div>
<div class="contentRightColumn">
	<?php
	echo '<div class="title">Upcoming events</div><hr /><br />';
	foreach ($events->result() as $row)
	{
		echo '<div class="itemContainer">';
		echo '<div class="itemHeaderLeft"></div>';
		echo '<div class="itemHeaderMiddle">'.$row->name.' <div class="time">'.date("F j, Y", strtotime($row->date)).'</div></div>';
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