<?php
if(isset($_POST['simpan'])){
	require_once "../sambungan.php";
	require_once "../fungsi/upload.php";
	$nama_penyakit_kucing=$_POST['nama_penyakit_kucing'];
	$keterangan	=$_POST['keterangan'];
	$kategori	=$_POST['kategori'];
	$solusi = $_POST['solusi'];
	$sql="SELECT * FROM penyakit_kucing WHERE nama_penyakit_kucing='$nama_penyakit_kucing'";
	$query=mysqli_query($koneksi,$sql);
	$r=mysqli_fetch_assoc($query);
	$ketemu=mysqli_num_rows($query);

	if($ketemu <= 0){
		$query = "SELECT MAX(id_penyakit_kucing) as maxKode FROM penyakit_kucing ";
		$hasil = mysqli_query($koneksi,$query);
		$data = mysqli_fetch_array($hasil);
		$kode_penyakit = $data['maxKode'];

		$sql_count = "SELECT* FROM penyakit_kucing ";
		$count_query = mysqli_query($koneksi,$sql_count);
		$count = mysqli_num_rows($count_query);
		$noUrut=0;
		if($count<10 || $count == 0){
			$noUrut = (int) substr($kode_penyakit, 3, 3);
		}else if($count<99){
			$noUrut = (int) substr($kode_penyakit, 2, 3);
		}else{
			$noUrut = (int) substr($kode_penyakit, 1, 3);
		}

		$noUrut++;
		$char = "P";
		$kode = $char . sprintf("%03s", $noUrut);

		if(empty($keterangan)){
			$sql="INSERT INTO penyakit_kucing SET id_penyakit_kucing = '$kode', kategori='$kategori', solusi='$solusi', nama_penyakit_kucing='$nama_penyakit_kucing''";
		}else{
			$sql="INSERT INTO penyakit_kucing SET id_penyakit_kucing = '$kode', kategori='$kategori', solusi='$solusi', nama_penyakit_kucing='$nama_penyakit_kucing', keterangan='$keterangan'";
		}
		$simpan=mysqli_query($koneksi,$sql);
		if($simpan){
			header('Location:index.php?m=penyakit_kucing');
		}else{
			include "index.php?m=penyakit_kucing";
			echo '<script language="JavaScript">';
				echo 'alert("Data Gagal Ditambahkan.")';
			echo '</script>';
			//var_dump($sql);
		}
		}else{
			echo '<script language="JavaScript">';
				echo 'alert("Data sudah ada.")';
			echo '</script>';
				echo '<script>window.history.back()</script>';
		}
	}else{
		echo '<script>window.history.back()</script>';
	}
?>
