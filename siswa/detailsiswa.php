<?php
$no = $_GET['nomor'];
error_reporting(E_ALL ^ (E_NOTICE));

$konek = mysqli_connect("localhost", "root", "", "latihanxirpl2");

$perintah = "SELECT * FROM siswa WHERE nomor = '$no'";

$hasil = mysqli_query($konek, $perintah);

$data = mysqli_fetch_array($hasil);

$foto = $data['foto'];

if ($foto == NULL) {
	$foto = "delfault.jpeg";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<h1>DETAIL SISWA <?php echo $data['nama'];?></h1>
<a href="index.php">KEMBALI</a>
<table border="1">
	<tr>
		<td rowspan="5"><img src="img/<?php echo $foto;?>" alt="" width="150"></td>
	</tr>
	<tr>
		<td>NISN</td>
		<td><?php echo $data['nomor'];?></td>
	</tr>
	<tr>
		<td>NAMA</td>
		<td><?php echo $data['nama'];?></td>
	</tr>
	<tr>
		<td>KONTAK</td>
		<td><?php echo $data['kontak'];?></td>
	</tr>
	<tr>
		<td>ALAMAT</td>
		<td><?php echo $data['alamat'];?></td>
	</tr>
</table>
	
</body>
</html>