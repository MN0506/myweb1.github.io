<?php
require("db_connection.php");
$dpd_id=$_POST["dpd_id"];
$dd_id=$_POST["dd_id"];
$pc_id=$_POST["pc_id"];
$dpd_name=$_POST["dpd_name"];
$dpd_quantity=$_POST["dpd_quantity"];
$dpd_amount_paid=$_POST["dpd_amount_paid"];
$dpd_date=$_POST["dpd_date"];

$sql=$conn->prepare("UPDATE dealers_purchase_details SET dd_id=?,pc_id=?,dpd_name=?,dpd_quantity=?,dpd_amount_paid=? where dpd_id=?");
$sql->bind_param("iisiii",$dd_id,$pc_id,$dpd_name,$dpd_quantity,
                 $dpd_amount_paid,$dpd_id);
if($sql->execute())
{
    echo"<script type='text/javascript'>alert('SUCCESSFULLY UPDATED');window.location='dealers_purchase_details_view.php';</script>";
}
else
{
    echo"<script type='text/javascript'>alert('SUCCESSFULLY NOT UPDATED');window.location='dealers_purchase_details_view.php';</script>";
}
?>