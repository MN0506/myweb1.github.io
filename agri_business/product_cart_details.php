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
<!--=======  breadcrumb content  =======-->

<div class="breadcrumb-content">
<ul>
<li class="has-child"><a href="index.php">Home</a></li>
<li>Cart</li>
</ul>
</div>
</div>
</div>
</div>
</div>
<div class="page-section pb-40">
<div class="container">
<div class="row">
<div class="col-12">			
<div class="cart-table table-responsive mb-40">
<?php 
require("db_connection.php");    
require("5_session_data.php"); 

$sql4=$conn->prepare("SELECT * FROM extra_charges");
$sql4->execute();
$result4=$sql4->get_result();
$row4=$result4->fetch_assoc();
$max_stock_qty=$row4["ec_max_stock_qty"];

$prod_cart_status="CART";    
$sql=$conn->prepare("SELECT * FROM product_cart_details pct,customer_details c,product_details pd,stock_details s WHERE pd.pd_id=s.pd_id AND pct.cd_id=c.cd_id AND pct.pd_id=pd.pd_id AND c.cd_id=? AND pct.pcd_status=?");
$sql->bind_param("is",$cd_id,$prod_cart_status);
$sql->execute();
$result=$sql->get_result();
if($result->num_rows>0){
?>
<table class="table">
<thead>
<tr>
<th class="pro-thumbnail">Image</th>
<th class="pro-title">Name</th>
<th class="pro-price">Unit Price</th>
<th class="pro-quantity">Discount</th>
<th class="pro-subtotal">Qty</th>
<th class="pro-subtotal">Total Amount</th>
<th class="pro-remove">UPDATE</th>
<th class="pro-remove">DELETE</th>
</tr>
</thead>
<tbody>
<?php 
$total_amount=0;    
while($row=$result->fetch_assoc()){
$total_amount=$total_amount+$row['pcd_total'];
?>
<tr>
<td class="pro-thumbnail"><img src="admin/photos/<?php echo $row['pd_image1'];?>" class="img-fluid" alt="Product" style="height:100px!important"></td>
<td class="pro-title"><h5><?php echo $row["pd_name"];?></h5></td>
<td class="pro-title"><h5>&#8377;<?php echo $row["pcd_unitprice"];?></h5></td>
<td class="pro-title"><h5>&#8377;<?php echo $row["sd_discount"];?></h5></td>
<form method="post" action="product_add_cart_update.php">
<td class="pro-quantity"> 
<h5>
<input type="number" name="update_qty" id="update_qty" value="<?php echo $row["pcd_quantity"];?>" min="1" max="<?php echo $max_stock_qty;?>">
</h5>
</td> 
<td class="pro-title"><h5>&#8377;<?php echo $row["pcd_total"];?></h5></td>
<td class="pro-remove">
<input type="hidden" name="pd_id" id="pd_id" value="<?php echo $row['pd_id'];?>">  
<input type="hidden" name="pcd_id" id="pcd_id" value="<?php echo $row['pcd_id'];?>">   
<input type="hidden" name="pcd_unitprice" id="pcd_unitprice" value="<?php echo $row['pcd_unitprice'];?>">
<input type="hidden" name="sd_discount" id="sd_discount" value="<?php echo $row['sd_discount'];?>">
<input type="submit" class="btn btn-info btn-md" value="&nbsp;&nbsp;EDIT&nbsp;&nbsp;">
</td>
</form>
<td class="pro-remove">
<form method="post" action="product_add_cart_delete.php">   
<input type="hidden" name="pcd_id" id="pcd_id" value="<?php echo $row['pcd_id'];?>">   
<input type="submit" class="btn btn-danger btn-md" role="button" value="DELETE">
</form>
</td>
</tr>
<?php 
} 
?>
</tbody>
</table>
</div>

<div class="row">
<?php 
require("db_connection.php");
$sql3=$conn->prepare("SELECT * FROM extra_charges");
$sql3->execute();
$result3=$sql3->get_result();
$row3=$result3->fetch_assoc();
$cgst=$row3['ec_cgst'];
$sgst=$row3['ec_sgst'];
$cgst_tot=$total_amount*$cgst/100;
$sgst_tot=$total_amount*$sgst/100;
$min_total_amount=$row3["ec_minimum_amount"];
$delivery_charges=$row3["ec_delivery_charges"];
$grand_total=$total_amount+$cgst_tot+$sgst_tot;
if($grand_total<$min_total_amount)
{
    $d_charges=$delivery_charges;
    $grand_total=$grand_total+$d_charges;
}
else
{
    $d_charges=0;
}
?>
<div class="col-lg-12 col-12 d-flex">
<!--=======  Cart summery  =======-->
<div class="cart-summary">
<div class="cart-summary-wrap">
<h4>Cart Summary</h4>
<p style="font-size:20px">Sub Total <span>&#8377;<?php echo $total_amount;?></span></p>
<p>CGST(<?php echo $cgst;?>%)<span>&#8377;<?php echo $cgst_tot;?></span></p>
<p>SGST(<?php echo $sgst;?>%)<span>&#8377;<?php echo $sgst_tot;?></span></p>
<p>
<?php 
if($d_charges!=0)
{
?>
Delivery Charges <br>(Free Delivery Above <?php echo $min_total_amount;?>)<span>&#8377;<?php echo $delivery_charges;?></span>
<?php
}else{
?>
Delivery Charges <span>Free Delivery</span>
<?php    
}
?>
</p>
<h2>Grand Total <span>&#8377;<?php echo $grand_total;?></span></h2>
</div>
<div class="row">
<div class="col-md-12 col-lg-12">
<form name="f1" method="post" action="product_checkout.php">
<input type="hidden" name="grand_total" id="grand_total" value="<?php echo $grand_total;?>">
<input type="hidden" name="sub_total" id="sub_total" value="<?php echo $total_amount;?>">
<input type="hidden" name="delivery_charges" id="delivery_charges" value="<?php echo $d_charges;?>">
<input type="hidden" name="ci_cgst_percent" id="ci_cgst_percent" value="<?php echo $cgst;?>">
<input type="hidden" name="ci_cgst" id="ci_cgst" value="<?php echo $cgst_tot;?>">
<input type="hidden" name="ci_sgst_percent" id="ci_sgst_percent" value="<?php echo $sgst;?>">
<input type="hidden" name="ci_sgst" id="ci_sgst" value="<?php echo $sgst_tot;?>">
<button class="btn btn-info btn-block" type="submit">PROCEED TO CHECKOUT</button>
</form>
</div>
</div>
<!--
<div class="cart-summary-button">
<button class="checkout-btn">Checkout</button>
</div>
-->
</div>
</div>
</div>

</div>
</div>
</div>
<?php 
}
else{
?>
    <center><h3>SHOPPING CART EMPTY!!!!!!</h3></center>
<?php    
}    
?>   
  
</div>

<!--====================  End of page content  ====================-->


<!--====================  footer area ====================-->

<?php require("3_footer.php"); ?>

<!--====================  End of footer area  ====================-->
<!-- scroll to top  -->
<a href="#" class="scroll-top"></a>
<!-- end of scroll to top -->
<?php require("4_footer_scripts.php"); ?>

<!--=====  End of JS files ======-->

</body>
</html>