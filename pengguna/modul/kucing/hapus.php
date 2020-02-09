<?php
if(isset($_GET['idk'])){
	include "../sambungan.php";
	$id=$_GET['idk'];
	$sql   = "SELECT * FROM kucing WHERE id_kucing='$id'";
	$hapus = mysqli_query($koneksi,$sql);
	$r     = mysqli_fetch_array($hapus);
	if ($r['gambar']!=''){
		$foto=$r['gambar'];
		// hapus file gambar yang berhubungan dengan berita tersebut
		unlink("../images/kucing/$foto");
		$sql   = "DELETE FROM kucing WHERE id_kucing='$id'";
	}else{
		$sql   = "DELETE FROM kucing WHERE id_kucing='$id'";
	}

	$hapus = mysqli_query($koneksi,$sql);
	if($hapus){
//			echo 'Data Kelas Berhasil di Hapus ';
//			echo '<a href="index.php">Kembali</a>';
		header("Location: ?m=kucing");
	}else{
	    var_dump($sql);
		echo 'Data Kucing GAGAL di Hapus';
		echo '<a href="index.php">Kembali</a>';
	}
}
?>
