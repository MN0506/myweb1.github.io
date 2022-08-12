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
                            CHANGE PASSWORD
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
                                    ENTER DETAILS
                                </div>  
                                <div class="panel-body">
                    <form name="formID" id="formID" action="password_update.php" method="post" enctype="multipart/form-data" onsubmit="return ValidateForm()">

                        <div class="form-group">
                            <label for="inputName1" class="control-label">Old Password</label>
                            <input type="password" class="form-control" name="old_password" id="old_password">
                            <span id="old_password_error"></span>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail" class="control-label">New Password</label>
                             <input type="password" class="form-control" name="new_password" id="new_password">
                            <span id="new_password_error"></span>
                           
                        </div>

                        <div class="form-group">
                            <label for="inputEmail" class="control-label">Confirm New Password</label>
                            <input type="password" class="form-control" name="c_newpassword" id="c_newpassword">
                            <span id="c_newpassword_error"></span>
                        </div>

                       
                        
                       
                        <div class="form-group">
                                    <span id="form_error" style="color:#ff3a00;"></span>
                        </div>
                        <input type="hidden" id="ad_date" name="ad_date" class="form-control" value="<?php echo date('Y-m-d'); ?>">

                        <div class="form-group">
                           <input type="hidden" id="action" value="Add">
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
            var old_password = '';
            var new_password = '';
            var c_newpassword = '';
            
            var action = document.getElementById('action').value;

           
            old_password = fieldrequired('old_password', 'old_password_error', 'Old Password');
            c_newpassword = fieldrequired('c_newpassword', 'c_newpassword_error', 'Confirm New Password');
            
            new_password = pasword('new_password', 'new_password_error', 'New Password');
       

            if (old_password == 1 && new_password == 1 && c_newpassword == 1 ) 
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
