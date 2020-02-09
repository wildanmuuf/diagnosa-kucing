<?php
if(isset($_GET['idp'])){
	include "../sambungan.php";
	$id=$_GET['idp'];
	$sql   = "DELETE FROM penyakit_kucing WHERE id_penyakit_kucing='$id'";
	$hapus = mysqli_query($koneksi,$sql);
	if($hapus){
//			echo 'Data Kelas Berhasil di Hapus ';
//			echo '<a href="index.php">Kembali</a>';
		header("Location: ?m=penyakit_kucing");
	}else{
		echo '<script language="JavaScript">';
			echo 'alert("Data Penyakit Kucing gagal dihapus. Penyakit Kucing masih digunakan dalam Rule")';
		echo '</script>';
		echo '<script>window.history.back()</script>';
	}
}
?>
