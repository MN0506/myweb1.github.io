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
<div class="col-sm-16 col-md-16 col-xs-16 col-lg-12 mb-30">
<a href="customer_order_summary.php" style="color:black;font-size:18px;font-weight:bold">Go Back</a><br><br>
<table class="table table-bordered">
<tr align="center">
<th>SLNO</th>
<th>Image</th>
<th>Name</th>
<th>Unit Price</th>
<th>Discount</th>
<th>Qty</th>
<th>Total Amount</th>        
<th>Order Status</th>
</tr>
<tbody>
<?php 
require("db_connection.php");    
require("5_session_data.php");      
$order_no=base64_decode($_REQUEST['ci_order_no']);
$sql=$conn->prepare("SELECT * FROM product_cart_details pc,customer_details c,product_details pd,stock_details s WHERE pd.pd_id=s.pd_id AND pc.cd_id=c.cd_id AND pc.pd_id=pd.pd_id AND c.cd_id=? AND pc.pcd_order_no=?");
$sql->bind_param("ii",$cd_id,$order_no);
$sql->execute();
$result=$sql->get_result();
$sno=1;
$total_amount=0;
while($row=$result->fetch_assoc())
{
?>    
<tr>
<td><?php echo $sno++;?></td>
<td><img src="admin/photos/<?php echo $row['pd_image1'];?>" width="102px" height="123px"></td>
<td><?php echo $row['pd_name'];?></td>
<td>&#8377;<?php echo $row['sd_unitprice'];?></td>
<td>&#8377;<?php echo $row['sd_discount'];?></td>
<td><?php echo $row['pcd_quantity'];?></td>
<td>&#8377;<?php echo $row['pcd_total'];?></td>    
<td><h6><?php echo $row['pcd_status'];?></h6></td>
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