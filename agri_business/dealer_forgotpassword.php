<!DOCTYPE html>
<html lang="en">
<head>
	<?php require("1_metatags.php"); ?>
</head>

<body class="">
	<div class="site-wrapper">
	<?php require("2_header.php"); ?>
	
<nav aria-label="breadcrumb" class="breadcrumb-wrapper">
	<div class="container">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="index.php">Home</a></li>
			<li class="breadcrumb-item active" aria-current="page">Login</li>
		</ol>
	</div>
</nav>
    <!--=============================================
    =            Login Register page content         =
    =============================================-->

    <main class="page-section pb--10 pt--50">
		<div class="container">
			<header class="entry-header">
<!--				<h1 class="entry-title">My Account</h1>-->
			</header>
			<div class="row">
<?php 
include('db_connection.php');   
if(isset($_POST['submit']))
{
$contact_no=$_POST["cd_contact"];
$sql=$conn->prepare("SELECT * FROM dealers_details WHERE dd_contact=?");   
$sql->bind_param("i",$contact_no);
$sql->execute();
$result=$sql->get_result();
$row=$result->fetch_assoc();
$fullname=$row['dd_name'];    
if($result->num_rows==1)
{
$username=$row['dd_user_name'];    
$rndno=rand(1000, 9999);
$message = "$fullname Your OTP is $rndno";
$data=urlencode($message);
$sms_url="http://bhashsms.com/api/sendmsg.php?user=innovics&pass=Inn0vic$123&sender=INVSIT&phone=$contact_no&text=$data&priority=ndnd&stype=normal";
$content = file_get_contents($sms_url);
$_SESSION['username']=$username;
$_SESSION['contact_no']=$contact_no;
$_SESSION['otp_generated']=$rndno;   
echo '<script type="text/javascript">	
window.location="dealer_forgotpassword_otp.php";
</script>';
}
else
{
echo '<script type="text/javascript">
alert("Mobile Number Not Found");
window.location="dealer_forgotpassword.php";
</script>';
}  
}
?><div class="col-sm-12 col-md-12 col-xs-12 col-lg-3 mb-30">
                </div>
				<div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30">
					<!-- Login Form s-->
        <form action="dealer_forgotpassword.php" method="post" onsubmit="return ValidateForm()">

						<h4 class="login-title">FORGOT PASSWORD</h4>
						<div class="login-form">
							<div class="row">
						
    <div class="col-md-12 col-12 mb--20">
        <label>Enter Registered Phone Number</label>
        <input class="form-control" type="text" placeholder="Enter Phone number" name="cd_contact" id="cd_contact">
        <span id="cd_contact_error"></span>
    </div>
    <div class="col-md-12">
        <div class="d-flex align-items-center flex-wrap">
        <button type="submit" class="btn btn-black   mr-3" name="submit">SEND OTP</button>

        </div>
    </div>

							</div>
						</div>

					</form>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-3 col-xs-12">
			
				</div>
			</div>
		</div>
	</main>

	<!--=====  End of Login Register page content  ======-->
  
  
<?php require("3_footer.php"); ?>
    
</div>
    <?php require("4_footer_scripts.php"); ?>
    <script type="text/javascript">
        function ValidateForm()
        {
            var cd_contact = '';
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
