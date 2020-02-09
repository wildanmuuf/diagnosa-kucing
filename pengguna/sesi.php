<?php
if(empty($_SESSION['id_pengguna']) AND empty($_SESSION['username'])){
	header('location:../login.php');
}
?>
