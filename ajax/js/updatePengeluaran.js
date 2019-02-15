$(document).ready(function () {

    // nampilin data
    $(document).on('click', 'a[data-role=update]', function () {
        var id = $(this).data('id');
        var tanggal = $('#' + id).children('td[data-target=tanggal]').text();
        var keterangan = $('#' + id).children('td[data-target=keterangan]').text();
        var keperluan = $('#' + id).children('td[data-target=keperluan]').text();
        var harga = $('#' + id).children('td[data-target=harga]').text();

        $('#tanggal').val(tanggal);
        $('#keterangan').val(keterangan);
        $('#keperluan').val(keperluan);
        $('#harga').val(harga);
        $('#userId').val(id);
        $('#myModal2').modal('toggle');
    });

    // buat event untuk get data dan update ke database
    $('#save').click(function () {
        var id = $('#userId').val();
        var tanggal = $('#tanggal').val();
        var keterangan = $('#keterangan').val();
        var keperluan = $('#keperluan').val();
        var harga = $('#harga').val();

        $.ajax({
            url: 'ajax/updatePengeluaran.php',
            method: 'post',
            data: {
                tanggal: tanggal,
                keterangan: keterangan,
                keperluan: keperluan,
                harga: harga,
                id: id
            },
            success: function (response) {
                $('#' + id).children('td[data-target=tanggal]').text(tanggal);
                $('#' + id).children('td[data-target=keterangan]').text(keterangan);
                $('#' + id).children('td[data-target=keperluan]').text(keperluan);
                $('#' + id).children('td[data-target=harga]').text(harga);
                $('#myModal2').modal('toggle');
                $(".row").load("ajax/tampilPengeluaran.php");

            }
        });
    });
});