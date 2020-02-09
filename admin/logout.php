<?php
session_start();
unset($_SESSION['id_admin']);
unset($_SESSION['user_admin']);
unset($_SESSION['nama_admin']);
unset($_SESSION['foto']);
//setcookie("cookielogin[user]", $user , $waktu + (3600*24*7));
echo "<script>window.location='login.php'</script>";
//session_destroy();
//  unset($_SESSION["sessidpks"]);
?>
