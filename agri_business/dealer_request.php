<!DOCTYPE html>
<html lang="en">
<head>
	<?php require("1_metatags.php"); ?>
</head>

<body class="">
	<div class="site-wrapper">
	<?php require("2_header.php"); ?>
	
<nav aria-label="breadcrumb" class="breadcrumb-wrapper">
	<div class="container">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="index.php">Home</a></li>
			<li class="breadcrumb-item active" aria-current="page">Dealer Request</li>
		</ol>
	</div>
</nav>
    <!--=============================================
    =            Login Register page content         =
    =============================================-->

    <main class="page-section pb--10 pt--50">
		<div class="container">
			<header class="entry-header">
<!--				<h1 class="entry-title">My Account</h1>-->
			</header>
			<div class="row">
<div class="col-sm-12 col-md-12 col-xs-12 col-lg-3 mb-30">
                </div>
				<div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30">
					<!-- Login Form s-->
        <form action="admin/dealers_request_details_insert.php" method="post" onsubmit="return ValidateForm()">

						<h4 class="login-title">ENTER DETAILS</h4>
						<div class="login-form">
<!--        <h4 class="login-title">ENTER DETAILS</h4>-->
        <div class="row">

           

            <div class="col-12 mb--20">
            <label>Product</label>
            <?php
            $dealer_pd_id=base64_decode($_REQUEST['pd_id']);
            require("db_connection.php");
            $sql=$conn->prepare("select * from product_details where pd_id=?");
            $sql->bind_param("i",$dealer_pd_id);
            $sql->execute();
            $result=$sql->get_result();
            $row=$result->fetch_assoc();
            ?>
             <input type="hidden" name="dealer_id" id="dealer_id" value="<?php echo $dealer_id ?>">
            <input type="hidden" name="dealer_pd_id" id="dealer_pd_id" value="<?php echo $dealer_pd_id; ?>">
            <input class="form-control" type="text" name="pd_name" id="pd_name" value="<?php echo $row['pd_name']; ?>" readonly>            
            <span id="pd_name_error"></span>
            </div>


            <div class="col-12 mb--20">
            <label>Description</label>
            <textarea class="form-control" name="drd_description" id="drd_description" placeholder="Description"></textarea>
            <span id="drd_description_error"></span>
            </div>

            <div class="col-12 mb--20">
            <label>Quantity</label>
            <input class="form-control" type="text" name="drd_qty" id="drd_qty" placeholder="Quantity" onkeyup="sum();">
            <span id="drd_qty_error"></span>
            </div>
            
            <div class="col-12 mb--20">
            <label>Unit Price</label>
            <input class="form-control" type="text" name="drd_unit_price" id="drd_unit_price" placeholder="Unit Price" onkeyup="sum();">
            <span id="drd_unit_price_error"></span>
            </div>


            <div class="col-12 mb--20">
            <label>Total Amount</label>
            <input class="form-control" type="text" name="drd_total" id="drd_total" placeholder="Total Amount" readonly>
            <span id="drd_total_error"></span>
            </div>

        <div class="col-12 mb--20">
            <div class="d-flex align-items-center flex-wrap">
            <button type="submit" class="btn btn-black   mr-3">REQUEST</button>
            </div>
        </div>
        </div>
						</div>

					</form>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-3 col-xs-12">
			
				</div>
			</div>
		</div>
	</main>

	<!--=====  End of Login Register page content  ======-->
  
  
<?php require("3_footer.php"); ?>
    
</div>
    <?php require("4_footer_scripts.php"); ?>
    <script type="text/javascript">
        function sum()
        {
            var price=document.getElementById('drd_unit_price').value;
            var qty=document.getElementById('drd_qty').value;
            var total=parseFloat(price)*parseInt(qty);
            if(price=="" && qty=="")
            {
                document.getElementById('drd_total').value=0;
            }
            if(!isNaN(total))
            {
                document.getElementById('drd_total').value=total;
            }
        }
        function ValidateForm()
        {
            var pd_name = '';
            var drd_description = '';
            var drd_qty = '';
            var drd_unit_price = '';
            var drd_total ='';

            pd_name=fieldrequired('pd_name','pd_name_error','Product Name');
            drd_description =fieldrequired('drd_description','drd_description_error','Description');
            drd_qty =numbers('drd_qty','drd_qty_error','Quantity');
            drd_unit_price =amountval('drd_unit_price','drd_unit_price_error','Unit Price');
            drd_total =amountval('drd_total','drd_total_error','Total Amount');

            if(pd_name==1 && drd_description==1 && drd_qty==1  && drd_unit_price==1 && drd_total==1 )
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    </script>
</body>
</html>


