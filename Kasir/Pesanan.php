<?php include_once 'Core/init.php'; include_once '../Templates/Header.php'; include_once 'Template/header.php';
if (!Session::Cek('username')) {
    Redirect::To('../index');
    Session::Flash('Login','Anda Harus Login Terlebih Dahulu');
}
if (Session::Cek('Kosong')) {
    echo "<li>".Session::Flash('Kosong')."</li>";
}


if (Input::Get('submit')) {
    $error = array();
    if (!empty(Input::Get('Beli'))) {
        $hasil = implode("','", Input::Get('Beli'));
        $keranjang = $KERANJANG->get_pesanan($hasil);
        

        while ($data = mysqli_fetch_array($keranjang)) {
           if($KERANJANG->cek_pesanan(Session::Get('username'),$data['id_produk'])){
                $update = $KERANJANG->get_pesanan2();    
            while ( $data2 = mysqli_fetch_array($update)) {
                    $bp = Input::Get('value'.$data['id_produk']);
                    if($bp == 0){
                        $bp=1;
                    }
                    $ukur = $bp + $data2['banyak_pesanan'];
                    if ($KERANJANG->Update_Pesanan(Session::Get('username'),$data['id_produk'],$ukur)) {
                        Session::Flash('Tambah', "Berhasil ditambahkan ke keranjang");
                        Redirect::To('Keranjang');
                    }else {
                        echo "Gagal Update";
                    }
                }
               
           }else {
                $bp = Input::Get('value'.$data['id_produk']);
                if($bp == 0){
                $bp=1;
                }
                $KERANJANG->tambah_pesanan(array(
                    'id_pesanan'   => $data['id_produk'],
                    'admin_pesanan'=> Session::Get('username'),
                    'nama_pesanan' => $data['nama_produk'],
                    'harga_pesanan'=> $data['harga_produk'],
                    'banyak_pesanan'=> $bp
                ));
                Session::Flash('Tambah', "Berhasil ditambahkan ke keranjang");
                        Redirect::To('Keranjang');
           }

           
            
            
            
        }
        
    }else {
        Session::Flash('Kosong', 'Pilih barang yang ingin dibeli.');
    }
    
} 

?>



<h3>Pesanan</h3>
<?php $a = 1; ?>
<form action="Pesanan.php" method="post">
    <table>
        <tr>
        <td>No.</td>
        <td>Pilih</td>
        <td>Kode Produk</td>
        <td>Nama Produk</td>
        <td>Harga</td>
        <td>Banyak</td>
        </tr>
        <?php 
            $produk = $PRODUK->get_produk('produk');
            while ($data = mysqli_fetch_array($produk)) { 
        ?>
        <tr>
        <td><?php echo $a ?> </td>
        <td><input class="a" type="checkbox" name="Beli[]" value="<?php echo $data['id_produk'] ?>"></td>
        <td><?php echo $data['id_produk'] ?> </td>
        <td><?php echo $data['nama_produk'] ?> </td>
        <td id="Harga"><?php echo $data['harga_produk'] ?> </td> 
        
        <td><input class='b' type="number" min ="1" name="value<?php echo $data['id_produk']?>"></td>   
        </tr>  
        <?php $a++;} ?>
        </tr>
    </table>
    <input type="submit" value="Masukkan Keranjang" name="submit" id="submit1">
</form>




<?php

include_once '../Templates/Footer.php';?>