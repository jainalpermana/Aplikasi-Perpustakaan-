<?php
//koneksi ke database
$konek = mysqli_connect("localhost", "root", "", "latihanxirpl2");
//ambil data dari form

$nomor = $_POST['nomor'];

$lokasifoto = $_FILES['pp']['tmp_name'];
$namafoto = $_FILES['pp']['name'];
$fotolama = $_POST['fotolama'];

$nama = $_POST['nama'];
$kontak = $_POST['kontak'];
$alamat = $_POST['alamat'];

if ($namafoto != NULL) {
	//hapus foto
	unlink("img/$fotolama");
	//upload foto baru
	$tujuan = "img/$namafoto";
	move_uploaded_file($lokasifoto, $tujuan);

	$foto = $namafoto;
}else{
	$foto = $fotolama;
}

$update = "UPDATE siswa SET nama = '$nama', kontak = '$kontak', alamat ='$alamat', foto ='$foto' WHERE nomor='$nomor'";

$hasil = mysqli_query($konek,$update);

//apabila query untuk input data benar
if($hasil)
{
	header("location:index.php");
}else{
	header("Update Siswa Gagal");
}
?>