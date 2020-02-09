<?php
if(isset($_GET['idj'])){
	include "../sambungan.php";
	$id=$_GET['idj'];
	$sql   = "SELECT * FROM jenis_kucing WHERE id_jenis_kucing='$id'";
	$hapus = mysqli_query($koneksi,$sql);
	$r     = mysqli_fetch_array($hapus);
	if ($r['gambar']!=''){
		$foto=$r['gambar'];
		// hapus file gambar yang berhubungan dengan berita tersebut
		unlink("../images/jenis_kucing/$foto");
	}
	
	$sqlKucing = "SELECT*from kucing where id_jenis_kucing='$id'";
	$qKucing = mysqli_query	($koneksi,$sqlKucing);
	
	if(mysqli_num_rows($qKucing)>0){
		while($rKucing=mysqli_fetch_array($qKucing)){

			$sqlNullJenis="UPDATE kucing SET id_jenis_kucing=NULL where id_kucing='$rKucing[id_kucing]'";
			var_dump($sqlNullJenis);
			mysqli_query($koneksi,$sqlNullJenis);
		}
	}
	$sql   = "DELETE FROM jenis_kucing WHERE id_jenis_kucing='$id'";
	$hapus = mysqli_query($koneksi,$sql);
	if($hapus){
		header("Location:?m=jenis_kucing");
	}else{
		echo '<script language="JavaScript">';
			echo 'alert("Data Jenis Kucing Gagal dihapus.")';
							echo '</script>';
		//echo '<script>window.history.back()</script>';
	}
	
}
?>
