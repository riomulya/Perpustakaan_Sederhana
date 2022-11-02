<?php
require_once('db/connection.php');
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $passwordConfirm = mysqli_real_escape_string($db, $_POST['passwordConfirm']);

    $check_username = mysqli_query($db, "SELECT username FROM users WHERE username = '$username'");
    if (mysqli_fetch_assoc($check_username)) {
        echo "<script>alert('Username Yang dipilih Sudah Terdaftar');</script>";
        return false;
    }

    if ($password !== $passwordConfirm) {
        echo "<script>alert('Password Tidak Sama');</script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);
    $add_user = mysqli_query($db, "INSERT INTO users VALUES('$username','$email','$password')");
    echo "<script>alert('Akun Berhasil Dibuat');</script>";
}

?>


<!DOCTYPE html>
<html lang="en">
<?php include("include/header.php"); ?>

<body class="container-fluid g-0 mb-0 min-vh-100 d-flex flex-column justify-content-between">
    <?php include("include/navbar.php"); ?>

    <section class="vh-100 bg-primary-color">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong bg-light-primary-color" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <h3 class="mb-5">Sign Up</h3>

                            <form method="post">
                                <div class="form-outline mb-4">
                                    <input placeholder="Username" type="text" id="typeusernameX-2" class="form-control form-control-lg" name="username" required />

                                </div>
                                <div class="form-outline mb-4">
                                    <input placeholder="Email" type="email" id="typeEmailX-2" class="form-control form-control-lg" name="email" required />
                                </div>

                                <div class="form-outline mb-4">
                                    <input placeholder="Password" type="password" id="typePasswordX-2" class="form-control form-control-lg" name="password" required />
                                </div>
                                <div class="form-outline mb-4">
                                    <input placeholder="Confirm Password" type="password" id="typePasswordConfirmX-2" class="form-control form-control-lg" name="passwordConfirm" required />
                                </div>

                                <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit" onclick="return confirm('Data Sudah Benar?');">Sign Up</button>
                            </form>
                            <div>
                                <p class="mb-0 mt-3">have an account? <a href="index.php" class="text-black-50 fw-bold">Login</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<?php include("include/footer.php"); ?>

</html>