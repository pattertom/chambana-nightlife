<?php
$this->load->helper('url');
$this->load->helper('form');
			echo "<div id=\"searchbar\">
            <div id=\"autosuggest\"><ul></ul></div>";


				
				echo form_open_multipart('search/searcher');
				$js = 'onClick="clickIntoSearchBox()"';
				echo 'Search: ' . form_input('drink', 'Search Here', $js);

				echo form_submit('main_search', 'Search');
				echo form_close();
				
			echo "</div>";
echo '<table><tr><th><b>Name</b></th><th><b>Description</b></th>';
foreach ($result->result() as $row)
{
	echo '<tr><td>';
	echo '<a href="'. site_url('event/view_event/'.$row->id).'">'.$row->name.'</a>';
	echo '</td><td>';
	echo $row->description;
	echo '</td></tr><tr><td>';
	echo '<a href="'. site_url('/barspecial').'">'.$row->barName.'</a>';
	echo '</td><td>';
	echo $row->description2;
	echo '</td></tr>';
}
	echo '</table>';
?>