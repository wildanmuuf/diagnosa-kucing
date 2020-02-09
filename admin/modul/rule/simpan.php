<?php
if(isset($_POST['simpan'])){
	require_once "../sambungan.php";
	require_once "../fungsi/upload.php";
	$id_penyakit_kucing=$_POST['id_penyakit_kucing'];
	$id_gejala	= $_POST["gejala"];
	if(!empty($_POST["gejala"])){
		foreach($id_gejala as $value){
			$checkGejala = "SELECT*from rule where id_gejala='$value' and id_penyakit_kucing='$id_penyakit_kucing'";
			$checkQuery=mysqli_query($koneksi,$checkGejala);
			$count=mysqli_num_rows($checkQuery);
			if($count==0){
				$sql="INSERT INTO rule SET id_penyakit_kucing='$id_penyakit_kucing', id_gejala='$value'";
				$simpan=mysqli_query($koneksi,$sql);
				if($simpan){
					header('Location:index.php?m=rule');
					//echo "berhasil";
				}else{
					include "?m=rule";
					echo '<script language="JavaScript">';
						echo 'alert("Data Gagal Ditambahkan")';
					echo '</script>';
					//var_dump($sql);
				}
			}else{
				echo '<script language="JavaScript">';
					echo 'if(!alert("Data '.$value.' sudah ada")){window.location.href = "?m=rule&s=tambah"}';
				echo '</script>';
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
