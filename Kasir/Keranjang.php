<?php include_once 'Core/init.php'; include_once '../Templates/Header.php'; include_once 'Template/header.php';
if (!Session::Cek('username')) {
    Redirect::To('../index');
    Session::Flash('Login','Anda Harus Login Terlebih Dahulu');
}
if (Session::Cek('Tambah')) {
    echo "<li>".Session::Flash('Tambah')."</li>";
}

?>
<h3>Keranjang</h3>
<?php $a = 1; ?>
    <table>
    <tr>
        <td>No.</td>
        <td>ID</td>
        <td>Nama</td>
        <td>Harga Satuan</td>
        <td>Banyak Pesanan</td>
        <td>Harga</td>
    </tr>
    <?php
        $total = 0;
        $Ker = $PRODUK->GetKeranjang(Session::Get('username'));

        while ($data =  mysqli_fetch_array($Ker)) {?>
        <tr>
        <td><?php echo $a."." ?> </td>
        <td><?php echo $data['id_pesanan']?></td>
        <td><?php echo $data['nama_pesanan']?></td>
        <td><?php echo $data['harga_pesanan']?></td>
        <td><?php echo $data['banyak_pesanan']?></td>
        <td><?php echo $data['harga_pesanan']*$data['banyak_pesanan']?></td>
        <?php 
        $total += $data['harga_pesanan']*$data['banyak_pesanan'];
        $a++;} 
        $ha = $total;
        ?>
    
    </tr>
    </table>
    <h4>Total Semuanya : <?php echo $total?></h4>
    <a href="bersih.php">Bersihkan Keranjang</a><br><br>
    <label>Uang</label>
    <form action="Keranjang.php" method="post">
        <input type="number" name="Bayar"><br>
        <button name="submit"> Bayar Sekarang</button>
    </form><br>
    <?php
    if (!empty(Input::Get('Bayar'))) {
        if ($total <= Input::Get('Bayar')) {
            $total = Input::Get('Bayar')-$total;
            $validasi = new Validasi();
            $validasi->check(array(
                'Bayar' => array(
                    'required' => true
                )
            ));
            if ($validasi->Passed()) {
                echo "Berhasil dibayar<br>Sisa Pembayaran : ".$total;
                $KERANJANG->Riwayat(array(
                    'admin_pesanan' => Session::Get('username'),
                    'total_pesanan' => $ha
                ));
                
                Redirect::To('bersih');     
            }

           
        }else {
            $total = $total- Input::Get('Bayar');
            echo "<li>Kurang : ".$total."</li><br>";
        }
    }
?>

<?php include_once '../templates/footer.php';




?>