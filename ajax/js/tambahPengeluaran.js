// tambah data Pengeluaran
$(document).ready(function () {
    $(".tambahin2").click(function () {
        var jumlah = $('#jumlah').val().length;
        if (jumlah != 0) {
            var data = $('.form-user2').serialize();
            $.ajax({
                type: 'POST',
                url: "function/aksiTambahPengeluaran.php",
                data: data,
                success: function () {
                    $(".row").load("ajax/tampilPengeluaran.php");
                }
            });
        }
    });
});