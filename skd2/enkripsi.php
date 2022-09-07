<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enkripsi Converter</title>
</head>
<body>
    
</body>
</html>

<?php
function enkripsi(){
    $input=$_POST["input"];

    $key = array(
        'a'	=>	'~', 
        'b'	=>	'@', 
        'c'	=>	'#', 
        'd'	=>	'$', 
        'e'	=>	'%', 
        'f'	=>	'^', 
        'g'	=>	'&', 
        'h'	=>	'*', 
        'i'	=>	'(', 
        'j'	=>	')', 
        'k'	=>	'_', 
        'l'	=>	'+', 
        'm'	=>	'=', 
        'n'	=>	'-', 
        'o'	=>	'{', 
        'p'	=>	'[', 
        'q'	=>	'}', 
        'r'	=>	']', 
        's'	=>	'|', 
        't'	=>	':', 
        'u'	=>	'"',
        'v'	=>	';', 
        'w'	=>	'<', 
        'x'	=>	'>', 
        'y'	=>	'?', 
        'z'	=>	'/'
    );

    //$input = strtolower($input);

    $enkripsi = str_replace(array_keys($key), $key, $input);
    echo "<center>";
    echo "<br><br>";
    echo "<h3>Kata yang dienkripsi adalah: </h3>", $input;
    echo "<br><br>";
    echo "<h3>Hasil enkripsi adalah: </h3>", $enkripsi;
    echo "</center>";
};
?>

<?php
if($_SERVER['REQUEST_METHOD']=='POST')
            {
                enkripsi();
            }
?>