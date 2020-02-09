<?php
if(isset($_POST['simpan'])){
	include_once "../sambungan.php";
	$id = $_POST['idj'];
	$jenis_kucing	=$_POST['jenis_kucing'];
	$masa_hidup	=$_POST['masa_hidup'];
	$keterangan=$_POST['keterangan'];
	$lokasi =$_FILES['foto']['tmp_name'];
	$namafile=$_FILES['foto']['name'];
	$tipefile=$_FILES['foto']['type'];

	if(empty($lokasi)){
		$sql="UPDATE jenis_kucing SET jenis_kucing='$jenis_kucing', masa_hidup='$masa_hidup', keterangan='$keterangan' WHERE id_jenis_kucing='$id'";
	}else{
		include "../fungsi/upload.php";
		$folder="../images/jenis_kucing/";
		$ukuran=100;
		UploadFoto($namafile,$folder,$ukuran);
		$sql="UPDATE jenis_kucing SET jenis_kucing='$jenis_kucing', masa_hidup='$masa_hidup', keterangan='$keterangan', gambar='$namafile' WHERE id_jenis_kucing='$id'";
	}
	$simpan=mysqli_query($koneksi,$sql);
	//var_dump($sql);
	if($simpan){
		header('Location:index.php?m=jenis_kucing');
		//echo "berhasil";
	}else{
		//echo "gagal alias tidak berhasil";
		include "index.php?m=jenis_kucing&s=awal";
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
