<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
	<?php require("1_metatags.php"); ?>
</head>

<body>
    
    <!--====================  Header area ====================-->
    
    <?php require("2_header.php"); ?>
    
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
                    <form action="login/login_check.php" method="post" onsubmit="return ValidateLoginForm() ">

                        <div class="login-form1">
                            <h4 class="login-title">LOGIN</h4>
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

                            <div class="row">
                                <div class="col-md-12 col-12 mb-20">
                                    <label>Username</label>
                                    <input class="form-control" type="text" name="cd_username" id="cd_username_login" placeholder="Usrename">
                                    <span id="cd_username_login_error"></span>
                                </div>
                                <div class="col-12 mb-20">
                                    <label>Password</label>
                                    <input class="form-control" type="password"  name="cd_password" id="cd_password_login" placeholder="Password">
                                    <span id="cd_password_login_error"></span>
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
                                   
                                    <button type="submit" class="register-button mt-0">Login</button>
                                </div>
                                 <div class="col-md-6 mt-10 mb-20 text-left">
                                    <a href="customer_forgotpassword.php">Forgotten pasward ?</a>
                                </div>

                            </div>
                        </div>

                    </form>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-8 col-xs-12">
                <form action="admin/customer_details_insert.php" method="post" onsubmit="return ValidateForm()">

                        <div class="login-form1">
                            <h4 class="login-title">Register</h4>

                            <div class="row">
                                <div class="col-md-6 col-12 mb-20">
                                    <label>Name</label>
                                    <input class="form-control" type="text"  name="cd_name" id="cd_name" placeholder="Name">
                                    <span id="cd_name_error"></span>
                                </div>
                                <div class="col-md-6 col-12 mb-20">
                                    <label>Contaact</label>
                                    <input class="form-control" type="text"  id="cd_contact" name="cd_contact" placeholder="Contact.No">
                                    <span id="cd_contact_error"></span>
                                </div>
                                
                                <div class="col-md-6 col-12 mb-20">
                                    <label>Email ID</label>
                                    <input class="form-control" type="text"  id="cd_email_id_id" name="cd_email_id" placeholder="Email ID">
                                    <span id="cd_email_id_error"></span>
                                </div>
                                
                                <div class="col-md-6 mb-20">
                                    <label>Address</label>
                                   <textarea class="form-control" name="cd_address" id="cd_address" placeholder="Address"></textarea>
                                   <span id="cd_address_error"></span>
                                </div>
                                <div class="col-md-6 mb-20">
                                    <label>Username</label>
                                    <input class="form-control" type="text" name="cd_username" id="cd_username" placeholder="Username">
                                    <span id="cd_username_error"></span>
                                </div>
                                   <div class="col-md-6 mb-20">
                                    <label>Password</label>
                                    <input class="form-control" type="password" name="cd_password" id="cd_password" placeholder="Password">
                                    <span id="cd_password_error"></span>
                                </div>
                                
                                <div class="col-12">
                                   
                                    <button type="submit" class="register-button mt-0">Register</button>
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
    <br><br>
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
         var cd_password = '';
        
            
cd_name =alphabets('cd_name','cd_name_error','Name');
cd_contact =phoneno('cd_contact','cd_contact_error','Contact.No');
cd_email_id =emailid('cd_email_id','cd_email_id_error','Email ID');
cd_address=fieldrequired('cd_address','cd_address_error','Address');
cd_username=fieldrequired('cd_username','cd_username_error','Username') ;
cd_password=fieldrequired('cd_password','cd_password_error','Password'); 
            
if(cd_name==1 && cd_contact==1 && cd_email_id==1 && cd_address==1 && cd_username==1 && cd_password==1)
    {
      return true;
    }
else
    {
     return false;
    }
        }
       
       
        function ValidateLoginForm()
        {
            var cd_username = '';
            var cd_password = '';
           
            
            cd_username=fieldrequired('cd_username_login','cd_username_login_error','Username');
            cd_password=fieldrequired('cd_password_login','cd_password_login_error','Password');
            
            if(cd_username==1  && cd_password==1)
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