<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dekripsi Converter</title>
</head>
<body>
    
</body>
</html>

<?php
function dekripsi(){
    $input=$_POST["input"];

    $key = array(
        '~'	=>	'a',
        '@'	=>	'b',
        '#'	=>	'c',
        '$'	=>	'd',
        '%'	=>	'e',
        '^'	=>	'f',
        '&'	=>	'g',
        '*'	=>	'h',
        '('	=>	'i',
        ')'	=>	'j',
        '_'	=>	'k',
        '+'	=>	'l',
        '='	=>	'm',
        '-'	=>	'n',
        '{'	=>	'o',
        '['	=>	'p',
        '}'	=>	'q',
        ']'	=>	'r',
        '|'	=>	's',
        ':'	=>	't',
        '"'	=>	'u',
        ';'	=>	'v',
        '<'	=>	'w',
        '>'	=>	'x',
        '?'	=>	'y',
        '/'	=>	'z'

    );

    //$input = strtolower($input);

    $dekripsi = str_replace(array_keys($key), $key, $input);
    echo "<center>";
    echo "<br><br>";
    echo "<h3>Kata yang didekripsi adalah: </h3>", $input;
    echo "<br><br>";
    echo "<h3>Hasil dekripsi adalah: </h3>", $dekripsi;
    echo "</center>";
};
?>

<?php
if($_SERVER['REQUEST_METHOD']=='POST')
            {
                dekripsi();
            }
?>