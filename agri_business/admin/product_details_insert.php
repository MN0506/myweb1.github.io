<?php
require("db_connection.php");
$pc_id=$_POST["pc_id"];
$dd_id=$_POST["dd_id"];
$pd_name=$_POST["pd_name"];

require('function.php');
$folder="photos/";
$pd_image1=$_FILES["pd_image1"]["name"];
$temp_pd_image1=$_FILES["pd_image1"]["tmp_name"];
$new_pd_image1=upload_image($pd_image1,$temp_pd_image1,$folder);

$folder="photos/";
$pd_image2=$_FILES["pd_image2"]["name"];
$temp_pd_image2=$_FILES["pd_image2"]["tmp_name"];
$new_pd_image2=upload_image($pd_image2,$temp_pd_image2,$folder);

$pd_description=$_POST["pd_description"];
$pd_date=$_POST["pd_date"];

$sql1=$conn->prepare("SELECT * FROM product_details WHERE pd_name=? ");
$sql1->bind_param("s",$pd_name);
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
$sql=$conn->prepare("insert into product_details(pc_id,dd_id,pd_name,pd_image1,pd_image2,
pd_description,pd_date)VALUES(?,?,?,?,?,?,?)");
$sql->bind_param("iisssss",$pc_id,$dd_id,$pd_name,$new_pd_image1,
                 $new_pd_image2,$pd_description,$pd_date);
if($sql->execute())
{
    echo"<script type='text/javascript'>alert('SUCCESSFULLY INSERTED');window.location='product_details_view.php';</script>";
}
else
{
    echo"<script type='text/javascript'>alert('SUCCESSFULLY NOT INSERTED');window.location='product_details_view.php';</script>";
}
}
?>