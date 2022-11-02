<?php
include("include/session_login.php");
require('db/connection.php');
$no_transaksi = $_GET['no_transaksi'];
$delete = query("DELETE FROM peminjaman_buku WHERE no_transaksi= '$no_transaksi'");
header("Location:transaksi_peminjaman.php");
