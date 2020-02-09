<?php
include_once "sesi.php";

$modul=(isset($_GET['s']))?$_GET['s']:"awal";
switch($modul){
	case 'awal': default: include "modul/penyakit_kucing/tampil.php"; break;
	case 'detail': include "modul/penyakit_kucing/detail.php"; break;
}
?>
