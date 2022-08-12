<?php
require("db_connection.php");
$cd_id=$_POST["cd_id"];
$cd_name=$_POST["cd_name"];
$cd_contact=$_POST["cd_contact"];
$cd_email_id=$_POST["cd_email_id"];
$cd_address=$_POST["cd_address"];
$cd_username=$_POST["cd_username"];
$cd_password=$_POST["cd_password"];
$cd_date=$_POST["cd_date"];

$sql=$conn->prepare("UPDATE customer_details SET cd_name=?,cd_contact=?,cd_email_id=?,cd_address=?,cd_username=? where cd_id=?");
$sql->bind_param("sisssi",$cd_name,$cd_contact,$cd_email_id,$cd_address,
                 $cd_username,$cd_id);
if($sql->execute())
{
    echo"<script type='text/javascript'>alert('SUCCESSFULLY UPDATED');window.location='customer_details_view.php';</script>";
}
else
{
    echo"<script type='text/javascript'>alert('SUCCESSFULLY NOT UPDATED');window.location='customer_details_view.php';</script>";
}
?>