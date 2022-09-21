<?php

// inisialisasi variable 
$pswd = "";
$code = "";
$error = "";
$valid = true;
$color = "#FF0000";

// jika form disubmit maka akan menjalankan:
if ($_SERVER['REQUEST_METHOD'] == "POST")
{
	// mendeklarasi fungsi enkripsi dan dekripsi
	require_once('vigenere.php');
	
	// mengatur variable
	$pswd = $_POST['pswd'];
	$code = $_POST['code'];
	
	// periksa apakah key sudah dimasukkan
	if (empty($_POST['pswd']))
	{
		$error = "Masukkan Key yang Digunakan!";
		$valid = false;
	}
	
	// periksa apakah teks sudah dimasukkan
	else if (empty($_POST['code']))
	{
		$error = "Masukkan beberapa teks untuk dienkripsi/didekripsi!";
		$valid = false;
	}
	
	// periksa apakah teks sudah dimasukkan
	else if (isset($_POST['pswd']))
	{
		if (!ctype_alpha($_POST['pswd']))
		{
			$error = "Key harus berisi huruf!";
			$valid = false;
		}
	}
	
	// input validasi
	if ($valid)
	{
		// jika tombol enkripsi diklik maka akan tampil :
		if (isset($_POST['encrypt']))
		{
			$code = encrypt($pswd, $code);
			$error = "Teks berhasil dienkripsi";
			$color = "#526F35";
		}
			
		// jika tombol dekripsi diklik maka akan tampil :
		if (isset($_POST['decrypt']))
		{
			$code = decrypt($pswd, $code);
			$error = "Kode berhasil didekripsi";
			$color = "#526F35";
		}
	}
}

?>

<html>
	<head>
		<title>SKD Tugas 4 - Rizki Deri</title>
		<link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
		<link rel="stylesheet" type="text/css" href="style.css">
		<script type="text/javascript" src="Script.js"></script>
	</head>
	<body>
		<br><br><br>
		<form action="index.php" method="post">
			<table cellpadding="5" align="center" cellpadding="2" border="7">
				<caption><hr><b>SKD - Vigenere Cipher</b><hr></caption>
				<tr>
					<td align="center"><textarea id="box" name="code" placeholder="Masukkan Teks"><?php echo htmlspecialchars($code); ?></textarea></td>
				</tr>
				<tr>
					<td align="center"><input type="text" name="pswd" id="pass" placeholder="Masukkan Key" value="<?php echo htmlspecialchars($pswd); ?>" /></td>
				</tr>
				<tr>
					<td>
						<input type="submit" name="encrypt" class="button" value="Enkripsi" onclick="validate(1)" />
						<input type="submit" name="decrypt" class="button" value="Dekripsi" onclick="validate(2)" />
					</td>
				</tr>
				<tr>
					<td><center><div style="color: <?php echo htmlspecialchars($color) ?>"><?php echo htmlspecialchars($error) ?></div></center></td>
				</tr>
			</table>
		</form>
	</body>
</html>