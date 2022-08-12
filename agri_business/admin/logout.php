<?php
session_start();

unset($_SESSION['ad_username']);

?>



<script>
alert("Logout..");
window.location="../admin_login/index.php"
</script>
