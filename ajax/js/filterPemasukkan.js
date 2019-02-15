$(document).ready(function () {
    // event
    $('#filter').on('input', function () {
        console.log('ok filter');
        $('#row').load('ajax/filterMasuk.php?filter=' + $('#filter').val());
    });
});