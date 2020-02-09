<?php
include_once "../sambungan.php";

$user = $_POST['username'];
$pass = md5($_POST['password']);
$sql = "SELECT * FROM user WHERE username='$user' AND password='$pass' and hak_akses='pengguna'";
$login=mysqli_query($koneksi,$sql);
$ketemu=mysqli_num_rows($login);
$b=mysqli_fetch_array($login);
if($ketemu>0){
	session_start();
	$_SESSION['id_user'] 		= $b['id_user'];
	$_SESSION['username']		= $b['username'];
	$_SESSION['nama_user']		= $b['nama_user'];
	$_SESSION['email'] 	= $b['email'];
	if(!empty($b['foto'])){
		$_SESSION['foto'] = $b['foto'];
	}else{
		$_SESSION['foto'] = "default.png";
	}
	header('location: index.php?m=awal');
}else{
	include "login.php";
	echo '<script language="javascript">';
		echo 'alert ("Username/Password ada yang salah, atau akun anda belum Aktif")';
	echo '</script>';
}
?>
