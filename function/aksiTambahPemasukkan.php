<?php 
    require 'functions.php';
    // tambah data
    $tanggal = htmlspecialchars($_POST["tanggal"]);
    $keterangan = htmlspecialchars($_POST["keterangan"]);
    $sumber = htmlspecialchars($_POST["sumber"]);
    $harga = htmlspecialchars($_POST["harga"]);

    // query insert data
    $query = "INSERT INTO masuk VALUES ('', '$tanggal', '$keterangan', '$sumber', '$harga')";
    mysqli_query($koneksi, $query);
?>