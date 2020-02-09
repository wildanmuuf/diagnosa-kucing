<?php
include_once "sesi.php";

$modul=(isset($_GET['s']))?$_GET['s']:"awal";
switch($modul){
	case 'awal': default: include "modul/pengguna/profil.php"; break;
	case 'edit': include "modul/pengguna/edit.php"; break;
	case 'update': include "modul/pengguna/update.php"; break;
	case 'profil': include "modul/pengguna/profil.php"; break;
	case 'pilihan': include "modul/pengguna/pilihan.php"; break;
}
?>
