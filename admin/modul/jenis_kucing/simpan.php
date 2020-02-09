<?php
if(isset($_POST['simpan'])){
	include "../sambungan.php";
	include "../fungsi/upload.php";
	$jenis_kucing	=$_POST['jenis_kucing'];
	$masa_hidup	=$_POST['masa_hidup'];
	$keterangan=$_POST['keterangan'];
	$lokasi =$_FILES['foto']['tmp_name'];
	$namafile=$_FILES['foto']['name'];
	$tipefile=$_FILES['foto']['type'];

	if(empty($keterangan)){
		$keterangan="";
	}
	$query = "SELECT MAX(id_jenis_kucing) as maxKode FROM jenis_kucing ";
	$hasil = mysqli_query($koneksi,$query);
	$data = mysqli_fetch_array($hasil);
	$kode_jenis = $data['maxKode'];

	$sql_count = "SELECT* FROM jenis_kucing ";
	$count_query = mysqli_query($koneksi,$sql_count);
	$count = mysqli_num_rows($count_query);
	$noUrut=0;
	if($count<10 || $count == 0){
		$noUrut = (int) substr($kode_jenis, 3, 3);
	}else if($count<99){
		$noUrut = (int) substr($kode_jenis, 2, 3);
	}else{
		$noUrut = (int) substr($kode_jenis, 1, 3);
	}

	$noUrut++;
	$char = "J";
	$kode = $char . sprintf("%03s", $noUrut);

	if(empty($lokasi)){
		$sql="INSERT INTO jenis_kucing SET id_jenis_kucing='$kode', jenis_kucing='$jenis_kucing', masa_hidup='$masa_hidup', keterangan='$keterangan'";
	}else{
		$folder="../images/jenis_kucing/";
		$ukuran=100;
		UploadFoto($namafile,$folder,$ukuran);
		$sql="INSERT INTO jenis_kucing SET id_jenis_kucing='$kode', jenis_kucing='$jenis_kucing', masa_hidup='$masa_hidup', keterangan='$keterangan', gambar='$namafile'";
	}
	$simpan=mysqli_query($koneksi,$sql);
	if($simpan){
		header('Location:index.php?m=jenis_kucing&s=awal');
		//echo "berhasil";
	}else{
		include "index.php?m=jenis_kucing&s=awal";
		echo '<script language="JavaScript">';
			echo 'alert("Data Gagal Ditambahkan.")';
		echo '</script>';
	}
}else{
	echo '<script>window.history.back()</script>';
}
?>
