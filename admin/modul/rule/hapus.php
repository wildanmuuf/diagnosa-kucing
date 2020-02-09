<?php
if(isset($_GET['idr'])){
	include "../sambungan.php";
	$id=$_GET['idr'];
	$sql   = "DELETE FROM rule WHERE id_penyakit_kucing='$id'";
	$hapus = mysqli_query($koneksi,$sql);
	if($hapus){
		header("Location:?m=rule");
	}else{
		include "index.php?m=rule&s=awal";
		echo '<script language="JavaScript">';
			echo 'alert("Data Jenis Kucing Gagal dihapus.")';
		echo '</script>';
	}
}
?>
