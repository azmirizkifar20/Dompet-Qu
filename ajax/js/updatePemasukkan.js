$(document).ready(function () {

    // nampilin data
    $(document).on('click', 'a[data-role=update]', function () {
        var id = $(this).data('id');
        var tanggal = $('#' + id).children('td[data-target=tanggal]').text();
        var keterangan = $('#' + id).children('td[data-target=keterangan]').text();
        var sumber = $('#' + id).children('td[data-target=sumber]').text();
        var harga = $('#' + id).children('td[data-target=harga]').text();

        $('#tanggal').val(tanggal);
        $('#keterangan').val(keterangan);
        $('#sumber').val(sumber);
        $('#harga').val(harga);
        $('#userId').val(id);
        $('#myModal2').modal('toggle');
    });

    // buat event untuk get data dan update ke database
    $('#save').click(function () {
        var id = $('#userId').val();
        var tanggal = $('#tanggal').val();
        var keterangan = $('#keterangan').val();
        var sumber = $('#sumber').val();
        var harga = $('#harga').val();

        $.ajax({
            url: 'ajax/updatePemasukkan.php',
            method: 'post',
            data: {
                tanggal: tanggal,
                keterangan: keterangan,
                sumber: sumber,
                harga: harga,
                id: id
            },
            success: function (response) {
                $('#' + id).children('td[data-target=tanggal]').text(tanggal);
                $('#' + id).children('td[data-target=keterangan]').text(keterangan);
                $('#' + id).children('td[data-target=sumber]').text(sumber);
                $('#' + id).children('td[data-target=harga]').text(harga);
                $('#myModal2').modal('toggle');
                $(".row").load("ajax/tampilPemasukkan.php");

            }
        });
    });
});