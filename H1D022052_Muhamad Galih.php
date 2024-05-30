<?php
// Menetapkan array dengan NIM dan nama
$data = array(
    "nim" => "H1D022052",
    "nama" => "Muhamad Galih"
);

// Menampilkan NIM dan nama menggunakan loop
foreach ($data as $key => $value) {
    echo ucfirst($key) . ": " . $value . "<br>";
}
?>