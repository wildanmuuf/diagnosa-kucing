<?php
if(isset($_POST['simpan'])){
	include "../sambungan.php";
	$nama_gejala	=$_POST['nama_gejala'];

	$query = "SELECT MAX(id_gejala) as maxKode FROM gejala ";
	$hasil = mysqli_query($koneksi,$query);
	$data = mysqli_fetch_array($hasil);

	$sql_count = "SELECT* FROM gejala ";
	$count_query = mysqli_query($koneksi,$sql_count);
	$count = mysqli_num_rows($count_query);
	$kode_gejala = $data['maxKode'];
	$noUrut=0;
	if($count<10 || $count == 0){
		$noUrut = (int) substr($kode_gejala, 3, 3);
	}else if($count<99){
		$noUrut = (int) substr($kode_gejala, 2, 3);
	}else{
		$noUrut = (int) substr($kode_gejala, 1, 3);
	}
	$noUrut++;
	$char = "G";
	$kode = $char . sprintf("%03s", $noUrut);

	$sql="INSERT INTO gejala SET id_gejala='$kode', nama_gejala='$nama_gejala'";
	$simpan=mysqli_query($koneksi,$sql);
	var_dump($count);
	if($simpan){
		header('Location:index.php?m=gejala&s=awal');
		//echo "berhasil";
	}else{
		include "index.php?m=gejala&s=awal";
		echo '<script language="JavaScript">';
			echo 'alert("Data Gagal Ditambahkan.")';
		echo '</script>';
	}
}else{
	echo '<script>window.history.back()</script>';
}
?>
