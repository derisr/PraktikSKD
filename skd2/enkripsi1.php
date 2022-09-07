<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action= "enkripsi1.php" method="post">
        <input type="text" name="input">
        <input type="submit" value="Enkripsi" />
    </form>

    <?php
    function enkripsi(){
        $input=$_POST["input"];

        $key = array(
            'a' => '~', 'i' => '$', 'u' => '^', 'e' => '#', 'o' => '+',
            'A' => '!', 'I' => '%', 'U' => '_', 'E' => '=', 'O' => '*'
        );

        //$input = strtolower($input);

        $enkripsi = str_replace(array_keys($key), $key, $input);
        echo "<br><br>";
        echo "Kata yang dienkripsi adalah: ", $input;
        echo "<br><br>";
        echo "Hasil enkripsi adalah: ", $enkripsi;
    };
    ?>

    <?php
    if($_SERVER['REQUEST_METHOD']=='POST')
                {
                    enkripsi();
                }
    ?>
</body>
</html>