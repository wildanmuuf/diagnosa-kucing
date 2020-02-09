<?php
include_once "sesi.php";

$modul=(isset($_GET['s']))?$_GET['s']:"awal";
switch($modul){
	case 'awal': default: include "modul/rule/tampil.php"; break;
	case 'tambah': include "modul/rule/tambah.php"; break;
	case 'simpan': include "modul/rule/simpan.php"; break;
	case 'edit': include "modul/rule/edit.php"; break;
	case 'update': include "modul/rule/update.php"; break;
	case 'hapus': include "modul/rule/hapus.php"; break;
}
?>
