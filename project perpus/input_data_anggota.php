<?php
include("include/session_login.php");
if (isset($_POST['submit'])) {
    require("db/connection.php");
    $id_anggota = $_POST["id_anggota"];
    $nama = $_POST["nama"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $alamat = $_POST["alamat"];
    //insert
    $insert = query("INSERT INTO tbl_anggota values('$id_anggota','$nama','$jenis_kelamin','$alamat')");
    header("Location: laporan_data_anggota.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<?php include("include/header.php"); ?>


<body class="container-fluid g-0 mb-0 min-vh-100 d-flex flex-column justify-content-between">
    <?php include("include/navbar.php"); ?>

    <div class="h-100 main bg-secondary d-flex main" style="--bs-bg-opacity: .8;">

        <?php include("include/sidebar.php"); ?>

        <main class="content w-75 bg-light ps-2 vh-100">
            <div class="main_head mt-3 me-2">Input Data Anggota</div>
            <div class="main_content mt-5">
                <form class="border border-secondary" method="post">
                    <table>
                        <tr>
                            <td><label for="inputID">ID Anggota </label></td>
                            <td>
                                <input type="text" name="id_anggota" id="inputID" class="input-group-text" required>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="inputNama" class="mt-5">Nama </label></td>
                            <td><input type="text" name="nama" id="inputNama" class="input-group-text mt-5" required>
                            </td>
                        </tr>
                        <tr>
                            <td><label class="mt-5">Jenis Kelamin </label></td>
                            <td>
                                <span class="form-check form-check-inline">
                                    <input class="form-check-input mt-5 ms-3" type="radio" id="pria" value="Pria" name="jenis_kelamin">
                                    <label class="form-check-label mt-5 ms-1" for="pria">
                                        Pria
                                    </label>
                                </span>
                                <span class="form-check form-check-inline">
                                    <input class="form-check-input mt-2 ms-3" type="radio" id="Wanita" value="Wanita" name="jenis_kelamin">
                                    <label class="form-check-label mt-2 ms-1" for="Wanita">
                                        Wanita
                                    </label>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td> <label for="inputAlamat" class="form-label mt-5">Alamat </label>
                            </td>
                            <td>
                                <textarea class="form-control mt-5" id="inputAlamat" rows="3" name="alamat"></textarea>
                            </td>
                        </tr>
                    </table>
                    <input type="submit" value="Submit" class="btn btn-outline-primary ms-5 mt-5 mb-3" name="submit">
                </form>
            </div>
        </main>
    </div>
    <?php include("include/footer.php"); ?>
</body>

</html>