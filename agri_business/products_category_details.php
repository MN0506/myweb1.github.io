<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
<?php require("1_metatags.php"); ?>
<?php require("5_session_data.php"); ?>
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
<li>Crops</li>
</ul>
</div>

<!--=======  End of breadcrumb content  =======-->
</div>
</div>
</div>
</div>

<!--====================  End of breadcrumb area  ====================-->

<!--==================== page content ====================-->

<div class="page-section pb-40">
<div class="container">
<div class="row">
<div class="col-lg-3 order-2 d-none">
<!--=======  page sidebar  =======-->

<div class="page-sidebar">
<!--=======  page sidebar banner  =======-->

<div class="page-sidebar-banner">
<a href="shop-left-sidebar.html">
<img src="assets/img/banners/banner-sidebar.jpg" class="img-fluid" alt="">
</a>
</div>

<!--=======  End of page sidebar banner  =======-->

</div>

<!--=======  End of page sidebar  =======-->
</div>
<div class="col-lg-12 order-1">
<!--=======  shop banner  =======-->

<div class="shop-banner mb-30 text-center d-none">
<img src="assets/img/banners/shop-banner.jpg" class="img-fluid" alt="">
</div>

<!--=======  End of shop banner  =======-->


<!--=======  End of shop header  =======-->

<!--=======  shop page content  =======-->

<div class="row shop-product-wrap grid four-column mb-10">

<?php 
require("db_connection.php");
$sql4=$conn->prepare("SELECT * FROM extra_charges");
$sql4->execute();
$result4=$sql4->get_result();
$row4=$result4->fetch_assoc();
$max_stock_qty=$row4["ec_max_stock_qty"];
$min_stock_qty=$row4["ec_min_stock_qty"];
    
$page=@$_GET["page"];
if($page=="" ||$page=="1"){
$page1=0;
}
else{
$page1=($page*12)-12;
}
$prod_cat_id=base64_decode($_REQUEST["pc_id"]);
$sql=$conn->prepare("SELECT * FROM product_details pd,stock_details s WHERE pd.pd_id=s.pd_id AND pd.pc_id=? LIMIT $page1,12");
$sql->bind_param("i",$prod_cat_id);
$sql->execute();
$result=$sql->get_result();
while($row=$result->fetch_assoc()){
?>
<div class="col-12 col-lg-3 col-md-6 col-sm-6 mb-20">
<div class="single-slider-product grid-view-product">
<div class="single-slider-product__image">
<a href="products_category_details_description.php?pd_id=<?php echo base64_encode($row['pd_id']);?>&pc_id=<?php echo base64_encode($row['pc_id']);?>">
<img src="admin/photos/<?php echo $row["pd_image1"];?>" class="img-fluid" style="height:210px!important">
</a>
</div>
<div class="single-slider-product__content">
<p class="product-title" style="font-size:15px"><?php echo $row["pd_name"];?></p>
<div class="rating" style="font-size:12px;font-weight:bold">
Availability :
<?php 
if($row["sd_quantity"]<=$min_stock_qty || $row["sd_status"]=="OUT OF STOCK")
{
?>
<span style="color:red">OUT OF STOCK</span>    
<?php
}else{
?>
<span style="color:green">IN STOCK</span>    
<?php    
}
?>                                
</div>
<?php 
if($row["sd_discount"]!=0)
{
$discount_price=$row["sd_unitprice"]-$row["sd_discount"];
?>
<p class="product-price" style="text-align:center">
<span class="discounted-price">Price : &#8377;<?php echo $discount_price;?></span>
<span class="main-price discounted">&#8377;<?php echo $row["sd_unitprice"];?></span>
</p>
<?php    
}else
{
?>
<p class="product-price" style="text-align:center">
<span class="discounted-price">Price : &#8377;<?php echo $row["sd_unitprice"];?></span>
</p>    
<?php
}    
?>
<p style="text-align:center;font-size:18px"><a href="products_category_details_description.php?pd_id=<?php echo base64_encode($row['pd_id']);?>&pc_id=<?php echo base64_encode($row['pc_id']);?>" style="color:black">View Description</a></p>
<br>
<?php 
if($row["sd_quantity"]>$min_stock_qty && $row["sd_status"]=="IN STOCK")
{
if($customer_session==TRUE)
{
?>
<div align="center">
<form method="post" action="product_add_cart.php">
<input type="hidden" name="pd_id" id="pd_id" value="<?php echo $row['pd_id'];?>">
<input type="hidden" name="pd_name" id="pd_name" value="<?php echo $row['pd_name'];?>">
<input type="hidden" name="pcd_quantity" id="pcd_quantity" value="1">
<input type="hidden" name="sd_unitprice" id="sd_unitprice" value="<?php echo $row['sd_unitprice'];?>">
<input type="hidden" name="sd_discount" id="sd_discount" value="<?php echo $row['sd_discount'];?>">
<input type="submit" class="btn btn-success" value="Add To Cart">
</form>
</div>
<?php 
}
else
{
?>
<div align="center">
<form method="post" action="customer_register_login.php">
<?php 
include_once('5_current_page_url.php');
?>
<input type="hidden" name="product_details_url" id="product_details_url" value="<?php echo $current_link;?>">
<input type="submit" class="btn btn-info" value="Login">
</form>
</div>
<?php
}
}else
{
?>
<center><button type="button" class="btn btn-danger" disabled>OUT OF STOCK</button></center>
<?php
}
?>
<!--<span class="cart-icon"><a href="javascript:void(0)"><i class="icon-shopping-cart"></i></a></span>-->
</div>
</div>
</div>
<?php } ?>

</div>

<!--=======  End of shop page content  =======-->

<!--=======  pagination  =======-->
<?php
$sql11=$conn->prepare("SELECT * FROM product_details pd,stock_details s WHERE pd.pd_id=s.pd_id AND pd.pc_id=?");
$sql11->bind_param("i",$prod_cat_id);
$sql11->execute();
$result11=$sql11->get_result();
$cou=$result11->num_rows;
$a=$cou/12; //number of products per page
$a=ceil($a);
?>
<div class="pagination-section mb-md-30 mb-sm-30">
<ul class="pagination">
<?php
for($b=1;$b<=$a;$b++){
?>
<li><a href="products_category_details.php?pc_id=<?php echo $_REQUEST["pc_id"]; ?>&page=<?php echo $b;?>"><?php echo $b." ";?></a></li>
<?php } ?>
</ul>

<div class="pagination-text">
Showing 1 to 12 of <?php echo $cou;?>
</div>
</div>

<!--=======  End of pagination  =======-->
</div>
</div>
</div>
</div><br><br>
<?php require("3_footer.php"); ?>
<!-- scroll to top  -->
<a href="#" class="scroll-top"></a>
<!-- end of scroll to top -->
<?php require("4_footer_scripts.php"); ?>

<!--=====  End of JS files ======-->

</body>
</html>