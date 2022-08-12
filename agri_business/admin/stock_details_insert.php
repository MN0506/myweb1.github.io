<?php
require("db_connection.php");
$pd_id=$_POST["pd_id"];
$sd_quantity=$_POST["sd_quantity"];
$sd_unitprice=$_POST["sd_unitprice"];
$sd_discount=$_POST["sd_discount"];
$sd_date=$_POST["sd_date"];
$sd_status=$_POST["sd_status"];

$sql1=$conn->prepare("SELECT * FROM stock_details WHERE pd_id=? ");
$sql1->bind_param("i",$pd_id);
$sql1->execute();
$result1=$sql1->get_result();
if($result1->num_rows>0)
{
  echo"<script type='text/javascript'>
    alert('STOCK ALREADY EXISTS');
    history.back();
    </script>";  
}
else
{

$sql=$conn->prepare("insert into stock_details(pd_id,sd_quantity,sd_unitprice,sd_discount,sd_date,
sd_status)VALUES(?,?,?,?,?,?)");
$sql->bind_param("iiiiss",$pd_id,$sd_quantity,$sd_unitprice,$sd_discount,
                 $sd_date,$sd_status);
if($sql->execute())
{
    echo"<script type='text/javascript'>alert('SUCCESSFULLY INSERTED');window.location='stock_details_view.php';</script>";
}
else
{
    echo"<script type='text/javascript'>alert('SUCCESSFULLY NOT INSERTED');window.location='stock_details_view.php';</script>";
}
}
?>