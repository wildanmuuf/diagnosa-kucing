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
        <li class="active">Detail</li>
      </ol>
    </section>
    <!-- Main content -->
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Detail Kucing</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
<?php
$id=$_GET['idk'];
include "../sambungan.php";
$sql="SELECT * FROM kucing where kucing.id_kucing='$id' ";
$query=mysqli_query($koneksi,$sql);
$r=mysqli_fetch_assoc($query);
$sqlJenis="SELECT*FROM jenis_kucing where id_jenis_kucing='$r[id_jenis_kucing]'";
$queryJenis=mysqli_query($koneksi,$sqlJenis);
$rJenis=mysqli_fetch_assoc($queryJenis);
if(empty($rJenis['jenis_kucing'])){
  $rJenis['jenis_kucing']="Jenis kucing telah dihapus oleh admin. Silahkan perbaharui jenis kucing Anda!";
}
?>
              <table id="pilkasis1" class="table table-bordered table-hover table-striped">
                <tbody>
					<tr>
						<td width=150>Nama Kucing</td>
						<td><?php echo$r['nama_kucing'];?></td>
					</tr>
          <tr>
						<td>Jenis Kelamin</td>
						<td><?php if($r['jenis_kelamin_kucing']=='J'){
              echo 'Jantan';
            }else{
                echo 'Betina';
            }
             ?></td>
					</tr>
          <tr>
						<td>Jenis Kucing</td>
						<td><?php echo$rJenis['jenis_kucing'];?></td>
					</tr>
					<tr>
						<td>Foto</td>
						<td>
<?php
						if ($r['gambar']!=''){
						  echo "<img src=\"../images/kucing/$r[gambar]\" height=150 />";
						}
						else{
						  echo "<img src=\"../images/kucing/default1.png\" height=150>";
						}
?>
					</tr>
					<tr>
						<td colspan=2>
						<a href="?m=kucing&s=edit&idk=<?php echo$id;?>" class="btn btn-large btn-primary"><i class="fa fa-edit"></i> Ubah</a>
            <a href="?m=kucing" class="btn btn-large btn-danger"><i class="fa fa-backward"></i> Kembali</a></td>

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
