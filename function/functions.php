<?php 
    $koneksi = mysqli_connect("localhost", "root", "", "pencatatan"); 

    function query($query) {
        global $koneksi;
        $result = mysqli_query($koneksi, $query);
        $rows = [];
        while( $row = mysqli_fetch_assoc($result) ) {
            $rows[] = $row;
        }
        return $rows;
    }

    // tambah data Pemasukkan
    function tambahMasuk($dataMasuk) {
        global $koneksi;
        $tanggalMasuk = htmlspecialchars($dataMasuk["tanggal"]);
        $keteranganMasuk = htmlspecialchars($dataMasuk["keterangan"]);
        $sumber = htmlspecialchars($dataMasuk["sumber"]);
        $harga = htmlspecialchars($dataMasuk["harga"]);

        // query insert data
        $query = "INSERT INTO masuk VALUES ('', '$tanggalMasuk', '$keteranganMasuk', '$sumber', '$harga')";
        mysqli_query($koneksi, $query);           
        
        return mysqli_affected_rows($koneksi);
    }

    // tambah data Pengeluaran
    function tambahKeluar($dataKeluar) {
        global $koneksi;
        $tanggalKeluar = htmlspecialchars($dataKeluar["tanggal"]);
        $keteranganKeluar = htmlspecialchars($dataKeluar["keterangan"]);
        $keperluan = htmlspecialchars($dataKeluar["keperluan"]);
        $harga = htmlspecialchars($dataKeluar["harga"]);

        // query insert data
        $query = "INSERT INTO keluar VALUES ('', '$tanggalKeluar', '$keteranganKeluar', '$keperluan', '$harga')";
        mysqli_query($koneksi, $query);           
        
        return mysqli_affected_rows($koneksi);
    }

    // registrasi
    function registrasi($data) {
        global $koneksi;

        $username = strtolower(stripslashes( $data["username"] ) );
        $password = mysqli_real_escape_string($koneksi, $data["password"]);
        $password_confirm = mysqli_real_escape_string($koneksi, $data["password-confirm"]);

        // cek username sudah ada atau belum
        $hasil = mysqli_query($koneksi, "SELECT username FROM user WHERE username = '$username'");
        if ( mysqli_fetch_assoc($hasil) ) {
            echo "
            <script>
                alert('username telah terdaftar!')
            </script>";
            return false;
        }

        // cek konfirmasi Password
        if ( $password !== $password_confirm ) {
            echo "
            <script>
                alert('konfirmasi password tidak sesuai!')
            </script>";
            return false;
        }

        // enkripsi
        $password = password_hash($password, PASSWORD_DEFAULT);
        mysqli_query($koneksi, "INSERT INTO user VALUES('', '$username', '$password')");

        return mysqli_affected_rows($koneksi);
    }
?>