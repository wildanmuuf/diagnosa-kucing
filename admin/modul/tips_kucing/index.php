<?php
include_once "sesi.php";

$modul=(isset($_GET['s']))?$_GET['s']:"awal";
switch($modul){
	case 'awal': default: include "modul/tips_kucing/tampil.php"; break;
	case 'tambah': include "modul/tips_kucing/tambah.php"; break;
	case 'simpan': include "modul/tips_kucing/simpan.php"; break;
	case 'edit': include "modul/tips_kucing/edit.php"; break;
	case 'update': include "modul/tips_kucing/update.php"; break;
	case 'hapus': include "modul/tips_kucing/hapus.php"; break;
	case 'detail': include "modul/tips_kucing/detail.php"; break;
	case 'profil': include "modul/tips_kucing/profil.php"; break;
}
?>
