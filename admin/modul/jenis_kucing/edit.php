<?php include "atas.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Jenis Kucing
        <small>Sistem Pakar Diagnosa Penyakit Kucing</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="."><i class="fa fa-home"></i> Beranda</a></li>
        <li><a href="?m=jenis_kucing"><i class="fa fa-stream"></i> Jenis Kucing</a></li>
        <li class="active">Ubah</li>
      </ol>
    </section>
    <!-- Main content -->
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Form Ubah Jenis Kucing</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
<?php
$id=$_GET['idj'];
include "../sambungan.php";
$sql="SELECT * FROM jenis_kucing WHERE id_jenis_kucing='$id'";
$query=mysqli_query($koneksi,$sql);
$r=mysqli_fetch_assoc($query);
?>
			 <!--Mulai buat form-->
			 <form action="?m=jenis_kucing&s=update" method="post" enctype="multipart/form-data">
              <table id="pilkasis1" class="table table-bordered table-hover table-striped">
                <tbody>
                  <input type="text" name="idj" value="<?php echo$r['id_jenis_kucing'];?>" hidden required /></td>
					<tr>
						<td width=150>Jenis Kucing*</td>
						<td colspan="2"><input type="text" class="form-control" name="jenis_kucing" placeholder="Jenis Kucing" size="25px" maxlength="25px" value="<?php echo$r['jenis_kucing'];?>" required /></td>
					</tr>
					<tr>
						<td>Masa Hidup</td>
						<td><input type="text" class="form-control" name="masa_hidup" placeholder="Masa Hidup" size="25px" maxlength="2px" value="<?php echo$r['masa_hidup'];?>" required /></td>
            <td><center>Tahun</center></td>
					</tr>
					<tr>
						<td>Penjelasan</td>
						<td colspan="2"><textarea type="text" class="textEditor" name="keterangan" placeholder="Keterangan" size="100px" ><?php echo$r['keterangan'];?></textarea></td>
					</tr>
					<tr>
						<td>Foto</td>
						<td>
<?php
						if ($r['gambar']!=''){
						  echo "<img src=\"../images/jenis_kucing/$r[gambar]\" height=150 />";
						}
						else{
						  echo "<img src=\"../images/jenis_kucing/default1.png\" height=150 width=150>";
						}
?>
					</tr>
					<tr>
						<td>Ganti Foto</td>
						<td><input type="file" name="foto" accept="image/jpeg" /><small>Kosongkan jika foto tak diganti</small></td>
					</tr>
					<tr>
						<td colspan=3>
						<button type="submit" name="simpan" class="btn btn-large btn-primary" ><i class="fa fa-save"></i> Simpan</button>&nbsp;&nbsp;&nbsp;
						<button type="reset" name="reset" class="btn btn-large btn-warning" ><i class="fa fa-undo"></i> Bersihkan</button>&nbsp;&nbsp;&nbsp;
						<a href="?m=jenis_kucing" class="btn btn-large btn-danger"><i class="fa fa-backward"></i> Kembali</a></td>
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
