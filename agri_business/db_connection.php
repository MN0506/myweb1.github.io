<?php
$servername="localhost";
$username="root";
$password="";
$dbname="agri_business";

//create connection
$conn =new mysqli($servername, $username, $password , $dbname);

if ($conn->connect_errno) 
{
    echo "Failed to connect to MySQL: (" . $conn->connect_errno . ") " . $conn->connect_error;
}

?>