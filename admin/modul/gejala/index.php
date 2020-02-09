<?php
include_once "sesi.php";

$modul=(isset($_GET['s']))?$_GET['s']:"awal";
switch($modul){
	case 'awal': default: include "modul/gejala/tampil.php"; break;
	case 'tambah': include "modul/gejala/tambah.php"; break;
	case 'simpan': include "modul/gejala/simpan.php"; break;
	case 'edit': include "modul/gejala/edit.php"; break;
	case 'update': include "modul/gejala/update.php"; break;
	case 'hapus': include "modul/gejala/hapus.php"; break;
	case 'detail': include "modul/gejala/detail.php"; break;
	case 'profil': include "modul/gejala/profil.php"; break;
}
?>
