<?php
include "../sambungan.php";
include "../fungsi/cookies.php";
include "../fungsi/delete_tmp.php";
# Fungsi untuk menambah data ke tmp_analisa
function AddTmpAnalisa($id_kucing) {
	include "../sambungan.php";

	$sql_solusi = "SELECT rule.* FROM rule inner join tmp_penyakit_kucing
				  on rule.id_penyakit_kucing=tmp_penyakit_kucing.id_penyakit_kucing
				  where tmp_penyakit_kucing.id_kucing='$id_kucing' ORDER BY rule.id_penyakit_kucing, rule.id_gejala";
	$qry_solusi = mysqli_query($koneksi,$sql_solusi);
	while ($data_solusi = mysqli_fetch_array($qry_solusi)) {
		$sqltmp = "INSERT INTO tmp_analisa (id_kucing, id_penyakit_kucing,id_gejala)
					VALUES ('$id_kucing','$data_solusi[id_penyakit_kucing]','$data_solusi[id_gejala]')";
		mysqli_query($koneksi,$sqltmp);
	}
}

# Fungsi hapus tabel tmp_gejala
function AddTmpGejala($id_gejala, $id_kucing) {
	include "../sambungan.php";

	$sql_gejala = "INSERT INTO tmp_gejala (id_kucing,id_gejala) VALUES ('$id_kucing','$id_gejala')";
	mysqli_query($koneksi,$sql_gejala);
}

# Fungsi hapus tabel tmp_sakit
function DelTmpSakit($id_kucing) {
	include "../sambungan.php";

	$sql_del = "DELETE FROM tmp_penyakit_kucing WHERE id_kucing='$id_kucing'";
	mysqli_query($koneksi,$sql_del);
}

# Fungsi hapus tabel tmp_analisa
function DelTmpAnlisa($id_kucing) {
	include "../sambungan.php";

	$sql_del = "DELETE FROM tmp_analisa WHERE id_kucing='$id_kucing'";
	mysqli_query($koneksi,$sql_del);
}



if(isset($_POST['pilih'])){

	$id_gejala=$_POST['gejala'];
	$id_kucing=$_POST['id_kucing'];
	if($id_gejala == "0"){
			$waktu = time();
			if(!empty($_COOKIE['tidak-yakin'])){
				$id_gejala = $_COOKIE['tidak-yakin'];
			}

			if($id_gejala >= 5){
				TruncateTable("tmp_penyakit_kucing");
	      TruncateTable("tmp_gejala");
	      TruncateTable("tmp_analisa");
				DelCookie("tidak-yakin", $waktu-60);
				echo '<script language="javascript">';
					echo 'alert ("Gejala tidak ditemukan!")';
				echo '</script>';
			}else{
				$id_gejala = $id_gejala+1;
				SetCookies("tidak-yakin",$id_gejala,$waktu+60);
			}
	}else{
		$sql_analisa = "SELECT * FROM tmp_analisa where id_kucing='$id_kucing' ";
		$qry_analisa = mysqli_query($koneksi, $sql_analisa);
		$data_cek = mysqli_num_rows($qry_analisa);
		if ($data_cek >= 1) {
			# Kode saat tmp_analisa tidak kosong
			DelTmpSakit($id_kucing);
			$sql_tmp = "SELECT * FROM tmp_analisa
						WHERE id_gejala='$id_gejala'
						AND id_kucing='$id_kucing'";
			$qry_tmp = mysqli_query($koneksi, $sql_tmp);
			while ($data_tmp = mysqli_fetch_array($qry_tmp)) {
				$sql_rsolusi = "SELECT * FROM rule
								WHERE id_penyakit_kucing='$data_tmp[id_penyakit_kucing]'
								GROUP BY id_penyakit_kucing";
				$qry_rsolusi = mysqli_query($koneksi, $sql_rsolusi);
				while ($data_rsolusi = mysqli_fetch_array($qry_rsolusi)) {
					// Data solusi gizi yang mungkin dimasukkan ke tmp
					$sql_input = "INSERT INTO tmp_penyakit_kucing (id_kucing,id_penyakit_kucing)
								 VALUES ('$id_kucing','$data_rsolusi[id_penyakit_kucing]')";
					mysqli_query($koneksi, $sql_input);
				}
			}
			// Gunakan Fungsi
			DelTmpAnlisa($id_kucing);
			AddTmpAnalisa($id_kucing);
			AddTmpGejala($id_gejala, $id_kucing);
		}	else {
			# Kode saat tmp_analisa kosong
			$sql_rgejala = "SELECT * FROM rule WHERE id_gejala='$id_gejala'";
			$qry_rgejala = mysqli_query($koneksi, $sql_rgejala);
			while ($data_rgejala = mysqli_fetch_array($qry_rgejala)) {
				$sql_rsolusi = "SELECT * FROM rule
							   WHERE id_penyakit_kucing='$data_rgejala[id_penyakit_kucing]'
							   GROUP BY id_penyakit_kucing";
				$qry_rsolusi = mysqli_query($koneksi,$sql_rsolusi);
				while ($data_rsolusi = mysqli_fetch_array($qry_rsolusi)) {
					// Data solusi gizi yang mungkin dimasukkan ke tmp
					$sql_input = "INSERT INTO tmp_penyakit_kucing (id_kucing,id_penyakit_kucing)
								 VALUES ('$id_kucing','$data_rsolusi[id_penyakit_kucing]')";
					mysqli_query($koneksi,$sql_input);
				}
			}
			// Menggunakan Fungsi
			AddTmpAnalisa($id_kucing);
			AddTmpGejala($id_gejala, $id_kucing);
		}
	}
	echo "<meta http-equiv='refresh' content='0; url=index.php?m=diagnosa&s=mulai&idk=$id_kucing'>";

}

?>
