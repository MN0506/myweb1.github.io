<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
<?php require("1_metatags.php"); ?>
</head>
<body>
<?php require("2_header.php"); ?>
<div class="breadcrumb-area pt-10 pb-10 border-bottom mb-40">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="breadcrumb-content">
<ul>
<li class="has-child"><a href="index.php">Home</a></li>
<li>Forgot Password</li>
</ul>
</div>
</div>
</div>
</div>
</div>
<div class="page-section pb-40">
<div class="container">
<div class="row">
<div class="col-sm-3 col-md-3 col-xs-6 col-lg-3 mb-30"></div>
<div class="col-sm-6 col-md-6 col-xs-6 col-lg-6 mb-30">
<!-- Login Form s-->
<?php 
include('db_connection.php');   
if(isset($_POST['submit']))
{
$contact_no=$_POST["cd_contact"];
$sql=$conn->prepare("SELECT * FROM customer_details WHERE cd_contact=?");   
$sql->bind_param("i",$contact_no);
$sql->execute();
$result=$sql->get_result();
$row=$result->fetch_assoc();
$fullname=$row['cd_name'];    
if($result->num_rows==1)
{
$username=$row['cd_username'];    
$rndno=rand(1000, 9999);
$message = "$fullname Your OTP is $rndno";
$data=urlencode($message);
$sms_url="http://bhashsms.com/api/sendmsg.php?user=innovics&pass=Inn0vic$123&sender=INVSIT&phone=$contact_no&text=$data&priority=ndnd&stype=normal";
$content = file_get_contents($sms_url);
$_SESSION['username']=$username;
$_SESSION['contact_no']=$contact_no;
$_SESSION['otp_generated']=$rndno;   
echo '<script type="text/javascript">	
window.location="customer_forgotpassword_otp.php";
</script>';
}
else
{
echo '<script type="text/javascript">
alert("Mobile Number Not Found");
window.location="customer_forgotpassword.php";
</script>';
}  
}
?>

<form class="login_form row" method="post" action="customer_forgotpassword.php" onsubmit="return ValidateForm()">
<div class="login-form">
<h4 class="login-title">Forgot Password</h4>
<div class="row">
<div class="col-md-12 col-12 mb-20">
<label>Enter Registered Phone Number</label>
    <input class="mb-0" type="text" placeholder="Enter Phone number" name="cd_contact" id="cd_contact">
    <span id="cd_contact_error"></span>
</div>
<div class="col-md-12">
<input type="hidden" id="action" name="action" value="Add">
<button class="register-button mt-0" type="submit" name="submit">SEND OTP</button>
</div>

</div>
</div>

</form>
</div>

</div>
</div>
</div>
<?php require("3_footer.php"); ?>
<a href="#" class="scroll-top"></a>
<?php require("4_footer_scripts.php"); ?>
<script type="text/javascript">
function ValidateForm()
{                
    var cd_contact = '';
    var action = document.getElementById('action').value;
    cd_contact = phoneno('cd_contact', 'cd_contact_error', 'Contact Number');
    if (cd_contact == 1) 
{
return true;
}
else
{
return false;
}
}
</script>
</body>
</html>        

