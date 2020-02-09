<?php
  include 'sambungan.php';

    //post to var
    $name = $_POST['nama'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST["password"]);
    $tglLahir = $_POST['tgl_lahir'];
    $jenisKelamin = $_POST['jns_kelamin'];
    $alamat = $_POST['alamat'];
    $valid = false;
    if(empty($name)){
      $valid = false;
    }
    // cek email dan username sudah ada
    $cekuser = mysqli_query($koneksi,"SELECT * FROM pengguna WHERE username = '$username' or email='$email'");
    if(mysqli_num_rows($cekuser)>0){
      echo "<script>alert('Username sudah ada')</script>";
      echo "<meta http-equiv='refresh' content='1 url=registrasi.php'>";
    }else{

      //sql statement
      $query = mysqli_query($koneksi,"INSERT INTO pengguna (nama_pengguna, username, password, tgl_lahir, email, alamat_pengguna, jenis_kelamin, no_telp, hak_akses)
              VALUES ('$name', '$username', '$password', '$tglLahir', '$email', '$alamat',  '$jenisKelamin',  '23333', 'pengguna')");
      if($query){
            echo "<script>alert('Berhasil Mendaftar')</script>";
            echo "<meta http-equiv='refresh' content='1 url=login.php'>";
      }else{
            echo "<script>alert('Gagal')</script>";
      }
    }
 ?>
