<?php 
session_start();
require('db_connection.php');
require('5_session_data.php');

$order_no="";
$characters = array_merge(range('0','9'));
for ($i = 0; $i < 6; $i++) {
    $rand = mt_rand(0, count($characters)-1);
    $order_no .= $characters[$rand];
}

$delivery_charges=$_POST["delivery_charges"];
$sub_total=$_POST['sub_total'];
$cgst_percent=$_POST['ci_cgst_percent'];
$cgst=$_POST['ci_cgst'];
$sgst_percent=$_POST['ci_sgst_percent'];
$sgst=$_POST['ci_sgst'];
$payment_mode=$_POST["ci_payment_mode"];
$ci_shipping_address=$_POST["ci_shipping_address"];
$ci_landmark=$_POST["ci_landmark"];
$ci_contact_no=$_POST["ci_contact_no"];
$ci_date=date('Y-m-d');
$ci_total_amount=$_POST['ci_total_amount'];
if($payment_mode=="COD")
{
    $transaction_no=0;
}else
{    
    $transaction_no=$_POST["transaction_no"];
}
$ci_status="ORDER PENDING";

$message = "$fullname Your ORDER NO :$order_no Has Been Placed Successfully,Will Confirm Your Order Soon";
$data=urlencode($message);
$sms_url="http://bhashsms.com/api/sendmsg.php?user=innovics&pass=1234567890&sender=INVSIT&phone=$ci_contact_no&text=$data&priority=ndnd&stype=normal";

$sql=$conn->prepare("INSERT INTO customer_invoice(cd_id,ci_order_no, ci_shipping_address,ci_landmark,ci_delivery_charges,ci_contact_no,ci_date, ci_payment_mode,ci_transaction_no,ci_total_price,ci_cgst_percent,ci_cgst, ci_sgst_percent,ci_sgst,ci_sub_total,ci_status)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
$sql->bind_param("iissdissidddddds",$cd_id,$order_no,$ci_shipping_address,$ci_landmark,$delivery_charges,$ci_contact_no,$ci_date,$payment_mode,$transaction_no,$ci_total_amount,$cgst_percent,$cgst,$sgst_percent,$sgst,$sub_total,$ci_status);
$sql->execute();

$pcd_cart="CART";
$prod_cart_status="ORDER PLACED";
$sql1=$conn->prepare("UPDATE product_cart_details SET pcd_order_no=?,pcd_status=? WHERE cd_id=? AND pcd_status=?");
$sql1->bind_param("isis",$order_no,$prod_cart_status,$cd_id,$pcd_cart);
if($sql1->execute())
{

    echo"<script type='text/javascript'>
    alert('ORDER PLACED SUCCESSFULLY');
    window.location='index.php';
    </script>";
}else{
    echo"<script type='text/javascript'>
    alert('ORDER NOT PLACED!!!');
    window.history.back();
    </script>";
}

?>
