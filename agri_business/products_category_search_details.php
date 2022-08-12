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
<div class="breadcrumb-content">
<ul>
<li class="has-child"><a href="index.php">Home</a></li>
<li class="has-child"><a href="#">Product Category Details</a></li>
<li>Product Category Details Description</li>
</ul>
</div>
</div>
</div>
</div>
</div>

<!--====================  End of breadcrumb area  ====================-->

<!--====================  product details area ====================-->

<div class="product-details-area mb-40">
<div class="container">
<div class="row">
<div class="col-lg-6 mb-md-30 mb-sm-25">
<!--=======  product details slider  =======-->

<!--=======  big image slider  =======-->

<div class="big-image-slider-wrapper big-image-slider-wrapper--change-cursor">
<div class="ht-slick-slider big-image-slider99"
data-slick-setting='{
"slidesToShow": 1,
"slidesToScroll": 1,
"dots": false,
"autoplay": false,
"autoplaySpeed": 5000,
"speed": 1000
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

<!--=======  big image slider single item  =======-->

<?php 
require("db_connection.php");
$sql4=$conn->prepare("SELECT * FROM extra_charges");
$sql4->execute();
$result4=$sql4->get_result();
$row4=$result4->fetch_assoc();
$max_stock_qty=$row4["ec_max_stock_qty"];
$min_stock_qty=$row4["ec_min_stock_qty"];    

$product_name=$_POST["typeahead"];
$sql=$conn->prepare("SELECT * FROM product_details pd,product_category pc,stock_details s WHERE pd.pc_id=pc.pc_id AND pd.pd_id=s.pd_id AND pd.pd_name=?");
$sql->bind_param("s",$product_name);
$sql->execute();
$result=$sql->get_result();
$row=$result->fetch_assoc();
$prod_det_id=$row["pd_id"];
$prod_cat_id=$row["pc_id"];
?>
<div class="big-image-slider-single-item">
<img src="admin/photos/<?php echo $row["pd_image1"];?>" class="img-fluid" alt="">
</div>
<div class="big-image-slider-single-item">
<img src="admin/photos/<?php echo $row["pd_image2"];?>" class="img-fluid" alt="">
</div>


</div>
</div>
<div class="small-image-slider-wrapper small-image-slider-wrapper--quickview">
<div class="ht-slick-slider small-image-slider"
data-slick-setting='{
"slidesToShow": 4,
"slidesToScroll": 1,
"dots": false,
"autoplay": false,
"autoplaySpeed": 5000,
"speed": 1000,
"asNavFor": ".big-image-slider99",
"focusOnSelect": true,
"arrows": true,
"prevArrow": {"buttonClass": "slick-prev", "iconClass": "ion-ios-arrow-left" },
"nextArrow": {"buttonClass": "slick-next", "iconClass": "ion-ios-arrow-right" }
}'
data-slick-responsive='[
{"breakpoint":1501, "settings": {"slidesToShow": 4} },
{"breakpoint":1199, "settings": {"slidesToShow": 4} },
{"breakpoint":991, "settings": {"slidesToShow": 4} },
{"breakpoint":767, "settings": {"slidesToShow": 4} },
{"breakpoint":575, "settings": {"slidesToShow": 3} },
{"breakpoint":479, "settings": {"slidesToShow": 2} }
]'
>

<!--=======  small image slider single item  =======-->

<div class="small-image-slider-single-item">
<img src="admin/photos/<?php echo $row["pd_image1"];?>" class="img-fluid" alt="">
</div>
<div class="small-image-slider-single-item">
<img src="admin/photos/<?php echo $row["pd_image2"];?>" class="img-fluid" alt="">
</div>


</div>
</div>

<!--=======  End of small image slider  =======-->

