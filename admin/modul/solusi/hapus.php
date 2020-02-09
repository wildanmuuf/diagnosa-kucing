<?php
if(isset($_GET['idj'])){
	include "../sambungan.php";
	$id=$_GET['idj'];
	$sql   = "SELECT * FROM jenis_kucing WHERE id_jenis_kucing='$id'";
	$hapus = mysqli_query($koneksi,$sql);
	$r     = mysqli_fetch_array($hapus);
	if ($r['gambar']!=''){
		$foto=$r['gambar'];
		// hapus file gambar yang berhubungan dengan berita tersebut
		unlink("../images/jenis_kucing/$foto");
	}
	$sql   = "DELETE FROM jenis_kucing WHERE id_jenis_kucing='$id'";
	$hapus = mysqli_query($koneksi,$sql);
	if($hapus){
		header("Location:?m=jenis_kucing");
	}else{
		include "index.php?m=jenis_kucing&s=awal";
		echo '<script language="JavaScript">';
			echo 'alert("Data Jenis Kucing Gagal dihapus.")';
		echo '</script>';
	}
}
?>
