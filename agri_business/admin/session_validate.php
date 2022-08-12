<?php
session_start();
if(!isset($_SESSION["ad_username"])||$_SESSION["ad_username"]=="")
{
 ?>
 <script type="text/javascript">
 alert("Session Expired");
 window.location="../index.php";
</script>
<?php
}
?>