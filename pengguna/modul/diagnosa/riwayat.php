<?php include "atas.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Diagnosa
        <small>Sistem Pakar Diagnosa Penyakit Kucing</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="."><i class="fa fa-home"></i> Beranda</a></li>
        <li class="active">Riwayat</li>
      </ol>
    </section>
    <!-- Main content -->
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daftar Riwayat Diagnosa</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
<?php
include "../sambungan.php";
$id_pengguna = $_SESSION['id_pengguna'];
$sql="SELECT diagnosa.*, kucing.*, penyakit_kucing.* FROM diagnosa
    join penyakit_kucing on penyakit_kucing.id_penyakit_kucing = diagnosa.id_penyakit_kucing

    join kucing on kucing.id_kucing = diagnosa.id_kucing
    where diagnosa.id_pengguna='$id_pengguna'";
$query=mysqli_query($koneksi,$sql);
if(mysqli_num_rows($query)==0){
    echo'          <table id="null" class="table table-bordered table-hover table-striped">
                <thead>
                <tr bgcolor="#ccc">
                <th>No</th>
                <th>Nama Kucing</th>
                <th>Penyakit</th>
                <th>Tanggal Diagnosa</th>
                </tr>
                </thead>
                <tbody>
         ';
	echo "<td colspan='6'>Data Masih Kosong</td>";
}else{
    echo'          <table id="notNull" class="table table-bordered table-hover table-striped">
                <thead>
                <tr bgcolor="#ccc">
                <th>No</th>
                <th>Nama Kucing</th>
                <th>Penyakit</th>
                <th>Tanggal Diagnosa</th>
                </tr>
                </thead>
                <tbody>
        ';
	$no=1;
	while($r=mysqli_fetch_assoc($query)){
	  echo '<tr class="clickable-row" data-href="">';
		echo "<td>$no</td>";
    echo "<td><a href='?m=diagnosa&s=hasil&idd=".$r['id_diagnosa']."'>".$r['nama_kucing']."</a></td>";
    echo "<td>".$r['nama_penyakit_kucing']."</td>";
    echo "<td>".$r['tgl_diagnosa']."</td>";
	  echo "</tr>";
		$no++;
	}
}
?>
                </tbody>
                <tfoot>
                <tr bgcolor="#ccc">
                  <th>No</th>
                  <th>Nama Kucing</th>
                  <th>Penyakit</th>
                  <th>Tanggal Diagnosa</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

    <script>
    jQuery(document).ready(function($) {
      $(".clickable-row").click(function() {
        window.location = $(this).data("href");
      });
    });
    </script>
    <!-- /.content -->
<?php include "bawah.php"; ?>
