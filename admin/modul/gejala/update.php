<?php
if(isset($_POST['simpan'])){
	include_once "../sambungan.php";
	$id = $_POST['idg'];
	$nama_gejala	=$_POST['nama_gejala'];

	$sql="UPDATE gejala SET nama_gejala='$nama_gejala' WHERE id_gejala='$id'";
	$simpan=mysqli_query($koneksi,$sql);
	//var_dump($sql);
	if($simpan){
		header('Location:index.php?m=gejala');
		//echo "berhasil";
	}else{
		//echo "gagal alias tidak berhasil";
		include "index.php?s=awal";
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
