<?php
include_once "sambungan.php";

$user = $_POST['username'];
$pass = md5($_POST['password']);
$sql = "SELECT * FROM pengguna WHERE username='$user' AND password='$pass' AND hak_akses='pengguna'";
$login=mysqli_query($koneksi,$sql);
$ketemu=mysqli_num_rows($login);
$b=mysqli_fetch_array($login);
echo mysqli_error($koneksi);
if($ketemu>0){
	session_start();
	$_SESSION['id_pengguna'] 	= $b['id_pengguna'];
	$_SESSION['username']		= $b['username'];
	$_SESSION['nama_pengguna']		= $b['nama_pengguna'];
	$_SESSION['email'] 	= $b['email'];
	if(!empty($b['foto'])){
		$_SESSION['foto'] = $b['foto'];
	}else{
		$_SESSION['foto'] = "default.png";
	}
	header('location: pengguna/index.php?m=awal');
}else{
	include "login.php";
	echo '<script language="javascript">';
		echo 'alert ("Username/Password ada yang salah, atau akun anda belum Aktif")';
	echo '</script>';
}
?>
