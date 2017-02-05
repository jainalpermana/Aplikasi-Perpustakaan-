<?php

$koneksi = mysqli_connect("localhost", "root", "", "latihanxirpl2");

$tampilsiswa = "SELECT nomor, nama FROM siswa";
$tampilbuku  = "SELECT isbn, judul FROM buku";


$hasilsiswa = mysqli_query($koneksi, $tampilsiswa);
$hasilbuku  = mysqli_query($koneksi, $tampilbuku);


?>





<h3>Form Peminjaman</h3>
<form method="GET" action="prosesinput.php">
	TANGGAL PINJAM : <br>
	<input type="text" name="tglpinjam"><br>
	TANGGAL KEMBALI : <br>
	<input type="text" name="tglkembali"><br>
	



	NAMA : <br>
	<select name="nisn">
	<?php
		foreach ($hasilsiswa as $siswa) {
			echo "<option value=$siswa[nomor]>$siswa[nama]</option>";
}



	?>
		
	</select>
	<br>
	
	
	JUDUL : <br>
	<select name="isbn">
	<?php
		foreach ($hasilbuku as $buku) {
			echo "<option value=$buku[isbn]>$buku[judul]</option>";
}



	?>
			
	</select>
	<br>
	



	KETERANGAN: <br>
	<input type="radio" name="status" value="kembali">PENGEMBALIAN<br>
	<input type="radio" name="status" value="belum">PEMINJAMAN<br>

<input type="submit" value="Kirim"><br>
</form>
