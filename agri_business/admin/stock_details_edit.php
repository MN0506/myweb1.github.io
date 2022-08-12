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
                        Stock Details
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
                                Enter The Stock Details
                            </div>
                            <div class="panel-body">

      <?php
          require("db_connection.php");
          $sd_id=base64_decode($_REQUEST["sd_id"]);
          $sql=$conn->prepare("SELECT * FROM stock_details WHERE sd_id=?");
          $sql->bind_param("i",$sd_id);
          $sql->execute();
          $result=$sql->get_result();
          $row=$result->fetch_assoc();  
      ?>


                <form name="formID" id="formID" action="stock_details_update.php" method="post" enctype="multipart/form-data" onsubmit="return ValidateForm()">

                    <input type="hidden" id="sd_id" name="sd_id" value="<?php echo $row["sd_id"];?>"> 

                    <div class="form-group">
                        <label for="inputName1" class="control-label">PRODUCT</label>
<!--                            <input type="text" class="form-control" name="pd_id" id="pd_id" value="<?php echo $row["pd_id"];?>" >-->

                       <?php
                    require("db_connection.php");
                    $sql1=$conn->prepare("select * from product_details");
                    $sql1->execute();
                    $result1=$sql1->get_result();
                    ?>
                    <select name="pd_id" id="pd_id" class="form-control">
                        <option value="">--SELECT CATEGORY--</option>
                        <?php
                        while($row1=$result1->fetch_assoc())
                        {
                            ?>
                        <option value="<?php echo $row1["pd_id"];?>"
                        <?php
                            if($row["pd_id"]==$row1["pd_id"])
                            {
                                ?>
                                selected
                                <?php
                            }
                            ?>
                        ><?php echo $row1["pc_id"];?> </option>

                        <?php
                        }
                        ?>
                    </select>

                        <span id="pd_id_error"></span>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail" class="control-label">QUANTITY</label>
                        <input type="text" class="form-control" name="sd_quantity" id="sd_quantity" value="<?php echo $row["sd_quantity"];?>" >
                        <span id="sd_quantity_error"></span>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail" class="control-label">UNITPRICE</label>
                        <input type="text" name="sd_unitprice" class="form-control" id="sd_unitprice" value="<?php echo $row["sd_unitprice"];?>" >
                        <span id="sd_unitprice_error"></span>
                    </div>


                    <div class="form-group">
                        <label for="inputEmail" class="control-label">DISCOUNT</label>
                        <input type="text" name="sd_discount" class="form-control" id="sd_discount" value="<?php echo $row["sd_discount"];?>" >
                        <span id="sd_discount_error"></span>
                    </div>

                    <div class="form-group">
                            <label for="inputEmail" class="control-label">STATUS</label>
                            <select name="sd_status" id="sd_status" class="form-control">
                                <option value="">---SELECT---</option>
                                <option value="IN STOCK"<?php if($row['sd_status']=="IN STOCK") 
                        {
                        ?>
                        selected
                        <?php
}
                        ?>
                               >IN STOCK</option>
                                <option value="OUT OF STOCK"<?php if($row['sd_status']=="OUT OF STOCK") 
                        {
                        ?>
                        selected
                        <?php
}
                        ?>
                                >OUT OF STOCK</option>
                            </select>
                            <span id="sd_status_error"></span>
                        </div>

                    <div class="form-group">
                        <label for="inputEmail" class="control-label">DATE</label>
                        <input type="text" name="sd_date" class="form-control" id="sd_date" value="<?php echo date("y-m-d");?>"readonly>

                        <span id="sd_date_error"></span>
                    </div>
                    <div class="form-group">
                                <span id="form_error" style="color:#ff3a00;"></span>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <input type="reset" name="reset" class="btn btn-primary" id="reset" value="Reset" />
                       <input type="button" name="button" class="btn btn-primary" id="button" value="Cancel" onclick="window.location.href='stock_details_view.php'" />
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
        var pd_id = '';
        var sd_quantity = '';
        var sd_unitprice = '';
        var sd_discount = '';
        var sd_status = '';


        pd_id = numbers('pd_id', 'pd_id_error', 'ID');
        sd_quantity = numbers('sd_quantity', 'sd_quantity_error', 'Quantity');
        sd_unitprice = amountval('sd_unitprice', 'sd_unitprice_error', 'Unitprice');
        sd_discount = amountval('sd_discount', 'sd_discount_error', 'Discount');
        sd_status = alphabets('sd_status', 'sd_status_error', 'Status');

        if (pd_id == 1 && sd_quantity == 1 && sd_unitprice == 1 && sd_discount == 1 && sd_status == 1 ) 
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






