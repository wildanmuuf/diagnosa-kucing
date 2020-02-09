<?php
if(isset($_POST['simpan'])){
	include "../sambungan.php";
	include "../fungsi/upload.php";
	$id=$_POST['idp'];
	$nama_penyakit_kucing=$_POST['nama_penyakit_kucing'];
	$solusi = $_POST['solusi'];
	$kategori	=$_POST['kategori'];
	$keterangan	=$_POST['keterangan'];

	if(empty($_POST['keterangan'])){
			$sql="UPDATE penyakit_kucing SET nama_penyakit_kucing='$nama_penyakit_kucing', solusi='$solusi', kategori='$kategori' where id_penyakit_kucing='$id'";
	}else{
		$sql="UPDATE penyakit_kucing SET nama_penyakit_kucing='$nama_penyakit_kucing', solusi='$solusi', kategori='$kategori', keterangan='$keterangan' where id_penyakit_kucing='$id'";
	}
	$simpan=mysqli_query($koneksi,$sql);
	//var_dump($sql);
	if($simpan){
		header('Location:index.php?m=penyakit_kucing&s=awal');
		//echo "berhasil";
	}else{
		//echo "gagal alias tidak berhasil, kemungkinan username sudah digunakan";
		include "index.php?m=penyakit_kucing&s=awal";
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
