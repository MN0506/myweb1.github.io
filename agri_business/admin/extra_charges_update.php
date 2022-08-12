<?php
require("db_connection.php");
$ec_id=$_POST["ec_id"];
$ec_cgst=$_POST["ec_cgst"];
$ec_sgst=$_POST["ec_sgst"];
$ec_minimum_amount=$_POST["ec_minimum_amount"];
$ec_delivery_charges=$_POST["ec_delivery_charges"];
$ec_min_stock_qty=$_POST["ec_min_stock_qty"];
$ec_max_stock_qty=$_POST["ec_max_stock_qty"];
$ec_date=$_POST["ec_date"];

$sql=$conn->prepare("UPDATE extra_charges SET ec_cgst=?,ec_sgst=?,ec_minimum_amount=?,ec_delivery_charges=?,
ec_min_stock_qty=?,ec_max_stock_qty=? where ec_id=?");
$sql->bind_param("iiiiiii",$ec_cgst,$ec_sgst,$ec_minimum_amount,$ec_delivery_charges,$ec_min_stock_qty,$ec_max_stock_qty,$ec_id);
if($sql->execute())
{
    echo"<script type='text/javascript'>alert('SUCCESSFULLY UPDATED');window.location='extra_charges_view.php';</script>";
}
else
{
    echo"<script type='text/javascript'>alert('SUCCESSFULLY NOT UPDATED');window.location='extra_charges_view.php';</script>";
}
?>