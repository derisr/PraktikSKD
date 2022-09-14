<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SKD TUGAS 3</title>
</head>
<body>
    <?php
    if (isset($_POST['enkripsi'])) { //mengeksekusi enkripsi
        function cipherText ($char, $key)
        { //tempat menampung data yang diinputkan 
            if (ctype_alpha($char)) { //cek inputan berupa alfabet atau tidak
                $nilai = ord(ctype_upper($char) ? 'A' : 'a');
                $ch = ord($char); //konversi char (alfabet) yang diinput ke ASCII
                $modulus = fmod($ch + $key - $nilai, 26); //perhitungan modulus
                $hasil = chr($modulus + $nilai); //penambahan hasil modulus dengan 26(jumlah alfabet)
                return $hasil; //mengembalikan nilai hasil
            }
            else //jika yang diinput bukan alfabet maka dikembalikan ke nilai char
            {
                return $char;
            }
        }

        //fungsi enkripsi
        function enkripsi ($input, $key)
        {
            $output = ""; //variable yang menampung string
            $chars = str_split($input); //variable penampung data

            foreach ($chars as $char) { // menampilakan array
                $output .= cipherText ($char, $key); //hasil function cipher
         
            }
            return $output; //mengembalikan nilai
        }

        //fungsi dekripsi
        function dekripsi ($input, $key)
        {
            return enkripsi($input, 26 - $key);
        }

    }
        //eksekusi enkripsi
    else if (isset($_POST['dekripsi'])) {
        function cipherText ($char, $key)
        { //fungsi cipher
            if (ctype_alpha($char)) {
                $nilai = ord(ctype_upper($char) ? 'A' : 'a');
                $ch = ord($char);
                $modulus = fmod($ch + $key - $nilai, 26);
                $hasil = chr($modulus + $nilai);
                return $hasil;
            }
            else
            {
                return $char;
            }
        }

        //buat fungsi enkripsi
        function enkripsi($input, $key)
        {
            $output = ""; //variabel yang menampung string
            $chars = str_split($input); //variabel untuk menampung data array
            //berisi dengan data input yang dikonversi ke dalam bentuk array
            foreach ($chars as $char) { //perulangan untuk menampilkan data array
                $output .= cipherText($char, $key); //berisi hasil function cipher
            }
            return $output; //mengembalikan nilai output
        }
        
        //buat fungsi dekripsi
        function dekripsi($input, $key)
        {
            return enkripsi($input, 26 - $key);
        }
    }
    ?>

    <!-- FORM -->
    <center>
    <h2>Sistem Keamanan Data</h2>
    <form name="caesar" method="post">
        <!-- Input Text -->
        <div>
            <input type="text" name="plain" placeholder="Input Text">
        </div>
        <!-- Input Key -->
        <div>
            <input type="number" name="key" placeholder="Input Key">
        </div>
        <div>
            <table>
                <tr>
                    <!-- Button Enkripsi dan Dekripsi -->
                    <td><input type="submit" name="enkripsi" value="Enkripsi"></td>
                    <td><input type="submit" name="dekripsi" value="Dekripsi"></td>
                </tr>
            </table>
        </div>
    </form>
</div>

<br>

<!-- Hasil Enkripsi / Dekripsi -->
<b>Hasil akan Tertampil di Bawah Ini</b>
<div>
    <table>
        <tr>
            <!-- Menampilkan Teks yang Dimasukkan -->
            <td> Teks yang dimasukkan </td>
                <td>:<b>
                    <?php if (isset($_POST['enkripsi'])) { 
                            echo dekripsi(enkripsi($_POST['plain'], $_POST['key']), $_POST['key']); //memanggil fungsi dekripsi yang sebelumnya dienkripsi dan menampilkannya
                        }
                        if (isset($_POST['dekripsi'])) { 
                            echo enkripsi(dekripsi($_POST['plain'], $_POST['key']), $_POST['key']); //memanggil fungsi enripsi yang sebelumnya didekripsi dan menampilkannya
                        } 
                    ?>
                </b></td>
        </tr>
        <tr>
            <!-- Menampilkan Output Enkripsi / Dekripsi -->
            <td> Hasil Teks </td>
                <td>:<b>
                    <?php if (isset($_POST['enkripsi'])) { 
                            echo enkripsi($_POST['plain'], $_POST['key']); //memanggil fungsi enkripsi dan menampilkannya
                        }
                        if (isset($_POST['dekripsi'])) { 
                            echo dekripsi($_POST['plain'], $_POST['key']); //memanggil fungsi dekripsi dan menampilkannya
                        } 
                    ?>
                </b></td>
        </tr>
        <tr>
            <!-- Menampilkan Key yang dimasukkan -->
            <td> Key yang dimasukkan </td>
                <td>:<b>
                    <?php if (isset($_POST['enkripsi'])) { 
                            echo $_POST['key']; //memanggil dan menampilkan key atau kunci geser
                        }
                        if (isset($_POST['dekripsi'])) { 
                            echo $_POST['key']; //memanggil dan menampilkan key atau kunci geser
                        } 
                    ?>
                </b></td>
        </tr>
    </table>
    </center>
</div>

    <script>
        $(function() {
            $('.select2').select2()

        })
    </script>

</body>
</html>