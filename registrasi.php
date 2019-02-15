<?php 
    require 'function/functions.php';

    if (isset($_POST["register"])) {
        if (registrasi($_POST) > 0) {
            echo "
            <script>
                alert('user baru berhasil ditambahkan!')
            </script>";
        } else {
            echo mysqli_error($koneksi);
        }
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
    <title>Catatan Keuangan - Registrasi</title>
</head>

<body>
    <div class="container-fluid">
        <div class="col-lg-5 area2">
            <h1 class="text-center" style="color: #545a5a;">Dompet-Qu</h1>
            <h2 class="text-center" style="color: #545a5a; font-family: Verdana, Geneva, Tahoma, sans-serif;">Semua mudah semua senang</h2>
            <div class="jumbotron box">
                <h2 class="text-center text-foot" style="color: #545a5a;">Registrasi</h2> <br>
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
                    
                    <div class="input-group form-group">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent border-right-0"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" name="password-confirm" class="form-control border-left-0" placeholder="Confirm Password" required>
                    </div>

                    <p>Sudah mempunyai akun? <a href="login.php">klik disini</a></p>
                    <button type="submit" name="register" class="btn btn-primary form-control">Daftar</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>