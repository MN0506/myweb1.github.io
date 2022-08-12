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
                                Enter The Purchase Detalis
                            </div>
                            <div class="panel-body">
                <form name="formID" id="formID" action="dealers_purchase_details_insert.php" method="post" enctype="multipart/form-data" onsubmit="return ValidateForm()">

                    <div class="form-group">
                        <label for="inputName1" class="control-label">DEALERS NAME</label>
<!--                            <input type="text" class="form-control" name="dd_id" id="dd_id">-->
                       <?php
                        require("db_connection.php");
                        $sql=$conn->prepare("select * from dealers_details");
                        $sql->execute();
                        $result=$sql->get_result();
                        ?>
                        <select name="dd_id" id="dd_id" class="form-control">
                            <option value="">--SELECT CATEGORY--</option>
                            <?php
                            while($row=$result->fetch_assoc())
                            {
                                ?>
                            <option value="<?php echo $row["dd_id"];?>"><?php echo $row["dd_name"];?> </option>

                            <?php
                            }
                            ?>
                        </select>

                    <span id="dd_id_error"></span>
                    </div>
                    <div class="form-group">
                        <label for="inputName1" class="control-label">CATEGORY</label>
<!--                        <input type="text" class="form-control" name="pc_id" id="pc_id">-->
                       
                       
                       <?php
                        require("db_connection.php");
                        $sql=$conn->prepare("select * from product_category");
                        $sql->execute();
                        $result=$sql->get_result();
                        ?>
                        <select name="pc_id" id="pc_id" class="form-control">
                            <option value="">--SELECT CATEGORY--</option>
                            <?php
                            while($row=$result->fetch_assoc())
                            {
                                ?>
                            <option value="<?php echo $row["pc_id"];?>"><?php echo $row["pc_name"];?> </option>

                            <?php
                            }
                            ?>
                        </select>

                        <span id="pc_id_error"></span>
                    </div>



                    <div class="form-group">
                        <label for="inputEmail" class="control-label">PRODUCT</label>
                        <input type="text" class="form-control" name="dpd_name" id="dpd_name">
                        <span id="dpd_name_error"></span>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail" class="control-label">QUANTITY</label>
                        <input type="text" name="dpd_quantity" class="form-control" id="dpd_quantity">
                        <span id="dpd_quantity_error"></span>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail" class="control-label">DATE</label>
                        <input type="text" name="dpd_date" class="form-control" id="dpd_date" value="<?php echo date("y-m-d");?>"readonly>
                        <span id="dpd_date_error"></span>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail" class="control-label">AMOUNT PAID</label>
                        <input type="text" name="dpd_amount_paid" class="form-control" id="dpd_amount_paid">
                        <span id="dpd_amount_paid_error"></span>
                    </div>

                    <div class="form-group">
                                <span id="form_error" style="color:#ff3a00;"></span>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <input type="reset" name="reset" class="btn btn-primary" id="reset" value="Reset" />
                       <input type="button" name="button" class="btn btn-primary" id="button" value="Cancel" onclick="window.location.href='dealers_purchase_details_view.php'" />
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
        var dd_id = '';
        var pc_id = '';
        var dpd_name = '';
        var dpd_quantity = '';
        var dpd_amount_paid = '';

        dd_id = fieldrequired('dd_id', 'dd_id_error', 'ID');
        pc_id = fieldrequired('pc_id', 'pc_id_error', 'ID');
        dpd_name = alphabets('dpd_name', 'dpd_name_error', 'name');
        dpd_quantity = numbers('dpd_quantity', 'dpd_quantity_error', 'quantity');
        dpd_amount_paid = amountval('dpd_amount_paid', 'dpd_amount_paid_error', 'Amount paid');

        if (dd_id == 1 && pc_id == 1 && dpd_name == 1 && dpd_quantity == 1 && dpd_amount_paid == 1 ) 
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