<?php
include_once "sesi.php";

$modul=(isset($_GET['s']))?$_GET['s']:"awal";
switch($modul){
	case 'awal': default: include "modul/diagnosa/riwayat.php"; break;
	case 'mulai': include "modul/diagnosa/mulai.php"; break;
	case 'simpan': include "modul/diagnosa/simpan.php"; break;
	case 'hasil': include "modul/diagnosa/hasil.php"; break;
	case 'kembali': include "modul/diagnosa/kembali.php"; break;
}
?>
