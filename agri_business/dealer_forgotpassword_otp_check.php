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
        $sql=$conn->prepare("SELECT * FROM dealers_details WHERE dd_user_name=?");   
        $sql->bind_param("s",$username);
        $sql->execute();
        $result=$sql->get_result();
        $row=$result->fetch_assoc();
        $dd_id=$row['dd_id'];               	
        $sql1=$conn->prepare("UPDATE dealers_details SET dd_password=? WHERE dd_id=?");
        $sql1->bind_param("si",$enc_password,$dd_id);
        if($sql1->execute())
        {            
            echo '<script type="text/javascript">
	        alert("Password Changed Successfully!!!!");
	        window.location="dealers_login_register.php";
	        </script>';            
        }
        else
        {
            echo '<script type="text/javascript">
	        alert("Error in Changing Password Try Again!!!!");
	        window.location="dealer_login_register.php";
	        </script>';                
        }
        
    }
   else
   {
      
 	echo '<script type="text/javascript">
	alert("NewPassword & Confirm Password Does Not Match!!!!");
	window.location="dealer_forgotpassword_otp.php";
	</script>';
      
   }
}
else{
 	echo '<script type="text/javascript">
	alert("Invalid OTP!!!!");
	window.location="dealer_forgotpassword_otp.php";
	</script>';
}
?>