<?php

$nomor = $_GET['nomor'];

// koneksi ke database
$konek = mysqli_connect("localhost", "root", "", "latihanxirpl2");

$hapus = "SELECT * FROM siswa WHERE nomor = '$nomor'";

$hasil = mysqli_query($konek,$hapus);

$data = mysqli_fetch_array($hasil);

$foto = $data['foto'];
if ($foto == NULL) {
	$foto = "delfault.jpeg";
}

?>

<h3>Update Siswa</h3>
<form method="POST" action="prosesupdate.php" enctype="multipart/form-data">
	<img src="img/<?php echo $foto;?>" width="100px">

	<input type="hidden" value="<?php echo $data['foto'];?>" name="fotolama">

	<input type="file" name="pp">
	<br>
	Nama : <input type="text" name="nama" value="<?php echo $data['nama']; ?>"><br>

	<input type="hidden" name="nomor" value="<?php echo $data['nomor']; ?>">

	Kontak : <input type="text" name="kontak" value="<?php echo $data['kontak']; ?>"><br>

	Alamat : 
<textarea name="alamat" rows="5" COLS="30" ><?php echo $data['alamat']; ?></textarea>
	<br>
<input type="submit" value="Kirim"><br>
</form>