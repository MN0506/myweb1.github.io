<?php
require("db_connection.php");
$dd_id=$_POST["dd_id"];
$dd_name=$_POST["dd_name"];
$dd_contact=$_POST["dd_contact"];
$dd_address=$_POST["dd_address"];
$dd_date=$_POST["dd_date"];

$sql1=$conn->prepare("SELECT * FROM dealers_details WHERE dd_contact=? AND dd_id!=?");
$sql1->bind_param("ii",$dd_contact,$dd_id);
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

$sql=$conn->prepare("UPDATE dealers_details SET dd_name=?,dd_contact=?,dd_address=? where dd_id=?");
$sql->bind_param("sisi",$dd_name,$dd_contact,
                 $dd_address,$dd_id);
if($sql->execute())
{
    echo"<script type='text/javascript'>alert('SUCCESSFULLY UPDATED');window.location='dealers_details_view.php';</script>";
}
else
{
    echo"<script type='text/javascript'>alert('SUCCESSFULLY NOT UPDATED');window.location='dealers_details_view.php';</script>";
}
}
?>