<?php
$koneksi = mysqli_connect('localhost' , 'root' ,'' ,'pencatatan');

if($_POST['id']){
    $id = $_POST['id'];
	$result  = mysqli_query($koneksi , "DELETE FROM masuk WHERE id='$id'");
	return mysqli_affected_rows($koneksi);
}
?>