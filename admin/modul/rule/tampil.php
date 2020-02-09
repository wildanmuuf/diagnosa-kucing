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
        <li class="active">Daftar</li>
      </ol>
    </section>
    <!-- Main content -->
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
			  <a href="?m=rule&s=tambah" class="btn btn-large btn-info"><i class="glyphicon glyphicon-plus"></i> &nbsp; Tambah Rule</a>
              <h3 class="box-title">Daftar Rule</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
<?php
include "../sambungan.php";
$sql="SELECT gejala.id_gejala, penyakit_kucing.id_penyakit_kucing, penyakit_kucing.nama_penyakit_kucing, gejala.nama_gejala
FROM rule
JOIN penyakit_kucing ON rule.id_penyakit_kucing = penyakit_kucing.id_penyakit_kucing
JOIN gejala ON rule.id_gejala = gejala.id_gejala GROUP BY id_penyakit_kucing ORDER BY id_penyakit_kucing ASC";
$query=mysqli_query($koneksi,$sql);
if(mysqli_num_rows($query)==0){
  echo '<table id="pilkasis1" class="table table-bordered table-hover table-striped">
    <thead>
    <tr bgcolor="#ccc">
      <th>Kode</th>
      <th>Nama Penyakit</th>
      <th>Gejala</th>
      <th>Opsi</th>
    </tr>
    </thead>
    <tbody>';
    echo "<td colspan='6'>Data Masih Kosong</td>";
}else{
  echo '<table id="pilkasis2" class="table table-bordered table-hover table-striped">
    <thead>
    <tr bgcolor="#ccc">
      <th>Kode</th>
      <th>Nama Penyakit</th>
      <th>Gejala</th>
      <th>Opsi</th>
    </tr>
    </thead>
    <tbody>';
	$no=1;
	while($r=mysqli_fetch_assoc($query)){
    $id_penyakit_kucing=$r['id_penyakit_kucing'];
    $sql2="SELECT id_gejala from rule where id_penyakit_kucing='$id_penyakit_kucing'";
    $query2=mysqli_query($koneksi,$sql2);
    $count=mysqli_num_rows($query2);
	  echo "<tr>";
		//echo "<td>$no</td>";
    echo "<td style='vertical-align : middle; text-align:center;' rowspan='$count'>".$r['id_penyakit_kucing']."</td>";
    echo "<td style='vertical-align : middle; text-align:center;' rowspan='$count'>".$r['nama_penyakit_kucing']."</td>";
    $no=0;
    while($r2=mysqli_fetch_assoc($query2)){
      $id_gejala=$r2['id_gejala'];
      $sql3="SELECT nama_gejala from gejala where id_gejala='$id_gejala'";
      $query3=mysqli_query($koneksi,$sql3);
      while($r3=mysqli_fetch_assoc($query3)){
        if($no>0){
          echo '<tr>';
          echo "<td>".$r3['nama_gejala']."</td>";
        }else{
          echo "<td>".$r3['nama_gejala']."</td>";
          echo '<td style="vertical-align : middle; text-align:center;" rowspan='.$count.'><a href="index.php?m=rule&s=edit&idr='.$r['id_penyakit_kucing'].'"><i class="fa fa-edit"></i></a> | <a href="index.php?m=rule&s=hapus&idr='.$r['id_penyakit_kucing'].'" onclick="return confirm(\'Yakin Akan dihapus?\')"><i class="fa fa-trash-alt"></i></a></td>';
        }
      }
      $no++;
    }
    echo "</tr>";

		//$no++;
	}
}
?>
                </tbody>
                <tfoot>
                <tr bgcolor="#ccc">
                  <th>Kode</th>
                  <th>Nama Penyakit</th>
                  <th>Gejala</th>
                  <th>Opsi</th>
                </tr>
                </tfoot>
              </table>
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
