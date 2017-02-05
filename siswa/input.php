<?php
//koneksi ke database
$konek = mysqli_connect("localhost", "root", "", "latihanxirpl2");
//ambil data dari form
$nama = $_POST['nama'];
$lokasifile = $_FILES['upfile']['tmp_name'];
$namafile = $_FILES['upfile']['name'];
$sizefile = $_FILES['upfile']['size'];
$kontak = $_POST['kontak'];
$alamat = $_POST['alamat'];

//tujuan
$tujuan = "img/$namafile";
//perintah upload
$upload = move_uploaded_file($lokasifile, $tujuan);

$input = "INSERT INTO siswa(nama,foto,kontak,alamat) VALUES ('$nama','$namafile','$kontak','$alamat')";
$hasil = mysqli_query($konek,$input);
//apabila query untuk input data benar
if($hasil OR $upload)
{
	header("location:index.php");
}else{
	header("location:input.php");
}
?>