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
        <li class="active">Tambah</li>
      </ol>
    </section>
    <!-- Main content -->
	<section class="content">
      <div class="row">
        <div class="col-xs-13">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Form Tambah Jenis Kucing</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			 <!--Mulai buat form-->
			 <form action="?m=jenis_kucing&s=simpan" method="post" enctype="multipart/form-data">
              <table id="pilkasis1" class="table table-bordered table-hover table-striped">
                <tbody>
					<tr>
						<td>Jenis Kucing</td>
						<td colspan="2"><input type="text" class="form-control" name="jenis_kucing" placeholder="Jenis Kucing" size="25px" maxlength="50px" /></td>
					</tr>
					<tr>
						<td width=174>Masa Hidup</td>
						<td><input type="text" class="form-control" name="masa_hidup" placeholder="Masa Hidup" size="25px" maxlength="2px" onkeypress="return onlynumber(event)" required /></td>
            <td>Tahun</td>
					</tr>
					<tr>
						<td>Penjelasan</td>
						<td colspan="2"><textarea type="text" class="textEditor" name="keterangan" placeholder="Penjelasan" size=100px></textarea></td>
					</tr>
					
					<tr>
						<td>Gambar</td>
						<td ><label for="fileinput">File input</label>
						    <input type="file" size=50 id="fileinput" name="foto" accept="image/jpeg"></td>
					</tr>
					<tr>
						<td colspan=3>
              <button type="submit" name="simpan" class="btn btn-large btn-primary" ><i class="fa fa-save"></i> Simpan</button>&nbsp;&nbsp;&nbsp;
  						<button type="reset" name="reset" class="btn btn-large btn-warning" ><i class="fa fa-undo"></i> Bershikan</button>&nbsp;&nbsp;&nbsp;
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
    <script type="text/javascript">
    	function onlynumber(e){
    		var numChar = (e.which) ? e.which : event.keyCode
    		if(numChar > 31 && (numChar < 48 || numChar > 57))
    		return false;
    	return true;
    	}
    </script>
<?php include "bawah.php"; ?>
