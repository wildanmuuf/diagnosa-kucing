<?php include "atas.php";
$id=$_GET['idk'];
include "../sambungan.php";
include "../fungsi/delete_tmp.php";



$sqlKucing="SELECT * FROM kucing WHERE id_kucing='$id'";
$queryKucing=mysqli_query($koneksi,$sqlKucing);
$rKucing=mysqli_fetch_assoc($queryKucing);

$query = "SELECT MAX(id_diagnosa) as maxKode FROM diagnosa ";
$hasil = mysqli_query($koneksi,$query);
$data = mysqli_fetch_array($hasil);

$sql_count = "SELECT* FROM diagnosa ";
$count_query = mysqli_query($koneksi,$sql_count);
$count = mysqli_num_rows($count_query);
$kode_diagnosa = $data['maxKode'];
$noUrut=0;
if($count<10 || $count == 0){
  $noUrut = (int) substr($kode_diagnosa, 3, 3);
}else if($count<99){
  $noUrut = (int) substr($kode_diagnosa, 2, 3);
}else{
  $noUrut = (int) substr($kode_diagnosa, 1, 3);
}
$noUrut++;
$char = "D";
$kode = $char . sprintf("%03s", $noUrut);

$sql_cekh = "SELECT * FROM tmp_penyakit_kucing WHERE id_kucing='$id' GROUP BY id_penyakit_kucing";
$qry_cekh = mysqli_query($koneksi,$sql_cekh);
$hsl_cekh = mysqli_num_rows($qry_cekh);
date_default_timezone_set('Asia/Jakarta');
$today = date('Y/m/d H:i:s');


if ($hsl_cekh == 1) {
  include "../sambungan.php";

  $id_pengguna = $_SESSION['id_pengguna'];
	// Apabila data tmp_solusi isinya 1
	$hsl_data = mysqli_fetch_array($qry_cekh);
  //
  // $sql_solusi = "SELECT * FROM solusi WHERE id_penyakit_kucing='$hsl_data[id_penyakit_kucing]' GROUP BY id_solusi";
  // $qry_solusi = mysqli_query($koneksi,$sql_solusi);
  // $solusi_data = mysqli_fetch_array($qry_solusi);

  //diagnosa berhasil -> data diagnosa masuk kedalam tabel diagnosa
	$sql_in = "INSERT INTO diagnosa SET
			id_diagnosa='$kode',
			id_pengguna='$id_pengguna',
			id_penyakit_kucing='$hsl_data[id_penyakit_kucing]',
			id_kucing='$hsl_data[id_kucing]',
			tgl_diagnosa='$today'";
	mysqli_query($koneksi, $sql_in);

  //menyimpan data gejala dengan gejala tertentu
  $sql_tmp_gejala="SELECT * from rule where id_penyakit_kucing = '$hsl_data[id_penyakit_kucing]'";
  $gejala = mysqli_query($koneksi, $sql_tmp_gejala);
  while($r_gejala=mysqli_fetch_array($gejala)){
    $sql_detail = "INSERT INTO detail_diagnosa SET id_diagnosa = '$kode', id_gejala='$r_gejala[id_gejala]'";
    $detail_diagnosa = mysqli_query($koneksi, $sql_detail);
    if($detail_diagnosa){
      TruncateTable("tmp_penyakit_kucing");
      TruncateTable("tmp_gejala");
      TruncateTable("tmp_analisa");
      echo "<meta http-equiv='refresh' content='0; url=index.php?m=diagnosa&s=hasil&idd=$kode'>";
    }
  }
		// Redireksi setelah pemindahan data

}

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Diagnosa Kucing
        <small>Sistem Pakar Diagnosa Kucing</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="."><i class="fa fa-home"></i> Beranda</a></li>
        <li><a href="?m=diagnosa"><i class="fa fa-diagnoses"></i> Diagnosa</a></li>
        <li class="active">Mulai</li>
      </ol>
    </section>
    <!-- Main content -->
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Mulai Diagnosa <?php echo $rKucing['nama_kucing']; ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			 <!--Mulai buat form-->


			 <form action="?m=diagnosa&s=simpan" method="post" enctype="multipart/form-data">
              <table id="pilkasis1" class="table table-bordered table-hover table-striped">
                <tbody>
                  <input type="hidden" name="id_kucing" value="<?php echo $rKucing['id_kucing'];?>"/>
          <tr>
            <td>Pilih Gejala</td>
          </tr>
          <tr>
            <?php
            # Apabila BELUM MENEMUKAN penyakit
            $no = 0;
            $sqlcek = "SELECT * FROM tmp_analisa WHERE id_kucing='$id'";
            $qrycek = mysqli_query($koneksi,$sqlcek);
            $datacek = mysqli_num_rows($qrycek);
            if ($datacek >= 1) {
            	// Seandainya tmp_analisa tidak kosong
            	// SQL ambil data gejala yang tidak ada di dalam
            	// tabel tmp_gejala (NOT IN....)
            	$sqlg = "SELECT gejala.* FROM gejala,tmp_analisa
            		WHERE gejala.id_gejala=tmp_analisa.id_gejala
            		AND tmp_analisa.id_kucing='$id'
            		AND NOT tmp_analisa.id_gejala
            		IN(SELECT id_gejala
            			FROM tmp_gejala WHERE id_kucing='$id')
            			ORDER BY rand() LIMIT 5";
            	$qryg = mysqli_query($koneksi,$sqlg);
              while($datag = mysqli_fetch_array($qryg)){
                if($no>0){
                  echo '<tr>';
                  echo '<td colspan=3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" required name="gejala" value="'.$datag['id_gejala'].'" > '.$datag['nama_gejala'].'</td>';
                }else{
                  echo '<td colspan=3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" required name="gejala" value="'.$datag['id_gejala'].'" > '.$datag['nama_gejala'].'</td>';
                }
                $no++;
              }

            }
            else {
            	// Seandainya tmp kosong
            	// Ambil data gejala dari tabel gejala
            	$sqlg = "SELECT * FROM gejala ORDER BY rand() LIMIT 5";
            	$qryg = mysqli_query($koneksi,$sqlg);
              while($datag = mysqli_fetch_array($qryg)){
                if($no>0){
                  echo '<tr>';
                  echo '<td colspan=3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" required name="gejala" value="'.$datag['id_gejala'].'" > '.$datag['nama_gejala'].'</td>';
                }else{
                  echo '<td colspan=3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" required name="gejala" value="'.$datag['id_gejala'].'" > '.$datag['nama_gejala'].'</td>';
                }
                $no++;
              }
            } ?>

          </tr>
          <tr>
            <td colspan=3> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <input type="radio" name="gejala" value="0" >.&nbsp;.&nbsp;.&nbsp; Saya tidak yakin</td>
          </tr>
					<tr>
						<td colspan=3>
						<button type="submit" name="pilih" class="btn btn-large btn-primary" ><i class="fa fa-check"></i> Pilih</button>&nbsp;&nbsp;&nbsp;
						<a href="?m=diagnosa&s=kembali" name="back" class="btn btn-large btn-danger"><i class="fa fa-backward"></i> Kembali</a></td>
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
