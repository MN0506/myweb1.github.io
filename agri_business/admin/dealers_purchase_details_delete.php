<?php
                require("db_connection.php");
                $dpd_id=base64_decode($_REQUEST["dpd_id"]);
                $sql=$conn->prepare("DELETE FROM dealers_purchase_details WHERE dpd_id=?");
                $sql->bind_param("i",$dpd_id);
                if($sql->execute())
                {
                    echo "<script type='text/javascript'>
                        alert('Record Deleted Successfully');
                        window.location='dealers_purchase_details_view.php';
                        </script>";
                }
                else
                {
                  echo"<script type='text/javascript'>
                        alert('Record Not Deleted Successfully');
                        window.location='dealers_purchase_details_view.php';
                        </script>";  
                }
                ?>