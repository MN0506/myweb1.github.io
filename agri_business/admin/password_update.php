<?php
    session_start();
    require("db_connection.php");

    $uname=$_SESSION['ad_username'];
    $old_password=$_POST['old_password'];
    $new_password=$_POST['new_password'];
    $c_newpassword=$_POST['c_newpassword'];
    $ad_date=date('Y-m-d');

    if($new_password == $c_newpassword)
    {
        $new_password_encode=base64_encode($new_password);
        $sql=$conn->prepare("SELECT * FROM admin_details WHERE ad_username = ?");
        $sql->bind_param("s",$uname);
        $sql->execute();
        $result=$sql->get_result();
        $row=$result->fetch_assoc();

        if($old_password == base64_decode($row['ad_password']))
        {
            $sql1=$conn->prepare("UPDATE admin_details SET ad_password=?,ad_date=? WHERE ad_username=?");
            $sql1->bind_param("sss",$new_password_encode,$ad_date,$uname);
            if($sql1->execute())
            {
                echo "<script type='text/javascript'>
                    alert('Password Updated');
                    window.location='index.php';
                </script>";

            }
            else
            {
                echo "<script type='text/javascript'>
                    alert('Password Not Updated');
                    window.location='change_password.php';
                </script>";
            }
        }
        else
        {
            echo "<script type='text/javascript'>
            alert('Old Password Is Invalid');
                window.location='change_password.php';
            </script>";
        }
    }
    else
    {
        echo "<script type='text/javascript'>
            alert('Password Does Not Match');
                window.location='change_password.php';
            </script>";
    }
?>