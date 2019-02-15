<?php
$koneksi = mysqli_connect('localhost' , 'root' ,'' ,'pencatatan');

if(isset($_POST['id'])){
	
	$tanggal = $_POST['tanggal'];
	$keterangan = $_POST['keterangan'];
	$sumber = $_POST['sumber'];
	$harga = $_POST['harga'];
	$id = $_POST['id'];

	//  query update data 
	$result  = mysqli_query($koneksi , "UPDATE masuk SET tanggal='$tanggal' , keterangan='$keterangan' , sumber = '$sumber', harga='$harga' WHERE id='$id'");
	if($result){
		echo 'data updated';
	}

}
?>