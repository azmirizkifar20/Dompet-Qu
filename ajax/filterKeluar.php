<?php 
    require '../function/functions.php';
    
    if (isset($_GET['filter'])) {
        $tgl = $_GET['filter'];
        $query = "SELECT * FROM keluar WHERE tanggal LIKE '%$tgl%'";
    } 

    $pengeluaran = query($query);
?>

<div class="col-md-12">
    <div class="table-responsive">
        <table class="table table-sm table-hover table-striped table-bordered">
            <tr>
                <th>No.</th>
                <th>Tanggal</th>
                <th>Keterangan Pengeluaran</th>
                <th>Keperluan Pengeluaran</th>
                <th>Jumlah Pengeluaran</th>
                <th>Aksi</th>
            </tr>

            <?php $i = 1; ?>
            <?php foreach ($pengeluaran as $row) : ?>
            <tr class="show" id="<?= $row["id"]; ?>">
                <td><?= $i; ?> </td>
                <td data-target="tanggal"><?= $row["tanggal"]; ?></td>
                <td data-target="keterangan"><?= $row["keterangan"]; ?></td>
                <td data-target="keperluan"><?= $row["keperluan"]; ?></td>
                <td data-target="harga"><?php
                        $harga = $row["harga"];
                        // konversi string nilai ke int + split
                        $konversiHarga = str_replace('.', '', $harga);
                        $hasilHarga = number_format($konversiHarga, 0, ',', '.');
                        echo "$hasilHarga"
                    ?></td>
                <td>    
                    <a href="#" id="<?= $row["id"] ;?>" class="btn btn-info delete"><i class="fas fa-trash-alt"></i></a>
                    <a href="#" data-role="update" data-id="<?= $row["id"] ;?>" class="btn btn-outline-secondary" id="openBtn"><i class="fas fa-edit"></i></a>
                </td>
            </tr>
            <?php
                $hargae[] = $row["harga"];
                $hargaConvert = str_replace('.', '', $hargae);
                $totali = array_sum($hargaConvert);
                $hasilHarga = number_format($totali, 0, ',', '.');
            ?>
            <?php $i++ ?>
            <?php endforeach; ?>

            <?php if ( isset($tgl) == $pengeluaran ) : ?> 
            <tr>
                <td colspan="4">Total Pengeluaran</td>
                <td><?= $hasilHarga ?></td>
            </tr>
            <?php elseif ( isset($tgl) != $pengeluaran ) : ?> 
            <tr>
            </tr>
            <?php endif; ?>
        </table>
    </div>
</div>

<script>
$(function () {
    $(".delete").click(function () {
        var element = $(this);
        var del_id = element.attr("id");
        var info = 'id=' + del_id;
        swal({
            title: 'Peringatan!',
            type: 'error',
            text: 'Yakin ingin menghapus data?',
            html: true,
            confirmButtonColor: '#d9534f',
            showCancelButton: true,
        }, function () {
            $.ajax({
                type: "POST",
                url: "ajax/deletePengeluaran.php",
                data: info,
                success: function () {
                    $(".row").load("ajax/tampilPengeluaranDel.php");
                }
            });
        });
        return false;
    });
});
</script>