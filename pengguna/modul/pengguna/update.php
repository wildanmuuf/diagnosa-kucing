<?php
if(isset($_POST['simpan'])){
	include_once "../sambungan.php";
	$id=$_POST['id'];
	$pengguna=$_POST['username'];
	$sandi	=md5($_POST['password']);
	$nama	=$_POST['nama_pengguna'];
	$jk		=$_POST['jk'];
	$hp		=$_POST['hp'];
	$surel	=$_POST['surel'];
	$tanggall=$_POST['tanggall'];
	$lokasi =$_FILES['foto']['tmp_name'];
	$namafile=$_FILES['foto']['name'];
	$tipefile=$_FILES['foto']['type'];

	if(empty($_POST['password'])){
		if(empty($lokasi)){
			$sql="UPDATE pengguna SET username='$pengguna', nama_pengguna='$nama', jenis_kelamin='$jk', no_telp='$hp', email='$surel', tgl_lahir='$tanggall' WHERE id_pengguna='$id'";
		}else{
			include "../fungsi/upload.php";
			$folder="../images/pengguna/";
			$ukuran=100;
			UploadFoto($namafile,$folder,$ukuran);
			$sql="UPDATE pengguna SET username='$pengguna', nama_pengguna='$nama', jenis_kelamin='$jk', no_telp='$hp', email='$surel', tgl_lahir='$tanggall', foto='$namafile' WHERE id_pengguna='$id'";
		}
	}else{
		if(empty($lokasi)){
			$sql="UPDATE pengguna SET username='$pengguna', nama_pengguna='$nama', jenis_kelamin='$jk', no_telp='$hp', email='$surel', tgl_lahir='$tanggall', password='$sandi' WHERE id_pengguna='$id'";
		}else{
			include "../fungsi/upload.php";
			$folder="../images/pengguna/";
			$ukuran=100;
			UploadFoto($namafile,$folder,$ukuran);
			$sql="UPDATE pengguna SET username='$pengguna', nama_pengguna='$nama', jenis_kelamin='$jk', no_telp='$hp', email='$surel', tgl_lahir='$tanggall', password='$sandi', foto='$namafile' WHERE id_pengguna='$id'";
		}
	}
	$simpan=mysqli_query($koneksi,$sql);
	//var_dump($sql);
	if($simpan){
		header('Location:index.php?m=pengguna');
		//echo "berhasil";
	}else{
		//echo "gagal alias tidak berhasil";
		include "index.php?m=pengguna&s=awal";
		echo '<script language="JavaScript">';
			echo 'alert("Data Gagal diupdate.")';
		echo '</script>';
		//var_dump($sql);
	}
}else{
	echo '<script>window.history.back()</script>';
	//echo "apa nih";
}
?>
