<!DOCTYPE html>
<html>
<?php require('1_metatags.php'); ?>
<body class="light-skin blank">

<!-- Simple splash screen-->
<div class="splash"> <div class="color-line"></div><div class="splash-title"><h1>Homer - Responsive Admin Theme</h1><p>Special Admin Theme for small and medium webapp with very clean and aesthetic style and feel. </p><div class="spinner"> <div class="rect1"></div> <div class="rect2"></div> <div class="rect3"></div> <div class="rect4"></div> <div class="rect5"></div> </div> </div> </div>
<!--[if lt IE 7]>
<p class="alert alert-danger">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<div class="color-line"></div>

<div class="back-link">
    <a href="index.php" class="btn btn-primary">Back to LOGIN PAGE</a>
</div>

<div class="login-container">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center m-b-md">
                <h3>FORGOT PASSWORD</h3>
                
            </div>
<?php 
include('../db_connection.php');
        session_start();
if(isset($_POST['submit']))
{
$contact_no=$_POST["ad_contact"];
$sql=$conn->prepare("SELECT * FROM admin_details WHERE ad_contact=?");   
$sql->bind_param("i",$contact_no);
$sql->execute();
$result=$sql->get_result();
$row=$result->fetch_assoc();
$fullname=$row['ad_name'];    
if($result->num_rows==1)
{
$username=$row['ad_username'];    
$rndno=rand(1000, 9999);
$message = "$fullname Your OTP is $rndno";
$data=urlencode($message);
$sms_url="http://bhashsms.com/api/sendmsg.php?user=innovics&pass=Inn0vic$123&sender=INVSIT&phone=$contact_no&text=$data&priority=ndnd&stype=normal";
$content = file_get_contents($sms_url);
$_SESSION['username']=$username;
$_SESSION['contact_no']=$contact_no;
$_SESSION['otp_generated']=$rndno;   
echo '<script type="text/javascript">	
window.location="admin_forgotpassword_otp.php";
</script>';
}
else
{
echo '<script type="text/javascript">
alert("Mobile Number Not Found");
window.location="admin_forgotpassword.php";
</script>';
}  
}
?>       
            <div class="hpanel">
                <div class="panel-body">
                        <form action="admin_forgotpassword.php" id="loginForm" method="post" onsubmit="return ValidateForm() ">
                            <div class="form-group">
                                <label class="control-label" for="username">Enter Registered Mobile Number</label>
                                <input type="text" placeholder="Mobile Number" name="ad_contact" id="ad_contact" class="form-control">
                                <span id="ad_contact_error"></span>
                            </div>
                            <button type="submit" class="btn btn-success btn-block" name="submit" id="submit">SEND OTP</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require('2_footer_scripts.php'); ?>

<script type="text/javascript">
    function ValidateForm()
    {
        var ad_contact = '';                

        ad_contact = fieldrequired('ad_contact', 'ad_contact_error', 'Contact');

        if (ad_contact == 1) 
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