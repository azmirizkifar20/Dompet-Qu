// tambah data mahasiswa
$(document).ready(function () {
    $(".tambahin").click(function () {
        var jumlah = $('#jumlah').val().length;
        if (jumlah != 0) {
            var data = $('.form-user').serialize();
            $.ajax({
                type: 'POST',
                url: "function/aksiTambahPemasukkan.php",
                data: data,
                success: function () {
                    $(".row").load("ajax/tampilPemasukkan.php");
                }
            });
        }
    });
});