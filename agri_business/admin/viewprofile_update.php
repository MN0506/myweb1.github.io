<?php 
    require("db_connection.php"); 
    $ad_id=$_POST["ad_id"]; 
    $ad_name=$_POST["ad_name"]; 
    $ad_contact=$_POST["ad_contact"]; 
    $ad_email_id=$_POST["ad_email_id"]; 
    $ad_address=$_POST["ad_address"]; 
    $ad_date=$_POST["ad_date"]; 
 
$sql1=$conn->prepare("SELECT * FROM admin_details WHERE ad_contact=? AND ad_id!=?");
$sql1->bind_param("ii",$ad_contact,$ad_id);
$sql1->execute();
$result1=$sql1->get_result();

$sql2=$conn->prepare("SELECT * FROM admin_details WHERE ad_email_id=? AND ad_id!=?");
$sql2->bind_param("si",$ad_email_id,$ad_id);
$sql2->execute();
$result2=$sql2->get_result();

if($result1->num_rows>0)
{
  echo"<script type='text/javascript'>
    alert('CONTACT ALREADY EXISTS');
    history.back();
    </script>";  
}
else if($result2->num_rows>0)
{
  echo"<script type='text/javascript'>
    alert('EMAIL ID ALREADY EXISTS');
    history.back();
    </script>";  
}
else
{
    $sql=$conn->prepare("UPDATE admin_details SET ad_name=?,ad_contact=?,ad_email_id=?,ad_address=?,ad_date=? WHERE ad_id=?"); 
    $sql->bind_param("sisssi",$ad_name,$ad_contact,$ad_email_id,$ad_address,$ad_date,$ad_id); 
if($sql->execute()) 
{ 
    echo"<script type='text/javascript'> 
    alert('SUCCESSFULLY UPDATED'); 
    window.location='viewprofile_edit.php'; 
    </script>"; 
} 
else 
{ 
    echo"<script type='text/javascript'> 
    alert('NOT UPDATED'); 
    window.location='viewprofile_edit.php'; 
    </script>"; 
} 
}
?>