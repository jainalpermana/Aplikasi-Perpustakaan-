<h3>Data Peminjaman</h3>

<a href="inputpinjam.php">Input Peminjaman</a>
<form action="index.php" method="GET">
	<input type="text" name="s">
	<input type="submit" value="CARI" name="cari">
</form>

<hr>
<?php
$batas = 5;
$halaman = @$_GET['halaman'];

if (empty($halaman)) {
	$posisi = 0;
	$halaman = 1;
}else{
	$posisi = ($halaman - 1) * $batas;
}


//koneksi ke database
$konek = mysqli_connect("localhost", "root", "", "latihanxirpl2");
//query menampilkan data
if (isset($_GET['cari'])) {
	$q = $_GET['s'];

	$tampil = "SELECT peminjaman.id_pinjam, peminjaman.tgl_pinjam, peminjaman.tgl_kembali, peminjaman.keterangan, siswa.nomor, siswa.nama, buku.judul FROM siswa,peminjaman,buku WHERE siswa.nomor = peminjaman.nomor AND peminjaman.isbn= buku.isbn AND siswa.nama LIKE '%$q%' OR buku.judul LIKE '%$q%' ORDER BY siswa.nama = buku.judul LIMIT $posisi, $batas";
	
	}else{

	$tampil = "SELECT peminjaman.id_pinjam, peminjaman.tgl_pinjam, peminjaman.tgl_kembali, peminjaman.keterangan, siswa.nomor, siswa.nama, buku.judul FROM siswa,peminjaman,buku WHERE siswa.nomor = peminjaman.nomor AND peminjaman.isbn = buku.isbn LIMIT $posisi, $batas";
	}


$hasil = mysqli_query($konek,$tampil);
$jmlhasil = mysqli_num_rows($hasil);

?>

<table border="1">
	<tr>
		<th>no</th>
		<th>nisn</th>
		<th>nama</th>
		<th>tgl_pinjam</th>
		<th>tgl_kembali</th>
		<th>judul</th>
		<th>keterangan</th>
		<th>aksi</th>
	</tr>
<?php

if ($jmlhasil < 1) {
	echo "<tr>";
	echo "<td colspan='5'>data yang anda cari dimakan dinosaurus</td>";
	echo "</tr>";

}else{

	//penomoran
	$no =$posisi + 1;
	//tampil nama, email dan pesan
	while($data=mysqli_fetch_array($hasil)){
		echo "<tr>";
		echo "<td>$data[id_pinjam]</td>";
		echo "<td>$data[nomor]</td>";
		echo "<td>$data[nama]</td>";
		echo "<td>$data[tgl_pinjam]</td>";
		echo "<td>$data[tgl_kembali]</td>";
		echo "<td>$data[judul]</td>";
		echo "<td>$data[keterangan]</td>";
		echo "<td><a href='hapuspinjam.php?id_pinjam=$data[id_pinjam]'>hapus</a> | <a href='editpinjam.php?id_pinjam=$data[id_pinjam]'>edit</a></td>";
		echo "</tr>";
		$data++;
	}
}

?>
</table>

<?php

$tampil2 = "SELECT * FROM peminjaman";
$hasil2 = mysqli_query($konek, $tampil2);
$jmldata = mysqli_num_rows($hasil2);
$jmlhalaman = ceil ($jmldata / $batas);

echo "JUMLAH DATA : $jmldata <br>";

for ($i=1; $i <= $jmlhalaman; $i++){
	if ($i != $halaman){
	echo "<a href=$_SERVER[PHP_SELF]?halaman=$i>$i</a>";
   }else{
   	echo "<b> $i </b>";
   }	
}

?>

