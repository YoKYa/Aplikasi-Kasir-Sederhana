<?php 
include_once 'Core/init.php'; 
if (!Session::Cek('username')) {
    Session::Flash('Login','Anda Harus Login Terlebih Dahulu');
    Redirect::To('../index');
    
}




include_once '../Templates/Header.php'; 


if (Session::Cek('Produkadd')) {
    echo "<li>".Session::Flash('Produkadd')."</li>";
}
if (Session::Cek('Daftar')) {
    echo "<li>".Session::Flash('Daftar')."</li>";
}
if (Session::Cek('Login')) {
    echo "<li>".Session::Flash('Login')."</li>";
}
include_once 'Template/header.php';
if (Session::Cek('Login')) {
    echo "<li>".Session::Flash('Login')."</li>";
}

?>








<?php include_once '../Templates/Footer.php';?>