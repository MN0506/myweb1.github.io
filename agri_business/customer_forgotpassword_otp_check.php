<?php 
session_start();
include('db_connection.php');
$otp_generated=$_SESSION['otp_generated'];
$username=$_SESSION['username'];
$contact=$_SESSION['contact_no'];
$otp=$_POST['otp'];
$new_password=$_POST['new_password'];
$confirm_password=$_POST['confirm_password'];
$enc_password=base64_encode($confirm_password);

   if($otp==$otp_generated)
   {
         
    if($new_password==$confirm_password)
    {
        $sql=$conn->prepare("SELECT * FROM customer_details WHERE cd_username=?");   
        $sql->bind_param("s",$username);
        $sql->execute();
        $result=$sql->get_result();
        $row=$result->fetch_assoc();
        $cu_id=$row['cd_id'];               	
        $sql1=$conn->prepare("UPDATE customer_details SET cd_password=? WHERE cd_id=?");
        $sql1->bind_param("si",$enc_password,$cu_id);
        if($sql1->execute())
        {            
            echo '<script type="text/javascript">
	        alert("Password Changed Successfully!!!!");
	        window.location="customer_register_login.php";
	        </script>';            
        }
        else
        {
            echo '<script type="text/javascript">
	        alert("Error in Changing Password Try Again!!!!");
	        window.location="customer_register_login.php";
	        </script>';                
        }
        
    }
   else
   {
      
 	echo '<script type="text/javascript">
	alert("NewPassword & Confirm Password Does Not Match!!!!");
	window.location="customer_forgotpassword_otp.php";
	</script>';
      
   }
}
else{
 	echo '<script type="text/javascript">
	alert("Invalid OTP!!!!");
	window.location="customer_forgotpassword_otp.php";
	</script>';
}
?>