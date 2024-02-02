<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $gajiPokok = $_POST["gaji_pokok"];
    $tunjangan = $_POST["tunjangan"];
    $potongan = $_POST["potongan"];

    $hasilPerhitungan = hitungGajiBersih($gajiPokok, $tunjangan, $potongan);

    if($hasilPerhitungan==0){
        echo "Masukkan nilai yang valid";
    }
    else{
        echo "<strong>Hasil Perhitungan Gaji:</strong><br>";
        echo "Gaji Bruto: " . rupiah($hasilPerhitungan['gajiBruto']) . "<br>";
        echo "Pajak Penghasilan: " . rupiah($hasilPerhitungan['pajakPenghasilan']) . "<br>";
        echo "Asuransi Kesehatan: " . rupiah($hasilPerhitungan['asuransiKesehatan']) . "<br>";
        echo "Gaji Bersih: ".rupiah($hasilPerhitungan['gajiBruto']). " - ". rupiah($hasilPerhitungan['total-potongan']). " = " .rupiah($hasilPerhitungan['gajiBersih']) . "<br>";
    }
}

function hitungGajiBersih($gajiPokok, $tunjangan, $potongan) {
    if (!is_numeric($gajiPokok) || !is_numeric($tunjangan) || !is_numeric($potongan) ||
        $gajiPokok < 0 || $tunjangan < 0 || $potongan < 0) {
        return 0 ;
    }
    
    $gajiBruto = $gajiPokok + $tunjangan;
    $pajakPenghasilan = 0.1 * $gajiBruto;
    $asuransiKesehatan = 0.05 * $gajiBruto;
    $gajiBersih = $gajiBruto - $pajakPenghasilan - $asuransiKesehatan;

    return [
        'gajiBruto' => $gajiBruto,
        'pajakPenghasilan' => $pajakPenghasilan,
        'asuransiKesehatan' => $asuransiKesehatan,
        'total-potongan' => $pajakPenghasilan + $asuransiKesehatan,
        'gajiBersih' => $gajiBersih
    ];
}

function rupiah($angka){
	return "Rp " . number_format($angka,2,',','.');
}
?>