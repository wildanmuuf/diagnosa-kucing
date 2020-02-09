<?php include "atas.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Jenis Kucing
      </h1>
      <ol class="breadcrumb">
        <li><a href="."><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li><i class="fa fa-book"></i> Jenis Kucing</a></li>
      </ol>
    </section>
    <!-- Main content -->
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daftar Jenis Kucing</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
<?php
include "../sambungan.php";
$sql="SELECT * FROM jenis_kucing ORDER BY id_jenis_kucing";
$query=mysqli_query($koneksi,$sql);
if(mysqli_num_rows($query)==0){
    echo'          <table class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Foto Kucing</th>
                  <th>Jenis Kucing</th>
                  <th>Masa Hidup Kucing</th>
                  <th>Opsi</th>
                </tr>
                </thead>
                <tbody>
         ';
	echo "<td colspan='6'>Data Masih Kosong</td>";
}else{
    echo'          <table id="pilkasis1" class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                <th>No</th>
                <th>Foto Kucing</th>
                <th>Jenis Kucing</th>
                <th>Masa Hidup Kucing</th>
                <th>Opsi</th>
                </tr>
                </thead>
                <tbody>
        ';
	$no=1;
	while($r=mysqli_fetch_assoc($query)){
	  echo "<tr>";
		echo "<td>$no</td>";
    if(empty($r['gambar'])){
      $r['gambar'] = "default.png";
    }
		echo "<td><img src='../images/jenis_kucing/".$r['gambar']."' height='100px'/></td>";
		echo "<td>".$r['jenis_kucing']."</td>";
    echo "<td>".$r['masa_hidup']."</td>";
    echo '<td><a class="small-box-footer" href="#" value="'.$r['id_jenis_kucing'].'" data-toggle="modal"  data-target="#confirm'.$r['id_jenis_kucing'].'">Detail &nbsp<i class="fa fa-search"></i></a>
    <div id="confirm'.$r['id_jenis_kucing'].'" class="modal fade" role="dialog">
<div class="modal-dialog modal-sm" role="document">
<div class="modal-content">

<div class="modal-body">
  <h3 style="color:#201f24">'.$r['jenis_kucing'].'</h3>
<h4 style="color:#201f24">'.$r['keterangan'].'</h4>
</div>
<div class="modal-footer"><center>
<button class="btn btn-danger" type="button" data-dismiss="modal">Tutup</button></center>
</div>
</div>
</div>
</div>
</div>
</div></td>';

	  echo "</tr>";
		$no++;
	}
}
?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Foto Kucing</th>
                  <th>Jenis Kucing</th>
                  <th>Masa Hidup Kucing</th>
                  <th>Opsi</th>
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
    <!-- /.content -->
<?php include "bawah.php"; ?>
