<?php

$id_pinjam = $_GET ['id_pinjam'];


//koneksi ke database
$konek = mysqli_connect("localhost", "root", "", "latihanxirpl2");

$hapus = "DELETE  FROM peminjaman WHERE id_pinjam = '$id_pinjam' ";

$hasil = mysqli_query($konek,$hapus);

if ($hasil) {
	header ("location:index.php");
}else{
	header ("location:inputpinjam.php");
}

?>