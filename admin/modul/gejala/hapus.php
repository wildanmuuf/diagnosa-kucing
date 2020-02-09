<?php
if(isset($_GET['idg'])){
	include "../sambungan.php";
	$id=$_GET['idg'];
	$sql   = "DELETE FROM gejala WHERE id_gejala='$id'";
	$hapus = mysqli_query($koneksi,$sql);
	if($hapus){
		header("Location:?m=gejala");
	}else{
		echo '<script language="JavaScript">';
			echo 'alert("Data gejala gagal dihapus. Gejala masih digunakan dalam Rule")';
		echo '</script>';
		echo '<script>window.history.back()</script>';
	}
}
?>
