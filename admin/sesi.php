<?php
if(empty($_SESSION['id_admin']) AND empty($_SESSION['user_admin'])){
      header('location:login.php');
}
?>
