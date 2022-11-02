<?php
include("include/session_login.php");
require('db/connection.php');
$isbn = $_GET['isbn'];
$delete = query("DELETE FROM tbl_buku WHERE isbn = '$isbn'");
header("Location:laporan_data_buku.php");
