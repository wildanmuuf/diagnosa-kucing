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
        <li class="active">Ubah</li>
      </ol>
    </section>
    <!-- Main content -->
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Form Ubah Rule</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
    <?php
    $id=$_GET['idr'];
    include "../sambungan.php";
    $sql="SELECT * FROM penyakit_kucing WHERE id_penyakit_kucing='$id'";
    $query=mysqli_query($koneksi,$sql);
    $r=mysqli_fetch_assoc($query);
    ?>
			 <!--Mulai buat form-->
			 <form action="?m=rule&s=update" method="post" enctype="multipart/form-data">
         <input type="text" hidden name="id_penyakit_kucing" value="<?php echo $id?>"/>
              <table id="pilkasis1" class="table table-bordered table-hover table-striped">
                <tbody>
                  <tr>
                    <td>Penyakit Kucing</td>
                    <td colspan="2"><?php echo $r['nama_penyakit_kucing']?></td>
                  </tr>
          <?php
            include "../sambungan.php";
            $qGejala = "SELECT* from gejala";
            $query=mysqli_query($koneksi,$qGejala);
            $count=mysqli_num_rows($query);
          ?>
          <tr>
            <td width=174 rowspan="<?php echo $count;?>">Gejala</td>
            <?php

              while ($rGejala=mysqli_fetch_assoc($query)) {
                $data_gejala=(explode(",",$rGejala['id_gejala']));

                $sqlCheck = "SELECT id_gejala from rule where id_penyakit_kucing='".$r['id_penyakit_kucing']."' and id_gejala='".$rGejala['id_gejala']."'";
                $queryCheck=mysqli_query($koneksi,$sqlCheck);
                $checked="";
                while($rCheck=mysqli_fetch_assoc($queryCheck)){
                    $data_rule=(explode(",",$rCheck['id_gejala']));
                    foreach ($data_rule as $value) {
                      if (in_array($value, $data_gejala)){
                        $checked ="checked";
                      }
                    }
                }

                echo '<td><label class="checkbox-inline">';
                echo '<input type="checkbox" name="gejala[]" value="'.$rGejala["id_gejala"].'" '.$checked.'/>'.$rGejala["nama_gejala"].'';
                echo '</label> </td>';
                if($count!=0){
                  echo '</tr>';
                }
              }
            ?>

          </tr>
					<tr>
						<td colspan=3>
              <button type="submit" name="simpan" class="btn btn-large btn-primary" ><i class="fa fa-save"></i> Simpan</button>&nbsp;&nbsp;&nbsp;
              <button type="reset" name="reset" class="btn btn-large btn-warning" ><i class="fa fa-undo"></i> Bersihkan</button>&nbsp;&nbsp;&nbsp;
						<a href="?m=rule" class="btn btn-large btn-danger"><i class="fa fa-backward"></i> Kembali</a></td>
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
