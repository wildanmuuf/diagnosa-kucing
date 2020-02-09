<?php include "atas.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Rule
        <small>Sistem Pakar Diagnosa Penyakit Kucing</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="."><i class="fa fa-home"></i> Beranda</a></li>
        <li><a href="?m=rule"><i class="fa fa-bezier-curve fa-rotate-180"></i> Rule</a></li>
        <li class="active">Tambah</li>
      </ol>
    </section>
    <!-- Main content -->
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Form Tambah Rule</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			 <!--Mulai buat form-->
			 <form action="?m=rule&s=simpan" method="post" enctype="multipart/form-data">
          <table id="" class="table table-bordered table-hover table-striped">
            <tbody>
              <tr>
                <td>Penyakit Kucing</td>
                <td colspan="2"><select class="form-control" name="id_penyakit_kucing">
                  <?php
                    include "../sambungan.php";
                    $qJenis = "SELECT* from penyakit_kucing";
                    $query=mysqli_query($koneksi,$qJenis);
                    while ($r=mysqli_fetch_assoc($query)) {
                      echo '<option value='.$r['id_penyakit_kucing'].'>'.$r['nama_penyakit_kucing'].'</option>';
                    }
                ?>
                  </select>
                </td>
              </tr>
              <?php
                include "../sambungan.php";
                $qJenis = "SELECT* from gejala";
                $query=mysqli_query($koneksi,$qJenis);
                $count=mysqli_num_rows($query);
              ?>
              <tr>
                <td width=174 rowspan="<?php echo $count;?>">Gejala</td>
                <?php
                  include "../sambungan.php";
                  $qJenis = "SELECT* from gejala";
                  $query=mysqli_query($koneksi,$qJenis);
                  while ($r=mysqli_fetch_assoc($query)) {
                    echo '<td><label class="checkbox-inline">';
                    echo '<input type="checkbox" name="gejala[]" value="'.$r["id_gejala"].'"/>'.$r["nama_gejala"].'';
                    echo '</label> </td>';
                    if($count!=0){
                      echo '</tr>';
                    }
                  }
                ?>

              </tr>

                </tbody>
              </table>
              <button type="submit" name="simpan" class="btn btn-large btn-primary" ><i class="fa fa-save"></i> Simpan</button>&nbsp;&nbsp;&nbsp;
              <button type="reset" name="reset" class="btn btn-large btn-warning" ><i class="fa fa-undo"></i> Bersihkan</button>&nbsp;&nbsp;&nbsp;
              <a href="?m=rule" class="btn btn-large btn-danger"><i class="fa fa-backward"></i> Kembali</a></td>
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
