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
            },
            function () {
                $.ajax({
                    type: "POST",
                    url: "ajax/deletePemasukkan.php",
                    data: info,
                    success: function () {
                        $(".row").load("ajax/tampilPemasukkanDel.php");
                    }
                });
            });
        return false;
    });
});