<?php
if(isset($_GET['idt'])){
	include "../sambungan.php";
	$id=$_GET['idt'];
	$sql   = "SELECT * FROM tips_kucing WHERE id_tips='$id'";
	$hapus = mysqli_query($koneksi,$sql);
	$r     = mysqli_fetch_array($hapus);
	if ($r['gambar_tips']!=''){
		$foto=$r['gambar_tips'];
		// hapus file gambar yang berhubungan dengan berita tersebut
		unlink("../images/tips_kucing/$foto");
		$sql   = "DELETE FROM tips_kucing WHERE id_tips='$id'";
	}else{
		$sql   = "DELETE FROM tips_kucing WHERE id_tips='$id'";
	}

	$hapus = mysqli_query($koneksi,$sql);
	if($hapus){
//			echo 'Data Kelas Berhasil di Hapus ';
//			echo '<a href="index.php">Kembali</a>';
		header("Location: ?m=tips_kucing");
	}else{
		echo 'Data Tips Kucing GAGAL di Hapus';
		echo '<a href="index.php">Kembali</a>';
	}
}
?>
