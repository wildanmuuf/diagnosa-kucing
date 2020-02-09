<?php include "atas.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Kucing
        <small>Sistem Pakar Diagnosa Penyakit Kucing</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="."><i class="fa fa-home"></i> Beranda</a></li>
        <li><a href="?m=kucing"><i class="fa fa-cat"></i> Kucing</a></li>
        <li class="active">Daftar</li>
      </ol>
    </section>
    <!-- Main content -->
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daftar Kucing</h3>

            </div>

            <!-- /.box-header -->
            <div class="box-body">
              <a href="?m=kucing&s=tambah" class="btn btn-large btn-info"><i class="glyphicon glyphicon-plus"></i> &nbsp; Tambah Kucing</a>
<?php
include "../sambungan.php";
$id_pengguna = $_SESSION['id_pengguna'];
$sql="SELECT * FROM kucing where id_pengguna='$id_pengguna' ORDER BY id_kucing";
$query=mysqli_query($koneksi,$sql);
if(mysqli_num_rows($query)==0){
    echo'          <table id="null" class="table table-bordered table-hover table-striped">
                <thead>
                <tr bgcolor="#ccc">
                <th>No</th>
                <th>Nama Kucing</th>
                <th>Jenis Kelamin</th>
                <th>Opsi</th>
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
                <th>Jenis Kucing</th>
                <th>Opsi</th>
                </tr>
                </thead>
                <tbody>
        ';
	$no=1;
	while($r=mysqli_fetch_assoc($query)){
	  echo "<tr>";
		echo "<td>$no</td>";
		echo "<td><a href='?m=kucing&s=detail&idk=".$r['id_kucing']."'>".$r['nama_kucing']."</a></td>";

    $id_jenis_kucing = $r['id_jenis_kucing'];
    $sqlJenis="SELECT * FROM jenis_kucing where id_jenis_kucing='$id_jenis_kucing'";
    $queryJenis=mysqli_query($koneksi,$sqlJenis);
    $rJenis = mysqli_fetch_assoc($queryJenis);
    if(empty($r['id_jenis_kucing'])){
      $rJenis['jenis_kucing']="Jenis kucing telah dihapus oleh Admin";
    }
    echo "<td>".$rJenis['jenis_kucing']."</td>";

    // if(empty($r['gambar'])){
    //   $r['gambar'] = "default.png";
    // }
    // echo '<td><img src="../images/kucing/'.$r['gambar'].'" height=100px> </td>';
		echo '<td width=60><a href="index.php?m=kucing&s=edit&idk='.$r['id_kucing'].'"><i class="fa fa-edit"></i></a> | <a href="index.php?m=kucing&s=hapus&idk='.$r['id_kucing'].'" onclick="return confirm(\'Yakin Akan dihapus?\')"><i class="fa fa-trash-alt"></i></a></td>';
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
                  <th>Jenis Kucing</th>
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
