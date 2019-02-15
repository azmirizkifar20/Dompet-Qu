$(document).ready(function () {
    // event ketika keyword diketik
    $('#keyword').on('keyup', function () {
        console.log('ok cari');
        $('#row').load('ajax/pengeluaran.php?keyword=' + $('#keyword').val());
    });
});