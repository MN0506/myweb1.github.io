<?php
session_start();
require('db_connection.php');
require('5_session_data.php');

$cd_name=$_POST["cd_name"];
$cd_contact=$_POST["cd_contact"];
$cd_email_id=$_POST["cd_email_id"];
$cd_address=$_POST["cd_address"];
$cd_username=$_POST["cd_username"];
$cd_date=date("Y-m-d");

$sql1=$conn->prepare("SELECT * FROM customer_details WHERE cd_contact=? AND cd_id!=? ");
$sql1->bind_param("ii",$cd_contact,$cd_id);
$sql1->execute();
$result1=$sql1->get_result();

$sql2=$conn->prepare("SELECT * FROM customer_details WHERE cd_email_id=? AND cd_id!=?");
$sql2->bind_param("si",$cd_email_id,$cd_id);
$sql2->execute();
$result2=$sql2->get_result();

$sql3=$conn->prepare("SELECT * FROM customer_details WHERE cd_username=? AND cd_id!=?");
$sql3->bind_param("si",$cd_username,$cd_id);
$sql3->execute();
$result3=$sql3->get_result();  

if($result1->num_rows>0)
{
  echo"<script type='text/javascript'>
    alert('CONTACT ALREADY EXISTS');
    history.back();
    </script>";  
}
else if($result2->num_rows>0)
{
  echo"<script type='text/javascript'>
    alert('EMAIL ID ALREADY EXISTS');
    history.back();
    </script>";  
}

else if($result3->num_rows>0)
{
  echo"<script type='text/javascript'>
    alert('USERNAME ALREADY EXISTS');
    history.back();
    </script>";  
}
else
{

$sql=$conn->prepare("UPDATE customer_details SET cd_name=?,cd_contact=?,cd_email_id=?,cd_address=?,cd_username=?,cd_date=? WHERE cd_id=?");
$sql->bind_param("sissssi",$cd_name,$cd_contact,$cd_email_id,$cd_address,$cd_username,$cd_date,$cd_id);
if($sql->execute())
{
    echo "<script type='text/javascript'>alert('Profile Updated Successfully');
         history.back();
        </script>";
}
else
{
    echo "<script type='text/javascript'>alert('Profile Not Updated');
        history.back();
        </script>";
}
}
?>