<?php
include_once "sesi.php";

$modul=(isset($_GET['s']))?$_GET['s']:"awal";
switch($modul){
	case 'awal': default: include "modul/jenis_kucing/tampil.php"; break;
	case 'tambah': include "modul/jenis_kucing/tambah.php"; break;
	case 'simpan': include "modul/jenis_kucing/simpan.php"; break;
	case 'edit': include "modul/jenis_kucing/edit.php"; break;
	case 'update': include "modul/jenis_kucing/update.php"; break;
	case 'hapus': include "modul/jenis_kucing/hapus.php"; break;
	case 'detail': include "modul/jenis_kucing/detail.php"; break;
	case 'profil': include "modul/jenis_kucing/profil.php"; break;
}
?>
