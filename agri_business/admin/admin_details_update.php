<?php
require("db_connection.php");
$ad_id=$_POST["ad_id"];
$ad_name=$_POST["ad_name"];
$ad_contact=$_POST["ad_contact"];
$ad_email_id=$_POST["ad_email_id"];
$ad_address=$_POST["ad_address"];
$ad_username=$_POST["ad_username"];
$ad_password=$_POST["ad_password"];
$ad_date=$_POST["ad_date"];

$sql=$conn->prepare("UPDATE admin_details SET ad_name=?,ad_contact=?,ad_email_id=?,ad_address=?,ad_username=? where ad_id=?");
$sql->bind_param("sisssi",$ad_name,$ad_contact,$ad_email_id,$ad_address,
                 $ad_username,$ad_id);
if($sql->execute())
{
    echo"<script type='text/javascript'>alert('SUCCESSFULLY UPDATED');window.location='admin_details_view.php';</script>";
}
else
{
    echo"<script type='text/javascript'>alert('SUCCESSFULLY NOT UPDATED');window.location='admin_details_view.php';</script>";
}
?>