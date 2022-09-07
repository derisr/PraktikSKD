<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rizki Deri - Kriptografi</title>
</head>
<body>
    <center>
    <h1>KRIPTOGRAFI</h1>
    ilmu dan seni untuk menjaga kerahasian pesan dengan cara menyandikannya <br>
    ke dalam bentuk yang tidak dapat dimengerti lagi maknanya.<hr>
    <br>
    <form action= "enkripsi.php" method="post">
        <h2>Convert Plaintext to Ciphertext</h2>
        <input type="text" name="input" placeholder = "masukkan plaintext" >
        <input type="submit" value="Enkripsi" />
    </form>
    <br>
    <form action= "dekripsi.php" method="post">
        <h2>Convert Ciphertext to Plaintext</h2>
        <input type="text" name="input" placeholder = "masukkan ciphertext" >
        <input type="submit" value="Deskripsi" />
    </form>
    </center>
</body>
</html>