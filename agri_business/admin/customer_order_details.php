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
                    <button type="button" onclick="window.location.href='customer_order_placed.php' " class="btn btn-primary" style="float:left;">BACK</button>
                   <h1 align="center">CUSTOMER ORDER DETAILS</h1>
                </div>

                           <?php
        require("db_connection.php");
        $customer_id=$_POST['cd_id'];
        $order_date=$_POST['ci_date'];
		$order_no=$_POST['ci_order_no'];
                                    
       $sql=$conn->prepare("SELECT * FROM customer_invoice,customer_details WHERE customer_invoice.cd_id=? AND customer_invoice.ci_date=? AND customer_invoice.ci_order_no=? AND customer_invoice.cd_id=customer_details.cd_id ");
       $sql->bind_param("iss",$customer_id,$order_date,$order_no);
       $sql->execute();
       $result=$sql->get_result();
        $row=$result->fetch_assoc();
        ?>
            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                 <thead>
                <tr>
                    <td colspan="6" align="center"><b>Customer Details</b></td>
                </tr>
                <tr>
                    <td><b>Name</b></td>
                    <td colspan="2"><?php echo $row['cd_name'];?></td>
                    <td><b>Contact No.</b></td>
                    <td colspan="2"><?php echo $row['cd_contact'];?></td>
                </tr>
                <tr>
                    <td><b>Shipping Address</b></td>
                    <td colspan="2"><?php echo $row['ci_shipping_address'];?>
                    </td>
                    <td><b>Email ID</b></td>
                    <td colspan="2"><?php echo $row['cd_email_id'];?></td>
                </tr>
                <tr>
                    <td><b>Landmark</b></td>
                    <td colspan="5"><?php echo $row['ci_landmark'];?>
                    </td>
                </tr>

                <tr><td colspan="6" align="center"><b>Product Order Details</b></td></tr>

                <tr>
                <td><b>Sl No.</b></td>
                <td><b>Product Name</b></td>
                <td align="right"><b>Unit Price</b></td>
                 <td align="right"><b>Discount</b></td>
                <td align="right"><b>Quantity</b></td>
                <td align="right"><b>Total</b></td>
                </tr>
                </thead>
                <tbody>
                <?php    

                $sql1=$conn->prepare("SELECT * FROM product_cart_details,stock_details WHERE product_cart_details.cd_id=? AND product_cart_details.pcd_order_no=? AND product_cart_details.pcd_order_date=? AND product_cart_details.pd_id=stock_details.pd_id");
                $sql1->bind_param("iss",$customer_id,$order_no,$order_date);
               $sql1->execute();
               $result1=$sql1->get_result();
                $total=0;                               
                $sl=1;
                while($row1=$result1->fetch_assoc())
                {
                $total+=$row1['pcd_total'];
                ?>
                <tr>
                <td>
                <?php echo $sl++//$row['customer_id'];?>
                </td>

                <td>
                <?php echo $row1['pcd_name'];?>
                </td>
                <td align="right">
                <?php echo $row1['pcd_unitprice'];?>
                </td>
                <td align="right">
                <?php echo $row1['sd_discount'];?>
                </td>
                <td align="right">
                <?php echo $row1['pcd_quantity'];?>
                </td>
                


                <td align="right">
                <?php echo $row1['pcd_total'];?>
                </td>


                </tr>

                <?php
                }

                ?>
                <tr><td colspan="5" align="right">Sub Total</td>
                <td align="right"><b><?php echo $total;?></b></td></tr>

                <tr><td colspan="5" align="right">CGST( <?php echo $row['ci_cgst_percent'];?> %)</td>
                <td align="right"><?php echo $row['ci_cgst'];?></td></tr>

                <tr><td colspan="5" align="right">SGST( <?php echo $row['ci_sgst_percent'];?> %)</td>
                <td align="right"><?php echo $row['ci_sgst'];?></td></tr>
                 <tr><td colspan="5" align="right">Delivery Charge</td>
                <td align="right"><b><?php echo $row['ci_delivery_charges'];?></b></td></tr>
                <tr><td colspan="5" align="right">Grnad Total</td>
                <td align="right"><b><?php echo $row['ci_total_price'];?></b></td></tr>
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
