<?php include "atas.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Solusi
        <small>Sistem Pakar Diagnosa Penyakit Kucing</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="."><i class="fa fa-home"></i> Beranda</a></li>
        <li><a href="?m=solusi"><i class="fa fa-book-open"></i> Solusi</a></li>
        <li class="active">Detail</li>
      </ol>
    </section>
    <!-- Main content -->
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Detail Solusi</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
<?php
$id=$_GET['ids'];
include "../sambungan.php";
$sql="SELECT * FROM solusi WHERE id_solusi='$id'";
$query=mysqli_query($koneksi,$sql);
$r=mysqli_fetch_assoc($query);
?>
              <table id="pilkasis1" class="table table-bordered table-hover table-striped">
                <tbody>
					<tr>
						<td width=150>Solusi</td>
						<td><?php echo$r['solusi'];?></td>
					</tr>
					<tr>
						<td>Foto</td>
						<td>
<?php
						if ($r['gambar']!=''){
						  echo "<img src=\"../images/solusi/$r[gambar]\" height=150 />";
						}
						else{
						  echo "<img src=\"../images/solusi/default.jpg\" height=150>";
						}
?>
					</tr>
					<tr>
						<td colspan=2>
						<a href="?m=solusi&s=edit&ids=<?php echo$id;?>" class="btn btn-large btn-primary"><i class="fa fa-edit"></i> Ubah</a>
						<a href="?m=solusi" class="btn btn-large btn-danger"><i class="fa fa-backward"></i> Kembali</a></td>
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
