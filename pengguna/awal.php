<?php
error_reporting(0);
include_once "atas.php";
include_once "../sambungan.php";
include "../fungsi/cookies.php";
$waktu = time();
DelCookie("tidak-yakin", $waktu-60);
$id_user = $_SESSION["id_pengguna"];
$sql="SELECT * FROM kucing where id_pengguna='$id_user'";
$query=mysqli_query($koneksi,$sql);
/*$sjumlah="SELECT count(idpemilihan) as kandidat,idkandidat FROM datapemilihan GROUP BY idkandidat ORDER BY idkandidat";
$qjumlah=mysqli_query($koneksi,$sjumlah);
$j=mysqli_fetch_assoc($qjumlah);
*/
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Beranda
        <small>Sistem Pakar Diagnosa Penyakit Kucing</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="."><i class="fa fa-home"></i> Beranda</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
<?php
//var_dump($sql);
while($r=mysqli_fetch_assoc($query)){
  $foto = "default1.png";
  if(!empty($r['gambar'])){
    $foto = $r['gambar'];
  }
  echo'<div class="col-lg-3 col-xs-6"> <center>';
  echo '<div class="small-box bg-aqua">';
    echo '<div class="inner">
      <p>'.$r['nama_kucing'].'</p>
      <p>&nbsp;</p>
      <div class="icon">
        <img src="../images/kucing/'.$foto.'" height=60px/>
      </div>
    </div>
    <a href="index.php?m=diagnosa&s=mulai&idk='.$r['id_kucing'].'" class="small-box-footer">Mulai Diagnosa Kucing <i class="fa fa-diagnoses"></i></a>
  </div></center>
</div>';
}
?>
      </div>
      <!-- /.row -->

<?php include "bawah.php"; ?>
