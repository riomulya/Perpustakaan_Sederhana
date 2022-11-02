<?php include("include/session_login.php"); ?>

<!DOCTYPE html>
<html lang="en">

<?php include("include/header.php"); ?>

<body class="container-fluid g-0 mb-0 min-vh-100 d-flex flex-column justify-content-between">
    <?php include("include/navbar.php"); ?>

    <div class="h-100 main bg-secondary d-flex" style="--bs-bg-opacity: .8;">

        <?php include("include/sidebar.php"); ?>

        <main class="content w-75 bg-light ps-2 vh-100">
            <div class="main_head mt-3 me-2">Beranda</div>
            <div class="main_content text-center mt-5">
                <h2 class=" text-secondary mb-5">Selamat Datang di Sistem Informasi Perpustakaan</h2>
                <h3 class="text-danger text-center ">"Membaca Adalah Jendela Dunia"</h3>
            </div>
        </main>
    </div>
    <?php include("include/footer.php"); ?>
</body>

</html>