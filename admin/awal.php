<?php include "atas.php"; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Beranda
        <small>Sistem Pakar Diagnosa Penyakit Kucing</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="."><i class="fas fa-home"></i> Beranda</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">

        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-gray">
            <div class="inner">
<?php
include_once "../sambungan.php";
$sql="SELECT count(id_pengguna) as jumlah FROM pengguna where hak_akses='pengguna'";
$query=mysqli_query($koneksi,$sql);
$r=mysqli_fetch_assoc($query);
echo "<h3>".$r['jumlah']."</h3>";
?>
              <p>Pengguna Tercatat</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="?m=pengguna" class="small-box-footer">Info Pengguna <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-gray">
            <div class="inner">
<?php
$sql="SELECT count(id_jenis_kucing) as jumlah FROM jenis_kucing";
$query=mysqli_query($koneksi,$sql);
$r=mysqli_fetch_assoc($query);
echo "<h3>".$r['jumlah']."</h3>";
?>
              <p>Jenis Kucing Tercatat</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="?m=jenis_kucing" class="small-box-footer">Info Jenis Kucing <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-gray">
            <div class="inner">
<?php
$sql="SELECT count(id_penyakit_kucing) as jumlah FROM penyakit_kucing";
$query=mysqli_query($koneksi,$sql);
$r=mysqli_fetch_assoc($query);
echo "<h3>".$r['jumlah']."</h3>";
?>
              <p>Penyakit Kucing Tercatat</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="?m=penyakit_kucing" class="small-box-footer">Info Penyakit Kucing <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <!-- ./col -->

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-gray">
            <div class="inner">
<?php
$sql="SELECT count(id_gejala) as jumlah FROM gejala";
$query=mysqli_query($koneksi,$sql);
$r=mysqli_fetch_assoc($query);
echo "<h3>".$r['jumlah']."</h3>";
?>
              <p>Gejala Penyakit Kucing Tercatat</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="?m=gejala" class="small-box-footer">Info Gejala Penyakit Kucing <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-gray">
            <div class="inner">
<?php
$sql="SELECT * FROM rule group by id_penyakit_kucing";
$query=mysqli_query($koneksi,$sql);

$count=mysqli_num_rows($query);
echo "<h3>".$count."</h3>";
?>
              <p>Rule Penyakit Kucing Tercatat</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="?m=rule" class="small-box-footer">Info Rule Penyakit Kucing <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-gray">
            <div class="inner">
        <?php
        $sql="SELECT count(id_tips) as jumlah FROM tips_kucing";
        $query=mysqli_query($koneksi,$sql);
        $r=mysqli_fetch_assoc($query);
        echo "<h3>".$r['jumlah']."</h3>";
        ?>
              <p>Tips Kucing Tercatat</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="?m=tips_kucing" class="small-box-footer">Info Tips Kucing <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>

</div>


        </div>
      <!-- /.page -->
<?php include "bawah.php"; ?>
