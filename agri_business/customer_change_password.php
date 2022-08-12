<?php
    session_start();
    require("db_connection.php");
    require("5_session_data.php");
    
    $old_password=$_POST['old_password'];
    $new_password=$_POST['new_password'];
    $confirm_password=$_POST['confirm_password'];
    $confirm_password_enc=base64_encode($confirm_password);

    if($old_password==$password)
    {        
        if($new_password==$confirm_password)
        {

            $sql1=$conn->prepare("UPDATE customer_details SET cd_password=? WHERE cd_id=?");
            $sql1->bind_param("si",$confirm_password_enc,$cd_id);
            if($sql1->execute())
            {
            echo '<script type="text/javascript">
            alert("Password Changed Successfully");
            history.back();
            </script>';
            }
            else
            {
            echo '<script type="text/javascript">
            alert("Password Not Changed");
            history.back();
            </script>';
            }    
            ?>
            <?php
        }
        else
        {
            echo '<script type="text/javascript">
            alert("New Password & Confirm Password Do Not Match");
            history.back();
            </script>';
        }
    }
    else{
            echo '<script type="text/javascript">
            alert("Old Password Do Not Match");
            history.back();
            </script>';
    }
?>
