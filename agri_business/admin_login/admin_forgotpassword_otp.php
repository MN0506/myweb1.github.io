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
            <div class="hpanel">
                <div class="panel-body">
                        <form action="admin_forgotpassword_otp_check.php" method="post" autocomplete="off" onsubmit="return ValidateForm()">
                <div class="form-group">
                   <label>Enter OTP</label>
                    <input class="form-control" type="text" name="otp" id="otp" placeholder="Enter OTP">
                    <span id="otp_error"></span>
                </div>
                <div class="form-group">
                   <label>Enter New Password</label>
                    <input class="form-control" type="text" name="new_password" id="new_password" placeholder="Enter New Password">
                    <span id="new_password_error"></span>
                </div>
                <div class="form-group">
                   <label>Enter Confirm Password</label>
                    <input class="form-control" type="text" name="confirm_password" id="confirm_password" placeholder="Enter Confirm Password">
                    <span id="confirm_password_error"></span>
                </div>
                
                <div class="text-center">
                  <button type="submit" class="btn btn-success btn-block" name="submit" value="submit" >CHANGE PASSWORD</button>
                </div>
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
        var otp = '';                
        var new_password = '';                
        var confirm_password = '';                

        otp = fieldrequired('otp', 'otp_error', 'OTP');
        new_password = pasword('new_password', 'new_password_error', 'New Password');
        confirm_password = fieldrequired('confirm_password', 'confirm_password_error', 'Confirm Password');

        if (otp == 1 && new_password == 1 && confirm_password == 1) 
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
