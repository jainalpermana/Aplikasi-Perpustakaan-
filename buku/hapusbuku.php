<?php

$isbn = $_GET['isbn'];

echo $isbn;

// koneksi ke database
$konek = mysqli_connect("localhost", "root", "", "latihanxirpl2");

$hapus = "DELETE FROM buku WHERE isbn='$isbn'";

$hasil = mysqli_query($konek,$hapus);

if($hasil){
	header("location:index.php");
}else{
	header("location:inputan.php");
}

?>