<!--=======  End of product details slider  =======-->
</div>

    <div class="col-lg-6">
        <!--=======  product details content  =======-->

        <div class="product-detail-content">
            <div class="tags mb-5">
                <span class="tag-title" style="font-size:20px;font-weight:bold"><?php echo $row['pc_name'];?></span>
            </div>

            <h3 class="product-details-title mb-15"><?php echo $row["pd_name"];?></h3>
            <?php 
            if($row["sd_discount"]!=0)
            {
                $discount_price=$row["sd_unitprice"]-$row["sd_discount"];
            ?>
            <p class="product-price product-price--big mb-10"><span class="discounted-price" style="color:#5a5a5a">&#8377;<?php echo $discount_price ;?></span> <span class="main-price discounted">&#8377;<?php echo $row["sd_unitprice"];?></span></p>
            <?php    
            }else{
            ?>
            <p class="product-price product-price--big mb-10"><span class="discounted-price" style="color:#5a5a5a">&#8377;<?php echo $row["sd_unitprice"];?></span></p>
            <?php } ?>
            <!--<p class="product-price product-price--big mb-10"><span class="discounted-price">$100.00</span> <span class="main-price discounted">$120.00</span></p>-->

            <div class="product-info-block mb-30">
                
                <div class="single-info">
                    <?php 
                    if($row["sd_quantity"]<=$min_stock_qty || $row["sd_status"]=="OUT OF STOCK")
                    {
                    ?>
                    <span class="title" style="font-size:18px">Availability:</span>
                    <span class="value stock-red" style="font-size:22px;color:red">OUT OF STOCK</span>
                    <div class="product-short-desc mb-25">
                        <p><?php echo $row["pd_description"];?></p>
                    </div>
                    <?php
                    }
                    else{
                    ?>      
                    <span class="title" style="font-size:18px">Availability:</span>
                    <span class="value stock-red" style="font-size:22px">IN STOCK</span>
                </div>
            </div>

            <div class="product-short-desc mb-25">
                <p style="text-align:justify;"><?php echo $row["pd_description"];?></p>
            </div>

            <?php
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
                    <input type="submit" class="btn btn-info btn-lg" value="Add To Cart">
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
                    <input type="submit" class="btn btn-primary" value="Login">
                </form>
            </div>
            <?php
                        }
                    }
            ?>
            <div class="product-details-feature-wrapper d-flex justify-content-start mt-20">
                <div class="single-icon-feature single-icon-feature--product-details ml-30 ml-xs-0 ml-xxs-0">
                    <div class="single-icon-feature__icon">
                        <img src="assets/img/icons/guarantee.png" class="img-fluid" alt="">
                    </div>
                    <div class="single-icon-feature__content">
                        <?php 
                        $sql1=$conn->prepare("SELECT * FROM extra_charges");
                        $sql1->execute();
                        $result1=$sql1->get_result();
                        $row1=$result1->fetch_assoc();    
                        ?>
                        <p class="feature-text">Purchase Product Above &#8377;<?php echo $row1["ec_minimum_amount"];?> & Get Free Delivery</p>
                    </div>
                </div>

                <!--=======  End of single icon feature  =======-->
            </div>
        </div>

        <!--=======  End of product details content  =======-->                    
    </div>
    </div>
    </div>
    </div>
