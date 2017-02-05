<?php

$nomor = $_GET['id_pinjam'];

$koneksi = mysqli_connect("localhost", "root", "", "latihanxirpl2");

$tampilsiswa = "SELECT nomor, nama FROM siswa";
$tampilbuku  = "SELECT isbn, judul FROM buku";


$hasilsiswa = mysqli_query($koneksi, $tampilsiswa);
$hasilbuku  = mysqli_query($koneksi, $tampilbuku);
$pilihan = "SELECT * FROM peminjaman WHERE id_pinjam = '$nomor' ";
$hasileksekusi = mysqli_query($koneksi, $pilihan);

$pilihanpinjam = mysqli_fetch_array($hasileksekusi);




?>





<h3>Form Peminjaman</h3>
<form method="GET" action="prosesupdate.php">
	TANGGAL PINJAM : <br>
	<input type="text" name="tglpinjam" value="<?php echo $pilihanpinjam['tgl_pinjam'] ?>"><br>
	TANGGAL KEMBALI : <br>
	<input type="text" name="tglkembali" value="<?php echo $pilihanpinjam['tgl_kembali'] ?>"><br>
	TANGGAL KEMBALI : <br>

	<input type="hidden" name="id_pinjam" value="<?php echo $pilihanpinjam['id_pinjam'];?>"></input>
	



	NAMA : <br>
	<select name="nisn">
	<?php
		foreach ($hasilsiswa as $siswa) {
	?>
			<option value="<?php echo $siswa['nomor'];?>"<?php if($siswa['nomor']== $pilihanpinjam['nomor']){ echo "selected";}?> > <?php echo $siswa['nama'];?></option>;





	<?php
	}
    ?>
		
	</select>
	<br>
	
	
	JUDUL : <br>
	<select name="isbn">
	<?php
		foreach ($hasilbuku as $buku) {
	?>		
			<option value="<?php echo $buku['isbn'];?>"<?php if($buku['isbn']== $pilihanpinjam['isbn']){ echo "selected";}?> > <?php echo $buku['judul'];?></option>;



	<?php
	}
	?>
			
	</select>
	<br>
	



	KETERANGAN: <br>
	<input type="radio" name="status" value="kembali" <?php if($pilihanpinjam['keterangan']== "kembali") 
	{echo "checked";} ?>>PENGEMBALIAN</input><br>
	<input type="radio" name="status" value="belum" <?php if($pilihanpinjam['keterangan']== "belum") 
	{echo "checked";} ?> >PEMINJAMAN</input><br>

<input type="submit" value="Kirim"><br>
</form>
