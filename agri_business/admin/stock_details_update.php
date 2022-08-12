
<?php
require("db_connection.php");
$sd_id=$_POST["sd_id"];
$pd_id=$_POST["pd_id"];
$sd_quantity=$_POST["sd_quantity"];
$sd_unitprice=$_POST["sd_unitprice"];
$sd_discount=$_POST["sd_discount"];
$sd_date=$_POST["sd_date"];
$sd_status=$_POST["sd_status"];

$sql=$conn->prepare("UPDATE stock_details SET pd_id=?,sd_quantity=?,sd_unitprice=?,sd_discount=?,sd_status=? where sd_id=?");
$sql->bind_param("iiiisi",$pd_id,$sd_quantity,$sd_unitprice,$sd_discount,
                 $sd_status,$sd_id);
if($sql->execute())
{
    echo"<script type='text/javascript'>alert('SUCCESSFULLY UPDATED');window.location='stock_details_view.php';</script>";
}
else
{
    echo"<script type='text/javascript'>alert('SUCCESSFULLY NOT UPDATED');window.location='stock_details_view.php';</script>";
}
?>