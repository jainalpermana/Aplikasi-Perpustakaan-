<?php
//koneksi ke database
$konek1 = mysqli_connect("localhost", "root", "", "latihanxirpl2");
//ambil data dari form
$judul = $_GET['judul'];
$penerbit = $_GET['penerbit'];
$pengarang = $_GET['pengarang'];
$input1 = "INSERT INTO buku(judul,penerbit,pengarang) VALUES ('$judul','$penerbit','$pengarang')";
$hasil1 = mysqli_query($konek1,$input1);
//apabila query untuk input data benar
if($hasil1)
{
	header("location:index.php");
}else{
	header("location:inputanbuku.php");
}
?>