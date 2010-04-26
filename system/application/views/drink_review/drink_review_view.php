<?php
$this->load->helper('url');

echo '<table><tr><th><b>Drink Review ID</b></th><th><b>User Name</b></th>
                                                <th><b>Drink Name</b></th>
                                                <th><b>Approved?</b></th>
                                                <th><b>Rating</b></th>
                                                <th><b>Review Content</b></th>
                                                <th><b>TS</b></td></th>';
foreach ($result->result() as $row)
{
	echo '<tr><td>';
	echo $row->id . ' <a href="' . site_url('drink_review/delete/'.$row->id) . '" class="black">[DELETE]</a>';
	echo '</td><td>';
	echo $row->user_name;
    echo '</td><td>';
	echo $row->drink_name;
    echo '</td><td>';
    echo $row->approved_by_admin;
    echo '</td><td>';
	echo $row->rating;
    echo '</td><td>';
	echo $row->review_content;
    echo '</td><td>';
	echo $row->ts;
	echo '</tr>';
}
echo '</table>';
echo '<br /><br />';
echo '<a href="'.site_url('drink_review/insert').'" class="black"> Insert a Drink Review </a>';
if($this->session->userdata('admin'))
{
	echo '<hr /><h3 class="underlined">Awaiting Approval</h3>';

	echo '<table><tr><th><b>Drink Review ID</b></th><th><b>User Name</b></th>
												    <th><b>Drink Name</b></th>
												    <th><b>Approved?</b></th>
												    <th><b>Rating</b></th>
												    <th><b>Review Content</b></th>
												    <th><b>TS</b></td></th>';
	foreach ($result->result() as $row)
	{
		if($row->approvedByAdmin == 0)
		{
			echo '<tr><td>';
			echo $row->id . ' <a href="' . site_url('drink_review/delete/'.$row->id) . '" class="black">[DELETE]</a>
							  <a href="' . site_url('drink_review/approve/'.$row->id) . '" class="black">[APPROVE]</a>';
			echo '</td><td>';
			echo $row->user_name;
			echo '</td><td>';
			echo $row->drink_name;
			echo '</td><td>';
			echo $row->approved_by_admin;
			echo '</td><td>';
			echo $row->rating;
			echo '</td><td>';
			echo $row->review_content;
			echo '</td><td>';
			echo $row->ts;
			echo '</tr>';
		}
	}
}

