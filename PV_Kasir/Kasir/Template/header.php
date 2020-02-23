<?php include_once 'core/init.php';
?>
<h3>Admin <?= Session::get('username');?></h3>
<a href="Pesanan.php">Pesanan</a>
<a href="Keranjang.php">Keranjang</a>
<a href="Riwayat.php">Riwayat</a>
<?php if (Session::Cek('UA')) { ?>

<a href="Tambah.php">Tambah Produk</a> 

<?php } ?>
<a href="logout.php">Logout</a>