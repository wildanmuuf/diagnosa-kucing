<?php include "atas.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administrator Aplikasi
        <small>Diagnosa Kucing</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="."><i class="fa fa-home"></i> Beranda</a></li>
        <li><a href="?m=pengguna"><i class="fa fa-user"></i> Pengguna</a></li>
        <li class="active">Daftar</li>
      </ol>
    </section>
    <!-- Main content -->
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daftar Pengguna</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="notNull" class="table table-bordered table-hover table-striped">
                <thead>
                <tr bgcolor="#ccc">
                  <th>No</th>
                  <th>Foto</th>
                  <th>Nama</th>
                  <th>Username</th>
                </tr>
                </thead>
                <tbody>

<?php
include "../sambungan.php";
$sql="SELECT * FROM pengguna where hak_akses='pengguna' ORDER BY id_pengguna";
$query=mysqli_query($koneksi,$sql);
if(mysqli_num_rows($query)==0){
	echo "<td colspan='6'>Data Masih Kosong</td>";
}else{
	$no=1;
	while($r=mysqli_fetch_assoc($query)){
	  echo "<tr>";
		echo "<td>$no</td>";
    if(empty($r['foto'])){
      $r['foto'] = "default.png";
    }
    echo "<td><img src='../images/pengguna/".$r['foto']."' height='70px'/></td>";
		echo '<td><a href="index.php?m=pengguna&s=detail&id='.$r['id_pengguna'].'">'.$r['nama_pengguna'].'</a></td>';
		echo "<td>".$r['username']."</td>";
	  echo "</tr>";
		$no++;
	}
}
?>
                </tbody>
                <tfoot>
                <tr bgcolor="#ccc">
                  <th>No</th>
                  <th>Foto</th>
                  <th>Nama</th>
                  <th>Username</th>
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
