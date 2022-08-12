<?php
session_start();
    require("../db_connection.php");

   $ad_username=$_POST["ad_username"];
      $ad_password=$_POST["ad_password"];

    $SQL=$conn->prepare(" SELECT * FROM admin_details WHERE ad_username=? ");

    $SQL->bind_param("s",$ad_username);

    $SQL->execute();

    $result=$SQL->get_result();

    if($result->num_rows > 0)
    { 
        $row=$result->fetch_assoc();
        if($ad_password == $row['ad_password'])
        {       
            $_SESSION['ad_username']=$ad_username;
                header('location:../admin/index.php');
        }
        else
        {
                echo "<script type='text/javascript'>
                        alert('USERNAME AND PASSWORD INVALID');
                      window.location='index.php';
                        </script>";
        }
       
    }
    else
    {
        echo "<script type='text/javascript'>
            alert('USERNAME AND PASSWORD INVALID');
           window.location='index.php';
            </script>";
    }

?>
