<?php 
require('db_connection.php');
session_start();
require("5_session_data.php");//CONTAINS USER SESSION DATA

$prod_cart_id=$_POST['pcd_id'];
$prod_det_id=$_POST['pd_id'];
$update_qty=$_POST['update_qty'];
$prod_cart_price=$_POST['pcd_unitprice'];
$stock_discount=$_POST['sd_discount'];
$tot_prod_cart_price=$prod_cart_price-$stock_discount;
$total_price=$tot_prod_cart_price*$update_qty;

$sql4=$conn->prepare("SELECT * FROM extra_charges");
$sql4->execute();
$result4=$sql4->get_result();
$row4=$result4->fetch_assoc();
$max_stock_qty=$row4["ec_max_stock_qty"];

$sql5=$conn->prepare("SELECT * FROM stock_details WHERE pd_id=?");
$sql5->bind_param("i",$prod_det_id);
$sql5->execute();
$result5=$sql5->get_result();
$row5=$result5->fetch_assoc();
$stock_qty=$row5["sd_quantity"];

$sql1=$conn->prepare("SELECT * FROM product_cart_details WHERE pcd_id=? AND cd_id=?");
$sql1->bind_param("ii",$prod_cart_id,$cd_id);
$sql1->execute();
$result1=$sql1->get_result();
$row1=$result1->fetch_assoc();
$prod_cart_qty=$row1["pcd_quantity"];

if($update_qty>$stock_qty)
{
    echo "<script type='text/javascript'>    
    alert('Quantity Exceeds Limit');        
    window.history.back();
    </script>";        
}
else if($prod_cart_qty==$update_qty)
{
    echo "<script type='text/javascript'>
    alert('Item Already Added');        
    window.history.back();
    </script>";    
}
else if($update_qty<=0){
    echo "<script type='text/javascript'>
    alert('Quantity Cannot Be Equal or Less than Zero');        
    window.history.back();
    </script>";    
}
else{
//INSERT ITEM INTO CART
$sql=$conn->prepare("UPDATE product_cart_details SET pcd_quantity=?,pcd_total=? WHERE pcd_id=? AND cd_id=?");
$sql->bind_param("iiii",$update_qty,$total_price,$prod_cart_id,$cd_id);
if($sql->execute())
{
    echo "<script type='text/javascript'>
    alert('Item Updated to Cart');        
    window.history.back();
    </script>";
}else
{
    echo "<script type='text/javascript'>
    alert('Item Not Updated');        
    window.history.back();
    </script>";    
}
}
?>