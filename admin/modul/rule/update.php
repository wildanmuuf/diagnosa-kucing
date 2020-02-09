<?php
if(isset($_POST['simpan'])){
	require_once "../sambungan.php";
	require_once "../fungsi/upload.php";
	$id_penyakit_kucing=$_POST['id_penyakit_kucing'];
	$id_gejala	= $_POST["gejala"];
	$deleteSql="DELETE from rule where id_penyakit_kucing='$id_penyakit_kucing'";
	$delete=mysqli_query($koneksi,$deleteSql);
	var_dump($id_gejala);
	if(!empty($_POST["gejala"])){
		foreach($id_gejala as $value){
			$sql="INSERT INTO rule SET id_penyakit_kucing='$id_penyakit_kucing', id_gejala='$value'";
			$simpan=mysqli_query($koneksi,$sql);
			if($simpan){
				var_dump($sql);
				header('Location:index.php?m=rule');
				//echo "berhasil";
			}else{
				include "?m=rule";
				echo '<script language="JavaScript">';
					echo 'alert("Data Gagal Ditambahkan")';
				echo '</script>';
				//var_dump($sql);
			}
		}
	}else{
		echo '<script language="JavaScript">';
			echo 'if(!alert("Pilih salah satu gejala")){window.history.back()}';
		echo '</script>';
	}
}else{
	echo '<script>window.history.back()</script>';
}
?>
