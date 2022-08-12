<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
	<?php require("1_metatags.php"); ?>
</head>

<body>
    
    <!--====================  Header area ====================-->
    
     <?php require("2_header.php"); ?>
    
    <!--====================  End of Header area  ====================-->
    

    <!--====================  breadcrumb area ====================-->
    
    <div class="breadcrumb-area pt-10 pb-10 border-bottom mb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!--=======  breadcrumb content  =======-->
                    
                    <div class="breadcrumb-content">
                        <ul>
                            <li class="has-child"><a href="index.html">Home</a></li>
                            <li>Wishlist</li>
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
                <div class="col-12">
                    <form action="#">				
                        <!--=======  cart table  =======-->
                        
                        <div class="cart-table table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="pro-thumbnail">Image</th>
                                        <th class="pro-title">Product</th>
                                        <th class="pro-price">Price</th>
                                        <th class="pro-quantity">Quantity</th>
                                        <th class="pro-subtotal">Total</th>
                                        <th class="pro-remove">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="pro-thumbnail"><a href="single-product.html"><img src="assets/img/products/small1-1.jpg" class="img-fluid" alt="Product"></a></td>
                                        <td class="pro-title"><a href="single-product.html">Cillum dolore tortor nisl fermentum</a></td>
                                        <td class="pro-price"><span>$29.00</span></td>
                                        <td class="pro-quantity"><div class="pro-qty"><input type="text" value="1"></div></td> 
                                        <td class="pro-subtotal"><span>$29.00</span></td>
                                        <td class="pro-remove"><a href="#"><i class="fa fa-trash-o"></i></a></td>
                                    </tr>
                                    <tr>
                                        <td class="pro-thumbnail"><a href="single-product.html"><img src="assets/img/products/small1-2.jpg" class="img-fluid" alt="Product"></a></td>
                                        <td class="pro-title"><a href="single-product.html">Auctor gravida pellentesque</a></td>
                                        <td class="pro-price"><span>$30.00</span></td>
                                        <td class="pro-quantity"><div class="pro-qty"><input type="text" value="2"></div></td>
                                        <td class="pro-subtotal"><span>$60.00</span></td>
                                        <td class="pro-remove"><a href="#"><i class="fa fa-trash-o"></i></a></td>
                                    </tr>
                                    <tr>
                                        <td class="pro-thumbnail"><a href="single-product.html"><img src="assets/img/products/small1-3.jpg" class="img-fluid" alt="Product"></a></td>
                                        <td class="pro-title"><a href="single-product.html">Condimentum posuere consectetur</a></td>
                                        <td class="pro-price"><span>$25.00</span></td>
                                        <td class="pro-quantity"><div class="pro-qty"><input type="text" value="1"></div></td>
                                        <td class="pro-subtotal"><span>$25.00</span></td>
                                        <td class="pro-remove"><a href="#"><i class="fa fa-trash-o"></i></a></td>
                                    </tr>
                                    <tr>
                                        <td class="pro-thumbnail"><a href="single-product.html"><img src="assets/img/products/small1-4.jpg" class="img-fluid" alt="Product"></a></td>
                                        <td class="pro-title"><a href="single-product.html">Habitasse dictumst elementum</a></td>
                                        <td class="pro-price"><span>$11.00</span></td>
                                        <td class="pro-quantity"><div class="pro-qty"><input type="text" value="1"></div></td>
                                        <td class="pro-subtotal"><span>$11.00</span></td>
                                        <td class="pro-remove"><a href="#"><i class="fa fa-trash-o"></i></a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        
                        <!--=======  End of cart table  =======-->
                        
                        
                    </form>	
                        
                   
                </div>
            </div>
        </div>
    </div>
    
    <!--====================  End of page content  ====================-->


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