<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
<?php require("1_metatags.php"); ?>
</head>
<body>
<?php require("2_header.php"); ?>
<div class="breadcrumb-area pt-10 pb-10 border-bottom mb-40">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="breadcrumb-content">
<ul>
<li class="has-child"><a href="index.php">Home</a></li>
<li>Order Summary</li>
</ul>
</div>
</div>
</div>
</div>
</div>
<div class="page-section pb-40">
<div class="container">
<div class="row">
<div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30">
    <table class="table table-bordered">
        <tr align="center">
            <th>SLNO</th>        
            <th>Name</th>        
            <th>ORDER NO</th>
            <th>SADDRESS</th>
            <th>LANDMARK</th>
            <th>CONTACT</th>
            <th>PAYMENT MODE</th>
            <th>TRANSACTION</th>
            <th>DATE</th>
            <th>STATUS</th>
            <th>PRODUCTS</th>
        </tr>
        <tbody>
            <?php     
            require("db_connection.php");    
            require("5_session_data.php");    
            $sql=$conn->prepare("SELECT * FROM customer_invoice ci,customer_details c WHERE ci.cd_id=c.cd_id AND ci.cd_id=?");
            $sql->bind_param("i",$cd_id);
            $sql->execute();
            $result=$sql->get_result();
            $sno=1;
            while($row=$result->fetch_assoc())
            {
            ?>    
            <tr>
                <form method="post" action="#">        
                    <td><?php echo $sno++;?></td>    
                    <td><?php echo $row['cd_name'];?></td>
                    <td><?php echo $row['ci_order_no'];?></td>
                    <td><?php echo $row['ci_shipping_address'];?></td>
                    <td><?php echo $row['ci_landmark'];?></td>
                    <td><?php echo $row['ci_contact_no'];?></td>
                    <td><?php echo $row['ci_payment_mode'];?></td>
                    <td><?php echo $row['ci_transaction_no'];?></td>
                    <td><h6><?php echo $row['ci_date'];?></h6></td>
                    <td><h6><?php echo $row['ci_status'];?></h6></td>
                    <td><a href="customer_order_summary_products.php?ci_order_no=<?php echo base64_encode($row['ci_order_no']);?>" class="btn btn-primary">View Products</a></td>
                </form>
            </tr>
            <?php } ?>
        </tbody>    
    </table>
    </div>
    </div>
    </div>
    </div>
    <?php require("3_footer.php"); ?>
    <a href="#" class="scroll-top"></a>
    <?php require("4_footer_scripts.php"); ?>
    </body>
</html>