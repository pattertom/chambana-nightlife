
	<?php
	$this->load->helper('url');
	$bar = $result->row();
	echo '<div class="contentLeftColumn">';
	echo '<div class="title">'.$bar->name.'</div>';
	?>
	<hr />
	<br />
	<div class="paragraph"><?php echo $bar->description?></div>
	<h1 class="underlined">Weekly Specials</h2>
	<table>
		<tr>
			<th>Sunday</th>
			<th>Monday</th>
			<th>Tuesday</th>
			<th>Wednesday</th>
			<th>Thursday</th>
			<th>Friday</th>
			<th>Saturday</th>
		</tr>
	<?php
		$sunday = array();
		$monday = array();
		$tuesday = array();
		$thursday = array();
		$friday = array();
		$saturday = array();
		foreach ($specials->result() as $row)
		{
			if($row->weeklyDay == 'Sunday') $sunday[] = $row->description;
			else if($row->weeklyDay == 'Monday') $monday[] = $row->description;
			else if($row->weeklyDay == 'Tuesday') $tuesday[] = $row->description;
			else if($row->weeklyDay == 'Wednesday') $wednesday[] = $row->description;
			else if($row->weeklyDay == 'Thursday') $thursday[] = $row->description;
			else if($row->weeklyDay == 'Friday') $friday[] = $row->description;
			else if($row->weeklyDay == 'Saturday') $saturday[] = $row->description;
		}
		$count = 0;
		$continue = true;
		while($continue)
		{
			$continue = false;
			echo '<tr>';
			if($count < count($sunday))
			{
				echo '<td>'.$sunday[$count].'</td>';
				if($count+1<count($sunday)) $continue = true;
			}
			else echo '<td></td>';
			if($count < count($monday))
			{
				echo '<td>'.$monday[$count].'</td>';
				if($count+1<count($monday)) $continue = true;
			}
			else echo '<td></td>';
			if($count < count($tuesday))
			{
				echo '<td>'.$tuesday[$count].'</td>';
				if($count+1<count($tuesday)) $continue = true;
			}
			else echo '<td></td>';
			if($count < count($wednesday))
			{
				echo '<td>'.$wednesday[$count].'</td>';
				if($count+1<count($wednesday)) $continue = true;
			}
			else echo '<td></td>';
			if($count < count($thursday))
			{
				echo '<td>'.$thursday[$count].'</td>';
				if($count+1<count($thursday)) $continue = true;
			}
			else echo '<td></td>';
			if($count < count($friday))
			{
				echo '<td>'.$friday[$count].'</td>';
				if($count+1<count($friday)) $continue = true;
			}
			else echo '<td></td>';
			if($count < count($saturday))
			{
				echo '<td>'.$saturday[$count].'</td>';
				if($count+1<count($saturday)) $continue = true;
			}
			else echo '<td></td>';
			echo '</tr>';
			$count++;
		}
	?>
	</table>

	</div>
	<div class="contentRightColumn">
		<center><img src="<?php echo base_url().'/images/thumbnail.jpg'; ?>"/></center>
		<h1 class="underlined">Address</h2>
		<div class="paragraph"><?php echo $bar->address?></div>
	</div>