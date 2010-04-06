<?php
$this->load->helper('url');

$row = $result->row();

header("Content-type: image/jpeg");
print $row->image;
?>