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
                    <button type="button" onclick="window.location.href='stock_details_form.php' " class="btn btn-primary" style="float:left;">New</button>
                   <h1 align="center">Stock Details</h1>
                </div>

                            <table id="example2" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>SI_NO</th>
                                        <th>PRODUCT</th>
                                        <th>QUANTITY</th>
                                        <th>UNIT PRICE</th>
                                        <th>DISCOUNT</th>
                                        <th>DATE</th>
                                        <th>STATUS</th>
                                        <th>EDIT</th>
                                        <th>DELETE</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require("db_connection.php");
                                    $sql=$conn->prepare("select * from stock_details,product_details where stock_details.pd_id=product_details.pd_id order by sd_id desc");
                                    $sql->execute();
                                    $result=$sql->get_result();
                                    $sno=1;
                                    while($row=$result->fetch_assoc()){
                                    ?>
                                       <tr>
                                        <td><?php echo $sno++;?></td>
                                        <td><?php echo $row["pd_name"];?></td>
                                        <td><?php echo $row["sd_quantity"];?></td>
                                        <td><?php echo $row["sd_unitprice"];?></td>
                                        <td><?php echo $row["sd_discount"];?></td>
                                        <td><?php echo $row["sd_date"];?></td>
                                        <td><?php echo $row["sd_status"];?></td>
                                        <td><a href="stock_details_edit.php?sd_id=<?php echo base64_encode($row['sd_id']);?>" class=" btn btn-success">EDIT</a></td>
                                     <td><a href="stock_details_delete.php?sd_id=<?php echo base64_encode($row['sd_id']);?>" class="btn btn-danger">DELETE</a></td>
                                    </tr>
                                <?php
                                    }
                                    ?>

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
