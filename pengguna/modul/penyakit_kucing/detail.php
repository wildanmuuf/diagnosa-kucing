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
        <li><a href="."><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li><a href="?m=penyakit_kucing"><i class="fa fa-bug"></i> Penyakit Kucing</a></li>
        <li class="active">Detail</li>
      </ol>
    </section>
    <!-- Main content -->
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Detail Penyakit Kucing</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
<?php
$id=$_GET['idpk'];
include "../sambungan.php";
$sql="SELECT * FROM penyakit_kucing
      WHERE id_penyakit_kucing='$id'";
$query=mysqli_query($koneksi,$sql);
$r=mysqli_fetch_assoc($query);
?>
              <table id="notNull" class="table table-bordered table-hover table-striped">
                <tbody>

          <tr>
						<td width="120px">Nama Penyakit</td>
						<td><?php echo$r['nama_penyakit_kucing'];?></td>
					</tr>
          <tr>
						<td>Kategori</td>
						<td><?php echo $r['kategori'];?></td>
					</tr>
					<tr>
						<td>Keterangan</td>
						<td><?php echo$r['keterangan'];?></td>
					</tr>

          <tr>
            <td colspan=2>
            <a href="?m=penyakit_kucing" class="btn btn-large btn-danger"><i class="fa fa-backward"></i> Kembali</a></td>
          </tr>
                </tbody>
              </table>
			 </form>
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