<hr>
    <!--====================  End of product details area  ====================-->


   
    <!--====================  product single row slider area ====================-->

    <div class="product-single-row-slider-area mb-40">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <!--=======  section title  =======-->

                    <div class="section-title mb-20">
                        <h2>Related Products</h2>
                    </div>

                    <!--=======  End of section title  =======-->
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <!--=======  product single row slider wrapper  =======-->

                    <div class="product-single-row-slider-wrapper">
                        <div class="ht-slick-slider"
                             data-slick-setting='{
                                                 "slidesToShow": 4,
                                                 "slidesToScroll": 1,
                                                 "dots": false,
                                                 "autoplay": false,
                                                 "autoplaySpeed": 5000,
                                                 "speed": 1000,
                                                 "arrows": true,
                                                 "infinite": false,
                                                 "prevArrow": {"buttonClass": "slick-prev", "iconClass": "ion-ios-arrow-left" },
                                                 "nextArrow": {"buttonClass": "slick-next", "iconClass": "ion-ios-arrow-right" }
                                                 }'
                             data-slick-responsive='[
                                                    {"breakpoint":1501, "settings": {"slidesToShow": 4} },
                                                    {"breakpoint":1199, "settings": {"slidesToShow": 4} },
                                                    {"breakpoint":991, "settings": {"slidesToShow": 3} },
                                                    {"breakpoint":767, "settings": {"slidesToShow": 2, "arrows": false} },
                                                    {"breakpoint":575, "settings": {"slidesToShow": 2, "arrows": false} },
                                                    {"breakpoint":479, "settings": {"slidesToShow": 1, "arrows": false} }
                                                    ]'
                             >

                            <!--=======  single slider product  =======-->

                            <?php 
                            require("db_connection.php");    
                            $sql2=$conn->prepare("SELECT * FROM product_details pd,stock_details s WHERE pd.pd_id=s.pd_id AND pd.pc_id=?");
                            $sql2->bind_param("i",$prod_cat_id);
                            $sql2->execute();
                            $result2=$sql2->get_result();
                            while($row2=$result2->fetch_assoc()){
                            ?>
                            <div class="single-slider-product-wrapper">
                                <div class="single-slider-product">
                                    <div class="single-slider-product__image">
                                        <a href="products_category_details_description.php?pd_id=<?php echo base64_encode($row2['pd_id']);?>&pc_id=<?php echo base64_encode($row2['pc_id']);?>">
                                            <img src="admin/photos/<?php echo $row2["pd_image1"];?>" class="img-fluid" style="height:210px!important">
                                        </a>
                                    </div>

                                    <div class="single-slider-product__content">
                                        <p class="product-title" style="font-size:20px"><?php echo $row2["pd_name"];?></p>
                                        <div class="rating" style="font-size:12px;font-weight:bold">
                                            Availability :
                                            <?php 
                                if($row2["sd_quantity"]<=$min_stock_qty || $row2["sd_status"]=="OUT OF STOCK")
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
                                if($row2["sd_discount"]!=0)
                                {
                                    $discount_price=$row2["sd_unitprice"]-$row2["sd_discount"];
                                        ?>
                                        <p class="product-price" style="text-align:center">
                                            <span class="discounted-price">Price : &#8377;<?php echo $discount_price;?></span>
                                            <span class="main-price discounted">&#8377;<?php echo $row2["sd_unitprice"];?></span>
                                        </p>
                                        <?php    
                                }else
                                {
                                        ?>
                                        <p class="product-price" style="text-align:center">
                                            <span class="discounted-price">Price : &#8377;<?php echo $row2["sd_unitprice"];?></span>
                                        </p>    
                                        <?php
                                }    
                                        ?>
                                        <p style="text-align:center;font-size:18px"><a href="products_category_details_description.php?pd_id=<?php echo base64_encode($row2['pd_id']);?>&pc_id=<?php echo base64_encode($row2['pc_id']);?>" style="color:black">View Description</a></p>
                                        <br>
                                        <?php 
                                if($row2["sd_quantity"]>$min_stock_qty && $row2["sd_status"]=="IN STOCK")
                                {
                                    if($customer_session==TRUE)
                                    {
                                        ?>
                                        <div align="center">
                                            <form method="post" action="product_add_cart.php">
                                                <input type="hidden" name="pd_id" id="pd_id" value="<?php echo $row2['pd_id'];?>">
                                                <input type="hidden" name="pd_name" id="pd_name" value="<?php echo $row2['pd_name'];?>">
                                                <input type="hidden" name="pcd_quantity" id="pcd_quantity" value="1">
                                                <input type="hidden" name="sd_unitprice" id="sd_unitprice" value="<?php echo $row2['sd_unitprice'];?>">
                                                <input type="hidden" name="sd_discount" id="sd_discount" value="<?php echo $row2['sd_discount'];?>">
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
                                                <input type="submit" class="btn btn-success" value="Login">
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
                    </div>

                    <!--=======  End of product single row slider wrapper  =======-->
                </div>
            </div>
        </div>
    </div>

    <!--====================  End of product single row slider area  ====================-->
    <!--====================  footer area ====================-->

    <?php require("3_footer.php"); ?>

    <!--====================  End of footer area  ====================-->
    <!-- scroll to top  -->
    <a href="#" class="scroll-top"></a>
    <!-- end of scroll to top -->


    <!--=============================================
=            Quick view modal         =
=============================================-->

    <!--=====  End of Quick view modal  ======-->
    <!--=============================================
=            JS files        =
=============================================-->

    <?php require("4_footer_scripts.php"); ?>

    <!--=====  End of JS files ======-->

    </body>
</html>