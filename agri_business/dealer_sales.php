<!doctype html>
<html class="no-js" lang="zxx">
<?php require("1_metatags.php"); ?>
<body>
<!-- Begin Body Wraper Area -->
<div class="body-wrapper">
<!-- Begin Header Area -->
<?php require("2_header.php"); ?>
<!-- Header Area End Here -->
<!-- Begin FB's Breadcrumb Area -->
<div class="breadcrumb-area pt-30">
<div class="container">
<div class="row">
    <div class="col-lg-12">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li class="active">SALES DETAILS</li>
            </ul>
        </div>
    </div>
</div>
</div>
</div>
<!-- FB's Breadcrumb Area End Here -->
<!--Shopping Cart Area Strat-->
<div class="Shopping-cart-area pt-60 pb-60">
<div class="container">
<div class="row">
    <div class="col-12">
        <form action="#">
            <div class="table-content table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>SLNO</th>
                            <th>PRODUCT CATEGORY</th>
                            <th>DESCRIPTION</th>
                            <th>QUANTITY PURCHASED</th>
                            <th>UNIT PRICE</th>
                            <th>TOTAL AMOUNT</th>
                            <th>DATE</th>
                            </tr>
                    </thead>
                    <tbody>
                    <?php     
require("db_connection.php");    
require("4_customer_session_data.php"); 
$username=$_SESSION["supplier"];
$sql11=$conn->prepare("SELECT * FROM supplier_details WHERE spd_username=?");
$sql11->bind_param("s",$username);
$sql11->execute();  
$result11=$sql11->get_result();
$row11=$result11->fetch_assoc();
$spd_id=$row11["spd_id"];
 
$sppd_status="CONFIRMED";
$sql=$conn->prepare("SELECT * FROM product_category,supplier_details,supplier_product_details where supplier_details.spd_id=? and supplier_product_details.spd_id=supplier_details.spd_id and supplier_product_details.pc_id=product_category.pc_id and supplier_product_details.sppd_status=?");
$sql->bind_param("is",$spd_id,$sppd_status);
$sql->execute();
$result=$sql->get_result();
$sno=1;
while($row=$result->fetch_assoc())
{
?> 
<tr>   
    <td><?php echo $sno++;?></td>    
    <td><?php echo $row['pc_name'];?></td>
    <td><?php echo $row['sppd_description'];?></td>
    <td><?php echo $row['sppd_quantity_purchased'];?></td>
    <td><?php echo $row['sppd_unit_price'];?></td>
    <td><?php echo $row['sppd_total_amount'];?></td>
    <td><?php echo $row['sppd_date'];?></td>
</tr>
<?php } ?>
                    </tbody>
                </table>
            </div>


        </form>
    </div>
     <div class="col-12">
     <br><br><br> <br><br><br>
    </div>
</div>
</div>
</div>
<!--Shopping Cart Area End-->

<!-- Begin FB's Footer Area -->
<?php require("3_footer.php"); ?>
<!-- FB's Footer Area End Here -->
</div>
<!-- Body Wraper Area End Here -->
<!-- JS
============================================ -->
<!-- jQuery JS -->
<?php require("4_footer_scripts.php"); ?>
</body>
</html>
