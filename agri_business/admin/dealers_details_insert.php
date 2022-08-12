<?php
require("db_connection.php");
$dd_name=$_POST["dd_name"];
$dd_contact=$_POST["dd_contact"];
$dd_address=$_POST["dd_address"];
$dd_date=$_POST["dd_date"];

$sql1=$conn->prepare("SELECT * FROM dealers_details WHERE dd_contact=?");
$sql1->bind_param("i",$dd_contact);
$sql1->execute();
$result1=$sql1->get_result();
if($result1->num_rows>0)
{
  echo"<script type='text/javascript'>
    alert('CONTACT ALREADY EXISTS');
    history.back();
    </script>";  
}
else
{
$sql=$conn->prepare("insert into dealers_details(dd_name,dd_contact,dd_address,dd_date)VALUES(?,?,?,?)");
$sql->bind_param("siss",$dd_name,$dd_contact,
                 $dd_address,$dd_date);
if($sql->execute())
{
    echo"<script type='text/javascript'>alert('SUCCESSFULLY INSERTED');window.location='dealers_details_view.php';</script>";
}
else
{
    echo"<script type='text/javascript'>alert('SUCCESSFULLY NOT INSERTED');window.location='dealers_details_view.php';</script>";
}
    }
?>