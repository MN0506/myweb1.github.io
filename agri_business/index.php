<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
	<?php require("1_metatags.php"); ?>
</head>

<body>
    
    <!--====================  Header area ====================-->
    
    <?php require("2_header.php"); ?>
    
    <!--====================  End of Header area  ====================-->
    
    <!--====================  hero slider area ====================-->

    <div class="hero-slider-area mb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!--=======  hero slider wrapper  =======-->
                    
                    <div class="hero-slider-wrapper">
                        <div class="ht-slick-slider"
                        data-slick-setting='{
                            "slidesToShow": 1,
                            "slidesToScroll": 1,
                            "arrows": false,
                            "dots": true,
                            "autoplay": true,
                            "autoplaySpeed": 5000,
                            "speed": 1000,
                            "fade": true
                        }'
                        data-slick-responsive='[
                            {"breakpoint":1501, "settings": {"slidesToShow": 1} },
                            {"breakpoint":1199, "settings": {"slidesToShow": 1} },
                            {"breakpoint":991, "settings": {"slidesToShow": 1} },
                            {"breakpoint":767, "settings": {"slidesToShow": 1} },
                            {"breakpoint":575, "settings": {"slidesToShow": 1} },
                            {"breakpoint":479, "settings": {"slidesToShow": 1} }
                        ]'
                        >

                            <!--=======  single slider item  =======-->
                            
                            <div class="single-slider-item">
                                <div class="hero-slider-item-wrapper hero-slider-bg-1">
                                    <div class="hero-slider-content pl-60 pl-sm-30">
<!--                                        <p class="slider-title slider-title--small">The Stone Series</p>-->
                                        <p class="slider-title slider-title--big-bold">Eat Clean And Green.</p>
                                        <p class="slider-title slider-title--big-light">Eat Organic</p>
<!--                                        <a class="theme-button hero-slider-button" href="shop-left-sidebar.html">Shopping Now</a>-->
                                    </div>
                                </div>
                            </div>
                            
                            <!--=======  End of single slider item  =======-->

                            <!--=======  single slider item  =======-->
                            
                            <div class="single-slider-item">
                                <div class="hero-slider-item-wrapper hero-slider-bg-2">
                                    <div class="hero-slider-content pl-60 pl-sm-30">
<!--                                        <p class="slider-title slider-title--small">Workshops @Alula</p>-->
                                        <p class="slider-title slider-title--big-bold">Know Your Farmer</p>
                                        <p class="slider-title slider-title--big-light">Know Your Food</p>
<!--                                        <a class="theme-button hero-slider-button" href="shop-left-sidebar.html">Shopping Now</a>-->
                                    </div>
                                </div>
                            </div>
                            
                            <!--=======  End of single slider item  =======-->

                            <!--=======  single slider item  =======-->
                            
                            <div class="single-slider-item">
                                <div class="hero-slider-item-wrapper hero-slider-bg-3">
                                    <div class="hero-slider-content pl-60 pl-sm-30">
<!--                                        <p class="slider-title slider-title--small">Thursday Through Saturday</p>-->
                                        <p class="slider-title slider-title--big-bold">If You 
                                        Ate Today,</p>
                                        <p class="slider-title slider-title--big-light">Thank A Farmer</p>
<!--                                        <a class="theme-button hero-slider-button" href="shop-left-sidebar.html">Shopping Now</a>-->
                                    </div>
                                </div>
                            </div>
                            
                            <!--=======  End of single slider item  =======-->

                        </div>
                    </div>
                    
                    <!--=======  End of hero slider wrapper  =======-->
                </div>
            </div>
        </div>
    </div>

    <!--====================  End of hero slider area  ====================-->

    <!--====================  split banner area ====================-->
    
    
    
    <!--====================  End of split banner area  ====================-->
    <!--====================  product single row counter slider area ====================-->
<div class="page-section pb-40">
<div class="container">
<div class="row"><br><br>
<h1>Products</h1>
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
//$prod_cat_id=base64_decode($_REQUEST["pc_id"]);
$sql=$conn->prepare("SELECT * FROM product_details pd,stock_details s WHERE pd.pd_id=s.pd_id LIMIT $page1,12");
//$sql->bind_param("i",$prod_cat_id);
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
if($row["sd_quantity"]>$min_stock_qty)
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
$sql11=$conn->prepare("SELECT * FROM product_details pd,stock_details s WHERE pd.pd_id=s.pd_id");
//$sql11->bind_param("i",$prod_cat_id);
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
<li><a href="index.php?page=<?php echo $b;?>"><?php echo $b." ";?></a></li>
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
</div>
    
    
    <!--====================  footer area ====================-->
    
 <?php require("3_footer.php"); ?>
    
    <!--====================  End of footer area  ====================-->
    <!-- scroll to top  -->
    <a href="#" class="scroll-top"></a>
    <!-- end of scroll to top -->


	<!--=============================================
    =            JS files        =
    =============================================-->
    
	<?php require("4_footer_scripts.php"); ?>
    
    <!--=====  End of JS files ======-->

</body>

</html>