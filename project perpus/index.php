<?php
session_start();
if (isset($_SESSION['login'])) {
    header("Location:dashboard.php");
    exit;
}
require_once('db/connection.php');
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $check_user = query("SELECT * FROM users WHERE username = '$username'");

    if (mysqli_num_rows($check_user) === 1) {
        //cek password
        $data = mysqli_fetch_assoc($check_user);
        if (password_verify($password, $data['password'])) {
            //session login
            $_SESSION['username'] = $username;
            $_SESSION['login'] = true;
            header("Location:dashboard.php");
            exit;
        }
    }
    $err = true;
}
?>



<!DOCTYPE html>
<html lang="en">
<?php include("include/header.php");
if (isset($err)) {
    echo "<script>alert('Username / Password Salah')</script>";
}
?>

<body class="container-fluid g-0 mb-0 min-vh-100 d-flex flex-column justify-content-between">
    <?php include("include/navbar.php"); ?>

    <section class="vh-100 bg-primary-color">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong bg-light-primary-color" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <h3 class="mb-5">Sign in</h3>

                            <form method="post">
                                <div class="form-outline mb-4">
                                    <input placeholder="Username" type="text" id="typeusernameX-2" class="form-control form-control-lg" name="username" required />
                                </div>
                                <div class="form-outline mb-4">
                                    <input placeholder="Password" type="password" id="typePasswordX-2" class="form-control form-control-lg" name="password" required />
                                </div>

                                <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit">Login</button>
                            </form>
                            <div>
                                <p class="mb-0 mt-3">Don't have an account? <a href="register.php" class="text-black-50 fw-bold">Sign Up</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include("include/footer.php"); ?>
</body>

</html>