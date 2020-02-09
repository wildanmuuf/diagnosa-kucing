<?php
include_once "sesi.php";

$modul=(isset($_GET['s']))?$_GET['s']:"awal";
switch($modul){
	case 'awal': default: include "modul/penyakit_kucing/tampil.php"; break;
	case 'tambah': include "modul/penyakit_kucing/tambah.php"; break;
	case 'simpan': include "modul/penyakit_kucing/simpan.php"; break;
	case 'edit': include "modul/penyakit_kucing/edit.php"; break;
	case 'update': include "modul/penyakit_kucing/update.php"; break;
	case 'hapus': include "modul/penyakit_kucing/hapus.php"; break;
	case 'detail': include "modul/penyakit_kucing/detail.php"; break;
	case 'profil': include "modul/penyakit_kucing/profil.php"; break;
}
?>
