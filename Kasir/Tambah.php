<?php include_once 'Core/init.php'; include_once '../Templates/Header.php'; include_once 'Template/header.php';
if (!Session::Cek('username')) {
    Redirect::To('../index');
    Session::Flash('Login','Anda Harus Login Terlebih Dahulu');
}

if (Input::Get('submit')) {
    $error = array();
    $validasi = new Validasi();
    $validasi->check(array(
        'id_produk' => array(
            'required' => true,
            'min'      => 3
        ),
        'nama_produk' => array(
            'required' => true,
            'min'      => 3
        ),
        'harga_produk' => array(
            'required' => true
        ),
        'stok_produk' => array(
            'required' => true
        )   
    ));
    if ($PRODUK->Cek_Produk(Input::get('id_produk'))) {
        $error[] = "ID Produk Sudah ada";
    }else {
        if ($validasi->Passed()) {
            $PRODUK->tambah_produk(array(
                'id_produk'   =>Input::Get('id_produk'),
                'nama_produk' =>Input::Get('nama_produk'),
                'harga_produk'=>Input::Get('harga_produk'),
                'stok_produk' =>Input::Get('stok_produk'),
                'total_produk'=>0
            ));
            Session::Flash('Produkadd','Produk Sudah Ditambah');
            Redirect::To('index');
        }else {
            $error = $validasi->GetError();
            
        }
    }
}   
?>
<h3>Tambah Produk</h3>
<form action="Tambah.php" method="post">
    <label for="id_produk">ID Produk</label><br>
    <input type="text" placeholder="Contoh : NSGRG001" name="id_produk"><br>
    <label for="nama_produk">Nama Produk</label><br>
    <input type="text" placeholder="Contoh : Nasi Goreng" name="nama_produk"><br>
    <label for="harga_produk">Harga Produk</label><br>
    <input type="number" placeholder="Contoh : 10000" name="harga_produk"><br>
    <label for="stok_produk">Stok Produk</label><br>
    <input type="number" placeholder="Contoh : 25" name="stok_produk"><br>
    <input type="submit" value="Tambah Produk" name="submit" id="submit"><br>
</form>
<?php if (!empty($error)) {?>
        <div>
            <?php foreach ($error as $erro) { ?>
            <li><?php echo $erro; ?> </li>
            <?php } ?>
        </div>
        <?php } 
?>


<?php include_once '../Templates/Footer.php';


?>

