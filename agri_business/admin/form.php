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
                            Forms elements
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
                                    Basic elements
                                </div>
                                <div class="panel-body">
                    <form name="formID" id="formID" action="form_insert.php" method="post" enctype="multipart/form-data" onsubmit="return ValidateForm()">

                        <div class="form-group">
                            <label for="inputName1" class="control-label">FullName</label>
                            <input type="text" class="form-control" name="name" id="name">
                            <span id="name_error"></span>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail" class="control-label">Address</label>
                            <textarea name="address"  id="address" class="form-control"></textarea>
                            <span id="address_error"></span>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail" class="control-label">Contact No</label>
                            <input type="text" class="form-control" name="contact" id="contact">
                            <span id="contact_error"></span>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail" class="control-label">EMAIL ID</label>
                            <input type="text" name="email" class="form-control" id="email">
                            <span id="email_error"></span>
                        </div>


                        <div class="form-group">
                            <label for="inputEmail" class="control-label">USERNAME</label>
                            <input type="text" name="username" class="form-control" id="username">
                            <span id="username_error"></span>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail" class="control-label">PASSWORD</label>
                            <input type="text" name="password" class="form-control" id="password">
                            <span id="password_error"></span>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail" class="control-label">IMAGE</label>
                            <input type="file" name="image" class="form-control" id="image">
                            <span id="image_error"></span>
                        </div>
                        
                        <div class="form-group">
                            <label for="inputEmail" class="control-label">GENDER</label>
                            <select name="gender" id="gender" class="form-control">
                                <option value="">--Select--</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                            <span id="gender_error"></span>
                        </div>
                        <div class="form-group">
                                    <span id="form_error" style="color:#ff3a00;"></span>
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
            var fullname = '';
            var address = '';
            var contact = '';
            var email = '';
            var image = '';
            var username = '';
            var password = '';
            var gender = '';

            fullname = alphabets('name', 'name_error', 'Name');
            address = fieldrequired('address', 'address_error', 'Address');
            contact = phoneno('contact', 'contact_error', 'Contact No.');
            email = emailid('email', 'email_error', 'Email Id');
            image = imagename('image', 'image_error', 'Image');
            username = fieldrequired('username', 'username_error', 'Username');
            password = pasword('password', 'password_error', 'password');
            gender = fieldrequired('gender', 'gender_error', 'Gender');

            if (fullname == 1 && address == 1 && contact == 1 && email == 1 && image == 1 && username == 1 && password == 1 && gender == 1 ) 
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
