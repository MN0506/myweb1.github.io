<?php
                require("db_connection.php");
                $dd_id=base64_decode($_REQUEST["dd_id"]);
                $sql=$conn->prepare("DELETE FROM dealers_details WHERE dd_id=?");
                $sql->bind_param("i",$dd_id);
                if($sql->execute())
                {
                    echo "<script type='text/javascript'>
                        alert('Record Deleted Successfully');
                        window.location='dealers_details_view.php';
                        </script>";
                }
                else
                {
                  echo"<script type='text/javascript'>
                        alert('Record Not Deleted Successfully');
                        window.location='dealers_details_view.php';
                        </script>";  
                }
                ?>