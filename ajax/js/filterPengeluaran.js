$(document).ready(function () {
    // event
    $('#filter').on('input', function () {
        console.log('ok filter');
        $('#row').load('ajax/filterKeluar.php?filter=' + $('#filter').val());
    });
});