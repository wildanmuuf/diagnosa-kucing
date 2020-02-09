<?php
include "header.php";
date_default_timezone_set('Asia/Jakarta');
?>
<?php
include_once "sambungan.php";
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
  <div class="header pb-5">
        <div class="container-fluid">
                <div class="row">
                  <div class="col-sm-2"></div>
                    <div class="col-sm-8 mx-auto main-title">
                        <p class="welcome-text text-center mx-auto mt-5" style="font-size:30px">Selamat Datang <?php echo $nama; ?> di Cat Life</p>
                    </div>
                    <div class="col-sm-2"></div>
                </div>
                    <div class="col-sm-2"></div>
                </div>

        </div>
    </div>

    <!-- section-1 -->
    <div class="container-fluid section1">
        <div class="row pt-5 pb-5">
            <div class="col-sm-12 text-center mt-5 mb-4">
                <h3 class="s1-title">Pilih Layanan Anda</h3>
           </div>
        </div>
        <div class="row text-center pb-5">
          <div class="col-sm-2"></div>
          <div class="col-sm-2" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
            <a href="login.php">
              <p><img src="images/icon/4.png" class="icon"></p>
              <p class="pb-1 subtitle">Masuk</p></a>
              <p class="pb-2 sub">Silahkan masuk untuk dapat menggunakan layanan dibawah ini!</p>
          </div>
          <div class="col-sm-2" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
            <a href="pengguna/index.php?m=penyakit_kucing">
              <p><img src="images/icon/2.png" class="icon"></p>
              <p class="pb-1 subtitle">Penyakit Kucing</p></a>
              <p class="pb-2 sub">Lihat daftar penyakit kucing yang dapat di diagnosa disini!</p>
          </div>
          <div class="col-sm-2" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
            <a href="pengguna/index.php">
              <p><img src="img/1.png" class="icon"></p>
              <p class="pb-1 subtitle">Diagnosa Penyakit</p></a>
              <p class="pb-2 sub">Diagnosakan penyakit kucingmu disini!</p>
          </div>
          <div class="col-sm-2" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
            <a href="pengguna/index.php?m=jenis_penyakit">
              <p><img src="img/3.png" class="icon"></i></p>
              <p class="pb-1 subtitle">Jenis Kucing</p></a>
              <p class="pb-2 sub">Cari tahu jenis apa kucingmu.</p>
          </div>
          <div class="col-sm-2" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
            <a href="pengguna/index.php?m=kucing">
              <p><img src="img/logo 1.png" class="icon"></p>
              <p class="pb-1 subtitle">Kucing</p></a>
              <p class="pb-2 sub">Daftarkan kucingmu untuk di diagnosa</p>
          </div>
          <div class="col-sm-2"></div>
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

        <div class="row mx-5 mt-5 mb-5">
          <?php
            include "sambungan.php";
            $sql="SELECT*FROM tips_kucing order by id_tips";
            $query=mysqli_query($koneksi,$sql);
            if(mysqli_num_rows($query)<=3){
              while($r=mysqli_fetch_assoc($query)){
                if(empty($r['gambar_tips'])){
                  $r['gambar_tips'] = "default.png";
                }
                echo '<div class="col-sm-4 px-4">';
                echo '<ul class="list-group">';
                echo '<li class="list-group-item pb-4"><img src="images/tips_kucing/'.$r['gambar_tips'].'"  alt="'.$r['id_tips'].'" height=200px /></li>';
                echo '<li class="list-group-item list-title pb-3"><strong>'.$r['judul'].'</strong></li>';
                $keterangan=mb_strimwidth($r['keterangan'], 0, 200, '...');
                echo '<li class="list-group-item content pb-4">'.$keterangan.'</li>';
                echo '<li class="list-group-item content mb-3">
                    <a href="#target" data-toggle="modal"> Read More</a>';

                echo '</li>';
                echo '<div class="modal fade target_'.$r['id_tips'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            ...
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                          </div>
                        </div>
                      </div>
                    </div>';
                echo '</ul>';
                echo '</div>';

              }
            }else{
              $sql="SELECT*FROM tips_kucing order by id_tips LIMIT 3";
              $query=mysqli_query($koneksi,$sql);
              while($r=mysqli_fetch_assoc($query)){
                if(empty($r['gambar_tips'])){
                  $r['gambar_tips'] = "default.png";
                }
                echo '<div class="col-sm-4 px-4">';
                echo '<ul class="list-group">';
                echo '<li class="list-group-item pb-4"><img src="images/tips_kucing/'.$r['gambar_tips'].'"  alt="'.$r['id_tips'].'" height=200px /></li>';
                echo '<li class="list-group-item list-title pb-3"><strong>'.$r['judul'].'</strong></li>';
                $keterangan=mb_strimwidth($r['keterangan'], 0, 200, '...');
                echo '<li class="list-group-item content pb-4">'.$keterangan.'</li>';
                echo '<li class="list-group-item content mb-3"><a href=#data> Read More</a></li>';
                echo '</ul>';
                echo '</div>';

              }
              echo '</div>';
              $sql4="SELECT*FROM tips_kucing where id_tips > 'T003'";
              $query4=mysqli_query($koneksi,$sql4);



              echo '<div class="row pb-3">';
              echo '<div class="col-sm-12 text-center">';
              echo '<input type="button" id="btn_tips" value="Tampilkan Lebih Banyak" class="btn btn-primary" data-toggle="collapse" href="#collapse-tips" aria-expanded="false" aria-controls="collapse-tips">';
              echo '</div>';
              echo '</div>';

              echo '<div id="collapse-tips" class="collapse">';


              echo '<div class="row mx-4 mt-4 mb-4">';
              while($r4=mysqli_fetch_assoc($query4)){
                if(empty($r4['gambar_tips'])){
                  $r4['gambar_tips'] = "default.png";
                }
                echo '<div class="col-sm-4 px-4">';
                echo '<ul class="list-group">';
                echo '<li class="list-group-item pb-4"><img src="images/tips_kucing/'.$r4['gambar_tips'].'"  alt="'.$r4['id_tips'].' "height=200px  /></li>';
                echo '<li class="list-group-item list-title pb-3"><strong>'.$r4['judul'].'</strong></li>';
                $keterangan=mb_strimwidth($r4['keterangan'], 0, 200, '...');
                echo '<li class="list-group-item content pb-4">'.$keterangan.'</li>';
                echo '<li class="list-group-item content pb-4"><a href=#data> Read More</a></li>';
                echo '</ul>';
                echo '</div>';

              }
              echo '</div>';
            }

          ?>

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
