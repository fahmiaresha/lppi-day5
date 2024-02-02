<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nilai = $_POST["nilai"];

    if ($nilai >= 85 && $nilai <= 100) {
        $peringkat = 'A';
    } elseif ($nilai >= 75 && $nilai <= 84) {
        $peringkat = 'B';
    } elseif ($nilai >= 60 && $nilai <= 74) {
        $peringkat = 'C';
    } elseif ($nilai >= 50 && $nilai <= 59) {
        $peringkat = 'D';
    } elseif ($nilai >= 0 && $nilai <= 49) {
        $peringkat = 'E';
    } else {
        $peringkat = 'Nilai tidak valid';
    }

    echo "Nilai Anda: $nilai<br>";
    echo "Peringkat Huruf: $peringkat";
}
?>