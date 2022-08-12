<?php
if(isset($_SESSION['grow_smart_customer']) && $_SESSION['grow_smart_customer']!="")
{
require("db_connection.php");
  $customer_session=TRUE;  
$sql=$conn->prepare("SELECT * FROM customer_details WHERE cd_username=?");
$sql->bind_param("s",$_SESSION["grow_smart_customer"]);
$sql->execute();
$result=$sql->get_result();
$row=$result->fetch_assoc();
$fullname=$row["cd_name"];
$cd_id=$row['cd_id'];
$password_enc=$row['cd_password'];
$password=base64_decode($password_enc);
}
else
{
    $customer_session=FALSE;
}
?>