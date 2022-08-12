<?php
function upload_image($original_image_name,$temp_name,$folder)
{
    $filetype=pathinfo($original_image_name,PATHINFO_EXTENSION);
    $newimage_name="IMG_".rand().".".$filetype;
    $destination=$folder.$newimage_name;
    move_uploaded_file($temp_name,$destination);
    return $newimage_name;
}
?>