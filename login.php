<?php 
    session_start();
    require 'function/functions.php';

    // cek cookie
    if ( isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
        $id = $_COOKIE['id'];
        $key = $_COOKIE['key'];

        // ambil username berdasarkan id
        $result = mysqli_query($koneksi, "SELECT username FROM user WHERE id = $id");
        $row = mysqli_fetch_assoc($result);

        // cek cookie dan username
        if ( $key === hash('sha256', $row['username']) ) {
            $_SESSION['login'] = true;
        }
    }

    if ( isset($_SESSION["login"]) ) {
        header("Location: index.php");
        exit;
    }

    if (isset($_POST["login"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $hasil = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");

        // cek username
        if ( mysqli_num_rows($hasil) === 1 ) {

            // cek password
            $row = mysqli_fetch_assoc($hasil);
            if (password_verify($password, $row["password"])) {
                // set session
                $_SESSION["login"] = true;

                // cek remember me
                if (isset($_POST['remember'])) {
                    // buat cookie
                    setcookie('id', $row['id'], time()+86400);
                    setcookie('key', hash('sha256', $row['username']), time()+86400);
                }
                header("Location: index.php");
                exit;
            }
        }

        $error = true;
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/favicon.png">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
        crossorigin="anonymous">
    <link rel="stylesheet" href="css/users.css">
    <title>Catatan Keuangan - Login</title>
</head>

<body>
    <div class="container-fluid">
        <div class="col-lg-5 area">
            <h1 class="text-center" style="color: #545a5a;">Dompet-Qu</h1>
            <h2 class="text-center" style="color: #545a5a; font-family: Verdana, Geneva, Tahoma, sans-serif;">Semua mudah semua senang</h2>
            <div class="jumbotron box">
                <h2 class="text-center text-foot" style="color: #545a5a;">Login Area</h2> <br>
                <?php if ( isset($error) ) : ?>
                        <p style="color: red; font-style: italic;">Username / password salah!</p>
                <?php endif; ?>
                <form action="" method="post">
                    
                    <div class="input-group form-group">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent border-right-0"><i class="fa fa-user"></i></span>
                        </div>
                        <input type="text" name="username" class="form-control border-left-0" placeholder="Username" required>
                    </div>
                    
                    <div class="input-group form-group">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent border-right-0"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" name="password" class="form-control border-left-0" placeholder="Password" required>
                    </div>

                    <div class="custom-checkbox float-left">
                        <input type="checkbox" name="remember" id="remember">
                        <label for="remember">Remember me</label>
                    </div>
                    <p class="text-right">Belum mempunyai akun? <a href="registrasi.php">klik disini</a></p>
                    <button type="submit" name="login" class="btn btn-primary form-control">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>