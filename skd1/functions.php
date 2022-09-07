<?php
// koneksi ke database
// urutannya string(nama host), username mysql, password, namadatabase
$conn = mysqli_connect("localhost", "root", "", "skd1");

function registrasi($data)
{
    global $conn;
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $passwordd = mysqli_real_escape_string($conn, $data["password"]);

    

    // cek username sudah ada apa belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)){
        echo "<script>
                alert('Username yang dipilih sudah terdaftar!');
                </script>";
                return false;
    
    
    }
  
    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan user baru ke database
    mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");

    return mysqli_affected_rows($conn);

}