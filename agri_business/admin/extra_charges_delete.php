<?php
                require("db_connection.php");
                $ec_id=base64_decode($_REQUEST["ec_id"]);
                $sql=$conn->prepare("DELETE FROM extra_charges WHERE ec_id=?");
                $sql->bind_param("i",$ec_id);
                if($sql->execute())
                {
                    echo "<script type='text/javascript'>
                        alert('Record Deleted Successfully');
                        window.location='extra_charges_view.php';
                        </script>";
                }
                else
                {
                  echo"<script type='text/javascript'>
                        alert('Record Not Deleted Successfully');
                        window.location='extra_charges_view.php';
                        </script>";  
                }
                ?>