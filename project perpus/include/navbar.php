<?php
if (!isset($_SESSION['login'])) { ?>
    <div>
        <nav class="navbar bg-light-primary-color">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="icon/books.png" class="icon">
                </a>
                <span class="me-auto ms-auto fw-semibold text-center">
                    <span class="fs-4">Perpustakaan Umum</span>
                    <p class="me-auto ms-auto fw-light fs-6">
                        Jl lembah Abang NO.11, Telp:(021)5555555555
                    </p>
                </span>
            </div>
        </nav>
        <div class="divider-head bg-dark-color w-100">
        </div>
    </div>
<?php } else { ?>
    <div>
        <nav class="navbar bg-light-primary-color">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="icon/books.png" class="icon">
                </a>
                <span class="me-auto ms-auto fw-semibold text-center">
                    <span class="fs-4">Perpustakaan Umum</span>
                    <p class="me-auto ms-auto fw-light fs-6">
                        Jl lembah Abang NO.11, Telp:(021)5555555555
                    </p>
                </span>
            </div>
        </nav>
        <div class="divider-head bg-dark-color w-100 d-flex justify-content-between">
            <span class="ms-2">Halo <?= $_SESSION['username'] ?></span>
            <span><a class="logout me-2 link-danger" href="logout.php" onclick="return confirm('ingin keluar?')">Log Out</a></span>
        </div>
    </div>
<?php } ?>