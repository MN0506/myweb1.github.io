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
<form class="login_form row" method="post" action="customer_forgotpassword_otp_check.php" onsubmit="return ValidateForm()">
<div class="login-form">
<h4 class="login-title">Forgot Password</h4>

<div class="row">

<div class="col-md-12 col-12 mb-20">
<label>OTP</label>
<input class="mb-0" type="text" placeholder="Enter OTP" name="otp" id="otp">
<span id="otp_error"></span>
</div>

<div class="col-md-12 col-12 mb-20">
<label>NEW PASSWORD</label>
    <input class="mb-0" type="text" placeholder="Enter New Password" name="new_password" id="new_password">
    <span id="new_password_error"></span>
</div>

<div class="col-md-12 col-12 mb-20">
<label>CONFIRM PASSWORD</label>
<input class="mb-0" type="text" placeholder="Enter Confirm Password" name="confirm_password" id="confirm_password">
<span id="confirm_password_error"></span>
</div>

<div class="col-md-12">
<input type="hidden" id="action" name="action" value="Add">
<button class="register-button mt-0" type="submit" name="submit">CHANGE PASSWORD</button>
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
var otp = '';
var new_password = '';
var confirm_password = '';
var action = document.getElementById('action').value;
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