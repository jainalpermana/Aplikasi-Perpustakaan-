<?php

//koneksi ke database
$konek = mysqli_connect("localhost", "root", "", "latihanxirpl2");

//ambil data dari form
$p = $_GET['tglpinjam'];
$k = $_GET['tglkembali'];
$n = $_GET['nisn'];
$i = $_GET['isbn'];
$s = $_GET['status'];

$input = "INSERT INTO peminjaman(tgl_pinjam, tgl_kembali, nomor, isbn, keterangan) 
			VALUES ('$p','$k','$n','$i','$s')";

$hasil = mysqli_query($konek,$input);

if ($hasil) {
	header ("location:index.php");
}else{
	header ("location:inputpinjam.php");
}

?>