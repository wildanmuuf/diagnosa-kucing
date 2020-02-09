<?php
session_start();
include_once "sesi.php";
$modul=(isset($_GET['m']))?$_GET['m']:"awal";
$jawal="Pengguna";
switch($modul){
	case 'awal': default: $aktif="Beranda"; $judul="Beranda $jawal"; include "awal.php"; break;
	case 'penyakit_kucing': $aktif="Penyakit_Kucing"; $judul="Penyakit 	Kucing $jawal"; include "modul/penyakit_kucing/index.php";break;
	case 'pengguna': $aktif="Pengguna"; $judul="Profil $jawal"; include "modul/pengguna/index.php"; break;
	case 'diagnosa': $aktif="Diagnosa"; $judul="Diagnosa $jawal"; include "modul/diagnosa/index.php"; break;
	case 'kucing': $aktif="Kucing"; $judul="Modul Kucing $jawal"; include "modul/kucing/index.php"; break;
	case 'jenis_kucing': $aktif="Jenis_Kucing"; $judul="Jenis Kucing $jawal"; include "modul/jenis_kucing/index.php"; break;
}

?>
