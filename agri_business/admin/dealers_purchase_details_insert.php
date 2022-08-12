<?php
require("db_connection.php");
$dd_id=$_POST["dd_id"];
$pc_id=$_POST["pc_id"];
$dpd_name=$_POST["dpd_name"];
$dpd_quantity=$_POST["dpd_quantity"];
$dpd_amount_paid=$_POST["dpd_amount_paid"];
$dpd_date=$_POST["dpd_date"];

$sql=$conn->prepare("insert into dealers_purchase_details(dd_id,pc_id,dpd_name,dpd_quantity,dpd_amount_paid,dpd_date)VALUES(?,?,?,?,?,?)");
$sql->bind_param("iisiis",$dd_id,$pc_id,$dpd_name,$dpd_quantity,
                 $dpd_amount_paid,$dpd_date);
if($sql->execute())
{
    echo"<script type='text/javascript'>alert('SUCCESSFULLY INSERTED');window.location='dealers_purchase_details_view.php';</script>";
}
else
{
    echo"<script type='text/javascript'>alert('SUCCESSFULLY NOT INSERTED');window.location='dealers_purchase_details_view.php';</script>";
}
?>