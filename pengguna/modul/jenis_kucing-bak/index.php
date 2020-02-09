<?php
include_once "sesi.php";

$modul=(isset($_GET['s']))?$_GET['s']:"awal";
switch($modul){
	case 'awal': default: include "modul/jenis_kucing/tampil.php"; break;
	case 'detail': include "moduljenis_kucing/detail.php"; break;
		// code...
		break;
}
?>
