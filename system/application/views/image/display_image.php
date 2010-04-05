<?php
$this->load->helper('url');

$row = $result->row();
$image = $row->image;

header("Content-type: image/jpeg");
print $image;
?>