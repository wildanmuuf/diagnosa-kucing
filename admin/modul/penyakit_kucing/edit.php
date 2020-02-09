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
        <li class="active">Ubah</li>
      </ol>
    </section>
    <!-- Main content -->
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Form Ubah Penyakit Kucing</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
<?php
$id=$_GET['idp'];
include "../sambungan.php";
$sql="SELECT * FROM penyakit_kucing WHERE id_penyakit_kucing='$id'";
$query=mysqli_query($koneksi,$sql);
$r=mysqli_fetch_assoc($query);
?>
			 <!--Mulai buat form-->
			 <form action="?m=penyakit_kucing&s=update" method="post" enctype="multipart/form-data">
              <table id="pilkasis1" class="table table-bordered table-hover table-striped">
                <tbody>
					<tr>
            <input type="text"  name="idp"  value="<?php echo $r['id_penyakit_kucing'];?>" hidden/>

						<td>Nama Penyakit*</td>
            <td><input type="text" class="form-control" name="nama_penyakit_kucing" placeholder="Nama Penyakit" size="48.5" maxlength="50px" value="<?php echo $r['nama_penyakit_kucing'];?>" required/></td>
					</tr>
          <tr>
						<td>Kategori</td>
						<td><input type="radio" name="kategori" id="umum" value="Umum" required <?php if($r['kategori']=="Umum"){echo "checked";}?>/>Umum &nbsp;&nbsp;
						<input type="radio" name="kategori" id="tdkUmum" value="Tidak Umum" required <?php if($r['kategori']=="Tidak Umum"){echo "checked";}?>/>Tidak Umum</td>
					</tr>
          <tr>
						<td width=150>Solusi*</td>
            <td><textarea type="text" class="textEditor" name="solusi" placeholder="Solusi" height="50px"><?php echo$r['solusi'];?></textarea></td>
					</tr>
					<tr>
						<td>Keterangan Penyakit</td>
            <td><textarea type="text" class="textEditor" name="keterangan" placeholder="Keterangan" rows="4" cols="50"><?php echo$r['keterangan'];?></textarea></td>
					</tr>
					<tr>
						<td colspan=3>
              <button type="submit" name="simpan" class="btn btn-large btn-primary" ><i class="fa fa-save"></i> Simpan</button>&nbsp;&nbsp;&nbsp;
  						<button type="reset" name="reset" class="btn btn-large btn-warning" ><i class="fa fa-undo"></i> Bersihkan</button>&nbsp;&nbsp;&nbsp;
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
