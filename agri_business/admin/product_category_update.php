<?php
require("db_connection.php");
$pc_id=$_POST["pc_id"];
$pc_name=$_POST["pc_name"];

$sql1=$conn->prepare("SELECT * FROM product_category WHERE pc_name=? AND pc_id!=? ");
$sql1->bind_param("si",$pc_name,$pc_id);
$sql1->execute();
$result1=$sql1->get_result();
if($result1->num_rows>0)
{
  echo"<script type='text/javascript'>
    alert('CATEGORY ALREADY EXISTS');
    history.back();
    </script>";  
}
else
{


$sql=$conn->prepare("UPDATE product_category SET pc_name=? where pc_id=?");
$sql->bind_param("si",$pc_name,$pc_id);
if($sql->execute())
{
    echo"<script type='text/javascript'>alert('SUCCESSFULLY UPDATED');window.location='product_category_view.php';</script>";
}
else
{
    echo"<script type='text/javascript'>alert('SUCCESSFULLY NOT UPDATED');window.location='product_category_view.php';</script>";
}
}
?>