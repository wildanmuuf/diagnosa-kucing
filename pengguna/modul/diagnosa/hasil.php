<?php include "atas.php";

$id=$_GET['idd'];
include "../sambungan.php";
$sql="SELECT diagnosa.*, kucing.*, penyakit_kucing.* FROM diagnosa
    join penyakit_kucing on penyakit_kucing.id_penyakit_kucing = diagnosa.id_penyakit_kucing
    join kucing on kucing.id_kucing = diagnosa.id_kucing WHERE diagnosa.id_diagnosa='$id'";
$query=mysqli_query($koneksi,$sql);
$r=mysqli_fetch_assoc($query);
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Diagnosa
        <small>Sistem Pakar Diagnosa Penyakit Kucing</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="."><i class="fa fa-home"></i> Beranda</a></li>
        <li><a href="?m=siswa"><i class="fa fa-diagnoses"></i>Diagnosa</a></li>
        <li class="active">Hasil</li>
      </ol>
    </section>
    <!-- Main content -->
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Hasil Diagnosa</h3>

            </div>
            <center>
            <?php
            						if ($r['gambar']!=''){
            						  echo "<img src=\"../images/penyakit_kucing/$r[gambar]\" height=150px />";
            						}
            						else{
            						  echo "<img src=\"../images/penyakit_kucing/default.jpg\" height=150px>";
            						}
            ?>
          </center>
            <!-- /.box-header -->
            <div class="box-body">

              <table id="pilkasis1" class="table table-bordered table-hover table-striped">
                <tbody>

					<tr>
						<td width=150>Nama Kucing</td>
						<td><?php echo$r['nama_kucing'];?></td>
					</tr>
          <tr>
            <td width=150>Gejala</td>
            <?php
              $no = 0;
              $sql_detail_diagnosa = "SELECT detail_diagnosa.*, gejala.* FROM detail_diagnosa, gejala
              where id_diagnosa = '$r[id_diagnosa]'
              and detail_diagnosa.id_gejala = gejala.id_gejala";
              $detail_diagnosa = mysqli_query($koneksi, $sql_detail_diagnosa);
              while($r_detail = mysqli_fetch_array($detail_diagnosa)){
                if($no > 0){
                  echo '<tr>';
                  echo '<td></td>';
                  echo '<td colspan=2>'.$r_detail['nama_gejala'].'</td>';
                }else{
                  echo '<td colspan=2> '.$r_detail['nama_gejala'].'</td>';
                }
                $no++;
              }

            ?>

          </tr>
          <tr>
						<td width=150>Penyakit Kucing</td>
						<td><?php echo$r['nama_penyakit_kucing'];?></td>
					</tr>
          <tr>
            <td>Penjelasan Penyakit</td>
            <td><?php echo $r['keterangan'];?></td>
          </tr>
					<tr>
						<td>Solusi</td>
						<td><?php echo $r['solusi'];?></td>
					</tr>


					<tr>
						<td colspan=2>
            <a href="?m=diagnosa" class="btn btn-large btn-danger"><i class="fa fa-backward"></i> Kembali</a></td>
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
