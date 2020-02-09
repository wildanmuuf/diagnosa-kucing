<?php
if(isset($_POST['simpan'])){
	include "../sambungan.php";
	$judul=$_POST['judul_tips'];
	$id_tips=$_POST['id_tips'];
	$keterangan	=$_POST['keterangan'];
	$lokasi =$_FILES['foto']['tmp_name'];
	$namafile=$_FILES['foto']['name'];
	$tipefile=$_FILES['foto']['type'];

	if(empty($lokasi)){
		$sql="UPDATE tips_kucing SET judul='$judul', keterangan='$keterangan' where id_tips='$id_tips'";
	}else{
		include "../fungsi/upload.php";
		$folder="../images/tips_kucing/";
		$ukuran=100;
		UploadFoto($namafile,$folder,$ukuran);
		$sql="UPDATE tips_kucing SET judul='$judul', keterangan='$keterangan', gambar_tips='$namafile' where id_tips='$id_tips'";
	}
	$simpan=mysqli_query($koneksi,$sql);
	//var_dump($sql);
	if($simpan){
		header('Location:index.php?m=tips_kucing&s=awal');
		//echo "berhasil";
	}else{
		//echo "gagal alias tidak berhasil, kemungkinan username sudah digunakan";
		include "index.php?m=tips_kucing&s=awal";
		echo '<script language="JavaScript">';
			echo 'alert("Data Gagal diupdate, kemungkinan username sudah digunakan.")';
		echo '</script>';
		//var_dump($sql);
	}
}else{
	echo '<script>window.history.back()</script>';
	//echo "apa nih";
}
?>
