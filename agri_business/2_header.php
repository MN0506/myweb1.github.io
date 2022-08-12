<div class="header-area header-sticky">
        <!--====================  Navigation top ====================-->

        <div class="navigation-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!--====================  navigation section ====================-->
                                            
                        <div class="navigation-top-topbar pt-10 pb-10"> 
                            <div class="row align-items-center">
                                <div class="col-lg-4 col-md-6 text-center text-md-left">
                                    <!--=======  header top social links  =======-->

                                    <div class="header-top-social-links">
                                        <span class="follow-text mr-15"><b>EMAIL US :</b></span>
                                        <!--=======  social link small  =======-->
                                        
                                        <ul class="social-link-small">
                                            <li><b style="color:white;">agribusiness@gmail.com</b></li>
                                            
                                        </ul>
                                        
                                        <!--=======  End of social link small  =======-->
                                    </div>
                                    
                                    
                                    <!--=======  End of header top social links  =======-->
                                </div>
                                
                                <div class="col-lg-4 offset-lg-4 col-md-6">
                                    <!--=======  header top dropdown container  =======-->
                                    
                                    <div class="headertop-dropdown-container justify-content-center justify-content-md-end" style="color:white;">
                                       
                               <?php 
if(isset($_SESSION["grow_smart_customer"]))
{
    require("db_connection.php");
    $sql=$conn->prepare("SELECT * FROM customer_details WHERE cd_username=?");
    $sql->bind_param("s",$_SESSION["grow_smart_customer"]);
    $sql->execute();
    $result=$sql->get_result();
    $row=$result->fetch_assoc();
    $fullname=$row["cd_name"];
?>
                    Welcome, <?php echo $fullname; ?>
                                       <span class="separator">|</span>                   
                                        <div class="header-top-single-dropdown">
                                            <a href="javascript:void(0)" class="active-dropdown-trigger" id="user-options">My Account <i class="ion-ios-arrow-down"></i></a>
                                            <!--=======  dropdown menu items  =======-->
                                            
                                            <div class="header-top-single-dropdown__dropdown-menu-items deactive-dropdown-menu extra-small-mobile-fix">
                                                <ul>
                                <li><a href="customer_profile.php">PROFILE</a></li>
                                <li><a href="customer_order_summary.php">ORDER SUMMARY</a></li>
                                <li><a href="logout.php">LOGOUT</a></li>
                                                </ul>
                                            </div>
                                            
                                            <!--=======  End of dropdown menu items  =======-->
                                        </div>
                                        
                                        
<?php 
}
else
{    
?>                         <div class="header-top-single-dropdown">
                                        <a href="dealers_login_register.php">DEALERS LOGIN / REGISTER</a>
                                            <!--=======  dropdown menu items  =======-->
                                            <!--=======  End of dropdown menu items  =======-->
                                        </div>
                                     
                                        
                                           
                                                 <div class="header-top-single-dropdown">
                                        <a href="customer_register_login.php">LOGIN / REGISTER</a>
                                            <!--=======  dropdown menu items  =======-->
                                            <!--=======  End of dropdown menu items  =======-->
                                        </div>
                                        
                                        <?php } ?>
   
                                        
                                    </div>
                                    
                                    <!--=======  End of header top dropdown container  =======-->
                                </div>
                            </div>
                        </div>

                        <!--====================  End of navigation section  ====================-->
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <!--====================  navigation top search ====================-->


                        <div class="navigation-top-search-area pt-25 pb-25">
                            <div class="row align-items-center">
                                <div class="col-6 col-xl-2 col-lg-3 order-1 col-md-6 col-sm-5">
                                    <!--=======  logo  =======-->
                                    <div class="logo">
<a href="index.php">
<img src="assets/img/logo.png" class="" alt="" width="220" height="80">
</a>
</div>

                                    <!--=======  End of logo  =======-->
                                </div>

                                <div class="col-xl-5 offset-xl-1 col-lg-4 order-4 order-lg-2 mt-md-25 mt-sm-25">
                                    <!--=======  search bar  =======-->
                                    
<div class="search-bar">
<?php include('6_product_ajax_search_css.php');?>
<div class="row">      
<form name="f1" method="post" action="products_category_search_details.php">         
<input type="text" name="typeahead" class="typeahead" autocomplete="off" spellcheck="false" placeholder="Search Products" size="60">     
<button type="submit"> <i class="icon-search"></i></button>
</form>
</div>
</div>
                                    
                                    <!--=======  End of search bar  =======-->
                                </div>

                                <div class="col-xl-3 col-lg-3 order-3 order-sm-2 order-lg-3 order-xs-3 col-md-4 col-sm-5 text-center text-sm-left mt-xs-25">
                                    <!--=======  customer support text  =======-->
                                    
                                    <div class="customer-support-text">
                                        <div class="icon" style="font-size:40px;">
<!--                                            <img src="assets/img/icons/icon-header-phone.png" class="img-fluid" alt="">-->
                                       <i class="fa fa-mobile-phone" style="color:white;"></i>
                                        </div>

                                        <div class="text">
                                            <span>Contact Us</span>
                                            <p>9620180079</p>
                                        </div>
                                    </div>
                                    
                                    <!--=======  End of customer support text  =======-->
                                </div>

                                <div class="col-6 col-xl-1 col-lg-2 text-right order-2 order-sm-3 order-lg-4 order-xs-2 col-md-2 col-sm-2">
                                    <!--=======  cart icon  =======-->
<?php 
require("5_session_data.php");
require("db_connection.php");    
$status="CART";
$sql1=$conn->prepare("SELECT COUNT(*) as total FROM product_cart_details WHERE cd_id=? AND pcd_status=?");
$sql1->bind_param("is",$cd_id,$status);
$sql1->execute();
$result1=$sql1->get_result();
$row1=$result1->fetch_assoc();
$count=$row1["total"];
?> 
                                    <div class="header-cart-icon">
                                        <a href="product_cart_details.php"  class="small-cart-trigger">
                                            <i class="icon-shopping-cart"></i>
                                            <span class="cart-counter"><?php echo $count;?></span>
                                        </a>

                                        <!--=======  small cart  =======-->
                                        
                                       
                                        <!--=======  End of small cart  =======-->
                                    </div>
                                    
                                    <!--=======  End of cart icon  =======-->
                                </div>
                            </div>
                        </div>

                        <!--====================  End of navigation top search  ====================-->
                    </div>
                </div>
            </div>
        </div>
            
        <!--====================  End of Navigation top  ====================-->

        <!--====================  navigation menu ====================-->

        <div class="navigation-menu-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- navigation section -->
                        <div class="main-menu d-none d-lg-block">
                            <nav>
                                <ul>
                                    <li class="active"><a href="index.php">HOME</a>
                                    </li>
                                    
                                    <?php
                                    require('db_connection.php');
                                    $sql=$conn->prepare("SELECT * FROM product_category ORDER BY pc_id ASC");
                                    $sql->execute();
                                    $result=$sql->get_result();
                                    while($row=$result->fetch_assoc()){
                                    ?>
                                    <li> <a href="products_category_details.php?pc_id=<?php echo base64_encode($row["pc_id"]);?>"><?php echo $row['pc_name'];?></a></li>
                                    <?php
                                    }
                                    ?>
                                   

                            

<!--                                    <li><a href="#">CONTACT</a></li>-->
                                </ul>
                            </nav>
                        
                        </div>
                        <!-- end of navigation section -->

                        <!-- Mobile Menu -->
                        <div class="mobile-menu-wrapper d-block d-lg-none pt-15">
                            <div class="mobile-menu"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--====================  End of navigation menu  ====================-->
    </div>