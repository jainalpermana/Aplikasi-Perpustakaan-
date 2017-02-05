<?php
//koneksi ke database
$konek = mysqli_connect("localhost", "root", "", "latihanxirpl2");
//ambil data dari form

$isbn = $_GET['isbn'];

$judul = $_GET['judul'];
$penerbit = $_GET['penerbit'];
$pengarang = $_GET['pengarang'];


$update = "UPDATE buku SET judul = '$judul', penerbit = '$penerbit', pengarang ='$pengarang'
WHERE isbn='$isbn'";

$hasil = mysqli_query($konek,$update);

//apabila query untuk input data benar
if($hasil)
{
	header("location:index.php");
}else{
	header("Update Buku Gagal");
}
?>