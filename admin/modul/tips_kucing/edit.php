<?php include "atas.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tips Kucing
        <small>Sistem Pakar Diagnosa Penyakit Kucing</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="."><i class="fa fa-home"></i> Beranda</a></li>
        <li><a href="?m=tips_kucing"><i class="fa fa-cat"></i> Tips Kucing</a></li>
        <li class="active">Ubah</li>
      </ol>
    </section>
    <!-- Main content -->
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Form Edit Tips Kucing</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
<?php
$id=$_GET['idt'];
include "../sambungan.php";
$sql="SELECT * FROM tips_kucing where id_tips='$id' ORDER BY id_tips";
$query=mysqli_query($koneksi,$sql);
$r=mysqli_fetch_assoc($query);
?>
			 <!--Mulai buat form-->
			 <form action="?m=tips_kucing&s=update" method="post" enctype="multipart/form-data">
              <table id="pilkasis1" class="table table-bordered table-hover table-striped">
                <tbody>


					<tr>
            <input type="text" name="id_tips" value= "<?php echo $r['id_tips']?>"hidden />
						<td>Judul*</td>

						<td><input  class="form-control" type="text" name="judul_tips" placeholder="Judul" size="50px" maxlength="500px" value="<?php echo$r['judul'];?>" required /></td>
					</tr>
					<tr>
						<td>Keterangan*</td>
            <td><textarea class="textEditor" type="text" name="keterangan" placeholder="Keterangan" size="50px"><?php echo $r['keterangan'];?></textarea></td>
					</tr>
					<tr>
						<td>Gambar</td>
						<td>
<?php
						if ($r['gambar_tips']!=''){
						  echo "<img src=\"../images/tips_kucing/$r[gambar_tips]\" height=150 />";
						}
						else{
						  echo "<img src=\"../images/tips_kucing/default1.png\" height=150>";
						}
?>
					</tr>
					<tr>
						<td>Ganti Foto</td>
						<td><input type="file" name="foto" accept="image/*" /><small>Kosongkan jika foto tak diganti</small></td>
					</tr>
					<tr>
						<td colspan=3>
              <button type="submit" name="simpan" class="btn btn-large btn-primary" ><i class="fa fa-save"></i> Simpan</button>&nbsp;&nbsp;&nbsp;
              <button type="reset" name="reset" class="btn btn-large btn-warning" ><i class="fa fa-undo"></i> Bersihkan</button>&nbsp;&nbsp;&nbsp;
						<a href="?m=tips_kucing" class="btn btn-large btn-danger"><i class="fa fa-backward"></i> Kembali</a></td>
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
