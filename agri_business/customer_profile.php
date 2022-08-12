<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
	<?php require("1_metatags.php"); ?>
</head>

<body>
    
    <!--====================  Header area ====================-->
    
    <?php require("2_header.php"); ?>
    <?php include_once('5_session_data.php');?>
    
    <!--====================  End of Header area  ====================-->
    

    <!--====================  breadcrumb area ====================-->
    
    <div class="breadcrumb-area pt-10 pb-10 border-bottom mb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!--=======  breadcrumb content  =======-->
                    
                    <div class="breadcrumb-content">
                        <ul>
                            <li class="has-child"><a href="index.php">Home</a></li>
                            <li>Login Register</li>
                        </ul>
                    </div>
                    
                    <!--=======  End of breadcrumb content  =======-->
                </div>
            </div>
        </div>
    </div>
    
    <!--====================  End of breadcrumb area  ====================-->

    <!--==================== page content ====================-->
    
    <div class="page-section pb-40">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-xs-12 col-lg-4 mb-30">
                    <!-- Login Form s-->
                    <form action="customer_change_password.php" method="post" onsubmit="return ValidatePasswordForm() ">

                        <div class="login-form1">
                            <h4 class="login-title">Change Password</h4>
                        
                            <div class="row">
                               <div class="col-md-12 col-12 mb-20">
                                            <label>Name</label>
                                            <input class="form-control" type="text"  name="cd_name" id="cd_name" value="<?php echo $fullname;?>" readonly >
                                            <span id="cd_name_error"></span>
                                        </div>
                                <div class="col-12 mb-20">
                                    <label>Old Password</label>
                                    <input class="form-control" type="password"  name="old_password" id="old_password" placeholder="Password">
                                    <span id="old_password_error"></span>
                                </div>
                                <div class="col-12 mb-20">
                                    <label>New Password</label>
                                    <input class="form-control" type="password"  name="new_password" id="new_password" placeholder="Password">
                                    <span id="new_password_error"></span>
                                </div>
                                <div class="col-12 mb-20">
                                    <label>Confirm Password</label>
                                    <input class="form-control" type="password"  name="confirm_password" id="confirm_password" placeholder="Password">
                                    <span id="confirm_password_error"></span>
                                </div>
<!--
                                <div class="col-md-8">
                                    
                                    <div class="check-box d-inline-block ml-0 ml-md-2 mt-10">
                                        <input type="checkbox" id="remember_me">
                                        <label for="remember_me">Remember me</label>
                                    </div>
                                    
                                </div>
-->

                                <div class="col-md-12">
                                   
                                    <button type="submit" class="register-button mt-0">Change Password</button>
                                </div>

                            </div>
                        </div>

                    </form>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-8 col-xs-12">
                
                        <?php 
                        require("db_connection.php");
                        $sql1=$conn->prepare("SELECT * FROM customer_details WHERE cd_id=?");
                        $sql1->bind_param("i",$cd_id);
                        $sql1->execute();
                        $result1=$sql1->get_result();
                        $row1=$result1->fetch_assoc();                                
                        ?>
                <form action="customer_profile_update.php" method="post" onsubmit="return ValidateForm()">

                        <div class="login-form1">
                            <h4 class="login-title">Edit Profile</h4>

                            <div class="row">
                                <div class="col-md-6 col-12 mb-20">
                                    <label>Name</label>
                                    <input class="form-control" type="text"  name="cd_name" id="cd_name"  value="<?php echo $row1['cd_name'];?>">
                                    <span id="cd_name_error"></span>
                                </div>
                                <div class="col-md-6 col-12 mb-20">
                                    <label>Contaact</label>
                                    <input class="form-control" type="text"  id="cd_contact" name="cd_contact" placeholder="Contact.No" value="<?php echo $row1['cd_contact'];?>">
                                    <span id="cd_contact_error"></span>
                                </div>
                                
                                <div class="col-md-6 col-12 mb-20">
                                    <label>Email ID</label>
                                    <input class="form-control" type="text"  id="cd_email_id" name="cd_email_id" placeholder="Email ID" value="<?php echo $row1['cd_email_id'];?>">
                                    <span id="cd_email_id_error"></span>
                                </div>
                                
                                <div class="col-md-6 mb-20">
                                    <label>Address</label>
                                   <textarea class="form-control" name="cd_address" id="cd_address"><?php echo $row1['cd_address'];?></textarea>
                                   <span id="cd_address_error"></span>
                                </div>
                                <div class="col-md-6 mb-20">
<!--                                    <label>Username</label>-->
                                    <input class="form-control" type="hidden" name="cd_username" id="cd_username" placeholder="Username" value="<?php echo $row1['cd_username'];?>">
                                    <span id="cd_username_error"></span>
                                </div>
                                
                                <div class="col-12">
                                   
                                    <button type="submit" class="register-button mt-0">Upadate</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!--====================  End of page content  ====================-->


    <!--====================  footer area ====================-->
    
    <?php require("3_footer.php"); ?>
    
    <!--====================  End of footer area  ====================-->
    <!-- scroll to top  -->
    <a href="#" class="scroll-top"></a>
    <!-- end of scroll to top -->


	<!--=============================================
    =            JS files        =
    =============================================-->
    
	<?php require("4_footer_scripts.php"); ?>
   
   <script type="text/javascript">
    function ValidateForm()
        {
         
         var cd_name = '';
         var cd_contact = '';
         var cd_email_id = '';
         var cd_address = '';
         var cd_username = '';
         //var cd_password = '';
        
            
cd_name =alphabets('cd_name','cd_name_error','Name');
cd_contact =phoneno('cd_contact','cd_contact_error','Contact.No');
cd_email_id =emailid('cd_email_id','cd_email_id_error','Email ID');
cd_address=fieldrequired('cd_address','cd_address_error','Address');
cd_username=fieldrequired('cd_username','cd_username_error','Username') ;            
if(cd_name==1 && cd_contact==1 && cd_email_id==1 && cd_address==1 && cd_username==1 )
    {
      return true;
    }
else
    {
     return false;
    }
        }
       
       
        function ValidatePasswordForm()
            {
                var confirm_password = '';
                var new_password = '';                
                var old_password = '';                
               
                
                old_password = fieldrequired('old_password', 'old_password_error', 'Old Password');
                confirm_password = fieldrequired('confirm_password', 'confirm_password_error', 'Confirm Password');
                new_password = pasword('new_password', 'new_password_error', 'New Password');

                if (confirm_password == 1 && new_password == 1 && old_password == 1) 
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }
       
    </script>
    
   
   
    
    <!--=====  End of JS files ======-->

</body>
</html>