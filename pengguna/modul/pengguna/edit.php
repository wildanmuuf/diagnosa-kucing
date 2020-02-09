<?php include "atas.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Profil
        <small>Sistem Pakar Diagnosa Penyakit Kucing</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="."><i class="fa fa-home"></i> Beranda</a></li>
        <li><a href="?m=pengguna"><i class="fa fa-user"></i> Profil</a></li>
        <li class="active">Ubah</li>
      </ol>
    </section>
    <!-- Main content -->
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Form Ubah Profil</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
<?php
$id=$_GET['id'];
include "../sambungan.php";
$sql="SELECT * FROM pengguna WHERE id_pengguna='$id'";
$query=mysqli_query($koneksi,$sql);
$r=mysqli_fetch_assoc($query);
?>
			 <!--Mulai buat form-->
			 <form action="?m=pengguna&s=update" method="post" enctype="multipart/form-data">
              <table id="pilkasis1" class="table table-bordered table-hover table-striped">
                <tbody>
          <input type="text" name="id" hidden size="25px" maxlength="25px" value="<?php echo$r['id_pengguna'];?>" required />
					<tr>
						<td width=150>Nama Pemilik Kucing *</td>
						<td><input type="text" name="nama_pengguna" placeholder="Nama Pemilik User" size="25px" maxlength="25px" value="<?php echo$r['nama_pengguna'];?>" required /></td>
					</tr>
          <tr>
						<td width=150>Username *</td>
						<td><input type="text" name="username" placeholder="Username" size="25px" maxlength="25px" value="<?php echo$r['username'];?>" required /></td>
					</tr>
					<tr>
						<td>Sandi</td>
						<td><input type="password" name="password" placeholder="Password" size="25px" maxlength="32px" /><small>Kosongkan jika tak diubah</small></td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td>
						<td><input type="radio" name="jk" id="jkl" value="L" <?php if($r['jenis_kelamin']=='L') echo " checked";?> />Laki-laki &nbsp;&nbsp;
						<input type="radio" name="jk" id="jkp" value="P" <?php if($r['jenis_kelamin']=='P') echo " checked";?> />Perempuan</td>
					</tr>
					<tr>
						<td>Tanggal Lahir</td>
						<td><input type="date" name="tanggall" placeholder="Tanggal Lahir" value="<?php echo$r['tgl_lahir']; ?>" /><small>Gunakan browser chrome atau Opera</small></td>
					</tr>
					<tr>
						<td>Handphone</td>
						<td><input type="text" name="hp" placeholder="HP" size="15px" maxlength="15px" value="<?php echo$r['no_telp'];?>" /></td>
					</tr>
					<tr>
						<td>Surat Elektronik</td>
						<td><input type="email" name="surel" placeholder="Email" size="50px" maxlength="50px" value="<?php echo$r['email'];?>" /></td>
					</tr>
					<tr>
						<td>Foto</td>
						<td>
<?php
						if ($r['foto']!=''){
						  echo'<img src="../images/pengguna/'.$r['foto'].'" height=150 />';
						}
						else{
						  echo "<img src=\"../images/pengguna/0.jpg\">";
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
            <a href="?m=pengguna" class="btn btn-large btn-danger"><i class="fa fa-backward"></i> Kembali</a></td>
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
