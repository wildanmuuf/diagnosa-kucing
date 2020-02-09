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
        <li class="active">Ubah</li>
      </ol>
    </section>
    <!-- Main content -->
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Form Ubah Solusi</h3>
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
			 <!--Mulai buat form-->
			 <form action="?m=solusi&s=update" method="post" enctype="multipart/form-data">
              <table id="pilkasis1" class="table table-bordered table-hover table-striped">
                <tbody>
                  <input type="text" name="ids" value="<?php echo$r['id_solusi'];?>" hidden required /></td>
					<tr>
						<td width=150>Solusi*</td>
            <td><textarea type="text" class="textEditor" name="solusi" placeholder="Solusi" height="50px"><?php echo$r['solusi'];?></textarea></td>
					</tr>

					<tr>
						<td>Gambar</td>
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
						<td>Ganti Gambar</td>
						<td><input type="file" name="foto" accept="image/jpeg" /><small>Kosongkan jika gambar tak diganti</small></td>
					</tr>
					<tr>
						<td colspan=3>
              <button type="submit" name="simpan" class="btn btn-large btn-primary" ><i class="fa fa-save"></i> Simpan</button>&nbsp;&nbsp;&nbsp;
              <button type="reset" name="reset" class="btn btn-large btn-warning" ><i class="fa fa-undo"></i> Bersihkan</button>&nbsp;&nbsp;&nbsp;
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
