<?php include "atas.php";
include_once "../sambungan.php";?>

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
        <li class="active">Tambah</li>
      </ol>
    </section>
    <!-- Main content -->
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Form Tambah Kucing</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			 <!--Mulai buat form-->
			 <form action="?m=kucing&s=simpan" method="post" enctype="multipart/form-data">
              <table id="pilkasis1" class="table table-bordered table-hover table-striped">
                <tbody>
					<tr>
						<td>Nama Kucing</td>
						<td><input class="form-control" type="text" name="nama_kucing" placeholder="Nama Kucing" size="50px" maxlength="50px" required /></td>
					</tr>
          <tr>
						<td>Jenis Kucing</td>
						<td><select class="form-control" name="id_jenis_kucing">
              <?php
                include "../sambungan.php";
                $qJenis = "SELECT* from jenis_kucing";
                $query=mysqli_query($koneksi,$qJenis);
                while ($r=mysqli_fetch_assoc($query)) {
                  echo '<option value='.$r['id_jenis_kucing'].'>'.$r['jenis_kucing'].'</option>';
                }
            ?>
              </select></td>
					</tr>
          <tr>
						<td>Jenis Kelamin</td>
						<td><input type="radio" name="jk" id="jkl" value="J" checked /> Jantan &nbsp;&nbsp;
						<input type="radio" name="jk" id="jkp" value="B" /> Betina</td>
					</tr>
					<tr>
						<td>Umur</td>
						<td>
              <input type="radio" name="tipe_umur" value="Bulan" checked /> Bulan &nbsp;&nbsp;
  						<input type="radio" name="tipe_umur" value="Tahun" /> Tahun <br>
              <input class="form-control" oninput="setCustomValidity('')" type="number" id="umur" name="umur" placeholder="Umur" size="25px" onKeyPress="if(this.value.length==2) return false;" min="1" max="15" onkeypress="return onlynumber(event)" required /></td>
					</tr>
          <tr>
						<td>Foto</td>
						<td><input type="file" name="foto" accept="image/*" /></td>
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
    <script type="text/javascript">
    var radios = document.getElementsByName('tipe_umur');
    var txt = document.getElementById('umur');

    for (var i = 0, length = radios.length; i < length; i++) {
      if (radios[i].checked) {
        if(radios[i].value=="Bulan"){
          txt.setAttribute("max", "12");
          txt.setAttribute("oninvalid", "this.setCustomValidity('Bulan tidak boleh lebih dari 12')");
          console.log("12");
        }else{
          txt.setAttribute("max", "15");
          txt.setAttribute("oninvalid", "this.setCustomValidity('Tahun tidak boleh lebih dari 15')");
          console.log("15");
        }
        break;
      }
    }
      function onlynumber(e){
        var numChar = (e.which) ? e.which : event.keyCode
        if(numChar > 31 && (numChar < 48 || numChar > 57))
        return false;
      return true;
      }
    </script>
<?php include "bawah.php"; ?>
