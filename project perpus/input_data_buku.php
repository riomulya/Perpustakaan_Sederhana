<?php

include("include/session_login.php");
if (isset($_POST['submit'])) {
    require("db/connection.php");
    $isbn = $_POST["isbn"];
    $judul = $_POST["judul"];
    $penulis = $_POST["penulis"];
    $penerbit = $_POST["penerbit"];
    $tahun_terbit = $_POST["tahun_terbit"];
    $halaman = $_POST["halaman"];
    //insert
    $insert = query("INSERT INTO tbl_buku values('$isbn','$judul','$penulis','$penerbit','$tahun_terbit','$halaman')");
    header("Location: laporan_data_buku.php");
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
            <div class="main_head mt-3 me-2">Input Data Buku</div>
            <div class="main_content mt-5">
                <form class="border border-secondary" method="post">
                    <table>
                        <tr>
                            <td><label for="inputISBN">ISBN</label></td>
                            <td>
                                <input type="text" name="isbn" id="inputISBN" class="input-group-text ms-5" required>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="inputJudul" class="mt-5">Judul </label></td>
                            <td><input type="text" name="judul" id="inputJudul" class="input-group-text mt-5 ms-5" required>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="inputpenulis" class="mt-5">Penulis </label></td>
                            <td><input type="text" name="penulis" id="inputpenulis" class="input-group-text mt-5 ms-5" required>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="inputpenerbit" class="mt-5">Penerbit </label></td>
                            <td><input type="text" name="penerbit" id="inputpenerbit" class="input-group-text mt-5 ms-5" required>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="inputtahun_terbit" class="mt-5">Tahun terbit </label></td>
                            <td><input type="text" name="tahun_terbit" id="inputtahun_terbit" class="input-group-text mt-5 ms-5" required>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="inputhalaman" class="mt-5">Halaman </label></td>
                            <td><input type="text" name="halaman" id="inputhalaman" class="input-group-text mt-5 ms-5" required>
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