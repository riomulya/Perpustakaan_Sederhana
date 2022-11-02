<?php
include("include/session_login.php");
require("db/connection.php");
$get_transaksi = $_GET['no_transaksi'];
$get_data = read("SELECT * FROM peminjaman_buku WHERE no_transaksi = '$get_transaksi'")[0];
if (isset($_POST['submit'])) {
    $no_transaksi = $_POST['no_transaksi'];
    $deadline = $_POST['deadline'];
    $pengembalian = $_POST['pengembalian'];
    //update
    $update = query("UPDATE peminjaman_buku SET pengembalian = '$pengembalian',deadline = '$deadline' WHERE no_transaksi = '$get_transaksi'");
    header("Location: transaksi_peminjaman.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<?php include("include/header.php"); ?>

<body class="container-fluid g-0 mb-0 min-vh-100 d-flex flex-column justify-content-between">
    <?php include("include/navbar.php"); ?>

    <div class="h-100 main bg-secondary d-flex" style="--bs-bg-opacity: .8;">

        <?php include("include/sidebar.php"); ?>

        <main class="content w-75 bg-light ps-2 vh-100">
            <div class="main_head mt-3 me-2">Edit Data Transaksi</div>
            <div class="main_content mt-5">
                <form class="border border-info rounded" method="post">
                    <table>
                        <tr>
                            <td><label for="inputNoTransaksi">No Transaksi </label></td>
                            <td>
                                <input type="text" name="no_transaksi" id="inputNoTransaksi" class="input-group-text" value="<?= $get_data['no_transaksi'] ?>" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="inputID" class="mt-5">ID Anggota</label></td>
                            <td>
                                <input type="text" name="id_anggota" id="inputID" class="input-group-text mt-5" value="<?= $get_data['id_anggota'] ?>" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="inputDeadline" class="mt-5">Deadline Pengembalian </label></td>
                            <td>
                                <input type="date" name="deadline" id="inputDeadline" class="input-group-text mt-5" value="<?= $get_data['deadline'] ?>" required>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="inputPengembalian" class="mt-5">Tanggal Pengembalian </label></td>
                            <td>
                                <input type="date" name="pengembalian" id="inputPengembalian" class="input-group-text mt-5" value="<?= $get_data['pengembalian'] ?>" required>
                            </td>
                        </tr>
                    </table>
                    <input type="submit" value="Submit" name="submit" class="btn btn-outline-primary ms-5 mt-5 mb-3" onclick="return confirm('Data Sudah Benar?')">
                    <button class="btn btn-outline-danger ms-5 mt-5 mb-3" onclick="return confirm('Delete Data?')"><a href="delete_transaksi.php?no_transaksi=<?= $get_data['no_transaksi'] ?>">Hapus</a></button>
                    </button>
                </form>
            </div>
        </main>
    </div>
    <?php include("include/footer.php"); ?>

</body>

</html>