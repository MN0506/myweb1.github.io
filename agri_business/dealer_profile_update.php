<?php
session_start();
require('db_connection.php');
require("4_dealers_session_data.php");  

    $dd_name=$_POST["dd_name"];
    $dd_contact=$_POST["dd_contact"];
    $dd_email_id=$_POST["dd_email_id"];
    $dd_address=$_POST["dd_address"];
    $dd_date=$_POST["dd_date"];

$sql1=$conn->prepare("select * from dealers_details where dd_contact=? and dd_id!=?");
$sql1->bind_param("ii",$dd_contact,$dealer_id);
$sql1->execute();
$result1=$sql1->get_result();

$sql2=$conn->prepare("select * from dealers_details where dd_email_id=? and dd_id!=?");
$sql2->bind_param("si",$dd_email_id,$dealer_id);
$sql2->execute();
$result2=$sql2->get_result();

if($result1->num_rows > 0)
{
     echo"<script type='text/javascript'>
    alert('CONTACT ALREADY EXISTS..!');
    window.history.back();
    </script>";
}
else if($result2->num_rows > 0)
{
     echo"<script type='text/javascript'>
    alert('EMAIL ID ALREADY EXISTS..!');
    window.history.back();
    </script>";
}
else
{   
    $sql=$conn->prepare("UPDATE dealers_details SET dd_name=?,dd_contact=?,dd_email_id=?,dd_address=? WHERE dd_id=?");
$sql->bind_param("sissi",$dd_name,$dd_contact,$dd_email_id,$dd_address,$dealer_id);
    if($sql->execute())
    {
        echo "<script type='text/javascript'>alert('Profile Updated Successfully');
             history.back();
            </script>";
    }
    else
    {
        echo "<script type='text/javascript'>alert('Profile Not Updated');
            history.back();
            </script>";
    }
}
?>