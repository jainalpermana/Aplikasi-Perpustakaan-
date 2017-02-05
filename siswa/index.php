<h3>Data Siswa</h3>

<a href="inputan.php">Input Data Siswa</a>
<hr>
<form action="index.php" method="GET">
	<input type="text" name="s">
	<input type="submit" value="CARI" name="cari">

</form>
<hr>
<?php
error_reporting(E_ALL ^ (E_NOTICE));
$batas = 5;
$halaman = $_GET['halaman'];

if (empty($halaman)) {
	$posisi = 0;
	$halaman = 1;
}else{
	$posisi = ($halaman - 1) * $batas;
}

//koneksi ke database
$konek = mysqli_connect("localhost", "root", "", "latihanxirpl2");

if (isset($_GET['cari'])) {
	$q = $_GET['s'];
	$tampil = "SELECT * FROM siswa WHERE nama LIKE '%$q%' OR alamat LIKE '%$q%' OR kontak LIKE '%$q%' ORDER BY nama LIMIT $posisi, $batas";
}else{
	//query menampilkan data
	$tampil = "SELECT * FROM siswa LIMIT $posisi, $batas";
}


$hasil = mysqli_query($konek,$tampil);

$jmlhasil = mysqli_num_rows($hasil);

?>

<table border="1">
	<tr>
		<th>no</th>
		<th>nama</th>
		<th>kontak</th>
		<th>alamat</th>
		<th>aksi</th>
	</tr>
<?php

if ($jmlhasil < 1) {
	echo "<tr>";
	echo "<td colspan='5'>data yang ada cari tidak ada</td>";
	echo "</tr>";
}else{
	//penomoran
	$no = $posisi + 1;

	//tampil nama, email dan pesan
	while($data=mysqli_fetch_array($hasil)){
		echo "<tr>";
		echo "<td>$no</td>";
		echo "<td>$data[nama]</td>";
		echo "<td>$data[kontak]</td>";
		echo "<td>$data[alamat]</td>";
		echo "<td><a href='hapussiswa.php?no=$data[nomor]'>hapus</a> | 
				<a href='editsiswa.php?no=$data[nomor]'>edit</a>|
				<a href='detailsiswa.php?no=$data[nomor]'>detail</a></td>";
		echo "</tr>";
		$no++;

	}

}


?>
</table>

<?php
//untuk pagging
$tampil2 = "SELECT * FROM siswa";
$hasil2 = mysqli_query($konek, $tampil2);
$jmldata = mysqli_num_rows($hasil2);
$jmlhalaman = ceil($jmldata / $batas);

echo " jumlah data : $jmldata <br>";

for ($i=1; $i <= $jmlhalaman; $i++) { 
	if ($i != $halaman) {
		echo "<a href=$_SERVER[PHP_SELF]?halaman=$i> $i </a>";
	}else{
		echo " <b> $i </b>";
	}
}

?>

