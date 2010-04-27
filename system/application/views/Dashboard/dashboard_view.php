<?php
echo $this->load->view('header');
$this->load->helper('url');
$this->load->helper('array');
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
		/**
		** Display the table for the days specials
		**/
		
		echo 'Specials for '.date("l").'!</div>';
		$bars = array();
		$previousBar = "";
		$count = -1;
		$barDrinkCount = 1;
		$highestCount = 0;
		
		// Go through the array, add each drink to its respective bar.
		// This assumes that the mysql query returned results sorted by 
		// bar name.
		foreach ($result->result() as $row)
		{
			if($previousBar = "" || $previousBar != $row->barName) 
			{
				$count++;
				$barDrinkCount = 1;
				$bars[$count][0] = $row->barName;
				$bars[$count][$barDrinkCount] = $row->description;
			}	
			else $bars[$count][$barDrinkCount] = $row->description;
			$barDrinkCount++;
			if($barDrinkCount > $highestCount) $highestCount = $barDrinkCount;
		}
		echo '<table>';
		for($y = 0; $y <= $highestCount; $y++)
		{
			echo '<tr>';
			for($x = 0; $x < count($bars); $x++)
			{
				if(count($bars[$x]) > $y)
				{
					if($y == 0) echo '<th>'.$bars[$x][$y].'</th>';
					else echo '<td>'.$bars[$x][$y].'</td>';
				}
			}
			echo '</tr>';
		}
		echo '</table>';
		
		// END TABLE 
		
		//Begin simple xml for weather
		$xml = simplexml_load_file("http://feeds.weatherbug.com/rss.aspx?zipcode=61801&feed=currtxt&zcode=z4641");
		echo "<br /><b>Going to the bars?  Here's the weather right now:</b><br /><br />";
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