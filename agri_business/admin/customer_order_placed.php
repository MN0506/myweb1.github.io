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

        <div class="content">

            <div class="row">
                <div class="col-lg-12">

                    <div class="hpanel">
                        <!--<div class="panel-heading">
                            <div class="panel-tools">
                                <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                                <a class="closebox"><i class="fa fa-times"></i></a>
                            </div>
                            Standard table
                        </div>-->

                        <div class="panel-body" style="overflow:auto;">
               <div>
<!--                    <button type="button" onclick="window.location.href='form.php' " class="btn btn-primary" style="float:left;">New</button>-->
                   <h1 align="center">CUSTOMER ORDER  PLACED DETAILS</h1>
                </div>

                            <table id="example2" class="table table-striped table-bordered table-hover">
                                <thead>
                                     <tr>
                                    <th>Sl No.</th>
                                    <th>Name</th>
                                    <th>Order Date</th>
                                    <th>Amount <br>Order No. <br>Payment Mode</th>
                                    <th>Order Status</th>
                                    <th>ACTION</th>
                                    </tr>
                                </thead>
                               <tbody>
                                        <?php
           require("db_connection.php");
           $sql=$conn->prepare("SELECT * FROM customer_invoice,customer_details WHERE customer_invoice.cd_id=customer_details.cd_id ORDER BY customer_invoice.ci_id DESC");
           $sql->execute();
           $result=$sql->get_result();
           $sno=1;
           while($row=$result->fetch_assoc()){
           ?>
                <tr>
                    <td><?php echo $sno++;//$row['ad_id'];?> </td>
                    <td><?php echo $row['cd_name']?></td>
                    <td><?php echo $row['ci_date'];?></td>
                    <td><b>AMT : </b><?php echo $row['ci_total_price'];?><br><br><b>ORD NO : </b><?php echo $row['ci_order_no'];?><br><br>
                        <?php if($row['ci_payment_mode'] == "COD")
                               {    ?>
                           <b><?php echo $row['ci_payment_mode'];?></b>
                          <?php }
                                else
                                { ?>
                            <b><?php echo $row['ci_payment_mode'];?></b><br>
                                    <?php echo $row['ci_transaction_no'];?>
                           <?php } ?>
                    </td>                      
                    <td><?php if($row['ci_status'] == 'ORDER PENDING'){
               ?>
               <button class="btn btn-sm btn-danger" style="width:100%;">PENDING</button> <br><br>
               <form action="customer_order_confirm.php" method="post">
           <input type="hidden" name="ci_total_price" value="<?php echo $row['ci_total_price']?>">
           <input type="hidden" name="ci_id" value="<?php echo $row['ci_id']?>">
           <input type="hidden" name="cd_id" value="<?php echo $row['cd_id']?>">
            <input type="hidden" name="ci_date" value="<?php echo $row['ci_date']?>">
            <input type="hidden" name="ci_order_no" value="<?php echo $row['ci_order_no']?>">
               <button type="submit" class="btn btn-sm btn-success" style="width:100%;">CONFIRM</button>
               </form>
           <?php }?>
                   <?php if($row['ci_status'] == 'ORDER CONFIRMED'){
               ?>
               <button class="btn btn-sm btn-success" style="width:100%;">CONFIRMED</button> <br><br>
               <form action="customer_order_deliver.php" method="post">
           <input type="hidden" name="ci_id" value="<?php echo $row['ci_id']?>">
           <input type="hidden" name="cd_id" value="<?php echo $row['cd_id']?>">
            <input type="hidden" name="ci_date" value="<?php echo $row['ci_date']?>">
            <input type="hidden" name="ci_order_no" value="<?php echo $row['ci_order_no']?>">
               <button type="submit" class="btn btn-sm btn-warning" style="width:100%;">DELIVERED</button>
               </form>
           <?php }?>
                  
                  <?php if($row['ci_status'] == 'ORDER DELIVERED'){
               ?>
               <button class="btn btn-sm btn-success" style="width:100%;">DELIVERED</button> <br><br>
           <?php }?>
                  <?php if($row['ci_status'] == 'ORDER CANCELLED'){
               ?>
               <button class="btn btn-sm btn-danger" style="width:100%;">CANCELLED</button> <br><br>
           <?php }?>
                   
                   </td>                   
                    <td>
                    <form action="customer_order_details.php" method="post">
                    <input type="hidden" name="cd_id" value="<?php echo $row['cd_id']?>">
                    <input type="hidden" name="ci_date" value="<?php echo $row['ci_date']?>">
                    <input type="hidden" name="ci_order_no" value="<?php echo $row['ci_order_no']?>">
                    <button type="submit" class="btn btn-sm btn-primary" style="width:100%;">ORDER DETAILS</button> 
                    </form>
                    <br>
                    <form action="customer_bill_generate.php" method="post">
                    <input type="hidden" name="cd_id" value="<?php echo $row['cd_id']?>">
                    <input type="hidden" name="ci_date" value="<?php echo $row['ci_date']?>">
                    <input type="hidden" name="ci_order_no" value="<?php echo $row['ci_order_no']?>">
                    <button type="submit" class="btn btn-sm btn-primary" style="width:100%;">GENERATE BILL</button>
                        </form>
                    </td>                   
               </tr>
                <?php } ?>
                    </tbody>
                            </table>

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
    <script src="vendor/jquery/dist/jquery.min.js"></script>
    <script src="vendor/jquery-ui/jquery-ui.min.js"></script>
    <script src="vendor/slimScroll/jquery.slimscroll.min.js"></script>
    <script src="vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="vendor/metisMenu/dist/metisMenu.min.js"></script>
    <script src="vendor/iCheck/icheck.min.js"></script>
    <script src="vendor/sparkline/index.js"></script>
    <!-- DataTables -->
    <script src="vendor/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- DataTables buttons scripts -->
    <script src="vendor/pdfmake/build/pdfmake.min.js"></script>
    <script src="vendor/pdfmake/build/vfs_fonts.js"></script>
    <script src="vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="vendor/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <!-- App scripts -->
    <script src="scripts/homer.js"></script>


    <script>
        $(function() {

            // Initialize Example 1
//            $('#example2').dataTable({
//                "ajax": 'api/datatables.json',
//                dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
//                "lengthMenu": [
//                    [10, 25, 50, -1],
//                    [10, 25, 50, "All"]
//                ],
//                buttons: [{
//                        extend: 'copy',
//                        className: 'btn-sm'
//                    },
//                    {
//                        extend: 'csv',
//                        title: 'ExampleFile',
//                        className: 'btn-sm'
//                    },
//                    {
//                        extend: 'pdf',
//                        title: 'ExampleFile',
//                        className: 'btn-sm'
//                    },
//                    {
//                        extend: 'print',
//                        className: 'btn-sm'
//                    }
//                ]
//            });

            // Initialize Example 2
            $('#example2').dataTable();

        });

    </script>

</body>

</html>
