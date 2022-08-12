<?php
require("db_connection.php");
session_start();
$dd_username=$_POST["login_dd_name"];
$dd_password=$_POST["login_dd_password"];
$sql=$conn->prepare("SELECT * FROM dealers_details WHERE dd_name=?");
$sql->bind_param("s",$dd_name);
$sql->execute();
$result=$sql->get_result();
$row=$result->fetch_assoc();
$enc_password=$row['dd_password'];
$dec_password=base64_decode($enc_password);  
$url=$_POST["product_details_url"];
if($dd_password==$dec_password)
{
    $_SESSION['dealer']=$dd_name;                
    if($url!="NAN")
    {
        header('Location: '.$url);
    }
    else
    {
        header('Location:index.php');
    }
}
else
{
    echo "<script type='text/javascript'>
            alert('USERNAME AND PASSWORD INVALID');
            window.location='dealers_login_register.php';
            </script>";    
}
?>
