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
                            DEALERS
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
                                    Enter The Dealers Details
                                </div>
                                <div class="panel-body">
                                
         <?php
              require("db_connection.php");
              $dd_id=base64_decode($_REQUEST["dd_id"]);
              $sql=$conn->prepare("SELECT * FROM dealers_details WHERE dd_id=?");
              $sql->bind_param("i",$dd_id);
              $sql->execute();
              $result=$sql->get_result();
              $row=$result->fetch_assoc();  
          ?>
                                
                                
                    <form name="formID" id="formID" action="dealers_details_update.php" method="post" enctype="multipart/form-data" onsubmit="return ValidateForm()">
                  
                       <input type="hidden" id="dd_id" name="dd_id" value="<?php echo $row["dd_id"];?>"> 
                       
                       
                        <div class="form-group">
                            <label for="inputName1" class="control-label">FULLNAME</label>
                            <input type="text" class="form-control" name="dd_name" id="dd_name" value="<?php echo $row["dd_name"];?>" >
                            <span id="dd_name_error"></span>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail" class="control-label">ADDRESS</label>
                            <textarea name="dd_address"  id="dd_address" class="form-control"><?php echo $row["dd_address"];?></textarea>
                            <span id="dd_address_error"></span>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail" class="control-label">CONTACT NO</label>
                            <input type="text" class="form-control" name="dd_contact" id="dd_contact" value="<?php echo $row["dd_contact"];?>" >
                            <span id="dd_contact_error"></span>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="control-label">DATE</label>
                            <input type="text" name="dd_date" class="form-control" id="dd_date" value="<?php echo date("y-m-d");?>"readonly>
                            <span id="dd_date_error"></span>
                        </div>
                        
                        <div class="form-group">
                                    <span id="form_error" style="color:#ff3a00;"></span>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <input type="reset" name="reset" class="btn btn-primary" id="reset" value="Reset" />
                           <input type="button" name="button" class="btn btn-primary" id="button" value="Cancel" onclick="window.location.href='dealers_details_view.php'" />
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
            var dd_name = '';
            var dd_contact = '';
            var dd_address = '';
            
            dd_name = alphabets('dd_name', 'dd_name_error', 'Name');
            dd_contact = phoneno('dd_contact', 'dd_contact_error', 'Contact No.');
            dd_address = fieldrequired('dd_address', 'dd_address_error', 'Address');
            
            
            if (dd_name == 1 && dd_contact == 1 && dd_address == 1 ) 
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