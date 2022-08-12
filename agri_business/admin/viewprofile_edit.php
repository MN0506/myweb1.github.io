<!DOCTYPE html>
<html>

    <head>

        <?php require('1_metatags.php'); ?>

    </head>

    <body class="fixed-navbar sidebar-scroll">

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

        <!-- Header -->
        <?php require('2_header.php'); ?>

        <!-- Navigation -->

        <?php require('3_sidebar.php'); ?>

        <!-- Main Wrapper -->
        <div id="wrapper">

            <div class="small-header">
                <div class="hpanel">
                    <div class="panel-body">
<!--
                        <div id="hbreadcrumb" class="pull-right">
                            <ol class="hbreadcrumb breadcrumb">
                                <li><a href="index-2.html">Dashboard</a></li>
                                <li>
                                    <span>Forms</span>
                                </li>
                                <li class="active">
                                    <span>Forms elements </span>
                                </li>
                            </ol>
                        </div>
-->
                        <h2 class="font-light m-b-xs">
                           PROFILE DETAILS
                        </h2>
<!--                        <small>Examples of various form controls.</small>-->
                    </div>
                </div>
            </div>

            <div class="content">

                <div>
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="hpanel">
                                <div class="panel-heading">
                                    <!--<div class="panel-tools">
                                        <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                                        <a class="closebox"><i class="fa fa-times"></i></a>
                                    </div>-->
                                    Edit The Details
                                </div>
            <div class="panel-body">
            <?php 
require("db_connection.php"); 
$ad_username=$_SESSION["ad_username"]; 
$sql=$conn->prepare("SELECT * FROM admin_details WHERE ad_username=?"); 
$sql->bind_param("s",$ad_username); 
$sql->execute(); 
    $result=$sql->get_result(); 
    $row=$result->fetch_assoc(); 
?> 
<form name="formID" id="formID" action="viewprofile_update.php" method="post" enctype="multipart/form-data" onsubmit="return ValidateForm()">

<input type="hidden" name="ad_id" id="ad_id" class="form-control" value="<?php echo $row["ad_id"];?>"> 
  
   <div class="form-group"> 
<label for="inputName1" class="control-label">Name</label> 
<input type="text" name="ad_name" id="ad_name" class="form-control" value="<?php echo $row["ad_name"];?>"> 
<span id="ad_name_error"></span> 
</div> 
 
<div class="form-group"> 
<label for="inputName1" class="control-label">Contact</label> 
<input type="text" name="ad_contact" id="ad_contact" class="form-control" value="<?php echo $row["ad_contact"];?>"> 
<span id="ad_contact_error"></span> 
</div> 
 
<div class="form-group"> 
<label for="inputName1" class="control-label">Email Id</label> 
<input type="text" name="ad_email_id" id="ad_email_id" class="form-control" value="<?php echo $row["ad_email_id"];?>"> 
<span id="ad_email_id_error"></span> 
</div> 
 
<div class="form-group"> 
<label for="inputName1" class="control-label">Address</label> 
<textarea name="ad_address" id="ad_address" class="form-control"><?php echo $row["ad_address"];?></textarea> 
<span id="ad_address_error"></span> 
</div> 

 
<div class="form-group"> 
<label for="inputName1" class="control-label">Date</label> 
<input type="text" name="ad_date" id="ad_date" value="<?php echo date("Y-m-d");?>" readonly class="form-control"> 
<span id="ad_date_error"></span> 
</div>     

    <div class="form-group">
                <span id="form_error" style="color:#ff3a00;"></span>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit</button>
        <input type="reset" name="reset" class="btn btn-primary" id="reset" value="Reset" />
       <input type="button" name="button" class="btn btn-primary" id="button" value="Cancel" onclick="window.location.href='index.php'" />
    </div>

</form>
            </div>
                            </div>
                        </div>
                    </div>


                </div>

            </div>

            <!-- Right sidebar -->


            <!-- Footer-->
            <?php require('4_footer.php'); ?>

        </div>
        <!-- Vendor scripts -->
        <?php require('5_footer_scripts.php'); ?>


    </body>
    <script type="text/javascript">
        function ValidateForm()
        {
            var ad_name = ''; 
            var ad_contact = ''; 
            var ad_email_id = ''; 
            var ad_address = ''; 
            var ad_profile = ''; 

            ad_name = alphabets('ad_name', 'ad_name_error', 'Name'); 
            ad_contact = phoneno('ad_contact', 'ad_contact_error', 'Contact Number'); 
            ad_email_id = emailid('ad_email_id', 'ad_email_id_error', 'Email Id'); 
            ad_address = fieldrequired('ad_address', 'ad_address_error', 'Address'); 
            

            if (ad_name == 1 && ad_contact == 1 && ad_email_id == 1 && ad_address == 1 )  
            { 
            document.getElementById('form_error').innerHTML=""; 
            return true; 
            } 
            else 
            { 
            document.getElementById('form_error').innerHTML="* Fields Are Mandatory"; 
            return false; 
            } 
        }
    </script>


</html>