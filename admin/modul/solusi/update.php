<?php
if(isset($_POST['simpan'])){
	include_once "../sambungan.php";
	$id = $_POST['ids'];
	$solusi=$_POST['solusi'];
	$lokasi =$_FILES['foto']['tmp_name'];
	$namafile=$_FILES['foto']['name'];
	$tipefile=$_FILES['foto']['type'];

	if(empty($lokasi)){
		$sql="UPDATE solusi SET solusi='$solusi' WHERE id_solusi='$id'";
	}else{
		include "../fungsi/upload.php";
		$folder="../images/solusi/";
		$ukuran=100;
		UploadFoto($namafile,$folder,$ukuran);
		$sql="UPDATE solusi SET solusi='$solusi', gambar='$namafile' WHERE id_solusi='$id'";
	}
	$simpan=mysqli_query($koneksi,$sql);
	//var_dump($sql);
	if($simpan){
		header('Location:index.php?m=solusi');
		//echo "berhasil";
	}else{
		//echo "gagal alias tidak berhasil";
		include "index.php?m=solusi&s=awal";
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
