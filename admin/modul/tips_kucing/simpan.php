<?php
if(isset($_POST['simpan'])){
	include "../sambungan.php";
	include "../fungsi/upload.php";
	$judul=$_POST['judul_tips'];
	$keterangan	=$_POST['keterangan'];
	$lokasi =$_FILES['foto']['tmp_name'];
	$namafile=$_FILES['foto']['name'];
	$tipefile=$_FILES['foto']['type'];
	$query = "SELECT MAX(id_tips) as maxKode FROM tips_kucing";
	$hasil = mysqli_query($koneksi,$query);
	$data = mysqli_fetch_array($hasil);
	$kode_tips = $data['maxKode'];

	$sql_count = "SELECT* FROM tips_kucing ";
	$count_query = mysqli_query($koneksi,$sql_count);
	$count = mysqli_num_rows($count_query);
	$noUrut=0;
	if($count<10 || $count == 0){
		$noUrut = (int) substr($kode_tips, 3, 3);
	}else if($count<99){
		$noUrut = (int) substr($kode_tips, 2, 3);
	}else{
		$noUrut = (int) substr($kode_tips, 1, 3);
	}

	$noUrut++;
	$char = "T";
	$kode = $char . sprintf("%03s", $noUrut);

	if(empty($lokasi)){
		$sql="INSERT INTO tips_kucing SET id_tips='$kode', judul='$judul', keterangan='$keterangan'";
	}else{
		$folder="../images/tips_kucing/";
		$ukuran=150;
		UploadFoto($namafile,$folder,$ukuran);
		//kecilkangambar($tujuan, 150);
		$sql="INSERT INTO tips_kucing SET  id_tips='$kode', judul='$judul', keterangan='$keterangan', gambar_tips='$namafile'";
	}
	$simpan=mysqli_query($koneksi,$sql);
	if($simpan){
		header('Location:index.php?m=tips_kucing');
		//echo "berhasil";
	}else{
		include "?m=tips_kucing";
		echo '<script language="JavaScript">';
			echo 'alert("Data Gagal Ditambahkan")';
		echo '</script>';
		var_dump($sql);
	}
}else{
	echo '<script>window.history.back()</script>';
}
?>
