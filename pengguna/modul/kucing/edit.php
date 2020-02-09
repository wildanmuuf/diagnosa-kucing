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
        <li class="active">Edit</li>
      </ol>
    </section>
    <!-- Main content -->
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Form Edit Kucing</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
<?php
$id=$_GET['idk'];
include "../sambungan.php";
$sql="SELECT * FROM kucing WHERE id_kucing='$id'";
$query=mysqli_query($koneksi,$sql);
$r=mysqli_fetch_assoc($query);
?>
			 <!--Mulai buat form-->
			 <form action="?m=kucing&s=update" method="post" enctype="multipart/form-data">
              <table id="pilkasis1" class="table table-bordered table-hover table-striped">
                <tbody>
					<input type="hidden" name="id" value="<?php echo$r['id_kucing'];?>" />

					<tr>
						<td>Nama Kucing</td>
						<td><input type="text" class="form-control" name="nama_kucing" placeholder="Nama Kucing" size="50px" maxlength="50px" value="<?php echo$r['nama_kucing'];?>" required /></td>
					</tr>
          <tr>
						<td>Jenis Kucing</td>
						<td><select class="form-control" class="form-control" name="id_jenis_kucing">
              <?php
                include "../sambungan.php";
                $qJenis = "SELECT* from jenis_kucing";
                $query=mysqli_query($koneksi,$qJenis);
                while ($rx=mysqli_fetch_assoc($query)) {
                  echo '<option value='.$rx['id_jenis_kucing'].'>'.$rx['jenis_kucing'].'</option>';
                }
            ?>
              </select></td>
					</tr>
          <tr>
						<td>Jenis Kelamin</td><div class="form-check form-check-inline">
						<td><input type="radio" name="jk" id="jkl" value="J" <?php if($r['jenis_kelamin_kucing']=='J') echo " checked";?> />Jantan &nbsp;&nbsp;
						<input type="radio" name="jk" id="jkp" value="B" <?php if($r['jenis_kelamin_kucing']=='B') echo " checked";?> />Betina</td>
					</div></tr>
          <tr>
						<td>Umur</td>
						<td>
              <?php
                $tipe_umur = substr($r['umur'],3,5);
                $umur = substr($r['umur'],0,2);
              ?>
              <input type="radio" name="tipe_umur" value="Bulan" <?php if($tipe_umur=="Bulan"){echo "checked";}?> /> Bulan &nbsp;&nbsp;
              <input type="radio" name="tipe_umur" value="Tahun" <?php if($tipe_umur=="Tahun"){echo "checked";}?> /> Tahun <br>
              <input class="form-control" oninput="setCustomValidity('')" type="number" id="umur" name="umur" value="<?php echo $umur;?>" placeholder="Umur" size="25px" onKeyPress="if(this.value.length==2) return false;" min="1" max="15" onkeypress="return onlynumber(event)" required /></td>
					</tr>
          <tr>
            <td>Foto</td>
            <td>
  <?php
            if ($r['gambar']!=''){
              echo'<img src="../images/kucing/'.$r['gambar'].'" height=150 />';
            }
            else{
              echo "<img src=\"../images/kucing/default1.png\" height=150>";
            }
  ?>
          </tr>
          <tr>
            <td>Ganti Foto</td>
            <td><input type="file" name="foto" accept="image/*" /><small>Kosongkan jika foto tak diganti</small></td>
          </tr>
					<tr>
						<td colspan=3>
						<input type="submit" name="simpan" value="Save" class="btn btn-large btn-primary" />&nbsp;&nbsp;&nbsp;
						<input type="reset" name="reset" value="Reset" class="btn btn-large btn-warning" />&nbsp;&nbsp;&nbsp;
						<a href="?m=diagnosa" class="btn btn-large btn-danger"><i class="fa fa-times"></i> List</a></td>
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
