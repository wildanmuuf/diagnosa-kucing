<?php
include_once "sesi.php";

$modul=(isset($_GET['s']))?$_GET['s']:"awal";
switch($modul){
	case 'awal': default: include "modul/pengguna/tampil.php"; break;
	case 'detail': include "modul/pengguna/detail.php"; break;
}
?>
