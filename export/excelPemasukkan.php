<?php 
// koneksi ke databse
require '../function/functions.php';

$output = '';
if (isset($_POST['excel'])) {
    $sql = "SELECT * FROM masuk ORDER BY id";
    $result = mysqli_query($koneksi, $sql);
    $no = 1;

    if (mysqli_num_rows($result) > 0) {
        $output .= '
            <table class="table" border="1" cellspacing="0" cellpadding="3">
                <tr>
                    <th>No.</th>   
                    <th>Tanggal</th>
                    <th>Keterangan Pemasukkan</th>
                    <th>Sumber Pemasukkan</th>
                    <th>Jumlah Pemasukkan</th>
                </tr>
        ';
        while ($row = mysqli_fetch_assoc($result)) {
            // masukin nilai ke variabel
            $harga = $row["harga"];
            // konversi string nilai ke int + split
            $konversiHarga = str_replace('.', '', $harga);
            $hasilHarga = number_format ($konversiHarga, 2, ',', '.');
            $output .= '
            <tr>
                <td>' . $no . '</td>
                <td>' . $row["tanggal"] . '</td>
                <td>' . $row["keterangan"] . '</td>
                <td>' . $row["sumber"] . '</td>
                <td>' . $hasilHarga . '</td>
            </tr>
            ';
            $hargae[] = $row["harga"];
            $hargaConvert = str_replace('.', '', $hargae);
            $totali = array_sum($hargaConvert);
            $hasilHarga2 = number_format($totali, 2, ',', '.');
            $no++;
        }
        $output .= '
            <tr>
                <td colspan="4" style="text-align: center;">Total Pemasukkan</td>
                <td>' . $hasilHarga2 . '</td>
            </tr>
        ';
        $output .= '</table>';
        header("Content-Type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=Laporan Pemasukkan.xls");
        echo $output;
    }
}

?>