<?php
session_start();
include_once "sesi.php";
$modul=(isset($_GET['m']))?$_GET['m']:"awal";
$jawal="Administrator";
switch($modul){
	case 'awal': default: $aktif="Beranda"; $judul="Beranda $jawal"; include "awal.php"; break;
	case 'pengguna': $aktif="Pengguna"; $judul="Modul Pengguna $jawal"; include "modul/pengguna/index.php"; break;
	case 'jenis_kucing': $aktif="Jenis Kucing"; $judul="Modul Jenis Kucing $jawal"; include "modul/jenis_kucing/index.php"; break;
	case 'gejala': $aktif="Gejala"; $judul="Modul Gejala $jawal"; include "modul/gejala/index.php"; break;
	case 'penyakit_kucing': $aktif="Penyakit Kucing"; $judul="Modul Penyakit Kucing $jawal"; include "modul/penyakit_kucing/index.php"; break;
	case 'tips_kucing': $aktif="Tips Kucing"; $judul="Modul Tips Kucing $jawal"; include "modul/tips_kucing/index.php"; break;
	case 'rule': $aktif="Rule"; $judul="Modul Rule $jawal"; include "modul/rule/index.php"; break;
	case 'solusi': $aktif="Solusi"; $judul="Modul Solusi $jawal"; include "modul/solusi/index.php"; break;
}

?>
