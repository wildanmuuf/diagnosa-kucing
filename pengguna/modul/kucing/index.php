<?php
include_once "sesi.php";

$modul=(isset($_GET['s']))?$_GET['s']:"awal";
switch($modul){
	case 'awal': default: include "modul/kucing/tampil.php"; break;
	case 'tambah': include "modul/kucing/tambah.php"; break;
	case 'simpan': include "modul/kucing/simpan.php"; break;
	case 'edit': include "modul/kucing/edit.php"; break;
	case 'update': include "modul/kucing/update.php"; break;
	case 'hapus': include "modul/kucing/hapus.php"; break;
	case 'detail': include "modul/kucing/detail.php"; break;
	case 'profil': include "modul/kucing/profil.php"; break;
}
?>
