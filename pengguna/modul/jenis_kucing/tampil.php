<?php
error_reporting(0);
include_once "atas.php";
include_once "../sambungan.php";
$id_user = $_SESSION["id_pengguna"];
$sql="SELECT * FROM jenis_kucing ORDER BY id_jenis_kucing";
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
        Jenis Kucing
        <small>Sistem Pakar Diagnosa Penyakit Kucing</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="."><i class="fa fa-home"></i> Beranda</a></li>
        <li class="active">Jenis Kucing</li>
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
  echo'<div class="col-lg-3 col-xs-6"> ';
  echo '<div class="small-box bg-aqua">';
    echo '<div class="inner">
      <p>'.$r['jenis_kucing'].'</p>
      <p>&nbsp;</p>
      <div class="icon">
        <img src="../images/jenis_kucing/'.$foto.'" height=60px/>
      </div>
    </div>
    <a class="small-box-footer" href="#" value="'.$r['id_jenis_kucing'].'" data-toggle="modal"  data-target="#confirm'.$r['id_jenis_kucing'].'">Detail &nbsp<i class="fa fa-search"></i></a>
  </div>
  <div id="confirm'.$r['id_jenis_kucing'].'" class="modal fade" role="dialog">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
     <span aria-hidden="true">&times;</span>
 </button>
<center>
<p style="font-size: 20px">'.$r['jenis_kucing'].'</p>
</center>

</div>
<div class="modal-body">
<center>
<img src="../images/jenis_kucing/'.$foto.'" height="120px" class="mx-auto d-block"/></center>
<p style="font-size: 15px;">Umur : '.$r['masa_hidup'].'</p>
<p style="font-size: 15px;">Keterangan : '.$r['keterangan'].'</p>
</div>
<div class="modal-footer"><center>
<button class="btn btn-danger" type="button" data-dismiss="modal">Tutup</button></center>
</div>
</div>
</div>
</div>
</div>';
}
?>
      </div>
      <!-- /.row -->

<?php include "bawah.php"; ?>
