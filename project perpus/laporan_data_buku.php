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
            <div class="main_head mt-3 me-2">Laporan Data Buku</div>
            <div class="main_content mt-5">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">ISBN</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Penulis</th>
                            <th scope="col">Penerbit</th>
                            <th scope="col">Tahun Terbit</th>
                            <th scope="col">Halaman</th>
                            <th scope="col">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $index = 1;
                        require("db/connection.php");
                        $read = read("SELECT * FROM tbl_buku");
                        foreach ($read as $index => $data) { ?>
                            <tr>
                                <th scope="row"><?= $index + 1 ?></th>
                                <td><?= $data['isbn']; ?></td>
                                <td><?= $data['judul']; ?></td>
                                <td><?= $data['penulis']; ?></td>
                                <td><?= $data['penerbit']; ?></td>
                                <td><?= $data['tahun_terbit']; ?></td>
                                <td><?= $data['halaman']; ?></td>
                                <td>
                                    <button class="btn btn-outline-success me-2">
                                        <a href="edit_data_buku.php?isbn=<?= $data['isbn']; ?>">Edit</a>
                                    </button>
                                    <button class="btn btn-outline-danger" onclick="return confirm('Delete Data?')"><a href="delete_buku.php?isbn=<?= $data['isbn'] ?>">Hapus</a></button>
                                </td>
                            </tr>
                        <?php $index++;
                        }; ?>
                    </tbody>
                </table>
                <button class="btn btn-outline-success"><a href="export/export_buku.php">Excel Report</a></button>
            </div>
        </main>
    </div>
    <?php include("include/footer.php"); ?>
</body>

</html>

<?php


?>