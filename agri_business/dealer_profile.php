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
			<li class="breadcrumb-item active" aria-current="page">Profile Details</li>
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
					<form action="dealer_change_password.php" method="post" onsubmit="return validateloginform()">

						<h4 class="login-title">CHANGE PASSWORD</h4>
						<div class="login-form">
							<div class="row">
							
    <div class="col-md-12 col-12 mb-20">
                                    <label>Old Password</label>
                                    <input class="form-control" type="password" placeholder="Enter Old Password" name="old_password" id="old_password">
                                    <span id="old_password_error"></span>
                                </div>
                                <div class="col-12 mb-20">
                                    <label>New Password</label>
                                    <input class="form-control" type="password" placeholder="Enter New Password" name="new_password" id="new_password">
                                    <span id="new_password_error"></span>
                                </div>
                                <div class="col-12 mb-20">
                                    <label>Confirm Password</label>
                                    <input class="form-control" type="password" placeholder="Enter Confirm Password" name="confirm_password" id="confirm_password">
                                    <span id="confirm_password_error"></span>
                                </div>
                <div class="col-md-12">
                <div class="d-flex align-items-center flex-wrap">
                <button type="submit" class="btn btn-black   mr-3">CHANGE PASSWORD</button>
										
									</div>
								</div>

							</div>
						</div>

					</form>
				</div>
<?php require("4_dealers_session_data.php");    ?>
				<div class="col-sm-12 col-md-12 col-lg-8 col-xs-12">
					<form action="dealer_profile_update.php" method="post" onsubmit="return validateregisterform()">

						<h4 class="login-title">PROFILE</h4>
						<div class="login-form">
							<div class="row">
								<div class="col-md-6 col-12 mb--20">
									<label>NAME</label>
									<input class="form-control" type="text" name="dd_name" id="dd_name" value="<?php echo $dealerrow['dd_name']; ?>">
									<span id="dd_name_error"></span>
								</div>
								<div class="col-md-6 col-12 mb--20">
									<label>CONTACT</label>
									<input class="form-control" type="text" name="dd_contact" id="dd_contact" value="<?php echo $dealerrow['dd_contact']; ?>">
									<span id="dd_contact_error"></span>
								</div>
								<div class="col-md-6 col-12 mb--20">
									<label>EMAIL</label>
									<input class="form-control" type="text" name="dd_email_id" id="dd_email_id" value="<?php echo $dealerrow['dd_email_id']; ?>" >
									<span id="dd_email_id_error"></span>
								</div>
								<div class="col-md-6 col-12 mb--20">
									<label>ADDRESS</label>
                                    <textarea class="form-control" type="text" name="dd_address" id="dd_address"><?php echo $dealerrow['dd_address']; ?></textarea>
									<span id="dd_address_error"></span>
								</div>
								<div class="col-md-6 col-12 mb--20">
<!--									<label>DATE</label>-->
									<input class="form-control" type="hidden" name="dd_date" id="dd_date" value="<?php echo date('Y-m-d');?>">
									
								</div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-black">UPDATE</button>
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
            var old_password = '';
            var new_password = '';                
            var confirm_password = '';                

            old_password = fieldrequired('old_password', 'old_password_error', 'Old Password');
            new_password = pasword('new_password', 'new_password_error', 'New Password');
            confirm_password = fieldrequired('confirm_password', 'confirm_password_error', 'Confirm Password');

            if (old_password == 1 && new_password == 1 && confirm_password == 1) 
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

            dd_name = alphabets('dd_name', 'dd_name_error', 'Name');
            dd_contact = phoneno('dd_contact', 'dd_contact_error', 'Contact No.');
            dd_email_id = emailid('dd_email_id', 'dd_email_id_error', 'Email Id');
            dd_address = fieldrequired('dd_address', 'dd_address_error', 'Address');

            if (dd_name == 1 && dd_contact == 1 && dd_email_id == 1 && dd_address== 1  ) 
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