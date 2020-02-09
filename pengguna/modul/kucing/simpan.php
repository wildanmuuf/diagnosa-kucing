<?php
if(isset($_POST['simpan'])){
	include "../sambungan.php";
	include "../fungsi/upload.php";
	$nama_kucing=$_POST['nama_kucing'];
	$id_jenis_kucing	=$_POST['id_jenis_kucing'];
	$angka_umur	=$_POST['umur'];
	$jk		=$_POST['jk'];
	$lokasi =$_FILES['foto']['tmp_name'];
	$namafile=$_FILES['foto']['name'];
	$tipefile=$_FILES['foto']['type'];
	$id_user =$_SESSION['id_pengguna'];
	$tipe_umur = $_POST['tipe_umur'];
	$umur = $angka_umur." ".$tipe_umur;
	if(empty($lokasi)){
		$sql="INSERT INTO kucing SET nama_kucing = '$nama_kucing',umur = '$umur', jenis_kelamin_kucing='$jk', id_jenis_kucing='$id_jenis_kucing', id_pengguna='$id_user'";
	}else{
		$folder="../images/kucing/";
		$ukuran=100;
		UploadFoto($namafile,$folder,$ukuran);
		$sql="INSERT INTO kucing SET nama_kucing = '$nama_kucing',umur = '$umur', jenis_kelamin_kucing='$jk', id_jenis_kucing='$id_jenis_kucing', id_pengguna='$id_user', gambar='$namafile'";
	}
	$simpan=mysqli_query($koneksi,$sql);
	if($simpan){
		header('Location:index.php?m=kucing');
		//echo "berhasil";
	}else{
		echo '<script language="JavaScript">';
			echo 'alert("Data Gagal Ditambahkan.")';
			echo 'window.location.href="?m=kucing&s=tambah"';
		echo '</script>';
	}
}else{
	echo '<script>window.history.back()</script>';
}
?>
