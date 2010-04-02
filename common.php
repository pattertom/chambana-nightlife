<?php
function get_new_dimensions($height, $width, $pixel_height) {
    if ($height > $width)
        $scale = $height > $pixel_height ? $pixel_height/$height : 1;
    else
        $scale = $width > $pixel_height ? $pixel_height/$width : 1;
    return array($scale*$height, $scale*$width, $scale);
}
?>