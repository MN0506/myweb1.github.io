<?php 
require('db_connection.php');
session_start();
require("5_session_data.php");//CONTAINS USER SESSION DATA

$pcd_order_date=date('Y-m-d');
$pd_id=$_POST["pd_id"];
$pd_name=$_POST["pd_name"];   
$pcd_quantity=$_POST["pcd_quantity"];
$sd_unitprice=$_POST["sd_unitprice"];    
$sd_discount=$_POST["sd_discount"];
$price_after_discount=$sd_unitprice-$sd_discount;
$total_price=$price_after_discount*$pcd_quantity;
$pcd_status="CART";    

//CHECK IF ITEM EXISTS IN CART OR NOT
$sql1=$conn->prepare("SELECT * FROM product_cart_details WHERE cd_id=? AND pd_id=? AND pcd_status=?");
$sql1->bind_param("iis",$cd_id,$pd_id,$pcd_status);
$sql1->execute();
$result=$sql1->get_result();
$count=$result->num_rows;
if($count>=1)
{
    echo "<script type='text/javascript'>
    alert('Item Exists in Cart !!!');
    window.history.back();
    </script>";    
}else
{
    //INSERT ITEM INTO CART
    $sql=$conn->prepare("INSERT INTO product_cart_details(cd_id,pd_id,pcd_name,pcd_quantity,pcd_unitprice,pcd_total,pcd_order_date,pcd_status)VALUES(?,?,?,?,?,?,?,?)");
    $sql->bind_param("iisiiiss",$cd_id,$pd_id,$pd_name,$pcd_quantity,$sd_unitprice,$total_price,$pcd_order_date,$pcd_status);
    if($sql->execute())
    {
        echo "<script type='text/javascript'>
        alert('Item Added to Cart');        
        window.history.back();
        </script>";
    }else
    {
        echo "<script type='text/javascript'>
        alert('Item Not Added');        
        window.history.back();
        </script>";    
    }
}



?>
