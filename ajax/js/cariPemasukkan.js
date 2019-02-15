$(document).ready(function () {
    // event ketika keyword diketik
    $('#keyword').on('keyup', function () {
        $('#row').load('ajax/pemasukkan.php?keyword=' + $('#keyword').val());
    });
});