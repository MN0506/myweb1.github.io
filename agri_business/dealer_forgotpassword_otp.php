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
                <div class="col-sm-12 col-md-12 col-xs-12 col-lg-3 mb-30">
                </div>
				<div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30">
					<!-- Login Form s-->
        <form action="dealer_forgotpassword_otp_check.php" onsubmit="return ValidateForm()" method="post">

						<h4 class="login-title">FORGOT PASSWORD</h4>
						<div class="login-form">
							<div class="row">
						
    <div class="col-md-12 col-12 mb--20">
        <label>OTP</label>
        <input class="form-control" type="text" placeholder="Enter OTP" name="otp" id="otp">
        <span id="otp_error"></span> 
    </div>
     <div class="col-md-12 col-12 mb--20">
        <label>NEW PASSWORD</label>
        <input class="form-control" type="password" placeholder="Enter New Password" name="new_password" id="new_password">
        <span id="new_password_error"></span>
    </div>
     <div class="col-md-12 col-12 mb--20">
        <label>CONFIRM PASSWORD</label>
            <input class="form-control" type="password" placeholder="Enter Confirm Password" name="confirm_password" id="confirm_password">
            <span id="confirm_password_error"></span>
    </div>
    <div class="col-md-12">
        <div class="d-flex align-items-center flex-wrap">
        <button type="submit" class="btn btn-black   mr-3" name="submit">CHANGE</button>

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
            var otp = '';
            var new_password = '';
            var confirm_password = '';
            otp = numbers('otp', 'otp_error', 'OTP');
            new_password = fieldrequired('new_password', 'new_password_error', 'New Password');
            confirm_password = fieldrequired('confirm_password', 'confirm_password_error', 'Confirm Password');
            if (otp == 1 && new_password == 1 && confirm_password ==1) 
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

