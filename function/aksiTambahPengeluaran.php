<?php 
    require 'functions.php';
    // tambah data
    $tanggal = htmlspecialchars($_POST["tanggal"]);
    $keterangan = htmlspecialchars($_POST["keterangan"]);
    $keperluan = htmlspecialchars($_POST["keperluan"]);
    $harga = htmlspecialchars($_POST["harga"]);

    // query insert data
    $query = "INSERT INTO keluar VALUES ('', '$tanggal', '$keterangan', '$keperluan', '$harga')";
    mysqli_query($koneksi, $query);           
?>