<?php
include("include/session_login.php");
?>

<!DOCTYPE html>
<html lang="en">

<?php include("include/header.php"); ?>

<body class="container-fluid g-0 mb-0 min-vh-100 d-flex flex-column justify-content-between">
    <?php include("include/navbar.php"); ?>

    <div class="h-100 main bg-secondary d-flex" style="--bs-bg-opacity: .8;">

        <?php include("include/sidebar.php"); ?>

        <main class="content w-75 bg-light ps-2 vh-100 overflow-auto">
            <div class="main_head mt-3 me-2">Data Transaksi Peminjaman Buku</div>
            <div class="main_content mt-5">
                <button type="tambah_transaksi" class="mb-3 btn btn-outline-primary"><a href="tambah_data_transaksi.php">Tambah Transaksi</a></button>
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">No Transaksi</th>
                            <th scope="col">ID Anggota</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Deadline Pengembalian</th>
                            <th scope="col">Tanggal Pengembalian</th>
                            <th scope="col">Denda</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $index = 1;
                        require("db/connection.php");
                        $read = read("SELECT * FROM peminjaman_buku");
                        foreach ($read as $index => $data) { ?>
                            <tr>
                                <th scope="row"><?= $index + 1 ?></th>
                                <th scope="row"><a href="edit_data_transaksi.php?no_transaksi=<?= $data['no_transaksi'] ?>"><?= $data['no_transaksi'] ?></a></th>
                                <td><?= $data['id_anggota']; ?></td>
                                <td><?= strtoupper($data['nama']); ?></td>
                                <td><?= $data['deadline']; ?></td>
                                <?php if ($data['pengembalian'] == '0000-00-00') {
                                    $data['pengembalian'] = 'Belum dikembalikan'; ?>
                                    <td><?= $data['pengembalian']; ?></td>
                                <?php } else { ?>
                                    <td><?= $data['pengembalian']; ?></td>
                                <?php } ?>
                                <?php if ($data['pengembalian'] != '0000-00-00') {
                                    $datediff = strtotime($data['pengembalian']) - strtotime($data['deadline']);
                                    $days = round($datediff / (60 * 60 * 24));
                                    if ($days > 0) {
                                        $denda = $days * 1000;
                                ?>
                                        <td>RP <?= $denda; ?></td>
                                    <?php } elseif ($data['pengembalian'] == 'Belum dikembalikan') { ?>
                                        <td><?= $data['pengembalian']; ?></td>
                                    <?php } else { ?>
                                        <td>tidak didenda</td>
                                    <?php } ?>
                                <?php } ?>
                            </tr>
                        <?php $index++;
                        }; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
    <?php include("include/footer.php"); ?>
</body>

</html>

<?php


?>