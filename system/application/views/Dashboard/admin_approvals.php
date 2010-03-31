<?php
$this->load->helper('url');

echo '<h3 class="underlined">Bar Reviews Awaiting Approval</h3>';
echo '<table><tr><th><b>Bar Review ID</b></th><th><b>User Name</b></th>
										   <th><b>Bar Name</b></th>
										   <th><b>Approved?</b></th>
										   <th><b>Rating</b></th>
										   <th><b>Review Content</b></th>
										   <th><b>TS</b></td></th>';

foreach ($barreviews->result() as $row)
{
	echo '<tr><td>';
	echo $row->id . ' <a href="' . site_url('barreview/delete/'.$row->id) . '" class="black">[DELETE]</a>
					  <a href="' . site_url('barreview/approve/'.$row->id) . '" class="black">[APPROVE]</a>';
	echo '</td><td>';
	echo $row->userName;
	echo '</td><td>';
	echo $row->barName;
	echo '</td><td>';
	echo $row->approvedByAdmin;
	echo '</td><td>';
	echo $row->rating;
	echo '</td><td>';
	echo $row->reviewContent;
	echo '</td><td>';
	echo $row->ts;
	echo '</tr>';
}
echo '</table>';

echo '<h3 class="underlined">Event Reviews Awaiting Approval</h3>';
echo '<table><tr>
                                            <th><b>Event Review ID</b></th>
                                            <th><b>User Name</b></th>
                                            <th><b>EventID</b></th>
                                            <th><b>Approved?</b></th>
                                            <th><b>Rating</b></th>
                                            <th><b>Review Content</b></th>
                                            <th><b>TS</b></td></th>';
foreach ($eventreviews->result() as $row)
{
	echo '<tr><td>';
	echo $row->id . ' <a href="' . site_url('eventreview/delete/'.$row->id) . '" class="black">[DELETE]</a>';
	echo '</td><td>';
	echo $row->userName;
    echo '</td><td>';
    echo '<a href="' . site_url('event/view_event/' . $row->eventID) . '"> ' . $row->eventID . '</a>';
    echo '</td><td>';
    if ($this->session->userdata('admin') && $row->approvedByAdmin == 0)
        echo '<a href="' . site_url('eventreview/approve/'.$row->id) . '">Approve</a>';
    else
        echo $row->approvedByAdmin;
    echo '</td><td>';
	echo $row->rating;
    echo '</td><td>';
	echo $row->reviewContent;
    echo '</td><td>';
	echo $row->ts;
	echo '</tr>';
}
echo '</table>';

?>