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
			<li class="breadcrumb-item active" aria-current="page">Dealer Login</li>
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
				<div class="col-sm-12 col-md-12 col-xs-12 col-lg-4 mb-30">
					<!-- Login Form s-->
					<form action="dealers_login_check.php" method="post" onsubmit="return validateloginform()">

						<h4 class="login-title">Login</h4>
						<div class="login-form">
							<div class="row">
							<?php 
if(isset($_POST["product_details_url"])){
?>
<input type="hidden" name="product_details_url" value="<?php echo $_POST['product_details_url'];?>">                                
<?php
}else
{
?>                                
<input type="hidden" name="product_details_url" value="NAN">                                    
<?php
}
?>
    <div class="col-md-12 col-12 mb--20">
        <label>Username</label>
        <input class="form-control" type="text" name="login_dealer_username" id="login_dealer_username">
        <span id="login_dealer_username_error"></span>
    </div>
    <div class="col-12 mb--20">
        <label>Password</label>
        <input class="form-control" type="password" name="login_dealer_password" id="login_dealer_password">
        <span id="login_dealer_password_error"></span>
    </div>
    <div class="col-md-12">
        <div class="d-flex align-items-center flex-wrap">
        <button type="submit" class="btn btn-black   mr-3">Login</button>

        </div>
        <p><a href="dealer_forgotpassword.php" class="pass-lost mt-3">Lost your password?</a></p>
    </div>

							</div>
						</div>

					</form>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-8 col-xs-12">
					<form action="admin/dealers_details_insert.php" method="post" onsubmit="return validateregisterform()">

						<h4 class="login-title">Register</h4>
						<div class="login-form">
							<div class="row">
								<div class="col-md-6 col-12 mb--20">
									<label>NAME</label>
									<input class="form-control" type="text" name="dd_name" id="dd_name">
									<span id="dd_name_error"></span>
								</div>
								<div class="col-md-6 col-12 mb--20">
									<label>CONTACT</label>
									<input class="form-control" type="text" name="dd_contact" id="dd_contact">
									<span id="dd_contact_error"></span>
								</div>
								<div class="col-md-6 col-12 mb--20">
									<label>EMAIL</label>
									<input class="form-control" type="text" name="dd_email_id" id="dd_email_id">
									<span id="dd_email_id_error"></span>
								</div>
								<div class="col-md-6 col-12 mb--20">
									<label>ADDRESS</label>
                                    <textarea class="form-control" type="text" name="dd_address" id="dd_address"></textarea>
									<span id="dd_address_error"></span>
								</div>
								<div class="col-md-6 col-12 mb--20">
									<label>USERNAME</label>
									<input class="form-control" type="text" name="dd_user_name" id="dd_user_name">
									<span id="dd_user_name_error"></span>
								</div>
								<div class="col-md-6 col-12 mb--20">
									<label>PASSWORD</label>
									<input class="form-control" type="password" name="dd_password" id="dd_password">
									<span id="dd_password_error"></span>
								</div>
								<div class="col-md-6 col-12 mb--20">
<!--									<label>DATE</label>-->
									<input class="form-control" type="hidden" name="dd_date" id="dd_date" value="<?php echo date('Y-m-d');?>">
									
								</div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-black">Register</button>
                                </div>
						</div>
					</div>
					</form>
				</div>
			</div>
		</div>
	</main>

	<!--=====  End of Login Register page content  ======-->
  
  
<?php require("3_footer.php"); ?>
    
</div>
    <?php require("4_footer_scripts.php"); ?>
    <script type="text/javascript">
        function validateloginform()
        {
            var login_dealer_username = '';
            var login_dealer_password = '';

            login_dealer_username = fieldrequired('login_dealer_username', 'login_dealer_username_error', 'Username');
            login_dealer_password = fieldrequired('login_dealer_password', 'login_dealer_password_error', 'Password');

        if (login_dealer_username == 1 && login_dealer_password == 1) 
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        function validateregisterform()
        {
            var dd_name = '';
            var dd_contact = '';
            var dd_email_id = '';
            var dd_address = '';
            var dd_user_name = '';
            var dd_password = '';
            dd_name = alphabets('dd_name', 'dd_name_error', 'Name');
            dd_contact = phoneno('dd_contact', 'dd_contact_error', 'Contact No.');
            dd_email_id = emailid('dd_email_id', 'dd_email_id_error', 'Email Id');
            dd_address = fieldrequired('dd_address', 'dd_address_error', 'Address');
            dd_user_name = fieldrequired('dd_user_name', 'dd_user_name_error', 'Username');
            dd_password = pasword('dd_password', 'dd_password_error', 'Password');

            if (dd_name == 1 && dd_contact == 1 && dd_email_id == 1 && dd_address== 1 && dd_user_name == 1 && dd_password == 1 ) 
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