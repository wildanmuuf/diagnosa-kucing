<?php
include_once "sesi.php";

$modul=(isset($_GET['s']))?$_GET['s']:"awal";
switch($modul){
	case 'awal': default: include "modul/solusi/tampil.php"; break;
	case 'tambah': include "modul/solusi/tambah.php"; break;
	case 'simpan': include "modul/solusi/simpan.php"; break;
	case 'edit': include "modul/solusi/edit.php"; break;
	case 'update': include "modul/solusi/update.php"; break;
	case 'hapus': include "modul/solusi/hapus.php"; break;
	case 'detail': include "modul/solusi/detail.php"; break;
}
?>
