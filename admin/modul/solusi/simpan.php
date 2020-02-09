<?php
if(isset($_POST['simpan'])){
	include "../sambungan.php";
	require_once "../fungsi/upload.php";
	$solusi=$_POST['solusi'];
	$lokasi =$_FILES['foto']['tmp_name'];
	$namafile=$_FILES['foto']['name'];
	$tipefile=$_FILES['foto']['type'];

	$query = "SELECT MAX(id_solusi) as maxKode FROM solusi ";
	$hasil = mysqli_query($koneksi,$query);
	$data = mysqli_fetch_array($hasil);
	$kode_solusi = $data['maxKode'];

	$sql_count = "SELECT* FROM solusi";
	$count_query = mysqli_query($koneksi,$sql_count);
	$count = mysqli_num_rows($count_query);
	$noUrut=0;
	if($count<10 || $count == 0){
		$noUrut = (int) substr($kode_solusi, 3, 3);
	}else if($count<99){
		$noUrut = (int) substr($kode_solusi, 2, 3);
	}else{
		$noUrut = (int) substr($kode_solusi, 1, 3);
	}

	$noUrut++;
	$char = "S";
	$kode = $char . sprintf("%03s", $noUrut);

	if(empty($lokasi)){
		$sql="INSERT INTO solusi SET id_solusi='$kode', solusi='$solusi'";
	}else{
		$folder="../images/solusi/";
		$ukuran=150;
		UploadFoto($namafile,$folder,$ukuran);
		//kecilkangambar($tujuan, 150);
		$sql="INSERT INTO solusi SET id_solusi='$kode', solusi='$solusi', gambar='$namafile'";
	}
	$simpan=mysqli_query($koneksi,$sql);
	var_dump($sql);
	if($simpan){
		header('Location:index.php?m=solusi');
		//echo "berhasil";
	}else{
		include "?m=solusi";
		echo '<script language="JavaScript">';
			echo 'alert("Data Gagal Ditambahkan")';
		echo '</script>';
		//var_dump($sql);
	}
}else{
	echo '<script>window.history.back()</script>';
}
?>
