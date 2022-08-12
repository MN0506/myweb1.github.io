<?php

    require("../db_connection.php");
    session_start();
    $ad_user_name=$_POST["cd_username"];
    $ad_password=$_POST["cd_password"];
    $sql=$conn->prepare("SELECT * FROM customer_details WHERE cd_username=?");
    $sql->bind_param("s",$ad_user_name);
    $sql->execute();
    $result=$sql->get_result();
    $row=$result->fetch_assoc();
    $enc_password=$row['cd_password'];
    $dec_password=$enc_password;    
    $url=$_POST["product_details_url"];
    //header('Location: '.$newURL);
    if($ad_password==$dec_password)
    {
        $_SESSION['grow_smart_customer']=$ad_user_name;                
        if($url!="NAN"){
        header('Location: '.$url);
        }else{
        header('Location:../index.php');
        }
    }
    else
    {
            echo "<script type='text/javascript'>
            alert('USERNAME AND PASSWORD INVALID');
            window.location='../customer_register_login.php';
            </script>";    
    }

?>
