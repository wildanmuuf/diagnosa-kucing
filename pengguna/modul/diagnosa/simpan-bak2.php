<?php
if(isset($_POST['pilih'])){
  include "../sambungan.php";

  $id_gejala=$_POST['gejala'];
	$id_kucing=$_POST['id_kucing'];
  $sql_tmp_gejala = "INSERT INTO tmp_gejala set id_gejala ='$id_gejala'";
  $chk_rule = mysqli_query($koneksi, $sql_tmp_gejala);

  $sql_chk_rule = "SELECT id_penyakit_kucing FROM rule where id_gejala = '$id_gejala'";
  $chk_rule = mysqli_query($koneksi, $sql_chk_rule);

  $sql_chk_tmp_penyakit = "SELECT*FROM tmp_penyakit_kucing";
  $chk_rule = mysqli_query($koneksi, $sql_chk_rule);
  $count_tmp_penyakit = mysqli_num_rows($chk_rule);
  if($count_tmp_penyakit == 0){
    if($chk_rule){
      while($r_tmp_penyakit = mysqli_fetch_array($chk_rule)){
        $sql_chk_penyakit = "INSERT INTO tmp_penyakit_kucing SET id_penyakit_kucing = '$r_tmp_penyakit[id_penyakit_kucing]')"
        mysqli_query($koneksi, $sql_chk_penyakit);
      }
    }
  }
}
?>
