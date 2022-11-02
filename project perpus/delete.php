<?php
include("include/session_login.php");
require('db/connection.php');
$id = $_GET['id'];
$delete = query("DELETE FROM tbl_anggota WHERE id_anggota = '$id'");
header("Location:laporan_data_anggota.php");
