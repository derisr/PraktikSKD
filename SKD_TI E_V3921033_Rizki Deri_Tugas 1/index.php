<?php include("koneksi.php");



session_start();
require 'functions.php';


if (!isset($_SESSION["login"])){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HUMANITY</title>
    <link rel="stylesheet" href="font.css" type="text/css"></link>
    <link rel="stylesheet" href="styles.css" type="text/css"></link>
</head>
<style>
    .button {
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        }
        .button1 {background-color: #008CBA;} /* Blue */
</style>
<body>
    <script language="JavaScript" type="text/javascript">
        alert('Anda akan masuk dalam situs HUMANITY');
    </script>
    <header class="header">
        <nav class="navbar">
            <ul>
                <a href="index.php">HUMANITY</a>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <div id="wrapper">
        <center>
            <br><br>
            <h3>Selamat Datang di</h3>
            <h1>HUMANITY</h1>
            <br>

            <form action="">
                <p>
                    <h3>Password Anda</h3>
                    <h2><?php echo ucwords($_SESSION['pass'])?></h2>
                </p>
                <p>
                    <h3>Password Enkripsi</h3>
                    <h2><?php echo ucwords($_SESSION['password'])?></h2>
                </p>
            </form>
            
            <br><br>
            <p>HUMANITY adalah sebuah situs berbagi untuk rekan kita yang membutuhkan</p><br><br>
            <p><i>"Dan belanjakanlah sebagian dari apa yang telah Kami berikan kepadamu sebelum datang 
                kematian kepada salah seorang di antara kamu;<br> lalu ia berkata: 'Ya Rabb-ku, 
                mengapa Engkau tidak menangguhkan (kematian)-ku sampai waktu yang dekat,<br> 
                yang menyebabkan aku dapat bersedekah dan aku termasuk orang-orang yang saleh?" <br>
                (QS. Al-Munafiqun: 10) </i></p>
        </center>
    </div>

        
    <div id="footer">
        <center>
        <br><br><br><br><br>
        © 2022 ACCIOIDEA | CREATED BY RIZKI DERI
        </center>         
    </div>
</body>
</html>