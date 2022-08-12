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
                            Extra Charges
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
                                    Enter Extra Charges Details
                                </div>
                                <div class="panel-body">
                    <form name="formID" id="formID" action="extra_charges_insert.php" method="post" enctype="multipart/form-data" onsubmit="return ValidateForm()">

                        <div class="form-group">
                            <label for="inputName1" class="control-label">CGST</label>
                            <input type="text" class="form-control" name="ec_cgst" id="ec_cgst">
                            <span id="ec_cgst_error"></span>
                        </div>
                        <div class="form-group">
                            <label for="inputName1" class="control-label">SGST</label>
                            <input type="text" class="form-control" name="ec_sgst" id="ec_sgst">
                            <span id="ec_sgst_error"></span>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail" class="control-label">MINIMUM AMOUNT</label>
                            <input type="text" class="form-control" name="ec_minimum_amount" id="ec_minimum_amount">
                            <span id="ec_minimum_amount_error"></span>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail" class="control-label">DELIVERY CHARGES</label>
                            <input type="text" name="ec_delivery_charges" class="form-control" id="ec_delivery_charges">
                            <span id="ec_delivery_charges_error"></span>
                        </div>


                        <div class="form-group">
                            <label for="inputEmail" class="control-label">MINIMUM STOCK QUANTITY</label>
                            <input type="text" name="ec_min_stock_qty" class="form-control" id="ec_min_stock_qty">
                            <span id="ec_min_stock_qty_error"></span>
                        </div>
                        
                        <div class="form-group">
                            <label for="inputEmail" class="control-label">MAXIMUM STOCK QUANTITY</label>
                            <input type="text" name="ec_max_stock_qty" class="form-control" id="ec_max_stock_qty">
                            <span id="ec_max_stock_qty_error"></span>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail" class="control-label">DATE</label>
                             <input type="text" name="ec_date" class="form-control" id="ec_date" value="<?php echo date("y-m-d");?>"readonly>

                            <span id="ec_date_error"></span>
                        </div>
                        <div class="form-group">
                                    <span id="form_error" style="color:#ff3a00;"></span>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <input type="reset" name="reset" class="btn btn-primary" id="reset" value="Reset" />
                           <input type="button" name="button" class="btn btn-primary" id="button" value="Cancel" onclick="window.location.href='extra_charges_view.php'" />
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
            var ec_cgst = '';
            var ec_sgst = '';
            var ec_minimum_amount = '';
            var ec_delivery_charges = '';
            var ec_min_stock_qty = '';
            var ec_max_stock_qty = '';
            
            ec_cgst = amountval('ec_cgst', 'ec_cgst_error', 'Cgst');
            ec_sgst = amountval('ec_sgst', 'ec_sgst_error', 'Sgst');
            ec_minimum_amount = amountval('ec_minimum_amount', 'ec_minimum_amount_error', 'Minimum amount');
            ec_delivery_charges = amountval('ec_delivery_charges', 'ec_delivery_charges_error', 'Delivery Charges');
            ec_min_stock_qty = numbers('ec_min_stock_qty', 'ec_min_stock_qty_error', 'Min stock quantity');
            ec_max_stock_qty = numbers('ec_max_stock_qty', 'ec_max_stock_qty_error', 'Max stock quantity');
            

            if (ec_cgst == 1 && ec_sgst == 1 && ec_minimum_amount == 1 && ec_delivery_charges == 1 && ec_min_stock_qty == 1 && ec_max_stock_qty == 1 ) 
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
