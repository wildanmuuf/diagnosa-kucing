<?php include "atas.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Penyakit Kucing
        <small>Sistem Pakar Diagnosa Penyakit Kucing</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="."><i class="fa fa-home"></i> Beranda</a></li>
        <li><a href="?m=penyakit_kucing"><i class="fa fa-bug"></i> Penyakit Kucing</a></li>
        <li class="active">Daftar</li>
      </ol>
    </section>
    <!-- Main content -->
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daftar Penyakit Kucing</h3><br><br>
			  <a href="?m=penyakit_kucing&s=tambah" class="btn btn-large btn-info"><i class="glyphicon glyphicon-plus"></i> &nbsp; Tambah Penyakit Kucing</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
<?php
include "../sambungan.php";
$sql="SELECT * FROM penyakit_kucing ORDER BY id_penyakit_kucing";
$query=mysqli_query($koneksi,$sql);
if(mysqli_num_rows($query)==0){
  echo '<table id="null" class="table table-bordered table-hover table-striped">
    <thead>
    <tr bgcolor="#ccc">
      <th>Kode</th>
      <th>Nama Penyakit</th>
      <th>Kategori</th>
      <th>Opsi</th>
    </tr>
    </thead>
    <tbody>';
    echo "<td colspan='6'>Data Masih Kosong</td>";
}else{
  echo '<table id="notNull" class="table table-bordered table-hover table-striped">
    <thead>
    <tr bgcolor="#ccc">
      <th>Kode</th>
      <th>Nama Penyakit</th>
      <th>Kategori</th>
      <th>Opsi</th>
    </tr>
    </thead>
    <tbody>';
	$no=1;
	while($r=mysqli_fetch_assoc($query)){
	  echo "<tr>";
		//echo "<td>$no</td>";
    echo "<td>".$r['id_penyakit_kucing']."</td>";
		echo "<td><a href='?m=penyakit_kucing&s=detail&idp=".$r['id_penyakit_kucing']."'>".$r['nama_penyakit_kucing']."</a></td>";
		echo "<td>".$r['kategori']."</td>";
		echo '<td><a href="index.php?m=penyakit_kucing&s=edit&idp='.$r['id_penyakit_kucing'].'"><i class="fa fa-edit"></i></a> | <a href="index.php?m=penyakit_kucing&s=hapus&idp='.$r['id_penyakit_kucing'].'" onclick="return confirm(\'Yakin Akan dihapus?\')"><i class="fa fa-trash-alt"></i></a></td>';
	  echo "</tr>";
		//$no++;
	}
}
?>
                </tbody>
                <tfoot>
                <tr bgcolor="#ccc">
                  <th>Kode</th>
                  <th>Nama Penyakit</th>
                  <th>Kategori</th>
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
