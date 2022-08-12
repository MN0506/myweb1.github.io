<?php
require("db_connection.php");
$pd_id=$_POST["pd_id"];
$pc_id=$_POST["pc_id"];
$dd_id=$_POST["dd_id"];
$pd_name=$_POST["pd_name"];
$pd_description=$_POST["pd_description"];
$pd_date=$_POST["pd_date"];

require('function.php');
$folder="photos/";
$pd_image1=$_FILES["pd_image1"]["name"];
$temp_pd_image1=$_FILES["pd_image1"]["tmp_name"];
if(empty($pd_image1))
{
    $new_pd_image1=$_POST["old_pd_image1"];
}
else
{
    $new_pd_image1=upload_image($pd_image1,$temp_pd_image1,$folder);
}

$folder="photos/";
$pd_image2=$_FILES["pd_image2"]["name"];
$temp_pd_image2=$_FILES["pd_image2"]["tmp_name"];
if(empty($pd_image2))
{
    $new_pd_image2=$_POST["old_pd_image2"];
}
else
{
    $new_pd_image2=upload_image($pd_image2,$temp_pd_image2,$folder);
}

$sql1=$conn->prepare("SELECT * FROM product_details WHERE pd_name=? AND pd_id!=?");
$sql1->bind_param("si",$pd_name,$pd_id);
$sql1->execute();
$result1=$sql1->get_result();
if($result1->num_rows>0)
{
  echo"<script type='text/javascript'>
    alert('PRODUCT ALREADY EXISTS');
    history.back();
    </script>";  
}
else
{
$sql=$conn->prepare("UPDATE product_details SET pc_id=?,dd_id=?,pd_name=?,pd_image1=?,pd_image2=?,
pd_description=? where pd_id=?");
$sql->bind_param("iissssi",$pc_id,$dd_id,$pd_name,$new_pd_image1,
                 $new_pd_image2,$pd_description,$pd_id);
if($sql->execute())
{
    echo"<script type='text/javascript'>alert('SUCCESSFULLY UPDATED');window.location='product_details_view.php';</script>";
}
else
{
    echo"<script type='text/javascript'>alert('SUCCESSFULLY NOT UPDATED');window.location='product_details_view.php';</script>";
}
}
?>