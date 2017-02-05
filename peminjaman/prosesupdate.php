<?php

//koneksi ke database
$konek = mysqli_connect("localhost", "root", "", "latihanxirpl2");

//ambil variabel yang dikirim dari form

$a= $_GET['id_pinjam'];
$p = $_GET['tglpinjam'];
$k = $_GET['tglkembali'];
$n = $_GET['nisn'];
$i = $_GET['isbn'];
$s = $_GET['status'];

$update = "UPDATE peminjaman SET tgl_pinjam= '$p', tgl_kembali='$k', nomor='$n', isbn='$i',keterangan='$s'
	WHERE id_pinjam='$a'";

$hasil = mysqli_query($konek,$update);

if($hasil){
header("location:index.php");
}else{
echo "Update data pinjam gagal";
}

?>