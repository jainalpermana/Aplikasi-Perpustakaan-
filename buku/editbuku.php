<?php

$isbn = $_GET['isbn'];

// koneksi ke database
$konek = mysqli_connect("localhost", "root", "", "latihanxirpl2");

$hapus = "SELECT * FROM buku WHERE isbn = '$isbn'";

$hasil = mysqli_query($konek,$hapus);

$data = mysqli_fetch_array($hasil);

?>

<h3>Update Siswa</h3>
<form method="GET" action="prosesupdate.php">
	Judul : <input type="text" name="judul" value="<?php echo $data['judul']; ?>"><br>

	<input type="hidden" name="isbn" value="<?php echo $data['isbn']; ?>">

	Penerbit : <input type="text" name="penerbit" value="<?php echo $data['penerbit']; ?>"><br>

	Pengarang : <input type="text" name="pengarang" value="<?php echo $data['pengarang']; ?>">
	<br>
<input type="submit" value="Kirim"><br>
</form>