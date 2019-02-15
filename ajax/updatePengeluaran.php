<?php
$koneksi = mysqli_connect('localhost' , 'root' ,'' ,'pencatatan');

if(isset($_POST['id'])){
	
	$tanggal = $_POST['tanggal'];
	$keterangan = $_POST['keterangan'];
	$keperluan = $_POST['keperluan'];
	$harga = $_POST['harga'];
	$id = $_POST['id'];

	//  query update data 
	$result  = mysqli_query($koneksi , "UPDATE keluar SET tanggal='$tanggal' , keterangan='$keterangan' , keperluan = '$keperluan', harga='$harga' WHERE id='$id'");
	if($result){
		echo 'data updated';
	}

}
?>