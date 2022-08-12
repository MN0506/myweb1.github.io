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
                            CUSTOMER DETAILS
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
                                    Enter the Customer Details
                                </div>
                                <div class="panel-body">
                                
        <?php
              require("db_connection.php");
              $cd_id=base64_decode($_REQUEST["cd_id"]);
              $sql=$conn->prepare("SELECT * FROM customer_details WHERE cd_id=?");
              $sql->bind_param("i",$cd_id);
              $sql->execute();
              $result=$sql->get_result();
              $row=$result->fetch_assoc();  
          ?>
                                
                                
                                
                    <form name="formID" id="formID" action="customer_details_update.php" method="post" enctype="multipart/form-data" onsubmit="return ValidateForm()">
                        
                        <input type="hidden" id="cd_id" name="cd_id" value="<?php echo $row["cd_id"];?>"> 


                        <div class="form-group">
                            <label for="inputName1" class="control-label">CUSTOMER NAME</label>
                            <input type="text" class="form-control" name="cd_name" id="cd_name" value="<?php echo $row["cd_name"];?>" >
                            <span id="cd_name_error"></span>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail" class="control-label">CUSTOMER ADDRESS</label>
                            <textarea name="cd_address"  id="cd_address" class="form-control"><?php echo $row["cd_address"];?></textarea>
                            <span id="cd_address_error"></span>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail" class="control-label">CONTACT NO</label>
                            <input type="text" class="form-control" name="cd_contact" id="cd_contact" value="<?php echo $row["cd_contact"];?>" >
                            <span id="cd_contact_error"></span>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail" class="control-label">EMAIL ID</label>
                            <input type="text" name="cd_email_id" class="form-control" id="cd_email_id" value="<?php echo $row["cd_email_id"];?>" >
                            <span id="cd_email_id_error"></span>
                        </div>


                        <div class="form-group">
                            <label for="inputEmail" class="control-label">USERNAME</label>
                            <input type="text" name="cd_username" class="form-control" id="cd_username" value="<?php echo $row["cd_username"];?>" >
                            <span id="cd_username_error"></span>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail" class="control-label">PASSWORD</label>
                            <input type="text" name="cd_password" class="form-control" id="cd_password" value="<?php echo $row["cd_password"];?>" >
                            <span id="cd_password_error"></span>
                        </div>
                        <div class="form-group">
                                    <span id="form_error" style="color:#ff3a00;"></span>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="control-label">DATE</label>
                            <input type="text" name="cd_date" class="form-control" id="cd_date" value="<?php echo date("y-m-d");?>"readonly>
                            <span id="cd_date_error"></span>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <input type="reset" name="reset" class="btn btn-primary" id="reset" value="Reset" />
                           <input type="button" name="button" class="btn btn-primary" id="button" value="Cancel" onclick="window.location.href='form.php'" />
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
            var cd_name = '';
            var cd_contact = '';
            var cd_email_id = '';
            var cd_address = '';
            var cd_username = '';
            var cd_password = '';

            cd_name = alphabets('cd_name', 'cd_name_error', 'cd_name');
            cd_contact = phoneno('cd_contact', 'cd_contact_error', 'cd_contact');
            cd_email_id = emailid('cd_email_id', 'cd_email_id_error', 'cd_email_id');
            cd_address = fieldrequired('cd_address', 'cd_address_error', 'cd_address');
            cd_username = fieldrequired('cd_username', 'cd_username_error', 'cd_username');
            cd_password = pasword('cd_password', 'cd_password_error', 'cd_password');


            if (cd_name == 1 && cd_contact == 1 && cd_email_id == 1 && cd_address == 1 && cd_username == 1 && cd_password == 1 ) 
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





