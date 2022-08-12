<?php
                require("db_connection.php");
                $pd_id=base64_decode($_REQUEST["pd_id"]);
                $sql=$conn->prepare("DELETE FROM product_details WHERE pd_id=?");
                $sql->bind_param("i",$pd_id);
                if($sql->execute())
                {
                    echo "<script type='text/javascript'>
                        alert('Record Deleted Successfully');
                        window.location='product_details_view.php';
                        </script>";
                }
                else
                {
                  echo"<script type='text/javascript'>
                        alert('Record Not Deleted Successfully');
                        window.location='product_details_view.php';
                        </script>";  
                }
                ?>