<?php include_once 'Core/init.php'; include_once '../Templates/Header.php'; include_once 'Template/header.php';
if (!Session::Cek('username')) {
    Redirect::To('../index');
    Session::Flash('Login','Anda Harus Login Terlebih Dahulu');
}

?>

<h3>Riwayat</h3>
<table>
<tr>
    <td>No</td>
    <td>Admin</td>
    <td>Total</td>
    <td>Tanggal</td>
</tr>

<?php 
$total = 0;
$riwayat = $PRODUK->get_produk('riwayat');
while ($data = mysqli_fetch_array($riwayat)) { ?>
<tr>
<td><?php echo $data['no_pesanan'] ?> </td>
<td><?php echo $data['admin_pesanan'] ?> </td>
<td><?php echo $data['total_pesanan'] ?> </td>
<td><?php echo $data['tanggal_pesanan'] ?> </td>
<?php $total +=$data['total_pesanan']?> 

</tr>

<?php }
    echo "Total Penjualan : " . $total;
?>

</table>





<?php include_once '../Templates/Footer.php';?>