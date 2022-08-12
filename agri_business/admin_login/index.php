<!DOCTYPE html>
<html>
<?php require('1_metatags.php'); ?>
<link rel="stylesheet" type="text/css" href="l.css">
<body class="light-skin blank">
<!-- Simple splash screen-->
   <div class="splash">
    <div class="color-line"></div>
    <div class="splash-title">
        <h1>Homer - Responsive Admin Theme</h1>
        <p>Special Admin Theme for small and medium webapp with very clean and aesthetic style and feel. </p>
        <div class="spinner">
            <div class="rect1"></div>
            <div class="rect2"></div>
            <div class="rect3"></div>
            <div class="rect4"></div>
            <div class="rect5"></div>
        </div>
    </div>
</div>
<!--[if lt IE 7]>
<p class="alert alert-danger">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<div class="color-line"></div>

<div class="back-link">
    <a href="index.php" class="btn btn-primary">Back to HOME PAGE</a>
</div>

<div class="login-container">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center m-b-md">
                <h3>ENTER LOGIN DETAILS</h3>
                <font color='red'></font>
            </div>
            
            <div class="hpanel">
                <div class="panel-body">
                        <form action="admin_logcheck.php" id="loginForm" method="post" onsubmit="return ValidateLoginForm() ">
                            <div class="form-group">
                               <img src="../assets/img/l1.png">
                                <label class="control-label" for="username">Username</label>
                                <input type="text" placeholder="Username" name="ad_username" id="ad_username" class="form-control">
                                <span id="ad_username_error"></span>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <input type="text" placeholder="Password" name="ad_password" id="ad_password" class="form-control">
                                <span id="ad_password_error"></span>
                            </div>
                            <button type="submit" class="btn btn-success btn-block">Login</button>
                            <a class="btn btn-default btn-block" href="admin_forgotpassword.php">FORGOT PASSWORD</a>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require('2_footer_scripts.php'); ?>

<script type="text/javascript">
    function ValidateLoginForm()
    {
        var ad_username = '';
        var ad_password = '';
        ad_username=fieldrequired('ad_username','ad_username_error','Username');
        ad_password=fieldrequired('ad_password','ad_password_error','Password');

        if(ad_username==1  && ad_password==1)
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
