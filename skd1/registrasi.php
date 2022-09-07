<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link rel="stylesheet" href="styles.css" type="text/css"></link>
    <style>
        label {
            display: block;
        }
    </style>
</head>
<body>
    <div id="wrapper">
            <h1>SILAKAN BUAT AKUN ANDA</h1>
            <form action="" method="POST">
                <ul>
                    <li>
                        <label for="username">Username :</label>
                        <input type="text" name="username" id="username" required>
                    </li>
                    <li>
                        <label for="password">Password :</label>
                        <input type="password" name="password" id="password" required>
                    </li>
                    <li>
                        <button type="submit" name="register">Register!</button>
                    </li>
                    <li>
                        Sudah punya akun? <a href="login.php">Login</a> sekarang!
                    </li>
                </ul>
            </form>
        </div>
</body>
</html>

<?php
require 'functions.php';
if (isset($_POST["register"])){
    if (registrasi($_POST) > 0) {
        ECHO "<script>
            alert('User baru berhasil ditambahkan!');window.location.href='login.php'
            </script>";
    } else {
        echo mysqli_error($conn);
    }
}
?>