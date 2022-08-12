<?php
require("db_connection.php");
$ad_name=$_POST["ad_name"];
$ad_contact=$_POST["ad_contact"];
$ad_email_id=$_POST["ad_email_id"];
$ad_address=$_POST["ad_address"];
$ad_username=$_POST["ad_username"];
$ad_password=base64_encode($_POST["ad_password"]);
$ad_date=$_POST["ad_date"];

$sql=$conn->prepare("insert into admin_details(ad_name,ad_contact,ad_email_id,ad_address,ad_username,
ad_password,ad_date)VALUES(?,?,?,?,?,?,?)");
$sql->bind_param("sisssss",$ad_name,$ad_contact,$ad_email_id,$ad_address,
                 $ad_username,$ad_password,$ad_date);
if($sql->execute())
{
    echo"<script type='text/javascript'>alert('SUCCESSFULLY INSERTED');window.location='admin_details_view.php';</script>";
}
else
{
    echo"<script type='text/javascript'>alert('SUCCESSFULLY NOT INSERTED');window.location='admin_details_view.php';</script>";
}
?>