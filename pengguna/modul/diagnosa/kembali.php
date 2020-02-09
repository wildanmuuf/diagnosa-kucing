<?php
  include "../sambungan.php";
  include "../fungsi/delete_tmp.php";
  include "../fungsi/cookies.php";
  $sql_tmp_gejala="SELECT * FROM tmp_gejala";
  $query_tmp_gejala=mysqli_query($koneksi,$sql_tmp_gejala);
  $count_tmp_gejala=mysqli_num_rows($query_tmp_gejala);
  if($count_tmp_gejala > 0){
    $waktu = time();
    TruncateTable("tmp_penyakit_kucing");
    TruncateTable("tmp_gejala");
    TruncateTable("tmp_analisa");
    DelCookie("tidak-yakin", $waktu-60);
  }
  echo "<meta http-equiv='refresh' content='0; url=index.php?m=awal'>";
?>
