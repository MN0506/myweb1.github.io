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
<li>Checkout</li>
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
<!-- Checkout Form s-->
<form class="billing_inner row" method="post" onsubmit="return ValidateForm()" action="product_order_confirmation.php">
<?php 
$grand_total=$_POST['grand_total'];
$sub_total=$_POST['sub_total'];
$delivery_charges=$_POST['delivery_charges'];
$cgst_percent=$_POST['ci_cgst_percent'];
$cgst=$_POST['ci_cgst'];
$sgst_percent=$_POST['ci_sgst_percent'];
$sgst=$_POST['ci_sgst'];
?>

<div class="row row-40">
<div class="col-lg-7 mb-20">
<!-- Billing Address -->
<div id="billing-form" class="mb-40">
<h4>TOTOAL AMOUNT :&nbsp;&#8377;&nbsp;<?php echo $grand_total;?></h4>
    <center><h4 class="checkout-title">Billing Address</h4></center>
<input type="hidden" name="ci_total_amount" id="ci_total_amount" value="<?php echo $grand_total;?>">
<input type="hidden" name="delivery_charges" id="delivery_charges" value="<?php echo $delivery_charges;?>">
<input type="hidden" name="sub_total" id="sub_total" value="<?php echo $sub_total;?>">
<input type="hidden" name="ci_cgst_percent" id="ci_cgst_percent" value="<?php echo $cgst_percent;?>">
<input type="hidden" name="ci_cgst" id="ci_cgst" value="<?php echo $cgst;?>">
<input type="hidden" name="ci_sgst_percent" id="ci_sgst_percent" value="<?php echo $cgst_percent;?>">
<input type="hidden" name="ci_sgst" id="ci_sgst" value="<?php echo $sgst;?>">
<div class="row">
<div class="col-12 mb-20">
<select class="form-control" id="ci_payment_mode" name="ci_payment_mode">
<option value="">--SELECT PAYMENT MODE--</option>
<option value="COD">COD</option>
<option value="PAYTM">PAYTM</option>                                     
</select>
<span id="ci_payment_mode_error"></span>

</div>
<div class="col-12 mb-20">
<label>Fullname</label>
    <input type="text" placeholder="" class="form-control" value="<?php echo $fullname;?>">
</div>

<div class="col-12 mb-20">
<label>Shipping Address</label>
    <input type="text" placeholder="Shipping address" class="form-control" name="ci_shipping_address" id="ci_shipping_address">
<span id="ci_shipping_address_error"></span>
</div>

<div class="col-12 mb-20">
<label>Landmark</label>
    <input type="text" placeholder="Landmark" class="form-control" name="ci_landmark" id="ci_landmark">
    <span id="ci_landmark_error"></span>
</div>

<div class="col-12 mb-20">
<label>Contact Number</label>
    <input type="text" placeholder="Contact" class="form-control" name="ci_contact_no" id="ci_contact_no">
    <span id="ci_contact_no_error"></span>
</div>

<div class="col-12 mb-20" id="showTRANID">
    <label>Transaction Number</label>
    <input type="text" name="transaction_no" class="form-control" id="transaction_no" aria-describedby="last">
    <span id="transaction_no_error"></span>
</div>
<input type="hidden" id="action" name="action" value="Add">
<button class="btn btn-info btn-block" type="submit" name="submit">PLACE ORDER</button>

</div>
</div>

</div>
    <div class="col-lg-5 myDiv" id="showCOD">
        <div class="order_box_price">            
            <div class="payment_list">
                <img src="assets/img/cod.png">                                   
            </div>
        </div>
    </div>
    <div class="col-lg-5 myDiv" id="showPAYTM">
        <div class="order_box_price">
            <h3 class="reg_title" style="padding-left:20px">PAYTM PAYMENT</h3>
            <div class="payment_list">
                <img src="assets/img/paytm.png">                                   
            </div>
        </div>
    </div>
</div>
</form>

</div>
</div>
</div>
</div>
<?php require("3_footer.php"); ?>
<a href="#" class="scroll-top"></a>
<?php require("4_footer_scripts.php"); ?>
<script>
$(document).ready(function()
              {
$("div.myDiv").hide();
$("#showTRANID").hide();
$("#showCOD").show();   
$('#ci_payment_mode').on('change', function(){
    var value = $(this).val();                     

    if(value=="PAYTM"){

        $("#showPAYTM").show();   
        $("#showTRANID").show();
        $("#showCOD").hide();   
    }
    if(value=="COD"){

        $("#showPAYTM").hide();   
        $("#showCOD").show();   
        $("#showTRANID").hide();
    }

});
});
</script>

<script type="text/javascript">
function ValidateForm()
{
var ci_payment_mode = '';
var ci_shipping_address = '';
var ci_landmark = '';                
var transaction_no='';
var ci_contact_no='';
var action = document.getElementById('action').value;
var payment=document.getElementById('ci_payment_mode').value;
if(payment=="COD"){
    transaction_no ="1";    
}
if(payment=="PAYTM"){
    transaction_no = paytm('transaction_no', 'transaction_no_error', 'Transaction No');    
}
ci_payment_mode = alphabets('ci_payment_mode', 'ci_payment_mode_error', 'Payment Mode');
ci_shipping_address = fieldrequired('ci_shipping_address', 'ci_shipping_address_error', 'Address');
ci_landmark = fieldrequired('ci_landmark', 'ci_landmark_error', 'Landmark');                
ci_contact_no=phoneno('ci_contact_no', 'ci_contact_no_error', 'Contact');                

if(ci_payment_mode == 1 && ci_shipping_address == 1 && ci_landmark == 1 && transaction_no == 1 && ci_contact_no == 1) 
{
    return true;
}
else
{
    return false;
}
}
</script>
]
</body>
</html>