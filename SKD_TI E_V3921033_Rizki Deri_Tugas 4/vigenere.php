<?php

// mengenkripsi teks yang dimasukkan
function encrypt($pswd, $text)
{
	// mengubah huruf menjadi lowercase
	$pswd = strtolower($pswd);
	
	// inisialisasi variabel
	$code = "";
	$ki = 0;
	$kl = strlen($pswd);
	$length = strlen($text);
	
	// mengulangi setiap baris dalam teks
	for ($i = 0; $i < $length; $i++)
	{
		// mengenkripsi jika hurufnya alfabet
		if (ctype_alpha($text[$i]))
		{
			// uppercase
			if (ctype_upper($text[$i]))
			{
				$text[$i] = chr(((ord($pswd[$ki]) - ord("a") + ord($text[$i]) - ord("A")) % 26) + ord("A"));
			}
			
			// lowercase
			else
			{
				$text[$i] = chr(((ord($pswd[$ki]) - ord("a") + ord($text[$i]) - ord("a")) % 26) + ord("a"));
			}
			
			// perbarui indeks kunci
			$ki++;
			if ($ki >= $kl)
			{
				$ki = 0;
			}
		}
	}
	
	// kembalikan kode yang terenkripsi
	return $text;
}

// berfungsi untuk mendekripsi teks yang masukkan
function decrypt($pswd, $text)
{
	// mengubah huruf menjadi lowercase
	$pswd = strtolower($pswd);
	
	// inisialisasi variable
	$code = "";
	$ki = 0;
	$kl = strlen($pswd);
	$length = strlen($text);
	
	// mengulangi setiap baris dalam teks
	for ($i = 0; $i < $length; $i++)
	{
		// mengenkripsi jika hurufnya alfabet
		if (ctype_alpha($text[$i]))
		{
			// uppercase
			if (ctype_upper($text[$i]))
			{
				$x = (ord($text[$i]) - ord("A")) - (ord($pswd[$ki]) - ord("a"));
				
				if ($x < 0)
				{
					$x += 26;
				}
				
				$x = $x + ord("A");
				
				$text[$i] = chr($x);
			}
			
			// lowercase
			else
			{
				$x = (ord($text[$i]) - ord("a")) - (ord($pswd[$ki]) - ord("a"));
				
				if ($x < 0)
				{
					$x += 26;
				}
				
				$x = $x + ord("a");
				
				$text[$i] = chr($x);
			}
			
			// perbarui indeks key
			$ki++;
			if ($ki >= $kl)
			{
				$ki = 0;
			}
		}
	}
	
	// kembalikan teks yang didekripsi
	return $text;
}

?>