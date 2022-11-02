<?php
include("include/session_login.php");
require("db/connection.php");
$get_id = read("SELECT id_anggota,nama FROM tbl_anggota");
if (isset($_POST['submit'])) {
    $no_transaksi = $_POST['no_transaksi'];
    $id = $_POST['id_anggota'];
    $get_nama = mysqli_query($db, "SELECT nama FROM tbl_anggota WHERE id_anggota = '$id'");
    $nama = mysqli_fetch_array($get_nama)[0];
    $deadline = $_POST['deadline'];
    $pengembalian = $_POST['pengembalian'];
    //insert
    $insert = query("INSERT INTO peminjaman_buku values('$no_transaksi','$id','$nama','$deadline','$pengembalian')");
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
            <div class="main_head mt-3 me-2">Tambah Data Transaksi</div>
            <div class="main_content mt-5">
                <form class="border border-info rounded" method="post">
                    <table>
                        <tr>
                            <td><label for="inputNoTransaksi">No Transaksi </label></td>
                            <td>
                                <input type="text" name="no_transaksi" id="inputNoTransaksi" class="input-group-text" required>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="inputID" class="mt-5">ID Anggota</label></td>
                            <td>
                                <select name="id_anggota" id="inputID" class="form-select mt-5" required>
                                    <?php
                                    foreach ($get_id as $id) { ?>
                                        <option value="<?= $id['id_anggota'] ?>"><?= $id['id_anggota'] ?> ( <?= $id['nama'] ?> ) </option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="inputDeadline" class="mt-5">Deadline Pengembalian </label></td>
                            <td>
                                <input type="date" name="deadline" id="inputDeadline" class="input-group-text mt-5" required>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="inputPengembalian" class="mt-5">Tanggal Pengembalian </label></td>
                            <td>
                                <input type="date" name="pengembalian" id="inputPengembalian" class="input-group-text mt-5">
                            </td>
                        </tr>
                    </table>
                    <input type="submit" value="Submit" name="submit" class="btn btn-outline-primary ms-5 mt-5 mb-3" onclick="return confirm('Data Sudah Benar?')">
                    </button>
                </form>
            </div>
        </main>
    </div>
    <?php include("include/footer.php"); ?>

</body>

</html>