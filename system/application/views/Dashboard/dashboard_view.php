<?php
echo $this->load->view('header');
$this->load->helper('url');
?>
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
</div>
<?php
echo $this->load->view('footer');
?>