<?php
include_once "sambungan.php";
include "header.php";
?>
<?php
$nama="";
$id_user ="";
if(!empty($_SESSION['id_pengguna'])){
  $id_user = $_SESSION['id_pengguna'];
  $sql="SELECT * FROM pengguna where id_pengguna='$id_user'";
  $query=mysqli_query($koneksi,$sql);
  $r=mysqli_fetch_array($query);
  $nama = $r['nama_pengguna'];
}
?>

  <title>Diagnosa Penyakit Kucing</title>
</head>
<body>
<div class= "wrap">
  <div class="header pb-2">
        <div class="container-fluid mt-1">
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-8 mx-auto main-title">
                        <p class="welcome-text text-center mx-auto mt-5" >Selamat Datang <?php echo $nama ?> di Cat Life</p>
                    </div>
                    <div class="col-sm-2"></div>
                </div>
                    <div class="col-sm-2"></div>
                </div>

        </div>
    </div>

    <!-- section-1 -->
    <div class="container-fluid section1">
          <div  class="row pt-2"></div>
          <div class="row pt-5 pb-5">
              <div class="col-sm-12 text-center mt-5 mb-4">
                  <h3 class="s1-title">Pilih Layanan Anda</h3>
             </div>
          </div>

          <div class="row text-center pb-5">
            <div class="col-sm-2" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
              <?php
              if(!isset($_SESSION['username'])){
                echo '<a href="login.php">
                  <p><img src="images/icon/4.png" class="icon"></p>
                  <p class="pb-1 subtitle">Masuk</p></a>
                  <p class="pb-2 sub">Silahkan masuk untuk dapat menggunakan layanan dibawah ini!</p>';

              }else{
                echo '<a href="pengguna/index.php?m=pengguna">
                  <p><img src="images/icon/4.png" class="icon"></p>
                  <p class="pb-1 subtitle">Profile</p></a>
                  <p class="pb-2 sub">Lihat profile Anda disini!</p>';
              }
              ?>

            </div>
            <div class="col-sm-3" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
              <a href="pengguna/index.php?m=penyakit_kucing">
                <p><img src="images/icon/2.png" class="icon"></p>
                <p class="pb-1 subtitle">Penyakit Kucing</p></a>
                <p class="pb-2 sub">Lihat daftar penyakit kucing yang dapat di diagnosa disini!</p>
            </div>
            <div class="col-sm-3" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
              <a href="pengguna/index.php">
                <p><img src="images/icon/1.png" class="icon"></p>
                <p class="pb-1 subtitle">Diagnosa Penyakit</p></a>
                <p class="pb-2 sub">Diagnosakan penyakit kucingmu disini!</p>
            </div>
            <div class="col-sm-2" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
              <a href="pengguna/index.php?m=jenis_penyakit">
                <p><img src="images/icon/3.png" class="icon"></i></p>
                <p class="pb-1 subtitle">Jenis Kucing</p></a>
                <p class="pb-2 sub">Cari tahu jenis apa kucingmu.</p>
            </div>
            <div class="col-sm-2" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
              <a href="pengguna/index.php?m=kucing">
                <p><img src="images/icon/logo 1.png" class="icon"></p>
                <p class="pb-1 subtitle">Kucing</p></a>
                <p class="pb-2 sub">Daftarkan kucingmu untuk di diagnosa</p>
            </div>
          </div>
    </div>

    <!-- section-3 -->
    <div class="container-fluid section3 pt-5 pb-5" >
       <div class="row pt-3">
         <div class="col-sm-12 text-center">
              <h3 class="news">Tips Kucing</h3>
         </div>
       </div>
       <div class="row pb-3">
          <div class="col-sm-12 text-center">
               <p class="news-p">Cari tahu cara merawat kucingmu dengan baik.</p>
          </div>
        </div>

        <div class="row mx-5 mt-5 mb-3 big-box">
          <?php
          include_once "sambungan.php";
          $foto="default.png";
          $sql="SELECT*FROM tips_kucing order by id_tips";
          $query=mysqli_query($koneksi,$sql);
          if(mysqli_num_rows($query)<=3){
          while($r=mysqli_fetch_array($query)){
            if(!empty($r['gambar_tips'])){
              $foto = $r['gambar_tips'];
            }
            echo '<div class="col-sm-4 px-4">
                    <ul class="list-group">';
            echo '<li class="list-group-item pb-4"><img src="./images/tips_kucing/'.$foto.'" alt="'.$r['id_tips'].'" height=200px/></li>
            <li class="list-group-item list-title pb-2">'.$r['judul'].'</strong></li>
            <li class="list-group-item content ">'.mb_strimwidth($r['keterangan'], 0, 200, '...').'</li>';

            echo'<br><a href="#" value="'.$r['id_tips'].'" data-toggle="modal"  data-target="#confirm'.$r['id_tips'].'">Baca Selengkapnya</a>

            <li class="list-group-item content mb-3"></li>';
            echo '</ul>';
            echo '<div id="confirm'.$r['id_tips'].'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="confirm'.$r['id_tips'].'" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
              <b><p class="modal-title">'.$r['judul'].'</p></b>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
            <img src="images/tips_kucing/'.$foto.'" height="80px" class="mx-auto d-block"/>
            <p>'.$r['keterangan'].'</p>
            </div>
            <div class="modal-footer"><center>
            <button class="btn btn-danger" type="button" data-dismiss="modal">Tutup</button></center>
            </div>
            </div>
            </div>
            </div>';
            echo '</div>';


          }
        }else{
          $sql="SELECT*FROM tips_kucing order by id_tips LIMIT 3";
          $query=mysqli_query($koneksi,$sql);
          while($r=mysqli_fetch_assoc($query)){
            if(!empty($r['gambar_tips'])){
              $foto = $r['gambar_tips'];
            }
            echo '<div class="col-sm-4 px-4">
                    <ul class="list-group">';
            echo '<li class="list-group-item pb-4"><img src="./images/tips_kucing/'.$foto.'" alt="'.$r['id_tips'].'" height=200px/></li>
            <li class="list-group-item list-title pb-2">'.$r['judul'].'</strong></li>
            <li class="list-group-item content ">'.mb_strimwidth($r['keterangan'], 0, 200, '...').'</li>';

            echo'<br><a href="#" value="'.$r['id_tips'].'" data-toggle="modal"  data-target="#confirm'.$r['id_tips'].'">Baca Selengkapnya</a>

            <li class="list-group-item content mb-3"></li>';
            echo '</ul>';
            echo '<div id="confirm'.$r['id_tips'].'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="confirm'.$r['id_tips'].'" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
              <b><p class="modal-title">'.$r['judul'].'</p></b>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
            <img src="images/tips_kucing/'.$foto.'" height="80px" class="mx-auto d-block"/>
            <p>'.$r['keterangan'].'</p>
            </div>
            <div class="modal-footer"><center>
            <button class="btn btn-danger" type="button" data-dismiss="modal">Tutup</button></center>
            </div>
            </div>
            </div>
            </div>';
            echo '</div>';
          }
          echo '</div>';


          echo '<div id="collapse-tips" class="collapse">';


          echo '<div class="row mx-4 mt-4 mb-4">';
          $sql4="SELECT*FROM tips_kucing where id_tips > 'T003'";
          $query4=mysqli_query($koneksi,$sql4);
          $fotos = "default.png";
          while($r4=mysqli_fetch_assoc($query4)){
            if(!empty($r4['gambar_tips'])){
              $fotos = $r4['gambar_tips'];
            }
            echo '<div class="col-sm-4 px-4">
                    <ul class="list-group">';
            echo '<li class="list-group-item pb-4"><img src="./images/tips_kucing/'.$fotos.'" alt="'.$r4['id_tips'].'" height=200px/></li>
            <li class="list-group-item list-title pb-2">'.$r4['judul'].'</strong></li>
            <li class="list-group-item content ">'.mb_strimwidth($r4['keterangan'], 0, 200, '...').'</li>';

            echo'<br><a href="#" value="'.$r['id_tips'].'" data-toggle="modal"  data-target="#confirm'.$r4['id_tips'].'">Baca Selengkapnya</a>

            <li class="list-group-item content mb-3"></li>';
            echo '</ul>';
            echo '<div id="confirm'.$r4['id_tips'].'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="confirm'.$r4['id_tips'].'" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
              <b><p class="modal-title">'.$r4['judul'].'</p></b>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
            <img src="images/tips_kucing/'.$foto.'" height="80px" class="mx-auto d-block"/>
            <p>'.$r4['keterangan'].'</p>
            </div>
            <div class="modal-footer"><center>
            <button class="btn btn-danger" type="button" data-dismiss="modal">Tutup</button></center>
            </div>
            </div>
            </div>
            </div>';

            echo '</div>';


          }

          echo '</div>';
        }




                  ?>
                </ul>


          </div>
          <div class="row pb-3">
          <div class="col-sm-12 text-center">';
            <input type="button" id="btn_tips" value="Tampilkan Lebih Banyak" class="btn btn-primary" data-toggle="collapse" href="#collapse-tips" aria-expanded="false" aria-controls="collapse-tips">
          </div>
          </div>
        </div>
    </div>

    <script>
    function handleClick()
    {
      this.value = (this.value == 'Tampilkan Lebih Banyak' ? 'Tampilkan Lebih Sedikit' : 'Tampilkan Lebih Banyak');
      if(this.value=='Tampilkan Lebih Sedikit'){
        $("#btn_tips").removeClass("btn btn-primary");
        $("#btn_tips").addClass("btn btn-danger");
      }else{
        $("#btn_tips").removeClass("btn btn-danger");
        $("#btn_tips").addClass("btn btn-primary");
      }
    }
    document.getElementById('btn_tips').onclick=handleClick;
    </script>

    <?php
    include "footer.php";
    ?>
