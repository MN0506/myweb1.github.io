<?php
require("db_connection.php");
$cd_name=$_POST["cd_name"];
$cd_contact=$_POST["cd_contact"];
$cd_email_id=$_POST["cd_email_id"];
$cd_address=$_POST["cd_address"];
$cd_username=$_POST["cd_username"];
$cd_password=$_POST["cd_password"];
$cd_date=date('Y-m-d');

$sql1=$conn->prepare("SELECT * FROM customer_details WHERE cd_contact=? ");
$sql1->bind_param("i",$cd_contact);
$sql1->execute();
$result1=$sql1->get_result();

$sql2=$conn->prepare("SELECT * FROM customer_details WHERE cd_email_id=? ");
$sql2->bind_param("s",$cd_email_id);
$sql2->execute();
$result2=$sql2->get_result();

$sql3=$conn->prepare("SELECT * FROM customer_details WHERE cd_username=? ");
$sql3->bind_param("s",$cd_username);
$sql3->execute();
$result3=$sql3->get_result();  

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

else if($result3->num_rows>0)
{
  echo"<script type='text/javascript'>
    alert('USERNAME ALREADY EXISTS');
    history.back();
    </script>";  
}
else
{
$sql=$conn->prepare("insert into customer_details(cd_name,cd_contact,cd_email_id,cd_address,cd_username,
cd_password,cd_date)VALUES(?,?,?,?,?,?,?)");
$sql->bind_param("sisssss",$cd_name,$cd_contact,$cd_email_id,$cd_address,
                 $cd_username,$cd_password,$cd_date);
if($sql->execute())
{
    echo"<script type='text/javascript'>
    alert('SUCCESSFULLY REGISTRED');
    history.back();
    </script>";
}
else
{
    echo"<script type='text/javascript'>
    alert('SUCCESSFULLY NOT REGISTRED');
     history.back();
    </script>";
}
}    
    
?>