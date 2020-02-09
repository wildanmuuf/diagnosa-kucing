<?php
if(isset($_POST['simpan'])){
	include "../sambungan.php";
	$id=$_POST['id'];
	$nama_kucing=$_POST['nama_kucing'];
	$id_jenis_kucing	=$_POST['id_jenis_kucing'];
	$angka_umur	=$_POST['umur'];
	$jk		=$_POST['jk'];
	$id_pengguna =$_SESSION['id_pengguna'];
	$lokasi =$_FILES['foto']['tmp_name'];
	$namafile=$_FILES['foto']['name'];
	$tipefile=$_FILES['foto']['type'];
	$tipe_umur = $_POST['tipe_umur'];
	$umur = $angka_umur." ".$tipe_umur;
	if(empty($lokasi)){
		$sql="UPDATE kucing SET nama_kucing = '$nama_kucing',umur = '$umur', jenis_kelamin_kucing='$jk', id_jenis_kucing='$id_jenis_kucing', id_pengguna='$id_pengguna' where id_kucing='$id'";
	}else{
		include "../fungsi/upload.php";
		$folder="../images/kucing/";
		$ukuran=100;
		UploadFoto($namafile,$folder,$ukuran);
		$sql="UPDATE kucing SET nama_kucing = '$nama_kucing',umur = '$umur', jenis_kelamin_kucing='$jk', id_jenis_kucing='$id_jenis_kucing', id_pengguna='$id_pengguna', gambar='$namafile' where id_kucing='$id'";
	}

	$simpan=mysqli_query($koneksi,$sql);
	//var_dump($sql);
	if($simpan){
		header('Location:index.php?m=kucing&s=awal');
		//echo "berhasil";
	}else{

		echo '<script language="JavaScript">';
			echo 'alert("Data Gagal diupdate.")';
		echo '</script>';
        echo '<script>window.history.back()</script>';
	}
}else{
	echo '<script>window.history.back()</script>';
	//echo "apa nih";
}
?>
