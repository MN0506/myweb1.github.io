<?php 
require('db_connection.php');
session_start();
require("5_session_data.php");//CONTAINS USER SESSION DATA

$prod_cart_id=$_REQUEST['pcd_id'];
$prod_cart_status="CART";
$sql1=$conn->prepare("DELETE FROM product_cart_details WHERE cd_id=? AND pcd_id=? AND pcd_status=?");
$sql1->bind_param("iis",$cd_id,$prod_cart_id,$prod_cart_status);
if($sql1->execute()){
echo "<script type='text/javascript'>
alert('Produc Deleted From Cart');        
window.history.back();
</script>";    
}else
{
echo "<script type='text/javascript'>
alert('Product Not Deleted');        
window.history.back();
</script>";        
}
?>